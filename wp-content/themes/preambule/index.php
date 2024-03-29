<?php
	/**
	 * The main template file.
	 *
	 * This is the most generic template file in a WordPress theme
	 * and one of the two required files for a theme (the other being style.css).
	 * It is used to display a page when nothing more specific matches a query.
	 * E.g., it puts together the home page when no home.php file exists.
	 * Learn more: http://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package understrap
	 */

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	get_header();
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="" id="content" tabindex="-1">
	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer(); ?>
