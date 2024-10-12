<?php

namespace App\Http\Livewire\Sitev2\User;

use App\Models\NewRequest;
use App\Traits\Helper;
use Livewire\Component;
use Illuminate\Support\Str;

class ShowNewRequest extends Component
{
    use Helper;
    public $showRequest;
    public $dayes;
    public function mount($id){
        $this->showRequest = NewRequest::query()->find($id);

    }

    public function getFile(){
        return $this->export($this->showRequest->attachment);
    }
    public function render()
    {
        $pdf = Str::endsWith($this->showRequest->attachment, '.pdf');
        $this->showRequest['ext'] = $pdf;
        $this->showRequest['dayeName'] = $this->DayName($this->showRequest->created_at);
        $this->showRequest['dayes'] = $this->TypeOfDayes($this->showRequest->asked_dayes);
        return view('livewire.sitev2.user.show-new-request');
    }
}
