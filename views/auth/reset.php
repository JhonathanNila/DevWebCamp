<main class="auth">
    <h2 class="auth__heading"><?php echo $title; ?></h2>
    <p class="auth__text">Enter your new Password</p>
    <?php require_once __DIR__ . '/../templates/alerts.php'; ?>
    <?php if($valid_token) : ?>
    <form class="form" method="POST">
        <div class="form__field">
            <label for="password" class="form__label">New Password</label>
            <input 
                type="password" 
                name="password" 
                id="password" 
                class="form__input"
                placeholder="Your New Password"
            />
        </div>
        <input type="submit" value="Set New Password" class="form__submit"/>
    </form>
    <?php endif; ?>
    <div class="actions">
        <a href="/login" class="actions__link">Already have an account? Log in</a>
        <a href="/signup" class="actions__link">Don’t have an account yet? Sign up/a>
    </div>
</main>