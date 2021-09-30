@section('title', 'Sunting Soal ')
@section('title-description', 'Kelas/Kelas Perkenalan/ Video Perkenalan 1')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div class="row">
</div>
<br>
<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
    <div class="row">
        <div class="col-md-12">
        <div class="main-card mb-3 card">
        <div class="col-md-12">
            <br>
        <h5><strong>Forum Sunting Soal</strong></h5>
        </div>
            <form id="change-pass-form">
                @include('menu_kelas.kelas.video.soal.form')
                <br>
                <div class="form-row col-md-5">
                <button type="submit" class="mt-1 btn btn-info">Sunting</button>
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
    //show edit
    $.ajax({
        method: 'get',
        url: api + 'admin/classroom/content/video/task/detail?token=' + urlParams.get('id'),
        dataType: 'json',
        success: function(response) {
            console.log(response)
            if (response.message !== 'Success') {

            } else if (response.message == 'Success') {
                document.getElementById('nomor').value = response.data['nomor'];
                document.getElementById('pertanyaan_teks').value = response.data['pertanyaan_teks'];
                document.getElementById('jawaban').value = response.data['jawaban'];
                document.getElementById('jenis_jawaban').value = response.data['pilihan'];

                //show file
                html000 = '';
                html000 += `<img src="` + response.data.url_gambar + `" width="300" height="100" style="object-fit: cover;">`
                document.querySelector('.img').innerHTML = html000;

                //show audio
                html001 = '';
                html001 += `<audio controls><source src="` + response.data.url_file + `" type="audio/mpeg"></audio>`
                document.querySelector('.audio').innerHTML = html001;

            }
        }
    });

//UPDATE
$('#change-pass-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            method: 'post',
            url: api + 'admin/classroom/content/video/task/update?token=' + urlParams.get('id'),
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
                        window.location = "{{route('videosiswa')}}?id=" + urlParams.get('id');
                    }, 1000);
                }
            }
        });
    });

</script>
@endsection

@extends('layouts.layout')