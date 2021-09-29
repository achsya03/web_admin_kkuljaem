@section('title', 'Tambah Video Hari Ini')
@section('title-description', 'Pengaturan Homepage')
@section('title-icon', 'pe-7s-home')

@section('content')
<div class="row">
    <div class="card card-body">
        <form id="form-create" action="#">
            <div class="row">
                @include('homepage-setting.video-today.form')
                <div class="col-12">
                    <button type="submit" class="btn btn-success pull-right">Tambahkan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
@yield('form_js')
<script>
    $('input[type="date"]').val(urlParams.get('date'));
    $('#form-create').submit(function(e) {
        $('#cover-spin').show();
        e.preventDefault();
        $.ajax({
            method: 'post',
            url: api + 'admin/videos',
            data: new FormData($('#form-create')[0]),
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
                        window.location = "{{route('homepage-setting-video-today')}}";
                    }, 1000);
                }
            }
        });
    });
</script>
@endsection

@extends('layouts.layout')