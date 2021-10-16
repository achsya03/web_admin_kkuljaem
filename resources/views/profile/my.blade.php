@section('title', 'Detail Saya')
@section('title-icon', 'pe-7s-user')

@section('content')
<div class="card card-body mb-4 d-none">
    <img width="150" height="150" class="rounded-circle" src="http://localhost:8000/css/assets/images/avatars/1.jpg" alt="" id="foto">
    <h1 class="mb-0" id="nama"></h1>
    <h6 class="mt-0 mb-3" id="email"></h6>
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Status</label>
        <div id="status"></div>
    </div>
    <div class="position-relative form-group">
        <label class="font-weight-bold mb-0">Bio</label>
        <div id="bio"></div>
    </div>
    <div class="position-relative form-group">
        <a href="{{ route('profile-edit') }}" class="btn btn-alternate">Sunting Akun Mentor</a>
    </div>
</div>

<div class="card card-body d-none">
    <h6 class="mt-2">Mentor Pada : </h6>
</div>
@endsection

@section('js')
<script>
    $('#cover-spin').show();
    $.ajax({
        "url": api + "admin/profile",
        "method": "get",
        "headers": {
            "Accept": "application/json",
            "Authorization": 'bearer ' + token,
        }
    }).done(function(response) {
        $('#cover-spin').hide();
        if (response.message == "Success") {
            $('#foto').attr('src', response.data.user.foto);
            $('#nama').html(response.data.user.nama);
            $('.page-title-subheading').html(response.data.user.email);
            $('#email').html(response.data.user.email);
            $('#status').html(response.data.user.status);
            $('#bio').html(response.data.user.bio);
            $('.card').removeClass('d-none');
        }
    });
</script>
@endsection

@extends('layouts.layout')