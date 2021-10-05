@section('title', 'Forum')
@section('title-description', 'Menulis, Menyukai, Memberi Komentar, Menghapus dan Melaporkan')
@section('title-icon', 'pe-7s-news-paper')
@section('content')
<div class="row topik-list"></div>
<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <h6 class="">Tambah Topik</h6>
            <form id="create-forum">
                <input type="text" name="judul" class="form-control mb-2" placeholder="Masukan Topik baru disini">
                <button type="submit" class="btn btn-success">Tambahkan</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="detail_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Topik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update-forum">
                    <div class="position-relative form-group">
                        <label for="exampleEmail11" class="">Topik</label>
                        <input name="uuid" type="hidden" class="form-control">
                        <input name="judul" placeholder="Nama Topik" type="text" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function load_topik() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/theme",
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                html = '';
                $.each(response.data, function(index, row) {
                    html += `<div class="col-4 mb-4">`;
                    html += `<div class="card card-body">`;
                    html += `<a href="{{ route('forum-topik') }}?token=` + row.uuid + `" class="text-dark">`;
                    html += `<h4 class="">` + row.judul + ` (` + row.jml_post + `)</h4>`;
                    html += `</a>`;
                    html += `<hr>`;
                    html += `<button class="btn btn-info" onclick="edit_theme('` + row.uuid + `')">Edit</button>`;
                    html += `</div>`;
                    html += `</div>`;
                });
                $('.topik-list').html(html);
            }
        });
    }

    $('#create-forum').submit(function(e) {
        e.preventDefault();
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/theme",
            "method": "post",
            "data": $(this).serialize(),
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + window.localStorage.getItem('token'),
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                notif('success', response.info);
                load_topik();
            }
        });
    });

    function edit_theme(id) {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/theme/detail?token=" + id,
            "method": "get",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + window.localStorage.getItem('token'),
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                $("#detail_modal").modal('show');
                $('input[name="judul"]').val(response.data.judul);
                $('input[name="uuid"]').val(response.data.uuid);
            }
        });
    }

    $('#update-forum').submit(function(e) {
        e.preventDefault();
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/theme/update?token=" + $('input[name="uuid"]').val(),
            "method": "post",
            "data": {
                "judul": $('input[name="judul"]').val()
            },
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + window.localStorage.getItem('token'),
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                $("#detail_modal").modal('hide');
                notif('success', response.info);
                load_topik();
            }
        });
    });

    load_topik();
</script>
@endsection
@extends('layouts.layout')