jQuery(function($){
	init();
	
	function init(){
		Gallery_Slick();
		Filters();
		Countries_Dropdown();
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

	function Countries_Dropdown() {
		
		var x, i, j, l, ll, selElmnt, a, b, c;
		/* Look for any elements with the class "custom-select": */
		x = document.getElementById("billing_country_field").getElementsByClassName("woocommerce-input-wrapper");
		console.log(x);
		l = x.length;
		for (i = 0; i < l; i++) {
		selElmnt = x[i].getElementsByTagName("select")[0];
		ll = selElmnt.length;
		/* For each element, create a new DIV that will act as the selected item: */
		a = document.createElement("DIV");
		a.setAttribute("class", "select-selected");
		a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
		x[i].appendChild(a);
		/* For each element, create a new DIV that will contain the option list: */
		b = document.createElement("DIV");
		b.setAttribute("class", "select-items select-hide");
		for (j = 1; j < ll; j++) {
			/* For each option in the original select element,
			create a new DIV that will act as an option item: */
			c = document.createElement("DIV");
			c.innerHTML = selElmnt.options[j].innerHTML;
			c.addEventListener("click", function(e) {
				/* When an item is clicked, update the original select box,
				and the selected item: */
				var y, i, k, s, h, sl, yl;
				s = this.parentNode.parentNode.getElementsByTagName("select")[0];
				sl = s.length;
				h = this.parentNode.previousSibling;
				for (i = 0; i < sl; i++) {
				if (s.options[i].innerHTML == this.innerHTML) {
					s.selectedIndex = i;
					h.innerHTML = this.innerHTML;
					y = this.parentNode.getElementsByClassName("same-as-selected");
					yl = y.length;
					for (k = 0; k < yl; k++) {
					y[k].removeAttribute("class");
					}
					this.setAttribute("class", "same-as-selected");
					break;
				}
				}
				h.click();
			});
			b.appendChild(c);
		}
		x[i].appendChild(b);
		a.addEventListener("click", function(e) {
			/* When the select box is clicked, close any other select boxes,
			and open/close the current select box: */
			e.stopPropagation();
			closeAllSelect(this);
			this.nextSibling.classList.toggle("select-hide");
			this.classList.toggle("select-arrow-active");
		});
		}

		function closeAllSelect(elmnt) {
		/* A function that will close all select boxes in the document,
		except the current select box: */
		var x, y, i, xl, yl, arrNo = [];
		x = document.getElementsByClassName("select-items");
		y = document.getElementsByClassName("select-selected");
		xl = x.length;
		yl = y.length;
		for (i = 0; i < yl; i++) {
			if (elmnt == y[i]) {
			arrNo.push(i)
			} else {
			y[i].classList.remove("select-arrow-active");
			}
		}
		for (i = 0; i < xl; i++) {
			if (arrNo.indexOf(i)) {
			x[i].classList.add("select-hide");
			}
		}
		}

		/* If the user clicks anywhere outside the select box,
		then close all select boxes: */
		document.addEventListener("click", closeAllSelect);
	}
});