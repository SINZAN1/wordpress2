<?php
/**
 * Country Inn default theme options.
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 */

if ( !function_exists('country_inn_get_default_theme_options' ) ) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function country_inn_get_default_theme_options()
    {

        $default = array();

        // Homepage Slider Section
        $default['country_inn_homepage_slider_option']               = 'show';
        $default['country_inn_homepage_slider_prev_next']            = 0;
        $default['country_inn_homepage_slider_auto_slide']           = 0;
        $default['country_inn_homepage_slider_pagination']           = 0;

        // Home Page Top header Info.
        $default['country_inn_top_header_section']                   = 'show';
        $default['country_inn_address_icon']                         = 'fa-map-marker-alt';
        $default['country_inn_phone_icon']                           = 'fa-phone-square';
        $default['country_inn_top_header_address']                     = '';
        $default['country_inn_top_header_phone']                       = '';
        $default['country_inn_social_link_hide_option']              = 1;
      
        //default header on menu section
        $default['country_inn_header_search_icon']                   = 1;
        $default['country_inn_header_woocommerce_icon']              = 0;
        $default['country_inn_booking_form_image']                   = '';
         $default['country_inn_booking_option']                      = '';
         $default['country_inn_book_now_text_option']                = esc_html__('Book Now', 'country-inn');

        // Blog.
        $default['country_inn_sidebar_layout_option']                = 'right-sidebar';
        $default['country_inn_blog_title_option']                    = esc_html__('Latest Blog', 'country-inn');
        $default['country_inn_blog_excerpt_option']                  = 'excerpt';
        $default['country_inn_description_length_option']            = 40;
        $default['country_inn_exclude_cat_blog_archive_option']      = '';
        $default['country_inn_blog_page_author']                     = 1;
        $default['country_inn_blog_page_date']                       = 1;
        $default['country_inn_blog_page_comments']                   = 1;
        $default['country_inn_post_thumbnail_image']                 = 1;
        $default['country_inn_blog_pagination_types']                = 'numeric'; 

        //Single Page
        $default['country_inn_show_feature_image_single_option']     = 1;

        // Animation Option.
        $default['country_inn_animation_option']                     = 1;

        // footer section.
        $default['country_inn_post_news_letter_title_option']        = esc_html__('stay tunes with us', 'country-inn');
        $default['country_inn_post_news_letter_sub_title_option']    = esc_html__('Get our latest updates, discount offers and much more..', 'country-inn');
        $default['country_inn_post_news_letter_subscription_option'] = '';  
        $default['country_inn_copyright']                            = esc_html__('Copyright All Rights Reserved', 'country-inn');
        $default['country_inn_footer_go_to_top']                     = 1;

        // Color Option.
        $default['country_inn_primary_color']                        = '#e0660f';

        $default['country_inn_front_page_hide_option']               = 1;
        $default['country_inn_post_search_placeholder_option']       = esc_html__('Search', 'country-inn');
        $default['country_inn_slider_option']                       = '';

        // Pass through filter.
        $default  = apply_filters( 'country_inn_get_default_theme_options', $default );
        return $default;
    }
endif;
