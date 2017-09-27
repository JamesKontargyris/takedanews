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

        <?php get_template_part('template-parts/partials/partial', 'latest-newsletter'); ?>
        <?php // get_template_part('template-parts/partials/partial', 'past-newsletters'); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
