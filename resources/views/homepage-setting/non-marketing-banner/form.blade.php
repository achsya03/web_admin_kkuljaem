<div class="col-12">
    <div class="form-group">
        <label>Banner Web</label>
        <div class="custom-file">
            <input type="file" name="non_mem_image" class="custom-file-input" onchange="update_preview(this)">
            <label class="custom-file-label">Pilih File</label>
            <div class="small">Format *.jpg ukuran gambar 580px x 323px dengan maksimal ukuran file 2MB</div>
        </div>
        <img src="#" name="non_mem_image_preview" style="min-width: 300px; max-height: 150px; object-fit:cover;">
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