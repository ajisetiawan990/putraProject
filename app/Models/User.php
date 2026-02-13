<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relasi pengaduan (masyarakat)
    public function pengaduans()
    {
        return $this->hasMany(Pengaduan::class, 'id_user', 'id');
    }

    // Relasi tanggapan (petugas)
    public function tanggapans()
    {
        return $this->hasMany(Tanggapan::class, 'id_user', 'id');
    }

    // Helper role check
    public function isMasyarakat() { return $this->role === 'masyarakat'; }
    public function isPetugas()    { return $this->role === 'petugas'; }
    public function isAdmin()      { return $this->role === 'admin'; }
}
