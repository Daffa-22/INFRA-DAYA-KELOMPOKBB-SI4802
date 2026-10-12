@if (auth()->user()->isWarga())
    <x-warga-layout title="Dashboard Warga">
        <div class="space-y-8">
            <!-- Welcome Banner -->
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-brand-navy via-[#1b3d66] to-[#0E7C86] p-8 text-white shadow-xl">
                <div class="relative z-10 max-w-2xl">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-white/10 px-3 py-1 text-xs font-semibold backdrop-blur-md text-brand-amber">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-amber"></span>
                        Portal Partisipasi Masyarakat
                    </span>
                    <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        Selamat Datang, {{ auth()->user()->name }}!
                    </h1>
                    <p class="mt-2 text-sm text-slate-200 leading-relaxed">
                        Bersama menjaga kenyamanan Kota Bandung. Laporkan setiap kerusakan jalan, saluran air tersumbat, atau lampu jalan padam langsung dari ponsel Anda.
                    </p>
                    <div class="mt-6 flex flex-wrap items-center gap-3">
                        <x-button variant="amber" :href="route('warga.laporan.create', [], false)">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                            <span>Buat Laporan Baru</span>
                        </x-button>
                        <x-button variant="outline" class="border-white/40 text-white hover:bg-white/10" :href="route('peta.publik', [], false)">
                            Lihat Peta Masalah Kota
                        </x-button>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <x-card class="border-l-4 border-l-brand-navy">
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Laporan Dikirim</p>
                    <p class="mt-2 text-3xl font-extrabold text-brand-navy">0</p>
                    <p class="mt-1 text-xs text-slate-400">Total laporan yang Anda ajukan</p>
                </x-card>

                <x-card class="border-l-4 border-l-slate-400">
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Menunggu Verifikasi</p>
                    <p class="mt-2 text-3xl font-extrabold text-slate-700">0</p>
                    <p class="mt-1 text-xs text-slate-400">Sedang ditinjau admin DSDABM</p>
                </x-card>

                <x-card class="border-l-4 border-l-brand-amber">
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Sedang Dikerjakan</p>
                    <p class="mt-2 text-3xl font-extrabold text-brand-amber-dark">0</p>
                    <p class="mt-1 text-xs text-slate-400">Dalam penanganan petugas</p>
                </x-card>

                <x-card class="border-l-4 border-l-emerald-500">
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Tuntas Diperbaiki</p>
                    <p class="mt-2 text-3xl font-extrabold text-emerald-600">0</p>
                    <p class="mt-1 text-xs text-slate-400">Selesai diperbaiki & siap dirating</p>
                </x-card>
            </div>

            <!-- Empty State / Recent Reports -->
            <x-card title="Laporan Kerusakan Terbaru Anda" subtitle="Daftar laporan terkini beserta status progresnya">
                <x-empty-state
                    title="Belum Ada Laporan Terkirim"
                    description="Anda belum mengajukan laporan kerusakan infrastruktur. Mulai laporkan fasilitas yang rusak di sekitar lingkungan Anda."
                    action-text="Buat Laporan Pertama"
                    :action-url="route('warga.laporan.create', [], false)"
                />
            </x-card>
        </div>
    </x-warga-layout>
@else
    <x-admin-layout title="Ringkasan Operasional" header="Dashboard Operasional">
        <div class="space-y-8">
            <!-- Welcome Header Card -->
            <div class="rounded-2xl bg-white p-6 shadow-sm border border-slate-200/80 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2">
                        <span class="rounded-md bg-brand-navy/10 px-2 py-0.5 text-xs font-bold text-brand-navy uppercase tracking-wider">
                            Role: {{ auth()->user()->role }}
                        </span>
                        <span class="text-xs text-slate-400">&bull;</span>
                        <span class="text-xs text-slate-500">Tahun Anggaran {{ date('Y') }}</span>
                    </div>
                    <h2 class="text-2xl font-black text-brand-navy mt-1">
                        Selamat Datang, {{ auth()->user()->name }}
                    </h2>
                    <p class="text-xs text-slate-500 mt-0.5">
                        Sistem Tanggap Kerusakan Infrastruktur Publik - DSDABM Kota Bandung
                    </p>
                </div>

                <div class="flex items-center gap-2.5">
                    @if (auth()->user()->isAdmin())
                        <x-button variant="teal" size="sm" :href="route('admin.verifikasi.index', [], false)">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>Antrean Verifikasi</span>
                        </x-button>
                    @elseif (auth()->user()->isPetugas())
                        <x-button variant="teal" size="sm" :href="route('petugas.tugas.index', [], false)">
                            <span>Lihat Tugas Lapangan</span>
                        </x-button>
                    @elseif (auth()->user()->isPimpinan())
                        <x-button variant="teal" size="sm" :href="route('pimpinan.sla.index', [], false)">
                            <span>Monitoring SLA</span>
                        </x-button>
                    @endif
                </div>
            </div>

            <!-- Metric Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Laporan Masuk</span>
                        <div class="h-10 w-10 rounded-xl bg-brand-navy/10 flex items-center justify-center text-brand-navy">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        </div>
                    </div>
                    <p class="mt-4 text-3xl font-black text-brand-navy">0</p>
                    <div class="mt-2 flex items-center gap-1.5 text-xs text-slate-500">
                        <x-badge-status status="menunggu_verifikasi" />
                        <span>menunggu telaah</span>
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Dalam Pengerjaan</span>
                        <div class="h-10 w-10 rounded-xl bg-amber-50 flex items-center justify-center text-brand-amber">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </div>
                    </div>
                    <p class="mt-4 text-3xl font-black text-slate-800">0</p>
                    <div class="mt-2 flex items-center gap-1.5 text-xs text-slate-500">
                        <x-badge-status status="diproses" />
                        <span>oleh tim teknis</span>
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Selesai Ditangani</span>
                        <div class="h-10 w-10 rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        </div>
                    </div>
                    <p class="mt-4 text-3xl font-black text-emerald-600">0</p>
                    <div class="mt-2 flex items-center gap-1.5 text-xs text-slate-500">
                        <x-badge-status status="selesai" />
                        <span>infrastruktur pulih</span>
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-200/80 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Kepatuhan SLA</span>
                        <div class="h-10 w-10 rounded-xl bg-teal-50 flex items-center justify-center text-brand-teal">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                    </div>
                    <p class="mt-4 text-3xl font-black text-brand-teal">100%</p>
                    <div class="mt-2 text-xs text-slate-500">
                        Target &le; 48 jam respon
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <x-card title="Aktivitas Penanganan Terkini" subtitle="Daftar laporan terbaru yang memerlukan tindak lanjut instansi">
                <x-empty-state
                    title="Belum Ada Laporan Aktif"
                    description="Seluruh laporan saat ini telah terselesaikan atau belum ada laporan baru yang masuk ke antrean."
                />
            </x-card>
        </div>
    </x-admin-layout>
@endif
