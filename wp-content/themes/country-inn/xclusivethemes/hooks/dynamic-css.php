<?php
/**
 * Dynamic css
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('country_inn_dynamic_css') ):
    function country_inn_dynamic_css(){
    
    $country_inn_primary_color           = esc_attr( country_inn_get_option('country_inn_primary_color') );
    
     $header_textcolor           = esc_attr( country_inn_get_option('header_textcolor') );
      
 
    
    $custom_css                  = '';
    /*====================Dynamic Css =====================*/

    $custom_css .= ".section-0-background,.btn-primary, .pri-bg, .nav-btn a, .booking button[type='submit']:hover, .btn.bdr:hover, .title-sep:before, h3.sec-title:after, .title-sep:after, .slick-dots li.slick-active button,.slick-prev:hover, .slick-prev:focus, .slick-next:hover, .slick-next:focus,  a.scrollUp, .navbar-nav li>.sub-menu>li a:hover,  .check-wrap input[type='checkbox']:checked + label:before, .ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight, .pagination li .page-numbers:hover, .pagination li .page-numbers.current, .event-list li .e-date, h2.widget-title:after, .btn.is-active, .img-grid .img-item a:after, input[type='submit'], button[type='submit'], .modal-content button.close {
            background-color: " . $country_inn_primary_color . ";
        }
    ";

    $custom_css .= "
    .pri-color, a:hover, .header-1 a:hover, .navbar-nav .menu-item a:hover, .home .header-1 .sticky-wrapper:not(.is-sticky) .menu-item>a:hover, .booking button[type='submit'], .btn.bdr, .title-sep, .service-list li .icon, .btn-play, .testi-box p:before, a.view, .navbar-nav li>.sub-menu>li a, .tags a,.service-box h4 a:hover, .service-box a:hover, .testi-slide-2 p:before, .social li a:hover, .filter-toggle:hover, h2.price, widget_search.btn-search:hover, .sidebar .widget .categories li .posts-num, .nav-tabs .menu-item.show .nav-link, .nav-tabs .nav-link.active, .nav-tabs.history .nav-link:hover, .widget_search .searchsubmit:hover, .reply:before, footer .social li a {
            color: " . $country_inn_primary_color . "; 
        }
    ";

    $custom_css .= ".booking button[type='submit'], .btn.bdr, .hero-banner .btn.bdr:hover, .service-list li .icon, .check-wrap input[type='checkbox']:checked + label:before,  .nav-tabs.history, ul.nav.nav-tabs > li a.active{
            border-color: " . $country_inn_primary_color . ";
        }
    ";

   $custom_css .= ".site-title a, .site-description{
       color: " . $header_textcolor . ";}
    ";
   
    /*------------------------------------------------------------------------------------------------- */
    /*custom css*/
    wp_add_inline_style('country-inn-skin', $custom_css);
}
endif;
add_action('wp_enqueue_scripts', 'country_inn_dynamic_css', 99);