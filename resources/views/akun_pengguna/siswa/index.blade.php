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
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Michael Bruce</td>
                <td>Javascript Developer</td>
                <td>Singapore</td>
                <td>29</td>
                <td>2011/06/27</td>
                <td>
                    <a href="{{route('detailsiswa')}}" type="button" class="btn btn-info btn-sm">Details
                    </a>
                </td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
                <td>$112,000</td>
            </tr>
        </tbody>

    </table>
</div>
</div>

@endsection

@section('js')

@endsection
@extends('layouts.layout')