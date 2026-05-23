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
}
