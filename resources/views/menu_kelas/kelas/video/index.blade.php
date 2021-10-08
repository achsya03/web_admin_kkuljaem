@section('title', '')
@section('title-description', '')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')

<div class="row">
    <div class="col-md-6">
        <span style="color:black"><strong>Judul Video</strong></span><br>
        <i class="fa fa-spin fa-spinner"></i>
        <a id="judul"></a>
        <br><br>

        <span style="color:black"><strong>Deskripsi Video</strong></span><br>
        <i class="fa fa-spin fa-spinner"></i>
        <a id="deskripsi"></a>
        <br><br>

        <span style="color:black"><strong>Url Video</strong></span><br>
        <i class="fa fa-spin fa-spinner"></i>
        <a id="url_video"></a>
        <br><br>

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
                <li class="nav-item jml_video">
                </li>
                <li class="nav-item jml_shadowing">
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
        <!-- //tabpanel_1 -->
                <div class="tab-pane active" id="tab-eg8-1" role="tabpanel">
                    <div class="card-body">
                        <div>
                        <div class="position-relative form-group route1">
                        </div>
                        </div>
                        <table id="example2" class="table table-hover table-striped table-bordered">
                            <thead>
                                <th>#</th>
                                <th>Pertanyaan</th>
                                <th>Jawaban Benar</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody  class="tbody2">
                            </tbody>
                        </table>
                    </div>
                </div>
        <!-- //tabpanel_2 -->
                <div class="tab-pane" id="tab-eg8-2" role="tabpanel">
                    <div class="card-body">
                        <div>
                            <div class="position-relative form-group"><a data-toggle="modal" data-target=".bd-example-modal-sm1" onclick="getTambahShadowing()"class="btn-icon btn-icon-only btn btn-primary mobile-toggle-header-nav" href=""> Tambah Ungkapan</a></div>
                        </div>
                        <table id="example1" class="table table-hover table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hangui</th>
                                    <th>Arti/Keterangan</th>
                                    <th>File Audio</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="tbody1">
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
<!-- //tambah shadowing -->
<div class="modal fade bd-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Ungkapan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="form-create" >
                <div class="position-relative form-group"><label for="exampleEmail" class="">Letak</label>
                    <div class="form-row">
                        <div class="col-md-3">
                            <input name="nomor" id="nomor1" placeholder="" type="text" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group">
                    <label  class="">Kata dalam Hanquel</label>
                    <input name="nomor" id="nomor" placeholder="" type="text" class="form-control" hidden>
                    <input name="pelafalan" id="pelafalan"  placeholder="" type="text" class="form-control" hidden>

                    <input name="hangeul" id="hangeul"  placeholder="" type="text" class="form-control">
                </div>
                <div class="position-relative form-group">
                    <label  class="">Arti atau Keterangan singkat</label>
                    <input name="penjelasan" id="penjelasan" placeholder="" type="text" class="form-control"></div>
                <div class="position-relative form-group">
                    <label  class="">File Audio</label>
                    <input name="url_pengucapan" id="url_pengucapan"  type="file" class="form-control-file">
                    <small class="form-text text-muted">Format Mp3 Maksimal ukuran file 2MB</small>
                </div>
            </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="createshadowing()" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </div>
</div>

<!-- //edit shadowing -->
<div class="modal fade bd-example-modal-sm-edit1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Ungkapan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="form-edit" >
                <div class="position-relative form-group"><label for="exampleEmail" class="">Letak</label>
                    <div class="form-row">
                        <div class="col-md-3">
                            <input name="id" id="id_quiz" hidden class="form-control" hidden>

                            <input name="nomor" id="nomor_quiz" placeholder="" type="text" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group">
                    <label  class="">Kata dalam Hanquel</label>
                    <input name="nomor" id="nomor_quiz1" placeholder="" type="text" class="form-control" hidden>
                    <input name="pelafalan" id="pelafalan_quiz"  placeholder="" type="text" class="form-control" hidden>
                    <input name="hangeul" id="hangeul_quiz"  placeholder="" type="text" class="form-control">
                </div>
                <div class="position-relative form-group">
                    <label  class="">Arti atau Keterangan singkat</label>
                    <input name="penjelasan" id="penjelasan_quiz" placeholder="" type="text" class="form-control"></div>
                <div class="position-relative form-group">
                    <label  class="">File Audio</label>
                    <input name="url_pengucapan" id="url_pengucapan_quiz"  type="file" class="form-control-file">
                    <small class="form-text text-muted">Format Mp3 Maksimal ukuran file 2MB</small>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="updatequiz($('#id_quiz').val())" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>


<!-- //sunting video -->
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
                            <input name="nomor_q" type="number" id="nomor_edit" disabled class="form-control">
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
                <button type="button" onclick="update($('#id').val())" class=" btn btn-primary">Ubah</button>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')



<script>


    //show view atas
    async function getview() {
        const response = await fetch('https://floating-harbor-93486.herokuapp.com/api/admin/classroom/content/video/all?token=' + urlParams.get('token'));
        const datas = await response.json();
        const {
            data,
        } = datas;
        $('.page-title-text').html(data.judul + '<div class="page-title-subheading">' + data.keterangan + '</div>');

    }
    getview();

 

    //SHOW DATA
    async function getISS() {
        const response = await fetch('https://floating-harbor-93486.herokuapp.com/api/admin/classroom/content/video/all?token=' + urlParams.get('token'));
        const datas = await response.json();
        const {
            data,
        } = datas;
        console.log(data)
        $('.fa-spinner').removeClass('fa-spinner').removeClass('fa-spin');

        //tambahsoal
        html0000 ='';
        html0000 += `<a class="btn-icon btn-icon-only btn btn-primary mobile-toggle-header-nav"  href="{{ route('tambahsoalvideo') }}?token=` + urlParams.get('token') +`" > Tambah Soal</a>`
        document.querySelector('.route1').innerHTML = html0000;

        //show jumlah shadowing dan video
        html99 = '';
        html99 += `<a data-toggle="tab" href="#tab-eg8-1" class="active nav-link"><strong>Latihan<strong></a>` + '(' + data.jml_task + ')';
        document.querySelector('.jml_video').innerHTML = html99;

        html999 = '';
        html999 += `<a data-toggle="tab" href="#tab-eg8-2" class="nav-link""><strong>Shadowing<strong></a>` + '(' + data.jml_shadowing + ')';
        document.querySelector('.jml_shadowing').innerHTML = html999;


        //show video
        html000 = '';
        
        html000 += '<iframe width="500" height="220" src="https://www.youtube.com/embed/'+ data.url_video.split("=")[1] + '"></iframe> '
console.log(html000)
      //  html000 += `<video id='my-video' controls controlsList="nodownload" preload='auto'width="500" height="220"><source src="` + data.url_video + `" type='video/mp4'></video>`
        document.querySelector('.thumb1').innerHTML = html000;

        //sunting video
        html0 = '';
        html0 += '<a data-toggle="modal" data-target=".bd-example-modal-sm-edit" onclick="getEditVideo(\'' + data.uuid + '\')" class="btn-icon btn-icon-only btn btn-primary mobile-toggle-header-nav" href="" style="margin:2px;">Sunting Video</a><br>'
        document.querySelector('.route').innerHTML = html0;

        //maindata
        document.getElementById('judul').textContent = data.judul;
        document.getElementById('deskripsi').textContent = data.keterangan;
        document.getElementById('url_video').textContent = data.url_video;

        html = '';
        $.each(data.shadowing, function(index, row) {
            html += '<tr>';
            html += '<td>' + row.nomor + '</td>';
            html += '<td>' + row.hangeul + '</td>';
            html += '<td>' + row.pelafalan + '</td>';
            html += '<td>' + `<audio controls><source src="` + row.url_pengucapan + `" type="audio/mpeg"></audio>` + '</td>';
            html += '<td>' + '<a data-toggle="modal" data-target=".bd-example-modal-sm-edit1" onclick="getEditQuiz(\'' + row.shadowing_uuid + '\')" class="btn-icon btn-icon-only btn btn-info btn-sm mobile-toggle-header-nav" href="" style="margin:2px;">Edit</a><br>' + '<button onclick="hapus(`' + api + `admin/classroom/content/video/shadowing?token=` + row.shadowing_uuid + '`)" style="margin:2px;" class="btn btn-danger btn-sm">Hapus</button>'+ '</td>';
            html += '</tr>';
        });
        document.querySelector('.tbody1').innerHTML = html;
        $('#example1').DataTable();


        html1 = '';
        $.each(data.task, function(index1, row1) {
            console.log(row1)
            html1 += '<tr>';
            html1 += '<td>' + row1.nomor + '</td>';
            html1 += '<td>' + row1.pertanyaan + '</td>';
            html1 += '<td>' + row1.jawaban + '</td>';
            html1 += '<td>' + `<a  href="{{ route('editsoalvideo') }}?id=` + row1.task_uuid + '&token=' + urlParams.get('token')+`" class="btn-icon btn-icon-only btn btn-info btn-sm mobile-toggle-header-nav"  style="margin:2px;">Edit</a><br>` + '<button onclick="hapus(`' + api + `admin/classroom/content/video/task?token=` + row1.task_uuid + '`)" style="margin:2px;" class="btn btn-danger btn-sm">Hapus</button>'+ '</td>';
            html1 += '</tr>';
        });
        document.querySelector('.tbody2').innerHTML = html1;
        $('#example2').DataTable();



        




    }
    getISS();

    //SHOW EDIT
    function getEditVideo() {
        $.ajax({
            method: 'get',
            url: 'https://floating-harbor-93486.herokuapp.com/api/admin/classroom/content/video/detail?token=' + urlParams.get('token'),
            dataType: 'json',
            success: function(response) {
                if (response.message !== 'Success') {
                    // $.growl.warning({
                    //     message: response.message
                    // });
                } else if (response.message == 'Success') {
                    document.getElementById('id').value = response.data['uuid'];
                    document.getElementById('nomor_edit').value = response.data['nomor'];
                    document.getElementById('judul_video_edit').value = response.data['judul'];
                    document.getElementById('keterangan_edit').value = response.data['keterangan'];
                    document.getElementById('url_video_edit').value = response.data['url_video'];

                }
            }
        });

    }

    //UPDATE VIDEO
    function update(id) {
        $.ajax({
            type: "post",
            url: 'https://floating-harbor-93486.herokuapp.com/api/admin/classroom/content/video/update?token=' + id,
            data: {
                'nomor': $("#nomor_q").val(),
                'judul': $("#judul_video_edit").val(),
                'tipe': 'Video',
                'keterangan': $("#keterangan_edit").val(),
                'url_video': $("#url_video_edit").val(),
            },
            success: function(response) {
                if (response.message !== 'Success') {
                    // $.growl.warning({
                    //     message: response.message
                    // });
                } else if (response.message == 'Success') {
                    $(".btn-close").click();
                    window.location = "{{route('videosiswa')}}?token=" + urlParams.get('token');
                }

            }
        });
    }

    //SHOW SHADOWING
    function getTambahShadowing() {
        $('input[name="hangeul"]').keyup(function() {
            $('input[name="pelafalan"]').val($(this).val());
        });
        $.ajax({
            method: 'get',
            url: 'https://floating-harbor-93486.herokuapp.com/api/admin/classroom/content/video/shadowing?token=' + urlParams.get('token'),
            dataType: 'json',
            success: function(response) {
                console.log(response)
                if (response.message !== 'Success') {
                    // $.growl.warning({
                    //     message: response.message
                    // });
                } else if (response.message == 'Success') {
                    document.getElementById('nomor').value = response.data['nomor_shadowing'];
                    document.getElementById('nomor1').value = response.data['nomor_shadowing'];

                }
            }
        });

    }

    //CREATE SHADOWING
    function createshadowing() {
        $('#cover-spin').show();
        $.ajax({
            method: 'post',
            url: api + 'admin/classroom/content/video/shadowing?token=' + urlParams.get('token'),
            data: new FormData($('#form-create')[0]),
            dataType: 'json',
            contentType: false,
            mimeType: "multipart/form-data",
            processData: false,
            success: function(response) {
                if (response.message !== 'Success') {
                    notif('error', 'Silahkan cek form dan tipe file yang di upload');
                } else if (response.message == 'Success') {
                    notif('success', 'Berhasil membuat kelas, Mohon tunggu');
                     $('#cover-spin').hide();
                    setTimeout(() => {
                        window.location = "{{route('videosiswa')}}?token=" + urlParams.get('token');
                    }, 1000);
                }
            }
        });

    }

    //SHOW EDIT QUIZ
    function getEditQuiz(id) {
        $('input[name="hangeul"]').keyup(function() {
            $('input[name="pelafalan"]').val($(this).val());
        });
        $.ajax({
            method: 'get',
            url : api + 'admin/classroom/content/video/shadowing/detail?token=' + id,
            dataType: 'json',
            success: function(response) {
                console.log(response)
                if (response.message !== 'Success') {
                } else if (response.message == 'Success') {
                    document.getElementById('id_quiz').value = response.data['shadowing_uuid'];
                    document.getElementById('nomor_quiz1').value = response.data['nomor'];
                    document.getElementById('nomor_quiz').value = response.data['nomor'];
                    document.getElementById('hangeul_quiz').value = response.data['hangeul'];
                    document.getElementById('pelafalan_quiz').value = response.data['pelafalan'];
                    document.getElementById('penjelasan_quiz').value = response.data['penjelasan'];
                }
            }
        });

    }

    //UPDATE VIDEO
    function updatequiz(id) {
        $('#cover-spin').show();
        $.ajax({
            method: 'post',
            url: api + 'admin/classroom/content/video/shadowing/update?token=' + id,
            data: new FormData($('#form-edit')[0]),
            dataType: 'json',
            contentType: false,
            mimeType: "multipart/form-data",
            processData: false,
            success: function(response) {
                if (response.message !== 'Success') {
                    notif('error', 'Silahkan cek form dan tipe file yang di upload');
                } else if (response.message == 'Success') {
                    notif('success', 'Berhasil membuat kelas, Mohon tunggu');
                     $('#cover-spin').hide();
                    setTimeout(() => {
                        window.location = "{{route('videosiswa')}}?token=" + urlParams.get('token');
                    }, 1000);
                }
            }
        });

    }


</script>
@endsection
@extends('layouts.layout')