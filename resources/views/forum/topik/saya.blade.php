@section('title', 'Detail QnA')
@section('title-description', 'QnA / ')
@section('title-icon', 'pe-7s-news-paper')

@section('content')
<div class="card card-body">
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Topik</label>
        <div>KDrama</div>
    </div>
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Judul Forum</label>
        <div>Kelas Percakapan 1</div>
    </div>
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Penulis</label>
        <div>Nanda Muhammad</div>
    </div>
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Isi Forum</label>
        <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt, magni iste blanditiis minus odit vitae excepturi voluptate quasi voluptatibus possimus sed ut officiis totam! Dignissimos vel eos provident excepturi aliquid.</div>
        <div class="row mb-2">
            <div class="col-5">
                <div class="row">
                    <div class="col-4">
                        <img src="{{ url('css/assets/images/avatars/1.jpg') }}" width="100%">
                    </div>
                    <div class="col-4">
                        <img src="{{ url('css/assets/images/avatars/2.jpg') }}" width="100%">
                    </div>
                    <div class="col-4">
                        <img src="{{ url('css/assets/images/avatars/3.jpg') }}" width="100%">
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-focus">Sukai</button>
        <a href="{{ route('forum-topik-edit') }}" class="btn btn-focus">Sunting</a>
    </div>
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Beri Komentar</label>
        <div>Komentari</div>
        <textarea name="#" cols="30" rows="5" class="form-control"></textarea>
        <div><small>Jumlah Kata 0 (Max 500 Karakter)</small></div>
        <button class="btn btn-success mt-1">Kirim</button>
    </div>
</div>
<div class="card card-body mt-4">
    <h6 class="mt-2">12 Suka 12 Komentar</h6>
    <div class="mb-2 p-2 border">
        <div><span class="font-weight-bold">Anda</span> . 12.12.2920 10.00PM</div>
        <div>Kelas ini adalah kelas untuk memahami dasar dari sebuah bahasa korea..</div>
        <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm">Pengaturan</button>
    </div>
    <div class="mb-2 p-2 border">
        <div><span class="font-weight-bold">Anda</span> . 12.12.2920 10.00PM</div>
        <div>Komentar disembunyikan karena mengandung unsur sara/spam.</div>
    </div>
    <div class="mb-2 p-2 border">
        <div><span class="font-weight-bold">Anda</span> . 12.12.2920 10.00PM</div>
        <div>Kelas ini adalah kelas untuk memahami dasar dari sebuah bahasa korea..</div>
        <button class="btn btn-danger btn-sm">Laporkan</button>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Komentar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>Jawaban anda
                </div>
                <textarea name="#" rows="5" class="form-control"></textarea>
                <div><small>Jumlah Kata 0(Max 500 karakter)</small></div>
                <button class="btn btn-success mb-2">Ubah</button> <br>
                <button class="btn btn-danger">Hapus Komentar</button>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.layout')