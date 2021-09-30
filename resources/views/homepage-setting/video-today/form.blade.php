<div class="col-12">
    <div class="form-group">
        <label>Tanggal edar</label>
        <input type="date" name="jadwal" class="form-control" placeholder="dd-mm-yyyy">
    </div>
    <div class="form-group">
        <label>URL Video</label>
        <input type="text" name="url_video_preview" class="form-control" placeholder="Masukan URL Video">
        <input type="hidden" name="url_video" class="form-control" placeholder="Masukan URL Video">
    </div>
</div>

@section('form_js')
<script>
    $('input[name="url_video_preview"]').change(function() {
        $('input[name="url_video"]').val('https://drive.google.com/uc?export=preview&id=' + $(this).val().split("/")[5]);
    });
</script>
@endsection