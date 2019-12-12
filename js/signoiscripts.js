jQuery(document).ready(function () {
    //adding class to menu nav when menu is clicked
    jQuery('.menu-toggle').on('click', function () {
  
      jQuery('.menu-toggle').toggleClass('open');
      jQuery('body').toggleClass('menuisopen');
    });

        //set a waypoint for all the page parts on the page
        var sectionwaypoint = jQuery('section').waypoint(function() {
            //check the direction
                //add the class to start the animation
                jQuery(this.element).addClass('start');
                console.log("section reached");
        }, {
            //Set the offset
            offset: '90%'
        });
        var semioticswaypoint = jQuery('#quantitative-semiotics .row').waypoint(function() {
              jQuery(this.element).addClass('start');
              console.log("QS row reached");
      }, {
          //Set the offset
          offset: 'bottom-in-view'
      });
      var callbackwaypoint = jQuery('#callback-cta .row').waypoint(function() {
        jQuery(this.element).addClass('start');
        console.log("CTA row reached");
}, {
    //Set the offset
    offset: 'bottom-in-view'
});
    });
