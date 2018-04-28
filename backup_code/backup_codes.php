<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
  .dropdown-submenu {
    position: relative;
  }

  a.dropdown-item:hover {
    /*background-color: green; */
  }

  .dropdown-submenu a::after {
    transform: rotate(-90deg);
    position: absolute;
    right: 6px;
    top: .8em;
  }

  .dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-left: .1rem;
    margin-right: .1rem;
  }
</style>

<body>
  <h1>Hello, world!</h1>

  <!-- search, recent posts, comments, archives, categories, meta -->

  <!-- search php code -->
  <div id="mysearch-3" class="widget-odd widget-first widget-1 searchclass widget widget_search card bg-light mb-3">
    <h5 class="card-header">Search </h5>
    <div class="card-body">

      <form role="search" method="get" class="search-form bd-search d-flex align-items-center" action=" <?php echo get_site_url(); ?>">
        <input type="search" class="search-field form-control ds-input" placeholder="Find … " value="" autocomplete="off" name="s" aria-label="Search">
        <input type="submit" class="search-submit d-md-none  btn btn-secondary " value="Search">
      </form>
    </div>
  </div>

  <!-- recent post php code  -->
  <div id="my-recent-post" class="card bg-light mb-3">
    <h5 class="card-header">Recent Posts</h5>
    <div class="card-body">
      <ul>
        <?php

              $args = array(
                'numberposts' => 8,
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_type' => 'post',
                'post_status' => 'publish',
                'category__not_in' => 7,

              );

              $recent_posts = wp_get_recent_posts($args);
              foreach ($recent_posts as $recent) {
                  printf(
                  '<li ><a class="my_anchor" href="%1$s">%2$s</a></li>',
                  esc_url(get_permalink($recent['ID'])),
                  $recent['post_title']
                );
              }
              wp_reset_query();
              ?>
      </ul>
    </div>
  </div>




  <!-- recent comments php code  -->
  <div id="my-recent-comments" class="card bg-light mb-3">
    <h5 class="card-header">Recent Comments</h5>
    <div class="card-body">
      <ul>
        <!-- <pre> -->
        <?php


  $args = array(
//         'post_id' => 1148,   // Use post_id, not post_ID
    'count'   => false, // Return only the count
    'status' => 'approve',
    'order_by' => 'comment_date',
    'number' => '5',
    'order' => 'DESC'
  );

  $comments = get_comments($args);
//     print_r($comments); //printf won't work in objects
   foreach ($comments as $comment) {
       //var_dump($comment);
       $get_post = get_post($comment->comment_post_ID);
       echo  '<li class="recentcomments"><span class="comment-author-link">'
       . '<a href="'.$comment->comment_author_url.'" rel="external nofollow" class="url">'
       .$comment->comment_author.'</a></span> on <a href="'.get_bloginfo('wpurl')."/".$get_post->post_name.'">'
             .$get_post->post_title.'</a></li>';
   }
      ?>
          <!-- </pre> -->
      </ul>
    </div>
  </div>
  <!-- recent comments php code  -->

  <!-- recent archives -->

  <div id="my-archives" class="card bg-light mb-3">
    <h5 class="card-header">Archives</h5>
    <div class="card-body">
      <ul>
        <?php
      $myarchives=wp_get_archives(array(
        'type'=>'monthly',
        'show_post_count'=>true,
        'post_type'=>'post',
        'format'=>'html',
        'show_post_count'=> false,
        'limit' => 5
      ));

  wp_reset_query();
      ?>
      </ul>
    </div>
  </div>
  <!-- recent archives -->


  <!-- recent categories -->


  <div id="my-categories" class="card bg-light mb-3">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
        <?php
      $args = array(
                  'taxonomy' => 'category',
                  'orderby' => 'name',
                  'order' => 'ASC',
                  'hide_empty' => true,
                  'number' => false,
                  'count' => false,
                  'fields' => 'all',
                  'hierarchical' => true,
          );
              $terms = get_terms($args);
              //print_r($terms);
              if (! empty($terms) && ! is_wp_error($terms)) {
                  $count = count($terms);
                  $i = 0;
                  $term_list = '<p class="my_term-archive">';
                  foreach ($terms as $term) {
                      $i++;
                      $term_list .= '<a href="' . esc_url(get_term_link($term)) . '" alt="' . esc_attr(sprintf(__('View all post filed under %s', 'my_localization_domain'), $term->name)) . '"> '. $term->name .' </a><span> ('.$term->count.') </span>';
                      if ($count != $i) {
                          $term_list .= ' &middot; ';
                      } else {
                          $term_list .= '</p>';
                      }
                  }
                  echo $term_list;
              }
      ?>
    </div>
  </div>

  <!-- recent categories -->


  <!-- Meta -->
  <div id="my-meta" class="card bg-light mb-3">
    <h5 class="card-header">Meta</h5>
    <div class="card-body">
      <ul>
        <?php
      // $getusers = get_users(array('count_total'  => false ));
       $now_user = wp_get_current_user();
       // $userdata = get_userdata(3);
       // $getuserby = get_user_by('ID', '3');
       // var_dump($now_user->data->display_name);
       // $getbypath = get_permalink(get_page_by_path('your-slug'));
       // $slug = get_post_field('post_name', get_post());
       // $getbypath = get_permalink(get_page_by_path($slug));
  ?>
          <?php if (is_user_logged_in()) { ?>
          <li><a href="#">Hi! <?php echo strtoupper($now_user->data->display_name); ?></a></li>
          <li><a href="<?php echo wp_logout_url(get_permalink()); ?>">Logout</a></li>
          <?php
              } else {  ?>
            <li><a href="<?php echo wp_login_url(home_url()); ?>" title="Login">Login</a></li>
            <?php } ?>
              <li><a href="<?php echo get_site_url().'/feed'; ?>" title="Entries RSS">Entries RSS</a></li>
              <li><a href="<?php echo get_site_url().'/comments/feed';?>" title="Comments RSS">Comments RSS</a></li>
              <li><a href="<?php echo get_site_url(); ?>" title="Visit">Visit Us</a></li>
      </ul>
    </div>
  </div>

  <!-- Meta -->


<!-- Most Used Categories -->

<div id="my-most=rec-cat" class="card bg-light mb-3">
  <h5 class="card-header">Most Used Categories</h5>
  <div class="card-body">
      <?php
    $args = array(
                'taxonomy' => 'category',
                'orderby' => 'count',
                'order' => 'DESC',
                'hide_empty' => true,
                'number' => 10,
                'count' => false,
                'fields' => 'all',
                'hierarchical' => true,
                'show_count' => 1,
								'title_li'   => '',
        );
            $terms = get_terms($args);
            //print_r($terms);
            if (! empty($terms) && ! is_wp_error($terms)) {
                $count = count($terms);
                $i = 0;
                $term_list = '<p class="my_term-archive">';
                foreach ($terms as $term) {
                    $i++;
                    $term_list .= '<a href="' . esc_url(get_term_link($term)) . '" alt="' . esc_attr(sprintf(__('View all post filed under %s', 'my_localization_domain'), $term->name)) . '"> '. $term->name .' </a><span> ('.$term->count.') </span>';
                    if ($count != $i) {
                        $term_list .= ' &middot; ';
                    } else {
                        $term_list .= '</p>';
                    }
                }
                echo $term_list;
            }
    ?>
  </div>
</div>

<!-- Most Used Categories -->

<!-- Archives -->

<div id="my-monthly-archives" class="card bg-light mb-3">
  <h5 class="card-header">Archives</h5>
  <div class="card-body">
    <?php
    $archive_content = '<p>' . sprintf( esc_html__( 'Try searching in the monthly archives. %1$s', 'pxmacz' ), convert_smilies( ':)' ) ) . '</p>';
    $instance = array('title' => ' ', 'text' => 'Text', 'dropdown' => 1, 'count'    => 1,  );
     the_widget( 'WP_Widget_Archives', $instance, "after_title=</h2>$archive_content"); ?>
  </div>
</div>

<!-- Archives -->

<!-- Tags -->

<div id="my-tags" class="card bg-light mb-3">
  <h5 class="card-header">Tags</h5>
  <div class="card-body">
    <?php
    $instance = array('title' => ' ', 'text' => 'Text', 'count' => 1 );
     the_widget( 'WP_Widget_Tag_Cloud', $instance); ?>
  </div>
</div>

<!-- Tags -->


  <!-- navbar 1 -->

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul id="primary-menu" class="navbar-nav mr-auto">
        <li id="menu-item-1726" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1726 dropdown nav-item"><a href="#" class="nav-link dropdown-toggle">Blog</a>
          <ul class="sub-menu dropdown-menu">
            <li id="menu-item-1729" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1729 dropdown dropdown-submenu"><a href="#" class="dropdown-item dropdown-toggle">Blog 3</a>
              <ul class="sub-menu dropdown-menu">
                <li id="menu-item-1731" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1731 dropdown dropdown-submenu"><a href="#" class="dropdown-item dropdown-toggle">Bsub3</a>
                  <ul class="sub-menu dropdown-menu">
                    <li id="menu-item-1732" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1732 dropdown dropdown-submenu"><a href="#" class="dropdown-item dropdown-toggle">Bsub3a</a>
                      <ul class="sub-menu dropdown-menu">
                        <li id="menu-item-1733" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1733"><a href="#" class="dropdown-item">Bsub3b</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li id="menu-item-1730" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1730 nav-item"><a href="#" class="nav-link">Contact</a></li>
      </ul>
      <ul id="primary-menu" class="navbar-nav mr-auto">
        <li id="menu-item-1712" class=" menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1712"><a class="dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" href="#">Level 1</a>
          <ul class="sub-menu">
            <li id="menu-item-1715" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1715"><a href="#">Level 2</a>
              <ul class="sub-menu">
                <li id="menu-item-1715" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1715"><a href="#">Level 3c</a>
                  <ul class="sub-menu">
                    <li id="menu-item-1719" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1719"><a href="#">Level 4b</a></li>
                    <li id="menu-item-1720" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1720"><a href="#">Level 4a</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script>

// start troubleshoot b4nav.js   021218


// Nav dropdown functionality

  // $('ul a.dropdown-toggle').on('click', function(e) {
     $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
    //var $nav_ctnr = $('nav div.collapse.navbar-collapse');
    var $nav_ctnr = $('#navbarResponsive');
    //console.log(e.currentTarget);
    if (!$(this).next().hasClass('show')) {
      $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
    }
    var $subMenu = $(this).next(".dropdown-menu");
    $subMenu.toggleClass('show');
    console.log(e);
    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
      $('.dropdown-submenu .show').removeClass("show");
    });
      $nav_ctnr.addClass('show');    // rbtm
    return false;
  });


// end -----------------------------







    var $childrenli = $('.navbar-nav.mr-auto>li'),
      $mrauto = $('.navbar-nav.mr-auto');
    // initialize to bootstrap classes - rbtm
    $childrenli.children('ul').parent('li').addClass('dropdown');
    $childrenli.addClass('nav-item').children('a').addClass('nav-link');
    $childrenli.children('ul').siblings('a').attr('id', 'navbarDropdownMenuLink').attr('data-toggle', 'dropdown').attr('aria-haspopup', 'true').attr('aria-expanded', 'false');
    $mrauto.find('ul a').addClass('dropdown-item');
    $mrauto.find('ul').addClass('dropdown-menu').siblings('a').addClass('dropdown-toggle').parent('li').addClass('dropdown-submenu');
    $mrauto.children('li').removeClass('dropdown-submenu');

    // multilevel
    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
      if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
      }
      var $subMenu = $(this).next(".dropdown-menu");
      $subMenu.toggleClass('show');


      $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
        $('.dropdown-submenu .show').removeClass("show");
      });


      return false;
    });
  </script>
</body>

</html>
