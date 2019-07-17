<?php
/**
 * Breadcrumb  display option options
 *
 * @since Country Inn 1.0.0
 *
 * @param null
 * @return array $country_inn_show_breadcrumb_option
 *
 */
if (!function_exists('country_inn_show_breadcrumb_option')) :
    function country_inn_show_breadcrumb_option()
    {
        $country_inn_show_breadcrumb_option = array(
            'enable'  => esc_html__('Enable', 'country-inn'),
            'disable' => esc_html__('Disable','country-inn')
        );
        return apply_filters('country_inn_show_breadcrumb_option', $country_inn_show_breadcrumb_option);
    }
endif;


/**
 * Top Header Section Hide/Show  options
 *
 * @since Country Inn 1.0.0
 *
 * @param null
 * @return array $country_inn_show_top_header_section_option
 *
 */
if (!function_exists('country_inn_show_top_header_section_option')) :
    function country_inn_show_top_header_section_option()
    {
        $country_inn_show_top_header_section_option = array(
            'show' => esc_html__('Show', 'country-inn'),
            'hide' => esc_html__('Hide', 'country-inn')
        );
        return apply_filters('country_inn_show_top_header_section_option', $country_inn_show_top_header_section_option);
    }
endif;

/**
 * Show/Hide Feature Image  options
 *
 * @since Country Inn 1.0.0
 *
 * @param null
 * @return array $country_inn_show_feature_image_option
 *
 */
if (!function_exists('country_inn_show_feature_image_option')) :
    function country_inn_show_feature_image_option()
    {
        $country_inn_show_feature_image_option = array(
            'show' => esc_html__('Show', 'country-inn'),
            'hide' => esc_html__('Hide', 'country-inn')
        );
        return apply_filters('country_inn_show_feature_image_option', $country_inn_show_feature_image_option);
    }
endif;


/**
 * Slider  options
 *
 * @since Country Inn 1.0.0
 *
 * @param null
 * @return array $country_inn_slider_option
 *
 */
if (!function_exists('country_inn_slider_option')) :
    function country_inn_slider_option()
    {
        $country_inn_slider_option = array(
            'show' => esc_html__('Show', 'country-inn'),
            'hide' => esc_html__('Hide', 'country-inn')
        );
        return apply_filters('country_inn_slider_option', $country_inn_slider_option);
    }
endif;

/**
 * Sidebar layout options
 *
 * @since Country Inn 1.0.0
 *
 * @param null
 * @return array $country_inn_sidebar_layout
 *
 */
if (!function_exists('country_inn_sidebar_layout')) :
    function country_inn_sidebar_layout()
    {
        $country_inn_sidebar_layout = array(
            'right-sidebar'   => esc_html__('Right Sidebar', 'country-inn'),
            'left-sidebar'    => esc_html__('Left Sidebar', 'country-inn'),
            'no-sidebar'      => esc_html__('No Sidebar', 'country-inn'),
        );
        return apply_filters('country_inn_sidebar_layout', $country_inn_sidebar_layout);
    }
endif;

/**
 * Blog/Archive Description Option
 *
 * @since Country Inn 1.0.0
 *
 * @param null
 * @return array $country_inn_blog_excerpt
 *
 */
if ( !function_exists( 'country_inn_blog_excerpt' ) ) :
    
    function country_inn_blog_excerpt()
    
    {
        $country_inn_blog_excerpt = array(
            'excerpt' => esc_html__('Excerpt', 'country-inn'),
            'content' => esc_html__('Content', 'country-inn'),

        );
        return apply_filters('country_inn_blog_excerpt', $country_inn_blog_excerpt);
    }
endif;

/**
 * Blog/Archive Pagination Options
 *
 * @since Country Inn 1.0.0
 *
 * @param null
 * @return array $country_inn_blog_pagination
 *
 */
if ( !function_exists( 'country_inn_blog_pagination' ) ) :
    
    function country_inn_blog_pagination()
    
    {
        $country_inn_blog_pagination = array(
            'default' => esc_html__('Default', 'country-inn'),
            'numeric' => esc_html__('Numeric', 'country-inn'),
            'hide'    => esc_html__('Hide Pagination', 'country-inn'),

        );
        return apply_filters('country_inn_blog_pagination', $country_inn_blog_pagination);
    }
endif;