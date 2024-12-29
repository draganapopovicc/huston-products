jQuery(document).ready(function ($) {
	$(".st-single-product__gallery").flickity({
		prevNextButtons: false,
		contain: true,
		pauseAutoPlayOnHover: false,
		wrapAround: true,
		pageDots: true,
		cellAlign: "left",
		autoPlay: 5000
	});
});
