/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
( function() {
	var isWebkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    isOpera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    isIe     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( isWebkit || isOpera || isIe ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
})();




(function($){
	"use strict";

	$(document).ready(function(){
        /** Dropdown on hover */
        $(".nav-link.dropdown-toggle").hover( function () {
            // Open up the dropdown
            $(this).removeAttr('data-toggle'); // remove the data-toggle attribute so we can click and follow link
            $(this).parent().addClass('show'); // add the class show to the li parent
            $(this).next().addClass('show'); // add the class show to the dropdown div sibling
        }, function () {
            // on mouseout check to see if hovering over the dropdown or the link still
            var isDropdownHovered = $(this).next().filter(":hover").length; // check the dropdown for hover - returns true of false
            var isThisHovered = $(this).filter(":hover").length;  // check the top level item for hover
            if(isDropdownHovered || isThisHovered) {
                // still hovering over the link or the dropdown
            } else {
                // no longer hovering over either - lets remove the 'show' classes
                $(this).attr('data-toggle', 'dropdown'); // put back the data-toggle attr
                $(this).parent().removeClass('show');
                $(this).next().removeClass('show');
            }
        });
        // Check the dropdown on hover
        $(".dropdown-menu").hover( function () {
        }, function() {
            var isDropdownHovered = $(this).prev().filter(":hover").length; // check the dropdown for hover - returns true of false
            var isThisHovered= $(this).filter(":hover").length;  // check the top level item for hover
            if(isDropdownHovered || isThisHovered) {
                // do nothing - hovering over the dropdown of the top level link
            } else {
                // get rid of the classes showing it
                $(this).parent().removeClass('show');
                $(this).removeClass('show');
            }
        });
        
        $('#filter').submit(function(){
            var filter = $('#filter');
            $.ajax({
                url:filter.attr('action'),
                data:filter.serialize(), // form data
                type:filter.attr('method'), // POST
//                beforeSend:function(xhr){
//                    filter.find('button').text('Processing...'); // changing the button label
//                },
//                success:function(data){
//                    filter.find('button').text('Apply filter'); // changing the button label back
//                    $('#response').html(data); // insert data
//                }
               success: function(response) {
                $("#accordion").html(response);
                //return false;
                }
            });
            return false;
        });
        // menu toggle
//        if ($("body").hasClass("logged-in")) {
//            $("#navbarNavDropdown").addClass("d-none").removeClass("navbar-collapse");
//            $(".for-customers").removeClass("d-none").addClass("d-md-flex");
//        }
//        else {
//            $(".for-customers").removeClass("d-md-flex").addClass("d-none");
//            $("#navbarNavDropdown").addClass("d-block navbar-collapse");
//        }
        // scroll down from slider
         $(function() {
            $('.full-width .scroll-down').click (function(e) {
                e.preventDefault;
              $('html, body').animate({scrollTop: $('.entry-header').offset().top }, 'slow');
              return false;
            });
            $('.full-width-hero .scroll-down').click (function(e) {
                e.preventDefault;
              $('html, body').animate({scrollTop: $('#full-width-page-wrapper').offset().top }, 'slow');
              return false;
            });
          });
        
            $('.owl-carousel').owlCarousel({
                loop:true,
                items:3,
                margin:10,
                lazyLoad: true,
                dots: false,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:2,
                        nav:false
                    },
                    1000:{
                        items:3,
                        nav:true,
                        loop:false
                    }
                }
            })

	});
})(jQuery);
