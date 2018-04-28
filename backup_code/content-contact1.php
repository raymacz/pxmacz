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
					 <form id="contactForm" name="sentMessage" novalidate>
						 <div class="row">
							 <div class="col-md-6">
								 <div class="form-group">
									 <input class="form-control" id="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
									 <p class="help-block text-danger"></p>
								 </div>
								 <div class="form-group">
									 <input class="form-control" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
									 <p class="help-block text-danger"></p>
								 </div>
								 <div class="form-group">
									 <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number.">
									 <p class="help-block text-danger"></p>
								 </div>
							 </div><!-- col-md-6 -->
							 <div class="col-md-6">
								 <div class="form-group">
									 <textarea class="form-control" id="message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
									 <p class="help-block text-danger"></p>
								 </div>
							 </div> <!-- col-md-6 -->
							 <div class="clearfix"></div>
							 <div class="col-lg-12 text-center">
								 <div id="success"></div>
								 <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
							 </div>
						 </div> <!-- row -->
					 </form>
				 </div>
			 </div>
		 </div>
	 </section> <!-- Contact -->

<!-- use bellow to add to contact form 7
	 <div class="row">
<div class="col-md-6">
  <div class="form-group">
    [text* your-name id:name class:form-control placeholder "Your Name*"]
   </div>
  <div class="form-group">
    [email* your-email id:email class:form-control placeholder "Your Email*"]
  </div>
   <div class="form-group">
   [tel tel-664 id:phone class:form-control placeholder "Your Phone"]
   </div>
   <div class="form-group">
   [text* your-subject id:subject class:form-control placeholder "Your Subject*"]
   </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    [textarea* your-message id:message class:form-control placeholder "Your Message*"]
   </div>
</div>
<div class="clearfix"></div>
<div class="col-lg-12 text-center">
[submit id:sendMessageButton class:btn class:btn-primary class:btn-xl class:text-uppercase "Send Message"]
</div>
</div> -->
