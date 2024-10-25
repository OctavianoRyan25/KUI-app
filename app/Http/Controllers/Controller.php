<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Peserta;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function showAttendance($uuid)
    {
        $event = Event::with('pesertas')->where('uuid', $uuid)->first();

        if (!$event) {
            abort(404, 'Event not found');
        }

        return view('admin.attendance', compact('event'));
    }

    public function saveSignature(Request $request, $uuid)
    {
        // @dd($request->all());
        // Dapatkan event berdasarkan UUID dan relasi dengan peserta
        $event = Event::with('pesertas')->where('uuid', $uuid)->firstOrFail();

        // Dapatkan peserta berdasarkan ID
        $participant = Peserta::findOrFail($request->peserta_id);

        // Simpan tanda tangan dalam pivot table
        $event->pesertas()->updateExistingPivot($participant->id, [
            'signature' => $request->signature,
            'is_present' => true
        ]);

        return back()->with('success', 'Signature saved successfully.');
    }
    public function searchPeserta(Request $request)
    {
        $search = $request->get('query');
        $pesertas = Peserta::where('name', 'like', '%' . $search . '%')
                            ->get(['id', 'name', 'position']);
        return response()->json($pesertas);
    }
}
