<main class="auth">
    <h2 class="auth__heading"><?php echo $title; ?></h2>
    <p class="auth__text">Recover your access on DevWebCamp</p>
    <?php require_once __DIR__ . '/../templates/alerts.php'; ?>
    <form action="/forgot" class="form" method="POST">
        <div class="form__field">
            <label for="email" class="form__label">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                class="form__input"
                placeholder="Your Email"
            />
        </div>
        <input type="submit" value="Send Instructions" class="form__submit"/>
    </form>
    <div class="actions">
        <a href="/login" class="actions__link">Already have an account? Log in</a>
        <a href="/signup" class="actions__link">Don’t have an account yet? Sign up</a>
    </div>
</main>