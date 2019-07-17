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
 * @package Xclusive Themes
 * @subpackage Country Inn
 */
get_header(); 
    /*
    * Get header image 
    */
    country_inn_header_image_single_page();
 ?>
    <main class="sec-mar">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 left-block">
                    <?php
                    while (have_posts()) : the_post();

                        get_template_part('template-parts/content', 'page');

                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>
                </div><!-- div -->
                <?php country_inn_page_sidebar_conditions_below(); ?>
            </div><!-- div -->
        </div>
    </main>
<?php get_footer();
