<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Http\Requests\StorePesertaRequest;
use App\Http\Requests\UpdatePesertaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

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
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required',
            'name' => 'required',
            'bag' => 'required',
            'subbag' => 'required',
            'position' => 'required',
        ]);

        try {
            DB::beginTransaction();
            Peserta::create($validatedData);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Peserta berhasil ditambahkan',
            ], 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menambahkan peserta',
            ], 500);
        }
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
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $peserta = Peserta::find($id);
            if(!$peserta){
                Alert::toast('Peserta not found', 'error');
                return redirect()->route('admin.peserta');
            }
            $peserta->delete();
            DB::commit();
            Alert::toast('Peserta deleted successfully', 'success');
            // Redirect with query string
            
            return redirect()->to(url()->previous());
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::toast('Error deleting peserta', 'error');
            return redirect()->route('admin.peserta');
        }
    }
}