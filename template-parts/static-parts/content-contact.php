<?php
/**
 * Template part for displaying parts of page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pxmacz
 */


//get frontpage id
//$post_id = get_option( 'page_on_front' ); //  $frontpage_id

//Initialize Custom Fields
$t1 = get_field('contact_section_title', $post_id);
$d1 = get_field('contact_section_description', $post_id);

?>

<!-- Contact -->
	 <section id="contact">
		 <div class="container">
			 <div class="row">
				 <div class="col-lg-12 text-center">
					 <h2 class="section-heading text-uppercase"><?php print $t1;?></h2>
					 <h3 class="section-subheading " style="color:white;"><?php print $d1;?></h3>
				 </div>
			 </div>
			 <div class="row">
				 <div class="col-lg-12">
					  <?php the_content(); ?>
				 </div>
			 </div>
		 </div>
	 </section> <!-- Contact -->
