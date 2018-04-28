<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pxmacz
 */

if ( ! is_active_sidebar( 'footer-1' ) ) {
	return;
}
?>

<aside id="footer-widget-area" class="widget-area col-lg-12" role="complementary">
	<?php dynamic_sidebar( 'footer-1' ); ?>
</aside><!-- #footer widget -->
