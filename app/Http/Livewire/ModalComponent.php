<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalComponent extends Component
{
    public $showModal = false;

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.modal-component');
    }
}
