<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pxmacz
 */

?>
</div> <!-- #content -->
      	<?php get_sidebar('footer'); ?>

		<!-- Footer -->
	    <footer id="colophon" class="site-footer" role="contentinfo">
	       <div class="container">
	         <div class="row">
	           <div class="col-md-4">
							 <div class="footer-text"><?php printf(esc_html__('Powered by: %1$s ', 'pxmacz'), '<a class="designer" href="https://webmacz.ml/" rel="designer">WebMacZ & Sons</a>'); ?></div>
							 <ul class="list-inline quicklinks">
								<li class="list-inline-item">
									<a href="#">Privacy Policy</a>
								</li>
								<li class="list-inline-item">
									<a href="#">Terms of Use</a>
								</li>
							</ul>
	           </div>
						 <div class="col-md-4">
							 	<div class="site-footer__wrap">
								<?php
            // Make sure there is a social menu to display.
            		if (has_nav_menu('menu-2')) { ?>
								<nav class="footer-menu">
								<?php
		                    wp_nav_menu(array(
														'menu'					 => 'Footer Menu',
		                        'theme_location' => 'menu-2',
														'menu_id'        => 'social-link',
		                        'menu_class'     => 'social-links-menu',
		                        'depth'          => 1,
		                        'link_before'    => '<span class="screen-reader-text">',
		                        // 'link_after'     => '</span>'
		                        'link_after'     => '</span>' . pxmacz_get_svg(array( 'icon' => 'chain' )),
		                    )); ?>
								</nav><!-- .social-menu -->
							<?php }		?>
						</div> <!-- site-footer__wrap -->
						 </div> <!-- col-md-4 -->
						 <div class="col-md-4">
							 <!-- <span class="copyright">Copyright &copy; 2018</span> -->
						   <span class="copyright"><?php printf(esc_html__('%1$s %2$s', 'pxmacz'), 'Copyright: &copy;', '2018'); ?></span>
						   <div class="footer-text"><?php printf(esc_html__('%1$s Theme by %2$s', 'pxmacz'), 'Pxmacz', '<a class="designer" href="#" rel="designer">Raymacz</a>'); ?></div>
						 </div>	 <!-- col-md-4 -->
	         </div> <!-- row -->
	       </div> <!-- container -->
	     </footer>  <!-- colophon -->
</div><!-- #page -->

<?php

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


	     <!-- Portfolio Modals -->
<?php  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) :
        $query->the_post();
        //get image path
        $pt1 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', false );
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


    ?>
	     <!-- Modal 1 -->
	     <div class="portfolio-modal modal fade" id="portfolioModal<?php print $pcount+1; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	       <div class="modal-dialog">
	         <div class="modal-content">
	           <div class="close-modal" data-dismiss="modal">
	             <div class="lr">
	               <div class="rl"></div>
	             </div>
	           </div>
	           <div class="container">
	             <div class="row">
	               <div class="col-lg-8 mx-auto">
	                 <div class="modal-body">
	                   <!-- Project Details Go Here -->
                           <h2 class="text-uppercase"><?php the_title(); ?></h2>
	                   <p class="item-intro text-muted"><?php print $pdesc1; ?></p>
	                   <img class="img-fluid d-block mx-auto" src="<?php  print ($fimage1 ? $fimage1 : ''); ?>" alt="">
                           <p><?php the_content(); ?></p>
	                   <ul class="list-inline">
	                     <li>Date: <?php print $pdate1; ?></li>
	                     <li>Courtest of: <?php print $pclient1; ?></li>
	                     <li>Category: <?php
                                    $cats1= array();
                                    foreach ($clist1 as $c1) {
                                        array_push($cats1, esc_html__($c1->name, 'pxmacz'));
                                    }
                                    echo implode(", ", $cats1); ?></li>
	                   </ul>
	                   <button class="btn btn-primary" data-dismiss="modal" type="button">
	                     <i class="fa fa-times"></i>
	                     Close</button>
	                 </div>
	               </div>
	             </div>
	           </div>
	         </div> <!--modal-content-->
	       </div><!--modal-dialog-->
	     </div> <!--modal-->
             <?php
        $pcount++; endwhile;
      } else {
             // no posts found
      }
wp_reset_postdata(); ?>

<?php wp_footer(); ?>

</body>
</html>
