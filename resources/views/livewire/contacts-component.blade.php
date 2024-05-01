<div>

    <!-- Contact Start -->
    <div class="contact wow fadeInUp">
        <div class="container">
            <div class="section-header text-center">
                <p>{{__('Get In Touch')}}</p>
                <h2>{{__('For Any Query')}}</h2>
            </div>

            @if(session()->has('message'))
                <div class="alert alert-success text-center p-4 alert-dismissible fade show " role="alert">
                    <strong>{{__('Payment Success')}}</strong> {{session('message')}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-info {{app()->getLocale() == 'ar' ?'text-right' : ''}}">
                        <div class="contact-item">
                            <i class="flaticon-address"></i>
                            <div class="contact-text ">
                                <h2>{{__('Location')}}</h2>
                                <p>{{__('t.site.0')}}</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="flaticon-call"></i>
                            <div class="contact-text ">
                                <h2>{{__('t.phone')}}</h2>
                                <p>{{__('t.site.1')}}</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="flaticon-send-mail"></i>
                            <div class="contact-text ">
                                <h2>{{__('t.email')}}</h2>
                                <p>{{__('t.site.2')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <div id="success"></div>

                        <form id="contactForm"  wire:submit.prevent="sentMessage">
                            <div class="control-group">
                                <input type="text" class="form-control" wire:model.defer="name" id="name" placeholder="{{__('Action Name')}}"  />
                                <p class="help-block text-danger">
                                    @error('name') <span class="error">{{ $message }}</span> @enderror
                                </p>
                            </div>
                            <div class="control-group">
                                <input type="email" wire:model.defer="email" class="form-control" id="email" placeholder="{{__('Email Address')}}"  />
                                <p class="help-block text-danger">
                                    @error('email') <span class="error">{{ $message }}</span> @enderror
                                </p>
                            </div>
                            <div class="control-group">
                                <input type="text" wire:model.defer="subject" class="form-control" id="subject" placeholder="{{__('subject')}}" />
                                <p class="help-block text-danger">
                                    @error('subject') <span class="error">{{ $message }}</span> @enderror
                                </p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" wire:model.defer="message" id="message" placeholder="{{__('Message')}}"></textarea>
                                <p class="help-block text-danger">
                                    @error('message') <span class="error">{{ $message }}</span> @enderror
                                </p>
                            </div>
                            <div>
                                <button class="btn" id="sendMessageButton">{{__('t.Submit')}}  {{__('Message')}}
                                    @include('load',['name'=>'sentMessage'])
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

</div>
