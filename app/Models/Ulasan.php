<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = 'ulasan';

    protected $fillable = [
        'pengguna_id',
        'nama',
        'foto_profil',
        'bintang',
        'komentar',
    ];

    /**
     * Get the user that owns the review.
     */
    public function pengguna()
    {
        return $this->belongsTo(User::class, 'pengguna_id');
    }

    /**
     * Get the resolved profile photo URL or base64 data.
     */
    public function getFotoProfilUrlAttribute()
    {
        if (!$this->foto_profil) {
            return null;
        }
        return str_starts_with($this->foto_profil, 'data:image') 
            ? $this->foto_profil 
            : '/' . ltrim($this->foto_profil, '/');
    }
}
