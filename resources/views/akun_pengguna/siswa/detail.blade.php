@section('title', 'Detail Siswa')
@section('title-description', 'Akun Pengguna/Siswa/Detail Siswa')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')

<div class="nama">
</div>
<div class="email">
</div>
<span style="color:black"><strong>Status</strong></span><br>
<div class="status">
</div>
<span style="color:black"><strong>Jenis Kelamin</strong></span><br>
<div class="jenis_kelamin">
</div>
<span style="color:black"><strong>Tanggal Lahir</strong></span><br>
<div class="tgl_lahir">
</div>
<span style="color:black"><strong>Alamat</strong></span><br>
<div class="alamat">
</div>

<br>
<!-- <a>Pin telang dipasang </a><a href="">Lihat Peta</a> -->
<br>
<div class="route">
</div>
<br>
<div class="col-lg-13">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Progress Pembelajaran</h5>
            <table class="mb-0 table table-striped table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kelas</th>
                        <th>Progress</th>
                    </tr>
                </thead>
                <tbody class="tbody">

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">History Langganan</h5>

        <table class="mb-0 table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="tbody1">

            </tbody>
        </table>

    </div>
</div>
@endsection

@section('js')
<script>
    function load_detail() {
        $.ajax({
            "url": api + "admin/user/student/detail?token=" + urlParams.get('id'),
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                console.log(response)

                //show nama
                html000 = '';
                html000 += `<h4 style="color:black" id="nama">` + `<strong>` + response.data.user['nama'] + `</strong>` + `</h4>`
                document.querySelector('.nama').innerHTML = html000;

                //show email
                html001 = '';
                html001 += `<a id="email">` + response.data.user['email'] + `</a>` + `<br>`
                document.querySelector('.email').innerHTML = html001;

                //show email
                html011 = '';
                html011 += `<a id="email">` + response.data.user['status'] + `</a>` + `<br>`
                document.querySelector('.status').innerHTML = html011;

                //show email
                html111 = '';
                html111 += `<a id="email">` + response.data.user['jenis_kel'] + `</a>` + `<br>`
                document.querySelector('.jenis_kelamin').innerHTML = html111;

                //show email
                html001 = '';
                html001 += `<a id="email">` + response.data.user['tgl_lahir'] + `</a>` + `<br>`
                document.querySelector('.tgl_lahir').innerHTML = html001;

                //show email
                html001 = '';
                html001 += `<a id="email">` + response.data.user['alamat'] + `</a>` + `<br>`
                document.querySelector('.alamat').innerHTML = html001;


                //show nonaktifkan
                html0011 = '';
                html0011 += `<a href = "` + api + "admin/user/student/status?token=" + urlParams.get('id') + `" class = "mb-2 mr-2 btn btn-primary">Nonaktifkan Akun</a>` + `<br>`
                document.querySelector('.route').innerHTML = html0011;

                //show progress
                html = '';
                $.each(response.data.classes, function(index, row) {
                    html += '<tr>';
                    html += '<td>' + (index + 1) + '</td>';
                    html += '<td>' + row.class_name + '</td>';
                    html += '<td><div class="progress-bar-sm progress-bar-animated-alt progress"><div class="progress-bar bg-primary" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: ' + row.class_prosentase.toFixed(2) + '%;">' + row.class_prosentase.toFixed(2) + '%</div></div></td>';
                    html += '</tr>';
                });
                document.querySelector('.tbody').innerHTML = html;
                $('.table').DataTable();

                //show sub
                html1 = '';
                $.each(response.subscription, function(index, row) {
                    html1 += '<tr>';
                    html1 += '<td>' + (index + 1) + '</td>';
                    html1 += '<td>' + row.subs + '</td>';
                    html1 += '</tr>';
                });
                document.querySelector('.tbody1').innerHTML = html1;





            }
        });
    }
    load_detail();
</script>

@endsection

@extends('layouts.layout')