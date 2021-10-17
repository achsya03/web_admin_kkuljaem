@section('title', 'Sunting Akun Saya')
@section('title-description', 'Akun Pengguna / Mentor')
@section('title-icon', 'pe-7s-user')

@section('content')
<div class="card card-body mb-4">
    <form id="profile-update">
        <div class="row">
            <div class="col-5">
                <div class="position-relative form-group">
                    <label class="font-weight-bold mb-0">Email Mentor</label>
                    <input type="email" name="email" class="form-control" value="nanda.mochammad@gmail.com">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="position-relative form-group">
                    <label class="font-weight-bold mb-0">Kata Sandi</label>
                    <input type="password" name="password" class="form-control" value="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="position-relative form-group">
                    <label class="font-weight-bold mb-0">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="position-relative form-group">
                    <label class="font-weight-bold mb-0">Nama Mentor</label>
                    <input type="text" name="nama" class="form-control" value="Nanda Mochammad">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="position-relative form-group">
                    <label class="font-weight-bold mb-0">Bio</label>
                    <textarea name="bio" rows="5" class="form-control"></textarea>
                    <small>Jumlah Kata 0 (Max 500 Karakter)</small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="position-relative form-group">
                    <label class="font-weight-bold mb-0">Profil Mentor</label>
                    <div class="custom-file">
                        <input type="file" name="url_foto" id="url_foto" accept="image/*" class="custom-file-input" onchange="update_preview(this)">
                        <label class="custom-file-label">Pilih File</label>
                        <div class="small">Format .jpg ukuran gambar 580 x 323px dengan maksimal ukuran file 2MB</div>
                    </div>
                    <img class="img d-none" src="#" name="url_foto_preview" style="min-width: 300px; max-height: 150px; object-fit:cover;">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <div class="position-relative form-group">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('js')
<script>
    $('#cover-spin').show();
    $.ajax({
        "url": api + "admin/profile",
        "method": "get",
        "headers": {
            "Accept": "application/json",
            "Authorization": 'bearer ' + token,
        }
    }).done(function(response) {
        $('#cover-spin').hide();
        if (response.message == "Success") {
            $('input[name="email"]').val(response.data.user.email);
            $('input[name="nama"]').val(response.data.user.nama);
            $('textarea[name="bio"]').val(response.data.user.bio);
            $('img[name="url_foto_preview"]').attr('src', response.data.user.foto);
            $('img[name="url_foto_preview"]').removeClass('d-none');
        }
    });

    $('#profile-update').submit(function(e) {
        e.preventDefault();
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/profile",
            "method": "post",
            "data": new FormData($('#profile-update')[0]),
            "contentType": false,
            "mimeType": "multipart/form-data",
            "processData": false,
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            }
        }).done(function(response) {
            $('#cover-spin').hide();
        });
    });

    function update_preview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('img[name="' + $(input).attr('name') + '_preview"]').attr('src', e.target.result);
                $('img[name="' + $(input).attr('name') + '_preview"]').removeClass('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection

@extends('layouts.layout')