<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to make this request
    }

    public function rules()
    {
        return [
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:50',
            'numero_id' => 'required|string|max:50', // Cédula o ID nacional
        ];
    }
}