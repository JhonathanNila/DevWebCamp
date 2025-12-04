<main class="register">
    <h2 class="register__heading"><?php echo $title; ?></h2>
    <p class="register__description">Choose a Ticket Bundle</p>
    <div class="ticket-bundles__grid">
        <div class="pass">
            <h3 class="pass__name">Free Pass</h3>
            <ul class="pass__list">
                <li class="pass__item">Virtual access to DevWebCamp</li>
            </ul> <!-- .pass__list -->
            <p class="pass__price">$0</p>
            <form method="POST" action="/register/free" class="">
                <input type="submit" value="Take Free Pass" class="ticket-bundles__submit">
            </form> <!-- form -->
        </div> <!-- .pass -->
        <div class="pass">
            <h3 class="pass__name">On-Site Pass</h3>
            <ul class="pass__list">
                <li class="pass__item">On-Site access to DevWebCamp</li>
                <li class="pass__item">Two-day Pass</li>
                <li class="pass__item">Access to Conferences and Workshops</li>
                <li class="pass__item">Access to the Recordings</li>
                <li class="pass__item">Event T-shirt</li>
                <li class="pass__item">Food and drinks included</li>
            </ul> <!-- .pass__list -->
            <p class="pass__price">$199</p>
            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container"></div>
                </div>
            </div> <!-- #smart-button-container -->
        </div> <!-- .pass -->
        <div class="pass">
            <h3 class="pass__name">Virtual Pass</h3>
            <ul class="pass__list">
                <li class="pass__item">Virtual access to DevWebCamp</li>
                <li class="pass__item">Two-day Pass</li>
                <li class="pass__item">Access to the Conference and Workshop links</li>
                <li class="pass__item">Access to the Recordings</li>
            </ul> <!-- .pass__list -->
            <p class="pass__price">$49</p>
            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container--virtual"></div>
                </div>
            </div> <!-- #smart-button-container -->
        </div> <!-- .pass -->
    </div> <!-- .ticket-bundles__grid -->
</main> <!-- .register -->
<script src="https://www.paypal.com/sdk/js?client-id=ASAzsdq-yH6PT47IuQZeR6Njduc3GTVz-IG4imceSTGijMrHgetMFz7BOey6n_o3n7iZx-DV-f4QFvkW&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
<script>
    function initPayPalButton() {
        paypal.Buttons({
        style: {
            shape: 'rect',
            color: 'blue',
            layout: 'vertical',
            label: 'pay',
        },
        createOrder: function(data, actions) {
            return actions.order.create({
            purchase_units: [{"description":"1","amount":{"currency_code":"USD","value":199}}]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                const dat = new FormData();
                dat.append('bundle_id', orderData.purchase_units[0].description);
                dat.append('payment_id', orderData.purchase_units[0].payments.captures[0].id);
                fetch('/register/payment', {
                    method: 'POST',
                    body: dat
                })
                .then(response => response.json())
                .then(result => {
                    if(result.result) {
                        actions.redirect('http://0.0.0.0:3000/register/conferences');
                    }
                });
            });
        },
        onError: function(err) {
            console.log(err);
        }
        }).render('#paypal-button-container');
        paypal.Buttons({
        style: {
            shape: 'rect',
            color: 'blue',
            layout: 'vertical',
            label: 'pay',
        },
        createOrder: function(data, actions) {
            return actions.order.create({
            purchase_units: [{"description":"2","amount":{"currency_code":"USD","value":49}}]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                const dat = new FormData();
                dat.append('bundle_id', orderData.purchase_units[0].description);
                dat.append('payment_id', orderData.purchase_units[0].payments.captures[0].id);
                fetch('/register/payment', {
                    method: 'POST',
                    body: dat
                })
                .then(response => response.json())
                .then(result => {
                    if(result.result) {
                        actions.redirect('http://0.0.0.0:3000/register/conferences');
                    }
                });
            });
        },
        onError: function(err) {
            console.log(err);
        }
        }).render('#paypal-button-container--virtual');
    }
    initPayPalButton();
</script>