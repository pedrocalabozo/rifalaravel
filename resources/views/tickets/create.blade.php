@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Participar en la Rifa</h1>

    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="raffle_id" class="block text-sm font-medium text-gray-700">Selecciona una Rifa</label>
            <select id="raffle_id" name="raffle_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                <option value="">-- Selecciona una Rifa --</option>
                @foreach($raffles as $raffle)
                    <option value="{{ $raffle->id }}">{{ $raffle->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-sm font-medium text-gray-700">Cantidad de Boletos</label>
            <input type="number" id="quantity" name="quantity" min="1" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
        </div>

        <div class="mb-4">
            <label for="payment_method" class="block text-sm font-medium text-gray-700">Método de Pago</label>
            <select id="payment_method" name="payment_method" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                <option value="">-- Selecciona un Método de Pago --</option>
                <option value="pago_movil">Pago Móvil</option>
                <option value="criptomoneda">Criptomoneda (USDT)</option>
                <option value="zinli">Zinli</option>
            </select>
        </div>

        <button type="submit" class="mt-4 bg-blue-500 text-white font-bold py-2 px-4 rounded">Comprar Boletos</button>
    </form>
</div>
@endsection