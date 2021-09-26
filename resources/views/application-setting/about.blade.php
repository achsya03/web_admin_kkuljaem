@section('title', 'Pengaturan Aplikasi')
@section('title-description', 'Pengaturan Aplikasi')
@section('title-icon', 'pe-7s-config')
@section('content')
<div class="card card-body">
    <div class="col-12">
        <h5 class="mt-2 font-weight-bold">Isi Halaman Tentang</h5>
        <textarea name="about" id="ckeditor"></textarea>
        <button class="btn btn-success mt-3">Simpan</button>
    </div>
</div>
@endsection

@section('js')
<script>
    CKEDITOR.replace('ckeditor');
</script>
@endsection
@extends('layouts.layout')