<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['nama', 'email', 'kata_sandi', 'foto_profil', 'is_admin', 'google_id', 'google_token'])]
#[Hidden(['kata_sandi', 'token_pengingat'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'pengguna';

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'kata_sandi' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthPasswordName()
    {
        return 'kata_sandi';
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->kata_sandi;
    }

    /**
     * Get the column name for the remember me token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'token_pengingat';
    }

    /**
     * Get the ulasan (review) associated with the user.
     */
    public function ulasan()
    {
        return $this->hasOne(Ulasan::class, 'pengguna_id');
    }
}
