<?php if($latest_newsletter = get_latest_newsletter()) : ?>
	<div class="border-box">
		<?php foreach($latest_newsletter as $latest) : ?>
			<h5 class="border-box__title">Latest Newsletter</h5>
			<div class="border-box__content">
				<h3 class="newsletter__title"><a href="<?php echo get_the_permalink($latest->ID); ?>"><?php echo get_field('display_title', $latest->ID); ?></a></h3>
				<h5 class="newsletter__date"><?php echo get_field('display_date', $latest->ID); ?></h5>
			</div>
		<?php endforeach;?>
	</div>
<?php endif; ?>