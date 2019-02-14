jQuery(document).ready(function() {
   
    // screen size detection
    if( jQuery('.toggle-nav').css('display')=='flex') {
        jQuery('.navbar-menu .navbar-item').hide();
    }

    
    jQuery('.toggle-nav').click(function(e) {
        jQuery('.navbar-menu .navbar-item').slideToggle();
 
        e.preventDefault();
    });
});