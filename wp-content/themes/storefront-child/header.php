<?php
	/**
	 * The header for our theme.
	 *
	 * Displays all of the <head> section and everything up till <div id="content">
	 *
	 * @package understrap
	 */

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	$container = get_theme_mod( 'understrap_container_type' );
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="stylesheet" href="https://use.typekit.net/lta8byu.css">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<script src="https://use.fontawesome.com/c3352fdb8d.js"></script>
		<?php do_action( 'wp_body_open' ); ?>
		
		<div class="site" id="page">
			<div class="home hero">
				<!-- ******************* The Navbar Area ******************* -->
				<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

					<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

					<nav class="navbar navbar-expand-md navbar">

						<div class="container">
						
							<h1 class="brand__container">
								<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url" class="brand__link">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/assets/preambule_card_logo.svg" alt="" class="brand__logo">
									<span class="brand__title"><?php bloginfo( 'name' ); ?></span>
								</a>
							</h1>
									
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
								<span class="navbar-toggler-icon"></span>
							</button>

							<!-- The WordPress Menu goes here -->
							<?php /*wp_nav_menu(
								array(
									'theme_location'  => 'primary',
									'container_class' => 'collapse navbar-collapse',
									'container_id'    => 'navbarNavDropdown',
									'menu_class'      => 'navbar-nav ml-auto',
									'fallback_cb'     => '',
									'menu_id'         => 'main-menu',
									'depth'           => 2,
								)
							);*/ ?>

							<?php
									/**
									 * Functions hooked into storefront_header action
									 *
									 * @hooked storefront_header_container                 - 0
									 * @hooked storefront_skip_links                       - 5
									 * @hooked storefront_social_icons                     - 10
									 * @hooked storefront_site_branding                    - 20
									 * @hooked storefront_secondary_navigation             - 30
									 * @hooked storefront_product_search                   - 40
									 * @hooked storefront_header_container_close           - 41
									 * @hooked storefront_primary_navigation_wrapper       - 42
									 * @hooked storefront_primary_navigation               - 50
									 * @hooked storefront_header_cart                      - 60
									 * @hooked storefront_primary_navigation_wrapper_close - 68
									 */
									remove_action('storefront_header', 'storefront_header_container', 0);
									remove_action('storefront_header', 'storefront_skip_links', 5);
									remove_action('storefront_header', 'storefront_social_icons', 10);
									remove_action('storefront_header', 'storefront_site_branding', 20);
									remove_action('storefront_header', 'storefront_secondary_navigation', 30);
									remove_action('storefront_header', 'storefront_product_search', 40);
									remove_action('storefront_header', 'storefront_header_container_close', 41);
									//remove_action('storefront_header', 'storefront_primary_navigation_wrapper', 42);
									//remove_action('storefront_header', 'storefront_primary_navigation', 50);
									//remove_action('storefront_header', 'storefront_header_cart', 60);
									//remove_action('storefront_header', 'storefront_primary_navigation_wrapper_close', 68);
									do_action( 'storefront_header' );
							?>
						
						</div><!-- .container -->
					
					</nav><!-- .site-navigation -->

				</div><!-- #wrapper-navbar end -->
			<?php
				if (!is_front_page()):
					echo "</div>";
				endif;
			?>