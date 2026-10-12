<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LaporanKerusakan extends Model
{
    use HasFactory;

    protected $table = 'laporan_kerusakan';

    protected $fillable = [
        'nomor_tiket',
        'warga_id',
        'kelurahan_id',
        'kategori_id',
        'judul',
        'deskripsi_kondisi',
        'latitude',
        'longitude',
        'foto_bukti_sebelum',
        'status',
        'prioritas',
        'alasan_penolakan',
    ];

    protected function casts(): array
    {
        return [
            'latitude' => 'float',
            'longitude' => 'float',
        ];
    }

    public function warga(): BelongsTo
    {
        return $this->belongsTo(User::class, 'warga_id');
    }

    public function kelurahan(): BelongsTo
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriInfrastruktur::class, 'kategori_id');
    }

    public function riwayatStatus(): HasMany
    {
        return $this->hasMany(RiwayatStatus::class, 'laporan_id')->orderBy('created_at', 'desc');
    }

    /**
     * Cek apakah laporan masih dapat diubah atau dibatalkan oleh warga.
     */
    public function canBeModifiedByWarga(): bool
    {
        return $this->status === 'menunggu_verifikasi';
    }
}
