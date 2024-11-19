<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\ResearchCollaboration;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $selected_year = date('Y');
        $total_event = Event::whereYear('created_at', $selected_year)->count();
        $total_reserach_collaboration = ResearchCollaboration::whereYear('created_at', $selected_year)->count();
        return view('admin.dashboard',
        [
            'selected_year' => $selected_year,
            'total_event' => $total_event,
            'total_reserach_collaboration' => $total_reserach_collaboration
        ]);
    }
}
