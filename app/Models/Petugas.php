<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Petugas extends User
{
    protected static function booted()
    {
        static::addGlobalScope('petugas', function (Builder $builder) {
            $builder->where('role', 'petugas');
        });

        static::creating(function ($user) {
            $user->role = 'petugas';
        });
    }

    public function tanggapans()
    {
        return $this->hasMany(Tanggapan::class, 'id_user', 'id');
    }
}
