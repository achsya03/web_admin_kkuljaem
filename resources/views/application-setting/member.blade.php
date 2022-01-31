@section('title', 'Membership')
@section('title-description', 'Manajemen Membership')
@section('title-icon', 'pe-7s-bookmarks')
@section('content')
<div>
    <div class="form-row cardss">
    </div>
</div>
<div class="toast" role="alert" aria-live="polite" aria-atomic="true" data-delay="100000">
    <div role="alert" aria-live="assertive" aria-atomic="true">...</div>
</div>
@endsection
@section('modal')
@endsection

@section('js')
<script>
    html1 = '';
    html1 += `<div class="col-md-4"><div class="main-card mb-3 card"><div class="card-body"><h5><strong>Update Member</strong></h5><form id="change-pass-form"><div class="position-relative form-group"><label class="">Email</label><input name="email" placeholder="" class="form-control"></div><div class="position-relative form-group"><label for="exampleEmail" class="">Tanggal Akhir Sub</label><input name="tgl_akhir" placeholder="" type="date" class="form-control"></div><div class="position-relative form-group"><button type="submit" class="btn-icon btn-focus btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">Update Member</button></div></form></div></div></div>`;
    document.querySelector('.cardss').innerHTML = html1;

    //CREATE
    $('#change-pass-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            method: 'get',
            url: api + 'force/subs?',
            data: $('form').serialize(),
            dataType: 'json',
            headers: {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            },
            success: function(response) {
                if (response.message !== 'Success') {
                    notif('error', 'Mohon semua form diisi !');

                } else if (response.message == 'Success') {
                    notif('success', 'Berhasil mengganti member Mohon tunggu');
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);

                }
            }
        });
    });
</script>
@endsection
@extends('layouts.layout')