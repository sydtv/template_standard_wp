<?php get_header() ?>

<?php if (is_front_page()) { ?>
    <?php
    $args = array('post_type' => 'inhalte', 'post_per_page' => 999, 'orderby' => 'menu_order');
    $loop = new WP_Query($args);

    if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post(); ?>
            <?php if (has_term('zitat', 'type')) { ?>
                <div class="zitat">
                    <div class="grey-full">
                        <div class="container" id="<?php echo anchorIds(strtolower(get_the_title())) ?>">
                            <p class="zitat"><?php the_content() ?></p>
                            <p class="zitat-speaker"><?php the_title() ?></p>
                            <?php if (has_post_thumbnail()) { ?>
                                <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>"
                                     title="<?php the_title() ?>">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } elseif (has_term('news', 'type')) { ?>
                <p>news</p>
            <?php } elseif (has_term('table', 'type')) { ?>
                <p>table</p>
            <?php } elseif (has_term('pure-text', 'type')) { ?>
                <p>pure-text</p>
            <?php } elseif (has_term('about', 'type')) { ?>
                <div class="about">
                    <div class="container" id="<?php echo anchorIds(strtolower(get_the_title())) ?>">
                        <div class="eight">
                            <h2><?php the_title() ?></h2>
                            <p><?php the_content() ?></p>
                        </div>
                        <div class="four">
                            <div class="background-img about-img" style="background: url("<?php the_post_thumbnail_url() ?>");"></div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <p>else</p>
            <?php } ?>
        <?php endwhile; endif; ?>
<?php } else { ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h2><?php the_title() ?></h2>
        <div class="entry">
            <?php the_content() ?>
        </div>
    <?php endwhile; endif; ?>
<?php } ?>



<?php $termslist = wp_get_post_terms($post->ID, 'type');
foreach ($termslist as $term) {
    echo $term->name . ' ';
}
?>



<?php $args = array('post_type' => 'beitrag', 'posts_per_page' => 9999); ?>
<?php $loop = new WP_Query($args); ?>
<?php while ($loop->have_posts()) : $loop->the_post(); ?>
    <h2><?php the_title() ?></h2>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
<?php endwhile; ?>

<?php get_footer() ?>
