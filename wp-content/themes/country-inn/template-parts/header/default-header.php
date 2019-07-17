<?php 
/**
 * The template for displaying Default Header.
 *
 * This is the template that displays Default Header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 */
?>
    <div id="cover" class="dark-bg"><div><div class="sp sp-circle"></div> <?php esc_html_e('LOADING...','country-inn');?></div></div>
      <header class="site-header header-2">
        <div class="header sticky"> 
        <?php do_action('country_inn_top_header'); ?>
        <!-- Header Lower -->
        <div class="container">
           <nav class="navbar navbar-expand-lg">
                    <!--Logo Box-->
                    <?php do_action('country_inn_main_logo_box'); ?>
                    <!--Nav Outer--> 
                    <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#main-nav"> 
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>

                     <div class="collapse navbar-collapse" id="main-nav">
                        <!--main nav hook-->

                        <?php do_action('country_inn_main_navigation'); ?>
                        <!--Search Box-->
                       
                    </div><!--Nav Outer End-->
                </nav>
            </div>
        </div>
        </header><!-- #masthead -->