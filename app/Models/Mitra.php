<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function mous(): HasMany
    {
        return $this->hasMany(MoU::class);
    }

    public function scopeSearch($query, array $searches)
    {
        $query->when($searches['search'] ?? false, function ($query, $search) {
            return $query->where('nama_mitra', 'like', '%' . $search . '%');
        });
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(isset($filters['filter']) && in_array($filters['filter'], ['Dalam negeri (regional)', 'Dalam negeri (nasional)', 'Luar negeri']), function ($query) use ($filters) {
            return $query->where('tingkat', $filters['filter']);
        });

        $query->when(isset($filters['filter']) && $filters['filter'] === 'latest', function ($query) {
            return $query->orderBy('created_at', 'DESC');
        });

        $query->when(isset($filters['filter']) && $filters['filter'] === 'oldest', function ($query) {
            return $query->orderBy('created_at', 'ASC');
        });

        $query->when(isset($filters['filter']) && $filters['filter'] === 'alphabet', function ($query) {
            return $query->orderBy('nama_mitra', 'ASC');
        });

        if (!isset($filters['filter'])) {
            $query->orderBy('created_at', 'ASC');
        }

        return $query;
    }
}
