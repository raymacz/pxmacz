<?php
/**
 * Template part for displaying parts of page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pxmacz
 */

//Initialize Custom Fields
$t1 = get_field('team_logo_1', $post_id);
$t2 = get_field('team_logo_2', $post_id);
$t3 = get_field('team_logo_3', $post_id);
$t4 = get_field('team_logo_4', $post_id);

?>

<!-- Clients -->
	 <section class="py-5">
		 <div class="container">
			 <div class="row">
				 <div class="col-md-3 col-sm-6">
					 <a href="#">
						 <img class="img-fluid d-block mx-auto" src="<?php  print ($t1 ? $t1['sizes']['large'] : ''); ?>" alt="">
					 </a>
				 </div>
				 <div class="col-md-3 col-sm-6">
					 <a href="#">
						 <img class="img-fluid d-block mx-auto" src="<?php  print ($t2 ? $t2['sizes']['large'] : ''); ?>" alt="">
					 </a>
				 </div>
				 <div class="col-md-3 col-sm-6">
					 <a href="#">
						 <img class="img-fluid d-block mx-auto" src="<?php  print ($t3 ? $t3['sizes']['large'] : ''); ?>" alt="">
					 </a>
				 </div>
				 <div class="col-md-3 col-sm-6">
					 <a href="#">
						 <img class="img-fluid d-block mx-auto" src="<?php  print ($t4 ? $t4['sizes']['large'] : ''); ?>" alt="">
					 </a>
				 </div>
			 </div>
		 </div>
	 </section>
