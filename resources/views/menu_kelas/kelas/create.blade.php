@section('title', 'Tambah Kelas')
@section('title-description', 'Manajemen Grup Kelas, Data kelas dan Materi pembelajaran')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')

<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Kelas</h5>
                    <form id="change-pass-form">
                        @include('menu_kelas.kelas.form')
                        <br>
                        <button type="submit" class="mt-1 btn btn-success">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    //show data kategori
    async function getISS() {
        const response = await fetch('https://floating-harbor-93486.herokuapp.com/api/admin/classroom-group/detail?token=' + urlParams.get('id'));
        const datas = await response.json();
        const {
            data,
        } = datas;
        console.log(data)

        document.getElementById('nama').value = data['nama'];
        //kembali
        html00 = '';
        html00 += `<a href = "{{route('kelas')}}?id=` + data.uuid + `" type = "button" class=" mb-2 mr-2 btn btn-primary" >> Kembali </a>`
    }
    getISS();


    //ambil data mentor
    $.ajax({
        "url": api + 'admin/classroom/add',
        "method": "get",
        "headers": {
            "Accept": "application/json",
            "Authorization": 'bearer ' + token,
        },
        success: function(response) {
            if (response.message == 'Success') {
                html = '';
                $.each(response.data.mentor, function(index, row) {
                    html += '<option value="' + row.mentor_uuid + '">' + row.nama + '</option>';
                });
                $('select[name="mentor[]"]').html(html);
            }
        }
    });










    //CREATE
    const myForm4 = document.getElementById("judul_kelas").value;
    const myForm5 = document.getElementById("deskripsi").value;
    const myForm6 = document.getElementById("mentor").value;
    const myForm8 = document.getElementById("url_mobile");
    const myForm7 = document.getElementById("url_web");


    $('#change-pass-form').submit(function(e) {
        e.preventDefault();

        $("#mentor").each(function() {
            console.log($(this).val())


            var form ="";
            var form = new FormData();
            form.append("id_class_category", urlParams.get('id'));
            form.append("judul", document.getElementById("judul_kelas").value);
            form.append("deskripsi", document.getElementById("deskripsi").value);
            form.append("url_web", myForm7.files[0], document.getElementById("url_web"));
            form.append("url_mobile", myForm8.files[0], document.getElementById("url_mobile")); 
            form.append("status_tersedia", ($('input[name="status"]').prop('checked') ? 1 : 0));

            $.each($(this).val(), function(index1, row1) {
                console.log(row1)
                form.append("id_user[]", row1);
            });


            $.ajax({
                method: 'post',
                url: 'https://floating-harbor-93486.herokuapp.com/api/admin/classroom?token=' + urlParams.get('id'),
                data: form,
                dataType: 'json',
                contentType: false,
                mimeType: "multipart/form-data",
                processData: false,
                success: function(response) {
                    if (response.message !== 'Success') {
                      notif('error', 'Silahkan cek form dan tipe file yang di upload');

                        // $.growl.warning({
                        //     message: response.message
                        // });
                    } else if (response.message == 'Success') {
                      notif('success', 'Berhasil membuat kelas, Mohon tunggu');
                        
                        // $.growl.notice({
                        //     message: response.message.message
                        // });
                        window.location = "{{route('kelas')}}?id=" + urlParams.get('id') ;
                    }
                }
            });
        });
    });
</script>


@endsection
@extends('layouts.layout')