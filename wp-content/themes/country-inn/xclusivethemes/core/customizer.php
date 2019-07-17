<?php
/**
 * Country Inn Theme Customizer
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if (!function_exists('country_inn_customize_register')) :
    function country_inn_customize_register($wp_customize)
    {
        $wp_customize->get_setting('blogname')->selective_refresh          = 'postMessage';
        $wp_customize->get_setting('blogdescription')->selective_refresh   = 'postMessage';
        $wp_customize->get_setting('header_textcolor')->selective_refresh  = 'postMessage';
 

        


        /*default variable used in setting*/
        $default = country_inn_get_default_theme_options();

        /**
         * Customizer setting
         */
        require get_template_directory() . '/xclusivethemes/customizer/customizer-core.php';
        require get_template_directory() . '/xclusivethemes/customizer/customizer-function.php';
        require get_template_directory() . '/xclusivethemes/customizer/slider-section.php';
        require get_template_directory() . '/xclusivethemes/customizer/footer-options.php';
        require get_template_directory() . '/xclusivethemes/customizer/theme-options.php';
        require get_template_directory() . '/xclusivethemes/customizer/header-info-section.php';
        require get_template_directory() . '/xclusivethemes/customizer/layout-design-options.php';
        require get_template_directory() . '/xclusivethemes/customizer/single-page-options.php';
    }
    add_action('customize_register', 'country_inn_customize_register');
endif;
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

if (!function_exists('country_inn_customize_preview_js')) :
    function country_inn_customize_preview_js()
    {
        wp_enqueue_script('country-inn-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), '1.0.1', true);
    }

    add_action('customize_preview_init', 'country_inn_customize_preview_js');

endif;
