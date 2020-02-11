jQuery(window).load(function() {
    //adding class to menu nav when menu is clicked
    jQuery('.menu-toggle').on('click', function () {
  
      jQuery('.menu-toggle').toggleClass('open');
      jQuery('body').toggleClass('menuisopen');
    });
    //adding class to submenu when header item is clicked
    jQuery('.menu-item-has-children a').on('click', function () {
  
      jQuery(this).parent().toggleClass('open');
    });    

        //adding class to body when popup trigger is clicked
        jQuery('.mailing-list-trigger').on('click', function () {
          jQuery('body').toggleClass('popupisopen');
        });

        //removing class when close button is clicked
        jQuery('.form-close').on('click', function () {
          jQuery('body').toggleClass('popupisopen');
        });

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
          offset: 'bottom-in-view'
      });
      var callbackwaypoint = jQuery('#callback-cta .row').waypoint(function() {
        jQuery(this.element).addClass('start');
}, {
    //Set the offset
    offset: 'bottom-in-view'
});
        //set a waypoint for each of the jobs
        var sectionwaypoint = jQuery('.jobs .col.quarter').waypoint(function() {
          //check the direction
              //add the class to start the animation
              jQuery(this.element).addClass('start');
      }, {
          //Set the offset
          offset: '90%'
      });
              //set a waypoint for each blog post
              var sectionwaypoint = jQuery('.new-blog .single-blog-item').waypoint(function() {
                //check the direction
                    //add the class to start the animation
                    jQuery(this.element).addClass('start');
            }, {
                //Set the offset
                offset: '90%'
            });
    });



    jQuery(document).ready(function () {

    //Flipster for Use Cases slider
jQuery('.flipster').flipster({
  itemContainer: 'ul',
  // [string|object]
  // Selector for the container of the flippin' items.

  itemSelector: 'li',
  // [string|object]
  // Selector for children of `itemContainer` to flip

  start: 0,
  // ['center'|number]
  // Zero based index of the starting item, or use 'center' to start in the middle

  fadeIn: 400,
  // [milliseconds]
  // Speed of the fade in animation after items have been setup

  loop: true,
  // [true|false]
  // Loop around when the start or end is reached

  autoplay: false,
  // [false|milliseconds]
  // If a positive number, Flipster will automatically advance to next item after that number of milliseconds

  style: 'flat',
  // [coverflow|carousel|flat|...]
  // Adds a class (e.g. flipster--coverflow) to the flipster element to switch between display styles
  // Create your own theme in CSS and use this setting to have Flipster add the custom class

  spacing: -0.75,
  // [number]
  // Space between items relative to each item's width. 0 for no spacing, negative values to overlap

  click: true,
  // [true|false]
  // Clicking an item switches to that item

  keyboard: true,
  // [true|false]
  // Enable left/right arrow navigation

  scrollwheel: false,
  // [true|false]
  // Enable mousewheel/trackpad navigation; up/left = previous, down/right = next

  touch: false,
  // [true|false]
  // Enable swipe navigation for touch devices

  nav: true,
  // [true|false|'before'|'after']
  // If not false, Flipster will build an unordered list of the items
  // Values true or 'before' will insert the navigation before the items, 'after' will append the navigation after the items

  buttons: 'custom',
  // [true|false|'custom']
  // If true, Flipster will insert Previous / Next buttons with SVG arrows
  // If 'custom', Flipster will not insert the arrows and will instead use the values of `buttonPrev` and `buttonNext`

  buttonPrev: '<img src="http://new.signoi.com/wp-content/uploads/2019/12/Signoi-Website-HOME-template-3d-CS6-04.svg">',
  // [text|html]
  // Changes the text for the Previous button

  buttonNext: '<img src="http://new.signoi.com/wp-content/uploads/2019/12/pagination-arrow-right.svg">',
  // [text|html]
  // Changes the text for the Next button

  onItemSwitch: false
  // [function]
  // Callback function when items are switched
  // Arguments received: [currentItem, previousItem]
});
	    //slider for testimonials
  jQuery('.flexslider.comments').flexslider({
    animation: "slide",
   slideshow: false,
	  animationSpeed: 1000
  });
  	    //slider for reports
        jQuery('.flexslider.reports').flexslider({
          animation: "slide",
         slideshow: false,
          animationSpeed: 1000
        });

        jQuery('#tabs')
        .tabs()
        .addClass('ui-tabs-vertical ui-helper-clearfix');     

// scroll magic for platform parallax
var controller = new ScrollMagic.Controller({
  globalSceneOptions: {
    triggerHook: 'onLeave',
    duration: "100%" // this works just fine with duration 0 as well
    // However with large numbers (>20) of pinned sections display errors can occur so every section should be unpinned once it's covered by the next section.
    // Normally 100% would work for this, but here 200% is used, as Panel 3 is shown for more than 100% of scrollheight due to the pause.
  }
});

// get all slides
var slides = document.querySelectorAll("section.stick");

// create scene for every slide
for (var i=0; i<slides.length; i++) {
  new ScrollMagic.Scene({
      triggerElement: slides[i],
    })
    .setPin(slides[i], {pushFollowers: false})
    .addIndicators() // add indicators (requires plugin)
    .addTo(controller);
}
        
});

function scrollToAnchor(hash) {
  var target = jQuery(hash),
      headerHeight = jQuery(".site-header").height(); // Get fixed header height
    jQuery('html,body').animate({
          scrollTop: target.offset().top - headerHeight
      }, 500);
      return false;
}

if(window.location.hash) {
  scrollToAnchor(window.location.hash);
}


jQuery("a[href*=\\#]:not([href=\\#])").click(function()
{
  if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
      || location.hostname == this.hostname)
  {

      scrollToAnchor(this.hash);
  }
});