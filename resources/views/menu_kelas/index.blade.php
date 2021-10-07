@section('title', 'Menu Kelas')
@section('title-description', 'Manajemen Grup Kelas, Data kelas dan Materi pembelajaran')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div>
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
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ubah Grup Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="position-relative form-group"><label for="exampleEmail" class="">Label Grup Kelas</label>
                    <input name="id" id="id" hidden class="form-control">
                    <input name="name" id="nama" class="form-control">
                </div>
                <div class="position-relative form-group"><label for="exampleEmail" class="">Penjelasan Singkat Grup Kelas</label>
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
function load_menukelas() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/classroom-group",
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
                    id.sort(function(a,b) {
                    var x = a.nama.toLowerCase();
                    var y = b.nama.toLowerCase();
                    return x < y ? -1 : x > y ? 1 : 0;
                });


                html = '';
                    $.each(id, function(index, row) {
                        html += '<div class="col-md-4">';
                        html += '<div class = "main-card mb-3 card" >';
                        html += '<div class = "card-body" >';
                        html += `<a href="{{route('kelas')}}?id=` + row.uuid + `"  class="text-dark"><h5><strong><u>` + row.nama + '</strong></u>' + '(' + row.jml_kelas + ')' + ' </h5></a><p>' + row.deskripsi.substring(0, 40) + '...'; + '</p>';
                        html += '<div class="position-relative form-row"><div class="col-md-1"><a data-toggle="modal" data-target=".bd-example-modal-sm" class="btn-icon  btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav" href="#" onclick="getEdit(\'' + row.uuid + '\')">Edit</a></div><div style="text-align:right;" class="col-md-11"><a class="btn-icon  btn-icon-only btn btn-danger btn-sm" href="#" onclick="hapus(`' + api + 'admin/classroom-group/delete?token=' + row.uuid + '`)">Hapus</a></div></div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    });
                    document.querySelector('.cards').innerHTML = html;

                    html1 = '';
                    html1 += `<div class="col-md-4"><div class="main-card mb-3 card"><div class="card-body"><h5><strong>Tambah Grup Kelas</strong></h5><form id="change-pass-form"><div class="position-relative form-group"><label class="">Label Grup Kelas</label><input name="nama" placeholder="" class="form-control"></div><div class="position-relative form-group"><label for="exampleEmail" class="">Penjelasan Singkat Grup Kelas</label><input name="deskripsi" placeholder="" class="form-control"></div><div class="position-relative form-group"><button type="submit" class="btn-icon btn-focus btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">Tambahkan Modal</button></div></form></div></div></div>`;
                    document.querySelector('.cardss').innerHTML = html1;

        //CREATE
        $('#change-pass-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                method: 'post',
                url: 'https://floating-harbor-93486.herokuapp.com/api/admin/classroom-group',
                data: $('form').serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.message !== 'Success') {
                        notif('error', 'Mohon semua form diisi !');

                    } else if (response.message == 'Success') {
                        notif('success', 'Berhasil membuat grup kelas, Mohon tunggu');
                        window.location = "{{ route('menu_kelas')}}";

                    }
                }
            });
        });


        
            }
        });
    }
    load_menukelas();
 
    //SHOW EDIT
    function getEdit(id) {
        $.ajax({
            method: 'get',
            url: 'https://floating-harbor-93486.herokuapp.com/api/admin/classroom-group/detail?token=' + id,
            dataType: 'json',
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
            url: 'https://floating-harbor-93486.herokuapp.com/api/admin/classroom-group/update?token=' + id,
            data: {
                'nama': $("#nama").val(),
                'deskripsi': $("#deskripsi").val(),
            },
            success: function(response) {
                if (response.message !== 'Success') {
                    notif('error', 'Gagal merubah kelas, Silahkan semua isian!');

                } else if (response.message == 'Success') {
                    notif('success', 'Berhasil merubah kelas, Mohon tunggu');
                    $(".btn-close").click();
                    window.location = "{{ route('menu_kelas')}}";
                }

            }
        });
    }



</script>
@endsection
@extends('layouts.layout')