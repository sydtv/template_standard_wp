<?php get_header() ?>

<?php if (is_front_page()) { ?>
    <?php
    $args = array('post_type' => 'inhalte', 'post_per_page' => 999, 'orderby' => 'menu_order');
    $loop = new WP_Query($args);

    if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post(); ?>
            <div class="container" id="<?php echo anchorIds(strtolower(get_the_title())) ?>">
                <h2 class="inhalts-title"><?php the_title() ?></h2>
                <div class="entry">
                    <?php the_content() ?>
                    <?php if (has_post_thumbnail()) { ?>
                        <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title() ?>"
                             title="<?php the_title() ?>">
                    <?php } ?>
                </div>
            </div>
        <?php endwhile; endif; ?>
<?php } else { ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h2><?php the_title() ?></h2>
        <div class="entry">
            <?php the_content() ?>
        </div>
    <?php endwhile; endif; ?>
<?php } ?>

<?php $args = array('post_type' => 'beitrag', 'posts_per_page' => 9999); ?>
<?php $loop = new WP_Query($args); ?>
<?php while ($loop->have_posts()) : $loop->the_post(); ?>
    <h2><?php the_title() ?></h2>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
<?php endwhile; ?>

<?php get_footer() ?>
