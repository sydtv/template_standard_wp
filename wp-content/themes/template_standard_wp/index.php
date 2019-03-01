<?php get_header() ?>

<?php if (is_front_page()) { ?>
    <?php
    $args = array('post_type' => 'inhalte', 'post_per_page' => 999, 'orderby' => 'menu_order');
    $loop = new WP_Query($args);

    if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post(); ?>
            <?php if (has_term('zitat', 'type')) { ?>
                <div class="zitat" id="<?php echo anchorIds(strtolower(get_the_title())) ?>">
                    <div class="grey-full">
                        <div class="container">
                            <div class="zitat-text"><?php the_content() ?></div>
                            <div class="zitat-speaker"><p>- <?php the_title() ?> -</p></div>
                        </div>
                    </div>
                </div>
            <?php } elseif (has_term('news', 'type')) { ?>

                <div class="news" id="<?php echo anchorIds(strtolower(get_the_title())) ?>">
                    <h2><?php the_title() ?></h2>
                    <?php $wpb_all_query = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => -1)); ?>

                    <?php if ($wpb_all_query->have_posts()) : ?>


                        <div class="container">
                            <ul>
                                <!-- the loop -->
                                <?php while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post(); ?>
                                    <li><a href="<?php the_permalink(); ?>">
                                            <div class="flexcontainer">
                                                <div class="two">
                                                    <img src="<?php if (has_post_thumbnail()) {
                                                        the_post_thumbnail_url();
                                                    } else {
                                                        echo(get_template_directory_uri() . '/images/news_placeholder.jpg');
                                                    } ?>" alt="">
                                                </div>
                                                <div class="ten">
                                                    <h2><?php the_title() ?></h2>
                                                    <h2 class="green">lesen...</h2>
                                                </div>
                                            </div>
                                        </a></li>
                                <?php endwhile; ?>
                                <!-- end of the loop -->
                            </ul>
                        </div>

                        <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php endif; ?>

                </div>
            <?php } elseif (has_term('table', 'type')) { ?>
                <div class="table" id="<?php echo anchorIds(strtolower(get_the_title())) ?>">
                    <div class="grey-full">
                        <div class="container"><?php the_content() ?></div>
                    </div>
                </div>
            <?php } elseif (has_term('contact', 'type')) { ?>
                <div class="contact-form" id="<?php echo anchorIds(strtolower(get_the_title())) ?>">
                    <h2 class="contact-title"><?php the_title() ?></h2>
                    <div class="container flexcontainer">
                        <div class="three"></div>
                        <div class="six">
                            <?php the_content() ?>
                        </div>
                        <div class="three"></div>
                    </div>
                </div>
            <?php } elseif (has_term('about', 'type')) { ?>
                <div class="about" id="<?php echo anchorIds(strtolower(get_the_title())) ?>">
                    <div class="container flexcontainer" id="<?php echo anchorIds(strtolower(get_the_title())) ?>">
                        <div class="eight">
                            <h2><?php the_title() ?></h2>
                            <p><?php the_content() ?></p>
                        </div>
                        <div class="four background-img about-img"
                             style="background: url(<?php the_post_thumbnail_url() ?>);">
                        </div>
                    </div>
                </div>
            <?php } else { ?>

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


<?php $args = array('post_type' => 'beitrag', 'posts_per_page' => 9999); ?>
<?php $loop = new WP_Query($args); ?>
<?php while ($loop->have_posts()) : $loop->the_post(); ?>
    <h2><?php the_title() ?></h2>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
<?php endwhile; ?>

<?php get_footer() ?>
