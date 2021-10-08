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

<div class="form-group">
    <label>Banner Kelas Web</label>
    <div class="custom-file">
        <input type="file" name="url_web" id="url_web" accept="image/*" class="custom-file-input" onchange="update_preview(this)" >
        <label class="custom-file-label">Pilih File</label>
        <div class="small">Format .jpg ukuran gambar 580 x 323px dengan maksimal ukuran file 2MB</div>
    </div>
    <img  class="img"src="#" name="url_web_preview" style="min-width: 300px; max-height: 150px; object-fit:cover;">
</div>

<div class="form-group">
    <label>Banner Kelas Mobile</label>
    <div class="custom-file">
        <input type="file" name="url_mobile" id="url_mobile" accept="image/*" class="custom-file-input" onchange="update_preview(this)" >
        <label class="custom-file-label">Pilih File</label>
        <div class="small">Format .jpg ukuran gambar 580 x 323px dengan maksimal ukuran file 2MB</div>
    </div>
    <img src="#" name="url_mobile_preview" style="min-width: 300px; max-height: 150px; object-fit:cover;">
</div>


<div class="position-relative form-check">
    <input type="hidden" name="status_tersedia" value="0" />
    <input type="checkbox" name="status_tersedia" class="form-check-input" id="status_tersedia" value="1">
    <label class="form-check-label" for="status_tersedia">Publikasikan</label>
</div>
<input type="hidden" name="id_class_category">

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