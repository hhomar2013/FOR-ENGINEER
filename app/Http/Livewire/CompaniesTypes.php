<?php

namespace App\Http\Livewire;

use App\Models\companies_type;
use Livewire\Component;
use Livewire\WithPagination;

class CompaniesTypes extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $numbers = 5;
    public $search;
    public $name;
    public $ct_id;
    public $update = false;
    protected $listeners =['delete_ct'=>'destroy' ,'refresh'=>'$refresh'];


    public function save()
    {
        $this->validate([
            'name'=>'required',
        ],[
            '*.required'=>__('t.validate.required')
        ]);

        companies_type::create(['name'=>$this->name]);
        session()->flash('message', __('t.Add_message'));
        $this->name = '';
    }

    public function edit($id)
    {
        $this->update = true;
        $ct = companies_type::findOrFail($id);
        $this->name =   $ct->name;
        $this->ct_id =  $ct->id;
    }

    public function cancel()
    {
        $this->update = false;
        $this->name = '';
        $this->id ='';
        $this->emitSelf('$refresh');
    }

    public function update()
    {
        $this->validate([
            'name'=>'required',
        ],[
            '*.required'=>__('t.validate.required')
        ]);
        try {
            $ct = companies_type::findOrFail($this->ct_id);
            $ct->update(['name'=>$this->name]);
            session()->flash('message', __('t.Edit_message'));
            $this->update = false;
            $this->ct_id = '';
            $this->name = '';
        } catch (\Exception $e) {
            session()->flash('error', $e);
        }
    }

    public function destroy($id)
    {

        $ct = companies_type::findOrFail($id);
        $ct->delete();
        session()->flash('message', __('t.Delete_message'));

    }

    public function pages_num()
    {
        $this->numbers;
        $this->resetPage();
//        $this->emit('$refresh');
    }

    public function render()
    {
        $ct = companies_type::where('name','like','%'.$this->search.'%')
            ->latest()
            ->paginate($this->numbers);
        return view('livewire.admin.companies_types.index',['companiesTypes'=> $ct])->layout('layouts.admin1');
    }
}
