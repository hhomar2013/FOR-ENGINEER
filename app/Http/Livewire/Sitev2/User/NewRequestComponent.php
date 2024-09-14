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
    // public $companies = '';
    public function mount($id)
    {
        $this->categories = categories::query()->find($id);
        $this->companiesType = companies_type::query()->get();

    }

    public function updatedSelectedOption($value){
        $this->companySelected = $value;
    }



    public function render()
    {

        $companies = Company::query()->where('ct_id','=',$this->companySelected)->paginate(12);
        return view('livewire.sitev2.user.new-request-component',['companies'=>$companies]);
    }
}
