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
					$producer_name = get_sub_field('producer_name');
					$producer_description = get_sub_field('producer_description');
					?>
						
					<h3><?php echo $producer_name; ?></h3>
					<p><?php echo $producer_description ?></p>

					<?php
					if(have_rows('producer_links')):
						?>

						<ul>
						
							<?php
							while(have_rows('producer_links')): the_row();
								$producer_links_name = get_sub_field('producer_links_name');
								$producer_links_link = get_sub_field('producer_links_link');
								?>

								<li>
									<a href="<?php echo esc_url($producer_links_link); ?>"><?php echo $producer_links_name; ?></a>
								</li>
									
							<?php
							endwhile;
							?>

						</ul>

						<?php
						else:

						endif;
						
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