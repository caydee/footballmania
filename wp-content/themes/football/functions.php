<?php
remove_action('wp_head','wp_genetrator');
if (function_exists('add_theme_support'))
    {
    add_theme_support( 'wigets' );
    add_theme_support( 'menus' );
    add_theme_support( 'title-tag' );
    add_theme_support('post-thumbnails');
    add_image_size('large', 730, '', true); //Large Thumbnail
    add_image_size('medium', 480, '', true); //Medium Thumbnail
    add_image_size('small', 225, '', true); //Small Thumbnail
    add_image_size('xsmall', 115, '', true); //Small Thumbnail
    add_image_size('custom-size', 700, 200, true); //Custom Thumbnail Size call using the_post_thumbnail('custom-size');
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
    register_nav_menu('topmenu',__( 'Primary  Menu','people-daily' ));
    register_nav_menu('social_menu',__( 'Social Menu','social-media' ));
    }
add_action( 'init', 'register_my_menu' );

function add_classes_on_li($classes, $item, $args)
    {
    $classes[] = 'nav-item';
    return $classes;
    }
add_filter('nav_menu_css_class','add_classes_on_li',1,3);

function add_menuclass($ulclass)
    {
    return preg_replace('/<a /', '<a class="nav-link" ', $ulclass);
    }
add_filter( 'wp_nav_menu', 'add_menuclass', 10, 1 );

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
function fetch_posts($category, $limit, $offset)
    {
    $args = array(
        'posts_per_page'   => $limit,
        'offset'           => $offset,
        'category_name'    => $category,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'post_type'        => 'post',
        'post_status'      => 'publish',
        'suppress_filters' => true,
    );
    $posts = get_posts( $args );
    return $posts;
    }

function get_category_top($catid,$limit,$start=0)
    {
    $args 	= 	[
        'post_type'			=> 'post',
        'orderby'			=> 'date',
        'order'				=> 'DESC',
        'posts_per_page'	=> $limit,
        'offset'			=> $start,
        'post_status'		=> 'publish',
        'tax_query' 		=> [
            'relation' => 'OR',
            [
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $catid,
            ],

            [
                'taxonomy' => 'category',
                'field'    => 'parent',
                'terms'    => $catid,
            ]
        ],
    ];
    $myposts = new WP_Query($args);
    return $myposts;
    }

function fetch_posts_by_sub_category($parentid, $sub_category_id, $limit, $offset=0)
    {
    $args 	= 	[
        'post__not_in' 	    => $parentid,
        'post_type'			=> 'post',
        'orderby'			=> 'date',
        'order'				=> 'DESC',
        'posts_per_page'	=> $limit,
        'offset'			=> $offset,
        'post_status'		=> 'publish',
        'tax_query' 		=> [
            [
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $sub_category_id,
            ],
        ],
    ];
    $myposts = new WP_Query($args);
    return $myposts;
    }

function fetch_posts_by_author_id($author_id, $limit, $offset) {
$args = array(
    'author'        =>  $author_id,
    'posts_per_page' => $limit,
    'offset'           => $offset,
    'orderby'          => 'date',
    'order'            => 'DESC',
    'post_type'        => 'post',
    'post_status'      => 'publish',
    'suppress_filters' => true,
);
$posts = get_posts( $args );
return $posts;
}

function get_post_views( $postID )
    {
    $count_key 	= 	'post_views_count';
    $count 		= 	get_post_meta($postID, $count_key, true);
    if($count=='')
        {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
        }
    return $count.' Views';
    }
function get_child_categories( $catid , $limit , $start = 0 )
    {
    $args 	= 	[
        'post__not_in' 	    => $parentid,
        'post_type'			=> 'post',
        'orderby'			=> 'date',
        'order'				=> 'DESC',
        'posts_per_page'	=> $limit,
        'offset'			=> $start,
        'post_status'		=> 'publish',
        'tax_query' 		=> [
            [
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $catid,
            ],
        ],
    ];
    $myposts = new WP_Query($args);
    return $myposts;
    }
function set_post_views($postID)
    {
    $count_key 	= 	'post_views_count';
    $count 		= 	get_post_meta($postID, $count_key, true);
    if( $count == '' )
        {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '1');
        }
    else
        {
        $count++;
        update_post_meta($postID, $count_key, $count);
        }
    }

function check_home_category($category)
    {
    return get_option($category);
    }
function home_category($catid,$limit,$start=0)
    {
    $sticky 		= 	get_option( 'sticky_posts' );
    rsort($sticky);
    $sticky 		= 	array_slice( $sticky, 0, 3 );
    $args 	= 	[
        'post__not_in' 	    =>	$sticky,
        'post_type'			=> 	'post',
        'orderby'			=> 	'date',
        'order'				=> 	'DESC',
        'posts_per_page'	=> 	$limit,
        'offset'			=> 	$start,
        'post_status'		=> 	'publish',
        'tax_query' 		=> 	[
            [
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $catid,
            ],
        ],
    ];
    $myposts = new WP_Query($args);
    return $myposts;
    }
function trending_posts($count = 3)
    {
    $args 	= array(
        'posts_per_page'    => $count,
        'meta_key'          => 'post_views_count',
        'orderby'           => 'meta_value_num',
        'order'             => 'DESC'
    );
    $data 	= new WP_Query($args);
    //var_dump($data);
    return $data;
    }
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function track_post_views ($post_id)
    {
    if ( !is_single() ) return;
    if ( empty ( $post_id) )
        {
        global $post;
        $post_id = $post->ID;
        }
    set_post_views($post_id);
    }
add_action( 'wp_head', 'track_post_views');

function limit_characters($string, $length)
    {
    $string_without_tags 	= 	strip_tags($string);
    $result 				= 	substr($string_without_tags, 0, $length);
    return $result;
    }


function home_top($limit,$start=0)
    {

    $sticky 		= 	get_option( 'sticky_posts' );
    rsort($sticky);
    $sticky 		= 	array_slice( $sticky, $start, $limit );
    $data 			= 	new WP_Query(['post__in' => $sticky, 'ignore_sticky_posts' => 1 ]);
    return $data;
    }
function get_home_latest($limit,$start=0)
    {
    $sticky 		= 	get_option( 'sticky_posts' );
    rsort($sticky);
    $sticky 		= 	array_slice( $sticky, 0, 3 );
    $data 			= 	new WP_Query([
        'post__not_in' 			=> 	$sticky,
        'ignore_sticky_posts' 	=> 	1,
        'orderby'             	=> 	'date',
        'order'             	=> 	'DESC',
        'posts_per_page' 		=> 	$limit,
        'offset'           		=> 	$start
    ]);
    return $data;
    }
function get_parent_category_featured($catid,$limit,$start=0)
    {
    $sticky 		= 	get_option( 'sticky_category' );
    rsort($sticky);
    $sticky 		= 	array_slice( $sticky, 0, 4 );
    $data 			= 	new WP_Query(
        [
            'post__in' 				=> $sticky,
            'ignore_sticky_posts' 	=> 1
        ]
    );
    return $data;
    }
include_once 'theme_option.php';
include_once 'includes/widget.php';