@section('title', 'Pengaturan Banner')
@section('title-description', 'Pengaturan Homepage / Marketing Banner')
@section('title-icon', 'pe-7s-home')
@section('top-button')
<a href="{{ route('homepage-setting-marketing-banner-create') }}" class="btn btn-focus">Tambah Banner</a>
@endsection
@section('content')
<div class="row" id="banner-content"></div>
@endsection

@section('js')
<script>
    $('#cover-spin').show();
    $.ajax({
        "url": api + "admin/banner",
        "method": "get",
        "headers": {
            "Accept": "application/json",
            "Authorization": 'bearer ' + token,
        }
    }).done(function(response) {
        if (response.message == 'Success') {
            html = '';
            $.each(response.data, function(index, row) {
                html += '<div class="col-4">';
                html += '<div class="card mb-4">';
                html += '<img class="card-img-top" src="' + row.url_web + '" alt="Card image cap" style="height: 100px; object-fit: cover;">';
                html += '<div class="card-body">';
                html += '<h5 class="card-title">' + row.judul_banner + '</h5>';
                html += '<a href="{{ route("homepage-setting-marketing-banner-edit") }}?id=' + row.uuid + '" class="btn btn-primary">Edit</a>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
            });
            $('#banner-content').html(html);
            $('#cover-spin').hide();
        }
    });
</script>
@endsection
@extends('layouts.layout')