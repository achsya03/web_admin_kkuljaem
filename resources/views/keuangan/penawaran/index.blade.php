@section('title', 'Penawaran')
@section('title-description', 'Manajemen Penawaran paket belajar')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')

<!-- <div class="col-md-4">
    <div class="main-card mb-3 card">
        <div class="card-body">
                <div class="link">
                    <h5><strong><u>12 Bulan</strong> (Rp. 20.000)</h5></u>
                </div>
            <div class="position-relative form-group"><a data-toggle="modal" data-target=".bd-example-modal-sm" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav" href=""> Edit</a></div>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5><strong>Tambah Penawaran</strong></h5>
            <div class="position-relative form-group">
                <div class="position-relative form-group"><label for="exampleSelect" class="">Pilih bank tujuan</label>
                    <select name="select" id="exampleSelect" class="form-control">
                        <option>1</option>
                        <option>2</option>
                    </select>
                </div>
            </div>
            <div class="position-relative form-group"><label for="exampleEmail" class="">Harga Penawaran</label><input name="email" id="exampleEmail" placeholder="Masukkan Keterangan singkat disini" type="email" class="form-control"></div>
            <div class="position-relative form-group"> <button type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Tambahkan</button></div>
        </div>
    </div>
</div> -->

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
                <h5><strong>Tambah Penawaran</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="position-relative form-group">
                    <div class="position-relative form-group"><label for="exampleSelect" class="">Pilih Penawaran</label>
                        <select name="lama_paket" id="lama_paket" class="form-control">
                            <option value="1">1 Bulan</option>
                            <option value="3">3 Bulan</option>
                            <option value="6">6 Bulan</option>
                            <option value="12">12 Bulan</option>
                        </select>
                    </div>
                </div>
                <div class="position-relative form-group"><label for="exampleEmail" class="">Harga Penawaran</label>
                    <input name="harga" id="harga" placeholder="Masukkan Keterangan singkat disini" class="form-control">
                    <input name="uuid" id="uuid" hidden class="form-control">
                </div>
                <div class="position-relative form-group">
                    <div class="position-relative form-group"><label for="exampleSelect" class="">Pilih Status</label>
                        <select name="status_aktif" id="status_aktif" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="update($('#uuid').val())" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>
    function load_penawaran() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/packet",
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                html = '';
                $.each(response.data, function(index, row) {
                    html += '<div class="col-md-4">';
                    html += '<div class = "main-card mb-3 card" >';
                    html += '<div class = "card-body" >';
                    html += `<a href="#"  class="text-dark"><h5><strong><u>` + row.lama_paket + '&nbsp' + 'Bulan' + '</strong></u>' + '(' + row.harga + ')' + ' </h5>';
                    html += '<div class="position-relative form-row"><div class="col-md-1"><a data-toggle="modal" data-target=".bd-example-modal-sm" class="btn-icon  btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav" href="#" onclick="getEdit(\'' + row.uuid + '\')">Edit</a></div><div style="text-align:right;" class="col-md-11"><a class="btn-icon  btn-icon-only btn btn-danger btn-sm" href="#" onclick="hapus(`' + api + 'admin/packet?token=' + row.uuid + '`)">Hapus</a></div></div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                });
                document.querySelector('.cards').innerHTML = html;

                html1 = '';
                html1 += `<div class="col-md-4"><div class="main-card mb-3 card"><div class="card-body"><h5><strong>Tambah Penawaran</strong></h5><form id="change-pass-form"><div class="position-relative form-group"><label class="">Pilih Penawaran</label><select name="lama_paket" id="exampleSelect" class="form-control"><option value="1">1 Bulan</option><option value="3">3 Bulan</option><option value="6">6 Bulan</option><option value="10">10 Bulan</option></select></div><div class="position-relative form-group"><label for="exampleEmail" class="">Harga Penawaran</label><input name="harga" placeholder="" class="form-control"><input name="status_aktif" value="1" placeholder="" hidden class="form-control"></div><div class="position-relative form-group"><button type="submit" class="btn-icon btn-focus btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">Tambahkan Penawaran</button></div></form></div></div></div>`;
                document.querySelector('.cardss').innerHTML = html1;

                //CREATE
                $('#change-pass-form').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        method: 'post',
                        url: api + 'admin/packet',
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
                                notif('success', 'Berhasil membuat grup kelas, Mohon tunggu');
                                window.location = "{{ route('penawaran')}}";

                            }
                        }
                    });
                });

            }
        });
    }
    load_penawaran();


    //SHOW EDIT
    function getEdit(id) {
        $.ajax({
            method: 'get',
            url: api + 'admin/packet/detail?token=' + id,
            dataType: 'json',
            headers: {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
            success: function(response) {
                if (response.message !== 'Success') {

                } else if (response.message == 'Success') {
                    document.getElementById('uuid').value = response.data['uuid'];
                    document.getElementById('lama_paket').value = response.data['lama_paket'];
                    document.getElementById('harga').value = response.data['harga'];
                    $("#status_aktif option[value='" + response.data['status_aktif'] + "']").prop("selected", true);

                }
            }
        });

    }

    //UPDATE
    function update(id) {
        $('#cover-spin').show();
        $.ajax({
            type: "post",
            url: api + 'admin/packet/update?token=' + id,
            data: {
                'harga': $("#harga").val(),
                'lama_paket': $("#lama_paket").val(),
                'status_aktif': $("#status_aktif").val(),
            },
            headers: {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
            success: function(response) {
                $('#cover-spin').hide();

                if (response.message !== 'Success') {
                    notif('error', 'Gagal, Silahkan semua isian!');

                } else if (response.message == 'Success') {
                    notif('success', 'Berhasil, Mohon tunggu');
                    $(".btn-close").click();
                    window.location = "{{ route('penawaran')}}";
                }

            }
        });
    }
</script>

@endsection
@extends('layouts.layout')