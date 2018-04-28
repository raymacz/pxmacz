<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<div class="alert-success">
					<h2 class="page-title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: “%s”', 'pxmacz' ), '<span>' . get_search_query() . '</span>' );
					?></h2>
				</div>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_pagination(array(
				'prev_text' => pxmacz_get_svg( array( 'icon' => 'arrow-long-left', 'fallback' => true ) ) . __( 'Newer', 'pxmacz' ),
  			'next_text' => __( 'Older', 'pxmacz' ) . pxmacz_get_svg( array( 'icon' => 'arrow-long-right' , 'fallback' => true ) ),
				'before_page_number' => '<span class="screen-reader-text">' . __( 'Page ', 'pxmacz' ) . '</span>',
			));

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div> <!-- row -->

<?php
get_footer();
