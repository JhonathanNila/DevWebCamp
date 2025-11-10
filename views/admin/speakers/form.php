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
            name="name" 
            id="name" 
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
            name="file" 
            id="file" 
            class="form__input form__input--file"
        >
    </div> <!-- .form__field -->
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
            value="<?php echo $speaker->city ?? ''; ?>"
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
                name="social-media[facebook]"
                placeholder="Facebook"
                value="<?php echo $speaker->facebook ?? ''; ?>"
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
                name="social-media[twitter]"
                placeholder="X (Twitter)"
                value="<?php echo $speaker->twitter ?? ''; ?>"
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
                name="social-media[youtube]"
                placeholder="Youtube"
                value="<?php echo $speaker->youtube ?? ''; ?>"
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
                name="social-media[instagram]"
                placeholder="Instagram"
                value="<?php echo $speaker->instagram ?? ''; ?>"
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
                name="social-media[tiktok]"
                placeholder="TikTok"
                value="<?php echo $speaker->tiktok ?? ''; ?>"
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
                name="social-media[github]"
                placeholder="Github"
                value="<?php echo $speaker->github ?? ''; ?>"
            />
        </div> <!-- .form__container-icon -->
    </div> <!-- .form__field -->
</fieldset> <!-- .form__fieldset -->