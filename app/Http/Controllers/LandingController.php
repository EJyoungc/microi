<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    //
    public function index()
    {
        $u =  User::where('role','admin')->get();
        
        return view('landing')->with('team',$u);
    }
}
