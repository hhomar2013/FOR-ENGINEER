<?php

namespace App\Http\Livewire\Admin\Accountant;

use App\Models\account_balance;
use App\Models\Company;
use Livewire\Component;

class CompaniesAccountant extends Component
{
    public  $companyName = 0;
    public $Print_name;
    public $info = [];
    public $compInfo;

    public function companyChange()
{
        $id = $this->companyName;
        $companies = account_balance::query()->where('company_id',$id)->with(['orders','companies']);
        $this->info = $companies->get();
        $this->compInfo = $companies->first();

    }

    public function render()
    {
        $companies = Company::query()->where('status',1)->get();
        return view('livewire.admin.accountant.companies-accountant',compact('companies'));
    }
}
