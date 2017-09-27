<?php if($past_newsletters = get_past_newsletters()) : ?>
	<div class="border-box border-box--grey">
		<h5 class="border-box__title">Past Newsletters</h5>
		<div class="border-box__content">
			<?php foreach($past_newsletters as $past) : ?>
			<a href="<?php echo get_the_permalink($past->ID); ?>"><strong><?php echo get_field('display_title', $past->ID); ?></strong></a></>
		<p><?php echo get_field('display_date', $past->ID); ?></p>
		<?php endforeach;?>
	</div>
	</div>
<?php endif; ?>