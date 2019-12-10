jQuery(document).ready(function () {
    //adding class to menu nav when menu is clicked
    jQuery('.menu-toggle').on('click', function () {
  
      jQuery('.menu-toggle').toggleClass('open');
      jQuery('body').toggleClass('menuisopen');
    });

  });
  
  //add class to header when scrolling up
  
  jQuery(document).ready(function () {
    
    'use strict';
    
     var c, currentScrollTop = 0,
         navbar = jQuery('.site-header');
  
     jQuery(window).scroll(function () {
        var a = jQuery(window).scrollTop();
        var b = navbar.height();
       
        currentScrollTop = a;
       
        if (c < currentScrollTop && a > b + b) {
          navbar.addClass("scrollUp");
        } else if (c > currentScrollTop && !(a <= b)) {
          navbar.removeClass("scrollUp");
        }
        c = currentScrollTop;
    });
    
  });

    jQuery(document).ready(function(){
        //set a waypoint for all the page parts on the page
        var sectionwaypoint = jQuery('section').waypoint(function() {
            //check the direction
                //add the class to start the animation
                jQuery(this.element).addClass('start');
        }, {
            //Set the offset
            offset: '90%'
        });
        var semioticswaypoint = jQuery('#quantitative-semiotics .row').waypoint(function() {
              jQuery(this.element).addClass('start');
      }, {
          //Set the offset
          offset: '90%'
      });
    });


