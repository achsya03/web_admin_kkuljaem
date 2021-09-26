@section('title', 'Sunting Forum')
@section('title-description', 'Forum / Topik A / Judul Forum')
@section('title-icon', 'pe-7s-news-paper')

@section('content')
<div class="card card-body">
    <div class="row">
        <div class="col-5">
            <div class="position-relative form-group">
                <label>Topik</label>
                <select name="#" class="custom-select">
                    <option value="#">Kpop</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="position-relative form-group">
                <label>Judul Forum</label>
                <input type="text" class="form-control" placeholder="Judul Forum">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="position-relative form-group">
                <label>Konten Forum</label>
                <textarea name="#" rows="5" class="form-control" placeholder="Konten Forum"></textarea>
                <small>Jumlah Kata 0 (max 200 kata)</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <div class="form-group">
                @foreach([1,2,3] as $row)
                <label>Gambar {{ $row }}</label>
                <table class="mb-4">
                    <tr>
                        <td width="20%">Gambar 1</td>
                        <td>
                            <button class="btn btn-primary">Hapus</button>
                        </td>
                    </tr>
                </table>
                @endforeach
            </div>
            <button class="btn btn-success mb-3">Simpan</button> <br>
            <button class="btn btn-danger" onclick="hapus_forum()">Hapus Forum</button>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function hapus_forum() {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Langkah ini tidak dapat diurungkan, setelah menekan \"YA\" maka data akan dihapus permanen",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            showCancelButton: true,
            confirmButtonText: `Ya`,
            cancelButtonText: `Batalkan`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Saved!', '', 'success')
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })
    }
</script>
@endsection
@extends('layouts.layout')