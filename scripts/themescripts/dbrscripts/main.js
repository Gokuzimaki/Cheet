/*!
 * Dreambench tech 
 * 
 */
 
var $ = jQuery.noConflict();
$(window).bind('resize', function ($) {
	"use strict";
	// Load Functions
	// Close opened collapsed menu in responsive window resize
	if ( window.innerWidth > 768 ) {
		jQuery('#main-menu').collapse('hide');
	}
});

$(window).load(function () {
	"use strict";
	// Load Functions
});

$(document).ready(function ($) {

	// initialize smoothscroll
	try {
		jQuery.browserSelector();
		// Adds window smooth scroll on chrome.
		if(jQuery("html").hasClass("chrome")) {
			jQuery.smoothScroll();
		}
	} catch(err) {

	}
	
	// initialise superfish
	try {
		var sfMenu = $('#main-menu').superfish({
			//add options here if required
			delay: 200,
			speed: 'fast'
		});

		// buttons to demonstrate Superfish's public methods
		$('.destroy').on('click', function(){
			sfMenu.superfish('destroy');
		});

		$('.init').on('click', function(){
			sfMenu.superfish();
		});

		$('.open').on('click', function(){
			sfMenu.children('li:first').superfish('show');
		});

		$('.close').on('click', function(){
			sfMenu.children('li:first').superfish('hide');
		});
	} catch(err) {
	
	}
	
	/*-------------------------------------------------*/
	/* =  Testimonials OWL Carousel
	/*-------------------------------------------------*/	

	try {
		$(".testimonials-slider").owlCarousel({
			autoplay: true,
			autoplayTimeout: 15000,
			nav:false,
			autoplayHoverPause: false,
			dots: true,
			items : 1,
			singleItem : true,
			autoHeight : true,
			animateOut: 'fadeOutDown',
			animateIn: 'fadeInUp',
			loop: true
		});
	} catch(err) {
	
	}

	/*-------------------------------------------------*/
	/* =  Blog OWL Carousel
	/*-------------------------------------------------*/	

	try {
		$(".blog-carousel-slider").owlCarousel({
			autoplay: true,
			autoplayTimeout: 10000,
			nav:true,
			autoplayHoverPause: false,
			dots: false,
			items : 1,
			singleItem : true,
			autoHeight : false,
			animateOut: 'slideOutLeft',
			// animateIn: 'slideInRight',
			loop: true
		});
	} catch(err) {
	
	}

	/*-------------------------------------------------*/
	/* =  portfolio isotope
	/*-------------------------------------------------*/
	
	var winDow = $(window);
	// Needed variables
	var $container=$('.portfolio-container');
	var $filter=$('.portfolio-filter');

	try{
		$container.imagesLoaded( function(){
			$container.fadeIn(1000).isotope({
				filter:'*',
				layoutMode:'fitRows',
				transitionDuration: '0.8s',
				hiddenStyle: {
					opacity: 0,
					transform: 'scale(0.001)'
				},
				visibleStyle: {
					opacity: 1,
					transform: 'scale(1)'
				}					
			});
		});
	} catch(err) {
	}

	winDow.bind('resize', function(){
		var selector = $filter.find('a.active').attr('data-filter');

		try {
			$container.isotope({ 
				filter	: selector,
				animationOptions: {
					duration: 750,
					easing	: 'linear'
				}
			});
		} catch(err) {
		}
		return false;
	});
	
	// Isotope Filter 
	$filter.find('a').click(function(){
		var selector = $(this).attr('data-filter');

		//try {
			$container.isotope({ 
				filter	: selector,
				animationOptions: {
					duration: 750,
					easing	: 'linear',
					queue	: false,
				}
			});
		//} catch(err) {

		//}
		return false;
	});


	var filterItemA	= $('.portfolio-filter a');
	filterItemA.on('click', function(){
		var $this = $(this);
		if ( !$this.hasClass('active')) {
			filterItemA.removeClass('active');
			$this.addClass('active');
		}
	});

	/*-------------------------------------------------*/
	/* =  Clients  Carousel
	/*-------------------------------------------------*/	

	try {
		var clientslide = $(".clients-container").bxSlider({
			minSlides: 1,
			maxSlides: 3,
			slideWidth: 300,
			slideMargin: 0,
			controls: false,
			pager: false
		});
	} catch(err) {
	
	}

	winDow.bind('resize', function(){

		try {
			clientslide.reloadSlider();
		} catch(err) {
		}
		return false;
	});		
	
	/*-------------------------------------------------*/
	/* =  Image Boxes
	/*-------------------------------------------------*/	

	try {
		$(".images-boxes").owlCarousel({
			autoplay: true,
			autoplayTimeout: 5000,
			nav:true,
			autoplayHoverPause: true,
			dots: false,
			items : 4,
			singleItem : false,
			autoHeight : true,
			loop: true,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				480:{
					items:2,
					nav:true
				},
				800:{
					items:3,
					nav:true,
				},
				1000:{
					items:4,
					nav:true,
				}
			}
		});
	} catch(err) {
	
	}
	
	/* PrettyPhoto Init */
	$("a[data-gal^='prettyPhoto']").prettyPhoto({
		hook: 'data-gal',
		social_tools: false
	});
	
	/*-------------------------------------------------*/
	/* =  Accordions
	/*-------------------------------------------------*/	
	
	var clickElem = $('.accordion-title');

	clickElem.on('click', function(e){
		e.preventDefault();
		
		var $this = $(this),
			parentCheck = $this.parent('.accordion-item'), 
			accordContainer = $this.parent('div').parent('div'),
			accordItems = accordContainer.find('.accordion-item'),
			accordContent = accordContainer.find('.accordion-content');
			
			
		if( !parentCheck.hasClass('active')) {
			// Close active accordions and open current accordion
			accordContent.slideUp(400, function(){
				accordItems.removeClass('active');
			});
			parentCheck.find('.accordion-content').slideDown(400, function(){
				parentCheck.addClass('active');
			});

		} else {
			// Close the open accordion ( User clicked it while it's open )
			accordContent.slideUp(400, function(){
				accordItems.removeClass('active');
			});

		}
	});
	
	jQuery('.accordions-box').not('.faq').each( function() {
		jQuery(this).find('.accordion-content:eq(0)').slideDown(400, function(){});
		jQuery(this).find('.accordion-item:eq(0)').addClass('active');
	});	


	/* ---------------------------------------------------------------------- */
	/*	Tabs
	/* ---------------------------------------------------------------------- */
	
	// Set the default height for each iconned-tab
	var sameHeightTabs = 1; // 0: tab content section height only (shorter tab contents not visible; 1: tab items height; 2: off / dynamic height for each tab

	$('.tab-box').each( function() {
		var largest_height = 200;
		$(this).find('.tab-content-section .tab-item-content').each( function() {
			if ( $(this).outerHeight() > largest_height ) {
				largest_height = $(this).outerHeight();
			}
		});

		if ( sameHeightTabs != 2 ) {
			$(this).find('.tab-content-section').animate(
				{ 'min-height' : largest_height + 60},500);
			if ( sameHeightTabs == 1 ) {
				$(this).find('.tab-content-section .tab-item-content').each( function() {
					$(this).animate({ 'min-height' : largest_height + 30},500);
				});
			}
		}
	});

	$('.tab-nav li a').on('click', function(e){
		var clickTab = $('.tab-nav li');
		e.preventDefault();

		var $this = $(this),
			hisIndex = $this.parent('li').index(),
			tabContainer = $this.parent('li').parent('ul').parent('div'),
			tabCont = tabContainer.find('.tab-content-section'),
			tabContIndex = tabContainer.find(".tab-item-content:eq(" + hisIndex + ")");
			
		if( !$this.parent().hasClass('active')) {
			
			tabContainer.find(clickTab).each( function() { 
				$(this).removeClass('active');
			});
			$this.parent().addClass('active');

			tabCont.find(".tab-item-content").slideUp(1200);
			tabCont.find(".tab-item-content").removeClass('active');
			tabContIndex.delay(500).slideDown(400);
			tabContIndex.addClass('active');
		}
	});

	jQuery('.tab-box').each( function() {
		jQuery(this).find('.tab-item-content:eq(0)').slideDown(400, function(){});
		jQuery(this).find('.tab-item-content:eq(0)').addClass('active');
	});	

	/* Count To */
	// start all the timers
	$('.count-counter').data('countToOptions', {
		formatter: function (value, options) {
			return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
		}
	});

	$('.count-counter').each(count);


	function count(options) {
		var $this = $(this);
		options = $.extend({}, options || {}, $this.data('countToOptions') || {});
		$this.countTo(options);
	}	

	/* Animated Progress Bars */
	jQuery('.progress-bar-item').each( function() {
		var percent = jQuery(this).attr('data-percent');
		jQuery(this).find('.progress-percentage').text(percent + '%');
		jQuery(this).find('.progress-done').width(percent + '%');
		jQuery(this).find('.progress-done_2').width(percent + '%');
	});
	
	/* Google Map */
	function init_map(){
		var myOptions = {
			zoom:16,
			center:new google.maps.LatLng(6.632389, 3.320779),
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			scrollwheel: false,
			disableDefaultUI: true
		};
		map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
		marker = new google.maps.Marker({
			map: map,
			position: new google.maps.LatLng(6.632389, 3.320779)
		});
		infowindow = new google.maps.InfoWindow({
			content:"<b>DreamBench Technologies</b><br/>279b Old Abeokuta Road, <br/> Agege, Lagos State."
		});
		google.maps.event.addListener(marker, "click", function(){
			infowindow.open(map,marker);
		});
		infowindow.open(map,marker);
	}
	
	if ($('#gmap_canvas').length > 0) {
		google.maps.event.addDomListener(window, 'load', init_map);
	}
	
	/*-------------------------------------------------*/
	/* =  OWL Slider
	/*-------------------------------------------------*/	

	try {
		$('.owl-slider-container').imagesLoaded( function(){
			$('.owl-slider').owlCarousel({
				autoplay: false,
				autoplayTimeout: 5000,
				nav:true,
				autoplayHoverPause: false,
				dots: false,
				items : 1,
				singleItem : true,
				autoHeight : true,
				animateOut: 'fadeOut',
				animateIn: 'fadeIn',
				loop: true
			});
		});
	} catch(err) {
	
	}
	
	/*-------------------------------------------------*/
	/* =  Related Posts
	/*-------------------------------------------------*/	

	try {
		$(".related-posts-slider.tmq-3-cols").owlCarousel({
			autoplay: false,
			autoplayTimeout: 5000,
			nav:false,
			autoplayHoverPause: true,
			dots: false,
			items : 3,
			margin: 10,
			singleItem : false,
			autoHeight : true,
			loop: true,
			responsive:{
				0:{
					items:1,
					nav:false
				},
				480:{
					items:2,
					nav:false
				},
				1000:{
					items:3,
					nav:false,
				}
			}
		});
		
		$(".related-posts-slider.tmq-4-cols").owlCarousel({
			autoplay: false,
			autoplayTimeout: 5000,
			nav:false,
			autoplayHoverPause: true,
			dots: false,
			items : 4,
			margin: 10,
			singleItem : false,
			autoHeight : true,
			loop: true,
			responsive:{
				0:{
					items:1,
					nav:false
				},
				480:{
					items:2,
					nav:false
				},
				1000:{
					items:4,
					nav:false,
				}
			}
		});
	} catch(err) {
	
	}

	$('.related-post-item').hover(
		/*function() {
			$(this).find('.related-post-content p').animate({
				opacity: 'show' , 
				height: 'show', 
				margin: 'show', 
				padding: 'show'}, 500);
		}, function() {
			$(this).find('.related-post-content p').animate({
				opacity: 'hide' , 
				height: 'hide', 
				margin: 'hide', 
				padding: 'hide'}, 500);
		}*/
	);	
	
	/*-------------------------------------------------*/
	/* =  Bootstrap Tooltip
	/*-------------------------------------------------*/
	$(document).ready(function(){
		$('[data-toggle="portfolio-tooltip"]').tooltip({
			placement: 'bottom', 
			container: '.portfolio-text-banner'}); 
	});
		
	
	/*-------------------------------------------------*/
	/* =  Scroll to TOP
	/*-------------------------------------------------*/

	var animateTopButton = $('.go-top'),
		htmBody = $('html, body');	
		animateTopButton.click(function(){
		htmBody.animate({scrollTop: 0}, 'slow');
		return false;
	});	
		
	
});
// begin mind-rape section of the code
// aka, "I WROTE THIS"
if(typeof(WOW)=="function"){
	wow = new WOW()
	wow.init();
}
var windowwidth=$(window).width();
var windowheight=$(window).height();
windowwidth=$(window).width();
windowheight=Math.floor(windowheight)-45;

/*js based responsive behaoviour*/
if(windowwidth<=767){
	// this section handles the related post coverimage in the related post
	// slider on the home page
	var relpcontainer=$('.related-post-container._blog');
	relpcontainer.each(function(){
		var thumb=relpcontainer.attr("data-thumb");
		relpcontainer.css("background-image",'url(\''+thumb+'\')');
		
	});

}
if(windowwidth>767 && windowwidth<=1023){


}
if(windowwidth>768 && windowwidth<=902){

}
if(windowwidth>=903 && windowwidth<=1023){
	
}
if(windowwidth>1023){

}
$(document).ready(function(){

	$(document).on("click","a[data-mapdata=true]",function(){
		// console.log(this);
		// var formname='div[name='+this.name+']';

		// var displaytype=$(this).attr("name");
		var type=$(this).attr("data-type");
		// the selector for the element to receive data if any
		var target=$(this).attr("data-targetel");
		var targetel=$(''+target+'');

		if(typeof targetel =="undefined"||targetel===null||targetel===undefined||targetel===NaN){
		    targetel=$('body').find('div[data-name='+type+'_target]');
		}
		var datamap=$(this).find('input[name=datamap]').val();
        var load_img=$('<div class="loadergauze"><img src="'+host_addr+'images/loading.gif" class="loadermini"/></div>');


		if(typeof datamap =="undefined"||datamap===null||datamap===undefined||datamap===NaN){
		    datamap="";
		}
		if(datamap!==""){
			var cursmap=JSON.parse(datamap.replace(/'{1,}/g,'"'));
			// console.log(cursmap,targetel,load_img);
			var curloader=$(''+target+'').find('.loadergauze');
			if(curloader.length>0){
				curloader.removeClass('hidden');
			}else{
				$(load_img).appendTo(targetel);
			}

			if(type=="portmedia"){
				var ulparent=$(this).parent().parent();
				// remove active class from all hyperlink elements and 
				// make the corresponding icon visible
				var isActive=$(this).hasClass('active');
				ulparent.find('a[data-mapdata=true]').removeClass('active');
				ulparent.find('.video-play').removeClass('hidden');

				console.log("Active:",isActive);
				// produce the portfolio media display data here
				if(!isActive){
					if(cursmap.disptype=="local"||cursmap.portvtype=="local"||cursmap.portatype=="local"){
						if(typeof cursmap.portvwebm!=="undefined"){
							// video data
							// create the video element
							var videl=$('<video></video>');
							var titleel=$('<h4></h4>');
							videl.attr('preload','metadata');
							videl.attr('controls','');
							if(cursmap.caption!==""){
								titleel.html(cursmap.caption);

							}
							var sourcetotal="";
							if(cursmap.portvwebm.location!==""){
								sourcetotal+='<source src="'+cursmap.portvwebm.location+'" type="video/webm">';
							}
							if(cursmap.portvflv.location!==""){
								sourcetotal+='<source src="'+cursmap.portvflv.location+'" type="video/flv">';

							}
							/*if(cursmap.portvmp4.location!==""){
								sourcetotal+='<source src="'+cursmap.portvmp4.location+'" type="video/mp4">';

							}*/
							if(cursmap.portv3gp.location!==""){
								sourcetotal+='<source src="'+cursmap.portv3gp.location+'" type="video/3gp">';

							}

							videl.html(sourcetotal);

							targetel.html("");
							$(titleel).appendTo(targetel);
							$(videl).appendTo(targetel);
						}else if(typeof cursmap.portacaption!=="undefined"){
							// audio data
							// create the video element
							var audioel=$('<audio></audio>');
							var titleel=$('<h4></h4>');
							audioel.attr('preload','metadata');
							audioel.attr('controls','');
							audioel.attr('class','huespin');
							var sourcetotal="";
							if(cursmap.location!==""){
								sourcetotal+='<source src="'+cursmap.location+'" type="audio/mp3">';

							}
							if(cursmap.portacaption!==""){
								titleel.html(cursmap.portacaption);

							}
							audioel.html(sourcetotal);
							targetel.html("");
							$(titleel).appendTo(targetel);
							
							$(audioel).appendTo(targetel);


						}
					}else if(cursmap.disptype=="embed"||cursmap.portvtype=="embed"||cursmap.portatype=="embed"){
						if(typeof cursmap.portvembed!=="undefined"){
							// video data
							targetel.html(cursmap.portvembed);
						}else if(typeof cursmap.portaembed!=="undefined"){
							// audio data
							targetel.html(cursmap.portaembed);
						}
					}
				}
				$(this).addClass('active');
				$(this).find('.video-play').addClass('hidden');
			}
		}
	
		targetel.find('.loadergauze').addClass('hidden');

	     

	    // console.log("In here");
	})


	$('#slider').removeClass('_hideload');
	var curX=Math.floor(window.scrollX);
	var curY=parseInt(window.scrollY);
	// check for split points
	var splitpoints=$('div.split-point-bottom, div.split-point-top, div.split-indent-top,div.split-indent-bottom');
	
	if(typeof splitpoints =="undefined"||splitpoints===null||splitpoints===undefined||splitpoints===NaN){
        splitpoints=0;
    }else{
    	splitpoints=splitpoints.length;
    }
    // console.log("splitpointstot: ",splitpoints);
	if(parseInt(splitpoints)>0){
		sortThroughSplitPoints();
	}
	if(curY>540){
		if(!$('header div.navbar').hasClass('fixed-nav')){
			$('header div.navbar').addClass('fixed-nav');
		}
	}else{
		if($('header div.navbar').hasClass('fixed-nav')){
			$('header div.navbar').removeClass('fixed-nav');
		}
	};
	// control the nav bar from fixed to relative positioning to allow viewing even 
	// after scrolling 
	$(window).scroll(function(){
		// console.log("it hit",this.scrollX,this.scrollY);
		var curX=Math.floor(this.scrollX);
		var curY=parseInt(this.scrollY);
		// adjust the nav bar to be  fixed when the slider is out of view
		if(curY>450){
			if(!$('header div.navbar').hasClass('fixed-nav')){
				$('header div.navbar').hide().addClass('fixed-nav').fadeIn(500);
			}
		}else{
			if($('header div.navbar').hasClass('fixed-nav')){
				$('header div.navbar').removeClass('fixed-nav');
			}
		};
	})
})

$(window).resize(function(){
	windowwidth=$(window).width();
	var windowheight=$(window).height();
	// check for split points
	var splitpoints=$('div.split-point-bottom, div.split-point-top, div.split-indent-top,div.split-indent-bottom');
	
	if(typeof splitpoints =="undefined"||splitpoints===null||splitpoints===undefined||splitpoints===NaN){
        splitpoints=0;
    }else{
    	splitpoints=splitpoints.length;
    }
    // console.log("splitpointstot: ",splitpoints);
	if(parseInt(splitpoints)>0){
		sortThroughSplitPoints();
	}
	if(windowwidth<=767){
	  var windowheight=$(window).height();

	}
	if(windowwidth>767){
		// this section handles the related post coverimage in the related post
		// slider on the home page
		var relpcontainer=$('.related-post-container._blog');
		relpcontainer.each(function(){
			var med=relpcontainer.attr("data-med");
			relpcontainer.css("background-image",'url(\''+med+'\')');
		});

	}

	if(windowwidth>767 && windowwidth<=1023){

	}

	if(windowwidth>768 && windowwidth<=902){

	}

	if(windowwidth>=903 && windowwidth<=1023){

	}

	if(windowwidth>1023){

	}
})



