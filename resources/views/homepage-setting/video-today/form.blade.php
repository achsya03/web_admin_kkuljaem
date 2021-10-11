<div class="col-12">
    <div class="form-group">
        <label>Tanggal edar</label>
        <input type="date" name="jadwal" class="form-control" placeholder="dd-mm-yyyy">
    </div>
    <div class="form-group">
        <label>URL Video</label>
        <input type="text" name="url_video" class="form-control" placeholder="Masukan URL Video">
    </div>
    <iframe width="350" height="200" src="https://www.youtube.com/embed/ScMzIvxBSi4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>

@section('form_js')
<script>
    $('input[name="url_video"]').keyup(function() {
        $('iframe').attr('src', 'https://www.youtube.com/embed/' + $(this).val().split("=")[1].split("&")[0]);
    });
</script>
@endsection