@section('title', 'Detail QnA')
@section('title-description', 'QnA / ')
@section('title-icon', 'pe-7s-chat')

@section('content')
<div class="card card-body mb-4">
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Judul QnA</label>
        <div id="judul"><i class="fa fa-spin fa-spinner"></i> Mohon Tunggu</div>
    </div>
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Detail QnA</label>
        <div id="deskripsi"><i class="fa fa-spin fa-spinner"></i> Mohon Tunggu</div>
    </div>
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Penanya</label>
        <div id="nama_pengirim"><i class="fa fa-spin fa-spinner"></i> Mohon Tunggu</div>
        <button class="btn btn-focus">Sukai</button>
        <button class="btn btn-focus">Laporkan</button>
    </div>
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Beri Jawaban</label>
        <div>Masukan Jawaban</div>
        <textarea name="komentar" cols="30" rows="5" class="form-control"></textarea>
        <div><small>Jumlah Kata 0 (Max 500 Karakter)</small></div>
        <button class="btn btn-success mt-1" onclick="komentar()">Kirim</button>
    </div>
</div>

<div class="card card-body">
    <h6 class="mt-2">12 Suka 12 Komentar</h6>
    <div class="mb-2 p-2 border">
        <div><span class="font-weight-bold">Anda</span> . 12.12.2920 10.00PM</div>
        <div>Kelas ini adalah kelas untuk memahami dasar dari sebuah bahasa korea..</div>
        <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm">Pengaturan</button>
    </div>
    <div class="mb-2 p-2 border">
        <div><span class="font-weight-bold">Anda</span> . 12.12.2920 10.00PM</div>
        <div>Kelas ini adalah kelas untuk memahami dasar dari sebuah bahasa korea..</div>
        <button class="btn btn-danger btn-sm">Menunggu Konfirmasi</button>
    </div>
    <div class="mb-2 p-2 border">
        <div><span class="font-weight-bold">Anda</span> . 12.12.2920 10.00PM</div>
        <div>Komentar disembunyikan karena mengandung unsur sara/spam.</div>
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

@section('js')
<script>
    $.ajax({
        "url": api + "qna/detail?token=" + urlParams.get('token'),
        "method": "GET",
        "headers": {
            "Accept": "application/json",
            "Authorization": 'bearer ' + window.localStorage.getItem('token'),
        },
    }).done(function(response) {
        if (response.message == 'Success') {
            $('#deskripsi').html(response.data.posting[0].deskripsi);
            $('#judul').html(response.data.posting[0].judul);
            $('#nama_pengirim').html(response.data.posting[0].nama_pengirim);
        }
    });

    function komentar() {
        $.ajax({
            "url": api + "qna/comment?token=asdasdsdsa",
            "method": "post",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + window.localStorage.getItem('token'),
            },
            "data": {
                "komentar": $('textarea[name="komentar"]').val(),
                "deskripsi": $('textarea[name="komentar"]').val(),
            }
        }).done(function(response) {
            if (response.message == 'Success') {
                $('#deskripsi').html(response.data.posting[0].deskripsi);
                $('#judul').html(response.data.posting[0].judul);
                $('#nama_pengirim').html(response.data.posting[0].nama_pengirim);
            }
        });
    }
</script>
@endsection
@extends('layouts.layout')