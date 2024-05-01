<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Livewire\Component;
use Livewire\WithPagination;

class AdminUserManagement extends Component
{
    /*
     * s_user = system users = 1
     * v_user = visiting users = 2
     * c_users = companies users = 3
     */

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $numbers = 10;
    public $users = 1;
    public $search;

    public function pages_num()
    {
        $this->numbers;
        $this->resetPage();
    }

    public function show_users($users)
    {
        $this->users = $users;

    }

    public function edit($id ,$model)
    {
//        if ($model == 'company'){
//
//        }
    }

    public function companies()
    {
        $company_users =
            Company::query()
                ->whereNot('role','=',0)
                ->where('name','like','%'.$this->search.'%')
                ->paginate($this->numbers);

        return $company_users;
    }
    public function render()
    {

        $system_users = Admin::query()
            ->whereNot('role','=','0')
            ->where('name','like','%'.$this->search.'%')
            ->paginate($this->numbers);

        $visiting_users = User::query()
            ->whereNot('email','=','user@app.com')
            ->where('name','like','%'.$this->search.'%')
            ->paginate($this->numbers);

        $company_users =
            Company::query()
                ->whereNot('role','=',0)
                ->where('name','like','%'.$this->search.'%')
                ->paginate($this->numbers);


        $total_system_users = $system_users->total();
        $total_visiting_users = $visiting_users->total();
        $total_company_users = $company_users->total();
        return view('livewire.admin.admin-user-management',
            compact('system_users','visiting_users','total_visiting_users','company_users','total_system_users','total_company_users'));
    }
}
