<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventPeserta extends Model
{
    use HasFactory;

    protected $table = 'event_peserta';
    protected $guarded = [
        'id'
    ];

    public function events(): BelongsTo
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function pesertas(): BelongsTo
    {
        return $this->belongsTo(Peserta::class, 'peserta_id');
    }
}
