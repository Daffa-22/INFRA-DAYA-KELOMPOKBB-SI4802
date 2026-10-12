<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#EEF3F6]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Portal Warga' }} - INFRA-DAYA Kota Bandung</title>

    <!-- Google Fonts Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="min-h-full flex flex-col font-sans antialiased text-slate-800" x-data="{ mobileNavOpen: false }">
    <!-- Top Civic Notice Bar -->
    <div class="bg-brand-navy text-slate-300 text-xs py-2 px-4 border-b border-white/10">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="inline-block h-2 w-2 rounded-full bg-brand-amber"></span>
                <span>Pemerintah Kota Bandung &bull; Dinas Sumber Daya Air dan Bina Marga (DSDABM)</span>
            </div>
            <div class="hidden sm:flex items-center gap-4 text-[11px] text-slate-300">
                <span>Dukungan SDG 9: Infrastruktur Berkelanjutan</span>
                <span>Call Center: 112 / (022) 7278835</span>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between">
                <!-- Brand Logo -->
                <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                    <x-application-logo class="h-11 w-11 transition-transform group-hover:scale-105" />
                    <div>
                        <div class="text-xl font-black tracking-tight text-brand-navy flex items-center gap-2">
                            INFRA-DAYA
                            <span class="rounded bg-brand-teal/10 px-2 py-0.5 text-xs font-bold text-brand-teal">Bandung</span>
                        </div>
                        <p class="text-xs text-slate-500 font-medium">Infrastruktur & Daya Tanggap</p>
                    </div>
                </a>

                <!-- Desktop Nav Items -->
                <nav class="hidden md:flex items-center gap-1 font-semibold text-sm">
                    <a href="{{ url('/') }}" class="px-3.5 py-2 rounded-xl transition-colors {{ request()->is('/') ? 'text-brand-navy bg-slate-100 font-bold' : 'text-slate-600 hover:text-brand-navy hover:bg-slate-50' }}">
                        Beranda
                    </a>
                    <a href="{{ route('peta.publik', [], false) }}" class="px-3.5 py-2 rounded-xl transition-colors {{ request()->routeIs('peta.publik*') ? 'text-brand-navy bg-slate-100 font-bold' : 'text-slate-600 hover:text-brand-navy hover:bg-slate-50' }}">
                        Peta Publik
                    </a>
                    <a href="{{ route('tracking.publik', [], false) }}" class="px-3.5 py-2 rounded-xl transition-colors {{ request()->routeIs('tracking.publik*') ? 'text-brand-navy bg-slate-100 font-bold' : 'text-slate-600 hover:text-brand-navy hover:bg-slate-50' }}">
                        Lacak Tiket
                    </a>

                    @auth
                        @if (auth()->user()->isWarga())
                            <a href="{{ route('warga.laporan.saya', [], false) }}" class="px-3.5 py-2 rounded-xl transition-colors {{ request()->routeIs('warga.laporan.*') ? 'text-brand-navy bg-slate-100 font-bold' : 'text-slate-600 hover:text-brand-navy hover:bg-slate-50' }}">
                                Laporan Saya
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}" class="px-3.5 py-2 rounded-xl text-brand-teal hover:bg-brand-teal/10 font-bold">
                                Panel Petugas/Admin &rarr;
                            </a>
                        @endif
                    @endauth
                </nav>

                <!-- Right Action Buttons -->
                <div class="hidden md:flex items-center gap-3">
                    <!-- CTA Lapor Sekarang -->
                    <a href="{{ route('warga.laporan.create', [], false) }}" class="inline-flex items-center gap-2 rounded-xl bg-brand-amber px-4 py-2.5 text-sm font-bold text-brand-navy shadow-sm transition-all hover:bg-amber-400 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-brand-amber focus:ring-offset-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                        <span>Lapor Kerusakan</span>
                    </a>

                    @auth
                        <!-- User Dropdown -->
                        <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                            <button @click="open = !open" class="flex items-center gap-2 rounded-xl p-1.5 hover:bg-slate-100 transition-colors">
                                <div class="h-9 w-9 rounded-xl bg-brand-navy text-white flex items-center justify-center font-bold text-sm">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                                <svg class="h-4 w-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div x-show="open" x-transition style="display: none;" class="absolute right-0 mt-2 w-48 rounded-2xl bg-white p-2 shadow-lg ring-1 ring-black/5 z-50">
                                <div class="px-3 py-2 border-b border-slate-100">
                                    <p class="text-xs font-semibold text-slate-800 truncate">{{ auth()->user()->name }}</p>
                                    <p class="text-[11px] text-slate-500 truncate">{{ auth()->user()->email }}</p>
                                </div>
                                <a href="{{ route('profile.edit') }}" class="block rounded-lg px-3 py-2 text-xs font-medium text-slate-700 hover:bg-slate-100">Profil Saya</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left rounded-lg px-3 py-2 text-xs font-medium text-rose-600 hover:bg-rose-50">Keluar</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="rounded-xl px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-100 transition-colors">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="rounded-xl bg-brand-navy px-4 py-2.5 text-sm font-semibold text-white hover:bg-navy-900 transition-all shadow-sm">
                            Daftar Warga
                        </a>
                    @endauth
                </div>

                <!-- Mobile Hamburger Button -->
                <button @click="mobileNavOpen = !mobileNavOpen" class="md:hidden p-2 rounded-xl text-slate-600 hover:bg-slate-100">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileNavOpen" x-transition class="md:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-6 space-y-3" style="display: none;">
            <a href="{{ url('/') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-100">Beranda</a>
            <a href="{{ route('peta.publik', [], false) }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-100">Peta Publik</a>
            <a href="{{ route('tracking.publik', [], false) }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-100">Lacak Tiket</a>
            @auth
                <a href="{{ route('warga.laporan.saya', [], false) }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-100">Laporan Saya</a>
                <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-100">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-3 py-2 rounded-lg text-sm font-semibold text-rose-600 hover:bg-rose-50">Keluar</button>
                </form>
            @else
                <div class="pt-2 flex flex-col gap-2">
                    <a href="{{ route('login') }}" class="w-full text-center rounded-xl border border-slate-300 py-2.5 text-sm font-semibold text-slate-700">Masuk</a>
                    <a href="{{ route('register') }}" class="w-full text-center rounded-xl bg-brand-navy py-2.5 text-sm font-semibold text-white">Daftar Warga</a>
                </div>
            @endauth
            <a href="{{ route('warga.laporan.create', [], false) }}" class="block text-center rounded-xl bg-brand-amber py-3 text-sm font-bold text-brand-navy shadow">
                Lapor Kerusakan Sekarang
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <x-flash />
            {{ $slot }}
        </div>
    </main>

    <!-- Civic Footer -->
    <footer class="mt-auto bg-brand-navy text-white pt-12 pb-8 border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pb-8 border-b border-white/10">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <x-application-logo class="h-10 w-10 text-white" />
                        <div>
                            <span class="text-lg font-black tracking-tight">INFRA-DAYA</span>
                            <p class="text-xs text-slate-300">Pemerintah Kota Bandung</p>
                        </div>
                    </div>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        Sistem pelaporan dan respons cepat perbaikan infrastruktur publik (jalan, drainase, penerangan, dan jembatan) untuk mewujudkan Bandung yang nyaman dan tanggap (SDG 9).
                    </p>
                </div>

                <div>
                    <h4 class="text-sm font-bold text-brand-amber uppercase tracking-wider mb-4">Layanan Publik</h4>
                    <ul class="space-y-2 text-xs text-slate-300">
                        <li><a href="{{ route('warga.laporan.create', [], false) }}" class="hover:text-white transition-colors">&rarr; Pengajuan Laporan Baru</a></li>
                        <li><a href="{{ route('tracking.publik', [], false) }}" class="hover:text-white transition-colors">&rarr; Pelacakan Status Nomor Tiket</a></li>
                        <li><a href="{{ route('peta.publik', [], false) }}" class="hover:text-white transition-colors">&rarr; Peta Sebaran Masalah Terbuka</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-white transition-colors">&rarr; Portal Petugas & Admin DSDABM</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-bold text-brand-amber uppercase tracking-wider mb-4">Kontak Instansi</h4>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        <strong>Dinas Sumber Daya Air dan Bina Marga (DSDABM)</strong><br>
                        Jl. Cianjur No. 34, Kota Bandung, Jawa Barat 40271<br>
                        Email: dsdabm@bandung.go.id<br>
                        Call Center Darurat: 112
                    </p>
                </div>
            </div>

            <div class="mt-6 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-400 gap-4">
                <p>&copy; {{ date('Y') }} INFRA-DAYA Kota Bandung. Seluruh hak cipta dilindungi.</p>
                <p class="flex items-center gap-2">
                    <span>Mendukung SDG 9: Industri, Inovasi, & Infrastruktur</span>
                </p>
            </div>
        </div>
    </footer>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    @stack('scripts')
</body>
</html>
