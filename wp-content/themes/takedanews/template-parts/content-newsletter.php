<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="newsletter__header">
        <h6 class="newsletter__back-link"><a href="/"><i class="fa fa-arrow-left"></i> More Newsletters</a></h6>
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
                <li class="newsletter__content__section" id="<?php echo get_sub_field('section_id'); ?>">
                    <div class="newsletter__content__section__header">
	                    <?php if(get_sub_field('title')) : ?>
                            <h4 class="newsletter__content__section__title">
                                <?php if(current_user_can('administrator')) : ?>
                                    <a href="<?php echo get_the_permalink() . '#' . get_sub_field('section_id'); ?>"><i class="fa fa-chain"></i></a>
                                <?php endif; ?>
                                <?php the_sub_field('title'); ?>
                            </h4>
	                    <?php endif; ?>
	                    <?php if(get_sub_field('section_introduction')) : ?>
                            <div class="newsletter__content__section__introduction"><?php the_sub_field('section_introduction'); ?></div>
	                    <?php endif; ?>
                        <div class="newsletter__content__section__header__arrow-indicator-container">
                            <span class="hide newsletter__content__section__header__arrow-indicator"><i class="fa fa-arrow-up"></i> CLOSE</span>
                            <span class="newsletter__content__section__header__arrow-indicator"><i class="fa fa-arrow-down"></i> READ MORE</span>
                        </div>
                    </div>
                    <?php if(get_sub_field('content')) : ?>
                        <div class="newsletter__content__section__articles hide">
                            <?php the_sub_field('content'); ?>
	                        <?php if(get_sub_field('what_this_means_for_takeda')) : ?>
                                <div class="newsletter__content__section__box">
                                    <h5 class="newsletter__content__section__box__title">What this means for Takeda</h5>
			                        <?php the_sub_field('what_this_means_for_takeda'); ?>
                                </div>
	                        <?php endif; ?>
	                        <?php if(get_sub_field('potential_actions')) : ?>
                                <div class="newsletter__content__section__box">
                                    <h5 class="newsletter__content__section__box__title">Potential Actions</h5>
			                        <?php the_sub_field('potential_actions'); ?>
                                </div>
	                        <?php endif; ?>

                            <span class="hide newsletter__content__section__header__arrow-indicator newsletter__content__section__header__arrow-indicator--in-article newsletter__content__section__close-articles"><i class="fa fa-arrow-up"></i> CLOSE</span>
                        </div>
                    <?php endif; ?>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>

</div><!--/#post-<?php the_ID(); ?> -->