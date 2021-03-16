<?php
/**
 * Template name: Contact
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
			<section>
				<h3><?php _e('You can send us a message', 'preambule'); ?></h3>
				<?php the_content(); ?>
			</section>

			<section>
				<h3><?php _e('Or you can call us directly', 'preambule'); ?></h3>
				<?php
				if(have_rows('our_coordinates')):
				?>
					<ul>
						<?php
						while(have_rows('our_coordinates')): the_row();
							$name = get_sub_field('coordinate_name');
							$input = get_sub_field('coordinate_input');
							?>
							<li>
								<?php echo $name; ?><br />
								<?php echo $input; ?>
							</li>
						<?php
						endwhile;
						?>
					</ul>
				<?php
				endif;
				?>
			</section>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>