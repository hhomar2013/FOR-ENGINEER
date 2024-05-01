    <div class="col-md-6 col-lg-4">
        @include('message')
        <div class="newsletter">
            <h2>{{ trans('t.newsletter') }}</h2>
            <p>
                {{ trans('t.newsletterinfo') }}
            </p>
            <div class="form">
                <form wire:submit.prevent="send_email">
                    <input class="form-control" placeholder="{{ trans('t.email') }}" wire:model="email">
                    <button type="submit" class="btn">{{ trans('t.Submit') }} <i class="far fa-paper-plane"></i></button>
                    <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                </form>
            </div>
        </div>
    </div>
