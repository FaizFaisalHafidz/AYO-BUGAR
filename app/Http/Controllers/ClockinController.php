<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClockinController extends Controller
{
    public function index(){
        return view('clockin.index');
    }
}
