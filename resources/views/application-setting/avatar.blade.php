@section('title', 'Avatar')
@section('title-description', 'Manajemen Grup Avatar, Data Avatar dan Gambar Avatar')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div>

    <br>
    <div class="form-row cards">

    </div>
    <div class="form-row cardss">

    </div>
</div>
<div class="toast" role="alert" aria-live="polite" aria-atomic="true" data-delay="100000">
    <div role="alert" aria-live="assertive" aria-atomic="true">...</div>
</div>
@endsection
@section('modal')
<!-- Modal Update Avatar -->
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ubah Grup Avatar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="position-relative form-group"><label for="exampleEmail" class="">Label Grup Avatar</label>
                    <input name="id" id="id" hidden class="form-control">
                    <input name="name" id="nama" class="form-control">
                </div>
                <div class="position-relative form-group"><label for="exampleEmail" class="">Penjelasan Singkat Grup Avatar</label>
                    <input name="deskripsi" id="deskripsi" value="" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-close btn-secondary" data-dismiss="modal">Close</button>
                <button href="" class="btn-focus btn btn-primary" onclick="update($('#id').val())">Simpan</button>

            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script>
    //show
    function load_avatar() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/avatar/group",
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                console.log(response)
                var id = response.data.slice(0);
                id.sort(function(a, b) {
                    var x = a.nama.toLowerCase();
                    var y = b.nama.toLowerCase();
                    return x < y ? -1 : x > y ? 1 : 0;
                });
                id.sort(function(a, b) {
                    return a.urutan - b.urutan;
                });
                console.log(id)


                html = '';
                $.each(id, function(index, row) {
                    html += '<div class="col-md-4">';
                    html += '<div class = "main-card mb-3 card" >';
                    html += '<div class = "card-body" >';
                    html += `<a href="{{route('application-setting-avatar-index')}}?id=` + row.uuid + `"  class="text-dark"><h5><strong><u>` + (index + 1) + `. ` + row.nama + '</strong></u>' + ' </h5></a><p>' + row.deskripsi.substring(0, 40) + '...'; + '</p>';
                    html += '<div class="position-relative form-row"><div class="col-md-1"><a data-toggle="modal" data-target=".bd-example-modal-sm" class="btn-icon  btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav" href="#" onclick="getEdit(\'' + row.uuid + '\')">Edit</a></div><div style="text-align:right;" class="col-md-11"><a class="btn-icon  btn-icon-only btn btn-danger btn-sm" href="#" onclick="hapus(`' + api + 'admin/avatar/group?token=' + row.uuid + '`)">Hapus</a></div></div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                });
                document.querySelector('.cards').innerHTML = html;

                html1 = '';
                html1 += `<div class="col-md-4"><div class="main-card mb-3 card"><div class="card-body"><h5><strong>Tambah Grup Avatar</strong></h5><form id="change-pass-form"><div class="position-relative form-group"><label class="">Label Grup Avatar</label><input name="nama" placeholder="" class="form-control"></div><div class="position-relative form-group"><label for="exampleEmail" class="">Penjelasan Singkat Grup Avatar</label><input name="deskripsi" placeholder="" class="form-control"></div><div class="position-relative form-group"><button type="submit" class="btn-icon btn-focus btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">Tambahkan Grup</button></div></form></div></div></div>`;
                document.querySelector('.cardss').innerHTML = html1;

                //CREATE
                $('#change-pass-form').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        method: 'post',
                        url: api + 'admin/avatar/group',
                        data: $('form').serialize(),
                        dataType: 'json',
                        headers: {
                            "Accept": "application/json",
                            "Authorization": 'bearer ' + token,
                        },
                        success: function(response) {
                            if (response.message !== 'Success') {
                                notif('error', 'Mohon semua form diisi !');

                            } else if (response.message == 'Success') {
                                notif('success', 'Berhasil membuat grup, Mohon tunggu');
                                window.location = "{{ route('application-setting-avatar')}}";

                            }
                        }
                    });
                });



            }
        });
    }
    load_avatar();

    //SHOW EDIT
    function getEdit(id) {
        $.ajax({
            method: 'get',
            url: api + 'admin/avatar/group/detail?token=' + id,
            dataType: 'json',
            headers: {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
            success: function(response) {
                if (response.message !== 'Success') {
                    // $.growl.warning({
                    //     message: response.message
                    // });
                } else if (response.message == 'Success') {
                    document.getElementById('nama').value = response.data['nama'];
                    document.getElementById('deskripsi').value = response.data['deskripsi'];
                    document.getElementById('id').value = response.data['uuid'];
                }
            }
        });

    }

    //UPDATE
    function update(id) {
        $.ajax({
            type: "post",
            url: api + 'admin/avatar/group/update?token=' + id,
            data: {
                'nama': $("#nama").val(),
                'deskripsi': $("#deskripsi").val(),
            },
            headers: {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
            success: function(response) {
                if (response.message !== 'Success') {
                    notif('error', 'Gagal merubah Avatar, Silahkan semua isian!');

                } else if (response.message == 'Success') {
                    notif('success', 'Berhasil merubah avatar, Mohon tunggu');
                    $(".btn-close").click();
                    window.location = "{{ route('application-setting-avatar')}}";
                }

            }
        });
    }
</script>
@endsection
@extends('layouts.layout')