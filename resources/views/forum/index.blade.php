@section('title', 'Forum')
@section('title-description', 'Menulis, Menyukai, Memberi Komentar, Menghapus dan Melaporkan')
@section('title-icon', 'pe-7s-news-paper')
@section('content')
<div>
    <div>
        <a data-toggle="modal" data-target=".bd-example-modal-sm-sort" onclick="sorting()" class="btn-icon btn-icon-only btn btn-primary mobile-toggle-header-nav active" href="">Urutkan</a>

    </div>
    <br>
    <div class="row topik-list"></div>
    <div class="row">
        <div class="col-12">
            <div class="card card-body">
                <h6 class="">Tambah Topik</h6>
                <form id="create-forum">
                    <input type="text" name="judul_1" class="form-control mb-2" placeholder="Masukan Topik baru disini">
                    <button type="submit" class="btn btn-success">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="detail_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Topik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update-forum">
                    <div class="position-relative form-group">
                        <label for="exampleEmail11" class="">Topik</label>
                        <input name="uuid" type="hidden" class="form-control">
                        <input name="judul" placeholder="Nama Topik" type="text" class="form-control">
                    </div>
                    <div class="position-relative form-group">
                        <label>Gambar Forum </label>
                        <div class="custom-file">
                            <input type="file" name="theme_image" id="url_image" accept="image/*" class="custom-file-input" onchange="update_preview(this)">
                            <label class="custom-file-label">Pilih File</label>
                        </div>
                    </div>
                    <div class="position-relative form-group">
                        <img src="#" name="theme_image_preview" class="d-none" style="min-width: 300px; max-height: 150px; object-fit:cover;">
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Sorting -->
<div class="modal fade bd-example-modal-sm-sort " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Sorting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="simple-list" class="row">
                    <div id="items" class="list-group col simple" style="cursor: -webkit-grab; cursor: grab">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="savesort()" class=" btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function update_preview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('img[name="' + $(input).attr('name') + '_preview"]').attr('src', e.target.result);
                $('img[name="' + $(input).attr('name') + '_preview"]').removeClass('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
    function load_topik() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/theme",
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
                    var x = a.judul.toLowerCase();
                    var y = b.judul.toLowerCase();
                    return x < y ? -1 : x > y ? 1 : 0;
                });
                id.sort(function(a, b) {
                    return a.urutan - b.urutan;
                });
                console.log(id)

                html = '';
                $.each(id, function(index, row) {
                    html += `<div class="col-4 mb-4">`;
                    html += `<div class="card card-body">`;
                    html += `<a href="{{ route('forum-topik') }}?token=` + row.uuid + `" class="text-dark">`;
                    html += `<h4 class="">` + row.judul + ` (` + row.jml_post + `)</h4>`;
                    html += `</a>`;
                    html += `<hr>`;
                    html += `<button class="btn btn-info" onclick="edit_theme('` + row.uuid + `')">Edit</button>`;
                    html += `</div>`;
                    html += `</div>`;
                });
                $('.topik-list').html(html);
            }
        });
    }

    $('#create-forum').submit(function(e) {
        e.preventDefault();
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/theme",
            "method": "post",
            "data": {
                "judul": $('input[name="judul_1"]').val()
            },
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + window.localStorage.getItem('token'),
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                notif('success', response.info);
                load_topik();
            }
        });
    });

    function edit_theme(id) {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/theme/detail?token=" + id,
            "method": "get",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + window.localStorage.getItem('token'),
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                $("#detail_modal").modal('show');
                $('input[name="judul"]').val(response.data.judul);
                $('input[name="uuid"]').val(response.data.uuid);
                $('img[name="theme_image_preview"]').attr('src', response.data.url_gambar).removeClass('d-none')
                $('img[name="theme_image_preview"]').attr('src', response.data.url_gambar);
            }
        });
    }

    // $('#update-forum').submit(function(e) {
    //     e.preventDefault();
    //     $('#cover-spin').show();
    //     $.ajax({
    //         "url": api + "admin/theme/update?token=" + $('input[name="uuid"]').val(),
    //         "method": "post",
    //         "data": $(this).serialize(),
    //         "headers": {
    //             "Accept": "application/json",
    //             "Authorization": 'bearer ' + window.localStorage.getItem('token'),
    //         },
    //     }).done(function(response) {
    //         $('#cover-spin').hide();
    //         if (response.message == 'Success') {
    //             $("#detail_modal").modal('hide');
    //             notif('success', response.info);

    //         }
    //     });
    // });

    //update
    $('#update-forum').submit(function(e) {
        $('#cover-spin').show();
        e.preventDefault();
        $.ajax({
            method: 'post',
            url: api + "admin/theme/update?token=" + $('input[name="uuid"]').val(),
            data: new FormData($('#update-forum')[0]),
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
                    notif('error', response.info);
                } else if (response.message == 'Success') {
                    $('#cover-spin').hide();
                    notif('success', response.info);
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }
            }
        });
    });


    load_topik();


    //SHOW SORTING
    function sorting() {
        $.ajax({
            "url": api + "admin/sorter?table=topik",
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response1) {
            if (response1.message == 'Success') {
                console.log(response1)
                html33 = '';
                $.each(response1.data, function(index, row) {
                    html33 += `<div id="` + row.uuid + `" class="list-group-item"><i class="fas fa-arrows-alt handle"></i>` + ` ` + row.judul + `</div>`;
                    html33 += '</div>';
                });
                document.querySelector('.simple').innerHTML = html33;
            }
        });
    }

    var originalList;
    var listnew;
    var el = document.getElementById('items');
    var sortable = new Sortable(el, {
        animation: 150,
        ghostClass: 'bg-color-info',
        onStart: function(evt) {
            originalList = [...document.querySelectorAll("#items > div")].map(el => el.id);
        },
        onEnd: function(evt) {
            listnew = [...document.querySelectorAll("#items > div")].map(el => el.id);
            var data = [{
                'arr_id': listnew
            }];
            datas = listnew;
            console.log(listnew);

        }
    });

    //CREATE SORTING
    function savesort() {
        $('#cover-spin').show();
        $.ajax({
            type: "post",
            url: api + 'admin/sorter?table=topik',
            data: {
                'arr_id[]': datas
            },
            dataType: 'json',
            headers: {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
            success: function(response) {
                console.log(response);
                if (response.message !== 'Success') {
                    $('#cover-spin').hide();

                    notif('error', 'Gagal merubah, Silahkan Refresh Ulang !');

                } else if (response.message == 'Success') {
                    $('#cover-spin').hide();

                    notif('success', 'Berhasil merubah Data , Mohon tunggu');
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }

            }
        });
    }
</script>
@endsection
@extends('layouts.layout')