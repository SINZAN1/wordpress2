<?php
/**
 * The template for displaying all pages
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Xclusive Themes
 * @subpackage Country Inn
 */

get_header();

$country_inn_hide_front_page_content = country_inn_get_option( 'country_inn_front_page_hide_option' );

/*show widget in front page, now user are not force to use front page*/
if ( !is_home() ) {
    
    do_action( 'country_inn_home_page_section' );
    
    dynamic_sidebar( 'country-inn-home-page' );
    
}

if ( 'posts' == get_option('show_on_front') )
{

    include( get_home_template() );

} else {
    
    if ( 1 != $country_inn_hide_front_page_content ) {
        
        include( get_page_template() );
        
    }
}

get_footer();
