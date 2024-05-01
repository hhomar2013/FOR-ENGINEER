<?php

namespace App\Http\Livewire;

use App\Models\service_site_price;
use Livewire\Component;

class ServiceSitePrice extends Component
{
    public  $update= false;
    public $category_id;
    public $type;
    public $price = 0;
    public $present = 0;
    public $service_id;
    public $service_price = 0;
    public $service_discount = 0;
    public $after_discount = 0;
    public $service =false;
    protected $listeners = ['$refresh' , 'delete_ssp'=>'destroy'];

//    public function change(){if ($this->price <= 0) {$this->price = 0;}if ($this->present <= 0) { $this->present = 0;}}



    public function discount()
    {
        if ($this->service_discount == 0){
            $this->after_discount =0;
        }else{
            $price = $this->service_price;
            $discount = $this->service_discount;
            $after_discount = $this->after_discount = value($price) * value($discount) / 100;
            $this->after_discount = $price - $after_discount;
        }

    }

    public function type_change()
    {
            if ($this->type == 1){
                $this->service =true;
            }else{
                $this->service = false;
                $this->service_price = 0;
                $this->service_discount= 0;
            }
    }

    public function destroy($id)
    {
        $ssp = service_site_price::find($id);
        $ssp->delete();
        session()->flash('message', __('t.Delete_message'));
        $this->emitSelf('$refresh');
        $this->reset();
    }

    public function cancel()
    {
        $this->update=false;
        $this->service = false;
        $this->reset();
    }

    public function edit($id)
    {
        $ssp = service_site_price::findOrFail($id);
        if ($ssp->count()){
            $this->category_id = $ssp->category_id;
            $this->type = $ssp->type;
            $this->price = $ssp->price;
            $this->present = $ssp->present;
            $this->service_id = $ssp->id;
            $this->update =true;
            if ($this->type == 1){
                $this->service = true;
                $this->service_price = $ssp->service_price;
                $this->service_discount = $ssp->discount;
                $this->after_discount = $ssp->after_discount;
            }else{
                $this->service = false;
                $this->service_price = 0;
                $this->service_discount = 0;
                $this->after_discount = 0;
            }
        }

    }//end of edit

    public function update()
    {

        $ssp = service_site_price::find($this->service_id);

            $this->validate(
                [
                    'category_id'=>'required:unique',
                    'type'=>'required',
                    'price'=>'required',
                    'present'=>'required',
                    'service_price'=>'required',
                    'service_discount'=>'required',
                    'after_discount'=>'required'
                ]);
            $ssp->update([
                'category_id'=>$this->category_id,
                'type'=>$this->type,
                'price'=>$this->price,
                'present'=>$this->present,
                'service_price'=>$this->service_price,
                'discount'=>$this->service_discount,
                'after_discount'=>$this->after_discount
            ]);
            session()->flash('message', __('t.Edit_message'));
            $this->emitSelf('$refresh');
            $this->cancel();

    }

    public function save()
    {
        $this->validate([
            'category_id'=>'required:unique',
            'type'=>'required',
            'price'=>'required',
            'present'=>'required',
            'service_price'=>'required',
            'service_discount'=>'required',
            'after_discount'=>'required'

        ]);
        $ssp = service_site_price::where('category_id',$this->category_id)->get();
        if ($ssp->count())
        {
             session()->flash('error', __('This Record is Existed'));
             $this->emitSelf('$refresh');
        }
        else
        {
            $save= service_site_price::create([
                'category_id'=> $this->category_id,
                'type'=> $this->type,
                'price' =>$this->price,
                'present' => $this->present,
                'service_price'=>$this->service_price,
                'discount'=>$this->service_discount,
                'after_discount'=>$this->after_discount
            ]);
            if ($save)
            {
                session()->flash('message', __('t.Add_message'));
                $this->emitSelf('$refresh');
                $this->reset();
            }
            else
            {session()->flash('error', __('t.Error_message'));}
        }

    }//end of save


    public function render()
    {

        $service_price = service_site_price::with('categories')->latest()->paginate();
        $categories = \App\Models\categories::with(['child'])
            ->whereNull('parent_id')
            ->whereRelation('children','status','=',1)
            ->get();
        return view('livewire.admin.service_price.index',['sp'=>$service_price,'categories'=>$categories]);
    }
}
