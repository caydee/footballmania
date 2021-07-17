<?php
if ( !function_exists('saraswati_blog_default_theme_options') ) :
    function saraswati_blog_default_theme_options()
        {

        $default_theme_options = array(
            /*feature section options*/
            'saraswati-blog-feature-cat'             => 0,
            'saraswati-blog-theme-header-top-enable' => 1,
            'saraswati-blog-sticky-sidbar-enable'    => 1,
            'saraswati-blog-top-header-menu'         => 1,
            'saraswati-blog-header-social'           => 1,
            'saraswati-blog-post-meta'               => 0,
            'saraswati-blog-excerpt-lenght'          => 25,
            'saraswati-blog-footer-copyright'        => '',
            'saraswati-blog-layout'                  => 'right-sidebar',
            'saraswati-blog-featured-image'          => 'default',
            'saraswati-blog-meta-options'            => 1,
            'breadcrumb_option'                      => 'simple',
            'saraswati-blog-realted-post'            => 0,
            'saraswati-blog-continue-reading-options'=> esc_html__( 'Continue Reading', 'quick-blog' ),
            'saraswati-blog-realted-post-title'      => esc_html__( 'Related Posts', 'quick-blog' ),
            'saraswati-blog-single-featured-image'   => 1,
            'hide-breadcrumb-at-home'                => 1 ,
            'saraswati-blog-breadcrumb-text-option'  => esc_html__( 'You Are Here', 'quick-blog' ),
            'primary_color'                          => '#020b21',
            'slider_caption_bg_color'                => 'rgba(255,255,255,.9)',
            'hide-slider-post-at-category'           => 1,




        );

        return apply_filters( 'saraswati_blog_default_theme_options', $default_theme_options );
        }
endif;

function  quick_blog_remove_post_formats() {

add_theme_support( 'post-formats', array( 'image','aside') );

}

add_action( 'after_setup_theme', 'quick_blog_remove_post_formats', 11 );

function add_meta_tags()
    {
    echo '<meta http-equiv="refresh" content="650">
                  <meta name="theme-color" content="#f7a81b">              
                  <meta name="Developer:name" content="Dennis Kiptoo Kiptugen" />
                  <meta name="Developer:email" content="dennis.kiptoo@programmer.net" />
                  <meta name="site-live" content="11:00:00 03-09-2020" />
                  <meta name="copyright" content="Football Mania" />
                     ';
    }
add_action('wp_head', 'add_meta_tags');

remove_action('wp_head','wp_genetrator');

if (function_exists('add_theme_support'))
    {
    add_theme_support( 'widgets' );
    add_theme_support( 'menus' );
    add_theme_support( 'title-tag' );
    add_theme_support('post-thumbnails');
    add_theme_support( "custom-header" );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );


    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );


    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for Block Styles.
    add_theme_support( 'wp-block-styles' );

    // Add support for editor styles.
    add_theme_support( 'editor-styles' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    add_image_size('large', 800, 500, true); //Large Thumbnail
    add_image_size('medium', 480, 300, true); //Medium Thumbnail
    add_image_size('small', 225, 140, true); //Small Thumbnail
    add_image_size('xsmall', 115, 72, true); //Small Thumbnail
    add_image_size('first',212,210,true);
    add_image_size('popular',304,206,true);
    add_image_size('second',190,130,true);
    }

function import_scripts()
    {
    wp_enqueue_style('style', get_template_directory_uri().'/assets/css/app.css',false);
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri().'/assets/js/app.js', False , false, true );

    }
add_action( 'wp_enqueue_scripts', 'import_scripts');

function register_my_menu()
    {
    register_nav_menu('topmenu',__( 'Primary  Menu','footballmania' ));
    register_nav_menu('social_menu',__( 'Social Menu','footballmania' ));
    }
add_action( 'init', 'register_my_menu' );
function custom_css($output)
    {
    $output = apply_filters( 'bam_head_css', $output ); ?>
        ?>
        <style type="text/css" id="theme-custom-css">
            <?php echo wp_strip_all_tags( $output ); ?>
        </style>
        <?php

    }
function add_classes_on_li($classes, $item, $args)
    {
    $classes[] = 'nav-item';
    if (in_array('current-menu-item', $classes) )
        {
        $classes[] = 'active ';
        }
    return $classes;
    }
add_filter('nav_menu_css_class','add_classes_on_li',1,3);

function add_menuclass($ulclass)
    {
    return preg_replace('/<a /', '<a class="nav-link" ', $ulclass);
    }
add_filter( 'wp_nav_menu', 'add_menuclass', 10, 1 );
add_filter( 'excerpt_length', function($length) {
    return 20;
} );
function FootballMania_logo_setup()
    {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
    }
add_action( 'after_setup_theme', 'FootballMania_logo_setup' );
function FootballMania_customizer_setting($wp_customize) {
// add a setting
$wp_customize->add_setting('FootballMania_light_logo');
// Add a control to upload the hover logo
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'FootballMania_light_logo', array(
    'label' => 'Upload Light Logo',
    'section' => 'title_tagline', //this is the section where the custom-logo from WordPress is
    'settings' => 'FootballMania_light_logo',
    'priority' => 8 // show it just below the custom-logo
)));
}

add_action('customize_register', 'FootballMania_customizer_setting');
function custom_cat_templates($template)
    {
    $category = get_category(get_queried_object_id());
    $term = get_queried_object();
    $children = get_terms( $term->taxonomy, array(
        'parent'    =>  $term->term_id,
        'hide_empty' => true
    ) );
    if ( $category->category_parent > 0  || (empty($children) && !is_singular())) //
        {
        $sub_category_template = locate_template('child_category.php');
        $template = !empty($sub_category_template) ? $sub_category_template : $template;
        }
    return $template;
    }
add_filter('category_template', 'custom_cat_templates');



function time_ago($datetime, $full = false)
    {
    $now      =     new DateTime;
    $ago      =     new DateTime($datetime);
    $diff     =     $now->diff($ago);
    $diff->w  =     floor($diff->d / 7);
    $diff->d -=     $diff->w * 7;
    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v)
        {
        if ($diff->$k)
            {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            }
        else
            {
            unset($string[$k]);
            }
        }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

function FootballMania_login_logo()
    {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    ?>
        <style type="text/css">
            body.login div#login h1 a {
                background-image: url(<?php echo $logo[0]; ?>);
                background-size: contain;
                width: 300px;
            }
            .login h1 a {
                height: 80px!important;
            }

        </style>
        <?php
    }
add_action('login_enqueue_scripts', 'FootballMania_login_logo');

function custom_submit_comment_form( $submit_button ) {
return '<div class="form-group form-row"><input name="submit" type="submit" id="submit" class="btn btn-primary ml-auto" value="Comment" /></div>';
}
add_filter( 'comment_form_submit_button', 'custom_submit_comment_form' );
function wpsites_modify_comment_form_text_area($arg) {
$arg['comment_field'] = '<p class="comment-form-comment">
                            <label for="comment" class="control-label">
                            ' . _x( 'Your Feedback Is Appreciated', 'noun' ) . '
                            </label>
                            <textarea id="comment" name="comment" class="form-control" aria-required="true"></textarea>
                        </p>';
return $arg;
}

add_filter('comment_form_defaults', 'wpsites_modify_comment_form_text_area');