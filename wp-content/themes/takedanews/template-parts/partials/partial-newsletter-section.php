<li class="newsletter__content__section" id="<?php echo sanitize(get_sub_field('section_id')); ?>">
	<a name="<?php echo sanitize(get_sub_field('section_id')); ?>"></a>
	<div class="newsletter__content__section__header">
		<?php if(get_sub_field('title')) : ?>
			<h4 class="newsletter__content__section__title">
				<?php if(current_user_can('administrator')) : ?>
					<a href="<?php echo get_the_permalink() . '?type=section&pwd_token=' . get_option( 'password_protected_password' ) . '#' . get_sub_field('section_id'); ?>"><i class="fa fa-chain"></i></a>
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

    <ul class="newsletter__content__section__articles hide">
        <?php if(have_rows('articles')) : ?>
            <?php while(have_rows('articles')) : the_row(); ?>
                <?php get_template_part('template-parts/partials/partial', 'newsletter-article'); ?>
            <?php endwhile; ?>
        <?php endif; ?>

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
    </ul>
</li>