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
						$link = get_field('producer_links');
						// $image = get_field('presentation_3_image');

						$args = get_template_part( 'templates/half-grid', null, array(
							'title' => $title,
							'text' => $text,
							'link' => $link,
							// 'image' => $image, // add image
							'direction' => 'ltr'
						));
					?>
					<!-- END OF PRESENTATION  -->
						
					<?php
					endwhile;
				else:
					
				endif;
				?>

				

			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>