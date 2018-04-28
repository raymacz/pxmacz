<?php
/**
 * Template part for displaying parts of page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pxmacz
 */

//get frontpage id
$post_id = get_option( 'page_on_front' ); //  $frontpage_id
//
//Initialize Custom Fields
$t1 = get_field('services_section_title', $post_id);
$d1 = get_field('services_section_description', $post_id);

// WP_Query arguments
$args = array(
	'post_type'              => array( 'service' ),
	'post_status'            => array( 'publish' ),
	'nopaging'               => true,
	'order'                  => 'DESC',
	'orderby'                => 'date',
);

// The Query
$query = new WP_Query( $args );

$pcount = 0; // initialize object count

?>

<!-- Services -->
<section id="services">
 <div class="container">
			 <div class="row">
				 <div class="col-lg-12 text-center">
					 <h2 class="section-heading text-uppercase"> <?php print $t1; ?></h2>
					 <h3 class="section-subheading text-muted"><?php print $d1; ?></h3>
				 </div>
			 </div>
			 <div class="row text-center">
                           <?php
                           if ( $query->have_posts() ) {
                                while ( $query->have_posts() ) :
                                $query->the_post();  ?>
                                 <div class="col-md-4">
					 <span class="fa-stack fa-4x">
						 <i class="fa fa-circle fa-stack-2x text-primary"></i>
						 <i class="fa <?php the_field('fa_icon_code',$query->ID); ?> fa-stack-1x fa-inverse"></i>
					 </span>
					 <h4 class="service-heading"> <?php echo $query->posts[$pcount]->post_title;  ?></h4>
					 <p class="text-muted"><?php echo $query->posts[$pcount++]->post_content;  ?></p>
                                         
				 </div>
                             
                             <?php
                                endwhile;
                           } else {
                                // no posts found
                           }
                           wp_reset_postdata();
                             ?>
                             
<!--				 <div class="col-md-4">
					 <span class="fa-stack fa-4x">
						 <i class="fa fa-circle fa-stack-2x text-primary"></i>
						 <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
					 </span>
					 <h4 class="service-heading">E-Commerce</h4>
					 <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
				 </div>
				 <div class="col-md-4">
					 <span class="fa-stack fa-4x">
						 <i class="fa fa-circle fa-stack-2x text-primary"></i>
						 <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
					 </span>
					 <h4 class="service-heading">Responsive Design</h4>
					 <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
				 </div>
				 <div class="col-md-4">
					 <span class="fa-stack fa-4x">
						 <i class="fa fa-circle fa-stack-2x text-primary"></i>
						 <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
					 </span>
					 <h4 class="service-heading">Web Security</h4>
					 <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
				 </div>-->
			 </div>
		 </div>
	 </section>
