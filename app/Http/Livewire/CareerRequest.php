<?php

namespace App\Http\Livewire;

use App\Models\service_provider_reservation;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class CareerRequest extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $numbers = 5;
    public $search;
    protected $listeners =['$refresh'];

    public function pages_num()
    {
        $this->numbers;
        $this->resetPage();
//        $this->emit('$refresh');
    }//end Pages num

    public function export($id)
    {
        $CR = \App\Models\CareerRequest::query()->find($id);
        return Storage::disk('public')->download($CR->cv);
    }//Export Files


    public function render()
    {
        $CR = \App\Models\CareerRequest::query()
            ->where('name','like','%'.$this->search.'%')
            ->orWhere('phone','like','%'.$this->search.'%')
            ->orWhere('email','like','%'.$this->search.'%')
            ->paginate($this->numbers);
        return view('livewire.admin.career-request',compact('CR'));
    }
}
