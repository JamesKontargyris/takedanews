<li class="newsletter__article" id="<?php echo sanitize(get_sub_field('article_id')); ?>">
	<a name="<?php echo sanitize(get_sub_field('article_id')); ?>"></a>
	<?php if(get_sub_field('article_title')) : ?>
		<p class="newsletter__article__title">
			<strong>
				<?php if(current_user_can('administrator')) : ?>
					<a href="<?php echo get_the_permalink() . '?type=article&pwd_token=' . get_option( 'password_protected_password' ) . '#' . sanitize(get_sub_field('article_id')); ?>"><i class="fa fa-chain"></i></a>
				<?php endif; ?>
				<?php the_sub_field('article_title'); ?>
			</strong>
		</p>
		<?php echo get_sub_field('article_content'); ?>
	<?php endif; ?>
</li>