@section('title', 'Pengaturan Banner')
@section('title-description', 'Pengaturan Homepage / Marketing Banner')
@section('title-icon', 'pe-7s-home')
@section('top-button')
<a href="{{ route('homepage-setting-marketing-banner-create') }}" class="btn btn-focus">Tambah Banner</a>
@endsection
@section('content')
<div class="row">
    @foreach([1,2,3,4] as $row)
    <div class="col-4">
        <div class="card mb-4">
            <img class="card-img-top" src="{{ url('css/assets/images/avatars/' .$row. '.jpg') }}" alt="Card image cap" style="height: 100px;">
            <div class="card-body">
                <h5 class="card-title">Banner {{ $row }}</h5>
                <a href="{{ route('homepage-setting-marketing-banner-edit') }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('js')
<script>
    $('table').DataTable();
</script>
@endsection
@extends('layouts.layout')