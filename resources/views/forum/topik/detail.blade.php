@section('title', 'Forum')
@section('title-description', 'Forum')
@section('title-icon', 'pe-7s-news-paper')

@section('content')
<div class="card card-body">
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Topik</label>
        <div id="tema"></div>
    </div>
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Judul Forum</label>
        <div id="judul"></div>
    </div>
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Penulis</label>
        <div id="nama_pengirim"></div>
    </div>
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Isi Forum</label>
        <div id="deskripsi"></div>
        <div class="row mb-2">
            <div class="col-5">
                <div class="row gambar"> </div>
            </div>
        </div>
        <button class="btn btn-focus">Sukai</button>
        <button class="btn btn-focus user_posting_false d-none">Laporkan</button>
        <button class="btn btn-focus user_posting_true d-none">Sunting</button>
        <button class="btn btn-focus user_posting_true d-none">Hapus</button>
    </div>
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Beri Komentar</label>
        <div>Komentari</div>
        <textarea name="komentar" cols="30" rows="5" class="form-control"></textarea>
        <div><small>Jumlah Kata 0 (Max 500 Karakter)</small></div>
        <button class="btn btn-success mt-1" onclick="comment()">Kirim</button>
    </div>
</div>
<div class="card card-body mt-4">
    <h6 class="mt-2" id="react">12 Suka 12 Komentar</h6>
    <div id="komentar"> </div>
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
                <div>Jawaban anda</div>
                <textarea name="jawaban" rows="5" class="form-control"></textarea>
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
    function load_content() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/forum/detail?token=" + urlParams.get('token'),
            "method": "get",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                $('.title').html(response.data.posting[0].judul);
                $('.page-title-subheading').html('Forum / ' + response.data.posting[0].tema + ' / ' + response.data.posting[0].judul);
                $('#tema').html(response.data.posting[0].tema);
                $('#judul').html(response.data.posting[0].judul);
                $('#nama_pengirim').html(response.data.posting[0].nama_pengirim);
                $('#deskripsi').html(response.data.posting[0].deskripsi);
                $('#react').html(response.data.posting[0].jml_like + ' Suka ' + response.data.posting[0].jml_komen + ' Komentar');
                // $('#user_posting')

                html = '';
                $.each(response.data.comment, function(index, row) {
                    html += '<div class="mb-2 p-2 border">';
                    html += '<div><span class="font-weight-bold">' + (row.user_comment == 'True' ? 'Anda' : row.comment_nama) + '</span> . ' + moment(row.comment_tgl).format('DD.MM.Y hh:mm A') + '</div>';
                    html += '<div>' + row.comment_isi + '</div>';
                    if (row.user_comment == 'True') {
                        html += '<button class="btn btn-secondary btn-sm" onclick="komentar_detail(\'' + row.comment_uuid + '\', \'' + row.comment_isi + '\')">Pengaturan</button>';
                    } else {
                        html += '<button class="btn btn-danger btn-sm" onclick="report_comment(\'' + row.comment_uuid + '\')">Laporkan</button>';
                    }
                    html += '</div>';
                });
                $('#komentar').html(html);
                html = '';
                $.each(response.data.posting[0].gambar, function(index, row) {
                    html += '<div class="col-4">';
                    html += `<img src="{{ url('css/assets/images/avatars/1.jpg') }}" width="100%">`;
                    html += '</div>';
                });
                $('.gambar').html(html);
            }
        });
    }

    function comment() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/forum/comment?token=" + urlParams.get('token'),
            "method": "post",
            "data": {
                "komentar": $('textarea[name="komentar"]').val(),
            },
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                $('textarea[name="komentar"]').val('');
                load_content();
            }
        });
    }

    load_content();
</script>
@endsection

@extends('layouts.layout')