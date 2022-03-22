@section('title', 'Siswa')
@section('title-description', 'Manajemen Data Siswa')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div>
    <a href="{{route('tambahsiswa')}}" class="mb-2 mr-2 btn btn-primary">Tambah Siswa</a>
</div>
<br>
<div class="main-card mb-3 card">
    <div class="card-body">

        <table id="example" class="table table-hover table-striped table-bordered">
            <thead>
                <th>#</th>
                <th>Status</th>
                <th>Email</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody class="tbody">

            </tbody>

        </table>
    </div>
</div>

@endsection

@section('js')

<script>
    function load_student() {
        $(function() {
            var table = $('.table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "https://api.kkuljaemkoreanapp.com/api/admin/user/student/lists",
                    "dataType": 'json',
                    "type": "GET",
                    "beforeSend": function(xhr) {
                        xhr.setRequestHeader("Authorization", "Bearer " + token);
                    },
                },
                columns: [{
                        data: null,
                        sortable: false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    }, {
                        data: 'status_aktif',
                        name: 'u.status_aktif'
                    }, {
                        data: 'email',
                        name: 'u.email'
                    }, {
                        data: 'nama',
                        name: 'u.nama'
                    }, {
                        data: 'jenis_kel',
                        name: 'jenis_kel'
                    }, {
                        data: 'tgl_lahir',
                        name: 'tgl_lahir'
                    }, {
                        data: 'tempat_lahir',
                        name: 'tempat_lahir'
                    }, {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    }
    load_student();
</script>



@endsection
@extends('layouts.layout')