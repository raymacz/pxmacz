<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pxmacz
 */

?>
  <!doctype html>
  <html <?php language_attributes(); ?>>
  <!-- <html <?php //language_attributes(); ?> class="no-svg"> -->

  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
  </head>

  <body id="page-top" <?php body_class(); ?>>
    <div id="page" class="site myancestor">
      <a class="skip-link screen-reader-text" href="#content">
        <?php esc_html_e('Skip to content', 'pxmacz'); ?> </a>

      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">

        <div class="container">
          <div class="row btnrow">
            <!-- <div class=" col-8 col-md-5 col-lg-3 col-xl-3 mr-auto"> -->
            <div class="col-9 col-md-8 col-lg-3 col-xl-5 mr-auto">
              <div class="col-auto divlogo site-branding">
                <?php the_custom_logo(); $description = get_bloginfo('description', 'display'); ?>
                <div class="site-branding__text">
                  <!-- <a class="site-title navbar-brand js-scroll-trigger"  -->
                  <h2 class="site-title"><a class="js-scroll-trigger" href="<?php echo esc_url(home_url('#page-top')); ?>" rel="home"> <?php bloginfo('name'); ?>  </a></h2>
                  <?php
                  if ($description || is_customize_preview()) : ?>
                  <i class="site-description"><small><?php echo $description; /* WPCS: xss ok. */ ?></small></i>
                <?php endif; ?>
                </div>
              </div>  <!-- col-auto divlogo -->
            </div>  <!-- mr-auto -->
            <div class="col-auto divbtn">
              <button class="navbar-toggler navbar-toggler-right navbtn" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              Menu <i class="fa fa-bars"></i>
            </button>
            </div>   <!-- divbtn -->
            <?php
                  //  Bootstrap 4 multilevel dropdown inside navigation
                $disp_menu = array(
                    'menu'						 => 'Main Menu',
                    'theme_location'	 => 'menu-1',
                    'menu_id'          => 'primary-menu',
                    'menu_class'       => 'navbar-nav text-uppercase',
                    'container'	 			 => 'div',
                    'container_id'		 => 'navbarResponsive',
                    'container_class'	 => 'collapse navbar-collapse col-auto',
                    'depth'            => 5,
                  );

                if (!is_front_page()) {
                    $disp_menu['theme_location'] = 'menu-3';
                }
                    wp_nav_menu($disp_menu);
                ?>
          </div>  <!-- row -->
        </div> <!-- container -->
      </nav>

      <!-- Header -->

      <?php if (!(get_header_image() && is_front_page())) : ?>
      <!-- .header-image -->
      <div class="container-fluid div-head">
        <header id="masthead" class=" home_header site-header" class role="banner">
          <figure class=" header-image">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
            <?php if (get_header_image_tag()) : ?>
                <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="header image">
            <?php endif; ?>
          </a>
          </figure>
        </header>
      </div>
      <?php else: ?>
      <header id="masthead" class="masthead site-header" role="banner" style="background-image: url('<?php  header_image();  ?>')">
        <div class="container">
          <div class="intro-text">
            <div class="intro-lead-in">It's nice of you to visit our site...</div>
            <div class="intro-heading text-uppercase">Come Home To San Diego!</div>
            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>
          </div>
        </div>
      </header>
      <?php endif; // End header image check.?>

      <div id="content" class="site-content container">
