<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryOfMou extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function mous()
    {
        return $this->belongsToMany(MoU::class, 'mou_category', 'mou_id', 'category_of_mou_id')->withTimestamps();
    }
}
