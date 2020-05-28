<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mainstreetbank
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mainstreetbank' ); ?></a>

	<header id="masthead" class="site-header ">

		<div class="top-header">
		<div class="container">
			 <div class="col-md-12">
			<?php dynamic_sidebar('header-top-menu');?>
			</div>

		</div>
		 <div class="top-donate">
		 	<a class="top-donate-link" href="#">CONTACT US</a>
		 </div>
		</div>
		<div class="container">
			<div class="navigation-block">
		<div class="top-logo">
		<a title="" class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/top-logo.png" alt="Logo">
                </a>
		</div>


		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'bis' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>

		</nav>

		<!-- #site-navigation -->
</div>
</div>

	</header><!-- #masthead -->

	<?php
if(is_home()):
?>
<!-- <div class="banner-home" style="background-image: url('<___php echo get_template_directory_uri(); ?>/images/banner-bg.png');">
	</div>  -->
<?php
else:
?>
<div class="inner-banner" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/inner-banner.png');">
	
	</div> 
<?php
endif;
?>

	<div id="content" class="site-content">
