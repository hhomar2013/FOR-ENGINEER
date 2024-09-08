<?php

namespace App\Http\Livewire\Sitev2;

use Livewire\Component;

class AboutComponent extends Component
{
    public function render()
    {
        return view('livewire.sitev2.about-component')
        ->extends('layouts.base')
        ->section('content');
    }
}
