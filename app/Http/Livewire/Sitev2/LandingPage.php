<?php

namespace App\Http\Livewire\Sitev2;

use App\Models\categories;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use PhpParser\JsonDecoder;

class LandingPage extends Component
{
    public function render()
    {
        $json = Storage::get('icons.json');
        $data = json_decode($json,true);
        $categories = categories::query()->where('status',1)->get();
        return view('livewire.sitev2.landing-page',
        ['categories'=>$categories ,
        'data'=> $data
        ]);
    }
}
