<h2 class="dashboard__heading"><?php echo $title; ?></h2>
<main class="blocks">
    <div class="blocks__grid">
        <div class="block">
            <h3 class="block__heading">Last Attendees Registered</h3>
            <?php foreach ($attendees as $attendee) : ?>
                <div class="block__content">
                    <p class="block__text">
                        <?php echo $attendee->user->name . " " . $attendee->user->lastname; ?>
                    </p> <!-- .block__text -->
                </div> <!-- .block__content -->
            <?php endforeach; ?> <!-- PHP: foreach -->
        </div> <!-- .block -->
        <div class="block">
            <h3 class="block__heading">Earnings</h3>
            <p class="block__text--quantity">$<?php echo $earnings; ?> USD</p>
        </div> <!-- .block -->
        <div class="block">
            <h3 class="block__heading">The conferences/workshops with the fewest available seats</h3>
            <?php foreach ($fewest_capacity as $event) : ?>
                <div class="block__content">
                    <p class="block__text">
                        <?php echo $event->name . " - " . $event->capacity . " Seats Availables"; ?>
                    </p> <!-- .block__text -->
                </div> <!-- .block__content -->
            <?php endforeach; ?> <!-- PHP: foreach -->
        </div> <!-- .block -->
        <div class="block">
            <h3 class="block__heading">The conferences/workshops with the most available seats</h3>
            <?php foreach ($most_capacity as $event) : ?>
                <div class="block__content">
                    <p class="block__text">
                        <?php echo $event->name . " - " . $event->capacity . " Seats Availables"; ?>
                    </p> <!-- .block__text -->
                </div> <!-- .block__content -->
            <?php endforeach; ?> <!-- PHP: foreach -->
        </div> <!-- .block -->
    </div> <!-- .blocks__grid -->
</main> <!-- .blocks -->