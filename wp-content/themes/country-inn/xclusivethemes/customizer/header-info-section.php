<?php
/**
 * Country Inn Header Info Section
 *
 */
$wp_customize->add_section(
    'country_inn_top_header_info_section',
    array(
        'priority'   => 1,
        'capability' => 'edit_theme_options',
        'panel'      => 'country_inn_theme_options',
        'title'      => esc_html__('Top Header Info', 'country-inn'),
    )
);

        /*callback functions header section*/
        if ( !function_exists('country_inn_top_header_active_callback') ) :
            function country_inn_top_header_active_callback(){
                $top_header = esc_html(country_inn_get_option('country_inn_top_header_section'));
                if( 'show' == $top_header ){
                    return true;
                }
                else{
                    return false;
                }
            }
        endif;


$wp_customize->add_setting(
    'country_inn_top_header_section',
    array(
        'default'           => $default['country_inn_top_header_section'],
        'sanitize_callback' => 'country_inn_sanitize_select',
    )
);

$hide_show_top_header_option = country_inn_slider_option();
$wp_customize->add_control(
    'country_inn_top_header_section',
    array(
        'type'               => 'radio',
        'label'              => esc_html__('Top Header Info Option', 'country-inn'),
        'description'        => esc_html__('Show/hide Option for Top Header Info Section.', 'country-inn'),
        'section'            => 'country_inn_top_header_info_section',
        'choices'            => $hide_show_top_header_option,
        'priority'           => 5
    )
);


/**
 * Field for Fonsome Icon
 *
 */
$wp_customize->add_setting(
    'country_inn_phone_icon',
    array(
        'default'           => $default['country_inn_phone_icon'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'country_inn_phone_icon',
    array(
        'type'        => 'text',
        'description' => esc_html__('Insert Font Awesome Class Name', 'country-inn'),
        'section'     => 'country_inn_top_header_info_section',
        'priority'    => 8,
        'active_callback'=> 'country_inn_top_header_active_callback'
    )
);

/**
 * Field for Top Header  Address
 *
 */
$wp_customize->add_setting(
    'country_inn_top_header_phone',
    array(
        'default'           => $default['country_inn_top_header_phone'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'country_inn_top_header_phone',
    array(
        'type'      => 'text',
        'label'     => esc_html__(' Phone Number', 'country-inn'),
        'section'   => 'country_inn_top_header_info_section',
        'priority'  => 8,
        'active_callback'=> 'country_inn_top_header_active_callback'
    )
);



/**
 * Field for Fonsome Icon
 *
 */
$wp_customize->add_setting(
    'country_inn_address_icon',
    array(
        'default'           => $default['country_inn_address_icon'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'country_inn_address_icon',
    array(
        'type'        => 'text',
        'description' => esc_html__('Insert Font Awesome Class Name', 'country-inn'),
        'section'     => 'country_inn_top_header_info_section',
        'priority'    => 8,
        'active_callback'=> 'country_inn_top_header_active_callback'
    )
);

/**
 * Field for Top Header  Address
 *
 */
$wp_customize->add_setting(
    'country_inn_top_header_address',
    array(
        'default'           => $default['country_inn_top_header_address'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'country_inn_top_header_address',
    array(
        'type'      => 'text',
        'label'     => esc_html__(' Address', 'country-inn'),
        'section'   => 'country_inn_top_header_info_section',
        'priority'  => 8,
        'active_callback'=> 'country_inn_top_header_active_callback'
    )
);




