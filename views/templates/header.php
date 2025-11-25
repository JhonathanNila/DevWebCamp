<header class="header">
    <div class="header__container">
        <nav class="header__navigation">
                <?php if(is_auth()) : ?>
                    <a href="<?php echo is_admin() ? '/admin/dashboard' : '/register'; ?>" class="header__link">Administration</a>
                    <form action="/logout" class="header__form" method="POST">
                        <input type="submit" value="Log out" class="header__submit">
                    </form>
                <?php else : ?>
                    <a href="/signup" class="header__link">Sign up</a>
                    <a href="/login" class="header__link">Log in</a>
                <?php endif; ?>
        </nav>
        <div class="header__content">
            <a href="/">
                <h1 class="header__logo">
                    &#60;DevWebCamp/>
                </h1>
            </a>
            <p class="header__text"> January 16 - 17, 2026</p>
            <p class="header__text header__text--format"> On-Site | Online</p>
            <a href="/signup" class="header__button">Buy Pass</a>
        </div>
    </div>
</header>
<div class="bar">
    <div class="bar__content">
        <a href="/">
            <h2 class="bar__logo">
                &#60;DevWebCamp/>
            </h2>
        </a>
        <nav class="navigation">
            <a href="/devwebcamp" class="navigation__link <?php echo current_page('/devwebcamp') ? 'navigation__link--current' : ''; ?>">Event</a>
            <a href="ticket-bundles" class="navigation__link <?php echo current_page('/ticket-bundles') ? 'navigation__link--current' : ''; ?>">Ticket Bundles</a>
            <a href="conferences-workshops" class="navigation__link <?php echo current_page('/conferences-workshops') ? 'navigation__link--current' : ''; ?>">Conferences / Workshops</a>
            <a href="signup" class="navigation__link <?php echo current_page('/signup') ? 'navigation__link--current' : ''; ?>">Buy Passes</a>
        </nav>
    </div>
</div>