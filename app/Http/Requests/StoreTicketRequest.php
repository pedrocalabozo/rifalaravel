<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to make this request
    }

    public function rules()
    {
        return [
            'raffle_id' => 'required|exists:raffles,id',
            'numbers' => 'required|array',
            'numbers.*' => 'integer|min:1|max:900', // Assuming ticket numbers range from 1 to 900
            'payment_method' => 'required|string|in:Pago Movil,Criptomoneda,Zinli',
            'payment_reference' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'raffle_id.required' => 'The raffle ID is required.',
            'raffle_id.exists' => 'The selected raffle does not exist.',
            'numbers.required' => 'You must select at least one ticket number.',
            'numbers.array' => 'The ticket numbers must be an array.',
            'numbers.*.integer' => 'Each ticket number must be an integer.',
            'numbers.*.min' => 'Each ticket number must be at least 1.',
            'numbers.*.max' => 'Each ticket number must not exceed 900.',
            'payment_method.required' => 'The payment method is required.',
            'payment_method.in' => 'The selected payment method is invalid.',
            'payment_reference.required' => 'The payment reference is required.',
            'payment_reference.max' => 'The payment reference must not exceed 255 characters.',
        ];
    }
}