@section('title') {{ $categories->name }}@endsection
<div>
    @if ($show)
    @section('page_title')@include('site_tools_v2.page_title',['no'=>true])@endsection
    <div class="container-fluid" style="height: 50vh">
        <div class="col text-center py-5">
            <div class="col-12">
                <img src="{{ asset('asset/img/success-message.png') }}" alt="" class="w-25 h-50">
            </div>
            <div class="col-12">

                <h5>{{ __('Your Request has been sent Kindly wait offers') }}</h5>
            </div>
            <br>
            <div class="col-12">
                <a href="{{ route('site.index') }}" class="btn btn-primary rounded-4">{{ __('Go Home') }}</a>
            </div>
        </div>
    </div>
    @else
    @section('page_title')@include('site_tools_v2.page_title',['main_title'=> $categories->name ])@endsection
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-lg-3 py-2">
                {{-- Card Career type --}}
                <div class="card rounded-top-4">
                    <div class="card-header rounded-top-4  text-light p-3 text-center" style="background-color: var(--blue-color)">
                        <i class="fa-solid fa-check"></i> {{ __('Please select') }}
                    </div>
                    <div class="card-body">
                        {{-- <div class="row px-2 "> --}}
                        @foreach ($companiesType as $type )
                            <div class="btn-group d-grid gap-2 py-2 px-2" role="group" aria-label="Basic radio toggle button group">
                                <input class="btn-check" wire:model="companySelected" value="{{ $type->id }}" autocomplete="off"  type="radio" name="company" id="career-{{ $type->id }}">
                                <label class="btn btn-outline-dark" for="career-{{ $type->id }}">
                                    <i class="fa-solid fa-toolbox"></i>  {{ $type->name }}
                                </label>
                          </div>
                        @endforeach
                        {{-- </div> --}}
                        @error('companySelected')
                        <span class="text-danger">{{ __('t.select')}}</span>
                        @enderror
                    </div>
                </div>
                {{--End Card Career type --}}
            </div>
            <div class="col-lg-9 pb-5">
                {{-- <div id="description"></div> --}}
                {{-- @if($show) @endif --}}
                <div class="card shadow-lg rounded-4" style="background-color: var(--default1-color)">
                    <div class="card-body">
                        <form class="row g-3 p-2" autocomplete="off">
                            <div class="col-md-6">
                              <label for="" class="form-label">{{ __('Order Title') }}</label>
                              <input type="text" wire:model.defer="order_title" value="{{ $categories->name }}"
                               class="form-control rounded-4 @error('order_title') is-invalid @enderror" autocomplete="false">
                                @error('order_title')
                                   <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-7">
                                <label for="">{{ __('price') }}</label>
                                <div class="input-group pt-2">
                                    <div class="col">
                                        <div class="col-12">
                                            <input type="text" wire:model.defer="min_asked_price"
                                            class="form-control rounded-4 @error('min_asked_price') is-invalid @enderror" placeholder="{{ __('From') }}" aria-label="Username">
                                            @error('min_asked_price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                  </div>
                                  {{-- <span class="input-group-text"></span> --}}&nbsp;
                                      <div class="col">
                                        <div class="col-12">
                                            <input type="text" wire:model.defer="max_asked_price"
                                            class="form-control  rounded-4 @error('max_asked_price') is-invalid @enderror" placeholder="{{ __('To') }}" aria-label="Server">
                                        </div>
                                        @error('max_asked_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                      </div>

                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="inputEmail4" class="form-label">{{ __('Number of days') }}</label>
                                        <input type="number" min="1"   wire:model.defer="number_dayes" value="{{ $categories->name }}"
                                         class="form-control rounded-4 @error('number_dayes') is-invalid @enderror" autocomplete="false">
                                         @error('number_dayes') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputEmail4" class="form-label">{{ __('Last date for receiving offers') }}</label>
                                        <input type="date" min="1"   wire:model.defer="end_date" value="{{ $categories->name }}"
                                         class="form-control rounded-4  @error('end_date') is-invalid @enderror" autocomplete="false">
                                         @error('end_date') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-12" wire:ignore>

                              <label for="inputAddress" class="form-label">{{ __('Description') }}</label>
                              <textarea  wire:model.defer="description"  rows="5" id="description"></textarea>
                               @error('description') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>


                            <div class="col-md-12">
                                <label for="" class="form-label">{{ __('Attachments') }}</label>
                                <input class="form-control form-control-file  @error('attachment') is-invalid @enderror"
                                 type="file" accept="application/pdf" wire:model="attachment"/>
                                <span class="error text-secondary">{{ __('t.file_size') }}</span><br>
                                @error('attachment') <span class="error text-danger">{{ $message }}</span> @enderror

                            </div>

                            <div class="col-12">
                              <button type="submit" wire:click.prevent="sendRequest" class="btn btn-primary rounded-4"> <i class="fa-regular fa-paper-plane"></i>  {{ __('t.Submit') }}</button>
                            </div>

                            <div class="col-12">
                                <button type="submit" wire:click.prevent="$emitTo('admin-orders', 'get_data')" class="btn btn-danger rounded-4"> <i class="fa-regular fa-paper-plane"></i>  {{ __('t.Submit') }}</button>
                              </div>

                            <div wire:loading wire:target="sendRequest" class="spinner-border text-warning" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>


                          </form>
                    </div>

                </div>

            </div>
            {{-- <div class="col-lg-9">
                <div class="card " >
                    <div class="card-header text-bg-warning text-light p-3">
                        {{ __('Service Providers') }}
                    </div>
                    <div class="card-body" style="overflow-y:scroll; height:70vh;">

                            <div class="row row-cols-1 row-cols-md-3 g-1" >
                                @foreach ($companies as $company)
                                            <div class="col">
                                                <input wire:model="getCompany" type="radio" class="btn-check"  name="card" id="{{ $company->id }}" value="{{ $company->id }}">
                                                <label  class="btn  text-danger" for="{{ $company->id }}">
                                                    <div class="card border border-0">
                                                        <div class="card-body rounded text-bg-light shadow-lg">
                                                            <img src="{{ asset('asset/img/for.gif') }}" class="rounded-circle w-50 h-50" alt="">
                                                            <h5 class="card-title text-end"><i class="fa-regular fa-user"> </i> {{ $company->name }}</h5>
                                                             <hr>
                                                            <p class="card-text">{{ $company->about }}</p>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>

                                @endforeach
                            </div>


                    </div>
                    <div class="card-footer">
                        <div class="row p-2">
                            <div class="col-6 text-end">
                                <a href="" class="btn btn-primary rounded-pill">{{ __('t.Submit') }} <i class="fa-solid fa-paper-plane"></i></a>
                            </div>
                            <div class="col-6 text-start pagination pagination-sm" dir="ltr">
                                {{ $companies->links() }}
                            </div>

                        </div>

                    </div>
                </div>
            </div> --}}
        </div>


        <div class="col p-3">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                       {{ __('Show Order') }}
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        {!! $description !!}
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endif


</div>

@push('css')
{{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> --}}


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

@endpush


@push('js')
{{-- <script src="{{ asset('asset/js/summernote.min.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}

<script>
    $(document).ready(function() {
        $('#description').summernote(
        {
            fontNames: ['Arial','Cairo'],
        tabsize: 2,
        height: 200,
            callbacks: {
                onChange: function(contents, $editable) {
                    @this.set('description',contents);
                }
            }
            });
    });
</script>


<script>
    window.addEventListener('send_order', (event) => {
        new Audio("{{url('storage/sound/notification.mp3')}}").play();
    })
</script>


@endpush
