<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mitra;
use App\Models\MoU;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class MoUController extends Controller
{
    public function index()
    {
        $mous = MoU::with('mitra')->paginate(10);
        return view('admin.mou', compact('mous'));
    }

    public function searchMitra(Request $request)
    {
        $mitras = Mitra::where('nama_mitra', 'like', '%' . $request->search . '%')->get();
        return response()->json($mitras);
    }

    public function create()
    {
        $mitras = Mitra::all();
        return view('admin.create_mou', compact('mitras'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'mitra_id' => 'required|exists:mitras,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'document_number' => 'required',
            'document_name' => 'required',
            'length_of_contract' => 'required',
            'type_of_contract' => 'required|array',
            'contract_value' => 'required|numeric',
            'description' => 'nullable|string',
            'MoU_path' => 'required|file|mimes:pdf|max:2048',
        ]);
        try {
            if ($request->hasFile('MoU_path')) {
                $file = $request->file('MoU_path');
                $filePath = $file->store('MoU', 'public');
                $validated['MoU_path'] = $filePath;
            }
            $validated['type_of_contract'] = implode(',', $validated['type_of_contract']);
            MoU::create($validated);
            Alert::toast('MoU created successfully', 'success');
            return redirect()->route('admin.mou.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Alert::toast($e->getMessage(), 'error');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $mou = MoU::with('mitra')->findOrFail($id);
        return view('admin.detail_mou', compact('mou'));
    }

    public function edit($id)
    {
        $mou = MoU::findOrFail($id);
        $mitras = Mitra::all();
        return view('admin.edit_mou', compact('mou', 'mitras'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'mitra_id' => 'required|exists:mitras,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'document_number' => 'required',
            'document_name' => 'required',
            'length_of_contract' => 'required',
            'type_of_contract' => 'required|array',
            'contract_value' => 'required|numeric',
            'description' => 'nullable|string',
            'MoU_path' => 'nullable|file|mimes:pdf|max:2048',
        ]);
        try {
            $mou = MoU::findOrFail($id);
            if ($request->hasFile('MoU_path')) {
                $file = $request->file('MoU_path');
                $filePath = $file->store('MoU', 'public');
                $validated['MoU_path'] = $filePath;
            }
            $validated['type_of_contract'] = implode(',', $validated['type_of_contract']);
            $mou->update($validated);
            Alert::toast('MoU updated successfully', 'success');
            return redirect()->route('admin.mou.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Alert::toast($e->getMessage(), 'error');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $mou = MoU::findOrFail($id);
            $mou->delete();
            Alert::toast('MoU deleted successfully', 'success');
            return redirect()->route('admin.mou.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Alert::toast($e->getMessage(), 'error');
            return redirect()->back();
        }
    }
}
