<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Switcher extends Component
{

    public Model $model;
    public string $field;
    public bool $isPublished;
    protected $listeners =['$refresh'];

    public function mount(){

        $this->isPublished = (bool) $this->model->getAttribute($this->field);
    }
    public function render()
    {
        return view('livewire.switcher');
    }

    public function updating($field, $value)
    {
        $field1 = $this->field;
        $update = $this->model->setAttribute($field1 , $value)->save();
        if ($update){
            session()->flash('message', __('t.status_message'));
            $this->emit('$refresh');

        }


    }

}
