@section('title', 'Sunting Akun Saya')
@section('title-description', 'Akun Pengguna / Mentor')
@section('title-icon', 'pe-7s-user')

@section('content')
<div class="card card-body mb-4">
    <div class="row">
        <div class="col-5">
            <div class="position-relative form-group">
                <label class="font-weight-bold mb-0">Email Mentor</label>
                <input type="text" class="form-control" value="nanda.mochammad@gmail.com">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="position-relative form-group">
                <label class="font-weight-bold mb-0">Kata Sandi</label>
                <input type="password" class="form-control" value="
                ">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="position-relative form-group">
                <label class="font-weight-bold mb-0">Konfirmasi Kata Sandi</label>
                <input type="password" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="position-relative form-group">
                <label class="font-weight-bold mb-0">Nama Mentor</label>
                <input type="text" class="form-control" value="Nanda Mochammad">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="position-relative form-group">
                <label class="font-weight-bold mb-0">Bio</label>
                <textarea name="tes" rows="5" class="form-control"></textarea>
                <small>Jumlah Kata 0 (Max 500 Karakter)</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="position-relative form-group">
                <label class="font-weight-bold mb-0">Profil Mentor</label>
                <table class="mb-0">
                    <tr>
                        <td width="20%">Gambar 1</td>
                        <td>
                            <button class="btn btn-primary">Hapus</button>
                        </td>
                    </tr>
                </table>
                <small>Format .jpg Ukuran gambar 123px x 123px dengan maksimal ukuran file 2MB</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="position-relative form-group">
                <button class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.layout')