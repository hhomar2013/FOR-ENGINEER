<?php

namespace App\Http\Livewire\Sitev2\User;

use App\Models\CareersType;
use App\Models\categories;
use App\Models\companies_type;
use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class NewRequestComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $categories;
    public $companiesType;
    public $companySelected;
    public $getCompany;
    public $show = false;
    public $description='';
    public $order_title;
    public $number_dayes;
    // public $companies = '';
    public function mount($id)
    {
        $this->categories = categories::query()->find($id);
        $this->companiesType = companies_type::query()->get();
        $this->order_title = $this->categories->name;

    }

    public function updatedSelectedOption($value){
        $this->companySelected = $value;

    }

    protected $rules =[
        'name'=>'required',
        'phone'=>'required',
        'type'=>'required',
        'attach'=>'required',
    ];

    public function show(){
        $this->show = true;
    }

    public function sendRequest(){

    }


    public function render()
    {

        $companies = Company::query()->where('ct_id','=',$this->companySelected)->paginate(12);
        return view('livewire.sitev2.user.new-request-component',['companies'=>$companies]);
    }
}
