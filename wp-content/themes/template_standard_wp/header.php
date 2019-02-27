<!DOCTYPE html>
<html>
<head>
    <?php wp_head() ?>
    <meta charset="utf-8">
    <title><?php the_title() ?></title>
</head>

<body>

<div class="header">
    <div class="background-img" style="background: url(<?php echo(get_template_directory_uri() . '/images/header-img.jpg') ?>)">
        <div class="overlay"></div>
        <nav>
            <?php wp_nav_menu(array(
                'theme_location' => 'main-nav',
                'menu_id' => '', /* ID des ul-Elements (optional) */
                'menu_class' => '', /* Klasse des ul-Elements (optional)*/
                'container' => '')); ?>
        </nav>
    </div>
</div>