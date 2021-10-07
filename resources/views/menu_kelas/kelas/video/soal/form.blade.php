@php($jawabans = ['A', 'B', 'C', 'D'])
<div class="card-body">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="exampleEmail" class="">Pertanyaan</label>
                <textarea rows="4" cols="50" name="pertanyaan_teks" id="pertanyaan_teks" placeholder=""  class="form-control"></textarea>
                <small class="form-text text-muted">Jumlah Kata 0 (Max 500 Karakter)</small>
            </div>
        </div>
    </div>
    <div>
        <label class="mt-2">File Gambar</label>
        <input name="nomor" id="nomor" type="text" class="form-control" hidden>
        <input name="gambar_pertanyaan" id="gambar_pertanyaan" type="file" class="form-control-file">
        <div class="img" id="img"></div>

        <small class="form-text text-muted">Format jpg ukuran 12 x 12</small>
    </div>
    <div>
        <label class="mt-3">File Audio</label>
        <input name="url_pertanyaan"  id="url_pertanyaan" type="file" class="form-control-file">
        <div class="audio" id="audio"></div>

        
        <small class="form-text text-muted">Format jpg ukuran 12 x 12</small>
    </div>
    <div class="row mt-3">
        <div class="position-relative form-group col-md-6"><label for="exampleSelect" class="">Jawaban Benar</label>
            <select name="jawaban" id="jawaban" class="custom-select">
                <option selected hidden disabled>Pilih Jawaban</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>
    </div>
    <div class="row mt-2">
        <div class="position-relative form-group col-md-6"><label for="exampleSelect" class="">Jenis Jawaban</label>
            <select name="jenis_jawaban" id="jenis_jawaban" class="custom-select">
                <option selected hidden disabled>Pilih Jenis Jawaban</option>
                <option value="Teks">Teks</option>
                <option value="Gambar">Gambar</option>
                <option value="Audio">Audio</option>
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
                    <input name="jawaban_teks[]" placeholder=""  class="form-control" id="jawaban_teks_{{$jawaban}}">
                    
                </div>
                <div class="mt-3 inputGambar d-none inputJawaban">
                    <label>File Gambar</label>
                    <input name="gambar_opsi[]" type="file" class="form-control-file">

                    <small class="form-text text-muted">Format jpg ukuran 12 x 12</small>
                </div>
                <div class="mt-3 inputAudio d-none inputJawaban">
                    <label>File Audio</label>
                    <input name="url_opsi[]" type="file" class="form-control-file">

                    <small class="form-text text-muted">Format jpg ukuran 12 x 12</small>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @section('form_js')
    <script>
        $('select[name="jenis_jawaban"]').change(function() {
            $('#cover-spin').show();
            $('.inputJawaban').addClass('d-none');
            $('.input' + $(this).val()).removeClass('d-none');
            $('#cover-spin').hide();
        });
    </script>
    @endsection