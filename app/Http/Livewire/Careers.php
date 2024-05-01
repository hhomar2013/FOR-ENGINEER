<?php

namespace App\Http\Livewire;

use App\Mail\SendCareerRequest;
use App\Models\CareerRequest;
use App\Models\CareersType;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Careers extends Component
{
    use WithFileUploads;
    public $name;
    public $phone;
    public $attach;
    public $status;
    public $type;
    public $email;

    protected $rules =[
        'name'=>'required',
        'phone'=>'required',
        'type'=>'required',
        'attach'=>'required',
    ];

//MAX:2048

    public function form_reset()
    {
        $this->name='';
        $this->attach = '';
        $this->phone = '';
        $this->type = '';
    }

    public function save()
    {
        $this->validate();
        $attach = $this->attach->store('CareerRequest','public');
       $CR = CareerRequest::query()->create([
           'name'=>$this->name,
           'phone'=>$this->phone,
           'c_type'=>$this->type,
           'cv'=>$attach,
           'email'=> auth()->user()->email,
           'status'=>0
       ]);
      $mail = Mail::to(auth()->user()->email)->send(new SendCareerRequest($CR));
      if ($mail){
          session()->flash('message', __('t.message_reservation'));
          $this->form_reset();
      }

    }//end save


    public function render()
    {
        $careers_type = CareersType::query()->where('status',1)->get();
        return view('livewire.site.careers',compact('careers_type'));
    }
}
