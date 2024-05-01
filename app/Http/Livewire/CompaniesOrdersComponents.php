<?php

namespace App\Http\Livewire;

use App\Mail\SendOrderAskPrice;
use App\Models\Order;
use App\Models\order_invoice;
use App\Models\OrderComments;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class CompaniesOrdersComponents extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $numbers = 5;
    public $details;
    public $type;
    public $present = 0;
    public $ask_price = 0;
    public $final_price = 0;
    public $data = false;
    public $order_ref;
    public $order_status;
    public $order_id;
    public $comment;
    public $close_order = false;
    public $commenttext;
    public $filter = 1;
    protected $listeners =['ask_price'];

    public function pages_num()
    {
        $this->numbers;
        $this->resetPage();

    }

    public function ask_price()
    {
        $this->final_price  = value($this->ask_price) - (value($this->ask_price) * value($this->present) / 100);
    }

    public function closeOrder()
    {
        $this->reset();
        $this->close_order = false;
    }

    public function reply($id)
    {
//        $this->reset();
        $this->data = true;
        $orders = DB::table('orders')
            ->join('companies_services','orders.company_service','=','companies_services.id')
            ->join('users','orders.user','=','users.id')
            ->join('categories','companies_services.category_id','=','categories.id')
            ->join('service_site_prices','categories.id','=','service_site_prices.category_id')
            ->select('orders.*','users.name','companies_services.company_id',
            'categories.name AS category_name','service_site_prices.type',
            'service_site_prices.type','service_site_prices.present','service_site_prices.price AS ssp')
            ->where('companies_services.company_id', auth()->id())
            ->where('orders.id',$id)
            ->first();

            $this->details = $orders->details;
            $this->present = $orders->present;
            $this->type = $orders->type;
            $this->order_status = $orders->status;
            $this->order_ref = $orders->order_ref;
            $this->order_id = $orders->id;

    }

//    public function order()
//    {
//        dd($this->commenttext);
//    }

    public function filter($id)
    {
        $this->filter = $id;
    }

    public function Order_Comments($id)
    {
        $order = Order::query()->find($id);
        OrderComments::query()->create([
            'order_ref'=>$order->id,
            'comment'=>$this->commenttext,
            'from_company'=>auth()->id(),
            'to_user'=>$order->user,
            'status'=>0
        ]);
        $order->update(['status'=>8]);
        session()->flash('message', __('Payment Success'));
        $this->reset();
    }

    public function send_price_to_customer()
    {

        $order = Order::query()->where('order_ref',$this->order_ref)->with('users')->first();
        $order_invoice = order_invoice::query()->create([
            'order_ref' => $this->order_ref,
            'ask_price'=> $this->ask_price,
            'comment'=>$this->comment,
            'company_id'=>auth()->id()
        ]);
        $orders = Order::query()->findOrFail($order->id)->update(['status'=>5]);
        Mail::to($order->users->email)->send(new SendOrderAskPrice($this->order_ref));
        session()->flash('message', __('Payment Success'));
        $this->reset();
        $this->data = false;
    }//send price to customer

    public function render()
    {
        $orders = DB::table('orders')
            ->join('companies_services','orders.company_service','=','companies_services.id')
            ->join('users','orders.user','=','users.id')
            ->join('categories','companies_services.category_id','=','categories.id')
            ->select('orders.*','users.name','companies_services.company_id','categories.name AS category_name')
            ->where('companies_services.company_id', auth()->id())
            ->whereIn('orders.status',[$this->filter])
            ->wherein('orders.status',[1,5,6,8])
            ->paginate($this->numbers);
        return view('livewire.company.companies-orders-components',compact('orders'));
    }
}
