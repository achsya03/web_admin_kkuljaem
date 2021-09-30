@section('title', 'Tambah Soal ')
@section('title-description', 'Kelas/Kelas Perkenalan/ Video Perkenalan 1')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div class="row">

</div>
<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="col-md-12">
                    <h5 class="font-weight-bold mt-4">Forum Tambah Soal</h5>
                </div>
                <form id="change-pass-form">
                    @include('menu_kelas.kelas.video.soal.form')
                    <br>
                    <div class="form-row col-md-5">
                    <button type="submit" class="mt-1 btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@yield('form_js')
<script>
    //show create
    $.ajax({
        method: 'get',
        url: api + 'admin/classroom/content/video/task?token=' + urlParams.get('token'),
        dataType: 'json',
        success: function(response) {
            console.log(response)
            if (response.message !== 'Success') {

            } else if (response.message == 'Success') {
                document.getElementById('nomor').value = response.data['nomor_soal'];
            }
        }
    });


//CREATE
    $('#change-pass-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            method: 'post',
            url: api + 'admin/classroom/content/video/task?token=' + urlParams.get('token'),
            data: new FormData($('#change-pass-form')[0]),
            dataType: 'json',
            contentType: false,
            mimeType: "multipart/form-data",
            processData: false,
            success: function(response) {
                if (response.message !== 'Success') {
                    notif('error', 'Silahkan cek form dan tipe file yang di upload');
                } else if (response.message == 'Success') {
                    notif('success', 'Berhasil membuat kelas, Mohon tunggu');
                    setTimeout(() => {
                        window.location = "{{route('videosiswa')}}?id=" + urlParams.get('token');
                    }, 1000);
                }
            }
        });
    });



</script>
@endsection
@extends('layouts.layout')
