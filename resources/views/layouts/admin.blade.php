<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#EEF3F6]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Panel Instansi' }} - INFRA-DAYA Kota Bandung</title>

    <!-- Favicon Resmi INFRA-DAYA -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo-icon.png') }}">

    <!-- Google Fonts Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Leaflet CSS (untuk peta geospasial) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="min-h-full flex flex-col font-sans antialiased text-slate-800" x-data="{ mobileNavOpen: false }">
    @php
        $role = auth()->user()->role ?? 'admin';
    @endphp

    <!-- Main Navigation Bar (Command Deck Style, Linear Layout Format) -->
    <header class="sticky top-0 z-40 bg-[#070B14]/95 backdrop-blur-md border-b border-white/10 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between gap-4">
                <!-- Brand Logo (White Badge for crisp high-contrast presentation) -->
                <a href="{{ url('/') }}" class="flex items-center gap-3 group shrink-0">
                    <div class="bg-white px-2.5 py-1.5 rounded-xl shadow-xs inline-flex items-center transition-transform group-hover:scale-102">
                        <x-application-logo variant="full" class="h-8 sm:h-9 w-auto max-w-[175px] object-contain" />
                    </div>
                    <span class="sr-only">INFRA-DAYA Kota Bandung</span>
                </a>

                <!-- Desktop Nav Items (Segmented Capsule Bar) -->
                <nav class="hidden lg:flex items-center p-1 rounded-xl bg-white/[0.04] border border-white/10 font-semibold text-xs tracking-wide">
                    <a href="{{ url('/') }}" class="px-3.5 py-2 rounded-lg transition-all {{ request()->is('/') ? 'text-white bg-white/10 font-bold shadow-xs' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Beranda
                    </a>

                    <a href="{{ route('dashboard') }}" class="px-3.5 py-2 rounded-lg transition-all {{ request()->routeIs('dashboard', 'pimpinan.dashboard') ? 'text-white bg-white/10 font-bold shadow-xs' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Dashboard Utama
                    </a>

                    @if ($role === 'admin')
                        <!-- Operasional Admin -->
                        <a href="{{ route('admin.verifikasi.index', [], false) }}" class="px-3.5 py-2 rounded-lg transition-all {{ request()->routeIs('admin.verifikasi.*') ? 'text-white bg-white/10 font-bold shadow-xs' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                            Verifikasi Laporan
                        </a>
                        <a href="{{ route('admin.disposisi.index', [], false) }}" class="px-3.5 py-2 rounded-lg transition-all {{ request()->routeIs('admin.disposisi.*') ? 'text-white bg-white/10 font-bold shadow-xs' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                            Disposisi Petugas
                        </a>
                        <a href="{{ route('admin.rekap.index', [], false) }}" class="px-3.5 py-2 rounded-lg transition-all {{ request()->routeIs('admin.rekap.*') ? 'text-white bg-white/10 font-bold shadow-xs' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                            Rekap Data
                        </a>

                        <!-- Dropdown Master Data -->
                        <div class="relative" x-data="{ openMaster: false }" @click.outside="openMaster = false">
                            <button @click="openMaster = !openMaster" class="flex items-center gap-1.5 px-3.5 py-2 rounded-lg transition-all {{ request()->routeIs('admin.kecamatan.*', 'admin.kelurahan.*', 'admin.users.*', 'admin.kategori.*') ? 'text-white bg-white/10 font-bold shadow-xs' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                                <span>Master Data</span>
                                <svg class="h-3.5 w-3.5 text-slate-400 transition-transform" :class="openMaster ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div x-show="openMaster" x-transition style="display: none;" class="absolute left-0 mt-2 w-52 rounded-2xl bg-[#0F172A] border border-white/10 p-1.5 shadow-2xl text-white z-50">
                                <a href="{{ route('admin.kecamatan.index', [], false) }}" class="block rounded-lg px-3 py-2 text-xs font-medium {{ request()->routeIs('admin.kecamatan.*', 'admin.kelurahan.*') ? 'text-blue-400 bg-white/10 font-bold' : 'text-slate-300 hover:bg-white/10' }}">
                                    Wilayah (Kec/Kel)
                                </a>
                                <a href="{{ route('admin.users.index', [], false) }}" class="block rounded-lg px-3 py-2 text-xs font-medium {{ request()->routeIs('admin.users.*') ? 'text-blue-400 bg-white/10 font-bold' : 'text-slate-300 hover:bg-white/10' }}">
                                    Manajemen Pengguna
                                </a>
                                <a href="{{ route('admin.kategori.index', [], false) }}" class="block rounded-lg px-3 py-2 text-xs font-medium {{ request()->routeIs('admin.kategori.*') ? 'text-blue-400 bg-white/10 font-bold' : 'text-slate-300 hover:bg-white/10' }}">
                                    Kategori Kerusakan
                                </a>
                            </div>
                        </div>

                    @elseif ($role === 'pimpinan')
                        <a href="{{ route('pimpinan.sla.index', [], false) }}" class="px-3.5 py-2 rounded-lg transition-all {{ request()->routeIs('pimpinan.sla.*') ? 'text-white bg-white/10 font-bold shadow-xs' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                            Kinerja &amp; SLA
                        </a>
                        <a href="{{ route('pimpinan.peta.index', [], false) }}" class="px-3.5 py-2 rounded-lg transition-all {{ request()->routeIs('pimpinan.peta.*') ? 'text-white bg-white/10 font-bold shadow-xs' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                            Heatmap &amp; Peta
                        </a>
                        <a href="{{ route('pimpinan.rekap.index', [], false) }}" class="px-3.5 py-2 rounded-lg transition-all {{ request()->routeIs('pimpinan.rekap.*') ? 'text-white bg-white/10 font-bold shadow-xs' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                            Unduh Laporan
                        </a>

                    @elseif ($role === 'petugas')
                        <a href="{{ route('petugas.tugas.index', [], false) }}" class="px-3.5 py-2 rounded-lg transition-all {{ request()->routeIs('petugas.tugas.*') ? 'text-white bg-white/10 font-bold shadow-xs' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                            Daftar Tugas Saya
                        </a>
                    @endif

                    <a href="{{ route('peta.publik', [], false) }}" class="px-3.5 py-2 rounded-lg transition-all {{ request()->routeIs('peta.publik*') ? 'text-white bg-white/10 font-bold shadow-xs' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Peta Publik
                    </a>
                </nav>

                <!-- Right Action Buttons (User Capsule + Role Action Button) -->
                <div class="hidden sm:flex items-center gap-3">
                    <!-- User Menu Dropdown -->
                    <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                        <button @click="open = !open" class="flex items-center gap-2.5 rounded-xl p-1.5 hover:bg-white/10 transition-colors text-white">
                            <div class="h-8 w-8 rounded-xl bg-blue-600 text-white flex items-center justify-center font-bold text-xs shadow">
                                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                            </div>
                            <div class="text-left hidden md:block">
                                <div class="text-xs font-semibold text-slate-200 leading-tight max-w-[130px] truncate">{{ auth()->user()->name ?? 'Pengguna' }}</div>
                                <div class="flex items-center gap-1.5 mt-0.5">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-amber-400">
                                        {{ auth()->user()->role ?? 'Admin' }}
                                    </span>
                                </div>
                            </div>
                            <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="open" x-transition style="display: none;" class="absolute right-0 mt-2 w-56 rounded-2xl bg-[#0F172A] border border-white/10 p-2 shadow-2xl text-white z-50">
                            <div class="px-3 py-2 border-b border-white/10">
                                <p class="text-xs font-semibold text-white truncate">{{ auth()->user()->name ?? 'Pengguna' }}</p>
                                <p class="text-[11px] text-slate-400 truncate">{{ auth()->user()->email ?? '' }}</p>
                                <span class="inline-block mt-1 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-amber-500/20 text-amber-300 border border-amber-500/30">
                                    Role: {{ strtoupper(auth()->user()->role ?? 'Admin') }}
                                </span>
                            </div>
                            <a href="{{ url('/') }}" class="block rounded-lg px-3 py-2 text-xs font-medium text-slate-300 hover:bg-white/10">
                                Beranda Publik
                            </a>
                            <a href="{{ route('profile.edit') }}" class="block rounded-lg px-3 py-2 text-xs font-medium text-slate-300 hover:bg-white/10">
                                Profil Saya
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left rounded-lg px-3 py-2 text-xs font-medium text-rose-400 hover:bg-rose-500/10">
                                    Keluar Sistem
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Role-specific High-contrast Pill Button (matching Beranda style) -->
                    @if ($role === 'admin')
                        <a href="{{ route('admin.disposisi.create', [], false) }}" class="inline-flex items-center gap-2 rounded-xl bg-white text-slate-950 px-4 py-2 text-xs font-bold shadow-sm transition-all hover:bg-slate-100 hover:shadow-md focus:outline-none">
                            <svg class="h-3.5 w-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                            <span>Terbitkan SPT</span>
                        </a>
                    @elseif ($role === 'petugas')
                        <a href="{{ route('petugas.tugas.index', [], false) }}" class="inline-flex items-center gap-2 rounded-xl bg-white text-slate-950 px-4 py-2 text-xs font-bold shadow-sm transition-all hover:bg-slate-100 hover:shadow-md focus:outline-none">
                            <svg class="h-3.5 w-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                            <span>Tugas Saya</span>
                        </a>
                    @elseif ($role === 'pimpinan')
                        <a href="{{ route('pimpinan.rekap.index', [], false) }}" class="inline-flex items-center gap-2 rounded-xl bg-white text-slate-950 px-4 py-2 text-xs font-bold shadow-sm transition-all hover:bg-slate-100 hover:shadow-md focus:outline-none">
                            <svg class="h-3.5 w-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            <span>Unduh Laporan</span>
                        </a>
                    @endif
                </div>

                <!-- Mobile Hamburger Button -->
                <button @click="mobileNavOpen = !mobileNavOpen" class="lg:hidden p-2 rounded-xl text-slate-300 hover:bg-white/10">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileNavOpen" x-transition class="lg:hidden border-t border-white/10 bg-[#070B14] px-4 pt-3 pb-6 space-y-2" style="display: none;">
            <div class="px-3 py-2 border-b border-white/10 mb-2">
                <p class="text-xs font-semibold text-white truncate">{{ auth()->user()->name ?? 'Pengguna' }}</p>
                <div class="flex items-center gap-1.5 mt-0.5">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-amber-400">
                        {{ auth()->user()->role ?? 'Admin' }}
                    </span>
                </div>
            </div>

            <a href="{{ url('/') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-200 hover:bg-white/10">Beranda</a>
            <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-200 hover:bg-white/10">Dashboard Utama</a>

            @if ($role === 'admin')
                <a href="{{ route('admin.verifikasi.index', [], false) }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-200 hover:bg-white/10">Verifikasi Laporan</a>
                <a href="{{ route('admin.disposisi.index', [], false) }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-200 hover:bg-white/10">Disposisi Petugas</a>
                <a href="{{ route('admin.rekap.index', [], false) }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-200 hover:bg-white/10">Rekap Data</a>
                <div class="pt-2 border-t border-white/10 text-[10px] font-bold uppercase text-slate-400 px-3">Master Data</div>
                <a href="{{ route('admin.kecamatan.index', [], false) }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-200 hover:bg-white/10">Wilayah (Kec/Kel)</a>
                <a href="{{ route('admin.users.index', [], false) }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-200 hover:bg-white/10">Manajemen Pengguna</a>
                <a href="{{ route('admin.kategori.index', [], false) }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-200 hover:bg-white/10">Kategori Kerusakan</a>
            @elseif ($role === 'pimpinan')
                <a href="{{ route('pimpinan.sla.index', [], false) }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-200 hover:bg-white/10">Kinerja &amp; SLA</a>
                <a href="{{ route('pimpinan.peta.index', [], false) }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-200 hover:bg-white/10">Heatmap &amp; Peta</a>
                <a href="{{ route('pimpinan.rekap.index', [], false) }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-200 hover:bg-white/10">Unduh Laporan</a>
            @elseif ($role === 'petugas')
                <a href="{{ route('petugas.tugas.index', [], false) }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-200 hover:bg-white/10">Daftar Tugas Saya</a>
            @endif

            <a href="{{ route('peta.publik', [], false) }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-200 hover:bg-white/10">Peta Publik</a>

            <div class="pt-2 border-t border-white/10 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-200 hover:bg-white/10">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-3 py-2 rounded-lg text-sm font-semibold text-rose-400 hover:bg-rose-500/10">Keluar Sistem</button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content Area (Linear Format, Matching Beranda Container) -->
    <main class="flex-1">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @if(isset($header) && $header)
                <div class="mb-6 pb-4 border-b border-slate-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                    <div>
                        <h1 class="text-2xl font-bold text-slate-900 tracking-tight">{{ $header }}</h1>
                        <p class="text-xs text-slate-500 mt-1">Sistem Tanggap Kerusakan Infrastruktur Publik Kota Bandung</p>
                    </div>
                </div>
            @endif
            <x-flash />
            {{ $slot }}
        </div>
    </main>

    <!-- Civic Footer (Identical with Beranda) -->
    <footer class="mt-auto relative bg-[#070B14] text-white pt-14 pb-8 border-t border-white/10 overflow-hidden">
        <!-- Subtle Ambient Lighting -->
        <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-blue-600/10 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-12 lg:grid-cols-12 gap-8 lg:gap-10 pb-10 border-b border-white/10">
                <!-- Col 1: Brand & Instansi -->
                <div class="md:col-span-12 lg:col-span-6 space-y-4">
                    <div class="inline-flex items-center bg-white px-3 py-1.5 rounded-xl shadow-xs border border-white/10">
                        <x-application-logo variant="full" class="h-8 w-auto max-w-[170px]" />
                    </div>
                    <div class="text-xs font-semibold text-slate-300 tracking-wide">
                        Pemerintah Kota Bandung &bull; DSDABM
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed max-w-lg">
                        Sistem pelaporan dan respons cepat perbaikan infrastruktur publik (jalan, drainase, penerangan, dan jembatan) untuk mewujudkan Bandung yang nyaman dan tanggap (SDG 9).
                    </p>
                    <!-- Badges Side by Side -->
                    <div class="flex flex-wrap sm:flex-nowrap items-center gap-2 pt-1">
                        <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-lg bg-white/[0.04] border border-white/10 text-[11px] font-mono text-slate-300 whitespace-nowrap">
                            <span class="relative flex h-2 w-2 shrink-0">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                            </span>
                            <span>Sistem Siaga 24/7 &bull; URC DSDABM</span>
                        </div>
                        <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-lg bg-white/[0.04] border border-white/10 text-[11px] font-mono text-slate-300 whitespace-nowrap">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500 shrink-0"></span>
                            <span>Mendukung SDG 9: Industri, Inovasi, &amp; Infrastruktur</span>
                        </div>
                    </div>
                </div>

                <!-- Col 2: Layanan Publik -->
                <div class="md:col-span-6 lg:col-span-3">
                    <h4 class="text-xs font-bold text-slate-200 uppercase tracking-widest font-mono mb-4 flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                        Layanan Publik
                    </h4>
                    <ul class="space-y-2.5 text-xs">
                        <li>
                            <a href="{{ route('warga.laporan.create', [], false) }}" class="group flex items-center gap-2 text-slate-400 hover:text-white transition-colors">
                                <svg class="w-3.5 h-3.5 text-slate-500 group-hover:text-blue-400 group-hover:translate-x-0.5 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                <span>Pengajuan Laporan Baru</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tracking.publik', [], false) }}" class="group flex items-center gap-2 text-slate-400 hover:text-white transition-colors">
                                <svg class="w-3.5 h-3.5 text-slate-500 group-hover:text-blue-400 group-hover:translate-x-0.5 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                <span>Pelacakan Status Nomor Tiket</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('peta.publik', [], false) }}" class="group flex items-center gap-2 text-slate-400 hover:text-white transition-colors">
                                <svg class="w-3.5 h-3.5 text-slate-500 group-hover:text-blue-400 group-hover:translate-x-0.5 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                <span>Peta Sebaran Masalah Terbuka</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" class="group flex items-center gap-2 text-slate-400 hover:text-white transition-colors">
                                <svg class="w-3.5 h-3.5 text-slate-500 group-hover:text-blue-400 group-hover:translate-x-0.5 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                <span>Portal Petugas &amp; Admin DSDABM</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Col 3: Kontak Instansi -->
                <div class="md:col-span-6 lg:col-span-3">
                    <h4 class="text-xs font-bold text-slate-200 uppercase tracking-widest font-mono mb-4 flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                        Kontak Instansi
                    </h4>
                    <div class="space-y-3 text-xs text-slate-400">
                        <div class="text-white font-semibold leading-snug">
                            Dinas Sumber Daya Air dan Bina Marga (DSDABM)
                        </div>
                        <div class="flex items-start gap-2.5">
                            <svg class="w-4 h-4 text-slate-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>Jl. Cianjur No. 34, Kota Bandung, Jawa Barat 40271</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-slate-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <a href="mailto:dsdabm@bandung.go.id" class="hover:text-blue-400 transition-colors">dsdabm@bandung.go.id</a>
                        </div>
                        <div class="flex items-center gap-2.5 pt-1">
                            <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span class="font-mono text-slate-300">Call Center Darurat: <strong class="text-amber-400 font-bold">112</strong> / (022) 7278835</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Subfooter -->
            <div class="mt-8 text-center text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} INFRA-DAYA Kota Bandung. Seluruh hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    @stack('scripts')
</body>
</html>
