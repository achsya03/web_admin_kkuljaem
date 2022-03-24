<div class="position-relative form-group">
    <label for="exampleEmail" class="">Nama Avatar</label>
    <input name="nama" id="nama" class="form-control" required>
    <input name="group_uuid" id="group_uuid" class="form-control" hidden required>
</div>
<div class="position-relative form-group">
    <label for="exampleEmail" class="">Deskripsi Avatar</label>
    <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
</div>
<div class="form-group">
    <label>Gambar Avatar</label>
    <div class="custom-file">
        <input type="file" name="avatar_image" id="avatar_image" accept="image/*" class="custom-file-input" onchange="update_preview(this)">
        <label class="custom-file-label">Pilih File</label>
        <div class="small">Format .jpg ukuran gambar 580 x 323px dengan maksimal ukuran file 2MB</div>
    </div>
    <img class="img d-none" src="#" name="avatar_image_preview" style="min-width: 300px; max-height: 150px; object-fit:cover;">
</div>


@section('form_js')
<script>
    document.getElementById("group_uuid").value = urlParams.get('id');

    function update_preview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('img[name="' + $(input).attr('name') + '_preview"]').attr('src', e.target.result);
                $('img[name="' + $(input).attr('name') + '_preview"]').removeClass('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection