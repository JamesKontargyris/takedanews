<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package takedanews
 */

get_header(); ?>

	<img src="<?php echo get_template_directory_uri(); ?>/img/who-we-are.jpg" alt="Header Image" class="banner-image">

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

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


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
