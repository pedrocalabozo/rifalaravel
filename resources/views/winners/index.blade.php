@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Lista de Ganadores</h1>

    @if($winners->isEmpty())
        <p>No hay ganadores registrados en este momento.</p>
    @else
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Rifa</th>
                    <th class="py-2 px-4 border-b">Nombre del Ganador</th>
                    <th class="py-2 px-4 border-b">Número Ganador</th>
                    <th class="py-2 px-4 border-b">Premio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($winners as $winner)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $winner->raffle->title }}</td>
                        <td class="py-2 px-4 border-b">{{ $winner->user->name }}</td>
                        <td class="py-2 px-4 border-b">{{ implode(', ', json_decode($winner->winning_numbers)) }}</td>
                        <td class="py-2 px-4 border-b">{{ $winner->prize }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection