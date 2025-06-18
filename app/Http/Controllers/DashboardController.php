<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        // onetomany returns the inventories the user has
        $inventories = auth()->user()->inventories;
        return view('dashboard.index', compact('inventories'));
    }
}
