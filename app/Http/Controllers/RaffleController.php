<?php

namespace App\Http\Controllers;

use App\Models\Raffle;
use Illuminate\Http\Request;

class RaffleController extends Controller
{
    public function index()
    {
        $raffles = Raffle::where('estado', 'activa')->get();
        return view('raffles.index', compact('raffles'));
    }

    public function show($id)
    {
        $raffle = Raffle::findOrFail($id);
        return view('raffles.show', compact('raffle'));
    }

    public function create()
    {
        return view('raffles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'foto_url' => 'nullable|url',
            'precio_boleto' => 'required|numeric',
            'max_numeros' => 'required|integer|min:1',
        ]);

        Raffle::create($request->all());

        return redirect()->route('raffles.index')->with('success', 'Rifa creada exitosamente.');
    }

    public function edit($id)
    {
        $raffle = Raffle::findOrFail($id);
        return view('raffles.edit', compact('raffle'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'foto_url' => 'nullable|url',
            'precio_boleto' => 'required|numeric',
            'max_numeros' => 'required|integer|min:1',
        ]);

        $raffle = Raffle::findOrFail($id);
        $raffle->update($request->all());

        return redirect()->route('raffles.index')->with('success', 'Rifa actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $raffle = Raffle::findOrFail($id);
        $raffle->delete();

        return redirect()->route('raffles.index')->with('success', 'Rifa eliminada exitosamente.');
    }
}