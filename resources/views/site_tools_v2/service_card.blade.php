@section('css')
    <style>
        .grid-item{
            box-align: right;
        }
    </style>
@endsection

@forelse ($query as $val)
    @forelse ($val->child as $item)
    <div class="col-lg-3 col-md-6 element-item grid-item {{ $val->id }}" data-aos="fade-up" data-aos-delay="100" >
        <div class="service-item  position-relative">
            <p>{{ $val->name }}</p>
        <div class="icon" >
            <i class="material-icons">{{ $item->icone }}</i>
        </div>
        <h3>{{ $item->name }}</h3>
        {{-- <p class="truncate-overflow">
            {!! $val->info !!}
        </p> --}}
        <p></p>
        <a href="{{ route('site.service.show',['id'=>$item->id]) }}" class="readmore stretched-link">{{ __('Read more') }}<i class="bi {{ app()->getLocale() =='en' ? 'bi-arrow-right' :'bi-arrow-left' }}"></i></a>
        </div>
    </div><!-- End Service Item -->
    @empty

    @endforelse

@empty

@endforelse

