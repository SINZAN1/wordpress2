<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 */
get_header();    
    /*
    * Get header image 
    */
    country_inn_header_image_single_page();
   $price = get_post_meta( get_the_ID(), 'Country_Inn_room_price', true ); 
    
?>
     <!--page header-->
 <main class="main sec-mar">  
    <div class="container">
        <div class="row">
            <div class="col-sm-9 left-block blog-single">
                <?php
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content', 'single');
                    echo '<div class="entry-box">';
                      
                        the_post_navigation();
                        if(empty($price)) {
                        echo '<div class="comment-form-container">';
                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;

                        echo '</div>';
                        }
                    echo '</div>';
                endwhile; // End of the loop.
                  if(!empty($price)) {
                      $booking_form = country_inn_get_option('country_inn_booking_option');
                ?>
                <?php echo do_shortcode($booking_form);
                  }
                ?>
            </div>
            <?php country_inn_page_sidebar_conditions_below(); ?>
        </div>
    </div>
</main>
<?php
get_footer(); ?>
