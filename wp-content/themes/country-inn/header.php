<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 */
?> 
<?php
    /**
     * Hook - country_inn_doctype.
     *
     * @hooked country_inn_doctype_action - 10
     */
    do_action( 'country_inn_doctype' );
    ?>

    <head>

        <?php
    /**
     * Hook - country_inn_head.
     *
     * @hooked country_inn_head_action - 10
     */
    do_action( 'country_inn_head' );
    ?>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
    /**
     * Hook - country_inn_title.
     *
     * @hooked country_inn_title_action - 10
     */        
    do_action('country_inn_title');

    
    /**
     * Hook - country_inn_header_types.
     *
     * @hooked country_inn_header_types_action - 10
     */  
    do_action('country_inn_header_types_home');
    ?>
    
