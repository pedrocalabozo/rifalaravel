<?php

namespace App\Livewire;

use App\Models\Raffle;
use Livewire\Component;

class Formrifa extends Component
{
    public $modal;
    public $data;
    protected $listeners = ['abre_rifa' => 'rifa'];

    public function __construct($data, $modal)
    {
        $this->data = $data;
        $this->modal = $modal;
    }
    public function closemodal() {}

    public function rifa($data) {}

    public function render()
    {
        return view('livewire.formrifa');
    }
}
