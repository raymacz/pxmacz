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


	     <!-- Portfolio Modals -->

	     <!-- Modal 1 -->
	     <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
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
	                   <h2 class="text-uppercase">Project Name</h2>
	                   <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
	                   <img class="img-fluid d-block mx-auto" src="<?php bloginfo('template_directory'); ?>/img/portfolio/01-full.jpg" alt="">
	                   <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
	                   <ul class="list-inline">
	                     <li>Date: January 2017</li>
	                     <li>Client: Threads</li>
	                     <li>Category: Illustration</li>
	                   </ul>
	                   <button class="btn btn-primary" data-dismiss="modal" type="button">
	                     <i class="fa fa-times"></i>
	                     Close Project</button>
	                 </div>
	               </div>
	             </div>
	           </div>
	         </div>
	       </div>
	     </div>

	     <!-- Modal 2 -->
	     <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
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
	                   <h2 class="text-uppercase">Project Name</h2>
	                   <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
	                   <img class="img-fluid d-block mx-auto" src="<?php bloginfo('template_directory'); ?>/img/portfolio/02-full.jpg" alt="">
	                   <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
	                   <ul class="list-inline">
	                     <li>Date: January 2017</li>
	                     <li>Client: Explore</li>
	                     <li>Category: Graphic Design</li>
	                   </ul>
	                   <button class="btn btn-primary" data-dismiss="modal" type="button">
	                     <i class="fa fa-times"></i>
	                     Close Project</button>
	                 </div>
	               </div>
	             </div>
	           </div>
	         </div>
	       </div>
	     </div>

	     <!-- Modal 3 -->
	     <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
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
	                   <h2 class="text-uppercase">Project Name</h2>
	                   <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
	                   <img class="img-fluid d-block mx-auto" src="<?php bloginfo('template_directory'); ?>/img/portfolio/03-full.jpg" alt="">
	                   <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
	                   <ul class="list-inline">
	                     <li>Date: January 2017</li>
	                     <li>Client: Finish</li>
	                     <li>Category: Identity</li>
	                   </ul>
	                   <button class="btn btn-primary" data-dismiss="modal" type="button">
	                     <i class="fa fa-times"></i>
	                     Close Project</button>
	                 </div>
	               </div>
	             </div>
	           </div>
	         </div>
	       </div>
	     </div>

	     <!-- Modal 4 -->
	     <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
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
	                   <h2 class="text-uppercase">Project Name</h2>
	                   <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
	                   <img class="img-fluid d-block mx-auto" src="<?php bloginfo('template_directory'); ?>/img/portfolio/04-full.jpg" alt="">
	                   <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
	                   <ul class="list-inline">
	                     <li>Date: January 2017</li>
	                     <li>Client: Lines</li>
	                     <li>Category: Branding</li>
	                   </ul>
	                   <button class="btn btn-primary" data-dismiss="modal" type="button">
	                     <i class="fa fa-times"></i>
	                     Close Project</button>
	                 </div>
	               </div>
	             </div>
	           </div>
	         </div>
	       </div>
	     </div>

	     <!-- Modal 5 -->
	     <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
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
	                   <h2 class="text-uppercase">Project Name</h2>
	                   <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
	                   <img class="img-fluid d-block mx-auto" src="<?php bloginfo('template_directory'); ?>/img/portfolio/05-full.jpg" alt="">
	                   <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
	                   <ul class="list-inline">
	                     <li>Date: January 2017</li>
	                     <li>Client: Southwest</li>
	                     <li>Category: Website Design</li>
	                   </ul>
	                   <button class="btn btn-primary" data-dismiss="modal" type="button">
	                     <i class="fa fa-times"></i>
	                     Close Project</button>
	                 </div>
	               </div>
	             </div>
	           </div>
	         </div>
	       </div>
	     </div>

	     <!-- Modal 6 -->
	     <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
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
	                   <h2 class="text-uppercase">Project Name</h2>
	                   <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
	                   <img class="img-fluid d-block mx-auto" src="<?php bloginfo('template_directory'); ?>/img/portfolio/06-full.jpg" alt="">
	                   <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
	                   <ul class="list-inline">
	                     <li>Date: January 2017</li>
	                     <li>Client: Window</li>
	                     <li>Category: Photography</li>
	                   </ul>
	                   <button class="btn btn-primary" data-dismiss="modal" type="button">
	                     <i class="fa fa-times"></i>
	                     Close Project</button>
	                 </div>
	               </div>
	             </div>
	           </div>
	         </div>
	       </div>
	     </div>

<?php wp_footer(); ?>

</body>
</html>
