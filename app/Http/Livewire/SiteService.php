<?php

namespace App\Http\Livewire;

use App\Models\categories;
use App\Models\companies_service;
use App\Models\companies_type;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Component\Console\Helper\Table;
use function PHPUnit\Framework\isNull;

class SiteService extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public  $filter_check_all = true;
    public $filter_check= [];
    protected $listeners = ['SiteServiceRefresh'=>'$refresh' , 'orderSend'=>'play'];

    public function play()
    {
        $this->emit('order_sendit');
        $this->emit('refreshDashboardAdmin');
    }
    public function clear_check()
    {
        $this->filter_check = [];
    }

    public function filter_check()
    {
        if (!$this->filter_check){
            $this->filter_check_all = true;
        }else{

            $this->filter_check_all = false;
        }
    }

    public function render()
    {


        $this->filter_check();

        $companies_service = companies_service::with(['company','categories'])->get()
            ->groupBy('company_id')
        ;

        $categories = categories::with(['child'=> function($q){$q->where('status',1);}])
            ->where('parent_id',null)
            ->Where('status','=',1)
            ->get();

        if ($this->filter_check_all == true)
        {
            $companies = Company::with(['company_type','company_service'])
            ->whereRelation('company_service',fn($q) => $q->where('status','1'))
            ->get();

        }
        else
        {
            $companies = Company::with(['company_type','company_service'])
                ->whereRelation('company_service',fn($q) => $q->whereIn('category_id',$this->filter_check)->where('status','1'))
                ->get();
        }

        $companies_types = companies_type::where('status',1)->get();
        return view('livewire.site.site-service',
            ['categories'=>$categories,'companies'=>$companies,
             'companies_service'=>$companies_service, 'companies_types'=>$companies_types]);
    }
}
