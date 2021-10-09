@section('title', 'Reference ID')
@section('title-description', 'Reference ID / Detail / ')
@section('title-icon', 'pe-7s-config')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Jumlah Siswa Ikut "<span id="kode"></span>" ( <span id="jml_subs"></span> )</h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <td width="1px">#</td>
                    <td>Nama Siswa</td>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection
@section('js')
<script>
    $('.table').dataTable({
        "ajax": {
            "url": api + "admin/reference/student?token=" + urlParams.get('token'),
            "dataSrc": "data.subscriber",
            "dataType": 'json',
            "type": "GET",
            "beforeSend": function(xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + token);
            },
        },
        "columns": [{
            "data": "user_uuid",
            "render": function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        }, {
            "data": "nama"
        }],
        "drawCallback": function(settings) {
            var json = this.api().ajax.json();
            if (json) {
                $('#kode').html(json.data.kode);
                $('#jml_subs').html(json.data.jml_subs);
                $('.page-title-subheading').append(json.data.kode);
            }
        }
    });
</script>
@endsection
@extends('layouts.layout')