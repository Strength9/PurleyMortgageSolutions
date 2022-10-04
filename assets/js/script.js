
    
    jQuery('#searchsite').on('click', function(e) {
        jQuery("#searchholder").toggleClass("search-show"); //you can list several class names 
        e.preventDefault();
    });
    
    jQuery("#close-search-toggle").on('click', function(e) {
        jQuery("#searchholder").toggleClass("search-show"); //you can list several class names 
        e.preventDefault();
    });
    
    jQuery(window).scroll(function () {
        var scroll_top =     jQuery(this).scrollTop();
        if (scroll_top >= 350) {
            jQuery(".head").addClass("fixed");
        } else {
            jQuery(".head").removeClass("fixed");
        }
    });