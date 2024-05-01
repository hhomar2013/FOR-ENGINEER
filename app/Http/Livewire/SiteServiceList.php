<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SiteServiceList extends Component
{
    public $categories;
    public function render()
    {
        return view('livewire.site.site-service-list');
    }
}
