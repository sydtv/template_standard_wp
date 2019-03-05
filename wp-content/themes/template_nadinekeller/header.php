<!DOCTYPE html>
<html>
<head>
    <?php wp_head() ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php the_title() ?></title>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
</head>

<?php if (is_front_page()) { ?>
<body>
<div class="header">
    <div class="background-img"
         style="background: url(<?php echo(get_template_directory_uri() . '/images/header-img.jpg') ?>)">
        <div class="overlay"></div>
        <div class="flexcontainer navflex">
            <nav class="cf">
                <?php wp_nav_menu(array(
                    'theme_location' => 'main-nav',
                    'menu_id' => '', /* ID des ul-Elements (optional) */
                    'menu_class' => '', /* Klasse des ul-Elements (optional)*/
                    'container' => '')); ?>
            </nav>
        </div>
        <div class="title">
            <h1><?php echo get_bloginfo('name') ?></h1>
        </div>
    </div>
    <nav class="cf bodynav">
        <?php wp_nav_menu(array(
            'theme_location' => 'main-nav',
            'menu_id' => '', /* ID des ul-Elements (optional) */
            'menu_class' => '', /* Klasse des ul-Elements (optional)*/
            'container' => '')); ?>
    </nav>
</div>
<?php } else { ?>
<body class="news-detail">
<div class="header">
    <div class="background-img"
         style="background: url(<?php echo(get_template_directory_uri() . '/images/header-img.jpg') ?>)">
        <div class="overlay"></div>
        <div class="title">
            <h1><?php echo get_bloginfo('name') ?></h1>
        </div>    </div>
    <nav class="cf bodynav">
        <?php wp_nav_menu(array(
            'theme_location' => 'main-nav',
            'menu_id' => '', /* ID des ul-Elements (optional) */
            'menu_class' => '', /* Klasse des ul-Elements (optional)*/
            'container' => '')); ?>
    </nav>
</div>
<?php } ?>
