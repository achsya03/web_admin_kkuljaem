@section('title', '')
@section('title-description', '')
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
            <a data-toggle="modal" data-target=".bd-example-modal-sm-edit1" onclick="editQuiz()" class="btn-icon btn-icon-only btn btn-primary mobile-toggle-header-nav" href="">Sunting Quiz</a>
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
                        <div class="position-relative form-group route1">
                        </div>
                    </div>
                    <table class="table table-hover table-striped table-bordered dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
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
<!-- edit Quiz -->
<div class="modal fade bd-example-modal-sm-edit1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Forum Edit Quiz</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="position-relative form-group"><label for="exampleEmail" class="">Letak</label>
                    <div class="form-row">
                        <div class="col-md-3">
                            <input name="id_q" id="id_q" hidden class="form-control">

                            <input name="nomor_q_edit" id="nomor_q_edit" placeholder="" type="number" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group"><label for="exampleEmail" class="">Judul Quiz</label>
                    <input name="judul_q_edit" id="judul_q_edit" placeholder="" type="text" class="form-control">
                </div>
                <div class="position-relative form-group"><label for="exampleEmail" class="">Keterangan</label>
                    <textarea name="keterangan_q_edit" id="keterangan_q_edit" placeholder="" type="text" class="form-control"></textarea>
                    <small class="form-text text-muted">Jumlah Kata 0 (Max 500 Karakter)</small>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="updatequiz($('#id_q').val())" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    //show view atas
    async function getview() {
        const response = await fetch(' https://kkuljaem-api-new-3-ft4mz.ondigitalocean.app/api/admin/classroom/content/quiz/all?token=' + urlParams.get('token'));
        const datas = await response.json();
        const {
            data,
        } = datas;
        console.log(data)
        $('.page-title-text').html(data.judul + '<div class="page-title-subheading">' + data.keterangan + '</div>');

    }
    getview();

    //SHOW EDIT quiz
    function editQuiz() {
        $.ajax({
            method: 'get',
            url: ' https://kkuljaem-api-new-3-ft4mz.ondigitalocean.app/api/admin/classroom/content/quiz/detail?token=' + urlParams.get('token'),
            dataType: 'json',
            success: function(response) {
                console.log(response)

                if (response.message !== 'Success') {
                    // $.growl.warning({
                    //     message: response.message
                    // });
                } else if (response.message == 'Success') {
                    document.getElementById('id_q').value = response.data['uuid'];
                    document.getElementById('nomor_q_edit').value = response.data['nomor'];
                    document.getElementById('judul_q_edit').value = response.data['judul'];
                    document.getElementById('keterangan_q_edit').value = response.data['keterangan'];


                }
            }
        });
    }


    // update quiz
    function updatequiz() {
        $.ajax({
            type: "post",
            url: 'https://kkuljaem-api-new-3-ft4mz.ondigitalocean.app/api/admin/classroom/content/quiz/update?token=' + urlParams.get('token'),
            data: {
                'nomor': $("#nomor").val(),
                'judul': $("#judul_q_edit").val(),
                'tipe': 'quiz',
                'keterangan': $("#keterangan_q_edit").val(),
            },
            success: function(response) {
                if (response.message !== 'Success') {

                } else if (response.message == 'Success') {
                    $(".btn-close").click();
                    window.location = "{{route('quizsiswa')}}?token=" + urlParams.get('token');
                }

            }
        });
    }




    //show data
    $('.dataTable').dataTable({
        "ajax": {
            "url": api + "admin/classroom/content/quiz/all?token=" + urlParams.get('token'),
            "dataType": 'json',
            "type": "GET",
            "dataSrc": function(response) {

                //tambahsoal
                html0000 = '';
                html0000 += `<a class="btn-icon btn-icon-only btn btn-primary mobile-toggle-header-nav"  href="{{ route('tambahsoalquiz') }}?token=` + urlParams.get('token') + `" > Tambah Soal</a>`
                document.querySelector('.route1').innerHTML = html0000;


                $('#keterangan').html(response.data.keterangan);
                $('#judul').html(response.data.judul);
                return response.data.exam;
            },
            "beforeSend": function(xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + token);
            },
        },
        "columns": [{
            "data": "nomor"
        }, {
            "data": "pertanyaan"
        }, {
            "data": "jawaban"
        }, {
            "data": "exam_uuid",
            "render": function(data) {
                return `<a href="{{ route('editsoalquiz') }}?token=` + data + `" class="btn btn-sm btn-focus mb-2">Detail</a>` +
                    `<button onclick="hapus('` + api + `admin/classroom/content/quiz/exam?token=` + data + `')"  class="btn btn-sm btn-danger mb-2">Hapus</button>`
            }
        }, ]
    });
</script>
@endsection
@extends('layouts.layout')