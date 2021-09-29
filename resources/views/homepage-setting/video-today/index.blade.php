@section('title', 'Pengaturan Video Hari Ini')
@section('title-description', 'Pengaturan homepage aplikasi')
@section('title-icon', 'pe-7s-home')

@section('content')
<div class="row" id="banner-content">
    <div class="col-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div id='video-calendar'></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $('#cover-spin').show();
    var data = [];
    $.ajax({
        "url": api + "admin/videos",
        "method": "get",
        "headers": {
            "Accept": "application/json",
            "Authorization": 'bearer ' + token,
        }
    }).done(function(response) {
        if (response.message == 'Success') {
            $.each(response.data, function(index, row) {
                data.push({
                    title: row.hangeul,
                    start: row.jadwal,
                    id: "0001"
                });
            });
            var calendarEl = document.getElementById('video-calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap',
                events: data,
                dateClick: function(info) {
                    window.location.href = '{{ route("homepage-setting-video-today-create") }}?date=' + info.dateStr;
                },
                eventClick: function(info) {
                    $.ajax({
                        "url": api + "admin/videos/detail?token=" + info.event.id,
                        "method": "get",
                        "headers": {
                            "Accept": "application/json",
                            "Authorization": 'bearer ' + token,
                        }
                    }).done(function(response) {
                        if (response.message == 'Success') {
                            $("#detail-modal").modal('show');
                            $('video source').attr('src', response.data.url_video);
                            $('#detail-modal').on('hidden.bs.modal', function() {
                                callPlayer('yt-player', 'stopVideo');
                            });
                        }
                    });

                }
            });
            calendar.render();
            $('#cover-spin').hide();
        }
    });
</script>
@endsection
@section('modal')
<div class="modal fade" id="detail-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5>12/12/2021</h5>
                <video width="100%" controls>
                    <source src="https://drive.google.com/uc?export=preview&id=12kB1Y3UxFl5BeKr1FlpXqXl-6avGoNAf" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <a href="{{ route('homepage-setting-video-today-edit') }}" class="btn btn-success">Sunting</a>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.layout')