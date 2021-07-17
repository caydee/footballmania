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
