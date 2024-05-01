<?php

namespace App\Http\Livewire;

use App\Mail\CompanyMail;
use App\Models\Company;
use App\Models\logs;
use App\Models\service_provider_reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Spa extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $numbers = 10;
    protected $spa;
    public $date_from;
    public $date_to;
    public $search;
//    public $status = 0;
    protected $listeners =['$refresh'];

    public function pages_num()
    {
        $this->numbers;
        $this->resetPage();
//        $this->emit('$refresh');
    }

    public function mount()
    {
//        $this->date_from = Carbon::now()->format('Y-m-d');
//        $this->date_to = Carbon::now()->format('Y-m-d');
        // $this->spa = service_provider_reservation::paginate($this->pages);
        // dd($this->spa);
    }



    public function filter_date()
    {
        $this->date_from;

//        $this->date_to;

    }

    public function spa_action($id,$action)
    {
        $spa =service_provider_reservation::find($id);
        if ($action == 'approve')
        {
             logs::create([
                'log'=> $spa->name. 'تمت الموافقة على طلب الالتحاق الخاص ب '  ,
                'from'=>auth()->id()
            ]);
            $spa->update(['approve'=>0]);
            $random = rand(6,999999);
            $spa['password'] = $random;
            Company::create([
                'name'=>$spa->name,
                'email'=>$spa->email,
                'password'=>bcrypt($spa->password),
                'phone'=>$spa->phone,
                'about'=>$spa->disc,
                'ct_id'=>$spa->type_work
            ]);
             Mail::to($spa->email)->send(new CompanyMail($spa));
            session()->flash('message', __('Approved Successfully'));



        }else{
            logs::create([
                'log'=> $spa->name . 'تم الرفض على طلب الالتحاق الخاص ب ',
                'from'=>auth()->id()
            ]);
            $spa->update(['approve'=>1,'status'=>0]);
            session()->flash('error', __("Rejected Successfully"));
        }
        $this->emitSelf('$refresh');

    }

    public function export($id)
    {
        $spa = service_provider_reservation::find($id);
        return Storage::disk('public')->download($spa->attach);
    }//Export Files


    public function render()
    {
        $spa = service_provider_reservation::with('companies_types')
            ->where('created_at','like' ,'%'.$this->date_from.'%')
            ->where('name','like' ,'%'.$this->search.'%')
//            ->where('status','=',$this->status)
            ->paginate($this->numbers);
        return view('livewire.admin.spa',['spa'=>$spa])->layout('layouts.admin1');
    }
}
