@section('title', 'Konten Kelas')
@section('title-description', 'Manajemen Grup Kelas, Data kelas dan Materi pembelajaran')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div class="row">
    <div class="col-md-6">

        <span style="color:black"><strong>Judul Kelas</strong></span><br>
        <i class="fa fa-spin fa-spinner"></i>
        <a id="judul"></a>
        <br><br>

        <div>
            <span style="color:black"><strong>Deskripsi kelas</strong></span><br>
            <i class="fa fa-spin fa-spinner"></i>
            <a id="deskripsi"></a>
            <br><br>
        </div>
        <div>
            <span style="color:black"><strong>Mentor</strong></span><br>
            <i class="fa fa-spin fa-spinner"></i>
            <a id="mentor"></a>
            <br><br>
        </div>
        <div class="route">
        </div>
    </div>
    <div class="col-md-6">
        <div class="thumb1">
            <i class="fa fa-spin fa-spinner"></i>
        </div>
    </div>
</div>
<br>
<div class="col-lg-13">
    <div class="mb-3 card">
        <div class="card-header card-header-tab-animation">
            <ul class="nav">
                <li class="nav-item"><a data-toggle="tab" href="#tab-eg8-0" class="active nav-link">Materi</a></li>
                <li class="nav-item"><a data-toggle="tab" href="#tab-eg8-1" class="nav-link">Video Materi</a></li>
                <li class="nav-item"><a data-toggle="tab" href="#tab-eg8-2" class="nav-link">Quiz</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="tab-eg8-0" role="tabpanel">
                    <div>
                        <div class="position-relative form-group">
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Episode</th>
                                    <th>Jenis</th>
                                    <th>Judul Materi</th>
                                    <th>Keterangan</th>
                                    <th>Lainnya</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="tab-eg8-1" role="tabpanel">
                    <div>
                        <div class="position-relative form-group">
                            <a data-toggle="modal" data-target=".bd-example-modal-sm" onclick="getAddVideo()" class="btn-icon btn-icon-only btn btn-primary mobile-toggle-header-nav" href=""> Tambah Video</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-hover table-striped table-bordered">
                            <thead>
                                <th width="10px">Episode</th>
                                <th>Video Materi</th>
                                <th>Keterangan</th>
                                <th>URL Video</th>
                                <th>Lainnya</th>
                                <th width="10px" data-orderable="false">Action</th>
                                </tr>
                            </thead>
                            <tbody class="tbody1">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="tab-eg8-2" role="tabpanel">
                    <div class="position-relative form-group tambah-quiz">
                        <button data-toggle="modal" data-target=".bd-example-modal-sm1" class="btn-icon btn-icon-only btn btn-primary mobile-toggle-header-nav">Tambah Quiz</button>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="1px">Episode</th>
                                    <th>Judul Quiz</th>
                                    <th>Keterangan</th>
                                    <th>Lainnya</th>
                                    <th width="1px" data-orderable="false">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="tbody2">
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
@section('modal')
<!-- Modal VIdeo -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="position-relative form-group"><label for="exampleEmail" class="">Episode</label>
                    <div class="form-row">
                        <div class="col-md-3">
                            <input name="nomor" type="number" id="nomor" disabled class="form-control">
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group"><label class="">Judul Materi Video</label>
                    <input name="judul" id="judul_video" type="" class="form-control">
                </div>
                <div class="position-relative form-group">
                    <label for="exampleEmail" class="">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" placeholder="" class="form-control"></textarea>
                    <small class="form-text text-muted">Jumlah Kata 0 (Max 500 Karakter)</small>

                </div>
                <div class="position-relative form-group">
                    <label for="exampleEmail" class="">URL Video</label>
                    <input name="url_video" id="url_video" placeholder="" class="form-control">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="create()" class=" btn btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>
<!-- EDIT VIDEO -->
<div class="modal fade bd-example-modal-sm-edit" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="position-relative form-group"><label for="exampleEmail" class="">Episode</label>
                    <div class="form-row">
                        <div class="col-md-3">
                            <input name="id" id="id" hidden class="form-control">
                            <input name="nomor" type="number" id="nomor_edit" disabled class="form-control">
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group"><label class="">Judul Materi Video</label>
                    <input name="judul" id="judul_video_edit" type="" class="form-control">
                </div>
                <div class="position-relative form-group">
                    <label for="exampleEmail" class="">Keterangan</label>
                    <textarea name="keterangan" id="keterangan_edit" placeholder="" class="form-control"></textarea>
                    <small class="form-text text-muted">Jumlah Kata 0 (Max 500 Karakter)</small>

                </div>
                <div class="position-relative form-group">
                    <label for="exampleEmail" class="">URL Video</label>
                    <input name="url_video" id="url_video_edit" placeholder="" class="form-control">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="update($('#id').val())" class=" btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- tambahquiz -->
<div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Forum Tambah Quiz</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="position-relative form-group"><label for="exampleEmail" class="">Letak</label>
                    <div class="form-row">
                        <div class="col-md-3">
                            <input name="nomor_q" id="nomor_q" placeholder="" type="number" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group"><label for="exampleEmail" class="">Judul Quiz</label>
                    <input name="judul" id="judul_quiz" placeholder="" type="text" class="form-control">
                </div>
                <div class="position-relative form-group"><label for="exampleEmail" class="">Keterangan</label>
                    <textarea name="deskripsi" id="keterangan_q" placeholder="" type="text" class="form-control"></textarea>
                    <small class="form-text text-muted">Jumlah Kata 0 (Max 500 Karakter)</small>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="quiz()" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>
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


    //SHOW DATA
    async function getISS() {
        const response = await fetch('https://floating-harbor-93486.herokuapp.com/api/admin/classroom/content?token=' + urlParams.get('id'));
        const datas = await response.json();
        const {
            data,
        } = datas;
        console.log(data)

        $('.fa-spinner').removeClass('fa-spinner').removeClass('fa-spin');


        html000 = '';
        html000 += `<img src="` + data.url_web + `" width="500" height="220" style="object-fit: cover;">`
        document.querySelector('.thumb1').innerHTML = html000;


        html00 = '';
        html00 += `<a href="{{route('kelas')}}?id=` + data.group_uuid + `" type="button" class=" mb-2 mr-2 btn btn-primary">> Kembali </a>`

        html0 = '';
        html0 += `<a href="{{route('editkelas')}}?id=` + data.class_uuid + '&token=' + data.group_uuid + `" type="button" class=" mb-2 mr-2 btn btn-primary"> Sunting Kelas </a>`
        document.querySelector('.route').innerHTML = html0;
        html0 += `<a href="{{route('progressiswa')}}?id=` + data.class_uuid + `" type="button" class=" mb-2 mr-2 btn btn-primary"> Progress Siswa </a>`
        document.querySelector('.route').innerHTML = html0;

        document.getElementById('judul').textContent = data.judul_class;
        document.getElementById('deskripsi').textContent = data.deskripsi_class;
        $.each(data.mentor, function(index3, row3) {
            document.getElementById('mentor').textContent = row3.nama_mentor;
        });
        html = '';
        $.each(data.materi, function(index, row) {
            html += '<tr>';
            html += '<td>' + row.number + '</td>';
            html += '<td>' + row.jenis + '</td>';
            html += '<td>' + row.judul + '</td>';
            html += '<td>' + row.keterangan + '</td>';
            html += '<td>' + row.keterangan + '</td>';
            html += '</tr>';
        });
        document.querySelector('.tbody').innerHTML = html;
          $('#example').DataTable();


        html1 = '';
        $.each(data.video, function(index1, row1) {
            html1 += '<tr>';
            html1 += '<td>' + (row1.number) + '</td>';
            html1 += '<td>' + row1.jenis + '</td>';
            html1 += '<td>' + row1.judul + '</td>';
            html1 += '<td>' + row1.keterangan + '</td>';
            html1 += '<td>' + row1.keterangan + '</td>';
            html1 += '<td>' + `<a href="{{ route('videosiswa') }}?token=` + row1.uuid + `" style="margin:2px;" class="btn btn-secondary btn-sm">Details</a><br>` + '<a data-toggle="modal" data-target=".bd-example-modal-sm-edit" onclick="getEditVideo(\'' + row1.uuid + '\')" class="btn-icon btn-icon-only btn btn-info btn-sm mobile-toggle-header-nav" href="" style="margin:2px;">Edit</a><br>' + '<button onclick="hapus(`' + api + `admin/classroom/content/video?token=` + row1.uuid + '`)" style="margin:2px;" class="btn btn-danger btn-sm">Hapus</button>' +
                '</td>';
            html += '</tr>';
        });
        document.querySelector('.tbody1').innerHTML = html1;
        $('#example1').DataTable();


        html2 = '';
        $.each(data.quiz, function(index1, row2) {
            console.log(row2)
            html2 += '<tr>';
            html2 += '<td>' + row2.number + '</td>';
            html2 += '<td>' + row2.judul + '</td>';
            html2 += '<td>' + row2.keterangan + '</td>';
            html2 += '<td>' + row2.jml_pertanyaan + ' Soal</td>';
            html2 += '<td>' + ` <a href="{{ route('quizsiswa') }}?token=` + row2.uuid + `"style="margin:2px;" class="btn btn-secondary btn-sm"> Details </a><br>` + `<button data-toggle="modal" data-target=".bd-example-modal-sm-edit1" onclick="editQuiz('` + row2.uuid + `')" class="btn-icon btn-icon-only btn btn-info btn-sm mobile-toggle-header-nav" style="margin:2px;" >Edit</button> <br> ` + ` <button onclick="hapus('` + api + `admin/classroom/content/quiz?token=` + row2.uuid + `')" style="margin:2px;" class="btn btn-danger btn-sm"> Hapus </button>` + '</td>';
            html2 += '</tr>';
        });
        document.querySelector('.tbody2').innerHTML = html2;
        $('#example2').DataTable();

    }
    getISS();

    //CREATE VIDEO
    function create() {
        $.ajax({
            type: "post",
            url: 'https://floating-harbor-93486.herokuapp.com/api/admin/classroom/content/video?token=' + urlParams.get('id'),
            data: {
                'nomor': $("#nomor").val(),
                'judul': $("#judul_video").val(),
                'tipe': 'Video',
                'keterangan': $("#keterangan").val(),
                'url_video': 'https://drive.google.com/uc?export=download&id=' + $("#url_video").val().split("/")[5],
            },

            success: function(response) {
                if (response.message !== 'Success') {
                    // $.growl.warning({
                    //     message: response.message
                    // });
                } else if (response.message == 'Success') {
                    $(".btn-close").click();
                    window.location = "{{route('detailkelas')}}?id=" + urlParams.get('id');
                }
                // console.log(data)

            }
        });
    }


    //UPDATE VIDEO
    function update(id) {
        $.ajax({
            type: "post",
            url: 'https://floating-harbor-93486.herokuapp.com/api/admin/classroom/content/video/update?token=' + id,
            data: {
                'nomor': $("#nomor").val(),
                'judul': $("#judul_video_edit").val(),
                'tipe': 'Video',
                'keterangan': $("#keterangan_edit").val(),
                'url_video': 'https://drive.google.com/uc?export=download&id=' + $("#url_video_edit").val().split("/")[5],
            },
            success: function(response) {
                if (response.message !== 'Success') {
                    // $.growl.warning({
                    //     message: response.message
                    // });
                } else if (response.message == 'Success') {
                    $(".btn-close").click();
                    window.location = "{{route('detailkelas')}}?id=" + urlParams.get('id');
                }

            }
        });
    }

    //DELETE VIDEO
    function deleteVideo(id) {
        $.ajax({
            url: 'https://floating-harbor-93486.herokuapp.com/api/admin/classroom/content/video/update?token=' + id,
            type: "delete",

            success: function(response) {
                if (response.message !== 'Success') {
                    // $.growl.warning({
                    //     message: response.message
                    // });
                } else if (response.message == 'Success') {
                    // window.location="{{route('detailkelas')}}?id=" + urlParams.get('id');
                }

            }
        });
    }

    //SHOW ADD
    function getAddVideo() {
        $.ajax({
            method: 'get',
            url: 'https://floating-harbor-93486.herokuapp.com/api/admin/classroom/content/video?token=' + urlParams.get('id'),
            dataType: 'json',
            success: function(response) {
                console.log(response)

                if (response.message !== 'Success') {
                    // $.growl.warning({
                    //     message: response.message
                    // });
                } else if (response.message == 'Success') {
                    document.getElementById('nomor').value = response.data['nomor_materi'];

                }
            }
        });

    }

    //SHOW EDIT VIDEo
    function getEditVideo(id) {
        $.ajax({
            method: 'get',
            url: 'https://floating-harbor-93486.herokuapp.com/api/admin/classroom/content/video/detail?token=' + id,
            dataType: 'json',
            success: function(response) {
                console.log(response)

                if (response.message !== 'Success') {
                    // $.growl.warning({
                    //     message: response.message
                    // });
                } else if (response.message == 'Success') {
                    document.getElementById('id').value = response.data['uuid'];
                    document.getElementById('nomor_edit').value = response.data['nomor'];
                    document.getElementById('judul_video_edit').value = response.data['judul'];
                    document.getElementById('keterangan_edit').value = response.data['keterangan'];
                    document.getElementById('url_video_edit').value = 'https://drive.google.com/file/d/' + response.data['url_video'].split("/")[4];

                }
            }
        });
    }

    //CREATE QUIZ
    $('.tambah-quiz').click(function() {
        $.ajax({
            "url": api + "admin/classroom/content/quiz?token=" + urlParams.get('id'),
            "method": "get",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + window.localStorage.getItem('token'),
            }
        }).done(function(response) {
            if (response.message == "Success") {
                $("#nomor_q").val(response.data.nomor_materi);
            }
        });
    });

    function quiz(id) {
        $.ajax({
            type: "post",
            url: 'https://floating-harbor-93486.herokuapp.com/api/admin/classroom/content/quiz?token=' + urlParams.get('id'),
            data: {
                'nomor': $("#nomor_q").val(),
                'judul': $("#judul_quiz").val(),
                'keterangan': $("#keterangan_q").val(),
                'url_video': 'url_video',
            },

            success: function(response) {
                if (response.message !== 'Success') {
                    // $.growl.warning({
                    //     message: response.message
                    // });
                } else if (response.message == 'Success') {
                    // $(".btn-close").click();
                    window.location = "{{route('detailkelas')}}?id=" + urlParams.get('id');
                }
                // console.log(data)

            }
        });
    }



    //SHOW EDIT VIDEO
    function editQuiz(id) {
    $.ajax({
        method: 'get',
        url: 'https://floating-harbor-93486.herokuapp.com/api/admin/classroom/content/quiz/detail?token=' + id,
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


       // update video
        function updatequiz(id) {
        $.ajax({
            type: "post",
            url: 'https://floating-harbor-93486.herokuapp.com/api/admin/classroom/content/quiz/update?token=' + id,
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
                    window.location = "{{route('detailkelas')}}?id=" + urlParams.get('id');
                }

            }
        });
    }


</script>

@endsection
@extends('layouts.layout')