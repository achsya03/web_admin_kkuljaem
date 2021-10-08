@section('title', 'Sunting Soal ')
@section('title-description', 'Kelas/Kelas Perkenalan/ Quiz')
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
                @include('menu_kelas.kelas.quiz.soal.form')
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
        url: api + 'admin/classroom/content/quiz/exam/detail?token=' + urlParams.get('token'),
        dataType: 'json',
        success: function(response) {
            console.log(response)
            if (response.message !== 'Success') {
                console.log(response)

            } else if (response.message == 'Success') {
                console.log(jenis_jawaban)
                document.getElementById('nomor').value = response.data['nomor'];
                document.getElementById('pertanyaan_teks').value = response.data['pertanyaan_teks'];
                document.getElementById('jawaban').value = response.data['jawaban'];
                $('#jenis_jawaban').val(response.data['jenis_jawaban']).change();



                //show file
                $('img[name="gambar_pertanyaan_preview"]').attr('src', response.data.url_gambar);
                $('audio[name="url_pertanyaan_preview"]').attr('src', response.data.url_file);
                
                //show jawaban
                html01 = '';
                $.each(response.data.pilihan, function(index, row) {
                    console.log(row);
                    $('#jawaban_teks_' + jawaban_id).val(row.jawaban_teks);
                });

                

            }
        }
    });

//UPDATE
$('#change-pass-form').submit(function(e) {
    $('#cover-spin').show();

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
    $('#cover-spin').hide();

                    notif('error', 'Silahkan cek form dan tipe file yang di upload');
                } else if (response.message == 'Success') {
    $('#cover-spin').hide();


                    notif('success', 'Berhasil membuat kelas, Mohon tunggu');
                    setTimeout(() => {
                        window.location = "{{route('videosiswa')}}?token=" + urlParams.get('id');
                    }, 1000);
                }
            }
        });
    });


</script>
@endsection
@extends('layouts.layout')