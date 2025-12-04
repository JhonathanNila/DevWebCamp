<main class="page">
    <h2 class="page__heading"><?php echo $title; ?></h2>
    <p class="page__description">Your Pass - We recommend saving it; you can share it on Social Media</p>
    <div class="ticket-virtual">
        <div class="ticket ticket--<?php echo strtolower($register->bundle->name); ?> ticket--access">
            <div class="ticket__content">
                <h4 class="ticket__logo">&#60;DevWebCamp/></h4>
                <p class="ticket__plan"><?php echo $register->bundle->name; ?></p>
                <p class="ticket__name"><?php echo $register->user->name . " " . $register->user->lastname; ?></p>
            </div> <!-- .pass__content -->
            <p class="ticket__code">#<?php echo $register->token; ?></p>
        </div> <!-- .pass .pass--free -->
    </div> <!-- .virtual-pass -->
</main> <!-- .page -->