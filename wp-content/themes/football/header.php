<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
    wp_head();
    ?>
</head>
<body>
<nav class="navbar navbar-expand-md sticky-top  navbar-dark py-0" style="background: #000000;">
    <a class="navbar-brand  px-2" href="<?= get_home_url(); ?>">
        <img src="<?=get_template_directory_uri(); ?>/assets/img/logo.png"  alt="Football Mania">
    </a>
    <button class="navbar-toggler  ml-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php
    $args = array(
        'container_class' 	=>	'collapse navbar-collapse w-100',
        'container_id'		=>	'navbarSupportedContent',
        'menu_class'		=>	'navbar-nav ',
        'menu_id'			=>	'',
        'theme_location'	=>  'topmenu',
        'depth'             => 	1,
        'fallback_cb'		=>	false,
        'add_li_class'      =>  'nav-item'
    );
    wp_nav_menu($args);
    ?>

</nav>
