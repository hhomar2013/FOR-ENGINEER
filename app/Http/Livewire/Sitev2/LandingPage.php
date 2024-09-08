<?php

namespace App\Http\Livewire\Sitev2;

use App\Models\categories;
use Livewire\Component;

class LandingPage extends Component
{
    public function render()
    {
        $categories = categories::query()->where('status',1)->get();
        return view('livewire.sitev2.landing-page',
        ['categories'=>$categories])
        ->extends('layouts.base');
    }
}
