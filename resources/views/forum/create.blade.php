@section('title', 'Buat Forum')
@section('title-description', 'Forum / Topik A')
@section('title-icon', 'pe-7s-news-paper')

@section('content')
<div class="card card-body">
    <div class="row">
        <div class="col-5">
            <div class="position-relative form-group">
                <label>Topik</label>
                <select name="#" class="custom-select">
                    <option value="#">Kpop</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="position-relative form-group">
                <label>Judul Forum</label>
                <input type="text" class="form-control" placeholder="Judul Forum">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="position-relative form-group">
                <label>Konten Forum</label>
                <textarea name="#" rows="5" class="form-control" placeholder="Konten Forum"></textarea>
                <small>Jumlah Kata 0 (max 200 kata)</small>
            </div>
        </div>
    </div>
    @foreach([1,2,3] as $row)
    <div class="row">
        <div class="col-5">
            <div class="position-relative form-group">
                <label>Gambar {{ $row }}</label>
                <div class="position-relative form-group">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="#">
                            <label class="custom-file-label">Pilih File</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="col-5">
            <small>Format .jpg Ukuran gambar 123px * 123px dengan masimal ukuran keseluruhan file 2MB</small>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="row">
                <div class="col-4">
                    <img src="{{ url('css/assets/images/avatars/1.jpg') }}" width="100%">
                </div>
                <div class="col-4">
                    <img src="{{ url('css/assets/images/avatars/2.jpg') }}" width="100%">
                </div>
                <div class="col-4">
                    <img src="{{ url('css/assets/images/avatars/3.jpg') }}" width="100%">
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-5">
            <div class="position-relative form-group">
                <input type="checkbox" placeholder="Judul Forum"> Atur sebagai topik terpilih.
            </div>
            <button class="btn btn-success">Publikasikan</button>
        </div>
    </div>
</div>
@endsection
@extends('layouts.layout')