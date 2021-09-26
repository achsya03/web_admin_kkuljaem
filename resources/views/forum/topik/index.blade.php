@section('title', 'Topik A')
@section('title-description', 'Forum / Topik A')
@section('title-icon', 'pe-7s-news-paper')
@section('top-button')
<a href="{{ route('forum-create') }}" class="btn btn-focus">Buat Posting Baru</a>
@endsection
@section('content')
<div class="card card-body mb-4">
    <h3>Forum Terpilih (15)</h3>
    <table class="dataTable table">
        <thead>
            <tr>
                <td>#</td>
                <td>Status</td>
                <td>Judul Forum</td>
                <td>Konten Forum</td>
                <td>Penulis</td>
                <td>Dibuat</td>
                <td data-orderable="false">Tanggapan</td>
                <td data-orderable="false">Action</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Publik</td>
                <td>Judul Forumnya</td>
                <td>Keterangan Dibuat 20 kata terus (...)</td>
                <td>Anda</td>
                <td>12/12/2021 10.00PM</td>
                <td>
                    12 <i class="pe-7s-like"></i> <br>
                    12 <i class="pe-7s-chat"></i>
                </td>
                <td>
                    <a href="{{ route('forum-topik-detail') }}" class="btn btn-sm btn-focus mb-1">Detail</a>
                    <a href="{{ route('forum-topik-detail') }}" class="btn btn-sm btn-info mb-1">Keluarkan dari Terpilih</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Publik</td>
                <td>Judul Forumnya</td>
                <td>Keterangan Dibuat 20 kata terus (...)</td>
                <td>Anda</td>
                <td>12/12/2021 10.00PM</td>
                <td>
                    12 <i class="pe-7s-like"></i> <br>
                    12 <i class="pe-7s-chat"></i>
                </td>
                <td>
                    <a href="{{ route('forum-topik-detail') }}" class="btn btn-sm btn-focus mb-1">Detail</a>
                    <a href="{{ route('forum-topik-detail') }}" class="btn btn-sm btn-info mb-1">Keluarkan dari Terpilih</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="card card-body">
    <h3 class="mt-4">Semua Forum (15)</h3>
    <table class="dataTable table">
        <thead>
            <tr>
                <td>#</td>
                <td>Status</td>
                <td>Judul Forum</td>
                <td>Konten Forum</td>
                <td>Penulis</td>
                <td>Dibuat</td>
                <td data-orderable="false">Tanggapan</td>
                <td data-orderable="false">Action</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Publik</td>
                <td>Judul Forumnya</td>
                <td>Keterangan Dibuat 20 kata terus (...)</td>
                <td>Anda</td>
                <td>12/12/2021 10.00PM</td>
                <td>
                    12 <i class="pe-7s-like"></i> <br>
                    12 <i class="pe-7s-chat"></i>
                </td>
                <td>
                    <a href="{{ route('forum-topik-detail-saya') }}" class="btn btn-sm btn-focus mb-1">Detail</a>
                    <a href="{{ route('forum-topik-detail-saya') }}" class="btn btn-sm btn-info mb-1">Atur sebagai Terpilih</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@section('js')
<script>
    $('.dataTable').DataTable();
</script>
@endsection
@extends('layouts.layout')