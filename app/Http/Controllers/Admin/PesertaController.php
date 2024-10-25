<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Http\Requests\StorePesertaRequest;
use App\Http\Requests\UpdatePesertaRequest;
use Illuminate\Http\Request;

class PesertaController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function searchPeserta(Request $request)
    {
        $search = $request->get('query');
        $pesertas = Peserta::where('name', 'like', '%' . $search . '%')
                            ->get(['id', 'name', 'position']);
        return response()->json($pesertas);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesertas = Peserta::paginate(10);
        return view('admin.peserta', compact('pesertas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePesertaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Peserta $peserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peserta $peserta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePesertaRequest $request, Peserta $peserta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peserta $peserta)
    {
        //
    }
}
