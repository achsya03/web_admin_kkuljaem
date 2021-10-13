@section('title', 'Detail Mentor')
@section('title-description', 'Akun Pengguna/Mentor/Detail Mentor')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')

<div>
    <div class="img">
    </div>
</div>
<br>
<h4 style="color:black"><strong id="nama"></strong></h4>
<a id="email"></a>
<br>

<span style="color:black"><strong>Status</strong></span><br>
<a id="status"></a>

<br>
<span style="color:black"><strong>Bio</strong></span><br>
<a id="bio"></a>


<br>

<br>
<div class="form-row">
    <div class="sunting col-md-2">
    </div>
    <div class="hapus col-md-2">

    </div>

</div>
<br>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Mentor di kelas :</h5>
        <table class="mb-0">
            <thead>
                <tr>
                    <th width="2%"></th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="tbody1">

            </tbody>
        </table>
    </div>
</div>
@endsection
@section('js')
<script>
    function load_detail() {
        $.ajax({
            "url": api + "admin/user/mentor/detail?token=" + urlParams.get('id'),
            "method": "GET",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
        }).done(function(response) {
            $('#cover-spin').hide();
            if (response.message == 'Success') {
                console.log(response)

                document.getElementById('nama').textContent = response.data.user['nama'];
                document.getElementById('email').textContent = response.data.user['email'];
                document.getElementById('status').textContent = response.data.user['status'];
                document.getElementById('bio').textContent = response.data.user['bio'];


                //show sunting
                html111 = "";
                html111 += `<a href="{{ route('editmentor') }}?token=` + urlParams.get('id') + `"  class = "mb-2 mr-2 btn btn-primary">Sunting Akun Mentor </a>`
                document.querySelector('.sunting').innerHTML = html111;

                //show hapus
                html1111 = "";
                html1111 += `<a href = "#" onclick = "hapus('` + api + `admin/user/mentor?token=` + urlParams.get('id') + `')" class = "mb-2 mr-2 btn btn-primary" > Hapus Akun Mentor </a>`
                document.querySelector('.hapus').innerHTML = html1111;



                //show foto
                html11 = '';
                html11 += '<img src =' + response.account['foto'] + ' style ="border-radius: 50%; width:150px;" />';
                document.querySelector('.img').innerHTML = html11;

                //show sub
                html1 = '';
                $.each(response.data.classes, function(index, row) {
                    html1 += '<tr>';
                    html1 += '<td>' + '<strong>' + "-" + '</strong>' + '</td>';
                    html1 += '<td>' + row.kelas_nama + '</td>';
                    html1 += '</tr>';
                });
                document.querySelector('.tbody1').innerHTML = html1;


            }
        });
    }
    load_detail();
</script>
@endsection
@extends('layouts.layout')