<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationRequest extends Model
{
    protected $table = 'permintaan_penawaran';

    protected $fillable = [
        'nama_klien',
        'email_klien',
        'telepon_klien',
        'tipe_proyek',
        'fitur',
        'estimasi_harga',
        'catatan',
        'status',
        'nama_proyek',
        'warna_utama',
        'target_pengguna',
        'deskripsi_proyek',
    ];

    protected $casts = [
        'fitur' => 'array',
    ];
}
