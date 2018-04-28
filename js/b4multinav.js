
/*!
 * Bootstrap 4 multi dropdown navbar ( https://bootstrapthemes.co/demo/resource/bootstrap-4-multi-dropdown-navbar/ )
 * Copyright 2017.
 * Licensed under the GPL license
 */
(function($) {

  $( document ).ready( function () {

    // initialize elements to bootstrap 4 navbar multilevel dropdown
    var  $ulnavbar_li = $('ul.navbar-nav>li');

        $ulnavbar_li.addClass('nav-item').children('a').addClass('nav-link').addClass('js-scroll-trigger').siblings('ul').parent('li').addClass('dropdown');
        $ulnavbar_li.children('a').siblings('ul').addClass('dropdown-menu').attr('aria-labelledby', 'navbarDropdownMenuLink');
        $ulnavbar_li.children('ul').siblings('a').addClass('dropdown-toggle').removeClass('js-scroll-trigger').attr('id', 'navbarDropdownMenuLink')
        .attr('data-toggle', 'dropdown').attr('aria-haspopup', 'true').attr('aria-expanded', 'false');

    var $rootul = $ulnavbar_li.children('ul');

        $rootul.find('a').addClass('dropdown-item');
        $rootul.find('ul').addClass('dropdown-menu').siblings('a').addClass('dropdown-toggle ');


    // dropdown menu toggle
      $( '.dropdown-menu a.dropdown-toggle' ).on( 'click', function ( e ) {
          var $el = $( this );
          var $parent = $( this ).offsetParent( ".dropdown-menu" );
          if ( !$( this ).next().hasClass( 'show' ) ) {
              $( this ).parents( '.dropdown-menu' ).first().find( '.show' ).removeClass( "show" );
          }
          var $subMenu = $( this ).next( ".dropdown-menu" );
          $subMenu.toggleClass( 'show' );

          $( this ).parent( "li" ).toggleClass( 'show' );

          $( this ).parents( 'li.nav-item.dropdown.show' ).on( 'hidden.bs.dropdown', function ( e ) {
              $( '.dropdown-menu .show' ).removeClass( "show" );
          } );

           if ( !$parent.parent().hasClass( 'navbar-nav' ) ) {
              $el.next().css( { "top": $el[0].offsetTop, "left": $parent.outerWidth() - 4 } );
          }

          return false;
      } );




  });

})(jQuery);
