<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pxmacz
 */

?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php// pxmacz_post_thumbnail(); ?>
          <header class="entry-header">
              <?php pxmacz_entry_footer(); ?>
              <?php
                if (is_single()) :
                  the_title('<h1 class="entry-title">', '</h1>');
                else :
                  the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                endif;

              if ('post' === get_post_type())  : ?>
                <div class="entry-meta">
                  <?php pxmacz_posted_on(); ?>
                </div> <!-- .entry-meta -->
              <?php endif; ?>
          </header><!-- .entry-header -->
          <?php if (has_post_thumbnail()) {  ?>
            	<figure class="featured-image full-bleed">
        	    	<?php the_post_thumbnail('pxmacz-full-bleed'); ?>
            	</figure><!-- .featured-image full-bleed -->
        	<?php } ?>

        <div class="row">
          <?php if (is_active_sidebar('sidebar-1')): ?>
             <div class="entry-content col-lg-8 ">
          <?php else: ?>
             <div class="entry-content col-lg-12 ">
          <?php endif; ?>

            <?php
            the_content(sprintf(
              wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'pxmacz'),
                array(
                  'span' => array(
                    'class' => array(),
                  ),
                )
              ),
              get_the_title()
            ));

            wp_link_pages(array(
              'before' => '<div class="page-links">' . esc_html__('Pages:', 'pxmacz'),
              'after'  => '</div>',
            ));
            // ----------------- test php snippet
            //------------------
            pxmacz_post_navigation();
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
              comments_template();
            endif;
                // $x=comments_open();
                // $y= get_comments_number();
                ?>
          </div> <!-- entry-content -->
        <?php  get_sidebar(); ?>
        </div>  <!-- row -->
  </article>
