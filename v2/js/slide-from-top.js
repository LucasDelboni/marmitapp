jQuery(document).ready(function($) {
      
  /* hjaveed slide from top menu jquery plugin */
   $.fn.slideFromTop = function(options) {
      console.log('see the options here ', options);
      var options = $.extend({
         menu : this, // sidebar menu
         menuBtn : $('#menuBtn'),          // button to toggle the menu
         body : $(document.body),
         bodyOverlay: $('.overlay'),     // throw a modal like overlay
         navbar: $('.navbar'),           // navbar on the top of menu
         menuSpeed : 500,                // aninmation speed
      }, options);
      
      var menuWidth = options.menu.width();
      var menuHeight = options.menu.height();
    
      $(document.body).css({
         'overflow-x' : 'hidden',
         'left' : 0,
      });
    
      options.menu.css({
         'position' : 'fixed',
         'top' : -( menuHeight * 5 ) + 'px',
         'left': 0,
         'width': menuWidth + 'px',
         'height' : 100 + '%',
      });
      
      options.navbar.css('z-index', '50');
    
      options.openMenu = function() {
         var menuMargin = options.navbar.height();
         $('.mobile-side-menu').show();
         $('.mobile-side-menu').animate({ 'top': menuMargin }, options.menuSpeed);
         $('.overlay').fadeIn(options.menuSpeed);
         $('.mobile-side-menu').scrollTop(0);
         options.body.addClass('noscroll');
      };
    
      options.closeMenu = function() {
         $('.mobile-side-menu, .overlay').fadeOut(options.menuSpeed);
         $('.mobile-side-menu').css('top', '-1040px');
         options.body.removeClass('noscroll');
      };
    
      options.menuBtn.on('click', function(e) {
         e.preventDefault();
         options.body.toggleClass('menuOpen');
         if ( options.body.hasClass('menuOpen') ) {
            options.openMenu();
         } else {
            options.closeMenu();
         }
      });
      
      options.bodyOverlay.on('click', function() {
         options.body.toggleClass('menuOpen');
         if ( !options.body.hasClass('menuOpen') ) options.closeMenu();
      });
    
   };
  
});