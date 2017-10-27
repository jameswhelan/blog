<?php

// Add scripts and stylesheets
function jameswhelansblog_scripts($hook) {
	wp_enqueue_style( 'bootstrap', "//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css", array(), '3.3.7' );

	if ( is_front_page() ):
	  wp_enqueue_style( 'blog', get_template_directory_uri() . '/css/blog.css' );
	else:
	   wp_enqueue_style(  'blogpost', get_stylesheet_directory_uri().'/css/blogpost.css' );
	endif;

	wp_enqueue_script( 'bootstrap', "//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js", array( 'jquery' ), '3.3.6', true );
}

add_action( 'wp_enqueue_scripts', 'jameswhelansblog_scripts' );

// WordPress Titles
add_theme_support( 'title-tag' );

// Support Featured Images
add_theme_support( 'post-thumbnails' );


function wpbeginner_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="pagination dark">' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '%s' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? 'active' : 'gradient';
 
        printf( '<a class="page dark %s" href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? 'active' : 'gradient';
        printf( '<a class="page dark %s" href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? 'active' : 'gradient';
        printf( '<a class="page dark %s" href="%s">%s</a>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '%s' . "\n", get_next_posts_link() );
 
    echo '</div>' . "\n";
 
}