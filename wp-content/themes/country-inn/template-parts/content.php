<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 */
$excerpt_option     = esc_html(country_inn_get_option('country_inn_blog_excerpt_option'));
$description_length = esc_html(country_inn_get_option('country_inn_description_length_option'));
$hide_blog_page_author = esc_html(country_inn_get_option('country_inn_blog_page_author'));
$hide_blog_page_date = esc_html(country_inn_get_option('country_inn_blog_page_date'));
$hide_blog_page_comments = esc_html(country_inn_get_option('country_inn_blog_page_comments'));
$price = get_post_meta( get_the_ID(), 'Country_Inn_room_price', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="blog-wrap">

        <figure class="img-animi mb-20">
           <?php if($hide_blog_page_date != 1 && empty($price)) { ?>
            <div class="post-info">
              
               <span class="date pri-bg text-white"><?php echo date('d'); ?> <small><?php echo date('M'); ?></small></span> 

            </div>

            <!--post info-->
 
             <?php } 
             else
             { ?>
                <div class="post-info">
              
               <span class="date pri-bg text-white"><?php echo esc_html($price ); ?></span> 

            </div> 
                 
            <?php }
             
             
             country_inn_post_thumbnail(); ?>

        </figure>

       <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

        <div class="post-meta-wrap mb-20">
         <?php if($hide_blog_page_author != 1  && empty($price) ) { ?>
            <span class="meta-info">

                <a href="<?php the_author_link(); ?>"><i class="fa fa-user"></i> <?php echo get_the_author();?></a>

            </span>

            <!--authar-->
            <?php } 
            
            if($hide_blog_page_comments != 1  && empty($price)) { ?>
            <span class="meta-info">

                <a href="#"><i class="fa fa-comments"></i> <?php comments_number( ' no Comments', ' one Comments', ' % Comments' );; ?></a>

            </span>

            <!--comment-->
          <?php } ?>
        </div>

        <!--post meta-->

       <div class="content-hold">

            <p>

              <?php 
                    if( $excerpt_option == 'excerpt'){
                          echo esc_html( wp_trim_words( get_the_excerpt(),$description_length) );
                    }else{
                         echo esc_html( wp_trim_words( get_the_content(),$description_length) );
                    }                
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:','country-inn' ),
                        'after'  => '</div>',
                      ) );
                ?>

            </p>

        </div>



        <a class="view" href="<?php the_permalink(); ?>"><?php esc_html__('View more','country-inn') ?> <i class="fa fa-long-arrow-alt-right"></i> </a>

    </div> 

</article><!-- #post-## -->
