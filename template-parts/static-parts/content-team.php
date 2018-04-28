<?php
/**
 * Template part for displaying parts of page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pxmacz
 */


//Initialize Custom Fields
$t1 = get_field('team_section_title', $post_id);
$d1 = get_field('team_section_description', $post_id);
$b1 = get_field('team_section_body', $post_id);

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

?>
<!-- Team -->
	 <section class="bg-light" id="team">
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
                                          $pt1 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail', false );
                                          $pt1 = $pt1[0];
                                      //get url & fa code         
                                           $smu1= get_field( 'sm_url_1',$query->ID );
                                           $smu2= get_field( 'sm_url_2',$query->ID );
                                           $smu3= get_field( 'sm_url_3',$query->ID );
                                           $smc1= get_field( 'sm_fa_code_1',$query->ID );
                                           $smc2= get_field( 'sm_fa_code_2',$query->ID );
                                           $smc3= get_field( 'sm_fa_code_3',$query->ID );
                                 ?>
                             
                                        <div class="col-sm-4">
                                                <div class="team-member">
                                                        <img class="mx-auto rounded-circle" src="<?php print ($pt1 ? $pt1 : ''); ?>" alt="">
                                                        <h4><?php the_title();?></h4>
                                                        <p class="text-muted"><?php the_field( 'job_title',$query->ID ); ?></p>
                                                        <ul class="list-inline social-buttons">
                                                            <?php if ($smu1 && $smc1) : ?>
                                                                <li class="list-inline-item">
                                                                        <a href="<?php print $smu1; ?>">
                                                                                <i class="fa <?php print $smc1; ?>"></i>
                                                                        </a>
                                                                </li>
                                                            <?php endif;     
                                                            if ($smu2 && $smc2) : ?>    
                                                                <li class="list-inline-item">
                                                                        <a href="<?php print $smu2; ?>">
                                                                                <i class="fa <?php print $smc2; ?>"></i>
                                                                        </a>
                                                                </li>
                                                            <?php endif;     
                                                            if ($smu3 && $smc3) : ?>        
                                                                <li class="list-inline-item">
                                                                        <a href="<?php print $smu3; ?>">
                                                                                <i class="fa <?php print $smc3; ?>"></i>
                                                                        </a>
                                                                </li>
                                                            <?php endif; ?>      
                                                        </ul>
                                                </div>
                                        </div>
                                    <?php
                                     $pcount++; endwhile; 
                                    } else {
                                           // no posts found
                                    }
                            wp_reset_postdata(); ?>  
			 </div>
			 <div class="row">
				 <div class="col-lg-8 mx-auto text-center">
					 <p class="large text-muted"><?php print $b1; ?></p>
				 </div>
			 </div>
		 </div>
	 </section>
