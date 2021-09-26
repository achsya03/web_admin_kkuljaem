@section('title', 'Detail Saya')
@section('title-description', 'nanda.mochammad@gmail.com')
@section('title-icon', 'pe-7s-user')

@section('content')
<div class="card card-body mb-4">
    <img width="150" class="rounded-circle" src="http://localhost:8000/css/assets/images/avatars/1.jpg" alt="">
    <h1 class="mb-0">Nanda Mochammad</h1>
    <h6 class="mt-0 mb-3">nanda.mochammad@gmail.com</h6>
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Status</label>
        <div>Mentor</div>
    </div>
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Bio</label>
        <div>Saya adalah mentor khusus untuk pembelajaran awal</div>
    </div>
    <div class="position-relative form-group">
        <a href="{{ route('profile-edit') }}" class="btn btn-alternate">Sunting Akun Mentor</a>
    </div>
</div>

<div class="card card-body">
    <h6 class="mt-2">Mentor Pada : </h6>
    <ol>
        <li>asa</li>
        <li>asa</li>
    </ol>
</div>
@endsection

@extends('layouts.layout')