<?php
/**
 * Hooks to load header file 
 *
 * @link https://codex.wordpress.org/Plugin_API/Hooks
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 */
/* ------------------------------
* Doctype hook of the theme
* @since 1.0.0
* @package Country Inn
------------------------------ */
if ( ! function_exists( 'country_inn_doctype_action' ) ) :
    /**
     * Doctype declaration of the theme.
     *
     * @since 1.0.0
     */
    function country_inn_doctype_action() {
    ?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?>>
    <?php
    }
endif;
add_action( 'country_inn_doctype', 'country_inn_doctype_action', 10 );

/* ------------------------------
* head hook of the theme
* @since 1.0.0
* @package Country Inn
------------------------------ */
if ( ! function_exists( 'country_inn_head_action' ) ) :
    /**
     * Head declaration of the theme.
     *
     * @since 1.0.0
     */
    function country_inn_head_action() {
    ?>
		<meta charset="<?php bloginfo('charset'); ?>">
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php
    }
endif;
add_action( 'country_inn_head', 'country_inn_head_action', 10 );

/* ------------------------------
* Header Image and title Section 
* @since 1.0.0
* @package Country Inn
------------------------------ */
if ( ! function_exists( 'country_inn_title_action' ) ) :
    /**
     * Title declaration of the theme.
     *
     * @since 1.0.0
     */
    function country_inn_title_action() {
    ?>
		<a class="skip-link screen-reader-text"
        href="#content"><?php esc_html_e('Skip to content', 'country-inn'); ?></a>
    <?php
    }
endif;
add_action( 'country_inn_title', 'country_inn_title_action', 10 );

/* ------------------------------
* Top Header Section including menu and logo on top 
* @since 1.0.0
* @package Country Inn
------------------------------ */
if ( ! function_exists( 'country_inn_top_header_action' ) ) :
    /**
     * Top header section
     *
     * @since 1.0.0
     */
    function country_inn_top_header_action() {
 		get_template_part('xclusivethemes/home-section/section', 'top-header'); 
 }
endif;
add_action( 'country_inn_top_header', 'country_inn_top_header_action', 10 );

/* ------------------------------
* Logo Section 
* @since 1.0.0
* @package Country Inn
------------------------------ */
if ( ! function_exists( 'country_inn_main_logo_box_action' ) ) :

	/**
     * Logo Section
     *
     * @since 1.0.0
    */
    function country_inn_main_logo_box_action() { ?>

      <div class="navbar-brand sec-font">
      
    
	    <?php
	    
	        if (has_custom_logo())
	            { ?>
	                <a class="logo-white" href="<?php echo esc_url(home_url('/')); ?>" alt="Images" />
	                    <?php the_custom_logo(); ?>
	                </a>
                    
	                <?php } else

	                {
	                    if (is_front_page() && is_home()) : ?>
	                    <h1 class="site-title">
	                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
	                    </h1>
	                <?php else : ?>

	                    <p class="site-title">
	                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
	                    </p>

	                    <?php

	                endif;

	                $description = get_bloginfo('description', 'display');

	                if ($description || is_customize_preview()) : ?>
	                <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
	                <?php
	            endif;
	        }
	        ?>
	 </div>
	
<?php  }
endif;
add_action( 'country_inn_main_logo_box', 'country_inn_main_logo_box_action', 10 );

/* ------------------------------
* Main Navigation 
* @since 1.0.0
* @package Country Inn
------------------------------ */
if ( ! function_exists( 'country_inn_main_navigation_hook' ) ) :

	/**
     * Main naviagtion declaration
     *
     * @since 1.0.0
    */
    function country_inn_main_navigation_hook() { ?>

 <!-- Main Menu -->
        
   <?php
        if (has_nav_menu('primary'))
        {
             wp_nav_menu(array(
                    'theme_location'  => 'primary',
                    'depth'           => 4,
                    'container' => 'ul',
                    'menu_class'      => 'navbar-nav'
                )
            );
            }
    ?>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookmodel">
        <i class="fa fa-address-book"></i> <?php echo  esc_html_e('Book Now','country-inn') ?>            
    </button>
       
<?php  }
endif;
add_action( 'country_inn_main_navigation', 'country_inn_main_navigation_hook', 10 );?>