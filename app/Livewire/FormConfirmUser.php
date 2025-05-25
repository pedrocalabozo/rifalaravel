<?php

namespace App\Livewire;

use Livewire\Component;

class FormConfirmUser extends Component
{
    public  $showModal = false;
    public $apellido;
    public $telefono;
    public $numero_id;
    public $update_profile_exito = false;

    protected $rules = [
        'apellido'  => 'required|string|max:255',
        'telefono'  => 'required|string|max:20',
        'numero_id' => 'required|string|max:30',
    ];

    protected $messages = [
        'apellido.required'  => 'El campo Apellido es obligatorio.',
        'telefono.required'  => 'El campo Teléfono es obligatorio.',
        'numero_id.required' => 'El campo Número de Cedula es obligatorio.',
    ];

    public function closeform()
    {
        $this->showModal = false;
        $this->update_profile_exito = false;
    }

    public function showform()
    {
        $this->update_profile_exito = true;
    }

    public function mount()
    {
        // Verificar si el usuario está autenticado
        if (auth()->check()) {



            if (empty(auth()->user()->telefono) || empty(auth()->user()->apellido) || empty(auth()->user()->numero_id)) {
                $this->showModal = true;
            }






            $user = auth()->user();

            // Asignar los valores actuales del usuario
            $this->apellido  = $user->apellido;
            $this->telefono  = $user->telefono;
            $this->numero_id = $user->numero_id;
        }
    }

    public function updateProfile()
    {
        $this->validate();

        $user = auth()->user();
        $user->update([
            'apellido'  => $this->apellido,
            'telefono'  => $this->telefono,
            'numero_id' => $this->numero_id,
        ]);

        // Ocultar el modal después de actualizar los datos
        $this->update_profile_exito = true;

        session()->flash('message', 'Perfil actualizado correctamente.');
    }


    public function render()
    {
        return view('livewire.form-confirm-user');
    }
}
