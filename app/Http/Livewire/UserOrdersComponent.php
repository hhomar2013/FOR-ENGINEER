<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\order_invoice;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class UserOrdersComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $numbers = 10;
    public $search;
    public $status;
    public $date;
    public $update=false;
    public $order_show = false;
    public $details_show;
    public $category_name;
    public $order_invoice=false;
    public $ask_price;
    public $invoice_status = '';
    public $refuse;
    public $order_ref;
    public $amount;
    public $comments;
    public $order_table;
    protected $listeners = ['destroy'=>'destroy'];


    public function refuse_action()
    {
        $this->validate([
           'invoice_status'=>'required',
           'refuse'=>'required'
        ]);
        $order = Order::query()->where('order_ref',$this->order_ref)->first();
        $orderInvoice = order_invoice::query()->where('order_ref',$this->order_ref)->first();

        if ($this->invoice_status == 0){
//            $orderInvoice->update(['']);
        }elseif ($this->invoice_status == 1){
            $orderInvoice->update(['status_comment'=>$this->refuse,'status'=>2,'user'=>auth()->id()]);
            session()->flash('error',__('Rejected Successfully'));
            $order->update(['status'=>7]);
            $this->reset();
            $this->order_invoice=false;
        }
    }

    public function show_paid($order_ref)
    {
        $this->order_invoice=true;
        $this->order_ref = $order_ref;
        $order_invoice = order_invoice::query()->where('order_ref',$order_ref)->first();

        if ($order_invoice->status == 0){
            $this->ask_price = $order_invoice->ask_price;
            $this->comments= $order_invoice->comment;
            $this->amount = value($order_invoice->ask_price) * 100;
        }elseif($order_invoice->status == 1){
            $this->order_invoice =false;
            $this->reset();
            session()->flash('error',__('This transaction already collected!'));
        }elseif ($order_invoice->status == 2){
            $this->order_invoice =false;
            $this->reset();
            session()->flash('error',__('The transaction is deleted'));

        }

    }

    public function show_order($value)
    {
        $orders = Order::query()->with('orderComments')
            ->join('companies_services','orders.company_service','=','companies_services.id')
            ->join('categories','companies_services.category_id','=','categories.id')
            ->select('orders.*', 'categories.name')
            ->Where('orders.id',$value)->first();
        $this->order_table = $orders;
//        dd($this->order_table);
        $this->details_show = $orders->details;
        $this->category_name = $orders->name;
        $this->order_show = true;
    }

    public function back_to_table()
    {
        $this->order_show =  false;
        $this->order_invoice = false;
    }


    public function pages_num()
    {
        $this->numbers;
        $this->resetPage();
//        $this->emit('$refresh');
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->update(['status'=>4]);
        $this->emitSelf('$refresh');
        $this->emit('cart-refresh');
        session()->flash('message', __('t.Delete_message'));
    }

    public function render()
    {
//            $orders = DB::table('orders')
            $orders = Order::query()
            ->join('companies_services','orders.company_service','=','companies_services.id')
            ->join('categories','companies_services.category_id','=','categories.id')
            ->select('orders.*', 'categories.name')
            ->Where('orders.status','like','%'. $this->status.'%')
            ->Where('orders.updated_at','like','%'. $this->date.'%')
            ->where('orders.user',auth()->id())->orderBy('id','desc')
            ->paginate($this->numbers);
//            dd($orders);

        return view('livewire.site.UserOrders.user-orders-component',['orders' => $orders]);
    }
}
