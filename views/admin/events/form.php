<fieldset class="form__fieldset">
    <legend class="form__legend">Event Information</legend>

    <div class="form__field">
        <label for="name" class="form__label">Event Name</label>
        <input 
            type="text"
            class="form__input"
            id="name" 
            name="name" 
            placeholder="Event Name"
            value="<?php echo $event->name; ?>"
        />
    </div> <!-- .form__field -->

    <div class="form__field">
        <label for="description" class="form__label">Description</label>
        <textarea
            class="form__input"
            id="description"
            name="description" 
            placeholder="Event Description"
            rows="8"
        ><?php echo $event->description; ?></textarea>
    </div> <!-- .form__field -->

    <div class="form__field">
        <label for="category" class="form__label">Category</label>
            <select 
                class="form__select"
                id="category"
                name="category_id" 
            >
                <option value="">- Select -</option>
                <?php foreach($categories as $category) : ?>
                    <option <?php echo($event->category_id === $category->id) ? 'selected' : '';?> value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                <?php endforeach; ?>
            </select>
    </div> <!-- .form__field -->

    <div class="form__field">
        <label for="category" class="form__label">Select Day</label>

        <div class="form__radio">
            <?php foreach($days as $day) : ?>
                <div>
                    <label for="<?php echo strtolower($day->name); ?>"><?php echo $day->name; ?></label>
                    <input 
                        type="radio"
                        id="<?php echo strtolower($day->name); ?>"
                        name="day" 
                        value="<?php echo $day->id; ?>"
                        <?php echo ($event->day_id === $day->id) ? 'checked' : ''; ?>
                    >
                </div>
            <?php endforeach; ?>
        </div> <!-- .form__radio -->

        <input type="hidden" name="day_id" value="<?php echo $event->day_id; ?>">
    </div> <!-- .form__field -->

    <div id="time" class="form__field">
        <label class="form__label">Select Time</label>

        <ul id="time" class="time">
            <?php foreach($time as $hour) : ?>
                <li data-time-id="<?php echo $hour->id ?>" class="time__hour time__hour--disable"><?php echo $hour->time; ?></li>
            <?php endforeach; ?>
        </ul> <!-- .time -->

        <input type="hidden" name="time_id" value="<?php echo $event->time_id; ?>">
    </div> <!-- .form__field -->
</fieldset> <!-- .form__fieldset -->

<fieldset class="form__fieldset">
    <legend class="form__legend">Extra Information</legend>

    <div class="form__field">
        <label for="speakers" class="form__label">Speaker</label>
        <input 
            type="text" 
            id="speakers" 
            class="form__input"
            placeholder="Search Speaker"
        />
        <ul id="speakers-list" class="speakers-list"></ul>

        <input type="hidden" name="speaker_id" value="<?php echo $event->speaker_id; ?>">
    </div> <!-- .form__field -->

    <div class="form__field">
        <label for="capacity" class="form__label">Available Seats</label>
        <input 
            type="number"
            min="1"
            class="form__input"
            id="capacity"
            name="capacity"
            placeholder="E.g. 20"
            value="<?php echo $event->capacity; ?>"
        />
    </div> <!-- .form__field -->
    
</fieldset> <!-- .form__fieldset -->