<?php
    include_once __DIR__ . '/conferences-workshops.php';
?>
<section class="summary">
    <div class="summary__grid">
        <div <?php aos_animation(); ?> class="summary__block">
            <p class="summary__text summary__text--number"><?php echo $speakers_total; ?></p>
            <p class="summary__text">Speakers</p>
        </div> <!-- .summary__block -->
        <div <?php aos_animation(); ?> class="summary__block">
            <p class="summary__text summary__text--number"><?php echo $conferences_total; ?></p>
            <p class="summary__text">Conferences</p>
        </div> <!-- .summary__block -->
        <div <?php aos_animation(); ?> class="summary__block">
            <p class="summary__text summary__text--number"><?php echo $workshops_total; ?></p>
            <p class="summary__text">Workshops</p>
        </div> <!-- .summary__block -->
        <div <?php aos_animation(); ?> class="summary__block">
            <p class="summary__text summary__text--number">500</p>
            <p class="summary__text">Attendees</p>
        </div> <!-- .summary__block -->
    </div> <!-- .summary__grid -->
</section> <!-- .summary -->
<section class="speakers">
    <h2 class="speakers__heading">Speakers</h2>
        <p class="speakers__description">Meet the DevWebCamp Experts</p>
        <div class="speakers__grid">
            <?php foreach ($speakers as $speaker) : ?>
                <div <?php aos_animation(); ?> class="speaker">
                    <picture>
                            <source srcset="/img/speakers/<?php echo $speaker->photo; ?>.webp" type="image/webp">
                            <source srcset="/img/speakers/<?php echo $speaker->photo; ?>." type="image/webp">
                            <img class="speaker__photo" loading="lazy" width="200" height="300" src="/img/speakers/<?php echo $speaker->photo; ?>.png" alt="Speaker's Photo">
                    </picture> <!-- picture -->
                    <div class="speaker__info">
                        <h4 class="speaker__name">
                            <?php echo $speaker->name . " " . $speaker->lastname; ?>
                        </h4> <!-- .speaker__name -->
                            <p class="speaker__location">
                                <?php echo $speaker->city . ", " . $speaker->contry; ?>
                            </p> <!-- .speaker__location -->
                        <nav class="speaker-social">
                            <?php
                                $social = json_decode($speaker->social);
                            ?>
                            <?php if(!empty($social->facebook)) : ?>
                                <a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?php echo $social->facebook; ?>">
                                    <span class="speaker-social__hide">Facebook</span>
                                </a> <!-- .speaker-social__link -->
                            <?php endif; ?> <!-- php: if -->
                            <?php if(!empty($social->twitter)) : ?>
                                <a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?php echo $social->twitter; ?>">
                                    <span class="speaker-social__hide">X</span>
                                </a> <!-- .speaker-social__link -->
                            <?php endif; ?> <!-- php: if -->
                            <?php if(!empty($social->youtube)) : ?>
                                <a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?php echo $social->youtube; ?>">
                                    <span class="speaker-social__hide">YouTube</span>
                                </a> <!-- .speaker-social__link -->
                            <?php endif; ?> <!-- php: if -->
                            <?php if(!empty($social->instagram)) : ?>
                                <a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?php echo $social->instagram; ?>">
                                    <span class="speaker-social__hide">Instagram</span>
                                </a> <!-- .speaker-social__link -->
                            <?php endif; ?> <!-- php: if -->
                            <?php if(!empty($social->tiktok)) : ?>
                                <a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?php echo $social->tiktok; ?>">
                                    <span class="speaker-social__hide">Tiktok</span>
                                </a> <!-- .speaker-social__link -->
                            <?php endif; ?> <!-- php: if -->
                            <?php if(!empty($social->github)) : ?>
                                <a class="speaker-social__link" rel="noopener noreferrer" target="_blank" href="<?php echo $social->github; ?>">
                                    <span class="speaker-social__hide">Github</span>
                                </a> <!-- .speaker-social__link -->
                            <?php endif; ?> <!-- php: if -->
                        </nav> <!-- .speaker-social__social -->
                        <ul class="speaker__skills-list">
                            <?php $tags = explode(',', $speaker->tags);
                                foreach ($tags as $tag) : ?>
                                    <li class="speaker__skill"><?php echo $tag; ?></li>
                            <?php endforeach; ?> <!-- php: foreach -->
                        </ul> <!-- .speaker__skill-list -->
                    </div> <!-- .speaker__info -->
                </div> <!-- .speaker -->
            <?php endforeach; ?> <!-- php: foreach -->
        </div> <!-- .speakers__grid -->
</section> <!-- .speakers -->
<div id="map" class="map"></div>
<section class="tickets">
    <h2 class="tickets__heading">Tickte Bundles & Prices</h2>
    <p class="tickets__description">DevWebCamp Prices</p>
    <div <?php aos_animation(); ?> class="tickets__grid">
        <div class="ticket ticket--onSite">
            <h4 class="ticket__logo">&#60;DevWebCamp/></h4>
            <p class="ticket__plan">On-Site Pass</p>
            <p class="ticket__price">$199</p>
        </div> <!-- .ticket ticket--onSite -->
        <div class="ticket ticket--virtual">
            <h4 class="ticket__logo">&#60;DevWebCamp/></h4>
            <p class="ticket__plan">Virtual Pass</p>
            <p class="ticket__price">$49</p>
        </div> <!-- .ticket ticket--virtual -->
        <div class="ticket ticket--free">
            <h4 class="ticket__logo">&#60;DevWebCamp/></h4>
            <p class="ticket__plan">Free Pass</p>
            <p class="ticket__price">$0</p>
        </div> <!-- .ticket ticket--free -->
    </div> <!-- .tickets__grid -->
    <div class="ticket__link-container">
        <a href="/ticket-bundles" class="ticket__link">See Bundles</a>
    </div> <!-- .tickets__link -->
</section> <!-- .tickets -->