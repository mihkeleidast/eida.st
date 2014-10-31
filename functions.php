<?php
function theme_scripts() {
	wp_enqueue_style( 'main', get_template_directory_uri() . '/main.css' );
}

function the_page_title() {
	$title = wp_title('', false);
	if( $title ) {
		$title .= ' - ';
	}
	if( is_404() ) {
		$title = 'Error 404 - ';
	}
	$title .= get_bloginfo( 'name' );
	echo $title;
}

function theme_menus() {
	register_nav_menu( 'header', 'Header Menu' );
}

add_theme_support( 'post-thumbnails' );

add_action( 'wp_enqueue_scripts', 'theme_scripts' );
add_action( 'after_setup_theme', 'theme_menus' );

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action('wp_head', 'rel_canonical');
?>
