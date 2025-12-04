<h2 class="page__heading"><?php echo $title; ?></h2>
    <p class="page__description">Choose up to 5 events to attend in person</p>
<div class="events-registers">
    <main class="events-registers__list">
        <h3 class="events-registers__heading--conferences">&lt;Conferences/></h3>
            <p class="events-registers__date">January, 16 Friday</p>
        <div class="events-registers__grid">
            <?php foreach ($events['conferences_f'] as $event) : ?>
                    <?php include __DIR__ . '/event.php'; ?>
            <?php endforeach; ?> <!-- PHP: foreach  -->
        </div> <!-- .events-registers__grid -->
        <p class="events-registers__date">January, 17 Saturday</p>
        <div class="events-registers__grid">
            <?php foreach ($events['conferences_s'] as $event) : ?>
                    <?php include __DIR__ . '/event.php'; ?>
            <?php endforeach; ?> <!-- PHP: foreach  -->
        </div> <!-- .events-registers__grid -->
        <h3 class="events-registers__heading--workshops">&lt;Workshops/></h3>
            <p class="events-registers__date">January, 16 Friday</p>
        <div class="events-registers__grid events--workshops">
            <?php foreach ($events['workshops_f'] as $event) : ?>
                    <?php include __DIR__ . '/event.php'; ?>
            <?php endforeach; ?> <!-- PHP: foreach  -->
        </div> <!-- .events-registers__grid -->
        <p class="events-registers__date">January, 17 Saturday</p>
        <div class="events-registers__grid events--workshops">
            <?php foreach ($events['workshops_s'] as $event) : ?>
                    <?php include __DIR__ . '/event.php'; ?>
            <?php endforeach; ?> <!-- PHP: foreach  -->
        </div> <!-- .events-registers__grid -->
    </main> <!-- .events-registers__list -->
    <aside class="register">
        <h2 class="register__heading">Registration</h2>
        <div id="reg-summ" class="register-summ"></div> <!-- .reg-summ -->
        <div class="register__gift">
            <label for="gift" class="register__label">Select a gift</label>
            <select name="" id="gift" class="register__select">
                <option value="">-- Select --</option>
                <?php foreach($gifts as $gift) : ?>
                    <option value="<?php echo $gift->id; ?>"><?php echo $gift->name; ?></option>
                <?php endforeach; ?> <!-- PHP: foreach  -->
            </select> <!-- .register__select -->
        </div> <!-- .register__gift -->
        <form id="register" class="form" method="POST">
            <div class="form__field">
                <input type="submit" value="Register" class="form__submit form__submit--full">
            </div>
        </form>
    </aside> <!-- .register -->
</div> <!-- .events-registers -->