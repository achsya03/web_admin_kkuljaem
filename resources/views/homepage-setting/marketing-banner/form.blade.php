<div class="col-12">
    <div class="form-group">
        <label>Banner Web</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" required>
            <label class="custom-file-label">Pilih File</label>
            <div class="small">Format *.jpg ukuran gambar 580px x 323px dengan maksimal ukuran file 2MB</div>
        </div>
    </div>
    <div class="form-group">
        <label>Banner Mobile</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" required>
            <label class="custom-file-label">Pilih File</label>
            <div class="small">Format *.jpg ukuran gambar 380 x 254px dengan maksimal ukuran file 2MB</div>
        </div>
    </div>
    <div class="form-group">
        <img src="{{ url('css/assets/images/avatars/1.jpg') }}" style="min-width: 300px; max-height: 150px; object-fit:cover;">
        <img src="{{ url('css/assets/images/avatars/1.jpg') }}" style="min-width: 300px; max-height: 150px; object-fit:cover;">
    </div>
    <div class="form-group">
        <label>Judul Pos</label>
        <input type="text" class="form-control" placeholder="Masukan Judul POS">
    </div>
    <div class="form-group">
        <label>Detail Pos</label>
        <textarea name="#" id="#" cols="30" rows="3" class="form-control" placeholder="Masukan detail dari post tersebut..."></textarea>
        <div class="small">Jumlah Kata 0 (Max 500 Karakter)</div>
    </div>
    <div class="form-group">
        <label>Judul Pos</label>
        <select class="custom-select">
            <option>Gabung Sekarang</option>
            <option>Lihat Kelas</option>
            <option>-</option>
        </select>
    </div>
    <div class="form-group">
        <label>Link Tombol</label>
        <input type="text" class="form-control" placeholder="Masukan URL">
    </div>
</div>