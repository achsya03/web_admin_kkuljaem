@section('title', 'Tambah Marketing Banner')
@section('title-description', 'Pengaturan Homepage / Marketing Banner')
@section('title-icon', 'pe-7s-home')

@section('content')
<div class="row">
    <div class="card card-body">
        <form id="form-create" action="#">
            <div class="row">
                @include('homepage-setting.marketing-banner.form')
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
    $('#form-create').submit(function(e) {
        $('#cover-spin').show();
        e.preventDefault();
        $.ajax({
            method: 'post',
            url: api + 'admin/banner',
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
                        window.location = "{{route('homepage-setting-marketing-banner')}}";
                    }, 1000);
                }
            }
        });
    });
</script>
@endsection

@extends('layouts.layout')