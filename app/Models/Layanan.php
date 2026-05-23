<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';

    protected $fillable = [
        'nama_layanan',
        'nama_paket',
        'badge',
        'deskripsi',
        'harga',
        'fitur_list',
        'ikon',
        'warna_aksen',
        'urutan',
        'is_active',
    ];

    protected $casts = [
        'fitur_list' => 'array',
        'harga' => 'float',
        'is_active' => 'boolean',
    ];
}
