<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="newsletter__header">
        <!--<h6 class="newsletter__back-link"><a href="/"><i class="fa fa-arrow-left"></i> More Newsletters</a></h6>-->
		<h1 class="newsletter__title"><?php echo get_field('display_title'); ?></h1>
		<h3 class="newsletter__date"><?php echo get_field('display_date'); ?></h3>
	</header>
    <hr>

	<?php if(get_field('newsletter_introduction')) : ?>
        <div class="newsletter__introduction">
            <?php echo get_field('newsletter_introduction'); ?>
        </div>
    <?php endif; ?>

    <?php if(have_rows('article_sections')) : ?>
        <ul class="newsletter__content">
            <?php while(have_rows('article_sections')) : the_row(); ?>
                <?php get_template_part('template-parts/partials/partial', 'newsletter-section'); ?>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>

</div><!--/#post-<?php the_ID(); ?> -->