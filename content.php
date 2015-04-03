<?php
/**
 * @package Casper
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'casper' ) );
		?>
    <header class="post-header">
        <?php if ( 'post' == get_post_type() ) : ?>
			<span class="post-meta">
				<?php 
					if(  false == get_theme_mod( 'casper_hide_dates') ) {
						casper_posted_on(); 
					}
					if(  false == get_theme_mod( 'casper_hide_categories') ) {
						printf( __( ' on ', 'casper' ).'%1$s', $category_list );
					}
        	    	edit_post_link( __( 'Edit&rarr;', 'casper' ), '<span class="edit-link">&nbsp;&bull;&nbsp;', '</span>' ); 
				?>
			</span>
		<?php endif; ?>
        <h1 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
    </header>
	<section class="post-content">

		<?php 
		if ( false != get_theme_mod( 'casper_read_more_link')) {
			$read_more = get_theme_mod( 'casper_read_more_link');
		} else {
			$read_more = __( '&hellip;&nbsp;<span class="meta-nav">&rarr;</span>', 'casper' );
		}
		if ( has_excerpt() || false != get_theme_mod( 'casper_auto_excerpt') ) {
			the_excerpt();
		} else {
			the_content( $read_more );
		}
		?>
	    <?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'casper' ),
				'after'  => '</div>',
			) );
		?>
		<div class="clear">&nbsp;</div>
	</section>
</article><!-- #post-## -->