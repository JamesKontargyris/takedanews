<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package takedanews
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', get_post_type() ); // display post ?>

		<?php endwhile; // End of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->
    <a class="button button--back-to-top" href="#top"><i class="fa fa-arrow-up"></i> Top</a>

<?php
get_footer();
