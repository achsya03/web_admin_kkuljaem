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
                    <h5 class="card-title">Tambah Akun Siswa</h5>
                    <form action="{{ url('/user/form/insert') }}" method="POST">
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

@extends('layouts.layout')