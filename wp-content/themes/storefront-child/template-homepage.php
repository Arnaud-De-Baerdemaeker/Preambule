<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package storefront
 */

get_header(); ?>

	<?php get_template_part( 'templates/hero' ); ?>
	<div id="primary" class="">
		<main id="main" class="site-main" role="main">
			
			<!-- SELECTION PART -->
			<div class="container">
				<div class="product-selection">
					<h3 class="product-selection__title"><?php the_field('products_selection_title'); ?></h3>
					<?php $link = get_field('products_selection_link'); ?>
					<a href="<?php echo $link['url']; ?>" class="btn product-selection__link">
						<?php echo $link['title']; ?>
						<span class="icon-border">
							<span>
								<i class="fa fa-long-arrow-right icon" aria-hidden="true"></i>
							</span>
							<i class="fa fa-long-arrow-right icon twin" aria-hidden="true"></i>
						</span>
					</a>
				</div>
				<ul class="product-list col-3">
					<?php
						$args = array(
							'post_type' => 'product',
							'posts_per_page' => 3
						);
						$loop = new WP_Query( $args );
						if ( $loop->have_posts() ) {
							while ( $loop->have_posts() ) : $loop->the_post();
								wc_get_template_part( 'content', 'product' );
							endwhile;
						} else {
							echo __( 'No products found' );
						}
						wp_reset_postdata();
					?>
				</ul><!--/.products-->
			</div>
			<!-- END OF SELECTION PART -->

			<!-- PRESENTATION 1 -->
			<?php
				$title = get_field('presentation_1_title');
				$text = get_field('presentation_1_intro');
				$link = get_field('presentation_1_link');
				$image = get_field('presentation_1_image');
				
				$args = get_template_part( 'templates/half-grid', null, array(
					'title' => $title,
					'text' => $text,
					'link' => $link,
					'image' => $image,
					'direction' => 'ltr'
				));
			?>
			<!-- END OF PRESENTATION 1 -->

			<!-- GROSSE PARTIE AU MILIEU -->
			<!-- SLIDER -->
			<!-- END OF SLIDER -->

			<!-- PRESENTATION 2 -->
			<?php
				$title = get_field('presentation_2_title');
				$text = get_field('presentation_2_intro');
				$link = get_field('presentation_2_link');
				$image = get_field('presentation_2_image');
				
				$args = get_template_part( 'templates/half-grid', null, array(
					'title' => $title,
					'text' => $text,
					'link' => $link,
					'image' => $image,
					'direction' => 'rtl'
				));
			?>
			<!-- END OF PRESENTATION 2 -->
			<!-- END OF GROSSE PARTIE AU MILIEU -->

			<!-- PRESENTATION 3 -->
			<?php
				$title = get_field('presentation_3_title');
				$text = get_field('presentation_3_intro');
				$link = get_field('presentation_3_link');
				$image = get_field('presentation_3_image');

				$args = get_template_part( 'templates/half-grid', null, array(
					'title' => $title,
					'text' => $text,
					'link' => $link,
					'image' => $image,
					'direction' => 'ltr'
				));
			?>
			<!-- END OF PRESENTATION 3 -->

			<!-- PRESENTATION CENTER -->
			<?php
				$title = get_field('presentation_center_title');
				$text = get_field('presentation_center_intro');
				$link = get_field('presentation_center_link');
			?>
			<section class="half-grid half-grid--reverse">
				<div class="container">
					<div class="half-grid__text">
						<div class="">
							<h3><?php echo $title; ?></h3>
							<p><?php echo $text; ?></p>
							<?php
								if($link): ?>
									<a href="<?php echo $link['url']; ?>" class="btn btn__text">
										<?php echo $link['title']; ?>
										<span class="icon-border icon-border--borderless">
											<span>
												<i class="fa fa-long-arrow-right icon" aria-hidden="true"></i>
											</span>
											<i class="fa fa-long-arrow-right icon twin" aria-hidden="true"></i>
										</span>
									</a>
								<?php endif;
							?>
						</div>
					</div>
				</div>
			</section>
			<!-- END OF PRESENTATION CENTER -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
