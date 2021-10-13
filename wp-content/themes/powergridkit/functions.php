<?php

//enqueue theme styles and scripts
function enqueue_theme_assets() {
    wp_enqueue_style( 'powergridkit', get_template_directory_uri() . '/css/pgk.css',false,'1.0','all');
    //wp_register_script('powergridkit', get_template_directory_uri() . '/js/powergridkit.js','','1.1', true);
    //wp_enqueue_script( 'powergridkit', get_template_directory_uri() . '/js/powergridkit.js',false,'1.0','all');
}
add_action( 'template_redirect', 'enqueue_theme_assets' );

// Disable comments by default. Change this if you need to allow comments for your site.
define("WP_ALLOW_COMMENTS", false);

add_filter( 'excerpt_length', function($length) {
    return 24;
} );

// change the default "[...]" for excerpts
function wpdocs_excerpt_more( $more ) {
    if ( is_admin() ) {
        return $more;
    }
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

//Show all CPT items on archive
add_action( 'pre_get_posts', 'show_all_archive_posts' );
function show_all_archive_posts( $query ) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ( is_archive( 'post' ) ) {
            $query->set('posts_per_page', -1 );
        }
    }
}

//add ACF options
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page();
}

function html5_search_form( $form ) {
     $form = '<section class="search"><form role="search" method="get" class="searchform" id="search-form" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('',  'domain') . '</label>
     <input type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="Search Behavioral Grooves" />
     <input type="submit" id="searchsubmit" value="'. esc_attr__('Search', 'domain') .'" />
     </form></section>';
     return $form;
}

 add_filter( 'get_search_form', 'html5_search_form' );

 register_nav_menus( array(
     'primary' => 'Primary Menu',
 ) );
