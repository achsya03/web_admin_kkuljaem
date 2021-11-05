@section('title', 'Detail Transaksi')
@section('title-description', 'Memantau transaksi dan keuangan aplikasi')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div class="col-lg-13">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h4 style="color:black"><strong>Informasi Pembayaran</strong></h4>
            <a id="invoice"> </a>
            <br>
            <span style="color:black"><strong>Jenis Transaksi</strong></span><br>
            <a id="jenis"> </a>
            <br>
            <span style="color:black"><strong>Tipe Transaksi</strong></span><br>
            <a id="tipe"> </a>
            <br>
            <span style="color:black"><strong>Jumlah</strong></span><br>
            <a id="jumlah"> </a>
            <br>
            <span style="color:black"><strong>Tanggal Transaksi</strong></span><br>
            <a id="tanggal"> </a>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
<div class="col-lg-13">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h4 style="color:black"><strong>Detail Pesanan</strong></h4>
            <span style="color:black"><strong>Jenis Pesananan</strong></span><br>
            <a id="packet_name"> </a>
            <br>
            <span style="color:black"><strong>Nama Pengguna</strong></span><br>
            <a id="nama_user"> </a>
            <br>
            <span style="color:black"><strong>Email</strong></span><br>
            <a id="email"> </a>
            <br>
            <span style="color:black"><strong>Alamat</strong></span><br>
            <a id="alamat"> </a>
            <br>
            <!-- <span style="color:black"><strong>Alamat</strong></span>
            <a id="invoice"> </a> -->
            <br>
        </div>
    </div>
</div>


@endsection
@section('js')

<script>
    function load_payment() {
        $('#cover-spin').show();
        $.ajax({
            "url": api + "admin/subs/detail?token=" + urlParams.get('id'),
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                console.log(response)
                document.getElementById('invoice').textContent = response.data.subs['id_permintaan'];
                document.getElementById('jenis').textContent = response.data.subs['jenis'];
                document.getElementById('tipe').textContent = response.data.subs['status'];
                document.getElementById('jumlah').textContent = response.data.subs['jumlah'];
                document.getElementById('tanggal').textContent = response.data.subs['tgl_akhir_bayar'];

                document.getElementById('packet_name').textContent = response.data.detail_sub['packet_name'];
                document.getElementById('nama_user').textContent = response.data.detail_sub['nama_user'];
                document.getElementById('email').textContent = response.data.detail_sub['email'];
                document.getElementById('alamat').textContent = response.data.detail_sub['alamat'];


            }
        });
    }
    load_payment();
</script>

@endsection
@extends('layouts.layout')