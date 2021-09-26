@section('title', 'Pembayaran')
@section('title-description', 'Memantau transaksi dan keuangan aplikasi')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a>
                    <div class="link">
                        <h6>Total Saldo</strong></h6>
                    </div>
                </a>
                <a>
                    <div>
                        <h5><strong>RP. 12.000.000</strong></h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a>
                    <div class="link">
                        <h6>Jumlah Transaksi</strong></h6>
                    </div>
                </a>
                <a>
                    <div>
                        <h5><strong>20</strong></h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>


<a href="{{ route('penarikansaldo')}}" class="btn btn-success">Tarik Saldo</a>
<br>
<br>
<div class="card card-body">

    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <h4>Daftar Transaksi</h4>

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select> entries</label></div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0"></label></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="dataTable table no-footer" width="100%" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                            <td class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 24.2px;">#</td>
                            <td class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Judul QnA: activate to sort column ascending" style="width: 148.2px;">Judul QnA</td>
                            <td class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Detail QnA: activate to sort column ascending" style="width: 279.2px;">Detail QnA</td>
                            <td class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Penanya: activate to sort column ascending" style="width: 133.2px;">Penanya</td>
                            <td class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Dibuat: activate to sort column ascending" style="width: 157.2px;">Dibuat</td>
                            <td data-orderable="false" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Tanggapan" style="width: 96.4px;">Tanggapan</td>
                            <td data-orderable="false" class="sorting_disabled" rowspan="1" colspan="1" aria-label="Action" style="width: 73.4px;">Action</td>
                        </tr>
                    </thead>
                    <tbody>

                        <tr class="odd">
                            <td class="sorting_1">1</td>
                            <td>Kenapa bumi bulat?</td>
                            <td>Keterangan Dibuat 15 kata terus (...)</td>
                            <td>Nanda Abdi Tanya</td>
                            <td>12/12/2021 10.00PM</td>
                            <td>
                                12 <i class="pe-7s-like"></i> <br>
                                12 <i class="pe-7s-chat"></i>
                            </td>
                            <td>
                                <a class="btn-icon btn-icon-only btn btn-primary mobile-toggle-header-nav active" href="{{route('detailtransaksi')}}">Detail</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                    <ul class="pagination">
                        <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                        <li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                        <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@endsection

@extends('layouts.layout')