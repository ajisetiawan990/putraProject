<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Masyarakat extends User
{
    protected static function booted()
    {
        static::addGlobalScope('masyarakat', function (Builder $builder) {
            $builder->where('role', 'masyarakat');
        });

        static::creating(function ($user) {
            $user->role = 'masyarakat';
        });
    }

    public function pengaduans()
    {
        return $this->hasMany(Pengaduan::class, 'id_user', 'id');
    }
}
