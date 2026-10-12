<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VerifikasiLaporanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'aksi'             => ['required', 'in:setujui,tolak'],
            'prioritas'        => ['required_if:aksi,setujui', 'nullable', 'in:rendah,sedang,tinggi'],
            'catatan'          => ['nullable', 'string', 'max:1000'],
            'alasan_penolakan' => ['required_if:aksi,tolak', 'nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'aksi.required'                => 'Tindakan verifikasi harus dipilih.',
            'aksi.in'                      => 'Pilihan tindakan verifikasi tidak valid.',
            'prioritas.required_if'        => 'Tingkat prioritas wajib ditentukan saat menyetujui laporan.',
            'prioritas.in'                 => 'Pilihan tingkat prioritas tidak valid.',
            'alasan_penolakan.required_if' => 'Alasan penolakan wajib diisi jika laporan ditolak.',
            'alasan_penolakan.max'         => 'Alasan penolakan maksimal 1000 karakter.',
        ];
    }
}
