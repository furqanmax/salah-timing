<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mosque;


class LandingPageController extends Controller
{
    public function index()
    {
        $mosques = Mosque::all(); // Get all mosques data

        return view('landing', compact('mosques'));  // Pass data to the landing page view
    }
}
