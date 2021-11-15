@section('title', 'Daftar QnA')
@section('title-description', 'Menyukai, Memberi Komentar, Menghapus dan Melaporkan')
@section('title-icon', 'pe-7s-chat')
@section('content')
<div class="card card-body">
    <div class="row">
        <div class="col-4 col-md-4 col-xl-4">
            <div class="position-relative form-group">
                <label>Tampilkan Berdasarkan</label>
                <div class="row">
                    <div class="col-8">
                        <select name="filter_datatable" class="custom-select list-class">
                            <option>Semua Kelas</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <select name="episode" class="custom-select list-episode">
                            <option>Episode</option>
                        </select>
                    </div>
                </div>
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
                <td>Video UUID</td>
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
    $('#cover-spin').show();
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
            "data": "class_uuid",
        }, {
            "data": "video_uuid",
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
            "data": "created_at",
            "render": function(data) {
                return moment(data).add(7, 'hours').format('DD/MM/YYYY hh:mm a');
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
        }],
        "columnDefs": [{
            "targets": [0, 1],
            "visible": false,
        }],
    });

    $.ajax({
        "url": api + "qna/theme",
        "method": "get",
        "headers": {
            "Accept": "application/json",
            "Authorization": 'bearer ' + token,
        }
    }).done(function(response) {
        $('#cover-spin').hide();
        if (response.message == "Success") {
            html = '<option value="">Semua Kelas</option>';
            $.each(response.data, function(index, classes) {
                $.each(classes.classes, function(index2, row) {
                    html += '<option value="' + row.class_uuid + '">' + row.class_nama + '</option>';
                })
            });
            $('.list-class').html(html);
        }
    });

    $('.list-class').change(function() {
        table.columns(0).search($('.list-class').val()).draw();
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/qna/class-list",
            "method": "get",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            }
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == "Success") {
                html = '<option value="">Semua Episode</option>';
                $.each(response.data, function(index, row) {
                    if (row.class_uuid == $('.list-class').val()) {
                        html += '<option value="' + row.video_uuid + '">' + row.video_episode + '</option>';
                    }
                });
                $('.list-episode').html(html).change();
            }
        });
    });

    $('.list-episode').change(function() {
        table.columns(1).search($('.list-episode').val()).draw();
    });
</script>
@endsection
@extends('layouts.layout')