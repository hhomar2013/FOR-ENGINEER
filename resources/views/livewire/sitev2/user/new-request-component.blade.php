@section('title') {{ $categories->name }}@endsection
@section('page_title')@include('site_tools_v2.page_title',['main_title'=> $categories->name])@endsection

<div >

    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-lg-3">
                {{-- Card Career type --}}
                <div class="card ">
                    <div class="card-header bg-primary text-light p-3 text-center">
                        <i class="fa-solid fa-check"></i> {{ __('Please select') }}
                    </div>
                    <div class="card-body">
                        {{-- <div class="row px-2 "> --}}
                        @foreach ($companiesType as $type )
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input class="btn-check" wire:model="companySelected" wire:click="$set('show', 'true')" value="{{ $type->id }}" autocomplete="off"  type="radio" name="company" id="career-{{ $type->id }}">
                                <label class="btn btn-outline-dark" for="career-{{ $type->id }}">
                                {{ $type->name }}
                                </label>
                          </div>
                        @endforeach
                        {{-- </div> --}}
                    </div>
                </div>
                {{--End Card Career type --}}
            </div>
            <div class="col-lg-9">

                @if($show)
                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3 p-2" autocomplete="off">
                                <div class="col-md-6">
                                  <label for="inputEmail4" class="form-label">{{ __('Order Title') }}</label>
                                  <input type="text" wire:model.defer="order_title" value="{{ $categories->name }}" class="form-control rounded-4" autocomplete="false">
                                </div>
                                <div class="col-md-7">
                                    <label for="">{{ __('price') }}</label>
                                    <div class="input-group pt-2">
                                        <input type="text" wire:model.defer="min_asked_price" class="form-control rounded-4" placeholder="{{ __('From') }}" aria-label="Username">
                                        {{-- <span class="input-group-text"></span> --}}
                                        <input type="text" wire:model.defer="max_asked_price" class="form-control  rounded-4" placeholder="{{ __('To') }}" aria-label="Server">
                                      </div>
                                </div>

                                <div class="col-md-3">
                                    <label for="inputEmail4" class="form-label">{{ __('Number of days') }}</label>
                                    <input type="number" min="1"   wire:model.defer="number_dayes" value="{{ $categories->name }}" class="form-control rounded-4" autocomplete="false">
                                  </div>

                                <div class="col-12">
                                  <label for="inputAddress" class="form-label">{{ __('Description') }}</label>
                                    <textarea name="" id="editor" wire:model.defer="description" cols="30" rows="5" class="form-control rounded-4"></textarea>
                                </div>
                                <div class="col-12"  wire:ignore.self>
                                    <label for="formFileSm" class="form-label">{{ __('t.attachment') }}</label>
                                    <input class="form-control form-control-file  @error('') is-invalid @enderror" id="formFileSm" type="file" accept="application/pdf"  wire:model=""/>
                                    <span class="error text-secondary">{{ __('t.file_size') }}</span>
                                    @error('attach') <span class="error text-danger">{{ $message }}</span> @enderror

                                </div>
                                <div class="col-md-6">
                                  <label for="inputCity" class="form-label">City</label>
                                  <input type="text" class="form-control" id="inputCity">
                                </div>
                                <div class="col-md-4">
                                  <label for="inputState" class="form-label">State</label>
                                  <select id="inputState" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                  </select>
                                </div>
                                <div class="col-md-2">
                                  <label for="inputZip" class="form-label">Zip</label>
                                  <input type="text" class="form-control" id="inputZip">
                                </div>
                                <div class="col-12">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                      Check me out
                                    </label>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <button type="submit" class="btn btn-primary">Sign in</button>
                                </div>
                              </form>
                        </div>

                    </div>
                @endif


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
    </div>


</div>

@push('js')
{{-- <script src="{{ asset('asset/js/ckeditor.js') }}"></script> --}}
{{-- <script>
    document.addEventListener('livewire:load', function () {
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('description', editor.getData());
                });
            })
            .catch(error => {
                console.error(error);
            });
    }); --}}
<script>
    ClassicEditor
        .create( document.querySelector( '.editor' ))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                let details = $('.editor').data('commenttext');
                eval(details).set('commenttext', editor.getData())
            })
    });
</script>
@endpush
