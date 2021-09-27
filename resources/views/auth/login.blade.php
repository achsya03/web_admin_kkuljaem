<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Masuk - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Build whatever layout you need with our Architect framework.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/assets/images/logo.svg" rel="shortcut icon" type="image/x-icon">
    <style>
        .disablediv {
            pointer-events: none;
            opacity: 0.7;
        }

        body {
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-sunny-morning bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                        <div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="h5 modal-title text-center">
                                        <h1 class="mt-1 mb-5">
                                            <img src="{{ url('css/assets/images/logo.svg') }}" alt="App Logo" width="60%">
                                        </h1>
                                    </div>
                                    <form id="login-form" class="">
                                        <div class=" form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="email" placeholder="Surel" type="email" class="form-control">
                                                    <div class="invalid-feedback" for="email"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="password" placeholder="Kata Sandi" type="password" class="form-control">
                                                    <div class="invalid-feedback" for="password"></div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="device_id">
                                            <input type="hidden" name="lokasi">
                                        </div>
                                        <div class="divider"></div>
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-primary btn-lg">Masuk</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="text-center text-white opacity-8 mt-3">Copyright © {{ config('app.name') }} 2021</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="toast" role="alert" aria-live="polite" aria-atomic="true" data-delay="10000">
        <div role="alert" aria-live="assertive" aria-atomic="true">...</div>
    </div>
    <script type="text/javascript" src="/js/app.js"></script>
    <script>
        var api = "{{ env('APP_API_URL', 'api/') }}";
        navigator.geolocation.getCurrentPosition(function(position) {
            $('input[name="device_id"]').val(navigator.userAgent);
            $('input[name="lokasi"]').val(position.coords.latitude + ', ' + position.coords.longitude)
        }, function() {
            notif('error', 'Gagal Mengambil Lokasi');
        });

        function notif(type, message) {
            $.toast({
                heading: ' ',
                text: message,
                position: 'top-right',
                icon: type,
                stack: false
            })
        }

        $("#login-form").submit(function(event) {
            $('#login-form').addClass('disablediv');
            $('input').removeClass('is-invalid');
            $.post(api + 'auth/login', $(this).serialize(), function(response) {
                $('#login-form').removeClass('disablediv');
                if (response.message == 'Failed') {
                    notif('error', 'Terdapat Kesalahan');
                    if (typeof response.info === 'object') {
                        $.each(response.info, function(index, row) {
                            $('input[name="' + index + '"]').addClass('is-invalid');
                            $('.invalid-feedback[for="' + index + '"]').html(row);
                        });
                    } else {
                        notif('error', response.info);
                    }
                } else {
                    notif('success', 'Sukses Masuk, Mohon tunggu');
                    window.localStorage.setItem('token', response.data['bearer_token']);
                    window.location.href = '{{ route("dashboard") }}';
                }
            });
            event.preventDefault();
        });
    </script>
    @yield('js')
</body>

</html>