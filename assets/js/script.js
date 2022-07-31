
    
    jQuery('#searchsite').on('click', function(e) {
        jQuery("#searchholder").toggleClass("search-show"); //you can list several class names 
        e.preventDefault();
    });
    
    jQuery("#close-search-toggle").on('click', function(e) {
        jQuery("#searchholder").toggleClass("search-show"); //you can list several class names 
        e.preventDefault();
    });