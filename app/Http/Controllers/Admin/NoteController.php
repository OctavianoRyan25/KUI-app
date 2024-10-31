<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function show($id){
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
        if(!$note){
            return response()->json([
                'message' => 'Note not found',
            ],404);
        }

        $validatedData = $request->validate([
            'content' => 'required',
        ]);

        $note->update($validatedData);

        return response()->json([
            'message' => 'Note updated successfully',
            'note' => $note,
        ],200);
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('event.show', $note->event_id);
    }
}
