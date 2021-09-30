@section('title', 'Sunting Kata Hari Ini')
@section('title-description', 'Pengaturan Homepage')
@section('title-icon', 'pe-7s-home')

@section('content')
<div class="row">
    <div class="card card-body">
        <form id="form-edit" action="#">
            <div class="row">
                @include('homepage-setting.word-today.form')
                <div class="col-12">
                    <button type="submit" class="btn btn-success pull-right">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
@yield('form_js')
<script>
    $('#cover-spin').show();
    $.ajax({
        "url": api + "admin/word/detail?token=" + urlParams.get('id'),
        "method": "get",
        "headers": {
            "Accept": "application/json",
            "Authorization": 'bearer ' + token,
        }
    }).done(function(response) {
        $('#cover-spin').hide();
        if (response.message == "Success") {
            $('input[name="hangeul"]').val(response.data.hangeul);
            $('input[name="jadwal"]').val(response.data.jadwal);
            $('input[name="pelafalan"]').val(response.data.pelafalan);
            editor.setData(response.data.penjelasan);
        }
    });

    $('#form-edit').submit(function(e) {
        $('#cover-spin').show();
        e.preventDefault();
        $.ajax({
            method: 'post',
            url: api + 'admin/word/update?token=' + urlParams.get('id'),
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
                        window.location = "{{route('homepage-setting-word-today')}}";
                    }, 1000);
                }
            }
        });
    });
</script>
@endsection

@extends('layouts.layout')