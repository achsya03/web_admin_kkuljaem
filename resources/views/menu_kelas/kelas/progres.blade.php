@section('title', 'Progress Siswa')
@section('title-description', 'Manajemen Grup Kelas, Data kelas dan Materi pembelajaran')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')

<div class="main-card mb-3 card">
    <div class="card-body">

        <table id="example" class="table table-hover table-striped table-bordered">
            <thead>
                <th>#</th>
                <th>Nama</th>
                <th>Progress Pembelajaran</th>
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
            "url": api + "admin/classroom/student?token=" + urlParams.get('id'),
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {
            $('#cover-spin').hide();

            html = '';
            $.each(response.data, function(index, row) {
                console.log(row)
                html += '<tr>';
                html += '<td>' + (index + 1) + '</td>';
                html += '<td>' + row.nama + '</td>';
                html += '<td><div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: ' + row.progress.toFixed(2) + '%;">' + row.progress.toFixed(2) + '%</div></div></td>';
                html += '</tr>';
            });
            document.querySelector('.tbody').innerHTML = html;
            $('#example').DataTable();


        });
    }
    load_view();



    // $('#example').DataTable();
    // async function getISS() {
    //     const response = await fetch('https://floating-harbor-93486.herokuapp.com/api/admin/classroom/student?token=' + urlParams.get('id'));
    //     const datas = await response.json();
    //     const {
    //         data,
    //     } = datas;
    //     console.log(data)

    //     html = '';
    //     $.each(data, function(index, row) {
    //         console.log(row)
    //         html += '<tr>';
    //         html += '<td>' + (0 + 1) + '</td>';
    //         html += '<td>' + row.nama + '</td>';
    //         html += '<td><div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: ' + row.progress + '%;">' + row.progress + '%</div></div></td>';
    //         html += '</tr>';
    //     });
    //     document.querySelector('.tbody').innerHTML = html;

    // }
    // getISS();
</script>
@endsection
@extends('layouts.layout')