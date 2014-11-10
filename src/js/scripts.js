$(function(){
	$('a').smoothScroll();
	$('.flexslider').flexslider({
    	animation: 'slide',
    	selector: '.slides > section',
    	slideshow: false
  	});
  	var clearNav = function(){
  		$('#nav').removeClass('shown');
  		$('#overlay').removeClass('full');
  		$('#nav-button').removeClass('close');
  	};
  	$('#nav-button').on('click', function(){
  		$(this).toggleClass('close');
  		$('#nav').toggleClass('shown');
		$('#overlay').toggleClass('full');
  	});
  	$('#nav a').on('click', function(){
  		if ($(window).width() <= 620){
  			clearNav();
  		}
  	});
  	$('#overlay').on('click', function(){
  		if ($(this).hasClass('full')) {
	  		clearNav();
	  	}
	});
  window.viewportUnitsBuggyfill.init();
});