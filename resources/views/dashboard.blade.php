@section('title', 'Dashboard')
@section('title-description', '')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div class="main-card mb-3 card">
    <div class="no-gutters row">
        <div class="col-md-4">
            <div class="pt-0 pb-0 card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Total Students</div>
                                        <div class="widget-subheading">Data Terkini</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-success"><b id="siswa"><i class="fa fa-spin fa-spinner"></i></b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Total Subscriber</div>
                                        <div class="widget-subheading">Data Terkini</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-primary"> <b id="sub"><i class="fa fa-spin fa-spinner"></i></b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="pt-0 pb-0 card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Total Mentor</div>
                                        <div class="widget-subheading">Data Terkini</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-danger"><b id="mentor"><i class="fa fa-spin fa-spinner"></i></b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Total Kelas</div>
                                        <div class="widget-subheading">Data Terkini</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-warning"><b id="kelas"><i class="fa fa-spin fa-spinner"></i></b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="pt-0 pb-0 card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Total QnA</div>
                                        <div class="widget-subheading">Data Terkini</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-success"><b id="qna"><i class="fa fa-spin fa-spinner"></i></b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="widget-content p-0">
                            <div class="widget-content-outer">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Total Forum</div>
                                        <div class="widget-subheading">Data Terkini</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-primary"><b id="forum"><i class="fa fa-spin fa-spinner"></i></b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Popular QnA</h5>
                <table class="mb-0 table table-fix">
                    <thead>
                        <tr>
                            <th width="50px">#</th>
                            <th width="75px">Penanya</th>
                            <th width="150px">Pertanyaan</th>
                            <th width="150px">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        <tr>
                            <td colspan="4" class="text-center">
                                <i class="fa fa-spin fa-spinner"></i> Mohon Tunggu Sebentar ...
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Popular Forum</h5>
                <table class="mb-0 table table-fix">
                    <thead>
                        <tr>
                            <th width="50px">#</th>
                            <th width="80px">Pengarang</th>
                            <th width="150px">Judul Forum</th>
                            <th width="110px">Action</th>
                        </tr>
                    </thead>
                    <tbody class="tbody2">
                        <tr>
                            <td colspan="4" class="text-center">
                                <i class="fa fa-spin fa-spinner"></i> Mohon Tunggu Sebentar ...
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-13">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Sub Terkini</h5>
            <table class="mb-0 table table-striped table-fix">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th width="500px">Nama</th>
                        <th>Jenis Paket</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="tbody3">
                    <tr>
                        <td colspan="4" class="text-center">
                            <i class="fa fa-spin fa-spinner"></i> Mohon Tunggu Sebentar ...
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>

//dashboard
function load_dashboard() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin?token=" + token,
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {
        $('#cover-spin').hide();
                    $('.page-title-text').html("Dashboard" + '<div class="page-title-subheading">' + moment().format('MMMM Do YYYY') + '</div>');

                        $('.fa-spinner').removeClass('fa-spinner').removeClass('fa-spin');
                        document.getElementById('sub').textContent = response.data['jml-subs'];
                        document.getElementById('siswa').textContent = response.data['jml-siswa'];
                        document.getElementById('forum').textContent = response.data['jml-forum'];
                        document.getElementById('mentor').textContent = response.data['jml-mentor'];
                        document.getElementById('kelas').textContent = response.data['jml-class'];
                        document.getElementById('qna').textContent = response.data['jml-qna'];

                        html = '';
                        $.each(response.data.qna, function(index, row) {
                            html += '<tr>';
                            html += '<td>' + (index + 1) + '</td>';
                            html += '<td>' + row.nama + '</td>';
                            html += '<td>' + row.deskripsi.substring(0, 100) + "..." + '</td>';
                            html += '<td>' + '<div class="btn-group-sm btn-group"><a href="" type="button" class="btn btn-success">Jawab</a>'+ `<a href="{{ route('qna-detail') }}?token=` + row['qna-uuid'] + `" class="btn btn-info">Rincian</a>` + '</div>' + '</td>';
                            html += '</tr>';
                        });

                        document.querySelector('.tbody').innerHTML = html;

                        html1 = '';
                        $.each(response.data.forum, function(index, row) {
                            html1 += '<tr>';
                            html1 += '<td>' + (index + 1) + '</td>';
                            html1 += '<td>' + row.nama + '</td>';
                            html1 += '<td>' + row.judul.substring(0, 100) + "..." + '</td>';
                            html1 += '<td>' + '<div class="btn-group-sm btn-group"><a href="" type="button" class="btn btn-success">Jawab</a>' + `<a href="{{ route('forum-topik-detail') }}?token=` + row['forum-uuid'] + `" class="btn btn-info">Rincian</a>` + '</div>' + '</td>';
                            html1 += '</tr>';
                        });

                        document.querySelector('.tbody2').innerHTML = html1;

                        html2 = '';
                        $.each(response.data.subs, function(index, row) {
                            $a = 'paket-jenis';
                            html2 += '<tr>';
                            html2 += '<td>' + (index + 1) + '</td>';
                            html2 += '<td>' + row.nama + '</td>';
                            html2 += '<td>' + row['paket-jenis'] + ' Bulan</td>';
                            html2 += '<td>' + row['paket-status'] + '</td>';
                            html2 += '<td>' + '<div role="group" class="btn-group-sm btn-group btn-group-toggle" data-toggle="buttons"><a href="" type="button" class="btn btn-info">Details</a></div>' + '</td>';
                            html2 += '</tr>';
                        });

                        document.querySelector('.tbody3').innerHTML = html2;






        });
    }
    load_dashboard();


    // async function getISS() {
    //     const response = await fetch('https://floating-harbor-93486.herokuapp.com/api/admin?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9mbG9hdGluZy1oYXJib3ItOTM0ODYuaGVyb2t1YXBwLmNvbVwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYzMTM2NzgwMCwiZXhwIjoxNjkxMzY3NzQwLCJuYmYiOjE2MzEzNjc4MDAsImp0aSI6IjI4RlhES0gydDBwVDFXMDciLCJzdWIiOjgsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.yJk1mYacAC5MjySzISUAjNQt8O0UUBjnNf-q-MNKoCw');
    //     const datas = await response.json();
    //     const {
    //         data,
    //     } = datas;


    // $('.page-title-text').html("Dashboard" + '<div class="page-title-subheading">' + moment().format('MMMM Do YYYY') + '</div>');

    //     console.log(data)
    //     $('.fa-spinner').removeClass('fa-spinner').removeClass('fa-spin');
    //     document.getElementById('sub').textContent = data['jml-subs'];
    //     document.getElementById('siswa').textContent = data['jml-siswa'];
    //     document.getElementById('forum').textContent = data['jml-forum'];
    //     document.getElementById('mentor').textContent = data['jml-mentor'];
    //     document.getElementById('kelas').textContent = data['jml-class'];
    //     document.getElementById('qna').textContent = data['jml-qna'];

    //     html = '';
    //     $.each(data.qna, function(index, row) {
    //         html += '<tr>';
    //         html += '<td>' + (index + 1) + '</td>';
    //         html += '<td>' + row.nama + '</td>';
    //         html += '<td>' + row.deskripsi.substring(0, 100) + "..." + '</td>';
    //         html += '<td>' + '<div role="group" class="btn-group-sm btn-group btn-group-toggle" data-toggle="buttons"><a href="" type="button" class="btn btn-success">Answer</a><a href="" type="button" class="btn btn-info">Details</a></div>' + '</td>';
    //         html += '</tr>';
    //     });

    //     document.querySelector('.tbody').innerHTML = html;

    //     html1 = '';
    //     $.each(data.forum, function(index, row) {
    //         html1 += '<tr>';
    //         html1 += '<td>' + (index + 1) + '</td>';
    //         html1 += '<td>' + row.nama + '</td>';
    //         html1 += '<td>' + row.judul.substring(0, 100) + "..." + '</td>';
    //         html1 += '<td>' + '<div role="group" class="btn-group-sm btn-group btn-group-toggle" data-toggle="buttons"><a href="" type="button" class="btn btn-success">Answer</a><a href="" type="button" class="btn btn-info">Details</a></div>' + '</td>';
    //         html1 += '</tr>';
    //     });

    //     document.querySelector('.tbody2').innerHTML = html1;

    //     html2 = '';
    //     $.each(data.subs, function(index, row) {
    //         $a = 'paket-jenis';
    //         html2 += '<tr>';
    //         html2 += '<td>' + (index + 1) + '</td>';
    //         html2 += '<td>' + row.nama + '</td>';
    //         html2 += '<td>' + row['paket-jenis'] + ' Bulan</td>';
    //         html2 += '<td>' + row['paket-status'] + '</td>';
    //         html2 += '<td>' + '<div role="group" class="btn-group-sm btn-group btn-group-toggle" data-toggle="buttons"><a href="" type="button" class="btn btn-info">Details</a></div>' + '</td>';
    //         html2 += '</tr>';
    //     });

    //     document.querySelector('.tbody3').innerHTML = html2;


    // }
    // getISS();
</script>
@endsection


@extends('layouts.layout')