<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package takedanews
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'takedanews' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_search() ) : ?>

			<p>Sorry, nothing matched your search terms. Please try again with different keywords, or visit the
                <a href="/">home page</a>.</p>

        <?php else : ?>

			<p>
                <?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'takedanews' ); ?>
            </p>
        <?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
