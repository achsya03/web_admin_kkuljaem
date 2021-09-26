@section('title', 'Sunting Soal ')
@section('title-description', 'Kelas/Kelas Perkenalan/ Video Perkenalan 1')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div class="row">

    <div class="col-md-1">
        <a href="" class="mb-2 mr-2 btn btn-info">Sunting</a>
    </div>

</div>
<br>
<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
    <div class="row">
        <div class="col-md-12">
            <form action="" method="POST">

                @include('menu_kelas.kelas.video.soal.form')


            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.layout')