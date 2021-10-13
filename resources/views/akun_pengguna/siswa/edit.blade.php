@section('title', 'Sunting Akun Siswa')
@section('title-description', 'Manajemen Data Siswa')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Forum Sunting Akun Siswa</h5>
                    <form id="change-pass-form">
                        @include('akun_pengguna.siswa.form')
                        <br>
                        <br>
                        <button class="mt-1 btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    //show edit
    $.ajax({
        method: 'get',
        url: api + 'admin/user/student?token=' + urlParams.get('token'),
        dataType: 'json',
        headers: {
            "Accept": "application/json",
            "Authorization": 'bearer ' + token,
        },
        success: function(response) {
            console.log(response)
            if (response.message !== 'Success') {

            } else if (response.message == 'Success') {
                document.getElementById('email').value = response.data.user['email'];
                document.getElementById('nama').value = response.data.user['nama'];
                $("#jenis_kelamin option[value='" + response.data.user['jenis_kel'] + "']").prop("selected", true);

                document.getElementById('tempat_lahir').value = response.data.user['tempat_lahir'];
                document.getElementById('tgl_lahir').value = response.data.user['tgl_lahir'];
                document.getElementById('alamat').value = response.data.user['alamat'];

            }
        }
    });


    //UPDATE
    $('#change-pass-form').submit(function(e) {
        $('#cover-spin').show();
        e.preventDefault();
        $.ajax({
            method: 'post',
            url: api + 'admin/user/student/update?token=' + urlParams.get('token'),
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
                } else if (response.message == 'Success') {
                    $('#cover-spin').hide();
                    notif('success', 'Berhasil membuat siswa, Mohon tunggu');
                    setTimeout(() => {
                        window.location = "{{route('siswa')}}";
                    }, 1000);
                }
            }
        });
    });
</script>
@endsection

@extends('layouts.layout')