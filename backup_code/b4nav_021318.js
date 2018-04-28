(function($) {
  /*
   * Bootstrap 4 multilevel dropdown inside navigation
   */

  var wheight = $(window).height(); //get the height of the window

  var $childrenli = $('.navbar-nav>li'),
    $navbarnav = $('.navbar-nav'),
    $navcol = $('.navbar-collapse.collapse');


  // initialize it with bootstrap 4 classes - rbtm
  $childrenli.children('ul').parent('li').addClass('dropdown');
  $childrenli.addClass('nav-item').children('a').addClass('nav-link');
  $childrenli.children('ul').siblings('a').attr('id', 'navbarDropdownMenuLink').attr('data-toggle', 'dropdown').attr('aria-haspopup', 'true').attr('aria-expanded', 'false');
  $navbarnav.find('ul a').addClass('dropdown-item');
  $navbarnav.find('ul').addClass('dropdown-menu').siblings('a').addClass('dropdown-toggle').parent('li').addClass('dropdown-submenu');
  $navbarnav.children('li').removeClass('dropdown-submenu');

  // add custom <a> classes to contrac
  // $childrenli.find('a').addClass('js-scroll-trigger');
  $childrenli.children('a').addClass('js-scroll-trigger');




  // close menu if clicked outside
  $(window).click(function() {
    if ($navcol.hasClass('show')) {
      $navcol.removeClass('show');
    }
  });


  // close menu if clicked 1st child - <a>
  $childrenli.children('a').on('click', function(e) {
    var $this = $(this),
      crap = $navcol.css('display');
    console.log(crap);

    // if (($navcol.hasClass('show') || $childrenli.hasClass('show')) && $navcol.css('display') == 'flex' ) {
    if (crap == "flex") {
      if ($navcol.hasClass('show') || $childrenli.hasClass('show')) {
        $childrenli.removeClass('show');
        $navcol.removeClass('show');
        $childrenli.children('a').attr('aria-expanded', 'false');
        $childrenli.children('a').siblings('ul').removeClass('show');
        $childrenli.removeClass('show').find('.show').removeClass('show');
        $this.addClass('js-scroll-trigger');
      }
      // Nav dropdown functionality
       $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
      // $('ul.dropdown-menu').siblings('a.dropdown-toggle').on('click', function(e) {
        $childrenli.children('a').removeClass('js-scroll-trigger');
        var $nav_ctnr = $('#navbarResponsive');
        if (!$(this).next().hasClass('show')) {
          $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');
        if (!$(this).next().hasClass('show')) {
          $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass("show");
          });
        }
        $nav_ctnr.addClass('show'); // rbtm
        return false;
      });
    } else {
      // Nav dropdown functionality
      // $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
      console.log(e);
       $('ul.dropdown-menu').siblings('a.dropdown-toggle').on('click', function(e) {
        $childrenli.children('a').removeClass('js-scroll-trigger');
        var $nav_ctnr = $('#navbarResponsive');
        if (!$(this).next().hasClass('show')) {
          $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');
        if (!$(this).next().hasClass('show')) {
          $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
            $('.dropdown-submenu .show').removeClass("show");
          });
        }
        $nav_ctnr.addClass('show'); // rbtm
        return false;
      });
    }
  });


  /*
  console.log(wheight);
    $('header').css('height', wheight); //set to window tallness   027

      //adjust height of .fullheight elements on window resize 027
      $(window).resize(function() {
        wheight = $(window).height(); //get the height of the window
        $('header').css('height', wheight); //set to window tallness
      });
  */
})(jQuery);
