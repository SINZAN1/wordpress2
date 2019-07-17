<?php
/**
 * Theme Option
 *
 * @since 1.0.0
 */
$wp_customize->add_panel(
    'country_inn_theme_options',
    array(
        'priority'       => 100,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => esc_html__('Theme Option', 'country-inn'),
    )
);


/*----------------------------------------------------------------------------------------------*/
/**
 * Color Options
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'country_inn_primary_color_option',
    array(
        'title'    => esc_html__('Color Options', 'country-inn'),
        'panel'    => 'country_inn_theme_options',
        'priority' => 9,
    )
);

$wp_customize->add_setting(
    'country_inn_primary_color',
    array(
        'default'           => $default['country_inn_primary_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'country_inn_primary_color', array(
    'label'    => esc_html__('Primary Color', 'country-inn'),
    'description'  => esc_html__('We recommend choose  different  background color but not to choose similar to font color', 'country-inn'),
    'section'      => 'country_inn_primary_color_option',
    'priority'     => 14,

)));

/*-------------------------------------------------------------------------------------------*/
/**
 * Hide Static page in Home page
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'country_inn_front_page_option',
    array(
        'title'    => esc_html__('Front Page Options', 'country-inn'),
        'panel'    => 'country_inn_theme_options',
        'priority' => 3,
    )
);

/**
 *   Show/Hide Static page/Posts in Home page
 */
$wp_customize->add_setting(
    'country_inn_front_page_hide_option',
    array(
        'default'           => $default['country_inn_front_page_hide_option'],
        'sanitize_callback' => 'country_inn_sanitize_checkbox',
    )
);

$wp_customize->add_control('country_inn_front_page_hide_option',
    array(
        'label'    => esc_html__('Hide Blog Posts or Static Page on Front Page', 'country-inn'),
        'section'  => 'country_inn_front_page_option',
        'type'     => 'checkbox',
        'priority' => 10
    )
);


/*-------------------------------------------------------------------------------------------*/
/**
 * Breadcrumb Options
 *
 * @since 1.0.0
 */

$wp_customize->add_section(
    'country_inn_breadcrumb_option',
    array(
        'title'    => esc_html__('Breadcrumb Options', 'country-inn'),
        'panel'    => 'country_inn_theme_options',
        'priority' => 2,
    )
);

/*-------------------------------------------------------------------------------------------*/
/**
 * Search Placeholder
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'country_inn_search_option',
    array(
        'title'     => esc_html__('Search', 'country-inn'),
        'panel'     => 'country_inn_theme_options',
        'priority'  => 8,
    )
);

/**
 *Search Placeholder
 */
$wp_customize->add_setting(
    'country_inn_post_search_placeholder_option',
    array(
        'default'           => $default['country_inn_post_search_placeholder_option'],
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control('country_inn_post_search_placeholder_option',
    array(
        'label'    => esc_html__('Search Placeholder', 'country-inn'),
        'section'  => 'country_inn_search_option',
        'type'     => 'text',
        'priority' => 10
    )
);



/*-------------------------------------------------------------------------------------------*/
/**
 * Booking Form
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'country_inn_book_option',
    array(
        'title'     => esc_html__('Booking Form Shortcode', 'country-inn'),
        'panel'     => 'country_inn_theme_options',
        'priority'  => 8,
    )
);


/**
 *Booking Form
 */
$wp_customize->add_setting(
    'country_inn_booking_option',
    array(
        'default'           => $default['country_inn_booking_option'],
        'sanitize_callback' => 'wp_kses_post',

    )
);

$wp_customize->add_control('country_inn_booking_option',
    array(
        'label'    => esc_html__('Booking Form Shortcode', 'country-inn'),
        'section'  => 'country_inn_book_option',
        'type'     => 'text',
        'priority' => 10
    )
);

/**
 *Book Now text
 */
$wp_customize->add_setting(
    'country_inn_book_now_text_option',
    array(
        'default'           => $default['country_inn_book_now_text_option'],
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control('country_inn_book_now_text_option',
    array(
        'label'    => esc_html__('Book Now Text', 'country-inn'),
        'section'  => 'country_inn_book_option',
        'type'     => 'text',
        'priority' => 10
    )
);


/**
         * Upload image control for Booking format_code_lang(section
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'country_inn_booking_form_image',
                array(
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'esc_url_raw'
                )
        );

        $wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'country_inn_booking_form_image',
                array(
                    'label'      => esc_html__( 'Boking Form Image', 'country-inn' ),
                    'section'    => 'country_inn_book_option',
                    'priority' => 8
                )
            )
        );

/*-------------------------------------------------------------------------------------------*/
/**
 * News Letter Subscription
 * @since 1.0.0
 */
$wp_customize->add_section(
    'country_inn_news_letter_option',
    array(
        'title'     => esc_html__('News Letter Subscription', 'country-inn'),
        'panel'     => 'country_inn_theme_options',
        'priority'  => 8,
    )
);

/**
 *News Letter Title
 */
$wp_customize->add_setting(
    'country_inn_post_news_letter_title_option',
    array(
        'default'           => $default['country_inn_post_news_letter_title_option'],
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control('country_inn_post_news_letter_title_option',
    array(
        'label'    => esc_html__('News Letter Subscription', 'country-inn'),
        'section'  => 'country_inn_news_letter_option',
        'type'     => 'text',
        'priority' => 10
    )
);

/**
 *News Letter Sub Title
 */
$wp_customize->add_setting(
    'country_inn_post_news_letter_sub_title_option',
    array(
        'default'           => $default['country_inn_post_news_letter_sub_title_option'],
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control('country_inn_post_news_letter_sub_title_option',
    array(
        'label'    => esc_html__('News Letter Subscription', 'country-inn'),
        'section'  => 'country_inn_news_letter_option',
        'type'     => 'text',
        'priority' => 10
    )
);


/**
 *News Letter Subscription
 */
$wp_customize->add_setting(
    'country_inn_post_news_letter_subscription_option',
    array(
        'default'           => $default['country_inn_post_news_letter_subscription_option'],
        'sanitize_callback' => 'sanitize_text_field',

    )
);

$wp_customize->add_control('country_inn_post_news_letter_subscription_option',
    array(
        'label'    => esc_html__('News Letter Subscription', 'country-inn'),
        'section'  => 'country_inn_news_letter_option',
        'type'     => 'text',
        'priority' => 10
    )
);

/*-------------------------------------------------------------------------------------------*/
/**
 * Animation Options
 *
 * @since 1.0.4
 */
$wp_customize->add_section(
    'country_inn_animation_option_section',
    array(
        'title'     => esc_html__('Disable Animation', 'country-inn'),
        'panel'     => 'country_inn_theme_options',
        'priority'  => 8,
    )
);

/**
 *Animation Options
*/
$wp_customize->add_setting(
    'country_inn_animation_option',
    array(
        'default'           => $default['country_inn_animation_option'],
        'sanitize_callback' => 'country_inn_sanitize_checkbox',

    )
);

$wp_customize->add_control('country_inn_animation_option',
    array(
        'label'    => esc_html__('Animation Option', 'country-inn'),
        'description'=> esc_html__('Checked to hide the animation on your site', 'country-inn'),
        'section'  => 'country_inn_animation_option_section',
        'type'     => 'checkbox',
        'priority' => 10
    )
);