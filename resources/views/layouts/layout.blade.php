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
    </style>
</head>

<body>
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
                                            <img width="42" class="rounded-circle" src="/css/assets/images/avatars/1.jpg" alt="">
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
                                    <div class="widget-heading">
                                        Nanda Mochammad
                                    </div>
                                    <div class="widget-subheading">
                                        Mentor/Admin
                                    </div>
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
                                    @yield('title')
                                    <div class="page-title-subheading">@yield('title-description')</div>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                @isset($_SERVER['PATH_INFO']))
                                @if(count(explode('/', $_SERVER['PATH_INFO'])) > 2)
                                <a href="#"  onClick="javascript:history.go(-1)" class="btn btn-focus mm-active">
                                    <i class="fa fa-angle-left"></i> Kembali
                                </a>
                                @endif
                                @endisset
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
                                            2021 Kkuljaem Korea - Built with <i class="fa fa-fw">  </i> by Namatech
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
    <script>
        var api = "{{ env('APP_API_URL', 'api/') }}";
        var token = window.localStorage.getItem('token');
        var urlParams = new URLSearchParams(window.location.search);
        $('table').attr('width', '100%');
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        $('.vertical-nav-menu').find('a').each(function() {
            url = window.location.href;
            if (url.substr(0, $(this).attr('href').length) == $(this).attr('href')) {
                active_sidebar = $('a[href="' + url.substr(0, $(this).attr('href').length) + '"]').addClass('mm-active');
                active_sidebar.parent().parent().parent().addClass("mm-active");
            }
        });

        function logout() {
            $.ajax({
                "url": api + 'auth/logout',
                "method": "post",
                "headers": {
                    "Accept": "application/json",
                    "Authorization": 'bearer ' + window.localStorage.getItem('token'),
                },
                success: function(response) {
                    window.location.href = "{{ env('APP_URL', './') }}";
                }
            });
        }

        function hapus(url) {
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
                if (result.isConfirmed) {
                    $.ajax({
                        "url": url,
                        "method": "delete",
                        "headers": {
                            "Accept": "application/json",
                            "Authorization": 'bearer ' + window.localStorage.getItem('token'),
                        },
                        success: function(response) {
                            Swal.fire(
                                'Sukses!',
                                'Data berhasil dihapus!',
                                'success'
                            )
                            location.reload(); 
                        },
                        error: function() {
                            Swal.fire(
                                'Gagal!',
                                'Data tidak berhasil dihapus!',
                                'error'
                            )
                            location.reload(); 
                        }
                    });
                }
            })
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

            config.removeButtons = 'Subscript,Superscript,Source,About,SpecialChar,Anchor,Scayt'
        }

        function notif(type, message) {
            $.toast({
                heading: ' ',
                text: message,
                position: 'top-right',
                icon: type,
                stack: false
            })
        }
    </script>
    @yield('js')
</body>

</html>