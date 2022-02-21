@section('title', 'Sunting Marketing Banner')
@section('title-description', 'Pengaturan Homepage / Marketing Banner')
@section('title-icon', 'pe-7s-home')

@section('content')
<div class="row">
    <div class="card card-body">
        <form id="form-edit">
            <div class="row">
                @include('homepage-setting.non-marketing-banner.form')
                <div class="col-12">
                    <button type="button" class="btn btn-danger">Hapus</button>
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
        "url": api + "admin/banner/detail?token=" + urlParams.get('id'),
        "method": "get",
        "headers": {
            "Accept": "application/json",
            "Authorization": 'bearer ' + token,
        }
    }).done(function(response) {
        if (response.message == 'Success') {
            $('img[name="url_mobile_preview"]').attr('src', response.data.url_mobile);
            $('img[name="url_web_preview"]').attr('src', response.data.url_web);
            $('input[name="judul_banner"]').val(response.data.judul_banner);
            $('textarea[name="deskripsi"]').val(response.data.deskripsi);
            $('select[name="label"]').val(response.data.label);
            $('input[name="link"]').val(response.data.link);
            $('.btn-danger').attr('onclick', "hapus('" + api + "admin/banner?token=" + response.data.uuid + "', '{{ route('homepage-setting-non-marketing-banner') }}')");
            $('#cover-spin').hide();
        }
    });

    $('#form-edit').submit(function(e) {
        $('#cover-spin').show();
        e.preventDefault();
        $.ajax({
            method: 'post',
            url: api + "admin/banner/update?token=" + urlParams.get('id'),
            data: new FormData($('#form-edit')[0]),
            dataType: 'json',
            contentType: false,
            mimeType: "multipart/form-data",
            processData: false,
            success: function(response) {
                $('#cover-spin').hide();
                if (response.message !== 'Success') {
                    notif('error', 'Silahkan cek form dan tipe file yang di upload');
                } else if (response.message == 'Success') {
                    notif('success', 'Berhasil menambah banner, Mohon tunggu');
                    setTimeout(() => {
                        window.location = "{{route('homepage-setting-non-marketing-banner')}}";
                    }, 1000);
                }
            }
        });
    });
</script>
@endsection

@extends('layouts.layout')