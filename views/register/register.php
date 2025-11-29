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
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
            
            });
        },
        onError: function(err) {
            console.log(err);
        }
        }).render('#paypal-button-container');
    }
    initPayPalButton();
</script>