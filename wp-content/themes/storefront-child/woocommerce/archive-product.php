<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

?>

<div class="container">
	<h2 class="woocommerce-products-header__title page-title"><?php _e('Our range', 'preambule'); ?></h2>
</div>

<?php

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

		?>

		<div class="shop-wrapper">
			<div class="filters">
			<h3><?php _e('Filter', 'preambule'); ?></h3>
			<h4><?php _e('by Producers', 'preambule'); ?></h4>
					<?php
						$categories = get_categories(array('taxonomy' => 'producteur', 'hide_empty'=> 0, 'order' => 'ASC'));
						
						echo "<div class='filters-list'>";
						foreach ($categories as $category):
								echo "<div class='filter-list_item' data-for='".$category->taxonomy."' data-slug='".$category->slug."'>";
									echo "<label class='checkbox filter' for='".$category->slug."'>";
											echo $category->name;
											echo "<input type='checkbox' name='years' id='".$category->slug."' class='activities__radio-input'>";
											echo "<span class='checkmark'></span>";
									echo "</label>";
								echo "</div>";
							endforeach;
						echo "</div>";
					?>
			<h4><?php _e('by Types', 'preambule'); ?></h4>
					<?php
						$categories = get_categories(array('taxonomy' => 'champagne_type', 'hide_empty'=> 0, 'order' => 'ASC'));
						
						echo "<div class='filters-list'>";
						foreach ($categories as $category):
								echo "<div class='filter-list_item' data-for='".$category->taxonomy."' data-slug='".$category->slug."'>";
									echo "<label class='checkbox filter' for='".$category->slug."'>";
											echo $category->name;
											echo "<input type='checkbox' name='years' id='".$category->slug."' class='activities__radio-input'>";
											echo "<span class='checkmark'></span>";
									echo "</label>";
								echo "</div>";
							endforeach;
						echo "</div>";
					?>
			</div>
			<div class="products">
				<ul class="product-list col-3 result-tiles">
					<?php
						$args = array(
							'post_type' => 'product',
							'posts_per_page' => -1
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
		</div>

	</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer( 'shop' ); ?>
