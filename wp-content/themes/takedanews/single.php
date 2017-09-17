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

			<?php
                if(isset($post->post_password)) { // post has password
                    // Logic to get the post token from the post-password-token plugin if a post password is set
                    // This is then compared to the ppt passed in later on
                    $ppt_options = get_option(PPT_OPTION, '');
                    $post_token = md5($ppt_options['salt'].$post->post_name.$post->post_password);
                }
            ?>

            <?php if(isset($_GET['ppt'])) : // a post-password-token (ppt) has been passed in via the URL ?>

                <?php if($_GET['ppt'] === $post_token) : // ppt matches the one on file for this post ?>

                    <?php get_template_part( 'template-parts/content', get_post_type() ); // display post ?>

                <?php else : // ppt doesn't match the one for this post, i.e. it's wrong - display password form ?>

                    <?php echo get_the_password_form(); // display password form ?>

                <?php endif; ?>

            <?php else : // no ppt passed in?>

                <?php if(post_password_required()) : // password hasn't been entered, or hasn't been entered correctly ?>

					<?php echo get_the_password_form(); // display password form ?>

                <?php else : // password entered correctly or isn't password protected ?>

			        <?php get_template_part( 'template-parts/content', get_post_type() ); // display post ?>

                <?php endif; ?>

            <?php endif; ?>

        <?php endwhile; // End of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
