<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name' ,'nomor_rapat', 'responsible', 'hal', 'kepada', 'tanggal_rapat', 'tempat_rapat', 'jam_rapat', 'uuid'
    ];

    public function pesertas()
    {
        return $this->belongsToMany(Peserta::class, 'event_peserta')->withPivot('signature', 'is_present')->withTimestamps();
    }

    // Find Event by UUID
    public static function getEventByUUID($uuid)
    {
        return self::where('uuid', $uuid)->firstOrFail();
    }
}
