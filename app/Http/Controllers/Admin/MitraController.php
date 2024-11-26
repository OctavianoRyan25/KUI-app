<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mitras = Mitra::all();

        return view('admin.mitra', [
            'mitras' => $mitras,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kriterias = [
            'Kriteria pertama',
            'Kriteria kedua',
            'Kriteria ketiga',
            'Kriteria keempat',
            'Kriteria kelima',
        ];
        $tingkats = [
            'Dalam negeri (regional)',
            'Dalam negeri (nasional)',
            'Luar negeri',
        ];

        return view('admin.create_mitra', [
            'kriterias' => $kriterias,
            'tingkats' => $tingkats,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_mitra' => 'required',
            'kriteria_mitra' => 'required',
            'tingkat' => 'required',
            'regional' => 'nullable|required_if:tingkat,Dalam negeri (nasional)',
            'kota' => 'nullable|required_if:tingkat,Dalam negeri (regional),Dalam negeri (nasional)',
            'negara' => 'nullable|required_if:tingkat,Luar negeri',
            'logo_mitra' => 'nullable|image',
        ]);

        if ($validatedData['tingkat'] == 'Dalam negeri (regional)') $validatedData['regional'] = 'Jawa Tengah';
        if ($request->file('logo_mitra')) $validatedData['logo_mitra'] = $request->file('logo_mitra')->store('logo-mitra');

        Mitra::create($validatedData);
        return redirect(route('admin.mitra.index'))->with('success', 'Data mitra baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mitra = Mitra::findOrFail($id);
        $kriterias = [
            'Kriteria pertama',
            'Kriteria kedua',
            'Kriteria ketiga',
            'Kriteria keempat',
            'Kriteria kelima',
        ];
        $tingkats = [
            'Dalam negeri (regional)',
            'Dalam negeri (nasional)',
            'Luar negeri',
        ];

        return view('admin.detail_mitra', [
            'mitra' => $mitra,
            'kriterias' => $kriterias,
            'tingkats' => $tingkats,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mitra = Mitra::findOrFail($id);
        $kriterias = [
            'Kriteria pertama',
            'Kriteria kedua',
            'Kriteria ketiga',
            'Kriteria keempat',
            'Kriteria kelima',
        ];
        $tingkats = [
            'Dalam negeri (regional)',
            'Dalam negeri (nasional)',
            'Luar negeri',
        ];

        return view('admin.edit_mitra', [
            'mitra' => $mitra,
            'kriterias' => $kriterias,
            'tingkats' => $tingkats,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama_mitra' => 'required',
            'kriteria_mitra' => 'required',
            'tingkat' => 'required',
            'regional' => 'nullable|required_if:tingkat,Dalam negeri (nasional)',
            'kota' => 'nullable|required_if:tingkat,Dalam negeri (regional),Dalam negeri (nasional)',
            'negara' => 'nullable|required_if:tingkat,Luar negeri',
            'logo_mitra' => 'nullable|image',
        ]);

        if ($validatedData['tingkat'] == 'Dalam negeri (regional)') $validatedData['regional'] = 'Jawa Tengah';
        if ($request->file('logo_mitra')) {
            if ($request->old_logo_mitra) {
                Storage::delete($request->old_logo_mitra);
            }

            $validatedData['logo_mitra'] = $request->file('logo_mitra')->store('logo-mitra');
        }

        Mitra::findOrFail($id)->update($validatedData);
        return redirect(route('admin.mitra.index'))->with('success', 'Data mitra berhasil di-update.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mitra = Mitra::findOrFail($id);

        if ($mitra->logo_mitra) {
            Storage::delete($mitra->logo_mitra);
        }

        Mitra::destroy($mitra->id);
        return redirect(route('admin.mitra.index'))->with('success', 'Data mitra berhasil dihapus.');
    }
}
