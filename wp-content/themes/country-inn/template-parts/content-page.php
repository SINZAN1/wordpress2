<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 */
$hide_show_feature_image = country_inn_get_option( 'country_inn_show_feature_image_single_option' );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
    <div class="blog-block">
        <?php country_inn_post_thumbnail(); ?>
        
        <p class="blog-text">
            <?php the_content();
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:','country-inn' ),
                    'after'  => '</div>',
                  ) );
            ?>
        </p>
    </div>
    <?php if ( get_edit_post_link() ) : ?>
    		<footer class="entry-footer">
    			<?php
    				edit_post_link(
    					sprintf(
    						/* translators: %s: Name of current post */
    						esc_html__( 'Edit %s','country-inn'),
    						the_title( '<span class="screen-reader-text">"', '"</span>', false )
    					),
    					'<span class="edit-link">',
    					'</span>'
    				);
    			?>
    		</footer><!-- .entry-footer -->
    <?php endif; ?> 
</article><!-- #post-## -->
