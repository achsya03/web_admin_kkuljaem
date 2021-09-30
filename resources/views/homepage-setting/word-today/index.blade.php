@section('title', 'Pengaturan Kata Hari Ini')
@section('title-description', 'Pengaturan homepage aplikasi')
@section('title-icon', 'pe-7s-home')

@section('content')
<div class="row" id="banner-content">
    <div class="col-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div id='word-calendar'></div>
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
        "url": api + "admin/word",
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
                    url: '{{ route("homepage-setting-word-today-detail") }}?date=' + row.jadwal,
                });
            });
            var calendarEl = document.getElementById('word-calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                themeSystem: 'bootstrap',
                events: data,
                dateClick: function(info) {
                    window.location.href = '{{ route("homepage-setting-word-today-create") }}?date=' + info.dateStr;
                },
                eventClick: function(info) {
                    window.location.href = info.event.url;
                }
            });
            calendar.render();
            $('#cover-spin').hide();
        }
    });
</script>
@endsection
@extends('layouts.layout')