<?php

namespace App\Services;

use App\Models\LaporanKerusakan;
use App\Models\RiwayatStatus;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LaporanService
{
    /**
     * Generate format nomor tiket unik: INFRA-YYYYMMDD-XXXX
     */
    public function generateNomorTiket(): string
    {
        $datePrefix = Carbon::now()->format('Ymd');
        $prefix = "INFRA-{$datePrefix}-";

        return DB::transaction(function () use ($prefix) {
            $lastTicket = LaporanKerusakan::where('nomor_tiket', 'like', "{$prefix}%")
                ->lockForUpdate()
                ->orderBy('nomor_tiket', 'desc')
                ->value('nomor_tiket');

            if ($lastTicket) {
                $lastNumber = (int) substr($lastTicket, -4);
                $newNumber = str_pad((string) ($lastNumber + 1), 4, '0', STR_PAD_LEFT);
            } else {
                $newNumber = '0001';
            }

            return "{$prefix}{$newNumber}";
        });
    }

    /**
     * Mengambil daftar laporan yang diajukan oleh seorang warga.
     */
    public function getPaginatedLaporanWarga(int $wargaId, ?string $status = null, int $perPage = 10): LengthAwarePaginator
    {
        return LaporanKerusakan::with(['kelurahan.kecamatan', 'kategori'])
            ->where('warga_id', $wargaId)
            ->when($status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage)
            ->withQueryString();
    }

    public function createLaporan(int $wargaId, array $data, UploadedFile $foto): LaporanKerusakan
    {
        return DB::transaction(function () use ($wargaId, $data, $foto) {
            $filename = Str::random(40).'.'.$foto->getClientOriginalExtension();
            $path = $foto->storeAs('laporan/sebelum', $filename, 'public');

            $laporan = LaporanKerusakan::create([
                'nomor_tiket' => $this->generateNomorTiket(),
                'warga_id' => $wargaId,
                'kelurahan_id' => $data['kelurahan_id'],
                'kategori_id' => $data['kategori_id'],
                'judul' => $data['judul'],
                'deskripsi_kondisi' => $data['deskripsi_kondisi'],
                'latitude' => $data['latitude'],
                'longitude' => $data['longitude'],
                'foto_bukti_sebelum' => $path,
                'status' => 'menunggu_verifikasi',
                'prioritas' => 'sedang',
            ]);

            RiwayatStatus::create([
                'laporan_id' => $laporan->id,
                'user_id' => $wargaId,
                'status' => 'menunggu_verifikasi',
                'keterangan' => 'Laporan kerusakan berhasil diajukan oleh pelapor.',
            ]);

            return $laporan;
        });
    }

    public function updateLaporan(LaporanKerusakan $laporan, array $data, ?UploadedFile $foto = null): LaporanKerusakan
    {
        return DB::transaction(function () use ($laporan, $data, $foto) {
            if ($foto) {
                if ($laporan->foto_bukti_sebelum) {
                    Storage::disk('public')->delete($laporan->foto_bukti_sebelum);
                }
                $filename = Str::random(40).'.'.$foto->getClientOriginalExtension();
                $data['foto_bukti_sebelum'] = $foto->storeAs('laporan/sebelum', $filename, 'public');
            }

            $laporan->update([
                'kelurahan_id' => $data['kelurahan_id'],
                'kategori_id' => $data['kategori_id'],
                'judul' => $data['judul'],
                'deskripsi_kondisi' => $data['deskripsi_kondisi'],
                'latitude' => $data['latitude'],
                'longitude' => $data['longitude'],
                'foto_bukti_sebelum' => $data['foto_bukti_sebelum'] ?? $laporan->foto_bukti_sebelum,
            ]);

            RiwayatStatus::create([
                'laporan_id' => $laporan->id,
                'user_id' => $laporan->warga_id,
                'status' => $laporan->status,
                'keterangan' => 'Data laporan dan titik koordinat diperbarui oleh pelapor.',
            ]);

            return $laporan;
        });
    }

    public function deleteLaporan(LaporanKerusakan $laporan): bool
    {
        return DB::transaction(function () use ($laporan) {
            if ($laporan->foto_bukti_sebelum) {
                Storage::disk('public')->delete($laporan->foto_bukti_sebelum);
            }

            return $laporan->delete();
        });
    }
}
