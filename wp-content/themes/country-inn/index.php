<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 */
get_header();
    
     global $header_image, $header_style;
           $header_image = get_header_image();
?>
 <div class="page-header jarallax overlay d-flex align-items-center text-center text-white"><img class="jarallax-img" src="<?php echo esc_url( $header_image ); ?>" alt="">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="text-white text-uppercase mb-0"><php  esc_html_e('Blog','country-inn') ?></h2>

                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#"><php  esc_html_e('Home','country-inn') ?></a></li>
                    </ol> 
                </div>
            </div> 
        </div>
    </div>
   <main class="main sec-mar">  
        <div class="container">
            <div class="row">
                <div class="col-sm-9 left-block blog-list">
                    <?php
                    if (have_posts()) :
                        /* Start the Loop */
                        while (have_posts()) : the_post();
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
        </div><!-- div -->
    </main>
<?php get_footer();
