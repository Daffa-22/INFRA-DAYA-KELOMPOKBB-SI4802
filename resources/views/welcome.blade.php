<x-warga-layout title="Portal Pelaporan Kerusakan Infrastruktur Kota Bandung">
    <!-- HERO SECTION: Civic Command & Action Center -->
    <section class="relative overflow-hidden rounded-2xl bg-[#0A2240] text-white border border-[#16375E] shadow-lg mb-12">
        <!-- Subtle architectural grid texture (no AI blur blobs) -->
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 20px 20px;"></div>

        <div class="relative z-10 px-6 sm:px-10 lg:px-12 py-12 lg:py-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                <!-- Left Column: Civic Authority & Purpose -->
                <div class="lg:col-span-7 space-y-6">
                    <!-- Institutional Badge -->
                    <div class="inline-flex items-center gap-2 rounded-lg bg-white/10 px-3 py-1.5 text-xs font-semibold text-slate-200 border border-white/15">
                        <span class="h-2 w-2 rounded-full bg-[#F59E0B]"></span>
                        <span>Portal Resmi INFRA-DAYA &bull; DSDABM Kota Bandung &bull; SDG 9</span>
                    </div>

                    <!-- Main Headline (Authentic Civic Typography, No Rainbow Gradient Text) -->
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-white leading-tight">
                        Layanan Pengaduan & Tanggap Darurat <br class="hidden sm:inline">
                        <span class="text-[#F59E0B]">Infrastruktur Publik Kota Bandung</span>
                    </h1>

                    <p class="text-sm sm:text-base text-slate-300 leading-relaxed max-w-2xl">
                        Sistem terpadu DSDABM untuk pelaporan dan percepatan perbaikan jalan berlubang, saluran drainase banjir, jembatan, serta penerangan jalan di 30 kecamatan. Setiap aduan warga diverifikasi dan ditangani oleh Unit Reaksi Cepat (URC).
                    </p>

                    <!-- Civic Trust Metrics -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-4 border-t border-white/10 text-slate-200">
                        <div>
                            <div class="text-2xl font-extrabold text-white">30</div>
                            <div class="text-[11px] text-slate-400 font-medium">Kecamatan Terpadu</div>
                        </div>
                        <div>
                            <div class="text-2xl font-extrabold text-white">151</div>
                            <div class="text-[11px] text-slate-400 font-medium">Wilayah Kelurahan</div>
                        </div>
                        <div>
                            <div class="text-2xl font-extrabold text-[#F59E0B]">&lt; 24 Jam</div>
                            <div class="text-[11px] text-slate-400 font-medium">SOP Verifikasi</div>
                        </div>
                        <div>
                            <div class="text-2xl font-extrabold text-emerald-400">100%</div>
                            <div class="text-[11px] text-slate-400 font-medium">Pelacakan Terbuka</div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Tactile Civic Action Console -->
                <div class="lg:col-span-5">
                    <div class="rounded-xl bg-white p-6 sm:p-7 text-slate-800 shadow-xl border border-slate-200">
                        <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                            <div>
                                <span class="text-[11px] font-bold uppercase tracking-wider text-[#0E7C86]">Pusat Layanan Warga</span>
                                <h2 class="text-lg font-bold text-[#0A2240] mt-0.5">Aksi Cepat Pengaduan</h2>
                            </div>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                Siaga 24 Jam
                            </span>
                        </div>

                        <!-- 1. Quick Tracker Form -->
                        <div class="mt-5 space-y-3">
                            <label for="nomor_tiket" class="block text-xs font-bold text-slate-700 uppercase tracking-wide">
                                Lacak Progres Pengaduan
                            </label>
                            <form action="{{ route('tracking.publik', [], false) }}" method="GET" class="flex gap-2">
                                <div class="relative flex-1">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                    </div>
                                    <input
                                        type="text"
                                        id="nomor_tiket"
                                        name="nomor_tiket"
                                        placeholder="Contoh: INFRA-2026-0001"
                                        class="w-full rounded-lg border border-slate-300 pl-9 pr-3 py-2.5 text-xs text-slate-800 placeholder-slate-400 focus:border-[#0E7C86] focus:ring-1 focus:ring-[#0E7C86]"
                                        required
                                    >
                                </div>
                                <button
                                    type="submit"
                                    class="inline-flex items-center justify-center px-4 py-2.5 rounded-lg bg-[#0A2240] hover:bg-[#16375E] text-white text-xs font-bold tracking-wide transition-colors whitespace-nowrap"
                                >
                                    <span>Lacak Tiket</span>
                                </button>
                            </form>
                            <p class="text-[11px] text-slate-400">
                                Masukkan nomor tiket untuk melihat foto bukti perbaikan, status tim lapangan, dan riwayat audit.
                            </p>
                        </div>

                        <!-- Divider -->
                        <div class="relative my-6">
                            <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-200"></div></div>
                            <div class="relative flex justify-center text-[10px] uppercase font-bold tracking-wider text-slate-400"><span class="bg-white px-2">Atau Ajukan Baru</span></div>
                        </div>

                        <!-- 2. Primary Action Buttons -->
                        <div class="space-y-2.5">
                            <a
                                href="{{ route('warga.laporan.create', [], false) }}"
                                class="w-full inline-flex items-center justify-center gap-2.5 rounded-lg bg-[#F59E0B] hover:bg-[#d97706] text-[#0A2240] px-5 py-3 text-sm font-extrabold shadow-sm transition-all focus:ring-2 focus:ring-[#F59E0B] focus:ring-offset-2"
                            >
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                                <span>Lapor Kerusakan Baru</span>
                            </a>

                            <a
                                href="{{ route('peta.publik', [], false) }}"
                                class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-slate-50 hover:bg-slate-100 text-slate-700 px-4 py-2.5 text-xs font-semibold border border-slate-200 transition-colors"
                            >
                                <svg class="h-4 w-4 text-[#0E7C86]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                                <span>Buka Peta Sebaran Masalah Pan-Bandung</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4 KATEGORI UTAMA PENANGANAN DSDABM -->
    <section class="mb-14">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-6 pb-3 border-b border-slate-200 gap-3">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-[#0E7C86]">Kewenangan Teknis DSDABM</span>
                <h2 class="text-xl sm:text-2xl font-extrabold text-[#0A2240] mt-0.5">4 Kategori Layanan Infrastruktur Sipil</h2>
            </div>
            <p class="text-xs text-slate-500 max-w-md">
                Standar operasional prosedur penanganan fasilitas fisik jalan dan pengairan di bawah naungan Pemkot Bandung.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <!-- Kategori 1: Jalan Raya -->
            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-xs hover:border-[#0E7C86] transition-colors flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <div class="h-10 w-10 rounded-lg bg-slate-100 text-[#0A2240] flex items-center justify-center font-bold">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                        </div>
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-amber-50 text-amber-800 border border-amber-200">
                            SLA: 3 Hari
                        </span>
                    </div>
                    <h3 class="text-base font-bold text-[#0A2240]">Jalan Raya & Trotoar</h3>
                    <p class="mt-2 text-xs text-slate-600 leading-relaxed">
                        Jalan berlubang, amblas, keretakan aspal, trotoar rusak, atau paving terlepas yang membahayakan keselamatan pejalan kaki dan pengendara.
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                    <span class="font-medium text-[#0A2240]">Bidang Jalan & Jembatan</span>
                    <span class="font-semibold text-[#0E7C86]">Bobot: 2</span>
                </div>
            </div>

            <!-- Kategori 2: Drainase -->
            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-xs hover:border-[#0E7C86] transition-colors flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <div class="h-10 w-10 rounded-lg bg-teal-50 text-[#0E7C86] flex items-center justify-center font-bold">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                        </div>
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-rose-50 text-rose-800 border border-rose-200">
                            SLA: 2 Hari
                        </span>
                    </div>
                    <h3 class="text-base font-bold text-[#0A2240]">Saluran Drainase & Gorong-gorong</h3>
                    <p class="mt-2 text-xs text-slate-600 leading-relaxed">
                        Endapan sedimentasi parit, saluran air tersumbat sampah, tutup gorong-gorong hilang, dan dinding drainase longsor pemicu banjir genangan.
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                    <span class="font-medium text-[#0A2240]">Bidang Drainase & SDA</span>
                    <span class="font-semibold text-rose-600">Bobot: 3</span>
                </div>
            </div>

            <!-- Kategori 3: PJU -->
            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-xs hover:border-[#0E7C86] transition-colors flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <div class="h-10 w-10 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center font-bold">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                        </div>
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-slate-100 text-slate-700 border border-slate-200">
                            SLA: 2 Hari
                        </span>
                    </div>
                    <h3 class="text-base font-bold text-[#0A2240]">Penerangan Jalan Umum (PJU)</h3>
                    <p class="mt-2 text-xs text-slate-600 leading-relaxed">
                        Lampu PJU padam di malam hari, tiang lampu miring berisiko roboh, dan kabel utilitas terkelupas di kawasan publik perkotaan.
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                    <span class="font-medium text-[#0A2240]">Unit Penerangan Kota</span>
                    <span class="font-semibold text-slate-600">Bobot: 1</span>
                </div>
            </div>

            <!-- Kategori 4: Jembatan -->
            <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-xs hover:border-[#0E7C86] transition-colors flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <div class="h-10 w-10 rounded-lg bg-sky-50 text-sky-700 flex items-center justify-center font-bold">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-rose-50 text-rose-800 border border-rose-200">
                            SLA: Darurat
                        </span>
                    </div>
                    <h3 class="text-base font-bold text-[#0A2240]">Jembatan & Tanggul Air</h3>
                    <p class="mt-2 text-xs text-slate-600 leading-relaxed">
                        Oprit sambungan jembatan retak amblas, pagar pembatas sungai rusak, dan tanggul dinding sungai terancam jebol akibat erosi aliran air.
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-500">
                    <span class="font-medium text-[#0A2240]">Unit Rekayasa Jembatan</span>
                    <span class="font-semibold text-rose-600">Bobot: 3</span>
                </div>
            </div>
        </div>
    </section>

    <!-- SOP ALUR KERJA PENANGANAN TUNTAS -->
    <section class="mb-14 rounded-2xl bg-white p-7 sm:p-10 border border-slate-200 shadow-xs">
        <div class="max-w-2xl mb-8">
            <span class="text-xs font-bold uppercase tracking-wider text-[#0E7C86]">SOP DSDABM Kota Bandung</span>
            <h2 class="text-xl sm:text-2xl font-extrabold text-[#0A2240] mt-0.5">Alur Transparansi dari Laporan hingga Selesai</h2>
            <p class="text-xs text-slate-500 mt-1">
                Setiap tahapan tercatat dalam timeline audit publik digital yang dapat dipantau langsung oleh pelapor.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 relative">
            <!-- Step 1 -->
            <div class="border-l-2 border-[#0A2240] pl-4 space-y-1.5">
                <div class="text-xs font-bold font-mono text-[#0A2240] uppercase tracking-wider">Tahap 01</div>
                <h4 class="font-bold text-slate-900 text-sm">Lapor & Titik Geospasial</h4>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Warga mengunggah foto kondisi fisik kerusakan sebelum perbaikan dan menandai koordinat GPS di peta Kota Bandung.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="border-l-2 border-[#0E7C86] pl-4 space-y-1.5">
                <div class="text-xs font-bold font-mono text-[#0E7C86] uppercase tracking-wider">Tahap 02</div>
                <h4 class="font-bold text-slate-900 text-sm">Verifikasi & Skoring Prioritas</h4>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Admin verifikator DSDABM memvalidasi keabsahan data lapangan serta menentukan bobot prioritas dan kategori teknis.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="border-l-2 border-[#F59E0B] pl-4 space-y-1.5">
                <div class="text-xs font-bold font-mono text-amber-700 uppercase tracking-wider">Tahap 03</div>
                <h4 class="font-bold text-slate-900 text-sm">Disposisi & Pengerjaan URC</h4>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Surat Perintah Tugas (SPT) resmi diterbitkan secara digital. Tim teknis bergerak ke lokasi untuk penanganan fisik.
                </p>
            </div>

            <!-- Step 4 -->
            <div class="border-l-2 border-emerald-600 pl-4 space-y-1.5">
                <div class="text-xs font-bold font-mono text-emerald-700 uppercase tracking-wider">Tahap 04</div>
                <h4 class="font-bold text-slate-900 text-sm">Dokumentasi & Rating Warga</h4>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Petugas mengunggah foto bukti sesudah perbaikan (*Before/After*). Laporan ditutup dan warga memberikan penilaian kepuasan.
                </p>
            </div>
        </div>
    </section>

    <!-- PETA SEBARAN PREVIEW KOTA BANDUNG -->
    <section class="mb-10">
        <div class="rounded-2xl bg-white p-6 sm:p-7 border border-slate-200 shadow-xs">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-5 gap-3">
                <div>
                    <h3 class="text-lg font-bold text-[#0A2240]">Peta Geospasial Sebaran Masalah Pan-Bandung</h3>
                    <p class="text-xs text-slate-500">Pemantauan titik pengaduan masyarakat secara terbuka di 30 kecamatan</p>
                </div>
                <a
                    href="{{ route('peta.publik', [], false) }}"
                    class="inline-flex items-center gap-1.5 text-xs font-bold text-[#0E7C86] hover:text-[#0b626a] transition-colors"
                >
                    <span>Buka Peta Interaktif Lengkap</span>
                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <!-- Leaflet Container -->
            <div id="bandung-map-preview" class="h-80 w-full rounded-xl border border-slate-200 overflow-hidden z-10"></div>
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
                    attribution: '&copy; OpenStreetMap contributors | INFRA-DAYA DSDABM'
                }).addTo(map);

                // Tambah marker kantor dinas DSDABM
                L.marker([-6.9189, 107.6322]).addTo(map)
                    .bindPopup("<b>Dinas SDABM Kota Bandung</b><br>Pusat Komando & Pelayanan INFRA-DAYA")
                    .openPopup();
            }
        });
    </script>
    @endpush
</x-warga-layout>
