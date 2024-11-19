<?php

namespace App\Imports;

use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\ToModel;

class PesertaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Peserta([
            'nip' => $row[0],
            'name' => $row[1],
            'division' => $row[2],
            'position' => $row[3],
            'email' => $row[4],
            'study_program' => $row[5],
            'phone_number' => $row[6],
            'faculty' => $row[7],
            'information' => $row[8]
        ]);
    }
}
