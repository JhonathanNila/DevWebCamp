<main class="auth">
    <h2 class="auth__heading"><?php echo $title; ?></h2>
        <p class="auth__text">Thank you for confirming your account; you can now log in using your email and password.</p>
    <?php require_once __DIR__ . '/../templates/alerts.php'; ?>
    <?php if(isset($alerts['success'])) : ?>
    <div class="actions--center">
        <a href="/login" class="actions__link">Log in</a>
    </div>
    <?php endif; ?>
</main>