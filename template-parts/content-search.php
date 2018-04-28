<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pxmacz
 */

?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php pxmacz_post_thumbnail(); ?>
    <div class="post__content">
      <header class="entry-header">
        <?php pxmacz_entry_footer(); ?>
        <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

        <?php if ('post' === get_post_type()) : ?>
        <div class="entry-meta">
          <?php pxmacz_posted_on(); ?>
        </div>
        <!-- .entry-meta -->
        <?php endif; ?>
      </header>
      <!-- .entry-header -->


      <div class="entry-summary">
        <?php 
        $read_more = sprintf(wp_kses(
            __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'pxmacz'),
            array( 'span' => array( 'class' => array(), ), )
        ), get_the_title());
        the_excerpt(); ?>
      </div>
      <!-- .entry-summary -->
      <div class="continue-reading">
        <a href="<?php echo esc_url(get_permalink()) ?>" rel="bookmark">
          <?php echo $read_more; ?>
        </a>
      </div>
      <!-- continue-reading -->
    </div>
    <!-- post__content -->
  </article>
  <!-- #post-<?php the_ID(); ?> -->
