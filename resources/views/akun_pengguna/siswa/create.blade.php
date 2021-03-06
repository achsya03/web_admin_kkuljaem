@section('title', 'Tambah Akun Siswa')
@section('title-description', 'Manajemen Data Siswa')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Akun </h5>
                    <form id="change-pass-form">
                        @include('akun_pengguna.siswa.form')
                        <br>
                        <br>
                        <button class="mt-1 btn btn-success">Ajukan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $('#password1').removeClass('d-none');
    $('#password_confirmation1').removeClass('d-none');


    //CREATE
    $('#change-pass-form').submit(function(e) {
        $('#cover-spin').show();

        e.preventDefault();
        $.ajax({
            method: 'post',
            url: api + 'admin/user/student',
            data: new FormData($('#change-pass-form')[0]),
            dataType: 'json',
            contentType: false,
            mimeType: "multipart/form-data",
            processData: false,
            headers: {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
            success: function(response) {
                if (response.message !== 'Success') {
                    notif('error', 'Silahkan cek form dan tipe file yang di upload');
                    $('#cover-spin').hide();

                } else if (response.message == 'Success') {
                    notif('success', 'Berhasil membuat siswa, Mohon tunggu');
                    setTimeout(() => {
                        window.location = "{{route('siswa')}}";
                    }, 1000);
                }
            }
        });
    });
    $('#cover-spin').hide();
</script>

@endsection

@extends('layouts.layout')