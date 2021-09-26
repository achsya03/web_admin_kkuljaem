@section('title', 'Detail Siswa')
@section('title-description', 'Akun Pengguna/Siswa/Detail Siswa')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')

<h4 style="color:black"><strong>Nanda Mohammad</strong></h4>
nandamohammad@gmail.com <br>

<span style="color:black"><strong>Status</strong></span><br>Member
<br>
<span style="color:black"><strong>Jenis Kelamin</strong></span><br>Laki-Laki
<br>

<span style="color:black"><strong>Tanggal Lahir</strong></span><br>nandamohammad@gmail.com5>
<br>

<span style="color:black"><strong>Alamat</strong></span><br>nandamohammad@gmail.com


<br>
<br>
<a>Pin telang dipasang </a><a href="">Lihat Peta</a>

<br>
<div>
    <a href="{{route('siswa')}}" class="mb-2 mr-2 btn btn-primary">
        Nonaktifkan Akun</a>
</div>
<div class="col-lg-13">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Progress Pembelajaran</h5>
            <table class="mb-0 table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kelas</th>
                        <th>Progress</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>
                            <div class="mb-3 progress ">
                                <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">25%</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>
                            <div class="mb-3 progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">25%</div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">History Langganan</h5>
        <strong>- </strong>
        <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</td>
    </div>
</div>
@endsection
@extends('layouts.layout')