<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Xclusive Themes
 * @subpackage Country Inn
 */

$sidebar_design_layout     = country_inn_get_option( 'country_inn_sidebar_layout_option' );

if( is_singular() ) {
    $single_design_layout  = get_post_meta( get_the_ID(), 'country_inn_sidebar_layout', true  );
    $sidebar_design_layout = $single_design_layout;
}
if ( ! is_active_sidebar( 'sidebar-1' ) || 'no-sidebar' == $sidebar_design_layout ) {
	return;
}
?>
<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
