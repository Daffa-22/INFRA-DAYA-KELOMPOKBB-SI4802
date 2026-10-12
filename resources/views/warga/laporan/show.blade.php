<x-warga-layout title="Detail Laporan Kerusakan">
    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-2 border-b border-slate-200">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="font-mono text-xs font-bold text-[#0E7C86] bg-teal-50 px-2.5 py-1 rounded-md border border-teal-100">
                        {{ $laporan->nomor_tiket }}
                    </span>
                    @if($laporan->status === 'menunggu_verifikasi')
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-700">Menunggu Verifikasi</span>
                    @elseif($laporan->status === 'diproses')
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-50 text-amber-700">Sedang Diproses</span>
                    @elseif($laporan->status === 'selesai')
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700">Tuntas Selesai</span>
                    @else
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-rose-50 text-rose-700">Ditolak</span>
                    @endif
                </div>
                <h1 class="text-2xl font-bold text-[#1F3A5F] tracking-tight">{{ $laporan->judul }}</h1>
                <p class="text-xs text-slate-400 mt-1">Diajukan pada {{ $laporan->created_at->translatedFormat('l, d F Y - H:i') }} WIB</p>
            </div>

            <!-- Action buttons (Ubah / Batal jika status menunggu) -->
            <div class="flex items-center gap-2">
                <a href="{{ route('warga.laporan.saya') }}" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-sm font-medium transition-colors">
                    Kembali
                </a>
                @if($laporan->canBeModifiedByWarga())
                    <a href="{{ route('warga.laporan.edit', $laporan->id) }}" class="px-4 py-2 bg-[#0E7C86] hover:bg-[#0b636b] text-white rounded-xl text-sm font-medium transition-colors">
                        Ubah Laporan
                    </a>
                    <button type="button" onclick="confirmCancel()" class="px-4 py-2 bg-rose-50 hover:bg-rose-100 text-rose-700 rounded-xl text-sm font-medium transition-colors border border-rose-200">
                        Batalkan Laporan
                    </button>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Kolom Kiri: Rincian & Foto Bukti -->
            <div class="lg:col-span-2 space-y-6">
                <x-card class="p-6 space-y-5">
                    <h2 class="text-base font-bold text-slate-800 border-b border-slate-100 pb-2">Foto Bukti Kerusakan</h2>
                    <div class="rounded-xl overflow-hidden border border-slate-200 bg-slate-900 flex items-center justify-center max-h-96">
                        <img src="{{ asset('storage/' . $laporan->foto_bukti_sebelum) }}" alt="{{ $laporan->judul }}" class="w-full h-auto object-contain">
                    </div>

                    <div>
                        <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Deskripsi Kondisi Lapangan</h3>
                        <p class="text-sm text-slate-700 whitespace-pre-line leading-relaxed">{{ $laporan->deskripsi_kondisi }}</p>
                    </div>

                    @if($laporan->alasan_penolakan)
                        <div class="p-4 bg-rose-50 border border-rose-200 rounded-xl space-y-1">
                            <h4 class="text-xs font-bold text-rose-800 uppercase tracking-wider">Alasan Penolakan</h4>
                            <p class="text-sm text-rose-700">{{ $laporan->alasan_penolakan }}</p>
                        </div>
                    @endif
                </x-card>

                <!-- Peta Lokasi -->
                <x-card class="p-6 space-y-3">
                    <h2 class="text-base font-bold text-slate-800">Titik Koordinat Lokasi</h2>
                    <div id="detailMap" class="w-full h-64 rounded-xl border border-slate-200 overflow-hidden shadow-inner z-0"></div>
                    <div class="text-xs font-mono text-slate-500 flex items-center justify-between">
                        <span>Koordinat: {{ $laporan->latitude }}, {{ $laporan->longitude }}</span>
                        <a href="https://www.google.com/maps/search/?api=1&query={{ $laporan->latitude }},{{ $laporan->longitude }}" target="_blank" class="text-[#0E7C86] font-sans font-semibold hover:underline">
                            Buka Google Maps &rarr;
                        </a>
                    </div>
                </x-card>
            </div>

            <!-- Kolom Kanan: Status Timeline & Metadata -->
            <div class="space-y-6">
                <x-card class="p-6 space-y-4">
                    <h2 class="text-base font-bold text-slate-800 border-b border-slate-100 pb-2">Informasi Wilayah</h2>
                    <div class="text-xs space-y-2.5">
                        <div>
                            <span class="text-slate-400 block">Kategori Infrastruktur:</span>
                            <span class="font-semibold text-slate-800 text-sm">{{ $laporan->kategori->nama_kategori }}</span>
                        </div>
                        <div>
                            <span class="text-slate-400 block">Kecamatan:</span>
                            <span class="font-semibold text-slate-800">{{ $laporan->kelurahan->kecamatan->nama_kecamatan }}</span>
                        </div>
                        <div>
                            <span class="text-slate-400 block">Kelurahan:</span>
                            <span class="font-semibold text-slate-800">{{ $laporan->kelurahan->nama_kelurahan }}</span>
                        </div>
                    </div>
                </x-card>

                <!-- Timeline Riwayat Status -->
                <x-card class="p-6 space-y-4">
                    <h2 class="text-base font-bold text-slate-800 border-b border-slate-100 pb-2">Jejak Audit Status</h2>
                    <div class="space-y-4">
                        @foreach($laporan->riwayatStatus as $riwayat)
                            <div class="relative pl-6 pb-4 border-l-2 border-[#0E7C86]/30 last:border-0 last:pb-0">
                                <span class="absolute -left-1.5 top-0.5 h-3 w-3 rounded-full bg-[#0E7C86] ring-4 ring-teal-50"></span>
                                <div class="text-xs font-bold text-slate-800 capitalize">{{ str_replace('_', ' ', $riwayat->status) }}</div>
                                <div class="text-xs text-slate-600 mt-0.5">{{ $riwayat->keterangan }}</div>
                                <div class="text-[10px] text-slate-400 mt-1">{{ $riwayat->created_at->translatedFormat('d M Y, H:i') }}</div>
                            </div>
                        @endforeach
                    </div>
                </x-card>
            </div>
        </div>
    </div>

    @if($laporan->canBeModifiedByWarga())
        <!-- Modal Konfirmasi Batal -->
        <div id="cancelModal" class="fixed inset-0 z-50 hidden bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-xl space-y-4">
                <div class="h-12 w-12 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Batalkan Laporan Ini?</h3>
                    <p class="text-sm text-slate-500 mt-1">Laporan kerusakan <strong>{{ $laporan->nomor_tiket }}</strong> akan dihapus permanen dari sistem.</p>
                </div>
                <form method="POST" action="{{ route('warga.laporan.destroy', $laporan->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-end gap-3 pt-2">
                        <button type="button" onclick="closeCancelModal()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-sm font-medium transition-colors">
                            Kembali
                        </button>
                        <button type="submit" class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white rounded-lg text-sm font-medium transition-colors">
                            Ya, Batalkan Laporan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function confirmCancel() {
                document.getElementById('cancelModal').classList.remove('hidden');
            }
            function closeCancelModal() {
                document.getElementById('cancelModal').classList.add('hidden');
            }
        </script>
    @endif

    <!-- Leaflet JS Map Preview -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const lat = {{ $laporan->latitude }};
            const lng = {{ $laporan->longitude }};
            const map = L.map('detailMap').setView([lat, lng], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap | INFRA-DAYA'
            }).addTo(map);

            L.marker([lat, lng]).addTo(map)
                .bindPopup("<b>{{ $laporan->nomor_tiket }}</b><br>{{ $laporan->judul }}")
                .openPopup();
        });
    </script>
</x-warga-layout>
