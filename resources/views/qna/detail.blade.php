@section('title', 'Detail QnA')
@section('title-description', 'QnA / ')
@section('title-icon', 'pe-7s-chat')

@section('content')
<div class="card card-body mb-4">
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Judul QnA</label>
        <div id="judul"></div>
    </div>
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Detail QnA</label>
        <div id="deskripsi"></div>
    </div>
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Penanya</label>
        <div id="nama_pengirim"></div>
        <button class="btn btn-focus" id="btn-like"></button>
        <button class="btn btn-focus" id="btn-report"></button>
    </div>
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Beri Jawaban</label>
        <div>Masukan Jawaban</div>
        <textarea name="komentar" cols="30" rows="5" class="form-control"></textarea>
        <div><small>Jumlah Kata 0 (Max 500 Karakter)</small></div>
        <button class="btn btn-success mt-1" onclick="comment()">Kirim</button>
    </div>
</div>
<div class="card card-body">
    <h6 class="mt-2" id="react"></h6>
    <div id="komentar"></div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog">
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
                <textarea name="comment_isi" rows="5" class="form-control"></textarea>
                <div><small>Jumlah Kata 0(Max 500 karakter)</small></div>
                <button class="btn btn-success mb-2">Ubah</button> <br>
                <button class="btn btn-danger" id="btn-hapus-comment">Hapus Komentar</button>
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
            "url": api + "admin/qna/detail?token=" + urlParams.get('token'),
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                $('textarea[name="komentar"]').val('');
                $('#deskripsi').html(response.data.posting[0].deskripsi);
                $('#judul').html(response.data.posting[0].judul);
                $('#nama_pengirim').html(response.data.posting[0].nama_pengirim);
                $('#react').html(response.data.posting[0].jml_like + ' Suka ' + response.data.posting[0].jml_komen + ' Komentar');
                if (response.data.posting[0].user_like == "True") {
                    $('#btn-like').attr('onclick', 'dislike()');
                    $('#btn-like').html('Batal Sukai');
                } else {
                    $('#btn-like').attr('onclick', 'like()');
                    $('#btn-like').html('Sukai');
                }
                if (response.data.posting[0].user_lapor == "True") {
                    $('#btn-report').attr('onclick', 'unreport()');
                    $('#btn-report').html('Batal Laporkan');
                } else {
                    $('#btn-report').attr('onclick', 'report()');
                    $('#btn-report').html('Laporkan');
                }
                html = "";
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
            }
        });
    }

    function like() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "qna/like?token=" + urlParams.get('token'),
            "method": "post",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            }
        }).done(function(response) {
            $('#cover-spin').hide();
            load_content();
        });
    }

    function dislike() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "qna/like?token=" + urlParams.get('token'),
            "method": "delete",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            }
        }).done(function(response) {
            $('#cover-spin').hide();
            load_content();
        });
    }

    function report() {
        Swal.fire({
            title: 'Masukan Keterangan',
            input: 'text',
            showCancelButton: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'Kamu tidak boleh mengkosongkan keterangan!'
                } else {
                    $('#cover-spin').show();
                    $.ajax({
                        "url": api + "qna/post/alert?token=" + urlParams.get('token'),
                        "method": "post",
                        "data": {
                            'komentar': value,
                        },
                        "headers": {
                            "Accept": "application/json",
                            "Authorization": 'bearer ' + token,
                        }
                    }).done(function(response) {
                        $('#cover-spin').hide();
                        load_content();
                    });
                }
            }
        });
    }

    function unreport() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "qna/post/alert?token=" + urlParams.get('token'),
            "method": "delete",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            }
        }).done(function(response) {
            $('#cover-spin').hide();
            load_content();
        });
    }

    function report_comment(id) {
        Swal.fire({
            title: 'Masukan Keterangan',
            input: 'text',
            showCancelButton: true,
            inputValidator: (value) => {
                if (!value) {
                    return 'Kamu tidak boleh mengkosongkan keterangan!'
                } else {
                    $('#cover-spin').show();
                    $.ajax({
                        "url": api + "qna/comment/alert?token=" + id,
                        "method": "post",
                        "data": {
                            'komentar': value,
                        },
                        "headers": {
                            "Accept": "application/json",
                            "Authorization": 'bearer ' + token,
                        }
                    }).done(function(response) {
                        $('#cover-spin').hide();
                        load_content();
                    });
                }
            }
        });
    }

    function unreport_comment(id) {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "qna/comment/alert?token=" + id,
            "method": "delete",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            }
        }).done(function(response) {
            $('#cover-spin').hide();
            load_content();
        });
    }

    function comment() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "qna/comment?token=" + urlParams.get('token'),
            "method": "post",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
            "data": {
                "komentar": $('textarea[name="komentar"]').val(),
                "deskripsi": $('textarea[name="komentar"]').val(),
            }
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                $('#deskripsi').html(response.data.posting[0].deskripsi);
                $('#judul').html(response.data.posting[0].judul);
                $('#nama_pengirim').html(response.data.posting[0].nama_pengirim);
                load_content();
            }
        });
    }

    function komentar_detail(token, isi) {
        $('textarea[name="comment_isi"]').val(isi);
        $('#btn-hapus-comment').attr('onclick', 'hapus(\'' + api + 'admin/qna/comment?token=' + token + '\')');
        $("#edit-modal").modal('show');
    }

    load_content();
</script>
@endsection
@extends('layouts.layout')