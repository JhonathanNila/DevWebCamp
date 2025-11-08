<main class="auth">
    <h2 class="auth__heading"><?php echo $title; ?></h2>
    <p class="auth__text">Log in on DevWebCamp</p>
    <form action="" class="form">
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
        <div class="form__field">
            <label for="password" class="form__label">Password</label>
            <input 
                type="password" 
                name="password" 
                id="password" 
                class="form__input"
                placeholder="Your Password"
            />
        </div>
        <input type="submit" value="Log in" class="form__submit"/>
    </form>
    <div class="actions">
        <a href="/signup" class="actions__link">Don’t have an account yet? Sign up</a>
        <a href="/forgot" class="actions__link">I forgot my password</a>
    </div>
</main>