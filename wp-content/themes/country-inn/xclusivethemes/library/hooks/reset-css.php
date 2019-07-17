<?php

//=============================================================
// Color reset
//=============================================================
if ( ! function_exists( 'country_inn_reset_colors' ) ) :

    function country_inn_reset_colors($data) {

         set_theme_mod('country_inn_top_header_background_color','#ec5538');

         set_theme_mod('country_inn_top_footer_background_color','#1A1E21');

         set_theme_mod('country_inn_bottom_footer_background_color','#111315');

         set_theme_mod('country_inn_primary_color','#ec5538');

         set_theme_mod('country_inn_color_reset_option','do-not-reset');
    }

endif;
add_action( 'country_inn_colors_reset','country_inn_reset_colors', 10 );


