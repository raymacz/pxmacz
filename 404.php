<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Pxmacz
 */

get_header(); ?>

<div class="row">
	<?php if (is_active_sidebar('sidebar-1')): ?>
		 <div id="primary" class="content-area col-lg-8">
	<?php else: ?>
		 <div id="primary" class="content-area col-lg-12 ">
	<?php endif; ?>
		<main id="main" class="site-main">
		<?php	get_template_part( 'template-parts/content', 'none' ); ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div> <!-- row -->

<?php
get_footer();
