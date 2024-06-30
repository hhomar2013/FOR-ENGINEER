<div>
    <div class="row shadow card-body p-3 m-3">
        <div class="col-lg-6 col-md-12">
            <form wire:submit.prevent="save">

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
                    <br><br>
                    <div wire:ignore >
                        <textarea  wire:model.defer="commenttext" data-commenttext="@this" style="height: 500px" class="form-control editor col-12"></textarea>
                    </div>
                    <br>
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

</script>
@endsection
