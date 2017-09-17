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

			<h2>Access limited</h2>
			<p>Takeda Newsroom articles are password protected and only accessible via a unique URL.</p>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
