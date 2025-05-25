@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Rifas Activas</h1>

    @if($raffles->isEmpty())
        <p>No hay rifas activas en este momento.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($raffles as $raffle)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <img src="{{ $raffle->foto_url }}" alt="{{ $raffle->titulo }}" class="w-full h-48 object-cover rounded-t-lg">
                    <h2 class="text-xl font-semibold mt-2">{{ $raffle->titulo }}</h2>
                    <p class="text-gray-600">{{ Str::limit($raffle->descripcion, 100) }}</p>
                    <p class="mt-2 font-bold">Precio por boleto: {{ $raffle->precio_boleto }} Bs</p>
                    <a href="{{ route('raffles.show', $raffle->id) }}" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Participar</a>
                </div>
            @endforeach



        </div>
    @endif
</div>
@endsection
