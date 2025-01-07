<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoU extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'document_number',
        'document_name',
        'length_of_contract',
        'type_of_contract',
        'mitra_id',
        'contract_value',
        'description',
        'MoU_path'
    ];

    protected $table = 'mous';

    protected $casts = [
        'type_of_contract' => 'array',
    ];

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }

    public function scopeSearch($query, array $searches)
    {
        $query->when($searches['search'] ?? false, function ($query, $search) {
            return $query->where('document_name', 'like', '%' . $search . '%');
        });
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(isset($filters['filter']) && $filters['filter'] === 'active', function ($query) {
            return $query->where('end_date', '>', now());
        });

        $query->when(isset($filters['filter']) && $filters['filter'] === 'expired', function ($query) {
            return $query->where('end_date', '<', now());
        });

        $query->when(isset($filters['filter']) && $filters['filter'] === 'latest', function ($query) {
            return $query->orderBy('created_at', 'desc');
        });

        $query->when(isset($filters['filter']) && $filters['filter'] === 'oldest', function ($query) {
            return $query->orderBy('created_at', 'asc');
        });

        if (!isset($filters['filter'])) {
            $query->orderBy('created_at', 'desc');
        }

        return $query;
        // dd($query->toSql());
    }
}
