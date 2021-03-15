<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version'    => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';
require 'inc/wordpress-shims.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce            = require 'inc/woocommerce/class-storefront-woocommerce.php';
	$storefront->woocommerce_customizer = require 'inc/woocommerce/class-storefront-woocommerce-customizer.php';

	require 'inc/woocommerce/class-storefront-woocommerce-adjacent-products.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
	require 'inc/woocommerce/storefront-woocommerce-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';
	require 'inc/nux/class-storefront-nux-starter-content.php';
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */

/*function wpcustom_deregister_scripts_and_styles(){
	wp_deregister_style('storefront-woocommerce-style');
	wp_deregister_style('storefront-style');
}
add_action( 'wp_print_styles', 'wpcustom_deregister_scripts_and_styles', 100 ); */

function woocommerce_template_loop_add_to_cart( $args = array() ) {
	global $product;

	if ( $product ) {
		$defaults = array(
			'quantity'   => 1,
			'class'      => implode(
				' ',
				array_filter(
					array(
						'btn',
						'product_type_' . $product->get_type(),
						$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
						$product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
					)
				)
			),
			'attributes' => array(
				'data-product_id'  => $product->get_id(),
				'data-product_sku' => $product->get_sku(),
				'aria-label'       => $product->add_to_cart_description(),
				'rel'              => 'nofollow',
			),
		);

		$args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

		if ( isset( $args['attributes']['aria-label'] ) ) {
			$args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
		}

		wc_get_template( 'loop/add-to-cart.php', $args );
	}
}
add_action('init', 'woocommerce_template_loop_add_to_cart');

/**
 * Cart Link
 * Displayed a link to the cart including the number of items present and the cart total
 *
 * @return void
 * @since  1.0.0
 */
function storefront_cart_link() {
	if ( ! storefront_woo_cart_available() ) {
		return;
	}
	?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'storefront' ); ?>">
			<?php /* translators: %d: number of items in cart */ ?>
			<?php echo wp_kses_post( WC()->cart->get_cart_subtotal() ); ?> <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'storefront' ), WC()->cart->get_cart_contents_count() ) ); ?></span>
		</a>
	<?php
}

// LIMIT NUMBER OF SELECTED ITEMS WITH ACF CHECKBOXES
// add_filter('acf/validate_value/name=your_field_name', 'only_allow_3', 20, 4);
// function only_allow_3($valid, $value, $field, $input) {
//   if (count($value) > 3) {
//     $valid = 'Only Select 3';
//   }
//   return $valid;
// }

// CHANGE "ADD TO CART" TEXT
add_filter( 'woocommerce_product_add_to_cart_text', 'add_to_cart_text' );
function add_to_cart_text() {
	return __( 'Pre-select', 'preambule' );
}

// CHANGE TEXT ON ORDER BUTTON
add_filter( 'woocommerce_order_button_html', 'custom_cart_button_html' );

function custom_cart_button_html( $button_html ) {
	$order_button_text = __('Pre-order', 'preambule');
	$button_html = '
		<button type="submit" class="btn btn__text order-button" name="woocommerce_checkout_place_order" id="place_order">'
			.esc_html($order_button_text).
			'<span class="icon-border icon-border--borderless">
				<span>
					<i class="fa fa-long-arrow-right icon" aria-hidden="true"></i>
				</span>
				<i class="fa fa-long-arrow-right icon twin twin--borderless" aria-hidden="true"></i>
			</span>
		</button>'
	;
	return $button_html;
}

// ADD SLICK SCRIPTS
wp_enqueue_script( 'slick-scripts', get_template_directory_uri() . '/assets/js/slick' . $suffix . '.js', array(), '', true );
wp_enqueue_script( 'custom-scripts', get_template_directory_uri() . '/assets/js/custom-js' . $suffix . '.js', array( 'jquery', 'slick-scripts'), '', true );

function filter() {
	
	$filter = $_POST['filter'];
	if (empty($filter)) {
		$ajaxposts = new WP_Query([
			'post_type' => 'product',
		    'posts_per_page' => -1,
		    'orderby' => 'menu_order', 
		    'order' => 'desc'
		]);
	}
	else {
		$ajaxposts = new WP_Query([
	 		'post_type' => 'product',
			'posts_per_page' => -1,
			'orderby' => 'menu_order', 
			'order' => 'desc',
			'tax_query' => array(
				array(
					'taxonomy' => 'producteur',
					'field' => 'slug',
					'terms' => $filter
				)
			)
		]);
	}
	

	$response = '';
  
	if($ajaxposts->have_posts()) {
	  while($ajaxposts->have_posts()) : $ajaxposts->the_post();
		$response .= wc_get_template_part( 'content', 'product' );
	  endwhile;
	} else {
		$empty = __("No results", 'preambule');
		$empty_html = "<div class='empty'><h3>".$empty."</h3></div>";
	  	$response = $empty_html;

	}
  
	echo $response;
	exit;
}
add_action('wp_ajax_filter_cars', 'filter');
add_action('wp_ajax_nopriv_filter', 'filter');

// ENQUEUE THE NEW ADD-TO-CART.JS FILE AND DEQUEUE THE ORIGINAL
add_action('wp_enqueue_scripts', 'js_file_change', 100);
function js_file_change() {
    wp_dequeue_script('add-to-cart');
    wp_enqueue_script('my-add-to-cart', get_stylesheet_directory_uri().'/assets/js/my-add-to-cart.js', array('jquery'));
}

// CHANGE WIDGET VIEW CART BUTTON STYLE
// remove_action('woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10);

// function my_woocommerce_widget_shopping_cart_button_view_cart() {
// 	echo
// 		'<a href="' . esc_url( wc_get_cart_url() ) . '" class="btn">'
// 			. esc_html__( 'View art', 'woocommerce' ) .
// 			'<span class="icon-border">
// 				<span>
// 					<i class="fa fa-long-arrow-right icon" aria-hidden="true"></i>
// 				</span>
// 				<i class="fa fa-long-arrow-right icon twin" aria-hidden="true"></i>
// 			</span>
// 		</a>'
// 	;
// }

// add_action('woocommerce_widget_shopping_cart_buttons', 'my_woocommerce_widget_shopping_cart_button_view_cart', 10);