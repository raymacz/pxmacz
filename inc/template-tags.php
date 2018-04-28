<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Pxmacz
 */

if ( ! function_exists( 'pxmacz_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function pxmacz_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Published %s ', 'post date', 'pxmacz' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'Author %s ', 'post author', 'pxmacz' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

                if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'pxmacz' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo ' </span>';
		}

                edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'pxmacz' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);

	}
endif;

if ( ! function_exists( 'pxmacz_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function pxmacz_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'pxmacz' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Category %1$s', 'pxmacz' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'pxmacz' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tag %1$s', 'pxmacz' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}




	}
endif;

if ( ! function_exists( 'pxmacz_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function pxmacz_post_thumbnail() {





	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>
        <div class="container-fluid">
            <figure class="figure featured-image index-image">
                  <a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark">
                              <?php  the_post_thumbnail('pxmacz-index-img');  ?>
                 </a>
          </figure><!-- .featured-image full-bleed -->
        </div>
        <?php else : ?>
					<figure class="featured-image index-image">
							<a class="post-thumbnail" href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark" aria-hidden="true">
							<!-- <a href="<?php// echo esc_url( get_permalink() ) ?>" rel="bookmark" aria-hidden="true"> -->
								<?php
								the_post_thumbnail('pxmacz-index-img', array(
									'alt' => the_title_attribute( array(
										'echo' => false,
									) ),
								));
								?>
							</a>
						</figure><!-- .featured-image full-bleed -->
	<?php endif; // End is_singular().
}
endif;




/**
 * Post navigation (previous / next post) for single posts.
 */
function pxmacz_post_navigation() {
	the_post_navigation( array(
		'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'pxmacz' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Next post:', 'pxmacz' ) . '</span> ' .
			'<span class="post-title">%title</span>',
		'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'pxmacz' ) . '</span> ' .
			'<span class="screen-reader-text">' . __( 'Previous post:', 'pxmacz' ) . '</span> ' .
			'<span class="post-title">%title</span>',
	) );
}

/**
 * Change the excerpt more string
 */
 function pxmacz_excerpt_more( $more ) {
     return '&hellip;';
     // return ' >>';
 }
 add_filter( 'excerpt_more', 'pxmacz_excerpt_more' );

 /**
  * Filter excerpt length to 100 words.
  */
 function pxmacz_excerpt_length( $length ) {
 	return 80;
 }
 add_filter( 'excerpt_length', 'pxmacz_excerpt_length');
