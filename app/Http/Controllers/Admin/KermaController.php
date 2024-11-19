<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kerma;
use Illuminate\Http\Request;

class KermaController extends Controller
{
    public function getByTridharma(Request $request)
    {
        $tridharma = $request->input('alias');
        if (!$tridharma) {
            return response()->json([
                'error' => 'Alias tridharma tidak boleh kosong'
            ], 400);
        }
        $kerma = Kerma::where('tridharma_alias', $tridharma)->get();

        if($kerma->isEmpty()) {
            return response()->json([
                'error' => 'Data kerma tidak ditemukan'
            ], 404);
        }
        return response()->json($kerma);
    }
}
