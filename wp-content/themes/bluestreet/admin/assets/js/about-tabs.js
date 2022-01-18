jQuery(document).ready(function() {

/* Tabs in welcome page */
    function bluestreet_welcome_page_tabs(event) {
        jQuery(event).parent().addClass("active");
       jQuery(event).parent().siblings().removeClass("active");
       var tab = jQuery(event).attr("href");
       jQuery(".bluestreet-tab-pane").not(tab).css("display", "none");
       jQuery(tab).fadeIn();
    }
    
    jQuery(".bluestreet-nav-tabs li").slice(0,1).addClass("active");

   jQuery(".bluestreet-nav-tabs a").click(function(event) {
       event.preventDefault();
        bluestreet_welcome_page_tabs(this);
   });

        /* Tab Content height matches admin menu height for scrolling purpouses */
     $tab = jQuery('.bluestreet-tab-content > div');
     $admin_menu_height = jQuery('#adminmenu').height();
     if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
     {
         $newheight = $admin_menu_height - 180;
         $tab.css('min-height',$newheight);
     }

     jQuery(".bluestreet-custom-class").click(function(event){
       event.preventDefault();
       jQuery('.bluestreet-nav-tabs li a[href="#recommended_actions"]').click();
    });

     jQuery(".bluestreet-changelog-class").click(function(event){
       event.preventDefault();
       jQuery('.bluestreet-nav-tabs li a[href="#changelog"]').click();
    });

});
