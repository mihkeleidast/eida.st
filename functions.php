<?php
DEFINE( 'AJAX_NONCE', 'gotoAndPlay' );
function theme_scripts() {
	wp_enqueue_style( 'main', get_template_directory_uri() . '/main.css' );
	wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/inc/js/jquery-2.2.1.min.js', 'jquery', '2.2.1', true );
	wp_enqueue_script( 'main', get_template_directory_uri() .'/inc/js/main.js', array('jquery'), false, true );

	$gtapObject = array(
		'ajax_path' => admin_url( 'admin-ajax.php' )
		);

	$gtapObject['nonce'] = wp_create_nonce(AJAX_NONCE);

	wp_localize_script( 'main', 'gtap', $gtapObject, array());
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

function the_svg_path() {
	echo get_template_directory_uri() . '/inc/svg/';
}

function get_post_likes(){
	global $post;
	$postID = $post->ID;
	$count_key = 'post_likes_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count == '') {
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return 0;
	}
	return $count;
}

function set_post_likes($postID) {
	$count_key = 'post_likes_count';
	$count = get_post_meta($postID, $count_key, true);
	if( $count == '' ) {
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	} else {
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

function my_ajax_post_likes_update() {
	check_ajax_referer(AJAX_NONCE, 'nonce');

	$postID = $_POST['data']['ID'];
	set_post_likes($postID);
}

add_action('wp_ajax_update_post_likes', 'my_ajax_post_likes_update');
add_action('wp_ajax_nopriv_update_post_likes', 'my_ajax_post_likes_update');

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
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

    // Remove the REST API endpoint.
remove_action( 'rest_api_init', 'wp_oembed_register_route' );

    // Turn off oEmbed auto discovery.
add_filter( 'embed_oembed_discover', '__return_false' );

    // Don't filter oEmbed results.
remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );

    // Remove oEmbed discovery links.
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );

function my_deregister_scripts(){
	wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );
?>
