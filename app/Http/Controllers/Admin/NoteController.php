<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventFile;
use App\Models\EventPhoto;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use RealRashid\SweetAlert\Facades\Alert;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function show($id)
    {
        $note = Note::with('event')->find($id);
        $present = $note->event->pesertas()->where('is_present', true)->count();
        $no_present = $note->event->pesertas()->where('is_present', false)->count();
        $total_participant = $present + $no_present;
        // dd($note);
        return view('admin.detail_note', [
            'note' => $note,
            'present' => $present,
            'no_present' => $no_present,
            'total_participant' => $total_participant,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'topic' => 'required',
            'content' => 'required',
            'event_id' => 'required',
        ]);

        $note = Note::create($validatedData);

        return redirect()->route('event.show', $note->event_id);
    }

    public function update(Request $request, $id)
    {
        $note = Note::find($id);
        if (!$note) {
            return response()->json([
                'message' => 'Note not found',
            ], 404);
        }

        $validatedData = $request->validate([
            'content' => 'required',
        ]);

        $note->update($validatedData);

        return response()->json([
            'message' => 'Note updated successfully',
            'note' => $note,
        ], 200);
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('event.show', $note->event_id);
    }

    public function uploadPhoto(Request $request, $id)
    {
        $request->validate([
            'upload_photo' => 'required|array|max:3',
            'upload_photo.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('upload_photo')) {
            $files = $request->file('upload_photo');
            foreach ($files as $file) {
                $file->store('public/event_photos');

                try {
                    EventPhoto::create([
                        'event_id' => $id,
                        'photo_path' => $file->hashName(),
                    ]);
                } catch (\Exception $e) {
                    Alert::toast('Failed to upload photo', 'error');
                    Log::error($e->getMessage());
                    return redirect()->back();
                }
            }
        }

        Alert::toast('Photo uploaded successfully', 'success');
        return redirect()->back();
    }

    public function uploadFile(Request $request, $id)
    {
        $request->validate([
            'upload_file' => 'required|array|max:3',
            'upload_file.*' => 'required|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048',
        ]);

        if ($request->hasFile('upload_file')) {
            $files = $request->file('upload_file');
            foreach ($files as $file) {
                $file->store('public/event_files');

                EventFile::create([
                    'event_id' => $id,
                    'file_path' => $file->hashName(),
                ]);
            }
        }

        Alert::toast('File uploaded successfully', 'success');
        return redirect()->back();
    }

    public function printPDF($id)
    {
        $notulensi = Note::with('event')->findOrFail($id);
        $data = [
            'notulensi' => $notulensi,
            'present' => $notulensi->event->pesertas()->where('is_present', true)->count(),
            'no_present' => $notulensi->event->pesertas()->where('is_present', false)->count()
        ];
        $pdf = PDF::loadView('admin.print_note', $data)
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isPhpEnabled' => true,
                'font' => 'Arial'
            ]);

        return $pdf->stream('notulensi-' . $notulensi->id . '.pdf');
    }
}
