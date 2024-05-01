<?php

namespace App\Http\Livewire;

use App\Models\categories;
use App\Models\companies_service;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CompanyServiceComponent extends Component
{
    public $old_id;
    public $service;
    public $s_name;
    public $service_id;
    public $update=false;
    protected $listeners =['$refresh','delete_ct'=>'destroy'];

    public function destroy($id)
    {
       $cs = companies_service::find($id)->delete();
       if ($cs){

           session()->flash('message', __('t.Delete_message'));
           $this->emitSelf('$refresh');
           $this->reset();
       }
    }


    public function cancel()
    {
        $this->emitSelf('$refresh');
        $this->reset();
        $this->update = false;
    }

    public function edit($id)
    {
        $cs = companies_service::find($id);
        $this->service = $cs->category_id;
        $this->service_id = $id;
        $this->old_id = $cs->category_id;
       $this->update = true;
    }

    public function update()
    {
        $company_id =auth()->id();
        $new_cate = $this->service;
        $cs = companies_service::query()->whereNot('category_id',$this->old_id)->where('category_id',$new_cate)->where('company_id',$company_id)->first();
        if ($cs){
            session()->flash('error', __('This Record is Existed'));
        }else{
         $cs =  companies_service::find($this->service_id)->update(['category_id'=>$this->service]);
            session()->flash('message', __('t.Edit_message'));
            $this->emitSelf('$refresh');
            $this->reset();
        }
    }

    public function save()
    {
        $this->validate([
           'service'=>'required'
        ]);


        $cs= companies_service::where('category_id',$this->service)->where('company_id',auth()->id())->first();
        if ($cs){
            session()->flash('error', __('This Record is Existed'));
        }else{
            companies_service::create([
                'category_id'=>$this->service,
                'company_id'=>auth()->id(),
                'status'=>0
            ]);

        session()->flash('message', __('t.Add_message'));
        $this->emitSelf('$refresh');
        }





    }
    public function render()
    {
//        dd(\App\Models\categories::with('child'));
//        $categories = \App\Models\categories::with(['child','children'])
//            ->whereNull('parent_id')->where('status',1)->get();

        // $categories = DB::table('service_site_prices')
        //     ->join('categories','service_site_prices.category_id','=','categories.id')
        //     ->select('categories.id','categories.name','categories.status AS category_status','service_site_prices.status','service_site_prices.deleted_at')
        //     ->where('categories.status','=',1)
        //     ->where('service_site_prices.status','=',1)
        //     ->whereNull('service_site_prices.deleted_at')
        //     ->get();



    $categories = categories::query()
    // ->whereNotNull('parent_id')
    ->get();
    // dd($categories);
        $company_service = companies_service::with('categories')
            ->where('company_id',auth()->id())
            ->get();
        return view('livewire.company.company-service-component',['categories'=>$categories,'company_service'=>$company_service]);
    }
}
