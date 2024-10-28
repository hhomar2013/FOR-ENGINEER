<?php
namespace App\Traits;

use App\Models\NewRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

trait Helper {

    public function TypeOfDayes($model){
        if ($model == 1) {
        return  __('Day') ;
        }elseif($model == 2){
        return  __('Tow Dayes');
        }elseif($model <=10 ||$model == 3){
        return $model  . ' ' . __('Dayes');
        }elseif($model > 10){
        return $model  . ' ' . __('Day');
        }
        return null;
    }


    public function ImageUpload($request ,$directory ){
         return $request->store($directory, 'public');
    }

    public function DayName($request){
        return Carbon::parse($request)->diffForHumans();
    }

    public function DateNow($request){
        return Carbon::parse($request)->format('Y-m-d');
    }

    public function export($query) {
        return Storage::disk('public')->download($query);
    }//Export Files

    public function fetchRows($rows ,$previousRowCount)
    {
        $rows = NewRequest::latest()->get();

        // Check if new row is added
        if (count($rows) > $previousRowCount) {
            // $this->emit('newRowAdded'); // Emit an event if a new row is added
            $this->dispatchBrowserEvent('send_order');
            $this->dispatchBrowserEvent('send_order_message');

        }

        // Update the previous row count
        $previousRowCount = count($rows);
    }

}
?>
