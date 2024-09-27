<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            <img src="{{ asset(setting('logo') ? '/storage/' . setting('logo') : 'dist/img/logo/PUSRI-LOGO.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">K3</div>
    </a>
    <hr class="sidebar-divider my-0">

    <x-nav-link text="Dashboard" icon="tachometer-alt" url="{{ route('admin.dashboard') }}"
        active="{{ request()->routeIs('admin.dashboard') ? ' active' : '' }}" />
    @can('member-list')
        <x-nav-link text="Daftar Petugas" icon="users" url="{{ route('admin.member') }}"
            active="{{ request()->routeIs('admin.member') ? ' active' : '' }}" />
    @endcan


    @if (auth()->user()->hasRole('Admin'))
        <x-nav-link text="Respon Kuesioner" icon="file" url="{{ route('admin.kuesioner-responses.index') }}"
            active="{{ request()->routeIs('admin.kuesioner-response.index') ? ' active' : '' }}" />
        <x-nav-link text="Profile Kontraktor" icon="file" url="{{ route('admin.laporan.index') }}"
            active="{{ request()->routeIs('admin.laporan.index') ? ' active' : '' }}" />
    @endif

    @if (auth()->user()->hasRole('User'))
        <x-nav-link text="Kuesioner" icon="file" url="{{ route('admin.kuesioner.index') }}"
            active="{{ request()->routeIs('admin.kuesioner.index') ? ' active' : '' }}" />
        <x-nav-link text="Download Sertifikat" icon="file"
            url="{{ route('admin.download-sertifikat.index', ['id' => auth()->user()->id]) }}"
            active="{{ request()->routeIs('admin.download-sertifikat.index') ? ' active' : '' }}" />
    @endif
</ul>
