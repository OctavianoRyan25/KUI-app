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
}
