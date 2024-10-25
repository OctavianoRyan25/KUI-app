<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $selected_year = date('Y');
        return view('admin.dashboard',
        [
            'selected_year' => $selected_year,
        ]);
    }
}
