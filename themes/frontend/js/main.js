// Gumby is ready to go
//Gumby.ready(function() {
//	console.log('Gumby is ready to go...', Gumby.debug());
//
//	// placeholder polyfil
//	if(Gumby.isOldie || Gumby.$dom.find('html').hasClass('ie9')) {
//		$('input, textarea').placeholder();
//	}
//});
//
//// Oldie document loaded
//Gumby.oldie(function() {
//	console.log("This is an oldie browser...");
//});
//
//// Touch devices loaded
//Gumby.touch(function() {
//	console.log("This is a touch enabled device...");
//});

// Document ready
jQuery(function() {
    jQuery(".navbar ul li a").hover(function() {
        jQuery(this).attr("style","background:#F9CA22");
    }, function() {
       jQuery(this).removeAttr("style");
    });
});

