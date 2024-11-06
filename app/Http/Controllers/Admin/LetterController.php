<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Letter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Str;

class LetterController extends Controller
{
    public function index()
    {
        $letters = Letter::paginate(15);
        return view('admin.letter',[
            'letters' => $letters
        ]);
    }

    public function create()
    {
        return view('admin.upload-letter');
    }

    public function store(Request $request)
    {
        $validated = request()->validate([
            'title' => 'required',
            'kerma' => 'required',
            'mitra' => 'required',
            'file1' => 'nullable|mimes:pdf|max:2048',
            'file2' => 'nullable|mimes:pdf|max:2048',
            'file3' => 'nullable|mimes:pdf|max:2048',
        ]);

        try {
            DB::beginTransaction();
            if ($request->hasFile('file1')) {
                $validated['file1'] = $request->file('file1')->store('public/letters');
            }
            if ($request->hasFile('file2')) {
                $validated['file2'] = $request->file('file2')->store('public/letters');
            }
            if ($request->hasFile('file3')) {
                $validated['file3'] = $request->file('file3')->store('public/letters');
            }
            $validated['slug'] = Str::slug($validated['title']);
            Letter::create($validated);
            Alert::toast('Letter created successfully', 'success');
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            return back()->with('error', 'Failed to create letter');
        }

        return redirect()->back();
    }

    public function mergePDF($id)
    {
        $letter = Letter::findOrFail($id);
        if(!$letter->file1 || !$letter->file2 || !$letter->file3) {
            return back()->with('error', 'All files are required to merge');
        }

        $pdf = new Fpdi();

        $files = [$letter->file1, $letter->file2, $letter->file3];
        foreach ($files as $file) {
            $pageCount = $pdf->setSourceFile(storage_path('app/' . $file));
            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                $tpl = $pdf->importPage($pageNo);
                $pdf->AddPage();
                $pdf->useTemplate($tpl);
            }
        }
        // check path storage/app/merged if exist
        if (!file_exists(storage_path('app/merged'))) {
            mkdir(storage_path('app/merged'), 0777, true);
        }

        $output = storage_path('app/merged/' . $letter->slug . '.pdf');

        $pdf->Output('F', $output);

        return response()->download($output);
    }
}
