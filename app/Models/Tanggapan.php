<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    // Sesuaikan nama tabel
    protected $table = 'tb_tanggapans';

    protected $fillable = [
        'id_pengaduan',
        'id_user',
        'tgl_tanggapan',
        'tanggapan'
    ];

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'id_pengaduan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
