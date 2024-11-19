<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResearchCollaboration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Storage;

class ResearchCollaborationController extends Controller
{
    public function index()
    {
        $researches = ResearchCollaboration::paginate(15);
        return view('admin.research-collaboration',[
            'researches' => $researches
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'correspondence' => 'required|min:4',
            'study_program' => 'required',
            'name' => 'required|min:4',
            'email' => 'required|email',
            'list_authors' => 'required|min:4',
            'phone' => 'required',
            'university' => 'required|min:5',
            'department' => 'required|min:5',
            'faculty' => 'required|min:2',
            'link_paper' => 'required|url',
            'publish_date' => 'required|date',
            'title' => 'required|min:4|max:70',
            'fee_journal' => 'nullable|numeric',
            'journal_output' => 'required',
            'journal_level' => 'required',
            'loa' => 'nullable|mimes:pdf|max:2048',
            'paper' => 'required|mimes:pdf|max:5120',
            'invoice' => 'nullable|mimes:pdf|max:2048',
            'is_PKS' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $files = [];
            if ($request->hasFile('loa')) {
                $files[] = $request->file('loa')->store('public/temp');
            }
            $files[] = $request->file('paper')->store('public/temp');
            if ($request->hasFile('invoice')) {
                $files[] = $request->file('invoice')->store('public/temp');
            }

            $mergeFileName = 'public/research-collaboration/merge/' . str_replace(' ', '_', $validated['name']) . '_merged.pdf';

            $pdf = new Fpdi();
            foreach ($files as $file) {
                $filePath = Storage::path($file);
                $pageCount = $pdf->setSourceFile($filePath);
                for ($page = 1; $page <= $pageCount; $page++) {
                    $template = $pdf->importPage($page);
                    $size = $pdf->getTemplateSize($template);
                    $orientation = ($size['width'] > $size['height']) ? 'L' : 'P';
                    $pdf->AddPage($orientation, [$size['width'], $size['height']]);
                    $pdf->useTemplate($template);
                }
            }

            $pdf->Output('F', Storage::path($mergeFileName));

            foreach ($files as $file) {
                Storage::delete($file);
            }

            $validated['loa'] = $request->hasFile('loa') ? $mergeFileName : null;
            $validated['invoice'] = $request->hasFile('invoice') ? $mergeFileName : null;
            $validated['paper'] = str_replace('public/', '', $mergeFileName);
            $validated['path'] = $mergeFileName;

            ResearchCollaboration::create($validated);

            DB::commit();
            Alert::toast('Research collaboration created successfully', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            DB::rollBack();
            Alert::toast('Failed to create research collaboration', 'error');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $research = ResearchCollaboration::findOrFail($id);
        return view('admin.detail_research-collaboration', [
            'research' => $research
        ]);
    }

    public function destroy($id)
    {
        try {
            $research = ResearchCollaboration::findOrFail($id);
            $research->delete();
            Alert::toast('Research collaboration deleted successfully', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            Alert::toast('Failed to delete research collaboration', 'error');
            return redirect()->back();
        }
    }
}
