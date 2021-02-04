<?php
	/**
	 * The template for displaying the footer.
	 *
	 * Contains the closing of the #content div and all content after
	 *
	 * @package understrap
	 */

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

	$container = get_theme_mod( 'understrap_container_type' );
?>

<!-- <html> -->
	<!-- <body> -->
		<!-- #page -->
			<footer class="footer">
				<div class="container">
					<div class="footer__content">
						<div class="footer__infos">
							<h1 class="brand__container">
								<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url" class="brand__link">
									<img src="<?php echo get_template_directory_uri(); ?>/images/preambule_card_logo-dark.svg" alt="" class="brand__logo">
									<span class="brand__title brand__title--white"><?php bloginfo( 'name' ); ?></span>
								</a>
							</h1>

							<section>
								<h3>Contactez-nous</h3>
								<ul>
									<li>
										<a href="" class="button button__footer">
											<span class="icon-border icon-border--left">
												<span>
													<i class="fa fa-phone icon icon--left icon-phone" aria-hidden="true"></i>
												</span>
												<i class="fa fa-phone icon twin twin--left twin-phone" aria-hidden="true"></i>
											</span>
											0123456789
										</a>
									</li>
									<li>
										<a href="" class="button button__footer">
											<span class="icon-border icon-border--left">
												<span>
													<i class="fa fa-envelope-o icon icon--left icon-envelope" aria-hidden="true"></i>
												</span>
												<i class="fa fa-envelope-o icon twin twin--left twin-envelope" aria-hidden="true"></i>
											</span>
											abcd@efgh.com
										</a>
									</li>
								</ul>
							</section>

							<section>
								<h3>Navigation</h3>
								<ul><!-- a class link -->
									<li>Qui sommes-nous ?</li>
									<li>Plan du site</li>
									<li>Conditions générales et vie privée</li>
									<li>Politique des cookies</li>
								</ul>
							</section>

							<section>
								<h3>Suivez-nous</h3>
								<ul>
									<li></li>
									<li></li>
								</ul>
							</section>
						</div>

						<div class="footer__copyright">
							<p>c Lorem Ipsum 2021</p>
							<p>Lorem Ipsum</p>
						</div>
					</div>
				</div>
			</footer>
		</div><!-- #page we need this extra closing tag here -->
		<?php wp_footer(); ?>
	</body>
</html>