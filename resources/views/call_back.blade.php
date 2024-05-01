@extends('layouts.site',['title' => __('t.home')])

@section('content')


    @if($request['status'] == 'paid')
        <style>
            .container {
                margin: auto;
                width: 100%;
            }
        </style>
        <div class="container text-center shadow-lg p-4">
                <div class="row">
                    <div class="col-12">
                        <span class="text-success p-3" style="margin: auto;width: 50%;font-size: 100px;"><i class="fa-regular fa-circle-check"></i></span>
                        <h4 class="text-success">{{__('Payment Success')}}</h4>
                        <label class="text-danger"> <span class="text-primary">{{__('reference number')}} : </span>  {{$request['id']}}</label>
                        <hr>
                    </div>

                    <a href="{{route('site.home')}}" class="btn btn-primary p-2"> {{__('Back To')}}  {{__('t.home')}}</a>
                </div>
        </div>

    @endif

    @if($request['status'] == 'failed')
        <h2 class="p-3 text-center text-danger shadow-lg">{{__('Unable to process the purchase transaction Please try again')}}</h2>

        <a href="{{route('site.home')}}" class="btn btn-primary p-3"><i class="fa fa-arrow-alt-circle-right"></i>  {{__('Back')}}</a>
    @endif





@endsection

@section('js')
    @if($request['status'] == 'paid')
        <script>
            {{--document.addEventListener("livewire:load", () => {--}}
            {{--    @this.on('playAudio', () => {--}}
            {{--        new Audio("{{url('asset/img/new-not.mp3')}}").play();--}}
            {{--    })--}}
            {{--});--}}
           Livewire.on()
        </script>
    @endif
    @include('message')
@endsection

