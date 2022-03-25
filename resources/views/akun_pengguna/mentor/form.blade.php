<div class="position-relative form-group"><label for="exampleEmail" class="">Email Mentor</label>
    <input name="email" id="email" placeholder="" type="email" class="form-control">
</div>
<div class="position-relative form-group d-none" id="password1"><label for="exampleEmail" class="">Kata Sandi</label>
    <input name="password" id="password" placeholder="" type="text" class="form-control">
</div>
<div class="position-relative form-group  d-none" id="password_confirmation1"><label for="exampleEmail" class="">Konfirmasi Kata Sandi</label>
    <input name="password_confirmation" id="password_confirmation" placeholder="" type="text" class="form-control">
</div>
<div class="position-relative form-group"><label for="exampleEmail" class="">Nama Mentor</label>
    <input name="nama" id="nama" placeholder="" type="text" class="form-control">
</div>
<div class="position-relative form-group"><label for="exampleEmail" class="">Awal Mengajar</label>
    <input name="awal_mengajar" id="awal_mengajar" placeholder="" type="date" class="form-control">
</div>
<div class="position-relative form-group"><label for="exampleText" class="">Bio</label>
    <textarea name="bio" id="bio" class="form-control"></textarea>
</div>

<div class="form row">
    <div class="col-md-2">
        <label class="">File</label>
        <input name="url_foto[]" id="url_foto" type="file" class="form-control-file" onchange="update_preview(this)">
        <small class=" form-text text-muted">Format jpg ukuran 12 x 12</small>
    </div>
    <img src="#" id="url_foto_preview" style="min-width: 300px; max-height: 150px; object-fit:cover;">

</div>
<br>
<div class="position-relative form-check">
    <input type="hidden" name="jenis_pengguna" value="mentor" />
    <input type="checkbox" name="jenis_pengguna" class="form-check-input" id="jenis_pengguna" value="admin">
    <label class="form-check-label" for="status_tersedia">Atur Sebagai Admin</label>
</div>
@section('form_js')
<script>
    function update_preview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                console.log($(input).attr('id'));
                $('img[id="' + $(input).attr('id') + '_preview"]').attr('src', e.target.result);
                $('img[id="' + $(input).attr('id') + '_preview"]').removeClass('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection