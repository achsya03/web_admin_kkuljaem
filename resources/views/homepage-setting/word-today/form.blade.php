<div class="col-12">
    <div class="form-group">
        <label>Tanggal edar</label>
        <input type="date" name="jadwal" class="form-control" placeholder="dd-mm-yyyy" required>
    </div>
    <div class="form-group">
        <label>Kata dalam Hanguel</label>
        <input type="text" name="hangeul" class="form-control" placeholder="Kata dalam Hanguel" required>
    </div>
    <div class="form-group">
        <label>Pelafalan dalam latin</label>
        <input type="text" name="pelafalan" class="form-control" placeholder="Pelafalan dalam latin" required>
    </div>
    <div class="form-group">
        <label>Penjelasan Kata</label>
        <textarea name="penjelasan" id="editor1" cols="30" rows="3" class="form-control" placeholder="Masukan detail dari post tersebut..."></textarea>
        <div class="small">Jumlah Kata 0 (Max 500 Karakter)</div>
    </div>
    <div class="form-group">
        <label>Berkas Audio</label>
        <div class="custom-file">
            <input type="file" name="url_pengucapan" class="custom-file-input">
            <label class="custom-file-label">Pilih File</label>
            <div class="small">Format *.mp3 maksimal ukuran file 2MB</div>
        </div>
    </div>
</div>

@section('form_js')
<script>
    var editor = CKEDITOR.replace('editor1');
    CKEDITOR.instances.editor1.on('change', function() {
        $('textarea[name="penjelasan"]').val(editor.getData());
    });
</script>
@endsection