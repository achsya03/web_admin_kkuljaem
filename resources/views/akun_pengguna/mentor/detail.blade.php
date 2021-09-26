@section('title', 'Detail Mentor')
@section('title-description', 'Akun Pengguna/Mentor/Detail Mentor')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')

<div>
    <div>
        <img src="{{url('img/unnamed.jpg')}}" alt="Avatar 6" style="border-radius: 50%; width:200px;" />
    </div>
</div>
<br>
<h4 style="color:black"><strong>Jada Facer</strong></h4>
nandamohammad@gmail.com <br>

<span style="color:black"><strong>Status</strong></span><br>Member
<br>
<span style="color:black"><strong>Bio</strong></span><br>Lovely woman

<br>

<br>
<div>
    <a href="{{route('editmentor')}}" class="mb-2 mr-2 btn btn-primary">
        Sunting Akun Mentor</a>
    <a href="" class="mb-2 mr-2 btn btn-primary">
        Hapus Akun Mentor</a>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Mentor di kelas :</h5>
        <strong>- </strong>
        <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</td>
    </div>
</div>
@endsection
@extends('layouts.layout')