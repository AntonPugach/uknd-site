<?php
/****************************************************************
 * DO NOT DELETE
 ****************************************************************/
if ( get_stylesheet_directory() == get_template_directory() ) {
	define('ALETHEME_PATH', get_template_directory() . '/aletheme');
	define('ALETHEME_URL', get_template_directory_uri() . '/aletheme');
}  else {
		define('ALETHEME_PATH', get_theme_root() . '/fuerza/aletheme');
		define('ALETHEME_URL', get_theme_root_uri() . '/fuerza/aletheme');
}

require_once ALETHEME_PATH . '/init.php';

load_theme_textdomain( 'aletheme', get_template_directory() . '/lang' );
$locale = get_locale();
$locale_file = get_template_directory() . "/lang/$locale.php";
if ( is_readable($locale_file) )
		require_once($locale_file);

/****************************************************************
 * You can add your functions here.
 * 
 * BE CAREFULL! Functions will dissapear after update.
 * If you want to add custom functions you should do manual
 * updates only.
 ****************************************************************/

function my_search_filter($query) {
	if ( !is_admin() && $query->is_main_query() ) {
		if ($query->is_search) {
			$query->set('post_type', array( 'blurbs' ) );
		}
	}
}
add_action('pre_get_posts','my_search_filter');

function remove_slug( $post_link, $post, $leavename ) {
	if ( 'blurbs' != $post->post_type || 'publish' != $post->post_status ) {
	return $post_link;
	}
	$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
	return $post_link;
}
add_filter( 'post_type_link', 'remove_slug', 10, 3 );

function parse_request( $query ) {
	if ( ! $query->is_main_query() )
	return;

	if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
	return;
	}

	if ( ! empty( $query->query['name'] ) ) {
	$query->set( 'post_type', array( 'post', 'blurbs', 'page' ) );
	}
}
add_action( 'pre_get_posts', 'parse_request' );

//301 redirect
add_action('template_redirect', 'rudr_old_term_redirect');

function rudr_old_term_redirect() {

	$taxonomy_name = 'blurbs';
	$taxonomy_slug = 'blurbs';

	// exit the redirect function if taxonomy slug is not in URL
	if( strpos( $_SERVER['REQUEST_URI'], $taxonomy_slug ) === FALSE)
		return;
	else {
		wp_redirect( site_url( str_replace($taxonomy_slug, '', $_SERVER['REQUEST_URI']) ), 301 );
		exit();
	}
}