<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortflioController extends Controller
{
    /**
     * Display the portfolio home (one-page layout).
     */
    public function index()
    {
        return view('index');
    }

    // Additional resourceful methods can be added later (show, create, store, etc.)
}
