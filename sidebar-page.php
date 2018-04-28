<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pxmacz
 */

if ( ! is_active_sidebar( 'sidebar-3' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area page-sidebar col-lg-4" role="complementary">
	<?php dynamic_sidebar( 'sidebar-3' ); ?>
</aside><!-- #secondary -->
