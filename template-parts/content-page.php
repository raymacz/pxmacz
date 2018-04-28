<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pxmacz
 */

?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
      <?php pxmacz_entry_footer(); ?>
      <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header>
    <!-- .entry-header -->

    <?php //pxmacz_post_thumbnail();?>
    <?php if (has_post_thumbnail()) {
    ?>
    <figure class="featured-image full-bleed">
      <?php the_post_thumbnail('pxmacz-full-bleed'); ?>
    </figure>
    <!-- .featured-image full-bleed -->
    <?php
} ?>

      <div class="row">
        <?php if (is_active_sidebar('sidebar-3')): ?>
           <div class="entry-content col-lg-8 ">
        <?php else: ?>
           <div class="entry-content col-lg-12 ">
        <?php endif; ?>

          <?php
            the_content();

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'pxmacz'),
                'after'  => '</div>',
            ));
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
          ?>
        </div><!-- .entry-content -->
        <?php  get_sidebar('page'); ?>
      </div><!-- row -->
  </article>
  <!-- #post-<?php //the_ID();?> -->
