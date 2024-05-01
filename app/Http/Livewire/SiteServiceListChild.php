<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SiteServiceListChild extends Component
{
    public $categories;

//    public  $filter_check_all = true;
//    public $filter_check= [];
    public function render()
    {
        return view('livewire.site.site-service-list-child');
    }
}
