@section('title', 'Sunting Akun Mentor ')
@section('title-description', 'Manajemen Data Pengajar')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')

<br>
<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Sunting Akun Mentor</h5>
                    <form id="change-pass-form1">
                        @include('akun_pengguna.mentor.form')
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
@yield('form_js')

<script>
    //show edit
    $.ajax({
        method: 'get',
        url: api + 'admin/user/mentor?token=' + urlParams.get('id'),
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
                document.getElementById('awal_mengajar').value = response.data.user['awal_mengajar'];
                document.getElementById('bio').value = response.data.user['bio'];
                document.getElementById('jenis_pengguna').value = response.data.user['jenis_pengguna'];

                $('img[id="url_foto_preview"]').attr('src', response.data.user['foto']).removeClass('d-none');
                $('img[id="url_foto_preview"]').attr('src', response.data.user['foto']);

            }
        }
    });



    //update
    $('#change-pass-form1').submit(function(e) {
        $('#cover-spin').show();
        e.preventDefault();
        $.ajax({
            method: 'post',
            url: api + 'admin/user/mentor/update?token=' + urlParams.get('id'),
            data: new FormData($('#change-pass-form1')[0]),
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

                    notif('success', 'Berhasil membuat kelas, Mohon tunggu');
                    setTimeout(() => {
                        window.location = "{{route('mentor')}}";
                    }, 1000);
                }
            }
        });
    });
</script>
@endsection

@extends('layouts.layout')