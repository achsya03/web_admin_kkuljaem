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

@section('modal')
<div class="modal fade" id="detail-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5>12/12/2021</h5>
                <div class="video">

                </div>
                <a href="#" class="btn btn-edit btn-success">Sunting</a>
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
                    title: "Sudah terisi",
                    start: row.jadwal,
                    id: row.uuid
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
                    $('#cover-spin').show();
                    $.ajax({
                        "url": api + "admin/videos/detail?token=" + info.event.id,
                        "method": "get",
                        "headers": {
                            "Accept": "application/json",
                            "Authorization": 'bearer ' + token,
                        }
                    }).done(function(response) {
                        if (response.message == 'Success') {
                            $('#cover-spin').hide();
                            $("#detail-modal").modal('show');
                            $('.video').html('<iframe width="100%" height="300px" src="https://www.youtube.com/embed/' + response.data.url_video.split("=")[1].split("&")[0] + '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
                            $('.btn-edit').attr('href', "{{ route('homepage-setting-video-today-edit') }}?id=" + response.data.uuid);
                            $('.modal-body h5').html(moment(response.data.jadwal).format('DD/M/y'));
                            $('#detail-modal').on('hidden.bs.modal', function() {
                                $('.video').html('');
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

@extends('layouts.layout')