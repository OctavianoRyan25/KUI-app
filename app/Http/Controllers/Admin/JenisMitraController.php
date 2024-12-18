<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisMitra;
use Illuminate\Http\Request;

class JenisMitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenis_mitra' => 'required',
            'induk' => 'nullable',
        ]);

        JenisMitra::create($validatedData);
        return redirect(route('admin.mitra.index'))->with('success', 'Data jenis mitra baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenisMitra = JenisMitra::findOrFail($id);

        JenisMitra::destroy($jenisMitra->id);
        return redirect(route('admin.mitra.index'))->with('success', 'Data jenis mitra berhasil dihapus.');
    }
}
