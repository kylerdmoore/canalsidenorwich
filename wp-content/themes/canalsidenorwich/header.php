<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title><?php wp_title(); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>

	<?php if ( is_singular() && get_option( 'thread_comments' ) ) : ?>
		<?php wp_enqueue_script( 'comment-reply' ); ?>
	<?php endif; ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
	<nav class="navbar">

		<div class="header-logo">
			<a href="<?= site_url() ?>">
				<img src="https://placeimg.com/100/40/any" alt="Logo" title="Logo">
			</a>
		</div>

		<?php wp_nav_menu(
			array(
				'menu'            => 'main',
				'menu_class'      => 'nav',
				'container_class' => 'nav-left',
				'depth'           => 1,
				'theme_location'  => 'main-nav',
				'item_spacing'    => 'discard'
			)
		); ?>

		<div class="nav-right">
			<?php get_search_form(); ?>
		</div>

	</nav>
</header>
