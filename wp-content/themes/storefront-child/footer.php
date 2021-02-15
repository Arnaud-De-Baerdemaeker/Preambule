<?php
	/**
	 * The template for displaying the footer.
	 *
	 * Contains the closing of the #content div and all content after
	 *
	 */

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;

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
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/assets/preambule_card_logo-dark.svg" alt="" class="brand__logo">
									<span class="brand__title brand__title--white"><?php bloginfo( 'name' ); ?></span>
								</a>
							</h1>

							<section>
								<h3>Contactez-nous</h3>
								<ul>
									<li>
										<a href="" class="btn btn__footer">
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
										<a href="" class="btn btn__footer">
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
								<ul class="navigation__list">
									<li>
										<a href="">Qui sommes-nous ?</a>
									</li>
									<li>
										<a href="">Plan du site</a>
									</li>
									<li>
										<a href="">Conditions générales et vie privée</a>
									</li>
									<li>
										<a href="">Politique des cookies</a>
									</li>
								</ul>
							</section>

							<section>
								<h3>Suivez-nous</h3>
								<ul class="social-list navigation__list">
									<li class="social-list__item">
										<a title="Facebook" href="https://www.facebook.com/preambulebelgium" class="social-list__link">
											<i class="fa fa-facebook-square icon icon--left icon-envelope" aria-hidden="true"></i> Facebook
										</a>
									</li>
									
									<li class="social-list__item">
										<a title="Instagram" href="https://www.instagram.com/preambule.belgium/" class="social-list__link">
											<i class="fa fa-instagram icon icon--left icon-envelope" aria-hidden="true"></i> Instagram
										</a>
									</li>
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
		<!-- </div>#page we need this extra closing tag here -->
		
	</body>
</html>