@section('title', 'Pengaturan Banner')
@section('title-description', 'Pengaturan Homepage / Marketing Banner')
@section('title-icon', 'pe-7s-home')
@section('top-button')
<a href="{{ route('homepage-setting-non-marketing-banner-create') }}" class="btn btn-focus">Tambah Banner</a>
@endsection
@section('content')
<div>
    <!-- <a data-toggle="modal" data-target=".bd-example-modal-sm-sort" onclick="sorting()" class="btn-icon btn-icon-only btn btn-primary mobile-toggle-header-nav active" href="">Urutkan</a> -->
</div>
<br>
<div class="row" id="banner-content"></div>
@endsection
@section('modal')
<!-- Modal Sorting -->
<div class="modal fade bd-example-modal-sm-sort " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Sorting Banner</h5>
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
    //SHOW BANNER
    $('#cover-spin').show();
    $.ajax({
        "url": api + "admin/banner/non-mem",
        "method": "get",
        "headers": {
            "Accept": "application/json",
            "Authorization": 'bearer ' + token,
        }
    }).done(function(response) {
        $('#cover-spin').hide();
        console.log(response)
        // var id = response.data.slice(0);
        // id.sort(function(a, b) {
        //     var x = a.value.toLowerCase();
        //     var y = b.value.toLowerCase();
        //     return x < y ? -1 : x > y ? 1 : 0;
        // });
        // id.sort(function(a, b) {
        //     return a.urutan - b.urutan;
        // });
        // console.log(id)
        if (response.message == 'Success') {
            html = '';
            $.each(response.data, function(index, row) {
                html += '<div class="col-4">';
                html += '<div class="card mb-4">';
                html += '<img class="card-img-top" src="' + row.value + '" alt="Card image cap" style="height: 100px; object-fit: cover;">';
                html += '<div class="card-body">';
                // html += '<h5 class="card-title">' + row.judul_banner + '</h5>';
                html += '<a class="btn-icon  btn-icon-only btn btn-danger btn-sm" href="#" onclick="hapus(`' + api + 'admin/banner/non-mem?token=' + row.key + '`)">Hapus</a>';
                // html += '<a href="{{ route("homepage-setting-non-marketing-banner-edit") }}?id=' + row.key + '" class="btn btn-danger">Hapus</a>';
                html += '</div>';
                html += '</div>';
                html += '</div>';
            });
            $('#banner-content').html(html);
        }
    });

    //SORTING
    function sorting() {
        $.ajax({
            "url": api + "admin/sorter?table=banner",
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
                    html33 += `<div id="` + row.uuid + `" class="list-group-item"><i class="fas fa-arrows-alt handle"></i>` + ` ` + row.judul_banner + `</div>`;
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
            url: api + 'admin/sorter?table=banner&',
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
                        window.location = "{{route('homepage-setting-non-marketing-banner')}}";
                    }, 1000);
                }

            }
        });
    }
</script>
@endsection
@extends('layouts.layout')