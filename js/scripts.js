(function ($, root, undefined) {
    
    $(function () {
        
        'use strict';
        
        jQuery(".responsive-title").fitText(1.2, { minFontSize: '25px', maxFontSize: '45px' });
        jQuery(".navbar-toggler, #backdrop").on('click touch', function () {
            jQuery(".navbar-toggler").toggleClass("opened");
            jQuery(".navbar-collapse").toggleClass("show");
            jQuery("#backdrop").toggleClass("show");
        })

        jQuery(window).bind("load resize", function () {
            
            var figure = jQuery("figure");
            var main = jQuery("div#main.col-lg-8");
            var mainwidth = main.width();

            for (var i = 0; i < figure.length; i++) {
                var figchildren = figure[i].childNodes;
                console.log(figchildren);
                    for (var n = 0; n < figchildren.length; n++) {
                        if(figchildren[n].nodeName == 'A') {
                            var image = figchildren[n].firstChild;
                            var imgwidth = image.width;
                        }
                        if(figchildren[n].nodeName == 'IMG') {
                            var imgwidth = figchildren[n].width;
                        }
                        var ratio = mainwidth/imgwidth;
                        if(figchildren[n].nodeName == 'FIGCAPTION' && ratio > 1.3) {
                            var figwidth = mainwidth-imgwidth;
                            figchildren[n].setAttribute("style","position:absolute;bottom:0;right:0;padding:0 1em;text-align:left");
                            figchildren[n].style.width = figwidth + "px";
                        }
                    }
            }

        });
    });
})(jQuery, this);