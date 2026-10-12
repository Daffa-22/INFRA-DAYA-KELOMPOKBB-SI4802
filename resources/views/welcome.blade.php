<x-warga-layout title="Sistem Pelaporan Kerusakan Infrastruktur Kota Bandung">
    <!-- HERO SECTION -->
    <section class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#1F3A5F] via-[#162f52] to-[#0E7C86] text-white shadow-2xl py-16 px-6 sm:px-12 lg:px-16 mb-16">
        <!-- Background decorative ambient circles -->
        <div class="absolute -top-24 -right-24 h-96 w-96 rounded-full bg-brand-amber/10 blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -left-24 h-96 w-96 rounded-full bg-brand-teal/20 blur-3xl pointer-events-none"></div>

        <div class="relative z-10 max-w-3xl">
            <!-- Badge SDG 9 -->
            <div class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3.5 py-1 text-xs font-semibold backdrop-blur-md text-brand-amber ring-1 ring-white/20 mb-6">
                <span class="h-2 w-2 rounded-full bg-brand-amber animate-ping"></span>
                <span>Infrastruktur Tanggap & Berkelanjutan &bull; SDG 9 Kota Bandung</span>
            </div>

            <!-- Title -->
            <h1 class="text-3xl font-black tracking-tight sm:text-5xl lg:text-6xl leading-[1.15] text-white">
                Infrastruktur Rusak? <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-amber via-amber-300 to-amber-200">
                    Laporkan Cepat, Kami Tanggapi.
                </span>
            </h1>

            <p class="mt-5 text-base sm:text-lg text-slate-200 leading-relaxed max-w-2xl">
                Layanan pelaporan terintegrasi Dinas Sumber Daya Air dan Bina Marga (DSDABM) Kota Bandung. Pantau langsung perbaikan jalan, saluran air, dan penerangan publik secara transparan.
            </p>

            <!-- Search Quick Ticket Tracker Box -->
            <div class="mt-8 rounded-2xl bg-white/10 backdrop-blur-md p-2 sm:p-3 ring-1 ring-white/20 max-w-xl">
                <form action="{{ route('tracking.publik', [], false) }}" method="GET" class="flex flex-col sm:flex-row gap-2">
                    <div class="relative flex-1">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-300">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        </div>
                        <input
                            type="text"
                            name="nomor_tiket"
                            placeholder="Cek status tiket (mis. INFRA-2026-0001)..."
                            class="w-full rounded-xl border-0 bg-white/90 pl-11 pr-4 py-3 text-sm text-slate-800 placeholder-slate-500 focus:bg-white focus:ring-2 focus:ring-brand-amber"
                            required
                        >
                    </div>
                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-xl bg-brand-amber px-6 py-3 text-sm font-bold text-brand-navy shadow-lg shadow-amber-500/20 hover:bg-amber-400 transition-all">
                        <span>Lacak Tiket</span>
                    </button>
                </form>
            </div>

            <!-- Hero Action Buttons -->
            <div class="mt-8 flex flex-wrap items-center gap-4">
                <x-button variant="amber" size="lg" :href="route('warga.laporan.create', [], false)">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                    <span>Lapor Kerusakan Baru</span>
                </x-button>

                <x-button variant="outline" size="lg" class="border-white/30 text-white hover:bg-white/10" :href="route('peta.publik', [], false)">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                    <span>Buka Peta Sebaran</span>
                </x-button>
            </div>
        </div>
    </section>

    <!-- 4 KATEGORI UTAMA INFRASTRUKTUR -->
    <section class="mb-16">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 gap-4">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-brand-teal">Ruang Lingkup Penanganan</span>
                <h2 class="text-2xl sm:text-3xl font-black text-brand-navy mt-1">4 Kategori Layanan Infrastruktur</h2>
            </div>
            <p class="text-xs sm:text-sm text-slate-500 max-w-md">
                DSDABM Kota Bandung menangani perbaikan fasilitas fisik publik di 30 kecamatan dan 151 kelurahan.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Kategori 1: Jalan Raya -->
            <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm hover:shadow-md transition-shadow group">
                <div class="h-12 w-12 rounded-xl bg-brand-navy/10 flex items-center justify-center text-brand-navy group-hover:bg-brand-navy group-hover:text-white transition-colors">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                </div>
                <h3 class="mt-4 text-lg font-bold text-brand-navy">Jalan Raya & Trotoar</h3>
                <p class="mt-2 text-xs text-slate-500 leading-relaxed">
                    Jalan berlubang, amblas, trotoar rusak atau paving terlepas yang membahayakan pengendara dan pejalan kaki.
                </p>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-brand-teal">
                    <span>Prioritas Menengah</span>
                    <span>Bobot: 2</span>
                </div>
            </div>

            <!-- Kategori 2: Drainase -->
            <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm hover:shadow-md transition-shadow group">
                <div class="h-12 w-12 rounded-xl bg-brand-teal/10 flex items-center justify-center text-brand-teal group-hover:bg-brand-teal group-hover:text-white transition-colors">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                </div>
                <h3 class="mt-4 text-lg font-bold text-brand-navy">Saluran Drainase & Gorong-gorong</h3>
                <p class="mt-2 text-xs text-slate-500 leading-relaxed">
                    Saluran air tersumbat endapan sampah, tutup gorong-gorong hilang, tanggul parit jebol penyebab banjir genangan.
                </p>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-rose-600">
                    <span>Prioritas Tinggi</span>
                    <span>Bobot: 3</span>
                </div>
            </div>

            <!-- Kategori 3: PJU -->
            <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm hover:shadow-md transition-shadow group">
                <div class="h-12 w-12 rounded-xl bg-brand-amber/10 flex items-center justify-center text-brand-amber group-hover:bg-brand-amber group-hover:text-slate-900 transition-colors">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                </div>
                <h3 class="mt-4 text-lg font-bold text-brand-navy">Penerangan Jalan Umum (PJU)</h3>
                <p class="mt-2 text-xs text-slate-500 leading-relaxed">
                    Lampu PJU mati/redup, tiang listrik miring, kabel terkelupas berisiko konsleting pada jalan raya dan pemukiman.
                </p>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-600">
                    <span>Prioritas Normal</span>
                    <span>Bobot: 1</span>
                </div>
            </div>

            <!-- Kategori 4: Jembatan -->
            <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm hover:shadow-md transition-shadow group">
                <div class="h-12 w-12 rounded-xl bg-indigo-50 flex items-center justify-center text-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <h3 class="mt-4 text-lg font-bold text-brand-navy">Jembatan & Tanggul Air</h3>
                <p class="mt-2 text-xs text-slate-500 leading-relaxed">
                    Oprit jembatan retak, railing pelindung patah, tanggul sungai terancam longsor yang membahayakan warga sekitar.
                </p>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-rose-600">
                    <span>Prioritas Darurat</span>
                    <span>Bobot: 3</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ALUR PENANGANAN TRANSPARAN -->
    <section class="mb-16 rounded-3xl bg-white p-8 sm:p-12 border border-slate-200/80 shadow-sm">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-bold uppercase tracking-wider text-brand-teal">Daya Tanggap Presisi</span>
            <h2 class="text-2xl sm:text-3xl font-black text-brand-navy mt-1">Alur Pelaporan & Penanganan Tuntas</h2>
            <p class="text-xs sm:text-sm text-slate-500 mt-2">
                Setiap tahapan tercatat dalam timeline audit publik sehingga warga dapat mengawal tindak lanjut secara real-time.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 relative">
            <div class="flex flex-col items-center text-center p-4">
                <div class="h-14 w-14 rounded-2xl bg-brand-navy text-white flex items-center justify-center font-black text-xl shadow-md mb-4">
                    1
                </div>
                <h4 class="font-bold text-brand-navy text-base">Lapor & Titik Peta</h4>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                    Warga mengunggah foto sebelum dan menandai koordinat tepat di peta Leaflet Kota Bandung.
                </p>
            </div>

            <div class="flex flex-col items-center text-center p-4">
                <div class="h-14 w-14 rounded-2xl bg-brand-teal text-white flex items-center justify-center font-black text-xl shadow-md mb-4">
                    2
                </div>
                <h4 class="font-bold text-brand-navy text-base">Verifikasi & Prioritas</h4>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                    Admin DSDABM meneliti keabsahan laporan dan menentukan bobot prioritas penanganan.
                </p>
            </div>

            <div class="flex flex-col items-center text-center p-4">
                <div class="h-14 w-14 rounded-2xl bg-brand-amber text-brand-navy flex items-center justify-center font-black text-xl shadow-md mb-4">
                    3
                </div>
                <h4 class="font-bold text-brand-navy text-base">Disposisi & Pengerjaan</h4>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                    Petugas teknis lapangan menerima surat tugas digital, bergerak ke titik lokasi, dan melakukan perbaikan.
                </p>
            </div>

            <div class="flex flex-col items-center text-center p-4">
                <div class="h-14 w-14 rounded-2xl bg-emerald-600 text-white flex items-center justify-center font-black text-xl shadow-md mb-4">
                    4
                </div>
                <h4 class="font-bold text-brand-navy text-base">Selesai & Rating</h4>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                    Petugas mengunggah foto sesudah perbaikan. Laporan selesai dan warga memberikan rating kepuasan.
                </p>
            </div>
        </div>
    </section>

    <!-- PETA SEBARAN PREVIEW KOTA BANDUNG -->
    <section class="mb-12">
        <div class="rounded-3xl bg-white p-6 sm:p-8 border border-slate-200/80 shadow-sm">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 gap-4">
                <div>
                    <h3 class="text-xl font-bold text-brand-navy">Peta Geospasial Infrastruktur Kota Bandung</h3>
                    <p class="text-xs text-slate-500 mt-0.5">Pemantauan titik laporan warga di seluruh 30 kecamatan secara terbuka</p>
                </div>
                <x-button variant="teal" size="sm" :href="route('peta.publik', [], false)">
                    <span>Buka Peta Layar Penuh &rarr;</span>
                </x-button>
            </div>

            <!-- Leaflet Container -->
            <div id="bandung-map-preview" class="h-80 w-full rounded-2xl border border-slate-200 overflow-hidden shadow-inner z-10"></div>
        </div>
    </section>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof L !== 'undefined' && document.getElementById('bandung-map-preview')) {
                // Inisialisasi peta berpusat di Alun-Alun / Pusat Kota Bandung
                const map = L.map('bandung-map-preview').setView([-6.917464, 107.619122], 12);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; OpenStreetMap contributors | INFRA-DAYA'
                }).addTo(map);

                // Tambah marker kantor dinas DSDABM
                L.marker([-6.9189, 107.6322]).addTo(map)
                    .bindPopup("<b>Dinas SDABM Kota Bandung</b><br>Pusat Komando INFRA-DAYA")
                    .openPopup();
            }
        });
    </script>
    @endpush
</x-warga-layout>
