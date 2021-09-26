<li class="app-sidebar__heading">Menu</li>
<li>
    <a href="{{ route('dashboard') }}">
        <i class="metismenu-icon pe-7s-bookmarks"></i>
        Dashboard
    </a>
</li>
<li>
    <a href="{{route('menu_kelas')}}">
        <i class="metismenu-icon pe-7s-display2"></i>
        Kelas
    </a>
</li>
<li>
    <a href="{{ route('qna') }}">
        <i class="metismenu-icon pe-7s-chat"></i>
        QnA
    </a>
</li>
<li>
    <a href="{{ route('forum') }}">
        <i class="metismenu-icon pe-7s-news-paper"></i>
        Forum
    </a>
</li>
<li>
    <a href="#">
        <i class="metismenu-icon pe-7s-users"></i>
        Akun Pengguna
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        <li>
            <a href="{{ route('siswa') }}">
                <i class="metismenu-icon"></i>
                Siswa
            </a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="{{ route('mentor') }}">
                <i class="metismenu-icon"></i>
                Mentor & Admin
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="#">
        <i class="metismenu-icon pe-7s-note2"></i>
        Laporan Pengguna
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        <li>
            <a href="{{ route('laporankonten') }}">
                <i class="metismenu-icon"></i>
                Laporan Konten
            </a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="{{ route('katakasar') }}">
                <i class="metismenu-icon"></i>
                Kata Kasar
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="{{ route('forum') }}">
        <i class="metismenu-icon pe-7s-wallet"></i>
        Keuangan
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        <li>
            <a href="{{ route('pembayaran') }}">
                <i class="metismenu-icon"></i>
                Pembayaran
            </a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="{{ route('penawaran') }}">
                <i class="metismenu-icon"></i>
                Penawaran
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="#">
        <i class="metismenu-icon pe-7s-home"></i>
        Pengaturan Homepage
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        <li>
            <a href="{{ route('homepage-setting-marketing-banner') }}">
                <i class="metismenu-icon"></i>
                Marketing Banner
            </a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="{{ route('homepage-setting-word-today') }}">
                <i class="metismenu-icon"></i>
                Kata Hari Ini
            </a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="{{ route('homepage-setting-video-today') }}">
                <i class="metismenu-icon"></i>
                Video Hari Ini
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="#">
        <i class="metismenu-icon pe-7s-config"></i>
        Pengaturan Aplikasi
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>
        <li>
            <a href="{{ route('application-setting-reference-id') }}">
                <i class="metismenu-icon"></i>
                Reference ID
            </a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="{{ route('application-setting-general') }}">
                <i class="metismenu-icon"></i>
                Pengaturan Umum
            </a>
        </li>
    </ul>
    <ul>
        <li>
            <a href="{{ route('application-setting-about') }}">
                <i class="metismenu-icon"></i>
                Pengaturan Tentang
            </a>
        </li>
    </ul>
</li>