<div class="p-4 m-3 col-lg-8 text-right shadow-lg">
    <div class="container">
        <div class="row">
            <form accept-charset="UTF-8" action="https://api.moyasar.com/v1/payments.html" method="POST">
                <input type="hidden" name="callback_url" value="{{route('call_back')}}" />
                <input type="hidden" name="publishable_api_key" value="{{config('moyasar.publishable_key')}}" />
                <input type="hidden" name="amount" value="{{$amount}}" />
                <input type="hidden" name="source[type]" value="creditcard" />
                <input type="hidden" name="description" value="{{$details}}" />

                <input type="text" name="source[name]" class="form-control"/>
                <input type="number" name="source[number]" maxlength="16" class="form-control"/>
                <input type="number" name="source[month]" maxlength="2" class="form-control"/>
                <input type="number" name="source[year]" maxlength="2" class="form-control"/>
                <input type="number" name="source[cvc]" maxlength="3" class="form-control"/>
                <button  type="button" id="submit_button_id">{{__('Pay Now')}} {{$price}} {{__('SAR')}}</button>
            </form>
        </div>
    </div>

</div>

<script>


    // Capture the form submit button
    $("#submit_button_id").click(function(event) {
        // Prevent default browser behavior
        event.preventDefault();

        // Serialize data
        var form_data = $("#form_id").serialize();

        // Send the POST request to Moyasar
        $.ajax({
            url: "https://api.moyasar.com/v1/payments",
            type: "POST",
            data: form_data,
            dataType: "json",
        })
            // uses `.done` callback to handle a successful AJAX request
            .done(function(data) {
                // Grab the payment ID
                var paymentId = data.id;
                // ... save your ID somewhere save in your backend.

                // Redirect the user to the bank page.
                window.location.href = data.source.transaction_url;
            });
    });
</script>
