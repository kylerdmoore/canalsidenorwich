<?php
function tbinorwich_scripts() {
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'tbinorwich', get_stylesheet_uri() );
	wp_enqueue_script( array( 'json2', 'jquery' ) );
	wp_enqueue_script( 'tbinorwich', get_template_directory_uri() . '/script.js', array( 'jquery' ), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'tbinorwich_scripts' );

function tbinorwich_menus() {
	register_nav_menus(
		array(
			'main-nav' => __( 'Main Navigation' )
		)
	);
}

add_action( 'init', 'tbinorwich_menus' );

function tbinorwich_search_form( $form ) {
	$form  = '<form role="search" method="get" id="searchform" class="searchform" action"' . site_url() . '">';
	$form .= '    <div>';
	$form .= '        <label class="screen-reader-text" for="s">Search for:</label>';
	$form .= '        <input type="text" value="" name="s" id="s" />';
	$form .= '        <button type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>';
	$form .= '    </div>';
	$form .= '</form>';

	return $form;
}

add_filter( 'get_search_form', 'tbinorwich_search_form' );

function add_logo_to_main_nav( $items, $args ) {
	if ( $args->theme_location == 'main-nav' ) {
		$logo = '<li id="main-nav-logo"><a href="' . site_url() . '"><img src="https://placeimg.com/100/100/any" alt="Logo" title="Logo"></a></li>';

		$items = str_replace( '</li><li', '</li>,<li', $items );
		$items = explode( ',', $items );

		array_splice( $items, count( $items ) / 2, 0, $logo );

		$items = implode( '', $items );
	}

	return $items;
}

add_filter( 'wp_nav_menu_items', 'add_logo_to_main_nav', 10, 2 );
