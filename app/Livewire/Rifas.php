<?php

namespace App\Livewire;

use App\Models\Raffle;
use App\Models\Ticket;
use Livewire\Component;

class Rifas extends Component
{
    public $data_rifa;
    public $raffles;
    public $auth_full = false;
    public $detalle_rifa = false;
    public $idrifa;
    public $compraexito = false;

    // La cantidad de boletos seleccionados (por defecto 1)
    public $ticketQuantity = 1;

    // Precio base de un boleto (ajústalo según tus necesidades)
    public $price;

    // Arreglo que almacenará los números de boletos aleatorios
    public $tickets = [];

    // Propiedad enlazada al input
    public $paymentReference;



    public $metodo_pago = 'pagoMovil';  // Ejemplo: "tarjeta", "paypal", etc.
    public $estado_pago = 'pendiente';

    // Reglas de validación para asegurar que los datos sean correctos
    protected $rules = [
        'idrifa'         => 'required|exists:rifas,id',
        'ticketQuantity' => 'required|integer|min:1',
        'metodo_pago'    => 'required|string',
        'estado_pago'    => 'required|string',
        'paymentReference' => 'required|min:5',

    ];

    protected $messages = [
        'rifaId.required'           => 'Debes seleccionar una rifa.',
        'rifaId.exists'             => 'La rifa seleccionada no es válida.',
        'ticketQuantity.required'   => 'Debes ingresar la cantidad de boletos.',
        'ticketQuantity.integer'    => 'La cantidad de boletos debe ser un número entero.',
        'ticketQuantity.min'        => 'Debes seleccionar al menos 1 boleto.',
        'metodo_pago.required'      => 'El método de pago es obligatorio.',
        'metodo_pago.string'        => 'El método de pago debe ser un texto válido.',
        'estado_pago.required'      => 'El estado del pago es obligatorio.',
        'estado_pago.string'        => 'El estado del pago debe ser un texto.',
        'paymentReference.required' => 'La referencia de pago es obligatoria.',
        'paymentReference.min'      => 'La referencia de pago debe tener al menos 5 caracteres.',
    ];




    // Método que se ejecuta al montar el componente
    public function mount()
    {

        $this->metodo_pago = 'pagoMovil';
        $this->generateTickets();




        $this->raffles = Raffle::where('estado', 'activa')->get();


        if (auth()->user()) {
            if (auth()->user()->nombre == null || auth()->user()->apellido == null || auth()->user()->telefono == null || auth()->user()->numero_id == null) {
                $this->auth_full = false;
            } else {
                $this->auth_full = true;
            }
        }
    }


    public function select_metodo($metod)
    {

        $this->metodo_pago = $metod;
        // Aquí puedes agregar lógica adicional si es necesario
        // Por ejemplo, cambiar el precio según el método de pago seleccionado
        // $this->price = $this->calculatePriceBasedOnMethod($metod);
    }


    public function updatedTicketQuantity()
    {
        $this->generateTickets();
    }

    // Método para generar números de boletos aleatorios
    // Método para generar los boletos según la cantidad seleccionada
    public function generateTickets()
    {
        $this->tickets = [];

        for ($i = 0; $i < $this->ticketQuantity; $i++) {
            $this->tickets[] = $this->generateUniqueTicketNumber();
        }
    }


    protected function generateUniqueTicketNumber()
    {
        do {
            // Genera un número aleatorio. Puedes ajustar el rango o generar un string más complejo.
            $ticketNumber = '#' . rand(100, 999);

            // Verifica que no se haya generado ya en este ciclo
            $existsInCurrent = in_array($ticketNumber, $this->tickets);

            // Verifica que el número no exista en la base de datos (tabla numeros_comprados)
            $existsInDb = Ticket::where('numeros_comprados', $ticketNumber)->exists();
        } while ($existsInCurrent || $existsInDb);

        return $ticketNumber;
    }


    public function handleQuantityChange($value)
    {
        $this->ticketQuantity = (int) $value;
        $this->generateTickets(); // Genera los boletos según la nueva cantidad
    }


    // Propiedad computada para calcular el precio total
    public function getTotalPriceProperty()
    {
        return $this->ticketQuantity * $this->price;
    }









    public function open_detalle_rifa($id)
    {

        try {
            // Usamos findOrFail para lanzar una excepción si la rifa no existe
            $this->data_rifa = Raffle::findOrFail($id);
            $this->price =  $this->data_rifa->first()->precio_boleto; // Asigna el precio del primer sorteo activo

            $this->detalle_rifa = true;
            $this->idrifa = $id;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Se captura el error cuando no se encuentra la rifa por el id
            session()->flash('error', 'No se encontró la rifa con el ID proporcionado.');
            $this->detalle_rifa = false;
        } catch (\Exception $e) {
            // Se capturan otros errores no previstos
            session()->flash('error', 'Ocurrió un error inesperado: ' . $e->getMessage());
            $this->detalle_rifa = false;
        }
    }
    public function closemodal()
    {
        $this->detalle_rifa = false;
    }
    public function participate($id)
    {
        // Logic to participate in the raffle
        // This could involve creating a ticket, updating the raffle status, etc.
        // For example:
        // $ticket = new Ticket();
        // $ticket->raffle_id = $id;
        // $ticket->user_id = auth()->id();
        // $ticket->save();

        session()->flash('message', 'You have successfully participated in the raffle!');
    }


    public function comprarBoletos()
    {



        // Valida los datos según las reglas definidas.
        $validatedData = $this->validate();

        // Convierte el arreglo de boletos a una cadena separada por comas.
        $numerosComprados = implode(',', $this->tickets);

        // Inserta el registro en la base de datos utilizando el modelo CompraRifa.
        $rifa = Raffle::findOrFail($this->idrifa); // Se obtiene la rifa según el ID
        $rifa->tickets()->create([


            'rifa_id'           => $this->idrifa,
            'user_id'           => auth()->id(),
            'numeros_comprados' => $numerosComprados,
            'referencia_pago'   => $this->paymentReference,
            'cantidad_numeros'  => $this->ticketQuantity,
            'metodo_pago'       => $this->metodo_pago,
            'estado_pago'       => $this->estado_pago,
            'total_pagado'      => $this->getTotalPriceProperty(),
        ]);


        // Mensaje de éxito que puede mostrarse en la vista.
        session()->flash('message', '¡Compra realizada con éxito!');
        $this->compraexito = true;
        $this->closeDetalleRifa();
        $this->reset('paymentReference', 'metodo_pago', 'estado_pago');
    }
    public function closeCompraExito()
    {
        $this->compraexito = false;
    }
    public function closeDetalleRifa()
    {
        $this->detalle_rifa = false;
    }
    // Renderiza


    public function render()
    {
        return view('livewire.rifas');
    }
}
