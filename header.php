<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package s-tier
 */

?>
<?php

$header__link = get_field('header_link', 'option');
if($header__link) {
	$header_link_url = $header__link['url'];
	$header_link_title = $header__link['title'];
	$header_link_target = $header__link['target'] ? $header__link['target'] : '_self';
};

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="theme-color" content="#a81a1a" />

	<?php echo get_field('head_script', 'option'); ?> <!-- Head External Code -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php echo get_field('body_top_script', 'option'); ?> <!-- Body Top External Code -->
<div class="header__top">
	<div class="container header__top-wrap">
		<?php get_template_part('template-parts/contact-info'); ?>
		<?php get_template_part('template-parts/socials'); ?>
	</div>
</div>
<header id="masthead" class="header-main header__bottom">
	<div class="container header__bottom-wrap">
		<figure class="site-logo ">
			<?php
			the_custom_logo(); ?>
		</figure>

		<nav id="site-navigation" class="main-navigation">
			<!-- Mobile Nav Button -->
			<div class="hamburger">
				<label for="nav-toggle">Navigation Menu</label>
				<input type="checkbox" class="menu-toggle" id="nav-toggle">
				<div></div>
			</div>
			<!-- Mobile Nav Button -->

			<div class="main-navigation_wrap">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main',
						'menu_id'        => 'primary-menu',
						'walker'		 => new CustomMenuWalker
					)
				);
				?>
			</div>
		</nav><!-- #site-navigation -->

		<div class="header__search-btn-wrap">
			<div class="header__search">
				<div class="header__search-icons header__search-icons--mobile">
					<svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
						<path d="M15.875 13.4423L12.3417 9.8641C12.9167 8.86019 13.2167 7.74382 13.2167 6.61911C13.2167 2.97006 10.25 0 6.60833 0C2.96667 0 0 2.97006 0 6.61911C0 10.2682 2.96667 13.2382 6.60833 13.2382C7.77083 13.2382 8.92083 12.9175 9.94583 12.3051L13.4625 15.8709C13.5417 15.95 13.6542 16 13.7667 16C13.8792 16 13.9917 15.9542 14.0708 15.8709L15.875 14.0463C16.0417 13.8756 16.0417 13.609 15.875 13.4423ZM6.60833 2.5785C8.83333 2.5785 10.6417 4.39052 10.6417 6.61911C10.6417 8.8477 8.83333 10.6597 6.60833 10.6597C4.38333 10.6597 2.575 8.8477 2.575 6.61911C2.575 4.39052 4.38333 2.5785 6.60833 2.5785Z" fill="currentColor"/>
					</svg>
					<svg class="close-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1024 1024"><path fill="currentColor" d="M195.2 195.2a64 64 0 0 1 90.496 0L512 421.504 738.304 195.2a64 64 0 0 1 90.496 90.496L602.496 512 828.8 738.304a64 64 0 0 1-90.496 90.496L512 602.496 285.696 828.8a64 64 0 0 1-90.496-90.496L421.504 512 195.2 285.696a64 64 0 0 1 0-90.496z"/></svg>
				</div>
				<div class="header__search-icons header__search-icons--desktop">
					<svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
						<path d="M15.875 13.4423L12.3417 9.8641C12.9167 8.86019 13.2167 7.74382 13.2167 6.61911C13.2167 2.97006 10.25 0 6.60833 0C2.96667 0 0 2.97006 0 6.61911C0 10.2682 2.96667 13.2382 6.60833 13.2382C7.77083 13.2382 8.92083 12.9175 9.94583 12.3051L13.4625 15.8709C13.5417 15.95 13.6542 16 13.7667 16C13.8792 16 13.9917 15.9542 14.0708 15.8709L15.875 14.0463C16.0417 13.8756 16.0417 13.609 15.875 13.4423ZM6.60833 2.5785C8.83333 2.5785 10.6417 4.39052 10.6417 6.61911C10.6417 8.8477 8.83333 10.6597 6.60833 10.6597C4.38333 10.6597 2.575 8.8477 2.575 6.61911C2.575 4.39052 4.38333 2.5785 6.60833 2.5785Z" fill="currentColor"/>
					</svg>
					<svg class="close-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 1024 1024"><path fill="currentColor" d="M195.2 195.2a64 64 0 0 1 90.496 0L512 421.504 738.304 195.2a64 64 0 0 1 90.496 90.496L602.496 512 828.8 738.304a64 64 0 0 1-90.496 90.496L512 602.496 285.696 828.8a64 64 0 0 1-90.496-90.496L421.504 512 195.2 285.696a64 64 0 0 1 0-90.496z"/></svg>
				</div>
				<div class="header__search-form header__search-form--desktop">
					<?php get_search_form(); ?>
				</div>
			</div>

			<?php if($header__link): ?>
				<div class="header__button button-desktop">
					<a class="btn btn-4" href="<?php echo esc_url($header_link_url) ?>"  target="<?php echo esc_attr( $header_link_target ); ?>">
						<?php echo $header_link_title ?>
					</a>
				</div>
			<?php endif ?>
		</div>

		<div class="header__search-form header__search-form--mobile">
			<?php get_search_form(); ?>
		</div>
	</div>
</header><!-- #masthead -->

<div id="page" class="site">
