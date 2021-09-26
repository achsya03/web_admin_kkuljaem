@section('title', 'Kelas Percakapan 1')
@section('title-description', 'Manajemen Grup Kelas, Data kelas dan Materi pembelajaran')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <div class="text-dark font-weight-bold">
                Judul Quiz
            </div>
            <p id="judul"><i class="fa fa-spin fa-spinner"></i> Mohon Tunggu</p>
        </div>
        <div class="mb-3">
            <div class="text-dark font-weight-bold">
                Keterangan Quiz
            </div>
            <p id="keterangan"><i class="fa fa-spin fa-spinner"></i> Mohon Tunggu</p>
        </div>
        <div>
            <a data-toggle="modal" data-target=".bd-example-modal-sm1" class="btn-icon btn-icon-only btn btn-primary mobile-toggle-header-nav" href="">Sunting Quiz</a>
        </div>
    </div>
    <div class="col-md-6">
    </div>
</div>
<br>
<div class="col-lg-13">
    <div class="mb-3 card">
        <div class="card-body">
            <div class="tab-content">
                <div class="card-body">
                    <div>
                        <div class="position-relative form-group">
                            <a class="btn-icon btn-icon-only btn btn-primary mobile-toggle-header-nav" href="{{route('tambahsoalquiz')}}"> Tambah Soal</a>
                        </div>
                    </div>
                    <table class="table table-hover table-striped table-bordered dataTable">
                        <thead>
                            <tr>
                                <th>Pertanyaan</th>
                                <th>Jawaban Benar</th>
                                <th width="1px" data-orderable="false">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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
                <h5 class="modal-title" id="exampleModalLongTitle"> Sunting Quiz</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="position-relative form-group"><label for="exampleEmail" class="">Letak</label>
                    <div class="form-row">
                        <div class="col-md-3"><input name="email" id="exampleEmail" placeholder="" type="email" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group"><label for="exampleEmail" class="">Judul Quiz</label><input name="email" id="exampleEmail" placeholder="" type="email" class="form-control"></div>
                <div class="position-relative form-group"><label for="exampleEmail" class="">Keterangan</label><textarea name="email" id="exampleEmail" placeholder="" type="email" class="form-control"></textarea>
                    <small class="form-text text-muted">Jumlah Kata 0 (Max 500 Karakter)</small>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    // $.ajax({
    //     "url": api + "admin/classroom/content/quiz/all?token=" + urlParams.get('token'),
    //     "method": "GET",
    //     "headers": {
    //         "Accept": "application/json",
    //         "Authorization": 'bearer ' + token,
    //     },
    // }).done(function(response) {
    //     if (response.message == 'Success') {
    //         $('#keterangan').html(response.data.keterangan);
    //         $('#judul').html(response.data.judul);
    //     }
    // });
    $('.dataTable').dataTable({
        "ajax": {
            "url": api + "admin/classroom/content/quiz/all?token=" + urlParams.get('token'),
            "dataType": 'json',
            "type": "GET",
            "dataSrc": function(response) {
                $('#keterangan').html(response.data.keterangan);
                $('#judul').html(response.data.judul);
                return response.data.exam;
            },
            "beforeSend": function(xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + token);
            },
        },
        "columns": [{
            "data": "pertanyaan"
        }, {
            "data": "jawaban"
        }, {
            "data": "exam_uuid",
            "render": function(data) {
                return `<a href="{{ route('qna-detail') }}?token=` + data + `" class="btn btn-sm btn-focus mb-2">Detail</a>` +
                    `<button onclick="hapus(` + api + `)" href="{{ route('qna-detail') }}?token=` + data + `" class="btn btn-sm btn-danger mb-2">Hapus</button>`
            }
        }, ]
    });
</script>
@endsection
@extends('layouts.layout')