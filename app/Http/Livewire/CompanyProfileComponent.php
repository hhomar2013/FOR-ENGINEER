<?php

namespace App\Http\Livewire;

use App\Models\companies_type;
use App\Models\Company;
use App\Traits\Helper;
use Livewire\Component;
use Livewire\WithFileUploads;

class CompanyProfileComponent extends Component
{
    use Helper;
    use WithFileUploads;
    public $name;
    public $photo;
    public $phone;
    public $about;
    public $fileName;
    public $password;
    public $rePassword;
    public $type_work;
    protected $listeners=['$refresh'];

    public function mount()
    {
        $company = Company::find(auth()->id());
        $this->name = $company->name;
        $this->phone = $company->phone;
        $this->about = $company->about;
        $this->fileName = $company->logo;
        $this->type_work = $company->ct_id;
    }

    public function formReset()
    {
        $this->name = null;
        $this->photo = null;
        $this->phone = null;
        $this->about = null;
    }

    public function save_profile()
    {

    if ($this->password == '' Or $this->rePassword == '')
    {
        $this->validate([
            'name'=>'required|min:3',
            'phone'=>'required',
            'type_work'=>'required'
        ],[
            '*.required'=>__('t.validate.required')
        ]);
        $company = Company::find(auth()->id());
        $company->update([
            'name'=>$this->name,
            'phone'=>$this->phone,
            'about'=>$this->about,
            'ct_id'=>$this->type_work,
        ]);

    }else{
        $this->validate([
            'name'=>'required|min:3',
            'phone'=>'required',
            'rePassword'=>'same:password|min:6'
        ],[
            '*.required'=>__('t.validate.required')
        ]);
        $company = Company::find(auth()->id());
        $company->update([
            'name'=>$this->name,
            'phone'=>$this->phone,
            'about'=>$this->about,
            'ct_id'=>$this->type_work,
            'password'=>bcrypt($this->rePassword)
        ]);
    }
        $this->emit('refresh-company-sidebar');
        $this->emit('refresh-company-user');
        $this->emitSelf('$refresh');
        session()->flash('message', __('t.Edit_message'));

    }

    public function update_image()
    {
        $this->validate([
            'photo' => 'image|max:2048', // 2MB Max
        ]);
        // $this->fileName = $this->photo->store('CompanyPhotos','public');
        $this->fileName = $this->ImageUpload($this->photo,'CompanyPhotos');
        $company = Company::find(auth()->id());
        $company->update([
            'logo'=> $this->fileName
        ]);
        $this->emit('company_topbar');
        $this->emit('refresh-company-sidebar');
        $this->emit('refresh-company-user');
        $this->emitSelf('$refresh');
        session()->flash('message', __('t.Edit_message'));

    }
    public function render()
    {

        $ct = companies_type::all();
        return view('livewire.company.company-profile-component',['ct'=>$ct]);
    }
}
