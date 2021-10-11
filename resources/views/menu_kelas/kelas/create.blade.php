@section('title', 'Tambah Kelas')
@section('title-description', 'Manajemen Grup Kelas, Data kelas dan Materi pembelajaran')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Kelas</h5>
                    <form id="change-pass-form">
                        @include('menu_kelas.kelas.form')
                        <br>
                        <button type="submit" class="mt-1 btn btn-success">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@yield('form_js')
<script>
    //ambil data mentor
    $.ajax({
        "url": api + 'admin/classroom/add',
        "method": "get",
        "headers": {
            "Accept": "application/json",
            "Authorization": 'bearer ' + token,
        },
        success: function(response) {
            if (response.message == 'Success') {
                html = '';
                $.each(response.data.mentor, function(index, row) {
                    html += '<option value="' + row.mentor_uuid + '">' + row.nama + '</option>';
                });
                $('select[name="id_user[]"]').html(html);
            }
        }
    });

    //CREATE
    $('#change-pass-form').submit(function(e) {
        $('#cover-spin').show();
        e.preventDefault();
        $.ajax({
            method: 'post',
            url: api + 'admin/classroom?token=' + urlParams.get('id'),
            data: new FormData($('#change-pass-form')[0]),
            dataType: 'json',
            contentType: false,
            mimeType: "multipart/form-data",
            processData: false,
            headers: {
            "Accept": "application/json",
            "Authorization": 'bearer ' + token,
        },
            success: function(response) {
                 $('#cover-spin').hide();
                if (response.message !== 'Success') {
                    notif('error', 'Silahkan cek form dan tipe file yang di upload');
                } else if (response.message == 'Success') {
                    notif('success', 'Berhasil membuat kelas, Mohon tunggu');
                    setTimeout(() => {
                        window.location = "{{route('kelas')}}?id=" + urlParams.get('id');
                    }, 1000);
                }
            }
        });
    });
</script>


@endsection
@extends('layouts.layout')