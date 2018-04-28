<?php



//get frontpage id
$post_id = get_option( 'page_on_front' ); //  $frontpage_id
//$blog_id = get_option( 'page_for_posts' );


//Initialize Custom Fields
$t1 = get_field('team_section_title', $post_id);
$d1 = get_field('team_section_description', $post_id);

// WP_Query arguments
$args = array(
	'post_type'              => array( 'team' ),
	'post_status'            => array( 'publish' ),
	'nopaging'               => true,
	'order'                  => 'DESC',
	'orderby'                => 'date',
);


// The Query
$query = new WP_Query( $args );

// check & print values
var_dump( $query->posts  );
echo 'foundpost: '.$query->found_posts;
echo 'postcount: '.$query->post_count;

// printf( '<span class="cat-links">' . esc_html__( '%1$s', 'pxmacz' ) . '</span>', $cl1 );  


// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		// do something

		//get image path
		  //option 1 get url only
			$pt1 = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			//option 2 get url w/ wize
			$pt1 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail', false );
	    $pt1 = $pt1[0]; // get url path
		// https://www.redbridgenet.com/how-to-get-image-thumbnail-filename-in-wordpress/
	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();


 ?>
