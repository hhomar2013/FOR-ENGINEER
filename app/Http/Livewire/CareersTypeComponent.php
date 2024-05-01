<?php

namespace App\Http\Livewire;

use App\Models\CareersType;
use Livewire\Component;
use Livewire\WithPagination;

class CareersTypeComponent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $numbers = 5;
    public $search;
    public $name;
    public $update_id;
    public $category_id;
    public $update = false;
    public  $listeners =['destroy'=>'destroy'];



    public function pages_num()
    {
        $this->numbers;
        $this->resetPage();
//        $this->emit('$refresh');
    }

    public function edit($id)
    {
        $career = CareersType::query()->find($id);

        $this->name = $career->name;
        $this->update_id = $career->id;
        $this->update = true;
    }

    public function cancel()
    {
        $this->name = null;
        $this->update_id = null;
        $this->update = false;
    }


    public function save()
    {
        CareersType::query()->create(['name'=>$this->name]);
        session()->flash('message',__('t.Add_message'));
        $this->emitSelf('$refresh');
        $this->cancel();
    }

    public function destroy($id)
    {
        $ct = CareersType::query()->find($id);
        $ct->delete();
        session()->flash('message',__('t.Delete_message'));
        $this->emitSelf('$refresh');
        $this->cancel();
    }

    public function render()
    {
        $career_type = CareersType::query()
            ->where('name','like','%'.$this->search.'%')
            ->orderBy('id','desc')->paginate($this->numbers);
        return view('livewire.admin.CareersType.index',compact('career_type'));
    }
}
