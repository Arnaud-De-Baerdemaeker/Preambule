jQuery(function($){
	init();
	
	function init(){
		Gallery_Slick();
	}

	function Gallery_Slick() {
		$('.instagram-slider__list').slick({
			dots: false,
			arrows: true,
			prevArrow: $(".prev"),
			nextArrow: $(".next"),
			autoplay: true,
			autoplaySpeed: 4500,
			pauseOnHover: false,
			slidesToShow: 2,
			responsive: [
				{
				  	breakpoint: 768,
				  	settings: {
						slidesToShow: 1,
						centerPadding: 24
				  	}
				}
			]
		});

		// On before slide change
		$('.instagram-slider__list').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
			$(".timer, .mask").removeClass("run").addClass("pause");
		});

		// On after slide change
		$('.instagram-slider__list').on('afterChange', function(event, slick, currentSlide) {
			$(".timer, .mask").removeClass("pause").addClass("run");
			$('.timer').remove().clone().appendTo('.next');
			$('.mask').remove().clone().appendTo('.timer');
		});
	}
});