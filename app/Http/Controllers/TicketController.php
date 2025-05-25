<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Models\Ticket;
use App\Models\Raffle;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create($raffleId)
    {
        $raffle = Raffle::findOrFail($raffleId);
        return view('tickets.create', compact('raffle'));
    }

    public function store(StoreTicketRequest $request, $raffleId)
    {
        $raffle = Raffle::findOrFail($raffleId);

        $ticketNumbers = [];
        for ($i = 0; $i < $request->input('quantity'); $i++) {
            $ticketNumbers[] = rand(1, $raffle->max_numbers);
        }

        $ticket = Ticket::create([
            'raffle_id' => $raffle->id,
            'user_id' => auth()->id(),
            'numbers_purchased' => json_encode($ticketNumbers),
            'quantity' => $request->input('quantity'),
            'payment_method' => $request->input('payment_method'),
            'payment_status' => 'pending',
        ]);

        return redirect()->route('raffles.show', $raffleId)->with('success', 'Tickets purchased successfully!');
    }

    public function verifyPayment(Request $request, $ticketId)
    {
        $ticket = Ticket::findOrFail($ticketId);
        // Logic to verify payment would go here
        // For now, we will just update the payment status to 'verified'
        $ticket->update(['payment_status' => 'verified']);

        return redirect()->route('winners.index')->with('success', 'Payment verified successfully!');
    }
}