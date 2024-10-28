<?php

namespace App\Http\Livewire\Sitev2\User;

use App\Models\NewRequest;
use App\Models\requestOffers;
use App\Traits\Helper;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class ShowNewRequest extends Component
{
    use Helper;
    public $showRequest;
    public $dayes;
    public $offers;
    public $accepted= false;
    protected $listeners = ['refreshShowNewRequest' => '$refresh'];
    public function mount($id){
        $this->showRequest = NewRequest::query()->where('user_id',Auth::id())->where('id','=',$id)->first();

        if(!$this->showRequest){
            return redirect()->route('user.dashboard');
        }else{
            $this->offers = requestOffers::query()->where('nr_id',$this->showRequest->id)->get();
        }
    }

    public function getFile(){
        return $this->export($this->showRequest->attachment);
    }


    public function RejectOffer($id){
        // dd($id);
        $query = requestOffers::query()->find($id)->update([
            'status'=>3,
         ]);
         if($query){
             $this->emit('refreshShowNewRequest');
         }
    }

    public function AcceptOffer($id){

        $query = requestOffers::query()->find($id);
        requestOffers::query()->where('nr_id',$query['nr_id'])->whereNot('id',$id)->update([
            'status'=>3,
         ]);
        $query->update([
           'status'=>2,
        ]);
        // dd($query);
        if($query){
            // $this->accepted = true;
            $this->emit('refreshShowNewRequest');
        }
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
