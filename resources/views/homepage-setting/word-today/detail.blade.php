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
                <h5>12/12/2021</h5>
                <h1>나루토 우즈 마키</h1>
                <h6 class="text-muted">(Uzumaki Naruto)</h6>
                <audio controls class="mb-3">
                    <source src="/Story.mp3" type="audio/mpeg">
                    UPS, Browser kamu tidak mendukung media suara.
                </audio>
                <h6 class="font-weight-bold">Penjelasan</h6>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore sed fuga excepturi! Cupiditate natus totam nam quod tenetur placeat itaque quas enim optio? Excepturi ex nostrum architecto rerum at temporibus?
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
            "url": api + "admin/word?jadwal=" + urlParams.get('date'),
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
                    '<button class="btn btn-sm btn-danger">Hapus</button>';
            }
        }]
    });

    function get_detail(id) {
        $.ajax({
            "url": api + "admin/word/detail?token=" + id,
            "method": "get",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            }
        }).done(function(response) {
            console.log(response);
        });
    }
</script>
@endsection
@extends('layouts.layout')