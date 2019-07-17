<?php
/**
 * Functions for get_theme_mod()
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 */

if ( !function_exists( 'country_inn_get_option' ) ) :
    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function country_inn_get_option( $key = '' )
    {
        if (empty( $key ) ) {
            return;
        }
        $country_inn_default_options = country_inn_get_default_theme_options();
        $default      = (isset($country_inn_default_options[$key])) ? $country_inn_default_options[$key] : '';
        $theme_option = get_theme_mod($key, $default);
        return $theme_option;
    }
endif;

/**
 * Header Image Options for archive page
 *
 * @since 1.0.0
 *
 */
if ( !function_exists( 'country_inn_header_image' ) ) :
    /**
     * Get core Header Image on pages.
     */
    function country_inn_header_image(){ 
        $header_image = get_header_image();
        if( $header_image )
        {
            $header_style = 'style="background-image: url('.esc_url( $header_image ).');background-size: cover;"';
        }
        else
        {
            $header_style = '';
        } ?>
        <div class="page-header text-center" <?php echo esc_html( $header_style ); ?>>
            <h3><?php the_archive_title(); ?></h3>
            <div class="breadcrumb-wrap">
                <?php do_action('country_inn_breadcrumb_hook'); ?>
            </div>
        </div>
<?php  }
endif; 


/**
 * Main Blog Page Header Image and title Options 
 *
 * @since 1.0.0
 *
 */
if ( !function_exists( 'country_inn_blog_header_section' ) ) :
    /**
     * Get core Header Image on pages.
     */
    function country_inn_blog_header_section(){ 
        $blog_page_title    = country_inn_get_option('country_inn_blog_title_option');
        $header_image = get_header_image();
        if( $header_image )
        {
            $header_style = 'style="background-image: url('.esc_url( $header_image ).');background-size: cover;"';
        }
        else
        {
            $header_style = '';
        }
    ?>
        <div class="page-header text-center" <?php echo $header_style; ?>>
            <h3><?php echo esc_html($blog_page_title );?></h3>
            <div class="breadcrumb-wrap"><?php do_action('country_inn_breadcrumb_hook'); ?></div>
        </div>
<?php  }
endif; 


/**
 * Header Image Options for single pages
 *
 * @since 1.0.0
 *
 */
if ( !function_exists( 'country_inn_header_image_single_page' ) ) :
    /**
     * Get core Header Image on pages.
     */
    function country_inn_header_image_single_page(){ 
        $header_image = get_header_image();
       ?>

        <div class="page-header jarallax overlay d-flex align-items-center text-center text-white">

        <img class="jarallax-img" src="<?php echo esc_url( $header_image ); ?>" alt="">
      
        <div class="container">

            <div class="row">

                <div class="col-sm-12">

                    <h2 class="text-white text-uppercase mb-0"><?php the_title(); ?></h2>

                        <?php do_action('country_inn_breadcrumb_hook'); ?>


                </div>

            </div>                   

        </div>

    </div>
      
<?php  }
endif; 


/**
 * WooCommerce header page image 
 *
 * @since 1.0.0
 *
 */
if ( !function_exists( 'country_inn_woocommerce_header_image' ) ) :
    /**
     * Get core Header Image on pages.
     */
    function country_inn_woocommerce_header_image(){ 
        $header_image = get_header_image();
        if( $header_image )
        {
            $header_style = 'style="background-image: url('.esc_url( $header_image ).');background-size: cover;"';
        }
        else
        {
            $header_style = '';
        } ?>
        <div class="page-header text-center" <?php echo $header_style; ?>>
             <h3><?php woocommerce_page_title(); ?></h3>
            <div class="breadcrumb-wrap">
                <?php do_action('country_inn_breadcrumb_hook'); ?>
            </div>
        </div>
<?php  }
endif;


/**
 * Options for siderbar on pages
 *
 * @since 1.0.0
 *
 */
if ( !function_exists( 'country_inn_sidebar_condition_single_page' ) ) :
    /**
     * Sidebar Options condition
     */
    function country_inn_sidebar_condition_single_page(){ 
         $country_inn_designlayout = get_post_meta(get_the_ID(), 'country_inn_sidebar_layout', true  );
        if ($country_inn_designlayout == 'no-sidebar') {
            echo "12";
            } else {
                echo "8";
            } ?> col-sm-<?php if ($country_inn_designlayout == 'no-sidebar') {
                echo "12";
            } else {
                echo "8";
            } 
    }
endif; 

/**
 * Options for siderbar on pages
 *
 * @since 1.0.0
 *
 */
if ( !function_exists( 'country_inn_sidebar_conditions_below' ) ) :
    /**
     * Sidebar Options condition
     */
    function country_inn_sidebar_conditions_below(){ 
    $country_inn_designlayout = get_post_meta(get_the_ID(), 'country_inn_sidebar_layout', true  );
    if ($country_inn_designlayout != 'no-sidebar') { ?>
            <div  class="col-sm-3 sidebar">

                <div id="sidebar"> 
                   <?php get_sidebar(); ?>
                </div>
                
            </div>
        <?php }
    }
endif; 



/**
 * Options for siderbar on pages
 *
 * @since 1.0.0
 *
 */
if ( !function_exists( 'country_inn_page_sidebar_conditions_below' ) ) :
    /**
     * Sidebar Options condition
     */
    function country_inn_page_sidebar_conditions_below(){ 
                $country_inn_designlayout = country_inn_get_option('country_inn_sidebar_layout_option');
                 $nosidebar = 0;
                 $sidebardesignlayout   = esc_attr(country_inn_get_option('country_inn_sidebar_layout_options' ));

                if (($country_inn_designlayout == 'default-sidebar'))
                {
                    $nosidebar = 1;
                }
                elseif( $sidebardesignlayout != 'no-sidebar'){
                    $nosidebar = 1;
                }

                if (($nosidebar == 1))
                {
                    ?>
                    <div class="col-sm-3">
                        <?php get_sidebar(); ?>
                    </div>
    <?php } 
}
endif;

/**
 * Options for thumbnail on pages
 *
 * @since 1.0.0
 *
 */
if ( ! function_exists( 'country_inn_post_thumbnail' ) ) :

    /**
     * Post thumbnail.
     *
     * @since 1.0.0
     */
    function country_inn_post_thumbnail() { 
        $hide_show_feature_image = country_inn_get_option( 'country_inn_post_thumbnail_image' );
    ?>        
        <div class="blog-img" <?php if(!has_post_thumbnail() || $hide_show_feature_image== 0 ) { echo'no-image'; }?> >
                    <?php
                        if( has_post_thumbnail() && $hide_show_feature_image== 0 ) {
                        ?>
                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'full' ); ?></a>

                        <?php } ?>

        </div>
<?php   }
endif;

/**
 * Options for single thumbnail on pages
 *
 * @since 1.0.0
 *
 */
if ( ! function_exists( 'country_inn_single_post_thumbnail' ) ) :

    /**
     * Post thumbnail.
     *
     * @since 1.0.0
     */
    function country_inn_single_post_thumbnail() { 
        $hide_show_feature_image = country_inn_get_option( 'country_inn_show_feature_image_single_option' );
    ?>        
        <div class="blog-img" <?php if(!has_post_thumbnail() || $hide_show_feature_image== 0 ) { echo'no-image'; }?> >
                    <?php
                        if( has_post_thumbnail() && $hide_show_feature_image== 0 ) {
                        ?>
                            <a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'full' ); ?></a>

                        <?php } ?>

        </div>
<?php   }
endif;

/**
 * Tag Section on content page
 *
 * @since 1.0.0
 *
 */
if ( ! function_exists( 'country_inn_content_tags' ) ) :

    /**
     * Tags on Post content
     *
     * @since 1.0.0
     */
    function country_inn_content_tags(){
    if(has_tag () ) { ?>
        <div class="tags">
            <div class="tag">
               
                <span class="d-inline mr-2"><i class="fa fa-tags"></i> Tags
                    <a href="#"><?php the_tags(); ?></a>
                </span>
            </div>
           
        </div>
    <?php } 
    }
endif;


/**
 * Excerpt Length
 *
 * @since 1.0.0
 */
if ( !function_exists('country_inn_excerpt_length') ) :
    function country_inn_excerpt_length( $length ) {
    if (is_admin()) {
            return $length;
    }
    $excerpt_length = absint(country_inn_get_option('country_inn_description_length_option'));
        return $excerpt_length;
    }
add_filter( 'excerpt_length', 'country_inn_excerpt_length', 999 );
endif;


/**
 * Archive meta options.
 *
 * @since 1.0.0
 */
if ( !function_exists('country_inn_page_top_meta') ) :
    function country_inn_page_top_meta() { 
        $page_author = absint(country_inn_get_option('country_inn_blog_page_author'));
        $page_date = absint(country_inn_get_option('country_inn_blog_page_date'));
        $page_comments = absint(country_inn_get_option('country_inn_blog_page_comments'));
        ?>
<p>
    <?php if($page_author == 0 ){ esc_html__('By', 'country-inn'); ?> 
        <?php the_author_link(); ?>
    <span>|</span>
    <?php } ?>  
    <?php if($page_date == 0 ){ echo get_the_date( 'M/ j/ Y' );?> <span>|</span><?php } ?> 
    <?php if($page_comments == 0 ){ ?>
        <i class="fa fa-comments-o"></i> 
        <?php echo get_comments_number(); 
     }
    ?>
</p> 
<?php }
endif; 


/**
 * Single Page Meta Options.
 *
 * @since 1.0.0
 */
if ( !function_exists('country_inn_single_page_top_meta') ) :
    function country_inn_single_page_top_meta() { 
        ?>
<p>
    <?php esc_html__('By', 'country-inn'); ?> 
    <a href="<?php echo esc_url( get_author_posts_url(get_the_author_meta('ID')) ); ?> "><?php the_author(); ?></a> 
    <?php echo get_the_date( 'M/ j/ Y' );?> <span>|</span>
        <i class="fa fa-comments-o"></i> 
        <?php echo get_comments_number(); 
    ?>
</p> 
<?php }
endif;