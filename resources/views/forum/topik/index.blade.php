@section('title', 'Forum')
@section('title-description', 'Forum / Topik A')
@section('title-icon', 'pe-7s-news-paper')
@section('top-button')
<a href="#" class="btn btn-focus" id="btn-create">Buat Posting Baru</a>
@endsection
@section('content')
<div class="card card-body mb-4">
    <h3>Forum Terpilih (<span id="selected_forum_count"></span>)</h3>
    <table class="selected_table table">
        <thead>
            <tr>
                <td>#</td>
                <td>Status</td>
                <td>Judul Forum</td>
                <td>Konten Forum</td>
                <td>Penulis</td>
                <td>Dibuat</td>
                <td data-orderable="false">Tanggapan</td>
                <td data-orderable="false" width="1px">Action</td>
            </tr>
        </thead>
        <tbody> </tbody>
    </table>
</div>
<div class="card card-body mb-4">
    <h3>Semua Forum (<span id="unselected_forum_count"></span>)</h3>
    <table class="unselected_table table">
        <thead>
            <tr>
                <td>#</td>
                <td>Status</td>
                <td>Judul Forum</td>
                <td>Konten Forum</td>
                <td>Penulis</td>
                <td>Dibuat</td>
                <td data-orderable="false">Tanggapan</td>
                <td data-orderable="false" width="1px">Action</td>
            </tr>
        </thead>
        <tbody> </tbody>
    </table>
</div>
@endsection

@section('js')
<script>
    $('#btn-create').attr("href", "{{ route('forum-topik-create') }}?token=" + urlParams.get('token'));
    var table1 = $('.selected_table').dataTable();
    var table2 = $('.unselected_table').dataTable();

    function load_topik() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/forum?token=" + urlParams.get('token'),
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                $('.title').html(response.data.theme.judul);
                $('.page-title-subheading').html('Forum / ' + response.data.theme.judul);
                $('#selected_forum_count').html(response.data.selected_forum.length);
                $('#unselected_forum_count').html(response.data.unselected_forum.length);

                var i = 1;
                table1.fnDestroy();
                table1 = $('.selected_table').dataTable({
                    "data": response.data.selected_forum,
                    "columns": [{
                        "data": "deskripsi",
                        "render": function(data) {
                            return i++;
                        }
                    }, {
                        "data": "status"
                    }, {
                        "data": "judul"
                    }, {
                        "data": "deskripsi",
                        "render": function(data) {
                            return data.substring(0, 20) + '...';
                        }
                    }, {
                        "data": "user_post"
                    }, {
                        "data": "tgl_post",
                        "render": function(data) {
                            return moment(data).format('DD/MM/YYYY hh:mm A');
                        }
                    }, {
                        "data": null,
                        "render": function(data, type, row) {
                            return row.jml_like + ' <i class="pe-7s-like"></i><br>' + row.jml_komen + ' <i class="pe-7s-chat"></i>';
                        }
                    }, {
                        "data": "post_uuid",
                        "render": function(data, type, row) {
                            return `<a href="{{ route('forum-topik-detail') }}?token=` + data + `" class="btn btn-sm btn-focus text-nowrap mb-1">Detail</a> ` +
                                `<a href="#" class="btn btn-sm btn-info text-nowrap mb-1" onclick="change_position('remove', '` + row.post_uuid + `')">Keluarkan dari Terpilih</a>`;
                        }
                    }]
                });

                var i = 1;
                table2.fnDestroy();
                table2 = $('.unselected_table').dataTable({
                    "data": response.data.unselected_forum,
                    "columns": [{
                        "data": "deskripsi",
                        "render": function(data) {
                            return i++;
                        }
                    }, {
                        "data": "status"
                    }, {
                        "data": "judul"
                    }, {
                        "data": "deskripsi",
                        "render": function(data) {
                            return data.substring(0, 20) + '...';
                        }
                    }, {
                        "data": "user_post"
                    }, {
                        "data": "tgl_post",
                        "render": function(data) {
                            return moment(data).format('DD/MM/YYYY hh:mm A');
                        }
                    }, {
                        "data": null,
                        "render": function(data, type, row) {
                            return row.jml_like + ' <i class="pe-7s-like"></i><br>' + row.jml_komen + ' <i class="pe-7s-chat"></i>';
                        }
                    }, {
                        "data": "post_uuid",
                        "render": function(data, type, row) {
                            return `<a href="{{ route('forum-topik-detail') }}?token=` + data + `" class="btn btn-sm btn-focus mb-1 text-nowrap">Detail</a> ` +
                                `<a href="#" class="btn btn-sm btn-info mb-1 text-nowrap" onclick="change_position('add', '` + row.post_uuid + `')">Atur sebagai Terpilih</a>`;
                        }
                    }]
                });
            }
        });
    }

    function change_position(postion, id) {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/forum/select?action=" + postion + "&token=" + id,
            "method": "post",
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
    }

    load_topik();
</script>
@endsection
@extends('layouts.layout')