<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#EEF3F6]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Portal Warga' }} - INFRA-DAYA Kota Bandung</title>

    <!-- Favicon Resmi INFRA-DAYA -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo-icon.png') }}">

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
    <!-- Main Navigation Bar (Sentry / Roobinium Style) -->
    <header class="sticky top-0 z-40 bg-[#070B14]/95 backdrop-blur-md border-b border-white/10 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between">
                <!-- Brand Logo (White Badge for crisp high-contrast presentation) -->
                <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                    <div class="bg-white px-2.5 py-1.5 rounded-xl shadow-sm inline-flex items-center transition-transform group-hover:scale-102">
                        <x-application-logo variant="full" class="h-8 sm:h-9 w-auto max-w-[175px] object-contain" />
                    </div>
                    <span class="sr-only">INFRA-DAYA Kota Bandung</span>
                </a>

                <!-- Desktop Nav Items (Segmented Capsule Bar) -->
                <nav class="hidden md:flex items-center p-1 rounded-xl bg-white/[0.04] border border-white/10 font-semibold text-xs tracking-wide">
                    <a href="{{ url('/') }}" class="px-4 py-2 rounded-lg transition-all {{ request()->is('/') ? 'text-white bg-white/10 font-bold shadow-xs' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Beranda
                    </a>
                    <a href="{{ route('peta.publik', [], false) }}" class="px-4 py-2 rounded-lg transition-all {{ request()->routeIs('peta.publik*') ? 'text-white bg-white/10 font-bold shadow-xs' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Peta Publik
                    </a>
                    <a href="{{ route('tracking.publik', [], false) }}" class="px-4 py-2 rounded-lg transition-all {{ request()->routeIs('tracking.publik*') ? 'text-white bg-white/10 font-bold shadow-xs' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                        Lacak Tiket
                    </a>

                    @auth
                        @if (auth()->user()->isWarga())
                            <a href="{{ route('warga.laporan.saya', [], false) }}" class="px-4 py-2 rounded-lg transition-all {{ request()->routeIs('warga.laporan.*') ? 'text-white bg-white/10 font-bold shadow-xs' : 'text-slate-300 hover:text-white hover:bg-white/5' }}">
                                Laporan Saya
                            </a>
                        @else
                            <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-lg text-blue-400 hover:bg-blue-500/10 font-bold">
                                Panel Petugas &rarr;
                            </a>
                        @endif
                    @endauth
                </nav>

                <!-- Right Action Buttons (Sign in + High-contrast Pill Button) -->
                <div class="hidden md:flex items-center gap-4">
                    @auth
                        <!-- User Menu -->
                        <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                            <button @click="open = !open" class="flex items-center gap-2 rounded-xl p-1.5 hover:bg-white/10 transition-colors text-white">
                                <div class="h-8 w-8 rounded-xl bg-blue-600 text-white flex items-center justify-center font-bold text-xs shadow">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                                <span class="text-xs font-semibold text-slate-200">{{ auth()->user()->name }}</span>
                                <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div x-show="open" x-transition style="display: none;" class="absolute right-0 mt-2 w-52 rounded-2xl bg-[#0F172A] border border-white/10 p-2 shadow-2xl text-white z-50">
                                <div class="px-3 py-2 border-b border-white/10">
                                    <p class="text-xs font-semibold text-white truncate">{{ auth()->user()->name }}</p>
                                    <p class="text-[11px] text-slate-400 truncate">{{ auth()->user()->email }}</p>
                                </div>
                                <a href="{{ route('profile.edit') }}" class="block rounded-lg px-3 py-2 text-xs font-medium text-slate-300 hover:bg-white/10">Profil Saya</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left rounded-lg px-3 py-2 text-xs font-medium text-rose-400 hover:bg-rose-500/10">Keluar</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-xs font-bold text-slate-300 hover:text-white transition-colors">
                            Masuk
                        </a>
                    @endauth

                    <!-- High-contrast Action Button (like "Get demo" in Sentry) -->
                    <a href="{{ route('warga.laporan.create', [], false) }}" class="inline-flex items-center gap-2 rounded-xl bg-white text-slate-950 px-4 py-2.5 text-xs font-bold shadow-sm transition-all hover:bg-slate-100 hover:shadow-md focus:outline-none">
                        <svg class="h-3.5 w-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                        <span>Lapor Kerusakan</span>
                    </a>
                </div>

                <!-- Mobile Hamburger Button -->
                <button @click="mobileNavOpen = !mobileNavOpen" class="md:hidden p-2 rounded-xl text-slate-300 hover:bg-white/10">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div x-show="mobileNavOpen" x-transition class="md:hidden border-t border-white/10 bg-[#070B14] px-4 pt-3 pb-6 space-y-3" style="display: none;">
            <a href="{{ url('/') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-200 hover:bg-white/10">Beranda</a>
            <a href="{{ route('peta.publik', [], false) }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-200 hover:bg-white/10">Peta Publik</a>
            <a href="{{ route('tracking.publik', [], false) }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-200 hover:bg-white/10">Lacak Tiket</a>
            @auth
                <a href="{{ route('warga.laporan.saya', [], false) }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-200 hover:bg-white/10">Laporan Saya</a>
                <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold text-slate-200 hover:bg-white/10">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-3 py-2 rounded-lg text-sm font-semibold text-rose-400 hover:bg-rose-500/10">Keluar</button>
                </form>
            @else
                <div class="pt-2 flex flex-col gap-2">
                    <a href="{{ route('login') }}" class="w-full text-center rounded-xl border border-white/20 py-2.5 text-sm font-semibold text-slate-200">Masuk</a>
                    <a href="{{ route('register') }}" class="w-full text-center rounded-xl bg-blue-600 py-2.5 text-sm font-semibold text-white">Daftar Warga</a>
                </div>
            @endauth
            <a href="{{ route('warga.laporan.create', [], false) }}" class="block text-center rounded-xl bg-white py-3 text-sm font-bold text-slate-950 shadow">
                Lapor Kerusakan Sekarang
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1">
        @if (request()->is('/'))
            <x-flash class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4" />
            {{ $slot }}
        @else
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <x-flash />
                {{ $slot }}
            </div>
        @endif
    </main>

    <!-- Civic Footer -->
    <footer class="mt-auto bg-brand-navy text-white pt-12 pb-8 border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pb-8 border-b border-white/10">
                <div>
                    <div class="mb-4">
                        <div class="inline-flex items-center bg-white px-3 py-1.5 rounded-lg shadow-sm border border-slate-200">
                            <x-application-logo variant="full" class="h-8 w-auto max-w-[170px]" />
                        </div>
                        <div class="mt-2 text-xs text-slate-300 font-semibold tracking-wide">
                            Pemerintah Kota Bandung &bull; DSDABM
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
