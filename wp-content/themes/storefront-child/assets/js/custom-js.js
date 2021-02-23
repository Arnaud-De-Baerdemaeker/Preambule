jQuery(function($){
	init();
	
	function init(){
		Gallery_Slick();
		Filters();

	}

	

	function Filters(){
        		var tax_query = [];  
				var current_filters = [];

				

                $(document).on('click touchstart', '.filter-list_item', function(e) {

                    if ( ( $(e.target).is('label[for]') && $('input#' + $(e.target).attr('for')).length ) ||  $(e.target).hasClass('checkmark')) {
                        // This will trigger a new click so we are out of here --> Called twice error
                        return;
                    }

					

                    // else do your thing here, it will not get called twice
                    $('.filter-list_item').removeClass('active');
                    $(this).addClass('active');

                    var filter_slug = $(this).data('slug');
                    var filter_type = $(this).data('for');
                
					var current_filter_arr = [];
					current_filter_arr.push(filter_slug);
					var single_tax = [
						{
							"taxonomy": filter_type,
							"field": "slug",
							"terms": current_filter_arr
						}
					];

					function checkPresence(){
						for (let [index, item] of Object.entries(tax_query)) {
							if(index > 0){
								// console.log(item[0].taxonomy);
								// console.log(single_tax[0].taxonomy);
								if(item[0].taxonomy === single_tax[0].taxonomy){
									// existe déjà
									console.log("existing");
									item[0].terms.push(filter_slug);
									return true; 
								}
							}
						}
					}

					if(tax_query.length === 0){
						//empty
						console.log("start with empty filter");
						tax_query = [
							{'relation': 'OR'}
						];  
						tax_query.push(single_tax);
					}else{

						// plusieurs entrées
						if(checkPresence()){
							// Taxonomy filter is existing
						}else{
							// add new taxonomy filter
							console.log("add new taxonomy filter");
							tax_query.push(single_tax);
						}
	
						
					}
					
					console.log(tax_query);


                    $('.result-tiles').fadeOut('fast');
					
                    $.ajax({
                        type: 'POST',
                        url: '../wp-admin/admin-ajax.php',
                        dataType: 'html',
                        data: {
                            action: 'filters',
                            filter: tax_query,
                        },
                        success: function(res) {
                                $('.result-tiles').html(res);
                                $('.result-tiles').fadeIn('fast');
                        },
                    });
                });
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