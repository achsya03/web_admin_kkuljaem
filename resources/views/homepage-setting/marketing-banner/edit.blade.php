@section('title', 'Sunting Marketing Banner')
@section('title-description', 'Pengaturan Homepage / Marketing Banner')
@section('title-icon', 'pe-7s-home')

@section('content')
<div class="row">
    <div class="card card-body">
        <form action="#">
            <div class="row">
                @include('homepage-setting.marketing-banner.form')
                <div class="col-12">
                    <button class="btn btn-danger">Hapus</button>
                    <button class="btn btn-success pull-right">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.layout')