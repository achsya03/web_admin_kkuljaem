@section('title', 'Kata hari ini')
@section('title-description', 'Pengaturan homepage aplikasi / Kata hari ini')
@section('title-icon', 'pe-7s-home')
@section('top-button')
<a href="{{ route('homepage-setting-word-today-create') }}" class="btn btn-success">Tambah Kata</a>
@endsection
@section('content')
<div class="card card-body">
    <table class="dataTable table">
        <thead>
            <tr>
                <td>Hangeuel</td>
                <td>Arti/Penjelasan Kata</td>
                <td data-orderable="false" width="20%">Audio</td>
                <td data-orderable="false" width="1px">Action</td>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection
@section('modal')
<div class="modal fade" id="detail-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 id="date">12/12/2021</h5>
                <h1 id="hangeul">#</h1>
                <h6 class="text-muted" id="pelafalan">#</h6>
                <div id="audio"></div>
                <h6 id="penjelasan">Penjelasan</h6>
                <a id="btn-sunting" href="#" class="btn btn-success">Sunting</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $('.page-title-text .title').html(moment(urlParams.get('date')).format('DD MMMM YYYY'));
    $('.dataTable').dataTable({
        "ajax": {
            "url": api + "admin/word/schedule?jadwal=" + urlParams.get('date'),
            "dataSrc": "data.word",
            "dataType": 'json',
            "type": "GET",
            "beforeSend": function(xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + token);
            },
        },
        "columns": [{
            "data": "hangeul"
        }, {
            "data": "penjelasan"
        }, {
            "data": "url_pengucapan",
            "render": function(data) {
                return '<audio controls class="mb-3">' +
                    '<source src="' + data + '" type="audio/mpeg">' +
                    'UPS, Browser kamu tidak mendukung media suara.' +
                    '</audio>';
            }
        }, {
            "data": "uuid",
            "render": function(data) {
                return `<button class="btn btn-sm btn-secondary mb-1" data-toggle="modal" data-target="#detail-modal" onclick="get_detail('` + data + `')">Detail</button>` +
                    '<button class="btn btn-sm btn-danger" onclick="hapus(\'' + api + 'admin/word?token=' + data + '\')">Hapus</button>';
            }
        }]
    });

    function get_detail(id) {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/word/detail?token=" + id,
            "method": "get",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            }
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == "Success") {
                $('#audio').html('<audio controls class="mb-3"><source src="' + response.data.url_pengucapan + '" type="audio/mpeg"></audio>');
                $('#pelafalan').html('(' + response.data.pelafalan + ')');
                $('#hangeul').html(response.data.hangeul);
                $('#date').html(moment(response.data.jadwal).format('DD MMMM YYYY'));
                $('#penjelasan').html(response.data.penjelasan);
                $('#btn-sunting').attr('href', '{{ route("homepage-setting-word-today-edit") }}?id=' + response.data.uuid);
            }
        });
    }
</script>
@endsection
@extends('layouts.layout')