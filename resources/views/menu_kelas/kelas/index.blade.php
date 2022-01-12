@section('title', '')
@section('title-description', '')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div class="row">
    <div class=" col-md-11 tambah">
    </div>
    <div>
        <a data-toggle="modal" data-target=".bd-example-modal-sm-sort" onclick="sorting()" class="col-md-12 btn-icon btn-icon-only btn btn-primary mobile-toggle-header-nav active" href="">Urutkan</a>

    </div>
</div>


<br>
<div class="main-card mb-3 card">
    <div class="card-body">

        <table id="example" class="table table-fix table-hover table-striped table-bordered">
            <thead>
                <th width="10px">#</th>
                <th>Judul Kelas</th>
                <th>Deskripsi Kelas</th>
                <th>Mentor</th>
                <th>Materi</th>
                <th>Dibuat</th>
                <th>Status</th>
                <th>Dibuat Tanggal</th>
                <th width="45px">Action</th>
                </tr>
            </thead>
            <tbody class="tbody">
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('modal')
<!-- Modal Sorting -->
<div class="modal fade bd-example-modal-sm-sort " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Sorting Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="simple-list" class="row">
                    <div id="items" class="list-group col simple" style="cursor: -webkit-grab; cursor: grab">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="savesort()" class=" btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    //show view atas
    function load_view() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/classroom-group/detail?token=" + urlParams.get('id'),
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {

            $('.page-title-text').html(response.data.nama + '<div class="page-title-subheading">' + response.data.deskripsi + '</div>');

            $('#cover-spin').hide();
        });
    }
    load_view();


    //show data 
    function load_kelas() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/classroom/category?token=" + urlParams.get('id'),
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {
            console.log(response)
            $('#cover-spin').hide();
            html0 = '';
            html0 += `<a href="{{route('tambahkelas')}}?id=` + urlParams.get('id') + `" class="mb-2 mr-2 btn btn-primary">Tambah Kelas</a>`
            document.querySelector('.tambah').innerHTML = html0;

            html = '';
            $.each(response.data.classes, function(index, row) {
                html += '<tr>';
                html += '<td>' + (index + 1) + '</td>';
                html += '<td>' + row.judul_class + '</td>';
                html += '<td>' + row.deskripsi_class.substring(0, 100) + '...' + '</td>';
                html += '<td>';
                $.each(row.mentor, function(index1, row1) {
                    html += row1.nama_mentor + '<br>';
                });
                html += '</td>';
                html += '<td>' + row.jml_materi + '</td>';
                html += '<td>' + row.dibuat + '</td>';
                html += '<td>' + row.status + '</td>';
                html += '<td>' + row.dibuat + '</td>';
                html += '<td>' + `<a href="{{route('detailkelas')}}?id=` + row.class_uuid + `" style="margin:2px;"  type="button" class="btn btn-info btn-sm">Rincian</a><br>` + `<a href="#" onclick="hapus('` + api + `admin/classroom?token=` + row.class_uuid + `')" style="margin:2px;"  type="button" class="btn btn-danger btn-sm">Hapus</a>` + '</td>';
                html += '</tr>';
            });

            document.querySelector('.tbody').innerHTML = html;
            $('table').DataTable();


        });
    }
    load_kelas();

    //SHOW SORTING
    function sorting() {
        $.ajax({
            "url": api + "admin/sorter?table=kelas&detail_kategori=" + urlParams.get('id'),
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response1) {
            if (response1.message == 'Success') {
                console.log(response1)
                html33 = '';
                $.each(response1.data.kelas, function(index, row) {
                    html33 += `<div id="` + row.uuid + `" class="list-group-item"><i class="fas fa-arrows-alt handle"></i>` + ` ` + row.nama + `</div>`;
                    html33 += '</div>';
                });
                document.querySelector('.simple').innerHTML = html33;
            }
        });
    }

    var originalList;
    var listnew;
    var el = document.getElementById('items');
    var sortable = new Sortable(el, {
        animation: 150,
        ghostClass: 'bg-color-info',
        onStart: function(evt) {
            originalList = [...document.querySelectorAll("#items > div")].map(el => el.id);
        },
        onEnd: function(evt) {
            listnew = [...document.querySelectorAll("#items > div")].map(el => el.id);
            var data = [{
                'arr_id': listnew
            }];
            datas = listnew;
            console.log(listnew);

        }
    });

    //CREATE SORTING
    function savesort() {
        $('#cover-spin').show();
        $.ajax({
            type: "post",
            url: api + 'admin/sorter?table=kelas&detail_kategori=' + urlParams.get('id'),
            data: {
                'arr_id[]': datas
            },
            dataType: 'json',
            headers: {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
            success: function(response) {
                console.log(response);
                if (response.message !== 'Success') {
                    $('#cover-spin').hide();

                    notif('error', 'Gagal merubah, Silahkan Refresh Ulang !');

                } else if (response.message == 'Success') {
                    $('#cover-spin').hide();

                    notif('success', 'Berhasil merubah Data , Mohon tunggu');
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }

            }
        });
    }
</script>
@endsection
@extends('layouts.layout')