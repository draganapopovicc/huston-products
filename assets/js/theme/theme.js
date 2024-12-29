jQuery(document).ready(function ($) {
	const $stickyElement = $(".header-main");

  // Get the initial offset position of the element
  let headerHeight = $stickyElement.outerHeight();

  $(window).on("scroll", function () {
    if ($(window).scrollTop() >= headerHeight) {
      headerHeight = $stickyElement.outerHeight();
      $stickyElement.addClass("sticky-header");
    } else {
      headerHeight = $stickyElement.outerHeight();
      $stickyElement.removeClass("sticky-header");
    }
  });

	// Mobile navigation
	$(".menu-toggle").click(function () {
		$(".main-navigation_wrap").fadeToggle();
		$(this).toggleClass("menu-open");

		$(this).hasClass("menu-open")
			? $("body").css("overflow", "hidden")
			: $("body").css("overflow", "auto");

		//Close search when  menu is open
		if ($(window).width() < 1199.6) {
			// Code to execute when window width is less than 1000px
			$(".header__search-form--mobile").slideUp();
			$(".header__search-icons--mobile").removeClass("show-search-form");
		}
	});

	// Sub Menu Trigger
	$(".sub-menu-trigger").click(function () {
		$(this).parent().toggleClass("sub-menu-open");
		$(this).siblings(".sub-menu").slideToggle();
	});

	// Sub Menu Trigger
	$(".footer__box-title-svg").click(function () {
		$(this).toggleClass("active");
		$(this).closest(".footer__box").find(".menu").slideToggle();
	});

	// Accordion
	$(".st_accordion-header").click(function () {
		$(this).siblings(".st_accordion-body").slideToggle();
		$(this).parent(".st_accordion-item ").toggleClass("open");
	});

	// Technical Details
	$(".st-details__toggle-title").click(function () {
		$(this).closest(".st-details__wrap").toggleClass("active");
		$(this)
			.closest(".st-details__wrap")
			.find(".st-details__body")
			.slideToggle(900);
	});

	// Search Toggle
	$(".header__search-icons").click(function () {
		if ($(window).width() < 1199.6) {
			$(".header__search-form--mobile").slideToggle();
			$(".header__search-icons--mobile").toggleClass("show-search-form");

			//Close menu when  search is open
			$(".main-navigation_wrap").fadeOut();
			$(".menu-toggle").removeClass("menu-open");
			$(".menu-toggle").prop("checked", false);
		} else {
			$(".header__search-form--desktop").slideToggle();
			$(".header__search-icons--desktop").toggleClass("show-search-form");
		}

		$("input#s").focus();
	});

	//Logos
	function handleLogoCloning() {
		if ($(window).width() <= 834.5) {
			if (!$(".st-customers__logos-wrap").hasClass("cloned")) {
				let copy = $(".st-customers__logos").clone();
				$(".st-customers__logos-wrap").append(copy);
				$(".st-customers__logos-wrap").addClass("cloned");
			}
		} else {
			if ($(".st-customers__logos-wrap").hasClass("cloned")) {
				$(".st-customers__logos-wrap")
					.find(".st-customers__logos")
					.last()
					.remove();
				$(".st-customers__logos-wrap").removeClass("cloned");
			}
		}
	}

	handleLogoCloning();

	$(window).resize(function () {
		handleLogoCloning();
	});
});
