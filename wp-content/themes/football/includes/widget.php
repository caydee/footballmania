<?php
/*********************************************************************/
/* Add sponsored post checkbox
/********************************************************************/
add_action( 'add_meta_boxes', 'add_sponsored_checkbox_function' );
function add_sponsored_checkbox_function()
    {
    add_meta_box('sponsored_checkbox_id','Set as Sponsored Post?', 'sponsored_checkbox_callback_function', 'post', 'side', 'high');
    }
function sponsored_checkbox_callback_function( $post )
    {
    global $post;
    $isSponsored = get_post_meta( $post->ID, 'is_sponsored', true );
    echo '
		<input type="checkbox" name="is_sponsored" value="yes" '.(($isSponsored=='yes') ? 'checked="checked"': '').'/> YES';
    }


/*********************************************************************/
/* Add breaking post checkbox
/********************************************************************/
add_action( 'add_meta_boxes', 'add_breaking_news_checkbox_function' );
function add_breaking_news_checkbox_function()
    {
    add_meta_box('breaking_news_checkbox_id','Set as Breaking News?', 'breaking_news_checkbox_callback_function', 'post', 'side', 'high');
    }
function breaking_news_checkbox_callback_function( $post )
    {
    global $post;
    $isBreakingNews = get_post_meta( $post->ID, 'is_breaking_news', true );

    echo '<input type="checkbox" name="is_breaking_news" value="yes" '.(($isBreakingNews=='yes') ? 'checked="checked"': '').'/> YES';
    }
function wpmu_register_widgets() {
register_sidebar( array(
    'name' => 'Footer-1',
    'id' => 'footer1',
    'before_widget' => '<div class="w-100">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="fw-600">',
    'after_title' => '</h6>'
));
register_sidebar( array(
    'name' => 'Footer-2',
    'id' => 'footer2',
    'before_widget' => '<div class="col-12 col-md-3">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="fw-600">',
    'after_title' => '</h6>'
));
register_sidebar( array(
    'name' => 'Footer-3',
    'id' => 'footer3',
    'before_widget' => '<div class="col-12 col-md-3">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="fw-600">',
    'after_title' => '</h6>'
));
register_sidebar( array(
    'name' => 'Footer-4',
    'id' => 'footer4',
    'before_widget' => '<div class="col-12 col-md-3">',
    'after_widget' => '</div>',
    'before_title' => '<h6 class="fw-600">',
    'after_title' => '</h6>'
));
}
add_action( 'widgets_init', 'wpmu_register_widgets' );