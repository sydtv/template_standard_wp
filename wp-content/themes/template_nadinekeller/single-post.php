<?php get_header() ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php if (has_post_thumbnail()) { ?>
        <div class="about news-single">
            <div class="container flexcontainer" id="<?php echo anchorIds(strtolower(get_the_title())) ?>">
                <div class="eight">
                    <h2><?php the_title() ?></h2>
                    <p><?php the_content() ?></p>
                </div>
                <div class="four background-img about-img"
                     style="background: url(<?php the_post_thumbnail_url() ?>);">
                </div>
                <p class="goback green" onclick="window.history.back()">Zurück</p>
            </div>
        </div>
    <?php } else { ?>
        <div class="about news-single">
            <div class="container flexcontainer" id="<?php echo anchorIds(strtolower(get_the_title())) ?>">
                <div class="twelve">
                    <h2><?php the_title() ?></h2>
                    <p><?php the_content() ?></p>
                    <p class="goback green" onclick="window.history.back()">Zurück</p>
                </div>
            </div>
        </div>
    <?php } ?>
<?php endwhile;
endif; ?>
<?php get_footer() ?>