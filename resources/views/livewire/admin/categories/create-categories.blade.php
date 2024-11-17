<div>
    <div class="row shadow card-body p-3 m-3">
        <div class="">
            <form wire:submit.prevent="save">
                    <div class="col-lg-6">
                        <label>{{__('Name')}}</label>
                            <input type="text" name="" id="" class="form-control @error('name') is-invalid @enderror" placeholder="@error('name') {{ $message }} @enderror" wire:model.defer="name" />
                        @error('name') <span class="error text-danger text-sm-center">{{ $message }}</span> @enderror
                            <br>

                            <label>{{__('English Name')}}</label>
                            <input type="text" name="" id="" class="form-control @error('name_en') is-invalid @enderror" placeholder="@error('name') {{ $message }} @enderror" wire:model.defer="name_en" />
                        {{-- @error('name_en') <span class="error text-danger text-sm-center">{{ $message }}</span> @enderror --}}
                        <br>
                        <label>{{ __('Icons') }}</label>

                    <select class="form-control material-icons" wire:model="icons">
                        <option></option>
                        @forelse ($icon as $key => $val)
                            <option class="{{ $val }}" value="{{ $val }}" data-icon={{ $val }}>{{ $val }}
                            </option>
                        @empty

                        @endforelse
                    </select>


                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                <label>{{ __('Icons') }}</label>
                            </button>
                          </h2>
                          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse " aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                @forelse($icon as $key => $value)
                                <div class="btn-group  py-2 px-2" role="group" aria-label="Basic radio toggle button group">
                                    <input class="btn-check" wire:model="icons" value="{{ $key }}" autocomplete="off"  type="radio" name="icons" id="{{ $key }}">
                                    <label class="btn btn-outline-dark" for="{{ $key }}">
                                       {{ $value }}
                                       <span class="material-icons"><i class="material-icons {{ $value }}"></i>{{ $value }}</span>
                                    </label>
                                </div>
                                @empty

                                @endforelse
                            </div>
                          </div>
                        </div>

                      </div>


                    </div>
                    <div class="col-lg-6">
                        <div wire:ignore>
                            <label for="">اللغةر العربية</label>
                            <textarea  wire:model="commenttext" data-commenttext="@this" style="height: 500px" class="form-control editor col-12"></textarea>
                        </div>
                        <div wire:ignore>
                            <label for="">ENGLISH</label>
                            <textarea  wire:model="commenttexteng" data-commenttexteng="@this" style="height: 500px" class="form-control editor1 col-12"></textarea>
                        </div>
                        <br>
                    </div>

                    <br><br>

                    {{-- <span class="material-icons">adb</span> --}}
                    <button class="btn btn-primary btn-sm" type="submit"> <i class="fa fa-save"></i> {{__('t.save')}}</button>
            </form>
        </div>
    </div>
</div>


@section('js')
<script>
    function formatText (icon) {
        return $('<span class="material-icons"><i class="material-icons ' + $(icon.element).data('icon') + '"></i> ' + icon.text + '</span>');
    };

        $(document).ready(function() {
        $('.js-example-basic-single').select2(
            {
        // placeholder: "{{ __('t.select') }}",
        allowClear: true,
        templateSelection: formatText,
        templateResult: formatText
    }
        );
    });

    ClassicEditor
        .create( document.querySelector( '.editor' ))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                let details = $('.editor').data('commenttext');
                eval(details).set('commenttext', editor.getData())
            })
    });


    ClassicEditor
        .create( document.querySelector( '.editor1' ))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                let commenttexteng = $('.editor1').data('commenttexteng');
                eval(commenttexteng).set('commenttexteng', editor.getData())
            })
    });

</script>
@endsection
