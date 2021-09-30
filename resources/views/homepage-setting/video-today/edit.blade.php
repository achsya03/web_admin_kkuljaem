@section('title', 'Sunting Video Hari Ini')
@section('title-description', 'Pengaturan Homepage')
@section('title-icon', 'pe-7s-home')

@section('content')
<div class="row">
    <div class="card card-body">
        <form id="form-edit" action="#">
            <div class="row">
                @include('homepage-setting.video-today.form')
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
        "url": api + "admin/videos/detail?token=" + urlParams.get('id'),
        "method": "get",
        "headers": {
            "Accept": "application/json",
            "Authorization": 'bearer ' + token,
        }
    }).done(function(response) {
        $('#cover-spin').hide();
        if (response.message == 'Success') {
            $('input[name="jadwal"]').val(response.data.jadwal);
            $('input[name="url_video_preview"]').val('https://drive.google.com/file/d/' + response.data.url_video.split("=")[2] + '/view').change();
            $('.btn-danger').click(function() {
                hapus(api + 'admin/video?token=' + response.data.uuid, '{{ route("homepage-setting-video-today") }}');
            });
        }
    });

    $('#form-edit').submit(function(e) {
        $('#cover-spin').show();
        e.preventDefault();
        $.ajax({
            method: 'post',
            url: api + 'admin/videos/update?token=' + urlParams.get('id'),
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
                    notif('success', 'Berhasil merubah video, Mohon tunggu');
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