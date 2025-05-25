<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipateRaffleRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to make this request
    }

    public function rules()
    {
        return [
            'raffle_id' => 'required|exists:raffles,id', // Ensure the raffle exists
            'quantity' => 'required|integer|min:1', // Must be a positive integer
            'payment_method' => 'required|string|in:Pago Movil,Criptomoneda,Zinli', // Valid payment methods
            'payment_reference' => 'required|string', // Reference for the payment
        ];
    }

    public function messages()
    {
        return [
            'raffle_id.required' => 'The raffle ID is required.',
            'raffle_id.exists' => 'The selected raffle does not exist.',
            'quantity.required' => 'The quantity of tickets is required.',
            'quantity.integer' => 'The quantity must be an integer.',
            'quantity.min' => 'You must purchase at least one ticket.',
            'payment_method.required' => 'The payment method is required.',
            'payment_method.in' => 'The selected payment method is invalid.',
            'payment_reference.required' => 'The payment reference is required.',
        ];
    }
}