@section('title', 'Laporan Pengguna')
@section('title-description', 'Manajemen Laporan daro pengguna aplikasi dan mentor')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div class="card card-body">
    <div class="row">
        <div class="col-7 col-md-4 col-xl-4">
            <div class="position-relative form-group">
                <label>Tampilkan Berdasarkan</label>
                <select name="tipe" id="tipe" class="custom-select">
                    <option value="all">Semua</option>
                    <option value="waiting">Menunggu Konfirmasi</option>
                    <option value="accepted">Telah Di Blokir</option>
                    <option value="ignored">Sudah Di Tolak</option>
                </select>
            </div>
        </div>
        <div class="col-4 col-md-1 col-xl-1">
            <label class="text-light">.</label>
            <br>
            <button onclick="get_view_posting()" class="btn btn-focus btn-lg">Terapkan</button>
        </div>
    </div>

    <table id="example" class="table table-fix table-hover table-striped table-bordered">
        <thead>
            <th width="10px">#</th>
            <th>Pelapor</th>
            <th>Konten yang dilaporkan</th>
            <th>Tanggal Lapor</th>
            <th>Status</th>
            <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody class="tbody">
        </tbody>
    </table>
</div>


@endsection
@section('modal')
<div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Konten Posting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span style="color:black"><strong>Jenis</strong></span><br>
                <input name="post_report_uuid" id="post_report_uuid" hidden class="form-control">

                <a id="jenis"></a>
                <br>
                <span style="color:black"><strong>Konten yang dilaporkan</strong></span><br>
                <a id="deskripsi"> </a>
                <br>
                <span style="color:black"><strong>Tanggal Lapor</strong></span><br>
                <a id="tgl_lapor"></a>
                <br>
                <span style="color:black"><strong>Status</strong></span><br>
                <a id="status"></a>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="blokir_posting($('#post_report_uuid').val())" class="btn btn-secondary">Abaikan</button>
                <button type="button" onclick="update_posting($('#post_report_uuid').val())" class="btn btn-primary">Blokir</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-sm11" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Konten Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span style="color:black"><strong>Jenis</strong></span><br>
                <input name="post_report_uuid" id="post_report_uuid1" hidden class="form-control">

                <a id="jenis1"></a>
                <br>
                <span style="color:black"><strong>Konten yang dilaporkan</strong></span><br>
                <a id="deskripsi1"> </a>
                <br>
                <span style="color:black"><strong>Tanggal Lapor</strong></span><br>
                <a id="tgl_lapor1"></a>
                <br>
                <span style="color:black"><strong>Status</strong></span><br>
                <a id="status1"></a>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="blokir_comment($('#post_report_uuid1').val())" class="btn btn-secondary">Abaikan</button>
                <button type="button" onclick="update_comment($('#post_report_uuid1').val())" class="btn btn-primary">Blokir</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    function get_all() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/report?status=all",
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            html = '';
            $.each(response.data, function(index, row) {
                html += '<tr>';
                html += '<td>' + (index + 1) + '</td>';
                html += '<td>' + row.user_lapor + '</td>';
                html += '<td>' + row.komentar + '</td>';
                html += '<td>' + row.tgl_lapor + '</td>';
                html += '<td>' + row.status + '</td>';
                if (row.status == "Menunggu Konfirmasi") {
                    if (row.komentar.match(/Posting.*/)) {
                        html += '<td>' + `<a data-toggle="modal" data-target=".bd-example-modal-sm1" href="#" onclick="getEdit('` + row.post_report_uuid + `')" class="btn btn-sm btn-focus">Detail</a>` + '</td>';
                    } else {
                        html += '<td>' + `<a data-toggle="modal" data-target=".bd-example-modal-sm11" href="#" onclick="getEdit1('` + row.comment_report_uuid + `')" class="btn btn-sm btn-focus">Detail</a>` + '</td>';
                    }
                }
                html += '</tr>';
            });
            document.querySelector('.tbody').innerHTML = html;
            $('table').DataTable();
        });
    }
    get_all();

    function get_view_posting() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/report?status=" + $('select[name="tipe"]').val(),
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            html = '';
            $.each(response.data, function(index, row) {
                html += '<tr>';
                html += '<td>' + (index + 1) + '</td>';
                html += '<td>' + row.user_lapor + '</td>';
                html += '<td>' + row.komentar + '</td>';
                html += '<td>' + row.tgl_lapor + '</td>';
                html += '<td>' + row.status + '</td>';
                if (row.status == "Menunggu Konfirmasi") {
                    if (row.komentar.match(/Posting.*/)) {
                        html += '<td>' + `<a data-toggle="modal" data-target=".bd-example-modal-sm1" href="#" onclick="getEdit('` + row.post_report_uuid + `')" class="btn btn-sm btn-focus">Detail</a>` + '</td>';
                    } else {
                        html += '<td>' + `<a data-toggle="modal" data-target=".bd-example-modal-sm11" href="#" onclick="getEdit1('` + row.comment_report_uuid + `')" class="btn btn-sm btn-focus">Detail</a>` + '</td>';
                    }
                }
                html += '</tr>';
            });
            document.querySelector('.tbody').innerHTML = html;
            $('table').DataTable();
        });
    }



    //SHOW EDIT
    function getEdit(id) {
        $.ajax({
            method: 'get',
            url: api + 'admin/report/detail?type=posting&token=' + id,
            dataType: 'json',
            headers: {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
            success: function(response) {
                console.log(response)
                if (response.message !== 'Success') {
                    // $.growl.warning({
                    //     message: response.message
                    // });
                } else if (response.message == 'Success') {
                    $.each(response.data, function(index, row) {
                        document.getElementById('jenis').textContent = row['jenis'];
                        document.getElementById('deskripsi').textContent = row['deskripsi'];
                        document.getElementById('tgl_lapor').textContent = row['tgl_lapor'];
                        document.getElementById('status').textContent = row['status'];
                        document.getElementById('post_report_uuid').value = row['post_report_uuid'];
                    });
                }
            }
        });
    }

    function getEdit1(id) {
        $.ajax({
            method: 'get',
            url: api + 'admin/report/detail?type=comment&token=' + id,
            dataType: 'json',
            headers: {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
            success: function(response) {
                console.log(response)
                if (response.message !== 'Success') {

                } else if (response.message == 'Success') {
                    $.each(response.data, function(index, row) {
                        document.getElementById('jenis1').textContent = row['jenis'];
                        document.getElementById('deskripsi1').textContent = row['deskripsi'];
                        document.getElementById('tgl_lapor1').textContent = row['tgl_lapor'];
                        document.getElementById('status1').textContent = row['status'];
                        document.getElementById('post_report_uuid1').value = row['comment_report_uuid'];
                    });
                }
            }
        });
    }


    function blokir_posting(id) {
        $.ajax({
            type: "post",
            url: api + 'admin/report/update?type=posting&token=' + id + '&value=ignored',
            data: {
                'jenis': $("#jenis").val(),
                'judul': $("#judul").val(),
                'deskripsi': $("#deskripsi").val(),
                'user_lapor': $("#user_lapor").val(),
                'tgl_lapor': $("#tgl_lapor").val(),
                'post_report_uuid': $("#post_report_uuid").val(),
            },
            success: function(response) {
                if (response.message !== 'Success') {
                    notif('error', 'Silahkan Cek Form yang dimasukkan');

                } else if (response.message == 'Success') {
                    $(".btn-close").click();
                    window.location = "{{route('laporankonten')}}";
                }
            }
        });
    }

    function update_posting(id) {
        $.ajax({
            type: "post",
            url: api + 'admin/report/update?type=posting&token=' + id + '&value=accepted',
            data: {
                'jenis': $("#jenis").val(),
                'judul': $("#judul").val(),
                'deskripsi': $("#deskripsi").val(),
                'user_lapor': $("#user_lapor").val(),
                'tgl_lapor': $("#tgl_lapor").val(),
                'post_report_uuid': $("#post_report_uuid").val(),
            },
            success: function(response) {
                if (response.message !== 'Success') {
                    notif('error', 'Silahkan Cek Form yang dimasukkan');

                } else if (response.message == 'Success') {
                    $(".btn-close").click();
                    window.location = "{{route('laporankonten')}}";
                }
            }
        });
    }


    function blokir_comment(id) {
        $.ajax({
            type: "post",
            url: api + 'admin/report/update?type=comment&token=' + id + '&value=ignored',
            data: {
                'jenis': $("#jenis").val(),
                'judul': $("#judul").val(),
                'deskripsi': $("#deskripsi").val(),
                'user_lapor': $("#user_lapor").val(),
                'tgl_lapor': $("#tgl_lapor").val(),
                'post_report_uuid': $("#post_report_uuid").val(),
            },
            success: function(response) {
                if (response.message !== 'Success') {
                    notif('error', 'Silahkan Cek Form yang dimasukkan');

                } else if (response.message == 'Success') {
                    $(".btn-close").click();
                    window.location = "{{route('laporankonten')}}";
                }
            }
        });
    }

    function update_comment(id) {
        $.ajax({
            type: "post",
            url: api + 'admin/report/update?type=comment&token=' + id + '&value=accepted',
            data: {
                'jenis': $("#jenis").val(),
                'judul': $("#judul").val(),
                'deskripsi': $("#deskripsi").val(),
                'user_lapor': $("#user_lapor").val(),
                'tgl_lapor': $("#tgl_lapor").val(),
                'post_report_uuid': $("#post_report_uuid").val(),
            },
            success: function(response) {
                if (response.message !== 'Success') {
                    notif('error', 'Silahkan Cek Form yang dimasukkan');
                } else if (response.message == 'Success') {
                    $(".btn-close").click();
                    window.location = "{{route('laporankonten')}}";
                }
            }
        });
    }
</script>
@endsection
@extends('layouts.layout')