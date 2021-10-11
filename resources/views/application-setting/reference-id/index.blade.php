@section('title', 'Reference ID')
@section('title-description', 'Manajemen Reference ID')
@section('title-icon', 'pe-7s-config')
@section('top-button')
<button class="btn btn-focus" onclick="$('#create-modal').modal('show')">Tambah Refence ID</button>
@endsection
@section('content')
<div class="card card-body">
    <table class="table">
        <thead>
            <tr>
                <td width="1px">#</td>
                <td>Pemilik</td>
                <td>Kode</td>
                <td>Dibuat</td>
                <td width="1px" data-orderable="false">Actions</td>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
@endsection
@section('modal')
<div class="modal fade" id="create-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Reference ID</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="create-refence-id">
                    <div class="position-relative form-group">
                        <label class="">Pemilik</label>
                        <input name="nama" placeholder="Masukan Nama Pemilik" type="text" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <label class="">Kode</label>
                        <input name="kode" placeholder="Masukan Kode masimal 8 karakter" type="text" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <label class="">Dimulai</label>
                        <input name="tgl_aktif" type="date" class="form-control">
                    </div>
                    <input type="hidden" name="status" value="1">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    var table = $('.table').dataTable({
        "ajax": {
            "url": api + "admin/reference",
            "dataType": 'json',
            "type": "GET",
            "beforeSend": function(xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + token);
            },
        },
        "columns": [{
            "data": "uuid",
            "render": function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        }, {
            "data": "nama"
        }, {
            "data": "kode"
        }, {
            "data": "tgl_aktif",
            "render": function(data) {
                return moment(data).format('DD/MM/YYYY hh:mm A');
            }
        }, {
            "data": "uuid",
            "render": function(data) {
                return `<a href="{{ route('application-setting-reference-id-list') }}?token=` + data + `" class="btn btn-sm btn-secondary text-nowrap mb-1">Daftar Siswa</a> ` +
                    '<button class="btn btn-sm btn-danger text-nowrap mb-1" onclick="hapus(`' + api + 'admin/reference?token=' + data + '`)">Hapus</button>';
            }
        }],
    });

    $('#create-refence-id').submit(function(e) {
        e.preventDefault();
        $('#cover-spin').show();
        $.ajax({ 
            "url": api + "admin/reference",
            "method": "post",
            "data": $(this).serialize(),
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            }
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                notif('success', response.info);
                $('#create-modal').modal('hide');
                table._fnAjaxUpdate();
            } else {
                notif('error', response.info);
            }
        });
    });
</script>
@endsection
@extends('layouts.layout')