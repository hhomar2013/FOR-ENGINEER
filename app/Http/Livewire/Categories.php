<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Categories extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $numbers = 5;
    public $search;
    public $name;
    public $name_en;
    public $update_id;
    public $category_id;
    public $update = false;
    public $delete = false;
    public  $listeners =['delete_ct'=>'destroy'];
    public $icons,$commenttext;


    public function pages_num()
    {
        $this->numbers;
        $this->resetPage();
//        $this->emit('$refresh');
    }

    public function edit($id)
    {
       $categories = \App\Models\categories::findOrfail($id);
       if ($categories->parent_id != null){
           $this->category_id = $categories->parent_id;
       }
       $this->name = $categories->name;
       $this->update_id = $categories->id;
       $this->update = true;
    }

    public function cancel()
    {
        $this->name = null;
        $this->update_id = null;
        $this->update = false;
    }

    public function update()
    {
        $this->validate([
            'name'=>'required',
//            'category_id'=>'required'
        ]);
        $categories = \App\Models\categories::find($this->update_id);
        if ( $this->category_id == null )
        {
            $categories->update(['name'=>$this->name ]);
        }else{
            $categories->update(['name'=>$this->name ,'parent_id'=>$this->category_id]);
        }

        session()->flash('message', __('t.Edit_message'));
        $this->name = '';
        $this->category_id = '';
        $this->update =false;
    }

    public function destroy($id)
    {
        \App\Models\categories::find($id)->delete();
        session()->flash('message', __('t.Delete_message'));
    }

    public function save()
    {
        $this->validate([
            'name'=>'required'
        ]);
        \App\Models\categories::create([
            'name'=> [
                'en' =>$this->name_en,
                'ar' => $this->name,
            ],
            'icone'=>$this->icons,
            'info'=>$this->commenttext

        ]);
        session()->flash('message', __('t.Add_message'));
        $this->name = '';
        $this->reset();
    }

    public function render()
    {
        $categories = \App\Models\categories::with(['child','children'])
            ->whereNull('parent_id')
            ->where('name','like','%'.$this->search.'%')
            ->latest()->paginate($this->numbers);
            $icon= config('material_icons.icons');

            // dd($icon);
        return view('livewire.admin.categories.index',compact('categories','icon'))->layout('layouts.admin1');
    }
}
