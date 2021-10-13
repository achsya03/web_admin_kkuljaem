@section('title', 'Mentor')
@section('title-description', 'Manajemen Data Pengajar')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div>
    <a href="{{route('tambahmentor')}}" class="mb-2 mr-2 btn btn-primary">Tambah Mentor</a>
</div>
<br>
<div class="main-card mb-3 card">
    <div class="card-body">
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <th>#</th>
                <th>Email</th>
                <th>Nama Mentor</th>
                <th>Status</th>
                <th>Bio</th>
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
            "url": api + "admin/user/mentor/list",
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                html = '';
                $.each(response.data, function(index, row) {
                    html += '<tr>';
                    html += '<td>' + (index + 1) + '</td>';
                    html += '<td>' + row.email + '</td>';
                    html += '<td>' + row.nama + '</td>';
                    html += '<td>' + row.status + '</td>';
                    html += '<td>' + row.bio + '</td>';
                    html += '<td>' + `<a href="{{route('detailmentor')}}?id=` + row.user_uuid + `" style="margin:2px;"  type="button" class="btn btn-primary btn-sm">Rincian</a><br>` + `<a href="{{route('editmentor')}}?id=` + row.user_uuid + `" style="margin:2px;"  type="button" class="btn btn-info btn-sm">Edit</a><br>` + `<a href="#" onclick = "hapus('` + api + `admin/user/mentor?token=` + row.user_uuid + `')" style="margin:2px;"  type="button" class="btn btn-danger btn-sm">Hapus</a><br>` + '</td>';
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