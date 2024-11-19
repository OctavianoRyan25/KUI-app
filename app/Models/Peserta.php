<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip', 'name', 'division', 'position', 'email', 'study_program', 'phone_number', 'faculty', 'information'
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_peserta')->withPivot('signature', 'is_present')->withTimestamps();
    }
}
