<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="post__header">

		<?php the_title( '<h1 class="post__title">', '</h1>' ); ?>

        <div class="post__meta">
            <time datetime="<?php echo date('Y-m-d h:i:s', get_the_time('U')); ?>"><?php the_date(); ?></time>
        </div>

    </header>

    <div class="post__content">
		<?php if(has_post_thumbnail()) : ?>
            <div class="post__image">
				<?php the_post_thumbnail('post-image'); ?>
            </div>
		<?php endif; ?>
		<?php
		the_content( sprintf(
			wp_kses(
			/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'takedanews' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );
		?>
    </div>

</article><!--/#post-<?php the_ID(); ?> -->