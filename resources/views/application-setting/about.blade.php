@section('title', 'Pengaturan Aplikasi')
@section('title-description', 'Pengaturan Aplikasi')
@section('title-icon', 'pe-7s-config')
@section('content')
<div class="card card-body mb-4">
    <div class="col-12">
        <h5 class="mt-2 font-weight-bold">Isi Halaman Tentang</h5>
        <textarea name="about" id="ckeditor"></textarea>
        <button class="btn btn-success mt-3" onclick="store()">Simpan</button>
    </div>
</div>
<div class="row mb-4">
    <div class="col-12">
        <button class="btn btn-focus" data-toggle="modal" data-target="#create-modal">Tambah Testimoni</button>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <table class="table dataTable">
                <thead>
                    <tr>
                        <td>Nama Peserta</td>
                        <td>Identitas Peserta</td>
                        <td>Testimoni</td>
                        <td width="1px" data-orderable="false">Actions</td>
                    </tr>
                </thead>
                <thead>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="create-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Testimoni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="create-form">
                    <div class="form-group">
                        <label>Nama Peserta</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Peserta">
                    </div>
                    <div class="form-group">
                        <label>Identitas Peserta</label>
                        <input type="text" name="identitas" class="form-control" placeholder="Masukan Detail Peserta">
                    </div>
                    <div class="form-group">
                        <label>Testimoni</label>
                        <textarea name="testimoni" class="form-control" cols="5" placeholder="Masukan Testimoni"></textarea>
                        <small>Jumlah Kata 0 (Max 100 Karakter)</small>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    var about = CKEDITOR.replace('ckeditor');
    $.ajax({
        "url": api + "admin/setting?key=about",
        "method": "get",
        "headers": {
            "Accept": "application/json",
            "Authorization": 'bearer ' + token,
        }
    }).done(function(response) {
        $('#cover-spin').hide();
        if (response.message == "Success") {
            about.setData(response.data.value);
        }
    });

    $('.dataTable').DataTable({
        "ajax": {
            "url": api + "admin/testimoni",
            "dataType": 'json',
            "type": "GET",
            "beforeSend": function(xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + token);
            },
        },
        "columns": [{
            "data": "nama"
        }, {
            "data": "identitas"
        }, {
            "data": "testimoni"
        }, {
            "data": "uuid",
            "render": function(data) {
                return '<button class="btn btn-sm btn-danger" onclick="hapus(\'' + api + 'admin/testimoni?token=' + data + '\')">Hapus</button>';
            }
        }]
    });

    $('#create-form').submit(function(e) {
        e.preventDefault();
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/testimoni",
            "method": "post",
            "data": $('#create-form').serialize(),
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            }
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == "Success") {
                notif('success', response.info);
            }
        });

    });

    function store(value) {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/setting/update?key=about",
            "method": "post",
            "data": {
                'value': about.getData()
            },
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            }
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == "Success") {
                notif('success', response.info);
            }
        });
    }
</script>
@endsection
@extends('layouts.layout')