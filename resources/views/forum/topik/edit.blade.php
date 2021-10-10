@section('title', 'Sunting Forum')
@section('title-description', 'Forum / Topik A')
@section('title-icon', 'pe-7s-news-paper')

@section('content')
<div class="card card-body">
    <form id="form-edit">
        <div class="row">
            <div class="col-5">
                <div class="position-relative form-group">
                    <label>Judul Forum</label>
                    <input type="text" name="judul" class="form-control" placeholder="Judul Forum">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="position-relative form-group">
                    <label>Konten Forum</label>
                    <textarea name="deskripsi" rows="5" class="form-control" placeholder="Konten Forum"></textarea>
                    <small>Jumlah Kata 0 (max 200 kata)</small>
                </div>
            </div>
        </div>
        @foreach([0,1,2] as $row)
        <div class="row">
            <div class="col-5">
                <div class="position-relative form-group">
                    <label>Gambar {{ $row +1}}</label>
                    <div class="position-relative form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="post_image[{{ $row }}]" onchange="update_preview(this)">
                                <label class="custom-file-label">Pilih File</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row">
            <div class="col-5">
                <small>Format .jpg Ukuran gambar 123px * 123px dengan masimal ukuran keseluruhan file 2MB</small>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="row">
                    <div class="col-4">
                        <img preview="post_image[0]" src="#" width="100%">
                    </div>
                    <div class="col-4">
                        <img preview="post_image[1]" src="#" width="100%">
                    </div>
                    <div class="col-4">
                        <img preview="post_image[2]" src="#" width="100%">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-5">
                <div class="position-relative form-group">
                    <input type="checkbox" placeholder="Judul Forum"> Atur sebagai topik terpilih.
                </div>
                <button class="btn btn-success">Publikasikan</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('js')
<script>
    $('#form-edit').submit(function(e) {
        $('#cover-spin').show();
        e.preventDefault();
        $.ajax({
            method: 'post',
            url: api + 'admin/forum/post',
            data: new FormData($('#form-edit')[0]),
            dataType: 'json',
            contentType: false,
            mimeType: "multipart/form-data",
            processData: false,
            headers: {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
            success: function(response) {
                $('#cover-spin').hide();
                if (response.message !== 'Success') {
                    notif('error', 'Silahkan cek form dan tipe file yang di upload');
                } else if (response.message == 'Success') {
                    notif('success', 'Berhasil menambah banner, Mohon tunggu');
                    setTimeout(() => {
                        window.location = "{{route('forum-topik')}}?token=" + urlParams.get('token');
                    }, 1000);
                }
            }
        });
    });

    function load_content() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/forum/detail?token=" + urlParams.get('token'),
            "method": "get",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                $('.page-title-subheading').html('Forum / ' + response.data.posting[0].tema + ' / ' + response.data.posting[0].judul);
                $('input[name="judul"]').val(response.data.posting[0].judul);
                $('textarea[name="deskripsi"]').val(response.data.posting[0].deskripsi);
                $.each(response.data.posting[0].gambar, function(index, row) {
                    $('img[preview="post_image[' + index + ']"]').attr('src', row.url_gambar);
                });
            }
        });
    }

    function update_preview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('img[preview="' + $(input).attr('name') + '"]').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    load_content();
</script>
@endsection

@extends('layouts.layout')