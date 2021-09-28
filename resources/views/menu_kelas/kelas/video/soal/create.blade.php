@section('title', 'Tambah Soal ')
@section('title-description', 'Kelas/Kelas Perkenalan/ Video Perkenalan 1')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div class="row">
    <div class="col-12">
        <a href="#" class="mb-2 mr-2 btn btn-success">Simpan</a>
    </div>
</div>
<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="col-md-12">
                    <h5 class="font-weight-bold mt-4">Forum Tambah Soal</h5>
                </div>
                <form action="#" method="POST">
                    @include('menu_kelas.kelas.video.soal.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.layout')