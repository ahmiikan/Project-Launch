(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
	  $('.a').css("width", "100%");
		// $('.a').animate({ width: "1200px" });;
		
  });

	$('.custom-menu').css("z-index", "10");
})(jQuery);
