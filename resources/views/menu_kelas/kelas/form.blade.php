<div class="position-relative form-group">
    <label for="exampleEmail" class="">Judul Kelas</label>
    <input name="judul" id="judul" class="form-control" required>
</div>
<div class="position-relative form-group">
    <label for="exampleEmail" class="">Deskripsi Kelas</label>
    <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
</div>
<div class="position-relative form-group">
    <label for="exampleSelectMulti" class="">Nama Mentor</label>
    <select multiple name="id_user[]" id="mentor" class="form-control" required> </select>
</div>
<div class="position-relative form-group">
    <label class="">Banner Kelas Web</label>
    <input name="url_web" id="url_web" type="file" class="form-control-file">
    <div class="img" id="img"></div>
    <small class="form-text text-muted">Format. Jpg Ukuran Gambar 580 x 323px dengan maksimal file 2MB</small>
</div>
<div class="position-relative form-group">
    <label class="">Banner Kelas Mobile</label>
    <input name="url_mobile" id="url_mobile" type="file" class="form-control-file">
    <div class="img1" id="img1"></div>
    <small class="form-text text-muted">Format. Jpg Ukuran Gambar 380 x 254 px dengan maksimal file 2MB</small>
</div>
<div class="position-relative form-check">
    <input type="hidden" name="status_tersedia" value="0" />
    <input type="checkbox" name="status_tersedia" class="form-check-input" id="status_tersedia" value="1">
    <label class="form-check-label" for="status_tersedia">Publikasikan</label>
</div>
<input type="hidden" name="id_class_category">