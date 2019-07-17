<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 */
$hide_show_feature_image = country_inn_get_option( 'country_inn_show_feature_image_single_option' );
 $price = get_post_meta( get_the_ID(), 'Country_Inn_room_price', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="blog-wrap">

        <figure class="img-animi mb-20">
                
         <?php if(empty($price)) { ?>        
            <div class="post-info">

               <span class="date pri-bg text-white"><?php echo date('d'); ?> <small><?php echo date('M'); ?></small></span> 

            </div>
        <?php }else 
        {
        
        ?>
          <div class="post-info">

               <span class="date pri-bg text-white"><?php echo esc_html($price); ?> </span> 

            </div>
            <!--post info-->

          <?php } the_post_thumbnail('full'); ?>

        </figure>


            <h3> <?php the_title(); ?></h3>
           <?php if(empty($price)) { ?>    
            <div class="post-meta-wrap mb-20">

                <span class="meta-info">

                    <a href="<?php the_author_link(); ?>"><i class="fa fa-user"></i> <?php echo get_the_author();?></a>

                </span>

                <!--authar-->

                <span class="meta-info">

                   <a href="#"><i class="fa fa-comments"></i> <?php comments_number( ' no Comments', ' one Comments', ' % Comments' );; ?></a>

                </span>

                <!--comment-->
            
            </div>

            <!--post meta-->

           <?php } ?>
          
            <div class="content-hold entry-content mb-40">

                <?php 
                    the_content(); 
                     wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:','country-inn' ),
                    'after'  => '</div>',
                  ) );
                ?>

            </div>

            <!--entry content-->
          <?php if(empty($price)) { ?>   
            <div class="box border d-flex jus justify-content-between align-items-center mb-30">

                <?php country_inn_content_tags(); ?> 

            </div>
   <?php } ?>
        </div> 
    
</article><!-- #post-## -->
