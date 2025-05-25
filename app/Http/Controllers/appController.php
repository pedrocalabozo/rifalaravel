<?php

namespace App\Http\Controllers;

use App\Models\Raffle;
use Illuminate\Http\Request;

class appController extends Controller
{
    //
    public function index()
    {
        $raffles = Raffle::where('estado', 'activa')->get();
        return view('welcome', compact('raffles'));
    }
}
