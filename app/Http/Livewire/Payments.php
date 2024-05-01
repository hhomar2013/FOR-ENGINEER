<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Moyasar\Facades\Payment;
use Moyasar\Providers\InvoiceService;
use Moyasar\Providers\PaymentService;

class Payments extends Component
{

    public $pay;

    public function render()
    {


        return view('livewire.admin.payments');
    }
}
