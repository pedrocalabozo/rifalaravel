@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">{{ $raffle->title }}</h1>
    <img src="{{ $raffle->photo_url }}" alt="{{ $raffle->title }}" class="mb-4">
    <p class="mb-4">{{ $raffle->description }}</p>
    <p class="mb-4">Price per ticket: <strong>${{ number_format($raffle->ticket_price, 2) }}</strong></p>
    <p class="mb-4">Maximum tickets available: <strong>{{ $raffle->max_numbers }}</strong></p>
    <p class="mb-4">Ends on: <strong>{{ \Carbon\Carbon::parse($raffle->end_date)->format('d M Y, H:i') }}
    </strong></p>

    <h2 class="text-xl font-semibold mt-6 mb-2">Participate in this Raffle</h2>
    <form action="{{ route('raffles.participate', $raffle->id) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="ticket_quantity" class="block text-sm font-medium text-gray-700">Number of Tickets</label>
            <input type="number" name="ticket_quantity" id="ticket_quantity" min="1" max="{{ $raffle->max_numbers }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Buy Tickets</button>
    </form>

    <h2 class="text-xl font-semibold mt-6 mb-2">Participation Rules</h2>
    <p>Please ensure you read the rules before participating.</p>
    <a href="{{ route('rules') }}" class="text-blue-500">View Rules</a>
</div>
@endsection
