<?php
/**
 * The template for displaying all pages.
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 */
$country_inn_slider_section_option      = country_inn_get_option('country_inn_homepage_slider_option');

if ( $country_inn_slider_section_option != 'hide' ) {

    $country_inn_slides_data = json_decode( country_inn_get_option('country_inn_slider_option'));
    $post_in = array();

    $i=0;
        $slides_other_data = array();
        if( is_array( $country_inn_slides_data ) ){
            foreach ( $country_inn_slides_data as $slides_data ){
                if( isset( $slides_data->selectpage ) && !empty( $slides_data->selectpage ) ){
                    $post_in[] = $slides_data->selectpage;
                    $slides_other_data[$slides_data->selectpage] = array(
                           'button_text' =>$slides_data->button_text,
                           'button_link' =>$slides_data->button_link,
                           
                    );

                   $i++;
                }

            }
        }
        if( !empty( $post_in )) :
            $country_inn_slider_page_args   = array(
                'post__in'            => $post_in,
                'orderby'             => 'post__in',
                'posts_per_page'      => count( $post_in ),
                'post_type'           => 'page',
                'no_found_rows'       => true,
                'post_status'         => 'publish'
            );
            $slider_query = new WP_Query( $country_inn_slider_page_args );
            /*The Loop*/
            if ( $slider_query->have_posts() ):
                ?>
                        <!-- Start Slider Section -->

            <div class="hero-banner">

        <ul class="hero-slider">
          
       <?php

         while( $slider_query->have_posts() ):$slider_query->the_post();       $slides_single_data = $slides_other_data[get_the_ID()];
           if ( has_post_thumbnail() ) {
                 $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
        ?>  
          
            <li class="slide-item">
                <div class="item" style="background: url('<?php echo esc_url($image_url[0]); ?>'); background-size: cover;">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8 content-wrap">
                                <h2 class="text-white"><?php the_title(); ?></h2> 
                                <p class="text-white"><?php echo esc_html( wp_trim_words(get_the_content())); ?></p>
                               <?php
                             if( !empty( $slides_single_data['button_text'] ) ){
                                ?>
                                <div class="btn-wrap">
                                    <a class="btn bdr white text-uppercase" href="<?php echo esc_url($slides_single_data['button_link']); ?>"><?php echo esc_html($slides_single_data['button_text'] ) ?></a>
                                  
                                </div>
                            <?php } ?>    
                                
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!--single slider-->
   <?php } endwhile; wp_reset_postdata(); ?>
          
        </ul>
    </div>

    <!--hero banner-->
        <!-- End Slider Section -->
    <?php  endif;  endif;
} ?>