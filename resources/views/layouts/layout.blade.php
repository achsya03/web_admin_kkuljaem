<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title') - {{ config('app.name') }}</title>
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
        .table-fix {
            table-layout: fixed;
        }

        .page-item.active .page-link,
        .pagination .active.page-number .page-link {
            background-color: #6F4C20;
            border-color: #6F4C20;
        }

        #cover-spin {
            position: fixed;
            width: 100%;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.7);
            z-index: 9999;
            display: none;
        }

        @-webkit-keyframes spin {
            from {
                -webkit-transform: rotate(0deg);
            }

            to {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        #cover-spin::after {
            content: '';
            display: block;
            position: absolute;
            left: 48%;
            top: 40%;
            width: 40px;
            height: 40px;
            border-style: solid;
            border-color: black;
            border-top-color: transparent;
            border-width: 4px;
            border-radius: 50%;
            -webkit-animation: spin .8s linear infinite;
            animation: spin .8s linear infinite;
        }
    </style>
</head>

<body>
    <div id="cover-spin"></div>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle foto-profile" src="{{ url('css/assets/images/avatars/1.jpg') }}" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ route('profile-my') }}" type="button" tabindex="0" class="dropdown-item">Lihat Profil Saya</a>
                                            <a href="{{ route('profile-edit') }}" type="button" tabindex="0" class="dropdown-item">Sunting Profil</a>
                                            <button type="button" tabindex="0" class="dropdown-item" onclick="logout()">Keluar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading" id="widget-heading"> </div>
                                    <div class="widget-subheading" id="widget-subheading"> </div>
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            @include('layouts.sidebar')
                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="@yield('title-icon') text-warning">
                                    </i>
                                </div>
                                <div class="page-title-text">
                                    <div class="title">
                                        @yield('title')
                                    </div>
                                    <div class="page-title-subheading">@yield('title-description')</div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                <button onClick="back_url()" class="btn btn-focus btn-kembali mm-active">
                                    <i class="fa fa-angle-left"></i> Kembali
                                </button>
                                @yield('top-button')
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
                <div class="app-wrapper-footer mt-3">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-left">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <p class="nav-link">
                                            Copyright 2021 by Kkuljaem Korean
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('modal')
    <script type="text/javascript" src="/js/app.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        var api = "{{ env('APP_API_URL', 'api/') }}";
        var token = window.localStorage.getItem('token');
        var urlParams = new URLSearchParams(window.location.search);
        var formatter = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
        });

        $('table').attr('width', '100%');
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        $('.vertical-nav-menu').find('a').each(function() {
            url = window.location.href.replace("https://", "http://");
            if (url.substr(0, $(this).attr('href').length) == $(this).attr('href')) {
                active_sidebar = $('a[href="' + url.substr(0, $(this).attr('href').length) + '"]').addClass('mm-active');
                active_sidebar.parent().parent().parent().addClass("mm-active");
            }
        });
        if (window.location.pathname.split('/').length == 2 || [
                'akun_pengguna',
                'laporan_pengguna',
                'keuangan',
                'homepage-setting',
                'application-setting'
            ].includes(window.location.pathname.split('/')[1])) {
            $('.btn-kembali').addClass('d-none');
        };

        if (window.localStorage.getItem("backurl_{{ $_SERVER['REQUEST_URI'] }}") == null) {
            window.localStorage.setItem("backurl_{{ $_SERVER['REQUEST_URI'] }}", '{{ url()->previous() }}');
        }

        $.ajax({
            "url": api + "admin/profile",
            "method": "get",
            "headers": {
                "Accept": "application/json",
                "Authorization": 'bearer ' + token,
            }
        }).done(function(response) {
            if (response.message == "Success") {
                $('#widget-heading').html(response.data.user.nama);
                $('#widget-subheading').html(response.data.user.jenis_pengguna);
                $('.foto-profile').attr('src', response.data.user.foto);
            }
        });

        if (window.localStorage.jenis_pengguna != 'Admin') {
            $('.for-admin').hide();
        }

        function back_url() {
            window.location.href = window.localStorage.getItem("backurl_{{ $_SERVER['REQUEST_URI'] }}");
        }

        function logout() {
            $.ajax({
                "url": api + 'auth/logout',
                "method": "post",
                "headers": {
                    "Accept": "application/json",
                    "Authorization": 'bearer ' + window.localStorage.getItem('token'),
                },
                success: function(response) {
                    window.localStorage.clear();
                    window.location.href = "{{ url('') }}";
                }
            });
        }

        function hapus(url, back_url = "") {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Langkah ini tidak dapat diurungkan, setelah menekan \"Ya\" maka data akan dihapus secara permanen",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batalkan'
            }).then((result) => {
                $('#cover-spin').show();
                if (result.isConfirmed) {
                    $.ajax({
                        "url": url,
                        "method": "delete",
                        "headers": {
                            "Accept": "application/json",
                            "Authorization": 'bearer ' + window.localStorage.getItem('token'),
                        },
                        success: function(response) {
                            if (response.message == 'Failed') {
                                Swal.fire(
                                    'Gagal!',
                                    response.error,
                                    'error'
                                )
                            } else {
                                Swal.fire(
                                    'Sukses!',
                                    'Data berhasil dihapus!',
                                    'success'
                                )
                                if (back_url) {
                                    window.location.href = back_url;
                                } else {
                                    location.reload();
                                }
                            }
                        },
                        error: function() {
                            Swal.fire(
                                'Gagal!',
                                'Data tidak berhasil dihapus!',
                                'error'
                            )
                        }
                    });
                }
                $('#cover-spin').hide();
            });
        }

        CKEDITOR.editorConfig = function(config) {
            config.toolbarGroup = [{
                    name: 'style',
                    groups: ['styles']
                },
                {
                    name: 'colors',
                    groups: ['colors']
                },
                {
                    name: 'clipboard',
                    groups: ['find', 'selection', 'spellchecker', 'editing']
                },
                {
                    name: 'links',
                    groups: ['links']
                },
                {
                    name: 'insert',
                    groups: ['insert']
                },
                {
                    name: 'forms',
                    groups: ['forms']
                },
                {
                    name: 'tools',
                    groups: ['tools']
                },
                {
                    name: 'document',
                    groups: ['mode', 'document', 'doctools']
                },
                {
                    name: 'others',
                    groups: ['others']
                },
                {
                    name: 'basicstyles',
                    groups: ['basicstyles', 'cleanup']
                },
                {
                    name: 'paragraph',
                    groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']
                }
            ];

            config.removeButtons = 'Subscript,Superscript,Source,About,SpecialChar,Anchor,Scayt';
        }

        function notif(type, message) {
            if (type == 'error') {
                if (typeof message === 'object') {
                    message = 'Silahkan Cek Ulang Form';
                }
            }
            $.toast({
                heading: ' ',
                text: message,
                position: 'top-right',
                icon: type,
                stack: false
            });
        }
    </script>
    @yield('js')
</body>

</html>