@section('title', 'Detail Transaksi')
@section('title-description', 'Memantau transaksi dan keuangan aplikasi')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div class="col-lg-13">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h4 style="color:black"><strong>Informasi Pembayaran</strong></h4>
            <a id=""> nandamohammad@gmail.com </a>
            <br>

            <span style="color:black"><strong>Status</strong></span><br>Member
            <br>
            <span style="color:black"><strong>Jenis Kelamin</strong></span><br>Laki-Laki
            <br>

            <span style="color:black"><strong>Tanggal Lahir</strong></span><br>nandamohammad@gmail.com5>
            <br>

            <span style="color:black"><strong>Alamat</strong></span><br>nandamohammad@gmail.com


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
            nandamohammad@gmail.com <br>
            <span style="color:black"><strong>Status</strong></span><br>Member
            <br>
            <span style="color:black"><strong>Jenis Kelamin</strong></span><br>Laki-Laki
            <br>
            <br>
            <span style="color:black"><strong>Alamat</strong></span><br>nandamohammad@gmail.com
            <br>
            <br>
            <a>Pin telang dipasang </a><a href="">Lihat Peta</a>

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
                document.getElementById('saldo').textContent = response.data['total_saldo'];
                document.getElementById('jumlah_t').textContent = response.data['jml_transaksi'];

   
            }
        });
    }
    load_payment();
</script>

@endsection
@extends('layouts.layout')