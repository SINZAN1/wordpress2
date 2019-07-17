<?php
/**
 * Country Inn Single Page Options
 *
 */
$wp_customize->add_section(
    'country_inn_single_page_options',
    array(
        'priority'   => 15,
        'capability' => 'edit_theme_options',
        'panel'      => 'country_inn_theme_options',
        'title'      => esc_html__('Single Page Options', 'country-inn'),
    )
);

/**
 * Select Featured Image
 *
 */
$wp_customize->add_setting(
    'country_inn_show_feature_image_single_option',
    array(
        'default'           => $default['country_inn_show_feature_image_single_option'],
        'sanitize_callback' => 'country_inn_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'country_inn_show_feature_image_single_option',
    array(
        'type'               => 'checkbox',
        'label'              => esc_html__('Hide Featured Image', 'country-inn'),
        'description'        => esc_html__('Checked to show the featured image on all single page and single posts.', 'country-inn'),
        'section'            => 'country_inn_single_page_options',
        'priority'           => 20
    )
);