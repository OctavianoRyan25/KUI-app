<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $events = Event::paginate(15);
        return view('admin.event', 
            [
                'events' => $events
            ]
        );
    }

    public function showCreateForm()
    {
        return view('admin.create_event');
    }

    public function show($id)
    {
        $event = Event::with('pesertas')->find($id);
        // @dd($event->toJson());
        return view('admin.detail_event', compact('event'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_rapat' => 'required',
            'event_name' => 'required',
            'responsible' => 'required',
            'hal' => 'required',
            'kepada' => 'required',
            'tanggal_rapat' => 'required|date',
            'tempat_rapat' => 'required',
            'jam_rapat' => 'required',
            'peserta' => 'required|array',
        ]);

        // Change date format to d-m-Y
        // $validatedData['tanggal_rapat'] = date('d-m-Y', strtotime($validatedData['tanggal_rapat']));

        $validatedData['uuid'] = (string) Str::uuid();
        
        try {
            DB::beginTransaction();
            $event = Event::create($validatedData);
            $event->pesertas()->attach($validatedData['peserta']);

            // $qrUrl = route('event.qr', ['uuid' => $event->uuid]);
            DB::commit();

            Alert::toast('Event created successfully.', 'success');
            return redirect()->route('admin.event')->with('success', 'Rapat berhasil dibuat! QR Code: ');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return redirect()->route('admin.event.showForm')->with('error', $th->getMessage());
        }        

    }

    public function showUpdateForm($id)
    {
        $event = Event::find($id);
        return view('admin.edit_event',
            [
                'event' => $event
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nomor_rapat' => 'required',
            'event_name' => 'required',
            'responsible' => 'required',
            'hal' => 'required',
            'kepada' => 'required',
            'tanggal_rapat' => 'required|date',
            'tempat_rapat' => 'required',
            'jam_rapat' => 'required',
        ]);
        
        try {
            DB::beginTransaction();
            Event::where('id', $id)->update($validatedData);
            DB::commit();

            Alert::toast('Event updated successfully.', 'success');
            return redirect()->route('admin.event.edit', ['id' => $id]);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);

            Alert::toast('Error updating event.', 'error');
            return redirect()->route('admin.event.edit', ['id' => $id]);
        }        
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            Event::destroy($id);
            DB::commit();

            Alert::toast('Event deleted successfully.', 'success');
            return redirect()->route('admin.event');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return redirect()->route('admin.event')->with('error', 'Error deleting event.');
        }        
    }

    public function generateQr($uuid)
    {
        $event = Event::where('uuid', $uuid)->first();

        if (!$event) {
            abort(404, 'Event not found');
        }

        $qrCode = QrCode::format('png')->size(500)->generate(route('admin.attendance', $event->uuid));

        return response($qrCode)->header('Content-Type', 'image/png');
    }

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

    public function tambahPesertaRapat(Request $request)
    {
        $validatedData = $request->validate([
            'event_id' => 'required',
            'peserta' => 'required|array',
        ]);
    
        try {
            DB::beginTransaction();
            $event = Event::find($validatedData['event_id']);
            if (!$event) {
                Alert::toast('Event not found.', 'error');
                return redirect()->back();
            }
    
            // Cek apakah peserta sudah terdaftar dalam event
            $existingPesertas = $event->pesertas()->whereIn('peserta_id', $validatedData['peserta'])->pluck('peserta_id')->toArray();
            $newPesertas = array_diff($validatedData['peserta'], $existingPesertas);
    
            // Hanya attach peserta yang belum terdaftar
            if (count($newPesertas) > 0) {
                $event->pesertas()->attach($newPesertas);
                Alert::toast('Peserta added successfully.', 'success');
            } else {
                Alert::toast('Peserta sudah terdaftar.', 'info');
            }
    
            DB::commit();
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            Alert::toast('Error adding peserta.'. $th->getMessage(), 'error');
            return redirect()->back();
        }        
    }
    
    public function deletePesetaRapat($peserta_id)
    {
        try {
            DB::beginTransaction();
            
            $peserta = DB::table('event_peserta')->where('peserta_id', $peserta_id)->first();
            if (!$peserta) {
                Alert::toast('Peserta not found.', 'error');
                return redirect()->back();
            }
    
            DB::table('event_peserta')->where('peserta_id', $peserta_id)->delete();
            DB::commit();
    
            Alert::toast('Peserta deleted successfully.', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            Alert::toast('Error deleting peserta.', 'error');
            return redirect()->back();
        }        

    }
}
