

jQuery( document ).ready(function($) {
    moment.updateLocale('en', {
        weekdaysMin : ["PIR", "OT", "TR", "CE", "PIE", "SE", "SV"]
    });
   $('#datetimepicker').datetimepicker({
        inline: true,
        format: 'lt',
        sideBySide: true,
        minDate:new Date(),
        icons: {
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
        }
        
    }).on('dp.change', function (e) {
        markEvents();
    });
   markEvents();
   
   $('.navbar-toggler').click(function(){
		$(this).toggleClass('open');
        $(".menu-button").toggleClass('open');
	});
   

});
function markEvents() {
        eventArray = ['02/07/2018','02/14/2018','02/16/2018','02/17/2018','02/22/2018','02/24/2018','02/25/2018','02/28/2018','02/14/2018','02/30/2018'];
        day = jQuery('td');
        jQuery(".datepicker .day").each(function(){
            value = jQuery(this).data("day");
            if (jQuery.inArray(value, eventArray) != '-1') {
               jQuery(this).addClass("event-on");
            }
        });
   }
