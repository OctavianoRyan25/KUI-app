<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerma extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tridharma',
        'tridharma_alias'
    ];
}
