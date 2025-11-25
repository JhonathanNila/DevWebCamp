<main class="agenda">
    <h2 class="agenda__heading">Conferences and Workshops</h2>
        <p class="agenda__description">Conferences and Workshops delivered by experts in Web Development</p>
    <div class="events">
        <h3 class="events__heading">&lt;Conferences/></h3>
            <p class="events__date">January, 16 Friday</p>
        <div class="events__list slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($events['conferences_f'] as $event) : ?>
                    <?php include __DIR__ . '../../templates/event.php'; ?>
                <?php endforeach; ?> <!-- PHP: foreach  -->
            </div> <!-- .swiper-wrapper -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div> <!-- .events__list .slider .swiper -->
                <p class="events__date">January, 17 Saturday</p>
                <div class="events__list slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($events['conferences_s'] as $event) : ?>
                    <?php include __DIR__ . '../../templates/event.php'; ?>
                <?php endforeach; ?> <!-- PHP: foreach  -->
            </div> <!-- .swiper-wrapper -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div> <!-- .events__list .slider .swiper -->
    </div> <!-- .events -->
    <div class="events events--workshops">
        <h3 class="events__heading">&lt;Workshops/></h3>
            <p class="events__date">January, 16 Friday</p>
            <div class="events__list slider swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($events['workshops_f'] as $event) : ?>
                        <?php include __DIR__ . '../../templates/event.php'; ?>
                    <?php endforeach; ?> <!-- PHP: foreach  -->
                </div> <!-- .swiper-wrapper -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div> <!-- .events__list .slider .swiper -->
            <p class="events__date">January, 17 Saturday</p>
            <div class="events__list slider swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($events['workshops_s'] as $event) : ?>
                        <?php include __DIR__ . '../../templates/event.php'; ?>
                    <?php endforeach; ?> <!-- PHP: foreach  -->
                </div> <!-- .swiper-wrapper -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div> <!-- .events__list .slider .swiper -->
    </div> <!-- .events -->
</main> <!-- .agenda -->