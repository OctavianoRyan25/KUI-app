<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Http\Requests\StorePesertaRequest;
use App\Http\Requests\UpdatePesertaRequest;
use App\Imports\PesertaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
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
        $search = request('search');
        $pesertas = Peserta::search($search)
            ->paginate(10)
            ->appends(['search' => $search]);

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
            'division' => 'nullable',
            'position' => 'nullable',
            'email' => 'nullable|email',
            'study_program' => 'nullable',
            'phone_number' => 'nullable',
            'faculty' => 'nullable',
            'information' => 'nullable',
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
    public function edit(Request $request) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePesertaRequest $request)
    {
        $validate = $request->validate([
            'id' => 'required|exists:pesertas,id',
            'nip' => 'required',
            'name' => 'required',
            'division' => 'nullable',
            'position' => 'nullable',
            'email' => 'nullable|email',
            'study_program' => 'nullable',
            'phone_number' => 'nullable',
            'faculty' => 'nullable',
            'information' => 'nullable',
        ]);

        try {
            DB::beginTransaction();
            $peserta = Peserta::find($validate['id']);
            if (!$peserta) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Peserta not found',
                ], 404);
            }
            $peserta->update($validate);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Peserta berhasil diubah',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengubah peserta',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $peserta = Peserta::find($id);
            if (!$peserta) {
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

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new PesertaImport, $request->file('file'));
            Alert::toast('Data imported successfully', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Alert::toast('Error importing data' . $e->getMessage(), 'error');
            return redirect()->back();
        }
    }
}
