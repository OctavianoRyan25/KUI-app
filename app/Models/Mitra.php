<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mitra extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function mitra_kontaks(): HasMany
    {
        return $this->hasMany(MitraKontak::class);
    }

    public function scopeSearch($query, array $searches)
    {
        $query->when($searches['search'] ?? false, function ($query, $search) {
            return $query->where('nama_mitra', 'like', '%' . $search . '%');
        });
    }
}
