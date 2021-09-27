@section('title', 'Sunting Kelas')
@section('title-description', 'Manajemen Grup Kelas, Data kelas dan Materi pembelajaran')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Sunting Kelas</h5>
                    <form id="change-pass-form1">
                        @include('menu_kelas.kelas.form')
                        <br>
                        <button type="submit" class="mt-1 btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

<script>
    //show edit
    $.ajax({
        method: 'get',
        url: api + 'admin/classroom/edit?token=' + urlParams.get('id'),
        dataType: 'json',
        success: function(response) {
            if (response.message !== 'Success') {

            } else if (response.message == 'Success') {
                document.getElementById('judul').value = response.data['judul_class'];
                document.getElementById('deskripsi').value = response.data['deskripsi_class'];
                $('input[name="id_class_category"]').val(urlParams.get('token'));
                if (response.data.status == "Public") {
                    $('input[name="status_tersedia"]').prop('checked', true);
                }

                //show mentor
                html = '';
                $.each(response.data.mentor_all, function(index, row) {
                    html += '<option value="' + row.user_uuid + '">' + row.nama_mentor + '</option>';
                });
                $('select[name="id_user[]"]').html(html);
                $.each(response.data.mentor, function(index, row1) {
                    $("#mentor option[value='" + row1.user_uuid + "']").prop("selected", true);
                });

                //show file
                html000 = '';
                html000 += `<img src="` + response.data.url_web + `" width="300" height="100" style="object-fit: cover;">`
                document.querySelector('.img').innerHTML = html000;

                //show file
                html001 = '';
                html001 += `<img src="` + response.data.url_mobile + `" width="300" height="100" style="object-fit: cover;">`
                document.querySelector('.img1').innerHTML = html001;
            }
        }
    });

    //update
    $('#change-pass-form1').submit(function(e) {
        e.preventDefault();
        $.ajax({
            method: 'post',
            url: api + 'admin/classroom/update?token=' + urlParams.get('id'),
            data: new FormData($('#change-pass-form1')[0]),
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
                        window.location = "{{route('detailkelas')}}?id=" + urlParams.get('id');
                    }, 1000);
                }
            }
        });
    });
</script>

@endsection

@extends('layouts.layout')