<?php
/**
 * Template part for displaying parts of page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pxmacz
 */


//Initialize Custom Fields
$t1 = get_field('about_section_title', $post_id);
$d1 = get_field('about_section_description', $post_id);

// WP_Query arguments
$args = array(
	'post_type'              => array( 'about' ),
	'post_status'            => array( 'publish' ),
	'nopaging'               => true,
	'order'                  => 'ASC',
	'orderby'                => 'date',
);

// The Query
$query = new WP_Query( $args );


// check & print values
//var_dump( $query->posts  );
//echo 'foundpost: '.$query->found_posts;
//echo 'postcount: '.$query->post_count;

$pcount = 0; // initialize object count  ?>

<!-- About -->
	 <section id="about">
		 <div class="container">
			 <div class="row">
				 <div class="col-lg-12 text-center">
					 <h2 class="section-heading text-uppercase"><?php print $t1; ?></h2>
					 <h3 class="section-subheading text-muted"><?php print $d1; ?></h3>
				 </div>
			 </div>
			 <div class="row">
				 <div class="col-lg-12">
                                     <?php  if ( $query->have_posts() ) { ?>
					 <ul class="timeline">
                                             <?php 
                                             while ( $query->have_posts() ) :
                                               $query->the_post();
                                               $sd1 = get_field('about_start_date',$query->ID);
                                               $ed1 = get_field('about_end_date',$query->ID);
                                               $sd1 = $ed1 ? date('Y', strtotime($sd1)) : date('F Y', strtotime($sd1));
                                               $ed1 = $ed1 ? date('Y', strtotime($ed1)) : $ed1; 
                                               
                                             //get image path
                                               $pt1 = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                                               
                                             // check if its odd or even
                                                if ($pcount % 2 == 0) { print '<li>'; } else { print '<li class="timeline-inverted">'; }       
                                             ?>            
							 <div class="timeline-image">
								 <!--<img class="rounded-circle img-fluid" src="<?php // bloginfo('template_directory'); ?>/img/about/1.jpg" alt="">-->
                                                                 <img class="rounded-circle img-fluid" src="<?php print $pt1; ?>" alt="">
							 </div>
							 <div class="timeline-panel">
								 <div class="timeline-heading">
                                                                         <h4><?php print ($sd1 ? $sd1 : '').($ed1 ? '-'.$ed1 : '');?></h4>
									 <h4 class="subheading"><?php echo $query->posts[$pcount]->post_title; ?></h4>
								 </div>
								 <div class="timeline-body">
									 <p class="text-muted"><?php echo $query->posts[$pcount]->post_content; ?></p>
								 </div>
							 </div>
						 </li>
                                                 <?php $pcount++; endwhile; ?>   
						 <li class="timeline-inverted">
							 <div class="timeline-image">
								 <h4>Be Part
									 <br>Of Our
									 <br>Story!</h4>
							 </div>
						 </li>
					 </ul>
                                     <?php 
                                      } else {
                                        // no posts found
                                      }
                                      wp_reset_postdata();
                                     ?>
				 </div>
			 </div>
		 </div>
	 </section>
