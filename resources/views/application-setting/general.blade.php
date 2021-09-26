@section('title', 'Buat Forum')
@section('title-description', 'Forum / Topik A')
@section('title-icon', 'pe-7s-news-paper')

@section('content')
<div class="card card-body">
    <h3>Versi Aplikasi</h3>
    <div class="row">
        <div class="col-5">
            <div class="position-relative form-group">
                <label>Nomor Versi Android</label>
                <input type="text" class="form-control" placeholder="1.0">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="position-relative form-group">
                <label>Nomor Versi IOS</label>
                <input type="text" class="form-control" placeholder="1.0">
            </div>
        </div>
    </div>
</div>
<div class="card card-body mt-4">
    <div class="col-12">
        <h5 class="mt-2 font-weight-bold">TNC</h5>
        <textarea name="about" id="ckeditor"></textarea>
        <button class="btn btn-success mt-3">Simpan</button>
    </div>
</div>
<div class="card card-body mt-4">
    <div class="col-12">
        <h5 class="mt-2 font-weight-bold">Privacy Policy</h5>
        <textarea name="about" id="ckeditor2"></textarea>
        <button class="btn btn-success mt-3">Simpan</button>
    </div>
</div>
@endsection

@section('js')
<script>
    CKEDITOR.replace('ckeditor');
    CKEDITOR.replace('ckeditor2');
</script>
@endsection
@extends('layouts.layout')