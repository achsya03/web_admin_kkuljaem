@section('title', '')
@section('title-description', '')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div class="tambah">
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

@section('js')
<script>


    //show view atas
    function load_view() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/classroom-group/detail?token="  + urlParams.get('id'),
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
            "url": api + "admin/classroom/category?token="  + urlParams.get('id'),
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {
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
    

</script>
@endsection
@extends('layouts.layout')