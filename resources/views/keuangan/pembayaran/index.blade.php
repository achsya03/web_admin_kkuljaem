@section('title', 'Pembayaran')
@section('title-description', 'Memantau transaksi dan keuangan aplikasi')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a>
                    <div class="link">
                        <h6>Total Saldo</strong></h6>
                    </div>
                </a>
                <a>
                    <div>
                        <h5><strong id="saldo"></strong></h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <a>
                    <div class="link">
                        <h6>Jumlah Transaksi</strong></h6>
                    </div>
                </a>
                <a>
                    <div>
                        <h5><strong id="jumlah_t"></strong></h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- 
<a href="{{ route('penarikansaldo')}}" class="btn btn-success">Tarik Saldo</a> -->
<br>
<br>
<div class="card card-body">

    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <h4>Daftar Transaksi</h4>

        <table id="example" class="table table-hover table-striped table-bordered">
            <thead>
                <th>#</th>
                <th>Tipe Transaksi</th>
                <th>Jenis</th>
                <th>Tanggal&Waktu</th>
                <th>ID permintaan </th>
                <th>Email Pengguna </th>
                <th>Status </th>
                <th>Action </th>
                </tr>
            </thead>
            <tbody class="tbody">

            </tbody>

        </table>
    </div>
</div>
<br>

@endsection

@section('js')

<script>
    function load_payment() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/subs",
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {

                document.getElementById('saldo').textContent = formatter.format(response.data['total_saldo']);
                document.getElementById('jumlah_t').textContent = response.data['jml_transaksi'];

                console.log(response)
                html = '';
                $.each(response.data.subs, function(index, row) {
                    html += '<tr>';
                    html += '<td>' + (index + 1) + '</td>';
                    html += '<td>' + row.tipe_transaksi + '</td>';
                    html += '<td>' + row.jenis + '</td>';
                    html += '<td>' + moment(row.tgl_subs).add(7, 'hours').format('l, h:mm:ss A') + '</td>';
                    html += '<td>' + row.id_permintaan + '</td>';
                    html += '<td>' + row.email + '</td>';
                    html += '<td>' + row.status + '</td>';
                    html += '<td>' + `<a href="{{route('detailtransaksi')}}?id=` + row.id_permintaan + `" style="margin:2px;"  type="button" class="btn btn-primary btn-sm">Rincian</a><br>` + '</td>';

                    html += '</tr>';
                });
                document.querySelector('.tbody').innerHTML = html;
                $('table').DataTable();

            }
        });
    }
    load_payment();
</script>

@endsection
@extends('layouts.layout')