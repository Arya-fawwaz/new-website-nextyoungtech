<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $table = 'pertanyaan';

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'subjek',
        'pesan',
        'status',
    ];
}
