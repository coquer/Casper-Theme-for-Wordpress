<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Casper
 */

get_header(); ?>


		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php casper_post_nav(); ?>

            <article <?php post_class(); ?>>
                <?php
                if ( comments_open() || '0' != get_comments_number() ) :
                    comments_template();
                endif;
                ?>
            </article>

		<?php endwhile; // end of the loop. ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>