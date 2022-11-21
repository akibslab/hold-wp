(function ($) {
	"use strict";

	$(document).ready(function ($) {
		// Header Mobile Menu
		$("header .main-menu-container").meanmenu({
			meanMenuContainer: ".mobile-menu",
			meanScreenWidth: "767",
			meanExpand: ['<i class="fal fa-plus"></i>'],
		});
		$("header .mobile-toggle img").on("click", function () {
			$(".side-menu").addClass("active");
		});

		$(".side-menu .cross-icon-box img").on("click", function () {
			$(".side-menu").removeClass("active");
		});
		// end Mobile Header

		// magnific popup
		$(".video_icon").magnificPopup({
			mainClass: "mfp-fade",
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false,
			type: "iframe",
			src: $(
				'<video controls>\
								 <source src="' +
					$(this).attr("href") +
					'" type="video/webm">\
								 Désolé, votre navigateur ne supporte pas les vidéos.\
							  </video>'
			),
		});
	});
})(jQuery);
