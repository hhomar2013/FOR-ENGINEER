<?php

namespace App\Http\Livewire\Sitev2;

use App\Models\Company;
use App\Models\NewRequest;
use App\Models\User;
use Livewire\Component;

class AboutComponent extends Component
{

    public function render()
    {
        $user = User::query()->count() *590;
        $requests = NewRequest::query()->count() * 1650;
        $companies = Company::query()->count() * 20;
        return view('livewire.sitev2.about-component',
        ['users'=>$user,'requests'=>$requests , 'companies'=>$companies]);
    }
}
