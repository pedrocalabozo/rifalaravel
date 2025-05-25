<?php

namespace App\Http\Controllers;

use App\Models\Winner;
use Illuminate\Http\Request;

class WinnerController extends Controller
{
    public function index()
    {
        $winners = Winner::with('raffle')->get();
        return view('winners.index', compact('winners'));
    }

    public function show($id)
    {
        $winner = Winner::with('raffle')->findOrFail($id);
        return view('winners.show', compact('winner'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'raffle_id' => 'required|exists:raffles,id',
            'user_id' => 'required|exists:users,id',
            'winning_number' => 'required|string',
        ]);

        $winner = Winner::create([
            'raffle_id' => $request->raffle_id,
            'user_id' => $request->user_id,
            'winning_number' => $request->winning_number,
        ]);

        return redirect()->route('winners.index')->with('success', 'Winner added successfully.');
    }
}