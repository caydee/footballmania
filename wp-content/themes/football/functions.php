<?php



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
function related_posts($id)
    {
        $tags = wp_get_post_tags($id);

        if ($tags)
            {
                $tag_ids = array();
                foreach ($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
                $args = array(
                                'tag__in' => $tag_ids ,
                                'post__not_in' => array( $id ) ,
                                'posts_per_page' => 4 , // Number of related posts to display.
                                'caller_get_posts' => 1
                            );
                $my_query = new wp_query( $args );
                return $my_query;
            }
        return false;
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
function get_child_categories( $parentid,$catid , $limit , $start = 0 )
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

    $data 			= 	new WP_Query([ 'post__in' => $sticky , 'ignore_sticky_posts' => 1 , 'posts_per_page' => $limit , 'offset' => $start , 'orderby' => 'date' , 'order' => 'DESC' ]);
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
        'offset'           		=> 	$start,

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
include_once __DIR__.'/theme_option.php';
include __DIR__.'/includes/widget.php';
