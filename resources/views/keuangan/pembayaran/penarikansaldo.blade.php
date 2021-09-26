@section('title', 'Penarikan Saldo')
@section('title-description', 'Memantau transaksi dan keuangan aplikasi')
@section('title-icon', 'pe-7s-bookmarks')

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
    <div class="row">
        <div class="col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <form action="{{ url('/user/form/insert') }}" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="position-relative form-group"><label for="exampleSelect" class="">Pilih bank tujuan</label>
                                    <select name="select" id="exampleSelect" class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="position-relative form-group"><label for="exampleText" class="">Nominal yang ditarik</label><input name="text" id="exampleText" class="form-control"></input></div>
                            </div>
                        </div>
                        <button class="mt-1 btn btn-success">Tarik </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@extends('layouts.layout')