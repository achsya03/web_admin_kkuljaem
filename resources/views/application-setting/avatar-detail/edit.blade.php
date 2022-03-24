@section('title', 'Sunting Avatar')
@section('title-description', 'Manajemen Avatar, Data Avatar')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Sunting Avatar</h5>
                    <form id="change-pass-form1">
                        @include('application-setting.avatar-detail.form')
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
@yield('form_js')

<script>
    //show edit
    function load_avatar() {
        $('#cover-spin').show();
        $.ajax({
            method: 'get',
            url: api + 'admin/avatar/detail?token=' + urlParams.get('token'),
            dataType: 'json',
            headers: {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },

            success: function(response) {
                if (response.message !== 'Success') {
                    $('#cover-spin').hide();

                } else if (response.message == 'Success') {
                    $('#cover-spin').hide();
                    document.getElementById('nama').value = response.data['nama'];
                    document.getElementById('deskripsi').value = response.data['deskripsi'];

                    //show file
                    $('img[name="avatar_image_preview"]').attr('src', response.data.avatar_url).removeClass('d-none');
                    $('img[name="avatar_image_preview"]').attr('src', response.data.avatar_url);



                }
            }
        });
    }
    load_avatar();
    //update
    $('#change-pass-form1').submit(function(e) {
        $('#cover-spin').show();
        e.preventDefault();
        $.ajax({
            method: 'post',
            url: api + 'admin/avatar/update?token=' + urlParams.get('token'),
            data: new FormData($('#change-pass-form1')[0]),
            dataType: 'json',
            contentType: false,
            mimeType: "multipart/form-data",
            processData: false,
            headers: {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
            success: function(response) {
                if (response.message !== 'Success') {
                    $('#cover-spin').hide();

                    notif('error', 'Silahkan cek form dan tipe file yang di upload');
                } else if (response.message == 'Success') {
                    $('#cover-spin').hide();

                    notif('success', 'Berhasil membuat kelas, Mohon tunggu');
                    setTimeout(() => {
                        window.location = "{{route('application-setting-avatar-index')}}?id=" + urlParams.get('id');
                    }, 1000);
                }
            }
        });
    });
</script>

@endsection

@extends('layouts.layout')