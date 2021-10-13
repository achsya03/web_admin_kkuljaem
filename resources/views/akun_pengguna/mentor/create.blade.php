@section('title', 'Tambah Akun Mentor ')
@section('title-description', 'Manajemen Data Pengajar')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<br>
<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Akun Mentor</h5>
                    <form id="change-pass-form">
                        @include('akun_pengguna.mentor.form')
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
@yield('form_js')
<script>
    $('#password1').removeClass('d-none');
    $('#password_confirmation1').removeClass('d-none');

    //CREATE
    $('#change-pass-form').submit(function(e) {
        $('#cover-spin').show();

        e.preventDefault();
        $.ajax({
            method: 'post',
            url: api + 'admin/user/mentor',
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
                    $('#cover-spin').hide();

                    notif('error', 'Silahkan cek form dan tipe file yang di upload');

                } else if (response.message == "Success") {
                    $('#cover-spin').hide();
                    notif('success', 'Berhasil membuat kelas, Mohon tunggu');
                    setTimeout(() => {
                        window.location = "{{route('mentor')}}";
                    }, 1000);
                }
            }
        });
    });
    $('#cover-spin').hide();
</script>
@endsection
@extends('layouts.layout')