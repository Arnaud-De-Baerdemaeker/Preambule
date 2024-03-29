<section class="half-grid sct-wrap <?php if($args['direction'] === 'rtl') { echo 'half-grid--reverse'; } ?>">
	<div class="half-grid__outer-grid <?php if($args['color']) { echo esc_html($args['color']['value']); } else { echo "yellow"; } ?>">
		<h3><?php echo $args['title']; ?></h3>
		<p><?php echo $args['text']; ?></p>
		<?php
		if($args['link']):
		?>
			<a href="<?php echo $args['link']['url']; ?>" class="btn btn__text">
				<?php echo $args['link']['title']; ?>
				<span class="icon-border icon-border--borderless">
					<span>
						<i class="fa fa-long-arrow-right icon" aria-hidden="true"></i>
					</span>
					<i class="fa fa-long-arrow-right icon twin" aria-hidden="true"></i>
				</span>
			</a>
		<?php
		elseif($args['link_repeater']):
			for($i = 0; $i < count($args['link_repeater']); $i++):
				?>
					<a href="<?php echo esc_url($args['link_repeater'][$i]['producer_links_link']); ?>" target="_blank" class="btn btn--smaller">
						<?php echo $args['link_repeater'][$i]['producer_links_name']; ?>
						<span class="icon-border icon-border--darker">
							<span>
								<i class="fa fa-long-arrow-right icon" aria-hidden="true"></i>
							</span>
							<i class="fa fa-long-arrow-right icon twin" aria-hidden="true"></i>
						</span>
					</a>
				<?php
			endfor;
			?>
		<?php
		endif;
		?>
	</div>

	<div class="container">
		<div class="half-grid__inner-grid">
			<div class="content">
				<img src="<?php echo esc_url($args['image']['url']); ?>" alt="<?php echo esc_attr($args['image']['alt']); ?>" />
			</div>
		</div>
	</div>
</section>