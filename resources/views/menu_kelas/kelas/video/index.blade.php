@section('title', 'Video 1')
@section('title-description', 'Manajemen Grup Kelas, Data kelas dan Materi pembelajaran')
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
                <li class="nav-item"><a data-toggle="tab" href="#tab-eg8-1" class=" active nav-link">Latihan (12 episode)</a></li>
                <li class="nav-item"><a data-toggle="tab" href="#tab-eg8-2" class="nav-link">Shadowing (20 Soal)</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
        <!-- //tabpanel_1 -->
                <div class="tab-pane active" id="tab-eg8-1" role="tabpanel">
                    <div class="card-body">
                        <div>
                            <div class="position-relative form-group"><a class="btn-icon btn-icon-only btn btn-primary mobile-toggle-header-nav" href="{{route('tambahsoalvideo')}}"> Tambah Soal</a></div>
                        </div>
                        <table id="example" class="table table-hover table-striped table-bordered">
                            <thead>
                                <th>Coba</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody  class="tbody">
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
                                    <th>Ari/Keterangan</th>
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
                <div class="position-relative form-group"><label for="exampleEmail" class="">Letak</label>
                    <div class="form-row">
                        <div class="col-md-3">
                            <input name="nomor" id="nomor" placeholder="" type="text" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="position-relative form-group">
                    <label  class="">Kata dalam Hanquel</label>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="createshadowing()" class="btn btn-primary">Tambah</button>
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
                <button type="button" onclick="update($('#id').val())" class=" btn btn-primary">Ubah</button>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')

<script>
    //SHOW DATA
    async function getISS() {
        const response = await fetch('https://floating-harbor-93486.herokuapp.com/api/admin/classroom/content/video/all?token=' + urlParams.get('token'));
        const datas = await response.json();
        const {
            data,
        } = datas;
console.log(data)
        $('.fa-spinner').removeClass('fa-spinner').removeClass('fa-spin');

        //show video
        html000 = '';
        html000 += `<video id='my-video' controls controlsList="nodownload" preload='auto'width="500" height="220"><source src="` + data.url_video + `" type='video/mp4'></video>`
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
            html += '<td>' + `<a data-toggle="modal" data-target=".bd-example-modal-sm-edit" onclick="getEditVideo(\'' + row1.uuid + '\')" class="btn-icon btn-icon-only btn btn-info btn-sm mobile-toggle-header-nav" href="" style="margin:2px;">Edit</a><br>` + '<a href="" onclick="deleteVideo(\'' + row.uuid + '\')" style="margin:2px;" class="btn btn-danger btn-sm">Hapus</a>'+ '</td>';
            html += '</tr>';
        });
        document.querySelector('.tbody1').innerHTML = html;
        $('#example1').DataTable();



        




    }
    getISS();

    //SHOW EDIT
    function getEditVideo() {
        $.ajax({
            method: 'get',
            url: 'https://floating-harbor-93486.herokuapp.com/api/admin/classroom/content/video/detail?token=' + urlParams.get('token'),
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
                'nomor': $("#nomor").val(),
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

                }
            }
        });

    }

    //CREATE SHADOWING
    function createshadowing() {
        $.ajax({
            type: "post",
            url: 'https://floating-harbor-93486.herokuapp.com/api/admin/classroom/content/video/shadowing?token=' + urlParams.get('token'),
            data: {
                'nomor': $("#nomor").val(),
                'hangeul': $("#hangeul").val(),
                'pelafalan':  $("#hangeul").val(),
                'penjelasan': $("#penjelasan").val(),
                'url_pengucapan': $("#url_pengucapan").val(),
            },

            success: function(response) {
                if (response.message !== 'Success') {
                    // $.growl.warning({
                    //     message: response.message
                    // });
                } else if (response.message == 'Success') {
                    // $(".btn-close").click();
                    // window.location = "{{route('videosiswa')}}?id=" + urlParams.get('id');
                }
                // console.log(data)

            }
        });
    }


</script>
@endsection
@extends('layouts.layout')