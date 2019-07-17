<?php
/**
 * Copyright Info Section
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'country_inn_footer_section',
    array(
        'priority'        => 100,
        'capability'      => 'edit_theme_options',
        'panel'           => 'country_inn_theme_options',
        'theme_supports'  => '',
        'title'           => esc_html__('Footer Option', 'country-inn'),
    )
);

/**
 * Field for Copyright
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'country_inn_copyright',
    array(
        'default'           => $default['country_inn_copyright'],
        'sanitize_callback' => 'wp_kses_post',
    )
);
$wp_customize->add_control(
    'country_inn_copyright',
    array(
        'type'     => 'text',
        'label'    => esc_html__('Copyright', 'country-inn'),
        'section'  => 'country_inn_footer_section',
        'priority' => 8
    )
);

/*-------------------------------------------------------------------------------------------*/
/**
 * Go To Top Options
 *
 * @since 1.0.4
 */
$wp_customize->add_section(
    'country_inn_go_to_top_option',
    array(
        'title'     => esc_html__('Go To Top Option', 'country-inn'),
        'panel'     => 'country_inn_theme_options',
        'priority'  => 8,
    )
);

/**
 *Go To Top Options setting
*/
$wp_customize->add_setting(
    'country_inn_footer_go_to_top',
    array(
        'default'           => $default['country_inn_footer_go_to_top'],
        'sanitize_callback' => 'country_inn_sanitize_checkbox',

    )
);

$wp_customize->add_control('country_inn_footer_go_to_top',
    array(
        'label'    => esc_html__('Go To Top', 'country-inn'),
        'section'  => 'country_inn_footer_section',
        'type'     => 'checkbox',
        'priority' => 10
    )
);
