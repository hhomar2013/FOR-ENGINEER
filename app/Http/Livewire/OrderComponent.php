<?php

namespace App\Http\Livewire;

use App\Models\companies_service;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrderComponent extends Component
{
    public $service_id;
    public $service;
    public $details;
    public $rate;
    public $logo;
    public $company_name;
    public $about;
    public $ct_name;
    public $type;
    public $name;
    public $price;
    public $amount;
    public $pay= false;
    public $order_id;
    public $service_price;
    public $discount;
    public $after_discount;
    public $end_price;
    public $count = false;
   protected $listeners =['$refresh'];

    public function mount()
    {
        $this->service_id = request('id');
        $cs = DB::table('categories')
            ->select('categories.id',
                'categories.name',
                'service_site_prices.type',
                'service_site_prices.present',
                'service_site_prices.price',
                'service_site_prices.service_price',
                'service_site_prices.discount',
                'service_site_prices.after_discount',
                'service_site_prices.status as ssp_status',
                'categories.status as cat_status',
                'companies_services.status as cs_status',
                'companies_services.company_id',
                'companies.name as company_name',
                'companies.logo',
                'companies.rate',
                'companies_services.id as cs_id',
                'companies.about',
                'companies_types.name as ct_name',
            )
            ->join('service_site_prices','categories.id','=','service_site_prices.category_id')
            ->join('companies_services','categories.id','=','companies_services.category_id')
            ->join('companies','companies_services.company_id','=','companies.id')
            ->join('companies_types','companies.ct_id','=','companies_types.id')
            ->where('companies_services.id', $this->service_id)
            ->where('service_site_prices.status','=',1)
            ->where('categories.status','=',1)
            ->where('companies_services.status','=',1)
            ->first();

        if ($cs != null){
            $this->rate = $cs->rate;
            $this->logo = $cs->logo;
            $this->company_name = $cs->company_name;
            $this->ct_name = $cs->ct_name;
            $this->type = $cs->type;
            $this->name = $cs->name;
            $this->price = $cs->price;
            $this->about = $cs->about;
            $this->service_price = $cs->service_price;
            $this->discount = $cs->discount;
            $this->after_discount = $cs->after_discount;
        }else{
            $this->count = true;
            session()->flash('error',__('Service not available'));

//
//            $this->emit('SiteServiceRefresh');
//            $this->emitTo('SiteService','render');


        }

   }//end Of Mount

    public function save()
    {
        $this->validate([
            'details'=>'required'
        ]);
        if ($this->after_discount > 0 && $this->type == 1){
          $this->end_price = $this->after_discount;
        }elseif ($this->after_discount == 0 && $this->type == 0){
           $this->end_price = $this->price;
        }elseif ($this->after_discount == 0 && $this->type == 1){
            $this->end_price = $this->service_price;
        }


      $order = Order::query()->create(
          [
            'order_ref'=>rand(11111,99999),
            'transaction_id'=>0,
            'details'=>$this->details,
            'price' => $this->end_price,
            'status'=> 0,
            'company_service'=>$this->service_id,
            'user'=>auth()->id()
        ]);

        if ($this->discount > 0 && $this->type == 1){
            $this->amount = ($this->after_discount * 100) + (4.31 * 100);
        }elseif ($this->after_discount == 0 && $this->type == 0){
            $this->amount = ($this->price * 100)  + (4.31 * 100);
        }elseif ($this->after_discount == 0 && $this->type == 1){
            $this->amount = ($this->service_price * 100)  + (4.31 * 100);
        }



        $this->order_id = $order['order_ref'];
        session()->put('order_id',$this->order_id);
        session()->put('service',$this->name . "(" . $this->company_name . ")");
        $this->pay=true;
        $this->emitSelf('$refresh');
        $this->emit('cart-refresh');
    }

    public function order()
    {
        dd($this->details);
    }

    public function render()
    {
        return view('livewire.site.order.index');
    }
}
