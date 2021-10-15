@section('title', 'Laporan Pengguna')
@section('title-description', 'Manajemen Laporan daro pengguna aplikasi dan mentor')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div class="card card-body">
    <div class="row">
        <div class="col-7 col-md-4 col-xl-4">
            <div class="position-relative form-group">
                <label>Tampilkan Berdasarkan</label>
                <select name="#" class="custom-select">
                    <option value="#">Semua Kelas</option>
                </select>
            </div>
        </div>
        <div class="col-4 col-md-1 col-xl-1">
            <label class="text-light">.</label>
            <button class="btn btn-focus btn-lg">Terapkan</button>
            <!-- <a data-toggle="modal" data-target=".bd-example-modal-sm1" class="btn-icon btn-icon-only btn btn-primary mobile-toggle-header-nav active" class="btn btn-sm btn-focus">Detail</a> -->
        </div>
    </div>

    <table id="example" class="table table-fix table-hover table-striped table-bordered">
        <thead>
            <th width="10px">#</th>
            <th>Pelapor</th>
            <th>Konten yang dilaporkan</th>
            <th>Tanggal Lapor</th>
            <th>Status</th>
            <th width="45px">Action</th>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Konten</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span style="color:black"><strong>Jenis</strong></span><br>
                <input name="post_report_uuid" id="post_report_uuid" hidden class="form-control">

                <a id="user_lapor"></a>
                <br>
                <span style="color:black"><strong>Konten yang dilaporkan</strong></span><br>
                <a id="komentar"> </a>
                <br>
                <span style="color:black"><strong>Tanggal Lapor</strong></span><br>
                <a id="tgl_lapor"></a>
                <br>
                <span style="color:black"><strong>Status</strong></span><br>
                <a id="status"></a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Abaikan</button>
                <button type="button" onclick="update($('#post_report_uuid').val())" class="btn btn-primary">Blokir</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    function load_view() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/report?status=ignored",
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
                html += '<td>' + `<a data-toggle="modal" data-target=".bd-example-modal-sm1" href="#" onclick="getEdit('` + row.post_report_uuid + `')" class="btn btn-sm btn-focus">Detail</a>` + '</td>';
                html += '<td>';
                html += '</tr>';
            });
            document.querySelector('.tbody').innerHTML = html;
            $('table').DataTable();

        });
    }
    load_view();


    //SHOW EDIT
    function getEdit(id) {
        $.ajax({
            method: 'get',
            url: api + 'admin/report/detail?type=comment&token=' + id,
            dataType: 'json',
            headers: {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
            success: function(response) {
                if (response.message !== 'Success') {
                    // $.growl.warning({
                    //     message: response.message
                    // });
                } else if (response.message == 'Success') {
                    document.getElementById('user_lapor').textContent = response.data['user_lapor'];
                    document.getElementById('deskripsi').textContent = response.data['deskripsi'];
                    document.getElementById('tgl_lapor').textContent = response.data['tgl_lapor'];
                    document.getElementById('status').textContent = response.data['status'];
                    document.getElementById('post_report_uuid').value = response.data['post_report_uuid'];
                }
            }
        });
    }


    function update(id) {
        $.ajax({
            type: "post",
            url: api + 'admin/report/update?type=comment&token=' + id,
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
                    // $.growl.warning({
                    //     message: response.message
                    // });
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