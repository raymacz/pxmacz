<?php
/**
 * Template part for displaying parts of page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pxmacz
 */



//Initialize Custom Fields
$t1 = get_field('portfolio_section_title', $post_id);
$d1 = get_field('portfolio_section_description', $post_id);

// WP_Query arguments
$args = array(
	'post_type'              => array( 'portfolio' ),
	'post_status'            => array( 'publish' ),
	'nopaging'               => true,
	'order'                  => 'DESC',
	'orderby'                => 'date',
);

// The Query
$query = new WP_Query( $args );
?>
<!-- Portfolio Grid -->
	 <section class="bg-light" id="portfolio">
		 <div class="container">
			 <div class="row">
				 <div class="col-lg-12 text-center">
					 <h2 class="section-heading text-uppercase"><?php print $t1; ?></h2>
					 <h3 class="section-subheading text-muted"><?php print $d1; ?></h3>
				 </div>
			 </div>
			 <div class="row">
                             <?php  if ( $query->have_posts() ) { 
                                      while ( $query->have_posts() ) :
                                           $query->the_post();
                                           
                                          //get image path
                                          $pt1 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'pxmacz-thumbnail', false );
                                          //var_dump($pt1);
                                          $fimage1 = $pt1[0];
                                          // get the category list
                                          $categories = get_the_category_list( esc_html__( ', ', 'pxmacz', $post->ID ) );
                                          $clist1 = get_the_category($post->ID);
                                          $pclient1 = get_field( 'project_client',$query->ID );
                                          //the_title();
                                          $pdesc1 = get_field( 'project_description',$query->ID );
                                          $pdate1 = get_field('project_date',$query->ID);
                                          $pdate1 = date('F Y', strtotime($pdate1));
                                          //array_push($titles1, get_the_title());
                                          //array_push($contents1, get_the_content());
                                      ?>
                                            <div class="col-md-4 col-sm-6 portfolio-item">
                                                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal<?php print $pcount+1; ?>">
                                                            <div class="portfolio-hover">
                                                                    <div class="portfolio-hover-content">
                                                                            <i class="fa fa-plus fa-3x"></i>
                                                                    </div>
                                                            </div>
                                                            <img class="img-fluid" src="<?php  print ($fimage1 ? $fimage1 : ''); ?>" alt="">
                                                    </a>
                                                    <div class="portfolio-caption">
                                                            <h4><?php print $pclient1; ?></h4>
                                                            <?php
                                                            $cats1= array();
                                                            foreach ($clist1 as $c1) {
                                                                array_push($cats1,'<p class="cat-p">' . esc_html__($c1->name, 'pxmacz') . '</p>');   
                                                            }
                                                            echo implode(", ", $cats1);
                                                            ?>
                                                    </div>
                                            </div>
                             <?php
                                      $pcount++; endwhile; 
                                    } else {
                                           // no posts found
                                    }
                             wp_reset_postdata(); ?>  
			 </div>  <!--row-->
		 </div> <!--container-->
	 </section>
