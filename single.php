<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pxmacz
 */

get_header(); ?>

  <div id="primary" class="content-area ">
    <div class="container">
        <main id="main" class="site-main">
          <?php
          while (have_posts()) : the_post();
              get_template_part('template-parts/content', 'single');
          endwhile; // End of the loop.
          ?>
        </main>  <!-- #main -->
    </div> <!-- container -->
  </div> <!-- #primary -->

  <?php

get_footer();
