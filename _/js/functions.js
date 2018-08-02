// Browser detection for when you get desparate. A measure of last resort.
// http://rog.ie/post/9089341529/html5boilerplatejs

// var b = document.documentElement;
// b.setAttribute('data-useragent',  navigator.userAgent);
// b.setAttribute('data-platform', navigator.platform);

// sample CSS: html[data-useragent*='Chrome/13.0'] { ... }


// remap jQuery to $
(function ($) {


	$(document).ready(function(){
		
		$(".slider-slick").slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1
		});

		$(".slider-min-slick").slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 1,
			responsive: [
				{
				breakpoint: 1220,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1,
						infinite: false,
						dots: false
					}
				},
				{
				breakpoint: 520,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						infinite: false,
						dots: false
					}
				}
			]
	
		});

		$('.slider-ticker').slick({
			slidesToShow: 5,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 2000,
			arrows: false,
			responsive: [
				{
				breakpoint: 1220,
					settings: {
						slidesToShow: 4,
						slidesToScroll: 1,
						infinite: false,
						dots: false
					}
				}
			]
		});


		var $menulink = $(".menu-toggle");
		var $menu = $(".menu-m");

		$menulink.click(function(e) {
			e.preventDefault();
			$menulink.toggleClass('active');
			$menu.toggleClass('active');
		});

		$('ul.option-menu li a').click(function(e){
			e.preventDefault();
			var tab_id = $(this).attr('data-section');
	
			$('ul.option-menu li a').removeClass('active');
			$('.tab-content').removeClass('current');
	
			$(this).addClass('active');
			$(this).closest(".wrapper").attr('data-section', tab_id);			
		})


		$('.tab-redes li a').click(function(){
			var tab_id = $(this).attr('data-tab');
	
			$('ul.tabs li').removeClass('active');
			$('.tab-content').removeClass('active');
	
			$(this).addClass('active');
			$("#"+tab_id).addClass('active');
		})
		
	});
}(window.jQuery || window.$));




