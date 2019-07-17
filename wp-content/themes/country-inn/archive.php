<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 */
get_header();    
    /*
    * Get header image 
    */
    country_inn_header_image_single_page();
?>
        <!-- Page Header End -->
    <main class="sec-mar">
        <div class="container">
            <div class="row">
                <div class="col-sm-<?php country_inn_sidebar_condition_single_page();?> left-block">
                    <?php
                    if ( have_posts() ) :
                        /* Start the Loop */
                        while ( have_posts() ) : the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part('template-parts/content', get_post_format());

                        endwhile;

                        do_action('country_inn_action_navigation');

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif; ?>

                </div><!--div -->
                 <?php
                    //function for sidebar section
                    country_inn_sidebar_conditions_below(); 
                ?>
            </div>
        </div>
        <!-- div -->
    </main>
<?php get_footer();
