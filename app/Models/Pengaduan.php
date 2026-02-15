<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    // Sesuaikan nama tabel
    protected $table = 'tb_pengaduans';

    protected $fillable = [
        'tgl_pengaduan',
        'id_user',
        'isi_laporan',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function tanggapans()
    {
        // Tambahkan nama tabel yang benar di relasi
        return $this->hasOne(Tanggapan::class, 'id_pengaduan'); // Klo pakai hasMany diakan banyak jadi harus pakai count agar tidak error
    }
}
