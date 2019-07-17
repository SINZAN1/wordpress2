<?php
/**
 * Demo Data support.
 *
 * @package Country Inn
 */

/*Disable PT branding.*/
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 * Demo Data files.
 *
 * @since 1.0.0
 *
 * @return array Files.
 */
function country_inn_import_files() {
    return array(
        array(
            'import_file_name'             =>  esc_html__( 'Theme Demo Content', 'country-inn' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'xclusivethemes/dummy-data/dummy-data-files/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'xclusivethemes/dummy-data/dummy-data-files/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'xclusivethemes/dummy-data/dummy-data-files/customizer.dat',
            'import_notice'              => __( 'After you import this demo, you will have to setup the slider separately if its not setup properly', 'country-inn' )
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'country_inn_import_files' );

/**
 * Demo Data after import.
 *
 * @since 1.0.0
 */

function country_inn_after_import_setup() {
    // Assign front page and posts page (blog page).
    //Set Front page
       $page = get_page_by_title( 'Home');
       if ( isset( $page->ID ) ) {
        update_option( 'page_on_front', $page->ID );
        update_option( 'show_on_front', 'page' );
       }

    
    

    if ( $front_page_id && $blog_page_id ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id );
        update_option( 'page_for_posts', $blog_page_id );
    }

    // Assign navigation menu locations.
    $menu_location_details = array(
        'primary'      => 'primary',
        'social'       => 'social',

    );

    if ( ! empty( $menu_location_details ) ) {
        $navigation_settings = array();
        $current_navigation_menus = wp_get_nav_menus();

        if ( ! empty( $current_navigation_menus ) && ! is_wp_error( $current_navigation_menus ) ) {
            foreach ( $current_navigation_menus as $menu ) {
                foreach ( $menu_location_details as $location => $menu_slug ) {
                    if ( $menu->slug === $menu_slug ) {
                        $navigation_settings[ $location ] = $menu->term_id;
                    }
                }
            }
        }

        set_theme_mod( 'nav_menu_locations',$navigation_settings );
        
       }
    }
add_action( 'pt-ocdi/after_import', 'country_inn_after_import_setup' );