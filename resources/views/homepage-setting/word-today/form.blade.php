<div class="col-12">
    <div class="form-group">
        <label>Tanggal edar</label>
        <input type="date" name="judul_banner" class="form-control" placeholder="dd-mm-yyyy">
    </div>
    <div class="form-group">
        <label>Kata dalam Hanguel</label>
        <input type="text" name="judul_banner" class="form-control" placeholder="Kata dalam Hanguel">
    </div>
    <div class="form-group">
        <label>Pelafalan dalam latin</label>
        <input type="text" name="judul_banner" class="form-control" placeholder="Pelafalan dalam latin">
    </div>
    <div class="form-group">
        <label>Penjelasan Kata</label>
        <textarea name="deskripsi" id="editor1" cols="30" rows="3" class="form-control" placeholder="Masukan detail dari post tersebut..."></textarea>
        <div class="small">Jumlah Kata 0 (Max 500 Karakter)</div>
    </div>
    <div class="form-group">
        <label>Berkas Audio</label>
        <div class="custom-file">
            <input type="file" name="url_web" class="custom-file-input" onchange="update_preview(this)">
            <label class="custom-file-label">Pilih File</label>
            <div class="small">Format *.mp3 maksimal ukuran file 2MB</div>
        </div>
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
    CKEDITOR.replace('editor1');
</script>
@endsection