<?php

namespace App\Http\Livewire\Sitev2\User;

use App\Models\CareersType;
use App\Models\categories;
use App\Models\companies_type;
use App\Models\Company;
use App\Models\NewRequest;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class NewRequestComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refresh'=>'$refresh'];
    public $categories;
    public $companiesType;
    public $companySelected;
    public $getCompany;
    public $show = false;
    public $description;
    public $attachment;
    public $filename;
    public $order_title;
    public $min_asked_price;
    public $max_asked_price;
    public $number_dayes;
    public $end_date;
    // public $companies = '';
    public function mount($id)
    {
        $this->categories = categories::query()->find($id);
        $this->companiesType = companies_type::query()->get();
        $this->order_title = $this->categories->name;


    }


    public function updatedAttachment()
    {
        $this->validate([
           'attachment'=>'max:2048', // 2MB Max
        ]);
    }

    public function updatedSelectedOption($value){
        $this->companySelected = $value;

    }

    protected $rules =[
        'order_title'=>'required',
        'min_asked_price'=>'required',
        'max_asked_price'=>'required',
        'number_dayes'=>'required|min:1',
        'end_date'=>'required',
        'description'=>'required',
        'attachment'=>'max:2048',
        'companySelected'=>'required'
    ];




    public function show(){
        $this->show = true;
        $this->emit('refresh');
    }

    public function sendRequest(){

        if ($this->attachment != ''){
            $this->filename = $this->attachment->store('Request Attachment','public');
        }

        $this->validate();
        $request = NewRequest::query()->create([
            'order_refrence' => rand(1000,9999),
            'order_title' => $this->order_title,
            'min_asked_price' => $this->min_asked_price,
            'max_asked_price' => $this->max_asked_price,
            'asked_dayes' => $this->number_dayes,
            'description' => $this->description,
            'attachment' => $this->attachment != '' ? $this->filename : 0,
            'offer_end_date' => $this->end_date,
            'category_id' => $this->categories->id,
            'companies_type_id' =>$this->companySelected ,
            'user_id' => Auth::user()->id,
        ]);

        if ($request) {
            // session()->flash('message',__('Your Request has been sent Kindly wait offers'));
            $this->show();
        }


    }


    public function render()
    {

        $companies = Company::query()->where('ct_id','=',$this->companySelected)->paginate(12);
        return view('livewire.sitev2.user.new-request-component',['companies'=>$companies]);
    }
}
