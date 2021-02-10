<?php
	/**
	 * Hero setup.
	 *
	 * @package understrap
	 */

	// Exit if accessed directly.
	defined( 'ABSPATH' ) || exit;
?>

<!-- .hero -->
	<section class="container">
		<div class="intro">
			<div class="intro__container">
				<h2>
					<?php the_field('titles_main_title'); ?><br />
					<?php
						if(get_field('titles_subtitle')): ?>
							<span><?php the_field('titles_subtitle'); ?></span>
						<?php endif;
					?>
				</h2>

				<?php $link = get_field('titles_link'); ?>
				<a href="<?php echo $link['url']; ?>" class="btn btn__text">
					<?php echo $link['title']; ?>
					<span class="icon-border icon-border--borderless">
						<span>
							<i class="fa fa-long-arrow-right icon" aria-hidden="true"></i>
						</span>
						<i class="fa fa-long-arrow-right icon twin twin--borderless" aria-hidden="true"></i>
					</span>
				</a>
			</div> <!-- .intro_container -->
		</div> <!-- .intro -->
	</section> <!-- .container -->
</div> <!-- .hero -->