@section('title', 'Avatar')
@section('title-description', '')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div class="row">
    <div class=" col-md-11 tambah">
    </div>

</div>


<br>
<div class="main-card mb-3 card">
    <div class="card-body">

        <table id="example" class="table table-fix table-hover table-striped table-bordered">
            <thead>
                <th width="10px">#</th>
                <th>Nama Avatar</th>
                <th>Deskripsi Avatar</th>
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

@endsection
@section('js')
<script>
    //show view atas
    function load_view() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/avatar/by-group?token=" + urlParams.get('id'),
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {

            $('.page-title-text').html(response.data.group_name + '<div class="page-title-subheading">' + response.data.group_desc + '</div>');

            $('#cover-spin').hide();
        });
    }
    load_view();


    //show data 
    function load_avatar() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/avatar/by-group?token=" + urlParams.get('id'),
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {
            var id = response.data.avatars.slice(0);
            id.sort(function(a, b) {
                var x = a.nama.toLowerCase();
                var y = b.nama.toLowerCase();
                return x < y ? -1 : x > y ? 1 : 0;
            });
            id.sort(function(a, b) {
                return a.urutan_class - b.urutan_class;
            });
            $('#cover-spin').hide();
            html0 = '';
            html0 += `<a href="{{route('application-setting-avatar-create')}}?id=` + urlParams.get('id') + `" class="mb-2 mr-2 btn btn-primary">Tambah Avatar</a>`
            document.querySelector('.tambah').innerHTML = html0;

            html = '';
            $.each(id, function(index, row) {
                html += '<tr>';
                html += '<td>' + (index + 1) + '</td>';
                html += '<td>' + row.nama + '</td>';
                html += '<td>' + row.deskripsi.substring(0, 100) + '...' + '</td>';
                html += '<td>' + `<a href="{{route('application-setting-avatar-edit')}}?token=` + row.uuid + '&id=' + urlParams.get('id') + `" style="margin:2px;"  type="button" class="btn btn-info btn-sm">Rincian</a><br>` + `<a href="#" onclick="hapus('` + api + `admin/avatar?token=` + row.uuid + `')" style="margin:2px;"  type="button" class="btn btn-danger btn-sm">Hapus</a>` + '</td>';
                html += '</tr>';
            });

            document.querySelector('.tbody').innerHTML = html;
            $('table').DataTable();


        });
    }
    load_avatar();
</script>
@endsection
@extends('layouts.layout')