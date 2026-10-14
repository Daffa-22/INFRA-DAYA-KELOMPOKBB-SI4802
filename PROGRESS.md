# PROGRESS KERJA PROYEK INFRA-DAYA
**Sistem Pelaporan Kerusakan Infrastruktur Kota Bandung (SDG 9)**

Terakhir diperbarui: 2026-10-13 (Fase 5)

---

## Ringkasan Progres Fase

| Fase | Nama Fase | Status | Keterangan |
| :--- | :--- | :---: | :--- |
| **0** | **Setup Project, Breeze, Tailwind, Layout, Dusk** | **DONE** | Laravel 11, Tailwind Tokens, Layout Warga & Admin, Dusk terkonfigurasi |
| **1** | **Master Data Wilayah (Kecamatan & Kelurahan)** | **DONE** | CRUD Kecamatan & Kelurahan, API chained dropdown, 11/11 Dusk test PASS |
| **2** | **User & Role Management** | **DONE** | CRUD User, Aktivasi status akun, Avatar upload aman, Demo 4 Role seeder, 5/5 Dusk test PASS |
| **3** | **Master Kategori Infrastruktur** | **DONE** | CRUD Kategori + Bobot Prioritas (1-3), Seeder 4 Kategori default, 5/5 Dusk test PASS |
| **4** | **Pengajuan Laporan oleh Warga** | **DONE** | Form Leaflet.js Geotagging, Tiket Unik harian, Riwayat status log, IDOR Policy, 5/5 Dusk test PASS |
| **5** | **Verifikasi & Penilaian Prioritas (Admin)** | **DONE** | Antrean filter multi-param, Setujui+Prioritas, Tolak+Alasan, Riwayat Status log, 13/13 Feature Test PASS |
| **6** | **Disposisi Penugasan & Dokumen PDF** | **DONE** | Surat Perintah Tugas (SPT), DomPDF generator & stream/download, 13/13 Feature + 4/4 Dusk PASS |
| **7** | **Pelaksanaan Lapangan oleh Petugas** | **DONE** | Navigasi GPS (Gmaps & Waze), Bukti Foto Sesudah, Tutup Tugas, 13/13 Feature + 4/4 Dusk PASS |
| 8 | Tracking Timeline & Peta Publik | TODO | Pelacakan Nomor Tiket & Leaflet Sebaran Terbuka |
| 9 | Umpan Balik & Rating Warga | TODO | Bintang 1-5 & Ulasan Pasca Perbaikan |
| 10 | Dashboard Eksekutif & Monitoring SLA | TODO | Metrik SLA, Tren Laporan Chart.js, Heatmap |
| 11 | Rekapitulasi Data & Ekspor (Excel & PDF) | TODO | Filter Multi-Parameter, Ekspor Excel & PDF |
| 12 | Hardening, Optimasi & Pengujian Menyeluruh | TODO | Keamanan, Eager Loading, Rangkaian Dusk 100% |

---

## Rincian Item PBI per Fase

### Fase 0: Setup & Fondasi Sistem (STATUS: DONE)
- [x] Inisialisasi Git repository dan branch `fase-00-setup`.
- [x] Setup proyek Laravel 11 dengan PHP 8.2+ dan MariaDB/MySQL.
- [x] Setup Laravel Breeze (Blade stack), Tailwind CSS 3, Vite, Alpine.js.
- [x] Konfigurasi Token Warna Tailwind (`navy #1F3A5F`, `teal #0E7C86`, `amber #F2A93B`, `bg #EEF3F6`).
- [x] Blade Components reusable: `card`, `button`, `badge-status`, `modal-confirm`, `flash`, `form-input`, `empty-state`.
- [x] Layout dasar per role: `x-admin-layout` (sidebar responsif) & `x-warga-layout` (top navbar publik).
- [x] Konfigurasi `.env.example` & `.env` dev (`infradaya_dev`).
- [x] Konfigurasi Laravel Dusk dengan database terpisah `.env.dusk.local` (`infradaya_dusk`).
- [x] Pengujian Dusk awal (`tests/Browser/SetupTest.php`) lulus 100%.

### Fase 1: Master Data Wilayah (STATUS: DONE ✅)
- [x] Migration & Model `kecamatan` dan `kelurahan`.
- [x] Seeder wilayah dari `database/data/wilayah_kota_bandung.csv` (dengan fallback/TODO bila belum lengkap).
- [x] CRUD Kecamatan (List, Search, Tambah, Edit, Hapus dengan modal konfirmasi).
- [x] CRUD Kelurahan (List, Filter Kecamatan, Tambah, Edit, Hapus).
- [x] Endpoint AJAX chained dropdown `GET /api/wilayah/kecamatan/{id}/kelurahan`.
- [x] Pengujian Dusk E2E Wilayah — **11/11 PASS**.

### Fase 2: User & Role (STATUS: DONE ✅)
- [x] Migration kolom `users` (`role`, `phone`, `avatar`, `is_active`).
- [x] Middleware `EnsureUserRole` untuk routing group per role (`admin`, `petugas`, `pimpinan`, `warga`).
- [x] CRUD User (Admin): Tambah admin/petugas/pimpinan/warga, aktivasi/toggle status akun, edit data.
- [x] Unggah foto profil avatar aman (nama acak, mime spesifik JPG/JPEG/PNG).
- [x] Demo users seeder (1 admin, 2 petugas, 1 pimpinan, 3 warga).
- [x] Pengujian Dusk E2E User & Role (`UserTest.php`) — **5/5 PASS** (Total suite Dusk **19/19 PASS**).

### Fase 3: Master Kategori Infrastruktur (STATUS: DONE ✅)
- [x] Migration & Model `kategori_infrastruktur` (`bobot_prioritas` 1-3).
- [x] Seeder 4 kategori default (Jalan Raya, Drainase, PJU, Jembatan).
- [x] CRUD Kategori (Admin) dengan modal konfirmasi aman.
- [x] Pengujian Dusk E2E Kategori (`KategoriTest.php`) — **5/5 PASS** (Total Dusk **24/24 PASS**).

### Fase 4: Pengajuan Laporan Warga (STATUS: DONE ✅)
- [x] Migration & Model `laporan_kerusakan` dan `riwayat_status`.
- [x] Generator nomor tiket unik harian (`INFRA-YYYYMMDD-XXXX`).
- [x] Form pengajuan laporan: Dropdown berjenjang + Leaflet interactive picker (draggable marker) + upload foto sebelum (maks 5MB).
- [x] Validasi batas wilayah Kota Bandung (Latitude -7.05 s/d -6.80 & Longitude 107.50 s/d 107.80).
- [x] Fitur ubah & batalkan laporan selama status `menunggu_verifikasi`.
- [x] Proteksi otorisasi Policy (`LaporanPolicy`) pencegah IDOR.
- [x] Pengujian Dusk E2E Lapor Warga (`LaporanWargaTest.php`) — **5/5 PASS** (Total Dusk **29/29 PASS**).

### Fase 5: Verifikasi Admin DSDABM (STATUS: DONE ✅)
- [x] Antrean verifikasi laporan dengan filter: status, kategori, kecamatan, dan pencarian teks bebas.
- [x] Halaman detail laporan: peta Leaflet lokasi, foto bukti, riwayat status timeline.
- [x] Setujui laporan & tetapkan prioritas (`rendah`, `sedang`, `tinggi`) + catatan verifikator opsional.
- [x] Tolak laporan dengan modal input alasan wajib (min 10 karakter) + pencatatan `riwayat_status`.
- [x] Guard middleware `role:admin` pada semua route verifikasi.
- [x] Pengujian Feature E2E Verifikasi (`VerifikasiAdminTest.php`) — **13/13 PASS**.
- [x] **Audit & Hardening Keamanan (fix/audit-20261014):**
  - SEC-01 (Critical): Cegah login akun nonaktif & terminasi sesi aktif di middleware.
  - SEC-02 (High): Cegah spoofing ekstensi upload via `guessExtension()` server MIME.
  - SEC-03 (High): Rate limiting registrasi (5 req/min) & lapor warga (10 req/min).
  - SEC-04 (High): Sanitasi XSS & quote break pada marker popup Leaflet.
  - SEC-05 (Medium): Cegah self-lockout admin saat kelola user.
  - SLP-01 (Medium): Hapus request class tidak terpakai & bersihkan dead imports.
  - SLP-02 (Low): Formatter PSR Laravel Pint lulus tanpa peringatan.
  - Total test suite Feature/Unit: **47/47 PASS** (125 assertions).

### Fase 6: Disposisi Penugasan & Surat Tugas PDF (STATUS: DONE ✅)
- [x] Migration & Model `disposisi_penugasan` (nomor surat tugas otomatis `SPT-YYYYMMDD-XXXX`, status penugasan, instruksi kerja).
- [x] Service class `DisposisiService` terisolasi untuk transaksi penugasan dan riwayat status audit.
- [x] Form disposisi admin: Pilih petugas aktif, instruksi teknis, tenggat waktu, dengan pre-select laporan disetujui.
- [x] Cetak Surat Perintah Tugas (SPT) format PDF via `barryvdh/laravel-dompdf` (stream & attachment download).
- [x] Pengujian Feature (`tests/Feature/DisposisiAdminTest.php`) — **13/13 PASS**.
- [x] Pengujian Dusk E2E Disposisi (`tests/Browser/DisposisiTest.php`) — **4/4 PASS** (Total suite Dusk **33/33 PASS 100%**).

### Fase 7: Pengerjaan Petugas Lapangan (STATUS: DONE ✅)
- [x] Migration kolom penyelesaian (`foto_bukti_sesudah`, `catatan_perbaikan`, `selesai_at` & `tanggal_selesai`).
- [x] Service class `PetugasService` dengan proteksi IDOR, validasi alur status pengerjaan, dan pencatatan riwayat audit.
- [x] Dashboard mobile-first petugas (`/petugas/tugas`): Daftar tugas aktif, kartu metrik, pencarian, dan filter tab status.
- [x] Lembar kerja detail (`/petugas/tugas/{id}`): Peta Leaflet interaktif, tombol navigasi GPS langsung (Google Maps & Waze).
- [x] Aksi mulai pengerjaan (`POST /petugas/tugas/{id}/mulai`) -> status `sedang_dikerjakan` & audit log.
- [x] Form penyelesaian (`POST /petugas/tugas/{id}/selesai`): Unggah foto sesudah aman (server MIME) + catatan teknis.
- [x] Penutupan tugas -> status laporan & penugasan menjadi `selesai` serta audit log.
- [x] Pengujian Feature (`tests/Feature/PetugasLapanganTest.php`) — **13/13 PASS**.
- [x] Pengujian Dusk E2E Petugas (`tests/Browser/PetugasTest.php`) — **4/4 PASS** (Total Dusk suite **37/37 PASS 100%**).

### Fase 8: Tracking Timeline & Peta Publik (STATUS: DONE ✅)
- [x] Halaman publik lacak nomor tiket tanpa login (`/lacak-tiket/{nomor_tiket?}`).
- [x] Visual timeline audit interaktif & perbandingan foto sebelum vs sesudah (Before / After card) lengkap dengan catatan perbaikan, peta statis titik laporan, dan info SPT petugas.
- [x] Peta publik sebaran Leaflet interaktif (`/peta-publik`) dengan 4 kartu metrik, filter kategori, status, kecamatan, pencarian kata kunci, dan marker API endpoint (`/api/peta-publik/markers`).
- [x] Pengujian Feature (`tests/Feature/PublikTrackingAndPetaTest.php`) — **12/12 PASS** (Total Feature test suite **85/85 PASS 100%**).
- [x] Pengujian Dusk E2E Tracking & Peta (`tests/Browser/TrackingPetaPublikTest.php`) — **3/3 PASS** (Total Dusk test suite **40/40 PASS 100%**).

### Fase 9: Umpan Balik & Evaluasi Warga (STATUS: DONE ✅)
- [x] Migration & Model `umpan_balik` (rating 1-5 bintang, komentar, kecepatan penanganan, kualitas fisik, unique constraint 1 laporan 1 rating).
- [x] Service class `UmpanBalikService` dengan otorisasi kepemilikan pelapor, validasi status `selesai`, dan pencatatan audit log `riwayat_status`.
- [x] Form rating bintang interaktif & kartu ulasan pasca perbaikan pada halaman detail laporan warga (`/warga/laporan/{id}`).
- [x] Integrasi ringkasan rating kepuasan warga pelapor pada halaman pelacakan tiket publik (`/lacak-tiket`).
- [x] Pengujian Feature (`tests/Feature/UmpanBalikTest.php`) — **6/6 PASS** (Total Feature test suite **91/91 PASS 100%**).
- [x] Pengujian Dusk E2E Umpan Balik (`tests/Browser/UmpanBalikTest.php`) — **2/2 PASS** (Total Dusk test suite **42/42 PASS 100%**).

### Fase 10: Dashboard Eksekutif & SLA (STATUS: TODO)
- [ ] Perhitungan metrik SLA via Service Class.
- [ ] Grafik tren & statistik Chart.js per kecamatan & kategori.
- [ ] Peta/Heatmap sebaran kepadatan kerusakan untuk pimpinan.
- [ ] Pengujian Dusk E2E Dashboard.

### Fase 11: Rekapitulasi Data & Ekspor (STATUS: TODO)
- [ ] Filter laporan multi-kriteria (tanggal, kecamatan, kategori, status).
- [ ] Ekspor Excel (`maatwebsite/excel`).
- [ ] Ekspor Laporan Resmi PDF (`barryvdh/laravel-dompdf`).
- [ ] Pengujian Dusk E2E Ekspor.

### Fase 12: Hardening & Finalisasi (STATUS: TODO)
- [ ] Audit keamanan (CSRF, Rate Limiting, MIME sanitize, Policy audit).
- [ ] Optimasi query (Eager loading, index composite).
- [ ] Halaman error ramah pengguna (403, 404, 500).
- [ ] Dokumentasi lengkap `README.md`.
- [ ] Seluruh rangkaian Dusk test 100% lulus & merge ke `main`.
