@section('title', 'Laporan Pengguna')
@section('title-description', 'Manajemen Laporan daro pengguna aplikasi dan mentor')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="mb-3 card">
            <div class="card-header card-header-tab-animation">
                <ul class="nav nav-justified">
                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-0" class="nav-link show active">LAPORAN (22)</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-1" class="nav-link show">DAFTAR PENGABAIAN (2)</a></li>
                </ul>
            </div>

        </div>
    </div>
</div>
<div class="card card-body">
    <div class="row">
        <div class="col-7 col-md-4 col-xl-4">
            <div class="position-relative form-group">
                <label>Tampilkan Berdasarkan</label>
                <select name="#" class="custom-select">
                    <option value="#">Semua Kelas</option>
                </select>
            </div>
        </div>
        <div class="col-4 col-md-1 col-xl-1">
            <label class="text-light">.</label>
            <button class="btn btn-focus btn-lg">Terapkan</button>
        </div>
    </div>
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
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
                                <a data-toggle="modal" data-target=".bd-example-modal-sm1" class="btn-icon btn-icon-only btn btn-primary mobile-toggle-header-nav active" class="btn btn-sm btn-focus">Detail</a>
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


@endsection
@section('modal')
<div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Konten</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span style="color:black"><strong>Jenis</strong></span><br>Jenis
                <br>
                <span style="color:black"><strong>Judul</strong></span><br>Judul
                <br>
                <span style="color:black"><strong>Detail</strong></span><br>Detail
                <br>
                <span style="color:black"><strong>Isi</strong></span><br>Isi
                <br> <br> <br> <br> <br> <br>

                <span style="color:black"><strong>Gambar</strong></span>
                <br>
                <td>Gambar 1</td>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Abaikan</button>
                <button type="button" class="btn btn-primary">Blokir</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection
@extends('layouts.layout')