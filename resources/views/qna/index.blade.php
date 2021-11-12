@section('title', 'Daftar QnA')
@section('title-description', 'Menyukai, Memberi Komentar, Menghapus dan Melaporkan')
@section('title-icon', 'pe-7s-chat')
@section('content')
<div class="card card-body">
    <div class="row">
        <div class="col-7 col-md-4 col-xl-4">
            <div class="position-relative form-group">
                <label>Tampilkan Berdasarkan</label>
                <select name="filter_datatable" class="custom-select list-class">
                    <option>Semua Kelas</option>
                </select>
            </div>
        </div>
        <div class="col-4 col-md-1 col-xl-1">
            <label class="text-light">.</label>
            <br>
            <button class="btn btn-focus btn-lg">Terapkan</button>
        </div>
    </div>
    <table class="dataTable table">
        <thead>
            <tr>
                <td>UUID</td>
                <td>Judul QnA</td>
                <td>Detail QnA</td>
                <td>Penanya</td>
                <td>Dibuat</td>
                <td data-orderable="false">Tanggapan</td>
                <td data-orderable="false" width="1px">Action</td>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection

@section('js')
<script>
    var table = $('.dataTable').DataTable({
        "ajax": {
            "url": api + "admin/qna",
            "dataType": 'json',
            "type": "GET",
            "beforeSend": function(xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + token);
            },
        },
        "columns": [{
            "data": "class_uuid"
        }, {
            "data": "judul"
        }, {
            "data": "deskripsi",
            "render": function(data) {
                return data.substring(0, 15) + '...';
            }
        }, {
            "data": "user_post"
        }, {
            "data": "tgl_post",
            "render": function(data) {
                return moment(data).format('DD/MM/YYYY hh:mm a');
            }
        }, {
            "data": null,
            "render": function(data, type, row) {
                return row.jml_like + ' <i class="pe-7s-like"></i><br>' + row.jml_komen + ' <i class="pe-7s-chat"></i>';
            }
        }, {
            "data": "post_uuid",
            "render": function(data) {
                return `<a href="{{ route('qna-detail') }}?token=` + data + `" class="btn btn-sm btn-focus">Detail</a>`;
            }
        }]
    });

    $.ajax({
        "url": api + "admin/classroom-group",
        "method": "get",
        "headers": {
            "Accept": "application/json",
            "Authorization": 'bearer ' + token,
        }
    }).done(function(response) {
        if (response.message == "Success") {
            html = '<option value="">Semua Kelas</option>';
            $.each(response.data, function(index, row) {
                html += '<option value="' + row.uuid + '">' + row.nama + '</option>';
            });
            $('.list-class').html(html);
        }
    });

    $('.list-class').change(function() {
        table.columns(0).search($('.list-class').val()).draw();
    })
</script>
@endsection
@extends('layouts.layout')