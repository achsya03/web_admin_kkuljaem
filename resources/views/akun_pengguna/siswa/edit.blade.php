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
                    <form action="{{ url('/user/form/insert') }}" method="POST">
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

@extends('layouts.layout')