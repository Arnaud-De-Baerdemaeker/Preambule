<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<?php
	global $product;
	$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );
	echo '<a href="' . esc_url( $link ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">'; ?>

		<li class="product-card">
			<div class="product-card__container">
				<div class="product-card__wrapper yellow">
					<div class="product-card__infos">
						<?php
						/**
						 * Hook: woocommerce_before_shop_loop_item_title.
						 *
						 * @hooked woocommerce_show_product_loop_sale_flash - 10
						 * @hooked woocommerce_template_loop_product_thumbnail - 10
						 */
						?>

						<div class="product-card__image">
							<?php do_action( 'woocommerce_before_shop_loop_item_title' ); // <img /> ?>
						</div>

						<?php
						/**
				 		 * Hook: woocommerce_shop_loop_item_title.
						 *
						 * @hooked woocommerce_template_loop_product_title - 10
						 */
						// do_action( 'woocommerce_shop_loop_item_title' );
						?>

						<h3 class="product-card__title"><?php the_title(); ?></h3>

						<h4 class="product-card__title"><?php the_field('product_subtitle'); ?></h4>
				
						<?php
						/**
						 * Hook: woocommerce_after_shop_loop_item_title.
						 *
						 * @hooked woocommerce_template_loop_rating - 5
						 * @hooked woocommerce_template_loop_price - 10
						 */
						do_action( 'woocommerce_after_shop_loop_item_title' ); // <p>
						?>

						<p class="product-card__composition"><?php the_field('product_composition'); ?></p>

						<?php
							$dishes = get_field('product_accompaniments'); ?>
							<ul class="ingredients-list">
								<?php foreach($dishes as $dish): ?>
									<li class="ingredients-list__item">
										<?php switch($dish):
											case "Viande":
												echo '<svg xmlns="http://www.w3.org/2000/svg" width="17.296" height="17.296" fill="none" stroke="black" stroke-linejoin="round" stroke-width="1.5" xmlns:v="https://vecta.io/nano"><path d="M16.545 4.962h0c0-2.326-1.886-4.212-4.212-4.212H7.067A6.32 6.32 0 0 0 .748 7.069v5.792a3.69 3.69 0 0 0 3.686 3.686h0c.978 0 1.915-.388 2.606-1.08s1.08-1.629 1.08-2.606v-.527a3.16 3.16 0 0 1 3.159-3.159h1.053a4.21 4.21 0 0 0 4.213-4.213z"/><path d="M4.435 14.44a1.58 1.58 0 1 0-1.118-.462 1.58 1.58 0 0 0 1.118.462zm7.898-11.584H7.067c-2.326.001-4.211 1.886-4.212 4.212v1.053c0 .582.471 1.053 1.053 1.053h0c.582 0 1.053-.471 1.053-1.053h0c0-.582.471-1.053 1.053-1.053h6.319c1.163 0 2.106-.943 2.106-2.106h0c0-1.163-.943-2.106-2.106-2.106z"/></svg>';
												break;
											case "Poulet":
												echo '<svg xmlns="http://www.w3.org/2000/svg" width="17.48" height="17.479"  fill="none" stroke="black" stroke-linejoin="round" stroke-width="1.5" xmlns:v="https://vecta.io/nano"><path d="M13.649 1.073h0A4.32 4.32 0 0 0 8.5 3.039L6.315 6.92a2.06 2.06 0 0 0 .348 2.468l1.428 1.432a2.06 2.06 0 0 0 2.468.345l3.882-2.184a4.32 4.32 0 0 0 1.966-5.149h0c-.437-1.3-1.458-2.321-2.758-2.759z"/><path d="M6.295 13.374c-.125-.121-.262-.229-.41-.32l2.219-2.219-1.46-1.46-2.22 2.219a2.32 2.32 0 0 0-.32-.41 1.81 1.81 0 0 0-3.219.702 1.81 1.81 0 0 0 .682 1.835c.439.439 1.457.732 1.82.37-.362.362-.07 1.382.371 1.82a1.81 1.81 0 0 0 3.219-.702 1.81 1.81 0 0 0-.682-1.835z"/></svg>';
												break;
											case "Crustacés":
												echo '<svg xmlns="http://www.w3.org/2000/svg" width="17.296" height="17.297" fill="none" stroke="black" xmlns:v="https://vecta.io/nano"><g stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M16.53 8.122H8.121C4.05 8.122.749 4.821.749.75H9.7c3.78 0 6.845 3.065 6.845 6.845S13.48 14.44 9.7 14.44H4.961a3.16 3.16 0 0 1 3.159-3.159h2.106"/><path d="M10.227 14.42v-6.3c0-1.58-1.053-7.372-4.212-7.372m4.213 7.374l4.809-4.809"/><path d="M10.228 8.118l4.313 4.314M6.278 3.905c.145 0 .263.118.263.263s-.118.263-.263.263-.263-.118-.263-.263c0-.07.028-.137.077-.186s.116-.077.186-.077"/></g><path d="M4.962 14.44l-3.159-2.106v4.212l3.159-2.106z" stroke-linejoin="round" stroke-width="1.5"/></svg>';
												break;
											case "Poisson":
												echo '<svg xmlns="http://www.w3.org/2000/svg" width="17.302" height="17.299" fill="none" stroke="black" stroke-linejoin="round" stroke-width="1.5" xmlns:v="https://vecta.io/nano"><path d="M8.508 2.727c-2.228.011-4.423 1.137-5.169 2.668a1.02 1.02 0 0 0 .224 1.155l1.785 1.784" stroke-linecap="round"/><path d="M7.16 12.348c6.017-1.062 9.993-4.165 9.311-10.619-.054-.473-.427-.846-.9-.9C9.118.147 6.014 4.122 4.952 10.14l-3.913 1.741a.52.52 0 0 0 .07.96l2.738.611.611 2.738a.52.52 0 0 0 .96.07z"/><path d="M14.577 8.793c-.011 2.228-1.137 4.423-2.668 5.169a1.02 1.02 0 0 1-1.155-.224l-1.782-1.785M4.95 10.141l2.209 2.209m4.911-8.963c.145 0 .263.118.263.263s-.118.263-.263.263-.263-.118-.263-.263c0-.07.028-.137.077-.186s.116-.077.186-.077" stroke-linecap="round"/></svg>';
												break;
											case "Fromage":
												echo '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17.827" height="17.151" xmlns:v="https://vecta.io/nano"><g fill="none" stroke="black" stroke-linejoin="round" stroke-width="1.5"><path d="M1.059 8.122l8.086-7.1a1.06 1.06 0 0 1 .79-.263c3.174.15 5.927 2.243 6.92 5.261" stroke-linecap="round"/><path d="M1.059 8.123v2.852c0 .419.248.798.632.965a1.58 1.58 0 0 1-.3 2.993.42.42 0 0 0-.333.412c0 .304.131.593.36.793s.533.292.834.251l13.69-1.825c.523-.07.913-.516.913-1.044v-7.5z"/><use xlink:href="#B"/><use xlink:href="#B" x="5.266" y="-3.159"/><g stroke-linecap="round"><path d="M5.008 9.703c.145 0 .263.118.263.263s-.117.263-.262.263-.263-.117-.264-.262c0-.07.027-.137.077-.187s.116-.077.186-.077"/><use xlink:href="#C"/><use xlink:href="#C" x="-2.633" y="-3.686"/></g></g><defs ><path id="B" d="M8.167 13.915c.727 0 1.316-.589 1.316-1.316s-.589-1.316-1.316-1.316-1.316.589-1.316 1.316c0 .349.139.684.385.931s.582.385.931.385z"/><path id="C" d="M12.38 12.862c.106 0 .202.064.243.162s.018.211-.057.287-.188.098-.287.057-.162-.137-.162-.243c0-.145.118-.263.263-.263"/></defs></svg>';
												break;
											case "Apéro":
												echo '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="16.948" height="17.867" xmlns:v="https://vecta.io/nano"><style><![CDATA[.B{stroke-linejoin:round}.C{stroke-width:1.5}.D{stroke-linecap:round}]]></style><g fill="none" stroke="#040506" class="B C"><g class="D"><path d="M.936 15.696l3.956 1.206"/><path d="M2.914 16.302l1.209-3.965"/></g><path d="M5.841 12.34h0c-1.126.352-2.353-.022-3.091-.943h0a2.99 2.99 0 0 1-.4-3.066l3.019-7.235a.52.52 0 0 1 .63-.3l3.062.931a.52.52 0 0 1 .354.6l-1.53 7.688c-.195 1.095-.983 1.991-2.044 2.325z"/><g class="D"><path d="M3.948 4.507l4.747 1.448m-3.651.783c.068.021.125.068.159.13s.04.137.018.205c-.044.142-.193.223-.336.181a.27.27 0 0 1-.158-.13c-.033-.062-.04-.136-.019-.204.044-.142.193-.223.336-.181"/><use xlink:href="#B"/><use xlink:href="#B" x="1.611" y="1.612"/><use xlink:href="#C"/><use xlink:href="#B" x="-4.836" y="1.612"/><use xlink:href="#C" x="-6.984"/><path d="M12.054 16.934l3.961-1.187"/><path d="M14.034 16.343l-1.19-3.971"/><path d="M10.669.927l.412-.123a.52.52 0 0 1 .628.306l2.984 7.247a2.99 2.99 0 0 1-.415 3.064h0a2.87 2.87 0 0 1-3.1.931h0a2.97 2.97 0 0 1-1.657-1.322"/><path d="M11.201 5.094l1.913-.573"/></g></g><defs ><path id="B" d="M10.955 6.739c.068.021.125.068.159.13s.04.137.018.205c-.044.142-.193.223-.336.181-.068-.021-.125-.068-.159-.13s-.04-.137-.018-.205a.27.27 0 0 1 .336-.181"/><path id="C" d="M11.492 9.963c.068.021.125.067.158.13s.04.136.019.204c-.044.142-.193.223-.336.181-.068-.021-.125-.068-.159-.13s-.04-.137-.018-.205a.27.27 0 0 1 .336-.18"/></defs></svg>';
												break;
											case "Repas":
												echo '<svg xmlns="http://www.w3.org/2000/svg" width="17.297" height="16.255"  fill="none" stroke="#040506" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" xmlns:v="https://vecta.io/nano"><path d="M1.803 6.027v9.478m12.63-5.265h1.582c.29 0 .526-.235.527-.525.006-2.69.02-5.938-1.094-8.628-.095-.233-.342-.366-.589-.317s-.425.266-.424.517v14.218M.75.761v4.212c0 .582.471 1.053 1.053 1.053h0c.582 0 1.053-.471 1.053-1.053V.761m8.952 4.763c-1.799-1.931-4.784-2.145-6.841-.491m-.531 7.816a5.04 5.04 0 0 0 7.372 0"/></svg>';
												break;
										endswitch; ?>
										<span class="hide"><?php echo $dish; ?></span>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php ?>
						<?php
						/**
						 * Hook: woocommerce_after_shop_loop_item.
						 *
						 * @hooked woocommerce_template_loop_product_link_close - 5
						 * @hooked woocommerce_template_loop_add_to_cart - 10
						 */
						// do_action( 'woocommerce_after_shop_loop_item' ); // </a>
						?>
					</div>
				</div>
			</div>
		</li>
	</a>
<?php ?>