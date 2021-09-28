@php($jawabans = ['A', 'B', 'C', 'D'])
<div class="card-body">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="exampleEmail" class="">Pertanyaan</label>
                <textarea rows="4" cols="50" name="email" id="exampleEmail" placeholder="" type="email" class="form-control"></textarea>
                <small class="form-text text-muted">Jumlah Kata 0 (Max 500 Karakter)</small>
            </div>
        </div>
    </div>
    <div>
        <label class="mt-2">File Gambar</label>
        <input name="file" type="file" class="form-control-file">
        <small class="form-text text-muted">Format jpg ukuran 12 x 12</small>
    </div>
    <div>
        <label class="mt-3">File Audio</label>
        <input name="file" type="file" class="form-control-file">
        <small class="form-text text-muted">Format jpg ukuran 12 x 12</small>
    </div>
    <div class="row mt-3">
        <div class="position-relative form-group col-md-6"><label for="exampleSelect" class="">Jawaban Benar</label>
            <select name="select" id="exampleSelect" class="custom-select">
                <option selected hidden disabled>Pilih Jawaban</option>
                @foreach ($jawabans as $jawaban)
                <option>{{ $jawaban }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="position-relative form-group col-md-6"><label for="exampleSelect" class="">Jenis Jawaban</label>
            <select name="jenis-jawaban" class="custom-select">
                <option selected hidden disabled>Pilih Jenis Jawaban</option>
                <option>Teks</option>
                <option>Gambar</option>
                <option>Audio</option>
            </select>
        </div>
    </div>
</div>
</div>
<div class="row">
    @foreach ($jawabans as $jawaban)
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5>Jawaban {{ $jawaban }}</h5>
                <div class="form-group mt-3 inputTeks d-none inputJawaban">
                    <label>Teks Jawaban</label>
                    <input name="email" placeholder="" type="email" class="form-control">
                </div>
                <div class="mt-3 inputGambar d-none inputJawaban">
                    <label>File Gambar</label>
                    <input name="file" type="file" class="form-control-file">
                    <small class="form-text text-muted">Format jpg ukuran 12 x 12</small>
                </div>
                <div class="mt-3 inputAudio d-none inputJawaban">
                    <label>File Audio</label>
                    <input name="file" type="file" class="form-control-file">
                    <small class="form-text text-muted">Format jpg ukuran 12 x 12</small>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @section('js')
    <script>
        $('select[name="jenis-jawaban"]').change(function() {
            $('#cover-spin').show();
            $('.inputJawaban').addClass('d-none');
            $('.input' + $(this).val()).removeClass('d-none');
            $('#cover-spin').hide();
        });
    </script>
    @endsection