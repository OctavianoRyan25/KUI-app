<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'mitra',
        'kerma',
        'file1',
        'file2',
        'file3',
    ];
}
