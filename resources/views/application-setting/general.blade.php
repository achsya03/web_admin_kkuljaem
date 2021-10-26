@section('title', 'Pengaturan Umum')
@section('title-description', 'Pengaturan Aplikasi')
@section('title-icon', 'pe-7s-news-paper')

@section('content')
<div class="card card-body">
    <h3>Versi Aplikasi</h3>
    <div class="row">
        <div class="col-5">
            <div class="position-relative form-group">
                <label>Nomor Versi Android</label>
                <input type="text" name="and_ver" id="and_ver" class="form-control" placeholder="...">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="position-relative form-group">
                <label>Nomor Versi IOS</label>
                <input type="text" name="ios_ver" id="ios_ver" class="form-control" placeholder="...">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <button type="button" onclick="simpan('version')" class="btn btn-success mt-3">Simpan</button>
        </div>
    </div>
</div>
<div class="card card-body mt-4">
    <div class="col-12">
        <h5 class="mt-2 font-weight-bold">TNC</h5>
        <textarea name="tnc" id="tnc"></textarea>
        <button type="button" onclick="simpan('tnc')" class="btn btn-success mt-3">Simpan</button>
    </div>
</div>
<div class="card card-body mt-4">
    <div class="col-12">
        <h5 class="mt-2 font-weight-bold">Privacy Policy</h5>
        <textarea name="policy" id="policy"></textarea>
        <button type="button" onclick="simpan('policy')" class="btn btn-success mt-3">Simpan</button>
    </div>
</div>
@endsection

@section('js')
<script>
    var tnc = CKEDITOR.replace('tnc');
    var policy = CKEDITOR.replace('policy');
    $('#cover-spin').show();
    $.each(['tnc', 'policy', 'version', 'about'], function(index, row) {
        $.ajax({
            "url": api + "admin/setting?key=" + row,
            "method": "get",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            }
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == "Success") {
                if (row == 'version') {
                    $.each(response.data, function(index2, data) {
                        $('#' + data.key).val(data.value);
                    });
                } else if (row == 'tnc') {
                    tnc.setData(response.data.value);
                } else if (row == 'policy') {
                    policy.setData(response.data.value);
                }
            }
        });
    });

    function simpan(form) {
        if (form == "version") {
            $.each(['and_ver', 'ios_ver'], function(index, row) {
                store(row, $('#' + row).val());
            });
        } else if (form == 'tnc') {
            store(form, tnc.getData());
        } else if (form == 'policy') {
            store(form, policy.getData());
        }
    }

    function store(form_name, value) {
        $('#cover-spin').show();
        if (form_name == 'and_ver' || form_name == 'ios_ver') {
            var data = {
                'ios_ver': $('input[name="ios_ver"]').val(),
                'and_ver': $('input[name="and_ver"]').val(),
            }
            form_name = 'version';
        } else {
            var data = {
                'value': value
            }
        }
        $.ajax({
            "url": api + "admin/setting/update?key=" + form_name,
            "method": "post",
            "data": data,
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            }
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == "Success") {
                notif('success', response.info);
            }
        });
    }
</script>
@endsection
@extends('layouts.layout')