<fieldset class="form__fieldset">
    <legend class="form__legend">Personal Information</legend>
    <div class="form__field">
        <label for="name" class="form__label">Name</label>
        <input 
            type="text" 
            name="name" 
            id="name" 
            class="form__input"
            placeholder="Speaker Name"
            value="<?php echo $speaker->name ?? ''; ?>"
        />
    </div> <!-- .form__field -->
    <div class="form__field">
        <label for="lastname" class="form__label">Last name</label>
        <input 
            type="text" 
            name="lastname" 
            id="lastname" 
            class="form__input"
            placeholder="Speaker Last name"
            value="<?php echo $speaker->lastname ?? ''; ?>"
        />
    </div> <!-- .form__field -->
    <div class="form__field">
        <label for="city" class="form__label">City</label>
        <input 
            type="text" 
            name="city" 
            id="city" 
            class="form__input"
            placeholder="Speaker City"
            value="<?php echo $speaker->city ?? ''; ?>"
        />
    </div> <!-- .form__field -->
    <div class="form__field">
        <label for="contry" class="form__label">Contry</label>
        <input 
            type="text" 
            name="contry" 
            id="contry" 
            class="form__input"
            placeholder="Speaker Contry"
            value="<?php echo $speaker->contry ?? ''; ?>"
        />
    </div> <!-- .form__field -->
    <div class="form__field">
        <label for="photo" class="form__label">Photo</label>
        <input 
            type="file" 
            name="photo" 
            id="photo" 
            class="form__input form__input--file"
        >
    </div> <!-- .form__field -->
    <?php if(isset($speaker->current_photo)) : ?>
        <p class="form__text">Current Photo:</p>
        <div class="form__photo">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $speaker->photo; ?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/speakers/' . $speaker->photo; ?>." type="image/webp">
                <img src="<?php echo $_ENV['HOST'] . '/img/speakers/' . $speaker->photo; ?>.png" alt="Speaker's Photo">
            </picture>
        </div>
    <?php endif; ?>
</fieldset> <!-- .form__fieldset -->
<fieldset class="form__fieldset">
    <legend class="form__legend">Extra Information</legend>
    <div class="form__field">
        <label for="tags_input" class="form__label">Areas of expertise (separated by commas)</label>
        <input 
            type="text"
            id="tags_input" 
            class="form__input"
            placeholder="E.g. Node.js, PHP, CSS, Laravel, UX/UI"
        />
        <div id="tags" class="form__list"></div>
        <input type="hidden" name="tags" value="<?php echo $speaker->tags ?? ''; ?>">
    </div> <!-- .form__field -->
</fieldset> <!-- .form__fieldset -->
<fieldset class="form__fieldset">
    <legend class="form__legend">Social Media</legend>
    <div class="form__field">
        <div class="form__container-icon">
            <div class="form__icon">
                <i class="fa-brands fa-facebook"></i>
            </div> <!-- .form__icon -->
            <input 
                type="text"
                class="form__input--social"
                name="social[facebook]"
                placeholder="Facebook"
                value="<?php echo $social->facebook ?? ''; ?>"
            />
        </div> <!-- .form__container-icon -->
    </div> <!-- .form__field -->
    <div class="form__field">
        <div class="form__container-icon">
            <div class="form__icon">
                <i class="fa-brands fa-x-twitter"></i>
            </div> <!-- .form__icon -->
            <input 
                type="text"
                class="form__input--social"
                name="social[twitter]"
                placeholder="X (Twitter)"
                value="<?php echo $social->twitter ?? ''; ?>"
            />
        </div> <!-- .form__container-icon -->
    </div> <!-- .form__field -->
    <div class="form__field">
        <div class="form__container-icon">
            <div class="form__icon">
                <i class="fa-brands fa-youtube"></i>
            </div> <!-- .form__icon -->
            <input 
                type="text"
                class="form__input--social"
                name="social[youtube]"
                placeholder="Youtube"
                value="<?php echo $social->youtube ?? ''; ?>"
            />
        </div> <!-- .form__container-icon -->
    </div> <!-- .form__field -->
    <div class="form__field">
        <div class="form__container-icon">
            <div class="form__icon">
                <i class="fa-brands fa-instagram"></i>
            </div> <!-- .form__icon -->
            <input 
                type="text"
                class="form__input--social"
                name="social[instagram]"
                placeholder="Instagram"
                value="<?php echo $social->instagram ?? ''; ?>"
            />
        </div> <!-- .form__container-icon -->
    </div> <!-- .form__field -->
    <div class="form__field">
        <div class="form__container-icon">
            <div class="form__icon">
                <i class="fa-brands fa-tiktok"></i>
            </div> <!-- .form__icon -->
            <input 
                type="text"
                class="form__input--social"
                name="social[tiktok]"
                placeholder="TikTok"
                value="<?php echo $social->tiktok ?? ''; ?>"
            />
        </div> <!-- .form__container-icon -->
    </div> <!-- .form__field -->
    <div class="form__field">
        <div class="form__container-icon">
            <div class="form__icon">
                <i class="fa-brands fa-github"></i>
            </div> <!-- .form__icon -->
            <input 
                type="text"
                class="form__input--social"
                name="social[github]"
                placeholder="Github"
                value="<?php echo $social->github ?? ''; ?>"
            />
        </div> <!-- .form__container-icon -->
    </div> <!-- .form__field -->
</fieldset> <!-- .form__fieldset -->