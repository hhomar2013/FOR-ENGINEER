
<div class="container-fluid">



    <div class="card text-right mb-3 p-4" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{asset('asset/img/for.gif')}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{__('Invoice')}}</h5>
                    <p class="card-text"> عرض السعر المطلوب هو : {{ $ask_price }} {{ __('SAR') }}</p>
                    <p class="card-text"> {{__('comments')}} : {{ $comments }} {{ __('SAR') }}</p>
                   <div class="card-text">
                       <select name="" id="" class="form-control" wire:model="invoice_status">
                           <option>{{__('t.select')}}</option>
                           <option value="0" class="text-success">{{__('Accept Offer')}}</option>
                           <option value="1" class="text-danger">{{__('Reject Offer')}}</option>
                       </select>
                       @error('invoice_status') <span class="error">{{ $message }}</span> @enderror
                   </div>
                    <p class="card-text">
                        @if($invoice_status == 0)
                        <hr>
                            <a href="{{route('payInvoice',['amount'=>$amount,'id'=>$order_ref])}}" class="btn btn-primary p-2  btn-block"><i class="fa fa-wallet"></i> {{__('Pay Now')}}</a>
                        @elseif ($invoice_status == 1)
                        <hr>
                        <form>
                            <div>
                                <label for="">{{__('reason of refuse')}}</label>
                                <textarea class="form-control @error('refuse') is-invalid @enderror" wire:model="refuse" rows="3"></textarea><br>
                                @error('refuse') <span class="text-danger">{{ $message }}</span> @enderror
                                <button  class="btn btn-primary p-2  btn-block" wire:click.prevent="refuse_action"><i class="fa fa-paper-plane"></i> {{__('t.Submit')}}</button>
                            </div>
                        </form>

                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
{{--@include('message')--}}
</div>


