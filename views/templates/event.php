<div class="event swiper-slide">
    <p class="event__time"><?php echo $event->time->time; ?></p>
    <div class="event__info">
        <h4 class="event__name"><?php echo $event->name; ?></h4>
            <p class="event__intro"><?php echo $event->description; ?></p>
        <div class="event__speaker-info">
            <picture>
                <source srcset="/img/speakers/<?php echo $event->speaker->photo; ?>.webp" type="image/webp">
                <source srcset="/img/speakers/<?php echo $event->speaker->photo; ?>." type="image/webp">
                <img class="event__speaker-photo" loading="lazy" width="200" height="300" src="/img/speakers/<?php echo $event->speaker->photo; ?>.png" alt="Speaker's Photo">
            </picture> <!-- picture -->
            <p class="event__speaker-name"><?php echo $event->speaker->name . " " . $event->speaker->lastname; ?></p>
        </div> <!-- .event__speaker-info -->
    </div> <!-- .event__info -->
</div> <!-- .event .swiper-slide-->