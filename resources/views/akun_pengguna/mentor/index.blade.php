@section('title', 'Mentor')
@section('title-description', 'Manajemen Data Pengajar')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div>
    <a href="{{route('tambahmentor')}}" class="mb-2 mr-2 btn btn-primary">Tambah Siswa</a>
</div>
<br>
<div class="main-card mb-3 card">
    <div class="card-body">
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <td>Saya</td>
                <td>CEO</td>
                <td>Rahasia</td>
                <td>999</td>
                <td>Selasa</td>
                <td>
                    <a href="{{route('detailmentor')}}" type="button" class="btn btn-info btn-sm">Details
                    </a>
                </td>


            </tbody>

        </table>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.25/datatables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection
@extends('layouts.layout')