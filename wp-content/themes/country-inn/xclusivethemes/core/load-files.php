<?php
/**
 * Load all custom files  
 *
 * @package Canyon Themes
 * @subpackage Country Inn
*/

/**
* Implement the default value of customizer.
*/
require get_template_directory() . '/xclusivethemes/customizer-pro/class-customize.php';
require get_template_directory() . '/xclusivethemes/customizer/default.php';
require get_template_directory() . '/xclusivethemes/customizer/sanitize.php';


/*
* Including hooks folder file
=====================================
*/
require get_template_directory() . '/xclusivethemes/hooks/header.php'; 
require get_template_directory() . '/xclusivethemes/hooks/footer.php'; 
require get_template_directory() . '/xclusivethemes/hooks/custom-hooks.php';
require get_template_directory() . '/xclusivethemes/hooks/dynamic-css.php';
require get_template_directory() . '/xclusivethemes/core/theme-function.php';


/*
* Including Custom Widget Files
=====================================
*/
require get_template_directory() . '/xclusivethemes/widget/welcome-msg-widget.php';
require get_template_directory() . '/xclusivethemes/widget/feature-widget.php';
require get_template_directory() . '/xclusivethemes/widget/recreation-widget.php';
require get_template_directory() . '/xclusivethemes/widget/recent-post-widget.php';

require get_template_directory() . '/xclusivethemes/widget/room-widget.php';

/**
 * Load Metabox file
 * =====================================
*/
require get_template_directory() . '/xclusivethemes/metabox/metabox-defaults.php';
require get_template_directory() . '/xclusivethemes/metabox/metabox-icon.php';

/**
 * Load custom files.
*/
require get_template_directory() . '/xclusivethemes/bootstrap-navwalker/wp_bootstrap_navwalker.php';
require get_template_directory() . '/xclusivethemes/breadcrumb/breadcrumb.php';
include get_template_directory() . '/xclusivethemes/customizer-repeater/customizer-control-repeater.php';

/**
 * Implement the default file.
 */
require get_template_directory() . '/xclusivethemes/core/custom-header.php';
require get_template_directory() . '/xclusivethemes/core/template-tags.php';
require get_template_directory() . '/xclusivethemes/core/extras.php';
require get_template_directory() . '/xclusivethemes/core/customizer.php';
require get_template_directory() . '/xclusivethemes/core/jetpack.php';



/**
 * Load TGM Library
 */
require get_template_directory() . '/xclusivethemes/library/tgm/class-tgm-plugin-activation.php';

/**
 * Load Dummy Data Files
 */
require get_template_directory() . '/xclusivethemes/dummy-data/dummy-file.php';
