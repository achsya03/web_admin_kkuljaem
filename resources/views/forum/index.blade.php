@section('title', 'Forum')
@section('title-description', 'Menulis, Menyukai, Memberi Komentar, Menghapus dan Melaporkan')
@section('title-icon', 'pe-7s-news-paper')
@section('content')
<div class="row mb-4">
    <div class="col-4">
        <div class="card card-body">
            <a href="{{ route('forum-topik') }}" class="text-dark">
                <h4 class="">Topik A (20)</h4>
            </a>
            <hr>
            <a href="#" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-sm">Edit</a>
        </div>
    </div>
    <div class="col-4">
        <div class="card card-body">
            <a href="{{ route('forum-topik') }}" class="text-dark">
                <h4 class="">Topik B (20)</h4>
            </a>
            <hr>
            <a href="#" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-sm">Edit</a>
        </div>
    </div>
    <div class="col-4">
        <div class="card card-body">
            <a href="{{ route('forum-topik') }}" class="text-dark">
                <h4 class="">Topik C (20)</h4>
            </a>
            <hr>
            <a href="#" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-sm">Edit</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <h6 class="">Tambah Topik</h6>
            <input type="text" class="form-control mb-2" placeholder="Masukan Topik baru disini">
            <a href="#" class="btn btn-success">Tambahkan</a>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Topik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="position-relative form-group">
                    <label for="exampleEmail11" class="">Topik</label>
                    <input name="#" placeholder="Topik A" type="text" class="form-control">
                </div>
                <button class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $('.dataTable').DataTable();
</script>
@endsection
@extends('layouts.layout')