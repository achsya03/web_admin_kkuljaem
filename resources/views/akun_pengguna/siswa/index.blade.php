@section('title', 'Siswa')
@section('title-description', 'Manajemen Data Siswa')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div>
    <a href="{{route('tambahsiswa')}}" class="mb-2 mr-2 btn btn-primary">Tambah Siswa</a>
</div>
<br>
<div class="main-card mb-3 card">
    <div class="card-body">

        <table id="example" class="table table-hover table-striped table-bordered">
            <thead>
                <th>#</th>
                <th>Status</th>
                <th>Email</th>
                <th>Nama Siswa</th>
                <th>JK</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Nomor Seluler</th>
                <th>Action</th>
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

function load_student() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/user/student",
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {
            console.log(response)
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                console.log(response)
                html = '';
                $.each(response.data, function(index, row) {
                    html += '<tr>';
                    html += '<td>' + (index + 1) + '</td>';
                    html += '<td>' + row.status + '</td>';
                    html += '<td>' + row.email + '</td>';
                    html += '<td>' + row.status + '</td>';
                    html += '<td>' + row.nama + '</td>';
                    html += '<td>' + row.jenis_kel + '</td>';
                    html += '<td>' + row.tempat_lahir + '</td>';
                    html += '<td>' + row.tgl_lahir + '</td>';
                    html += '<td>' + `<a href="{{route('detailsiswa')}}?id=` + row.user_uuid + `" style="margin:2px;"  type="button" class="btn btn-primary btn-sm">Rincian</a><br>` + `<a href="{{route('editsiswa')}}?id=` + row.class_uuid + `" style="margin:2px;"  type="button" class="btn btn-info btn-sm">Rincian</a><br>` + `<a href="#" onclick="hapus('` + api + `admin/user/student?token=` + row.user_uuid + `')" style="margin:2px;"  type="button" class="btn btn-danger btn-sm">Hapus</a>` + '</td>';
                    html += '</tr>';
                });
                document.querySelector('.tbody').innerHTML = html;
                $('table').DataTable();

            }
        });
    }
    load_student();

</script>

@endsection
@extends('layouts.layout')