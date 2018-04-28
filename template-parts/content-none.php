<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pxmacz
 */

?>

<section class="<?php if ( is_404() ) { echo 'error-404'; } else { echo 'no-results'; } ?> not-found">
	<header class="page-header">
		<h2 class="alert-danger page-title">
			<?php
			if ( is_404() ) {
				esc_html_e( 'Page not available - 404', 'pxmacz' );
			} else if ( is_search() ) {
				/* translators: %s = search query */
				printf( esc_html__( 'Nothing found for &ldquo;%s&rdquo; - is_search', 'pxmacz'), get_search_query() );
			} else {
				esc_html_e( 'Nothing Found - else', 'pxmacz' );
			}
			?>
		</h2>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p class="alert-primary"><?php
				printf(	wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'pxmacz' ),
						array('a' => array(	'href' => array(),),)
						), esc_url( admin_url( 'post-new.php' )) );
			?></p>

		<?php elseif ( is_search() ) : ?>

			<p class="alert-warning"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords or check out the most recent articles.', 'pxmacz' ); ?></p>
			<?php	get_search_form();

	 elseif ( is_404() ) : ?>

			<p class="alert-warning"><?php esc_html_e( 'You seem to be lost. To find what you are looking for check out the most recent articles below or try a search:', 'pxmacz' ); ?></p>
				<?php	get_search_form();


		else : ?>

			<p class="alert-warning"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'pxmacz' ); ?></p>
			<?php	get_search_form();

		endif; ?>

		<?php
			if ( is_404() || is_search() ) {
			?>
				<h2 class="alert-warning"><?php esc_html_e( 'Most recent articles:', 'pxmacz' ); ?></h2>
				<?php
				// Get the 6 latest posts
				$args = array(
					'posts_per_page' => 6
				);
				$latest_posts_query = new WP_Query( $args );
				if ( $latest_posts_query->have_posts() ) {
						while ( $latest_posts_query->have_posts() ) {
							$latest_posts_query->the_post();
							// Get the standard index page content
							get_template_part( 'template-parts/content', get_post_format() );
						}
				}
				/* Restore original Post Data */
				wp_reset_postdata();
			} // endif
			?>

	</div><!-- .page-content -->
</section><!-- .no-results -->
