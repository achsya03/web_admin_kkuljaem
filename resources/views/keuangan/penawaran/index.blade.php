@section('title', 'Penawaran')
@section('title-description', 'Manajemen Penawaran paket belajar')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')

<div class="col-md-4">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <a>
                <div class="link">
                    <h5><strong><u>12 Bulan</strong> (Rp. 20.000)</h5></u>
                </div>
            </a>
            <div class="position-relative form-group"><a data-toggle="modal" data-target=".bd-example-modal-sm" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav" href=""> Edit</a></div>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <a>
                <div class="link">
                    <h5 href=""><strong><u>8 Bulan</strong>(Rp. 20.000</h5></u>
                </div>
            </a>
            <div class="position-relative form-group"><a data-toggle="modal" data-target=".bd-example-modal-sm" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav" href=""> Edit</a></div>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5><strong>Tambah Penawaran</strong></h5>
            <div class="position-relative form-group">
                <div class="position-relative form-group"><label for="exampleSelect" class="">Pilih bank tujuan</label>
                    <select name="select" id="exampleSelect" class="form-control">
                        <option>1</option>
                        <option>2</option>
                    </select>
                </div>
            </div>
            <div class="position-relative form-group"><label for="exampleEmail" class="">Harga Penawaran</label><input name="email" id="exampleEmail" placeholder="Masukkan Keterangan singkat disini" type="email" class="form-control"></div>
            <div class="position-relative form-group"> <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Tambahkan</button></div>
        </div>
    </div>
</div>
@endsection
@section('modal')
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5><strong>Tambah Penawaran</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="position-relative form-group">
                    <div class="position-relative form-group"><label for="exampleSelect" class="">Pilih bank tujuan</label>
                        <select name="select" id="exampleSelect" class="form-control">
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                </div>
                <div class="position-relative form-group"><label for="exampleEmail" class="">Harga Penawaran</label><input name="email" id="exampleEmail" placeholder="Masukkan Keterangan singkat disini" type="email" class="form-control"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
@extends('layouts.layout')