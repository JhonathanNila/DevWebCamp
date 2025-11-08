<main class="auth">
    <h2 class="auth__heading"><?php echo $title; ?></h2>
    <p class="auth__text">Sign up on DevWebCamp</p>
    <form action="" class="form">
        <div class="form__field">
            <label for="name" class="form__label">Name</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="form__input"
                placeholder="Your Name"
            />
        </div>
        <div class="form__field">
            <label for="lastname" class="form__label">Last name</label>
            <input 
                type="text" 
                name="lastname" 
                id="lastname" 
                class="form__input"
                placeholder="Your Last name"
            />
        </div>
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
        <div class="form__field">
            <label for="password2" class="form__label">Repeat Password</label>
            <input 
                type="password" 
                name="password2" 
                id="password2" 
                class="form__input"
                placeholder="Repeat Password"
            />
        </div>
        <input type="submit" value="Sign up" class="form__submit"/>
    </form>
    <div class="actions">
        <a href="/login" class="actions__link">Already have an account? Log in</a>
        <a href="/forgot" class="actions__link">I forgot my password</a>
    </div>
</main>