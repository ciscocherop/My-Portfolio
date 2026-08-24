<?php

namespace App\Http\Controllers;

class PortfolioController extends Controller
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
