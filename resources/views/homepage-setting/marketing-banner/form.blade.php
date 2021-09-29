<div class="col-12">
    <div class="form-group">
        <label>Banner Web</label>
        <div class="custom-file">
            <input type="file" name="url_web" class="custom-file-input" onchange="update_preview(this)">
            <label class="custom-file-label">Pilih File</label>
            <div class="small">Format *.jpg ukuran gambar 580px x 323px dengan maksimal ukuran file 2MB</div>
        </div>
    </div>
    <div class="form-group">
        <label>Banner Mobile</label>
        <div class="custom-file">
            <input type="file" name="url_mobile" class="custom-file-input" onchange="update_preview(this)">
            <label class="custom-file-label">Pilih File</label>
            <div class="small">Format *.jpg ukuran gambar 380 x 254px dengan maksimal ukuran file 2MB</div>
        </div>
    </div>
    <div class="form-group">
        <img src="#" name="url_web_preview" style="min-width: 300px; max-height: 150px; object-fit:cover;">
        <img src="#" name="url_mobile_preview" style="min-width: 300px; max-height: 150px; object-fit:cover;">
    </div>
    <div class="form-group">
        <label>Judul Pos</label>
        <input type="text" name="judul_banner" class="form-control" placeholder="Masukan Judul POS">
    </div>
    <div class="form-group">
        <label>Detail Pos</label>
        <textarea name="deskripsi" id="#" cols="30" rows="3" class="form-control" placeholder="Masukan detail dari post tersebut..."></textarea>
        <div class="small">Jumlah Kata 0 (Max 500 Karakter)</div>
    </div>
    <div class="form-group">
        <label>Label Tombol</label>
        <select name="label" class="custom-select">
            <option>Gabung Sekarang</option>
            <option>Lihat Kelas</option>
            <option>-</option>
        </select>
    </div>
    <div class="form-group">
        <label>Link Tombol</label>
        <input type="text" name="link" class="form-control" placeholder="Masukan URL">
    </div>
</div>

@section('form_js')
<script>
    function update_preview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('img[name="' + $(input).attr('name') + '_preview"]').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection