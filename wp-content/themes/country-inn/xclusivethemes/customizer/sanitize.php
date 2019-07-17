<?php
/**
 * Define sanitize functions for customizer fields
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 * @since 1.0.0
 */

/**
 * Sanitize number
 *
 * @since Country Inn 1.0.0
 *
 * @param $country_inn_input
 * @param $country_inn_setting
 * @return int || float || numeric value
 */
if ( !function_exists( 'country_inn_sanitize_number' ) ) :
    function country_inn_sanitize_number( $input )
   {
        $output = intval($input);
        return $output;
    }

endif;

/**
 * Sanitize checkbox field
 *
 * @since Country Inn 1.0.0
 *
 * @param $checked
 * @return Boolean
 */
if ( !function_exists('country_inn_sanitize_checkbox') ) :
    function country_inn_sanitize_checkbox( $checked )
    {
        // Boolean check.
        return ( ( isset( $checked ) && true == $checked ) ? true : false );
    }

endif;


/**
 * Sanitize the page/post
 *
 * @since Country Inn 1.0.0
 *
 * @param $page_id
 * @return sanitized output as $input
 */
if ( !function_exists( 'country_inn_sanitize_dropdown_pages' ) ) :
        function country_inn_sanitize_dropdown_pages( $page_id, $setting )
        {
            $page_id = absint($page_id );
            // If $page_id is an ID of a published page, return it; otherwise, return the default.
          return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
        }
endif;

/**
 * Sanitizing the select callback example
 *
 * @since Country Inn 1.0.0
 *
 * @see sanitize_key()               https://developer.wordpress.org/reference/functions/sanitize_key/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 */
if ( !function_exists('country_inn_sanitize_select') ) :
    function country_inn_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        $input   = sanitize_text_field( $input );

        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;

        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
endif;

/**
 * Sanitize Multiple Category
 * =====================================
 */
if ( !function_exists('country_inn_sanitize_multiple_category') ) :
function country_inn_sanitize_multiple_category( $values ) {
    $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;
    return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}
endif;

/**
 * Sanitizing the select callback example
 *
 * @since Country Inn 1.0.0
 *
 * @see sanitize_key()               https://developer.wordpress.org/reference/functions/sanitize_key/
 * @see $wp_customize->get_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 */
function country_inn_sanitize_slider_data( $input ){
    $input_decoded = json_decode( $input, true );
    if( !empty( $input_decoded ) ) {
        foreach ( $input_decoded as $boxes => $box ){
            foreach ( $box as $key => $value ){
                if( $key == 'selectpage '){
                    $input_decoded[$boxes][$key] = absint( $value );
                }
                elseif ( $key == 'button_text' ){
                    $input_decoded[$boxes][$key] = sanitize_text_field( $value );
                }
                elseif ( $key == 'button_link' ){
                    $input_decoded[$boxes][$key] = esc_url_raw( $value );
                }
                else{
                    $input_decoded[$boxes][$key] = esc_attr( $value );
                }
            }
        }
        return json_encode( $input_decoded );
    }
    return $input;
}