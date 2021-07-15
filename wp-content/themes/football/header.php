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
<?php
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>
<div class="navbar sticky-top nav-light justify-content-center">
    <a class="navbar-brand  px-2 d-md-none" href="<?= get_home_url(); ?>">
        <img src="<?=$logo[0]; ?>"   alt="Football Mania logo">
    </a>
</div>
<nav class="navbar navbar-expand-md sticky-top  navbar-dark py-0" style="background: #000000;">

    <a class="navbar-brand  px-2 d-md-none" href="<?= get_home_url(); ?>">
        <img src="<?=$logo[0]; ?>" height="50"  alt="Football Mania logo">
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
