    <form  wire:submit.prevent="Order_Comments({{$order_id}})">
        <label for="">{{__('Respond to the request')}}</label>
        <div wire:ignore >
            <textarea  wire:model.defer="commenttext" data-commenttext="@this" rows="5" class="form-control editor"></textarea>

        </div>
        <hr/>
        <button class="btn btn-primary">{{__('t.Submit')}}
            <i class="far fa-paper-plane"></i>
            @include('load',['name'=>'Order_Comments'])
        </button>
    </form>




    <script>
        // ,{
        //     toolbar: [ 'heading', '|', 'bold', 'italic', '|', 'bulletedList', 'numberedList', 'blockQuote'],
        // }
        ClassicEditor
            .create( document.querySelector( '.editor' ))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    let details = $('.editor').data('commenttext');
                    eval(details).set('commenttext', editor.getData())
                })
            });
    </script>











