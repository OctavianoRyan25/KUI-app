<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MitraKontak extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function mitra(): BelongsTo
    {
        return $this->belongsTo(Mitra::class);
    }
}
