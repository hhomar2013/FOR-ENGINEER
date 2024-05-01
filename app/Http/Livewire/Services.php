<?php

namespace App\Http\Livewire;


use App\Models\companies_type;
use App\Models\service_provider_reservation;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Services extends Component
{
    use WithFileUploads;

    public $name,$phone,$address,$email,$disc,$type_work,$attach;

    protected $rules =[
        'name'=>'required',
        'phone'=>'required',
        'address'=>'required',
        'email'=>'required',
        'disc'=>'required',
        'type_work'=>'required',
        'attach'=>'MAX:2048',
    ];

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function form_reset()
    {
        $this->name = '';
        $this->phone = '';
        $this->address = '';
        $this->email = '';
        $this->disc = '';
        $this->type_work = '';
        $this->attach = '';
    }

    public function SendReservation()
    {

        $this->validate([
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'email'=>'required|email|unique:service_provider_reservations',
            'disc'=>'required',
            'type_work'=>'required',
            'attach'=>'required',
        ],[
            '*.required'=>__('t.validate.required')
        ]);
            $img = $this->attach->store('SPA','public');


        $spa = new service_provider_reservation();
        $spa->name =$this->name;
        $spa->email=$this->email;
        $spa->phone=$this->phone;
        $spa->address = $this->address;
        $spa->disc = $this->disc;
        $spa->type_work = $this->type_work;
        $spa->status = 0;
        $spa->attach=$img;
        $spa->save();
        $this->emit('refreshDashboard');
        session()->flash('message', __('t.message_reservation'));
        $this->form_reset();


    }

    public function export($filename)
    {
        return Storage::disk('public')->download($filename);
        // return response()->download(storage_path('SPA/bcZf0sm3EyPoQAPTX75My7AUUvoURs3UmFbTi8Is.pdf'));

    }

    public function render()
    {
        $ct = companies_type::where('status','1')->get();
        return view('livewire.site.services',['companiesType'=>$ct])->layout('layouts.site',['title'=>'Sevice Provider']);
    }
}
