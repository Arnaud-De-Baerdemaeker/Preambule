<?php
/**
 * Template name: Our producers
 *
 * @package storefront
 */

defined( 'ABSPATH' ) || exit;

get_header();
get_template_part('templates/mini-hero');
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="container">
			<?php
			if(have_rows('producers')):
				while(have_rows('producers')): the_row();
				?>
					<!-- PRESENTATION  -->
					<?php
					$title = get_sub_field('producer_name');
					$text = get_sub_field('producer_description');
					$link_repeater = get_sub_field('producer_links');
					$image = get_sub_field('producer_image');
					$color = get_sub_field('producer_color');

					$args = get_template_part( 'templates/half-grid', null, array(
						'title' => $title,
						'text' => $text,
						'link_repeater' => $link_repeater,
						'image' => $image,
						'color' => $color,
						'direction' => 'ltr'
					));
					?>
					<!-- END OF PRESENTATION  -->
				<?php
				endwhile;
			else:
			?>
				<p><?php _e('No producers to display', 'preambule'); ?></p>
			<?php
			endif;
			?>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>