<?php

namespace App\Livewire;

use Livewire\Component;

class Logingoogle extends Component
{
    public $modalvisible = false;

    public function login()
    {
        $this->modalvisible = true;
    }
    public function closelogin()
    {
        $this->modalvisible = false;
    }
    public function render()
    {
        return view('livewire.logingoogle');
    }
}
