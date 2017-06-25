(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
    	jQuery(".responsive-title").fitText(1.2, { minFontSize: '25px', maxFontSize: '45px' });
    	jQuery(".navbar-toggler").on('click touch', function () {
    		jQuery(".navbar-toggler").toggleClass("opened");
    		jQuery(".navbar-collapse").toggleClass("show");
    		jQuery("#backdrop").toggleClass("show");
    	})
		
	});
	
})(jQuery, this);
