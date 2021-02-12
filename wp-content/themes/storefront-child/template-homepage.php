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
				$color = get_field('presentation_1_color');
				
				$args = get_template_part( 'templates/half-grid', null, array(
					'title' => $title,
					'text' => $text,
					'link' => $link,
					'image' => $image,
					'color' => $color,
					'direction' => 'ltr'
				));
			?>
			<!-- END OF PRESENTATION 1 -->

			<!-- INSTAGRAM SLIDER -->
			<div class="center sct-wrap black">
				<div class="instagram-slider">
					<div class="container">
						<div class="instagram-slider__left-part">
							<h3 class="instagram-slider__title"><?php the_field('instagram_slider_title'); ?></h3>
							<p class="instagram-slider__text"><?php the_field('instagram_slider_text'); ?></p>
							<div class="slicknav">
								<div class="slicknav__wrapper">
									<a href="" class="slicknav__item prev">
										<i class="fa fa-chevron-left icon" aria-hidden="true"></i>
									</a>
									<div class="instagram-slider__icon-container">
										<a href="" class="instagram-slider__icon"><i class="fa fa-instagram" aria-hidden="true"></i></a>
									</div>
									<a href="" class="slicknav__item next">
										<div class="timer">
											<div class="mask"></div>
										</div>
										<i class="fa fa-chevron-right icon" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						</div>

						<div class="instagram-slider__right-part">
							<?php
								if(have_rows('instagram_slider')): ?>
									<ul class="instagram-slider__list">
										<?php
											while(have_rows('instagram_slider')): the_row();
												$image = get_sub_field('instagram_slider_image');
												$link = get_sub_field('instagram_slider_link');
												$link_url = $link['url']; ?>
												<li class="instagram-slider__list-item">
													<a href="<?php esc_url($link_url); ?>" class="instagram-slider__link"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="instagram-slider__image" /></a>
												</li>
											<?php endwhile;
										?>
									</ul>
								<?php endif;
							?>
						</div>
					</div>
				</div>
			
				<!-- END OF INSTAGRAM SLIDER -->

				<!-- PRESENTATION 2 -->
				<?php
					$title = get_field('presentation_2_title');
					$text = get_field('presentation_2_intro');
					$link = get_field('presentation_2_link');
					$image = get_field('presentation_2_image');
					$color= get_field('presentation_2_color');
					
					$args = get_template_part( 'templates/half-grid-reverse', null, array(
						'title' => $title,
						'text' => $text,
						'link' => $link,
						'image' => $image,
						'color' => $color,
						'direction' => 'rtl'
					));
				?>
				<!-- END OF PRESENTATION 2 -->
			</div>

			<!-- PRESENTATION 3 -->
			<?php
				$title = get_field('presentation_3_title');
				$text = get_field('presentation_3_intro');
				$link = get_field('presentation_3_link');
				$image = get_field('presentation_3_image');
				$color = get_field('presentation_3_color');

				$args = get_template_part( 'templates/half-grid', null, array(
					'title' => $title,
					'text' => $text,
					'link' => $link,
					'image' => $image,
					'color' => $color,
					'direction' => 'ltr'
				));
			?>
			<!-- END OF PRESENTATION 3 -->

			<!-- PRESENTATION CENTER -->
			<?php
				$title = get_field('presentation_center_title');
				$text = get_field('presentation_center_intro');
				$link = get_field('presentation_center_link');
				$color = get_field('presentation_center_color');
			?>
			<section class="presentation-center sct-wrap <?php if($color) { echo esc_html($color['value']); } else { echo "yellow"; } ?>">
				<div class="container">
					<div class="presentation-center__content">
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
			</section>
			<!-- END OF PRESENTATION CENTER -->
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>