<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 */
// retrieving Customizer Value
$section_option = country_inn_get_option('country_inn_top_header_section');
if ($section_option =='show') {
   
    $country_inn_phone_icon  = esc_attr(country_inn_get_option('country_inn_phone_icon'));
    $top_header_phone  = esc_html(country_inn_get_option('country_inn_top_header_phone'));
    $country_inn_address_icon  = esc_attr(country_inn_get_option('country_inn_address_icon'));
    $top_header_address  = esc_html(country_inn_get_option('country_inn_top_header_address'));
    ?>

    <div class="header-top-bar dark-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6 top-left">
                    <span class="site-info"><i class="fa <?php echo  $country_inn_phone_icon; ?>"></i><?php echo $top_header_phone; ?></span>

                    <span class="site-info"><i class="fa <?php echo  $country_inn_address_icon; ?>"></i><?php echo $top_header_address; ?></span>
                </div>

                <!--left-->
                <div class="col-sm-6 top-right social-links">
                 <?php
                    if (has_nav_menu('social'))
                    {
                         wp_nav_menu(array(
                                'theme_location'  => 'social',
                                'depth'           => 4,
                                'container' => 'ul',
                                'menu_class'      => 'social'
                            )
                        );
                        }
                    ?>
                </div>  
            </div>
        </div>
    </div>
<?php } ?>