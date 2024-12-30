<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisMitra;
use App\Models\Mitra;
use App\Models\MitraKontak;
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
        $mitras = Mitra::orderBy('created_at', 'ASC')->search(request(['search']))->get();
        $jenisMitras = JenisMitra::all();

        return view('admin.mitra', [
            'mitras' => $mitras,
            'jenisMitras' => $jenisMitras,
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
        $jenisMitras = JenisMitra::all();

        return view('admin.create_mitra', [
            'kriterias' => $kriterias,
            'tingkats' => $tingkats,
            'jenisMitras' => $jenisMitras,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // ! mitra validation start
            'nama_mitra' => 'required',
            'kriteria_mitra' => 'required',
            'tingkat' => 'required',
            'regional' => 'nullable|required_if:tingkat,Dalam negeri (nasional)',
            'kota' => 'nullable|required_if:tingkat,Dalam negeri (regional),Dalam negeri (nasional)',
            'negara' => 'nullable|required_if:tingkat,Luar negeri',
            'jenis_mitra' => 'nullable',
            'logo_mitra' => 'nullable|image',
            // ! mitra validation end
            // ! mitra kontaks validation start
            'mitra_kontaks' => 'nullable|array',
            'mitra_kontaks.*.nama' => 'nullable|string',
            'mitra_kontaks.*.email' => 'nullable|email',
            'mitra_kontaks.*.nomor_hp' => 'nullable|string',
            'mitra_kontaks.*.nomor_telepon' => 'nullable|string',
            'mitra_kontaks.*.jabatan' => 'nullable|string',
            'mitra_kontaks.*.alamat' => 'nullable|string',
            // ! mitra kontaks validation end
        ]);

        if ($validatedData['tingkat'] == 'Dalam negeri (regional)') $validatedData['regional'] = 'Jawa Tengah';
        if ($request->file('logo_mitra')) {
            $validatedData['logo_mitra'] = $request->file('logo_mitra')->store('public/logo-mitra');
            $validatedData['logo_mitra'] = str_replace('public/', '', $validatedData['logo_mitra']);
        }

        $mitra = Mitra::create($validatedData);

        if ($request->has('mitra_kontaks')) {
            $filteredKontaks = array_filter($validatedData['mitra_kontaks'], function ($kontak) {
                return array_filter($kontak);
            });

            foreach ($filteredKontaks as $kontak) {
                $kontak['mitra_id'] = $mitra->id;

                MitraKontak::create($kontak);
            }
        }

        return redirect(route('admin.mitra.index'))->with('success', 'Data mitra baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mitra = Mitra::with('mitra_kontaks', 'mous')->findOrFail($id);
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
        $mitra = Mitra::with('mitra_kontaks')->findOrFail($id);
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
        $jenisMitras = JenisMitra::all();

        return view('admin.edit_mitra', [
            'mitra' => $mitra,
            'kriterias' => $kriterias,
            'tingkats' => $tingkats,
            'jenisMitras' => $jenisMitras,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            // ! mitra validation start
            'nama_mitra' => 'required',
            'kriteria_mitra' => 'required',
            'tingkat' => 'required',
            'regional' => 'nullable|required_if:tingkat,Dalam negeri (nasional)',
            'kota' => 'nullable|required_if:tingkat,Dalam negeri (regional),Dalam negeri (nasional)',
            'negara' => 'nullable|required_if:tingkat,Luar negeri',
            'jenis_mitra' => 'nullable',
            'logo_mitra' => 'nullable|image',
            // ! mitra validation end
            // ! mitra kontaks validation start
            'mitra_kontaks' => 'nullable|array',
            'mitra_kontaks.*.nama' => 'nullable|string',
            'mitra_kontaks.*.email' => 'nullable|email',
            'mitra_kontaks.*.nomor_hp' => 'nullable|string',
            'mitra_kontaks.*.nomor_telepon' => 'nullable|string',
            'mitra_kontaks.*.jabatan' => 'nullable|string',
            'mitra_kontaks.*.alamat' => 'nullable|string',
            // ! mitra kontaks validation end
        ]);

        if ($validatedData['tingkat'] == 'Dalam negeri (regional)') $validatedData['regional'] = 'Jawa Tengah';
        if ($request->file('logo_mitra')) {
            if ($request->old_logo_mitra) {
                Storage::delete('public/' . $request->old_logo_mitra);
            }

            $validatedData['logo_mitra'] = $request->file('logo_mitra')->store('public/logo-mitra');
            $validatedData['logo_mitra'] = str_replace('public/', '', $validatedData['logo_mitra']);
        }

        $mitra = Mitra::findOrFail($id);
        $mitra->update($validatedData);

        if ($request->has('mitra_kontaks')) {
            $filteredKontaks = array_filter($validatedData['mitra_kontaks'], function ($kontak) {
                return array_filter($kontak);
            });

            $mitra->mitra_kontaks()->delete();

            foreach ($filteredKontaks as $kontak) {
                $mitra->mitra_kontaks()->create($kontak);
            }
        }

        return redirect(route('admin.mitra.index'))->with('success', 'Data mitra berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mitra = Mitra::findOrFail($id);

        if ($mitra->logo_mitra) {
            Storage::delete('public/' . $mitra->logo_mitra);
        }

        Mitra::destroy($mitra->id);
        return redirect(route('admin.mitra.index'))->with('success', 'Data mitra berhasil dihapus.');
    }
}
