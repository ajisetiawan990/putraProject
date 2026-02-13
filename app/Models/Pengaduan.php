<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    // Sesuaikan nama tabel
    protected $table = 'tb_pengaduans';
    protected $primaryKey = 'id_pengaduan';

    protected $fillable = [
        'tgl_pengaduan',
        'id_user',
        'isi_laporan',
        'status'
    ];

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'id_user');
    }

    public function tanggapans()
    {
        // Tambahkan nama tabel yang benar di relasi
        return $this->hasMany(Tanggapan::class, 'id_pengaduan');
    }
}
