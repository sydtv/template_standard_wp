<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Template Standard Wordpress</title>
    <?php wp_head() ?>
</head>

<body>

<div class="header">
    <nav>
        <?php wp_nav_menu(array(
            'theme_location' => 'main-nav',
            'menu_id' => '', /* ID des ul-Elements (optional) */
            'menu_class' => '', /* Klasse des ul-Elements (optional)*/
            'container' => '')); ?>
    </nav>
</div>