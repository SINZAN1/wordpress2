<?php
/**
 * Slider Section
 *
 */
$wp_customize->add_section(
    'country_inn_slider_section',
    array(
        'title'     => esc_html__('Slider Setting Option', 'country-inn'),
        'panel'     => 'country_inn_theme_options',
        'priority'  => 4,
    )
);
/**
 * Homepage Slider Section Show
 *
 */
$wp_customize->add_setting(
    'country_inn_homepage_slider_option',
    array(
        'default'           => $default['country_inn_homepage_slider_option'],
        'sanitize_callback' => 'country_inn_sanitize_select',
    )
);
$hide_show_option = country_inn_slider_option();
$wp_customize->add_control(
    'country_inn_homepage_slider_option',
    array(
        'type'        => 'radio',
        'label'       => esc_html__('Slider Option', 'country-inn'),
        'description' => esc_html__('Show/hide option for homepage Slider Section.', 'country-inn'),
        'section'     => 'country_inn_slider_section',
        'choices'     => $hide_show_option,
        'priority'    => 7
    )
);

/*callback functions slider section*/
if ( !function_exists('country_inn_slider_active_callback') ) :
    function country_inn_slider_active_callback(){
        $slider_options = esc_html(country_inn_get_option('country_inn_homepage_slider_option'));
        if( 'show' == $slider_options ){
            return true;
        }
        else{
            return false;
        }
    }
endif;

//Condition to check third party slider available or not.
$third_slider = wp_kses_post(country_inn_get_option('country_inn_homepage_slider_thirdparty'));
if($third_slider == ''){
    /**
     * Homepage Slider Repeater Section
     *
     */
    $slider_pages = array(34,16);
    $slider_pages_obj = get_pages();
    $slider_pages[''] = esc_html__('Select Page For Slider','country-inn');
    foreach ($slider_pages_obj as $slider_page) {
        $slider_pages[$slider_page->ID] = $slider_page->post_title;
    }
    $wp_customize->add_setting( 
        'country_inn_slider_option', 
        array(
        'sanitize_callback' => 'country_inn_sanitize_slider_data',
        'default'           => $default['country_inn_slider_option']
    ) );
    $wp_customize->add_control(
        new Country_Inn_Repeater_Control(
            $wp_customize,
            'country_inn_slider_option',
            array(
                'label'                      => __('Slider Page Selection Section','country-inn'),
                'description'                => __('Select Page For Slider Having Featured Image. You can drag to reposition the slider items','country-inn'),
                'section'                    => 'country_inn_slider_section',
                'settings'                   => 'country_inn_slider_option',
                'repeater_main_label'        => __('Select Page For Slider ','country-inn'),
                'repeater_add_control_field' => __('Add New Slide','country-inn'),
                'active_callback'            => 'country_inn_slider_active_callback'

            ),
            array(
                'selectpage'                 => array(
                'type'                       => 'select',
                'label'                      => __( 'Select Page For Slide', 'country-inn' ),
                'options'                    => $slider_pages
                ),
                'button_text'                => array(
                'type'                       => 'text',
                'label'                      => __( 'Button Text', 'country-inn' ),
                ),
                'button_link'                => array(
                'type'                       => 'url',
                'label'                      => __( 'Button Link', 'country-inn' ),
                ),
                
            )
        )
    );
    
} 
//end of third party slider condition 
