<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::guest()) {
            return redirect()->route('login');
        }
        return view('dashboard.index');
    }
}
