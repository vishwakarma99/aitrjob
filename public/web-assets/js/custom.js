/**

Core script to handle the entire theme and core functions

**/

var JobBoard = function(){

	/* Search Bar ============ */

	siteUrl = '';

	

	var screenWidth = $( window ).width();

	

	var homeSearch = function() {

		'use strict';

		/* top search in header on click function */

		var quikSearch = jQuery("#quik-search-btn");

		var quikSearchRemove = jQuery("#quik-search-remove");

		

		quikSearch.on('click',function() {

			jQuery('.dez-quik-search').animate({'width': '100%' });

			jQuery('.dez-quik-search').delay(500).css({'left': '0'  });

		});

		

		quikSearchRemove.on('click',function() {

			jQuery('.dez-quik-search').animate({'width': '0%' ,  'right': '0'  });

			jQuery('.dez-quik-search').css({'left': 'auto'  });

		});	

		/* top search in header on click function End*/

	}

	

	var cartButton = function(){

		$(".item-close").on('click',function(){

			$(this).closest(".cart-item").hide('500');

		});

		$('.cart-btn').unbind().on('click',function(){

			$(".cart-list").slideToggle('slow');

		})

		

	}  

	

	/* One Page Layout ============ */

	var onePageLayout = function() {

		'use strict';

		var headerHeight =   parseInt($('.onepage').css('height'), 10);

		$(".scroll").unbind().on('click',function(event) 

		{

			event.preventDefault();

			

			if (this.hash !== "") {

				var hash = this.hash;	

				var seactionPosition = $(hash).offset().top;

				var headerHeight =   parseInt($('.onepage').css('height'), 10);

				

				

				$('body').scrollspy({target: ".navbar", offset: headerHeight+2}); 

				

				var scrollTopPosition = seactionPosition - (headerHeight);

				

				$('html, body').animate({

					scrollTop: scrollTopPosition

				}, 800, function(){

					

				});

			}   

		});

		if(jQuery(".scroll-bar").length > 0){

			$(".scroll-bar").unbind().on('click',function(event)

			{

				event.preventDefault();

				

				if (this.hash !== "") {

					var hash = this.hash;	

					var seactionPosition = $(hash).offset().top;

					var headerHeight =   parseInt($('.onepage').css('height'), 10);

					

					

					$('body').scrollspy({target: ".navbar", offset: headerHeight+2}); 

					

					var scrollTopPosition = seactionPosition - (headerHeight) + 500;

					

					$('html, body').animate({

						scrollTop: scrollTopPosition

					}, 800, function(){

						

					});

				}   

			});

		}

		$('body').scrollspy({target: ".navbar", offset: headerHeight + 2});  

	}

	

	/* Header Height ============ */

	var handleResizeElement = function(){

		$('.header').css('height','');

		var headerHeight = $('.header').height();

		$('.header').css('height', headerHeight);

	}

	

	/* Load File ============ */

	var dzTheme = function(){

		 'use strict';

		 var loadingImage = '<img src="images/loading.gif">';

		 jQuery('.dzload').each(function(){

		 var dzsrc =   siteUrl + $(this).attr('dzsrc');

		  //jQuery(this).html(loadingImage);

		 	jQuery(this).hide(function(){

				jQuery(this).load(dzsrc, function(){

					jQuery(this).fadeIn('slow');

				}); 

			})

			

		 });

		 //alert(screenWidth);

		 if(screenWidth < 991)

		{

			if($('.mo-left .header-nav').children('div').length == 0){

				var logoData = jQuery('<div>').append($('.mo-left .logo-header').clone()).html();

				jQuery('.mo-left .header-nav').prepend(logoData);

				jQuery('.mo-left .header-nav .logo-header > a > img').attr('src','images/logo.png');

				jQuery('.mo-left.lw .header-nav .logo-header > a > img').attr('src','images/logo-white.png');

			}

		}else{

			jQuery('.mo-left .header-nav div').remove();

			jQuery('.mo-left.lw .header-nav div').remove();

		}

				

		if(screenWidth <= 991 ){

			jQuery('.navbar-nav > li > a, .sub-menu > li > a').unbind().on('click', function(e){

				//e.preventDefault();

				if(jQuery(this).parent().hasClass('open'))

				{

					jQuery(this).parent().removeClass('open');

				}

				else{

					jQuery(this).parent().parent().find('li').removeClass('open');

					jQuery(this).parent().addClass('open');

				}

			});

		}

	}

	

	/* Magnific Popup ============ */

	var MagnificPopup = function(){

		'use strict';	

		/* magnificPopup function */

		jQuery('.mfp-gallery').magnificPopup({

			delegate: '.mfp-link',

			type: 'image',

			tLoading: 'Loading image #%curr%...',

			mainClass: 'mfp-img-mobile',

			gallery: {

				enabled: true,

				navigateByImgClick: true,

				preload: [0,1] // Will preload 0 - before current, and 1 after the current image

			},

			image: {

				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',

				titleSrc: function(item) {

					return item.el.attr('title') + '<small></small>';

				}

			}

		});

		/* magnificPopup function end */

		

		/* magnificPopup for paly video function */		

		jQuery('.video').magnificPopup({

			type: 'iframe',

			iframe: {

				markup: '<div class="mfp-iframe-scaler">'+

						 '<div class="mfp-close"></div>'+

						 '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+

						 '<div class="mfp-title">Some caption</div>'+

						 '</div>'

			},

			callbacks: {

				markupParse: function(template, values, item) {

					values.title = item.el.attr('title');

				}

			}

		});

		/* magnificPopup for paly video function end*/

		$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({

			disableOn: 700,

			type: 'iframe',

			mainClass: 'mfp-fade',

			removalDelay: 160,

			preloader: false,



			fixedContentPos: false

		});

	}

	

	

	/* Scroll To Top ============ */

	var scrollTop = function (){

		'use strict';

		var scrollTop = jQuery("button.scroltop");

		/* page scroll top on click function */	

		scrollTop.on('click',function() {

			jQuery("html, body").animate({

				scrollTop: 0

			}, 1000);

			return false;

		})



		jQuery(window).bind("scroll", function() {

			var scroll = jQuery(window).scrollTop();

			if (scroll > 900) {

				jQuery("button.scroltop").fadeIn(1000);

			} else {

				jQuery("button.scroltop").fadeOut(1000);

			}

		});

		/* page scroll top on click function end*/

	}

	

	/* handle Accordian ============ */

	var handleAccordian = function(){

		/* accodin open close icon change */	 	

		jQuery('#accordion').on('hidden.bs.collapse', function(e){

			jQuery(e.target)

				.prev('.panel-heading')

				.find("i.indicator")

				.toggleClass('glyphicon-minus glyphicon-plus');

		});

		jQuery('#accordion').on('shown.bs.collapse', function(e){

			jQuery(e.target)

				.prev('.panel-heading')

				.find("i.indicator")

				.toggleClass('glyphicon-minus glyphicon-plus');

		});

		/* accodin open close icon change end */

	}

	

	/* handle Placeholder ============ */

	var handlePlaceholder = function(){

		/* input placeholder for ie9 & ie8 & ie7 */

		jQuery.support.placeholder = ('placeholder' in document.createElement('input'));

		/* input placeholder for ie9 & ie8 & ie7 end*/

		

		/*fix for IE7 and IE8  */

		if (!jQuery.support.placeholder) {

			jQuery("[placeholder]").focus(function () {

				if (jQuery(this).val() == jQuery(this).attr("placeholder")) jQuery(this).val("");

			}).blur(function () {

				if (jQuery(this).val() == "") jQuery(this).val(jQuery(this).attr("placeholder"));

			}).blur();



			jQuery("[placeholder]").parents("form").submit(function () {

				jQuery(this).find('[placeholder]').each(function() {

					if (jQuery(this).val() == jQuery(this).attr("placeholder")) {

						 jQuery(this).val("");

					}

				});

			});

		}

		/*fix for IE7 and IE8 end */

	}

	

	/* Equal Height ============ */

	var equalHeight = function(container) {

		

		if(jQuery(container).length == 0)

		{

			return false

		}

			

		var currentTallest = 0, 

			currentRowStart = 0, 

			rowDivs = new Array(), 

			$el, topPosition = 0;

			

		$(container).each(function() {

			$el = $(this);

			$($el).height('auto')

			topPostion = $el.position().top;



			if (currentRowStart != topPostion) {

				for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {

					rowDivs[currentDiv].height(currentTallest);

				}

				rowDivs.length = 0; // empty the array

				currentRowStart = topPostion;

				currentTallest = $el.height();

				rowDivs.push($el);

			} else {

				rowDivs.push($el);

				currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);

			}

			for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {

				rowDivs[currentDiv].height(currentTallest);

			}

		});

		

		

		/*

		

		var currentTallest = 0, 

			currentRowStart = 0, 

			rowDivs = new Array(), 

			$el, topPosition = 0;

			

		$(container).each(function() {

			$el = $(this);

			$($el).height('auto')

			topPostion = $el.position().top;



			if (currentRowStart != topPostion) {

				for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {

					rowDivs[currentDiv].height(currentTallest);

				}

				rowDivs.length = 0; // empty the array

				currentRowStart = topPostion;

				currentTallest = $el.height();

				rowDivs.push($el);

			} else {

				rowDivs.push($el);

				currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);

			}

			for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {

				rowDivs[currentDiv].height(currentTallest);

			}

		});

		

		*/

	}

	

	/* Footer Align ============ */

	var footerAlign = function() {

		'use strict';

		jQuery('.site-footer').css('display', 'block');

		jQuery('.site-footer').css('height', 'auto');

		var footerHeight = jQuery('.site-footer').outerHeight();

		jQuery('.footer-fixed > .page-wraper').css('padding-bottom', footerHeight);

		jQuery('.site-footer').css('height', footerHeight);

	}

	

	/* File Input ============ */

	var fileInput = function(){

		'use strict';

		/* Input type file jQuery */	 	 

		jQuery(document).on('change', '.btn-file :file', function() {

			var input = jQuery(this);

			var	numFiles = input.get(0).files ? input.get(0).files.length : 1;

			var	label = input.val().replace(/\\/g, '/').replace(/.*\//, '');

			input.trigger('fileselect', [numFiles, label]);

		});

		

		jQuery('.btn-file :file').on('fileselect', function(event, numFiles, label) {

			input = jQuery(this).parents('.input-group').find(':text');

			var log = numFiles > 10 ? numFiles + ' files selected' : label;

		

			if (input.length) {

				input.val(log);

			} else {

				if (log) alert(log);

			}

		});

		/* Input type file jQuery end*/

	}

	

	/* Header Fixed ============ */

	var headerFix = function(){

		'use strict';

		/* Main navigation fixed on top  when scroll down function custom */		

		jQuery(window).on('scroll', function () {

			if(jQuery('.sticky-header').length > 0){

				var menu = jQuery('.sticky-header');

				if ($(window).scrollTop() > menu.offset().top) {

					menu.addClass('is-fixed');

					$('.header-style-5 .container > .logo-header .logo').attr('src','images/logo.png');

				} else {

					menu.removeClass('is-fixed');

					$('.header-style-5 .container > .logo-header .logo').attr('src','images/logo-white-2.png')

				}

			}

		});

		/* Main navigation fixed on top  when scroll down function custom end*/

	}

	

	/* Masonry Box ============ */

	var masonryBox = function(){

		'use strict';

		/* masonry by  = bootstrap-select.min.js */

		if(jQuery('#masonry, .masonry').length)

		{

			var self = $("#masonry, .masonry");

			if(jQuery('.card-container').length)

		    {

				self.imagesLoaded(function () {

					self.masonry({

						gutterWidth: 15,

						isAnimated: true,

						itemSelector: ".card-container"

					});

				});

			}

		}

		if(jQuery('.filters').length)

		{

			jQuery(".filters").on('click','li',function(e) {

				e.preventDefault();

				var filter = $(this).attr("data-filter");

				self.masonryFilter({

					filter: function () {

						if (!filter) return true;

						//return $(this).attr("data-filter") == filter;

						return $(this).hasClass(filter);

					}

				});

			});

		}

		/* masonry by  = bootstrap-select.min.js end */

	}

	

	

		

	/* Set Div Height ============ */

	var setDivHeight = function(){	

		'use strict';

		var allHeights = [];

		jQuery('.dzseth > div, .dzseth .img-cover, .dzseth .seth').each(function(e){

			allHeights.push(jQuery(this).height());

		})



		jQuery('.dzseth > div, .dzseth .img-cover, .dzseth .seth').each(function(e){

			var maxHeight = Math.max.apply(Math,allHeights);

			jQuery(this).css('height',maxHeight);

		})

		

		allHeights = [];

		/* Removice */

		//var screenWidth = $( window ).width();

		if(screenWidth < 991)

		{

			jQuery('.dzseth > div, .dzseth .img-cover, .dzseth .seth').each(function(e){

				jQuery(this).css('height','');

			})

		}	

	}

	

	/* Counter Number ============ */

	var counter = function(){

		 if(jQuery('.counter').length)

		{

			jQuery('.counter').counterUp({

				delay: 10,

				time: 3000

			});	

		} 

	}

	

	/* Video Popup ============ */

	var handleVideo = function(){

		/* Video responsive function */	

		jQuery('iframe[src*="youtube.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');

		jQuery('iframe[src*="vimeo.com"]').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');	

		/* Video responsive function end */

	}

	

	/* Gallery Filter ============ */

	var handleFilterMasonary = function(){

		/* gallery filter activation = jquery.mixitup.min.js */ 

		if (jQuery('#image-gallery-mix').length) {

			jQuery('.gallery-filter').find('li').each(function () {

				$(this).addClass('filter');

			});

			jQuery('#image-gallery-mix').mixItUp();

		};

		if(jQuery('.gallery-filter.masonary').length){

			jQuery('.gallery-filter.masonary').on('click','span', function(){

				var selector = $(this).parent().attr('data-filter');

				jQuery('.gallery-filter.masonary span').parent().removeClass('active');

				jQuery(this).parent().addClass('active');

				jQuery('#image-gallery-isotope').isotope({ filter: selector });

				return false;

			});

		}

		/* gallery filter activation = jquery.mixitup.min.js */

	}

	

	/* handle Bootstrap Select ============ */

	var handleBootstrapSelect = function(){

		/* Bootstrap Select box function by  = bootstrap-select.min.js */ 

		if (jQuery('select').length) {

		    jQuery('select').selectpicker();

		}

		/* Bootstrap Select box function by  = bootstrap-select.min.js end*/

	}

	

	/* handle Bootstrap Touch Spin ============ */

	var handleBootstrapTouchSpin = function(){

		jQuery("input[name='demo_vertical2']").TouchSpin({

		  verticalbuttons: true,

		  verticalupclass: 'ti-plus',

		  verticaldownclass: 'ti-minus'

		});

		

	}

	/* Resizebanner ============ */

	var handleBannerResize = function(){

		$(".full-height").css("height", $(window).height());

	}

	

	/* Countdown ============ */

	var handleCountDown = function(WebsiteLaunchDate){

		/* Time Countr Down Js */

		if($(".countdown").length)

		{

			$('.countdown').countdown({date: WebsiteLaunchDate+' 23:5'}, function() {

				$('.countdown').text('we are live');

			});

		}

		/* Time Countr Down Js End */

	}

	

	/* Content Scroll ============ */

	var handleCustomScroll = function(){

		/* all available option parameters with their default values */

		if($(".content-scroll").length > 0)

		{ 

			$(".content-scroll").mCustomScrollbar({

				setWidth:false,

				setHeight:false,

				axis:"y"

			});	

		}

	}

	

	/* WOW ANIMATION ============ */

	var wow_animation = function(){

		if($('.wow').length > 0)

		{

			var wow = new WOW(

			{

			  boxClass:     'wow',      // animated element css class (default is wow)

			  animateClass: 'animated', // animation css class (default is animated)

			  offset:       50,          // distance to the element when triggering the animation (default is 0)

			  mobile:       false       // trigger animations on mobile devices (true is default)

			});

			wow.init();	

		}	

	}

	

	/* Left Menu ============ */

	var handleSideBarMenu = function(){

		$('.openbtn').on('click',function(e){

			e.preventDefault();

			if($('#mySidenav').length > 0)

			{

				document.getElementById("mySidenav").style.left = "0";

			}



			if($('#mySidenav1').length > 0)

			{

				document.getElementById("mySidenav1").style.right = "0";

			}

			

		})

		

		$('.closebtn').on('click',function(e){

			e.preventDefault();

			if($('#mySidenav').length > 0)

			{

				document.getElementById("mySidenav").style.left = "-300px";

			}

			

			if($('#mySidenav1').length > 0)

			{

				document.getElementById("mySidenav1").style.right = "-820px";

			}

		})

	}

	

	/* Left Menu ============ */

	var handleMenuPosition = function(){

		$(".header-nav li").unbind().each(function (e) {

			if ($('ul', this).length) {

				var elm = $('ul:first', this);

				var off = elm.offset();

				var l = off.left;

				var w = elm.width();

				var docH = $("body").height();

				var docW = $("body").width();



				var isEntirelyVisible = (l + w <= docW);



				if (!isEntirelyVisible) {

					$(this).find('.sub-menu:first').addClass('left');

				} else {

					$(this).find('.sub-menu:first').removeClass('left');

				}

			}

		});

	}	

	

	/* Range ============ */

	var priceslider = function(){



		if($(".price-slide, .price-slide-2").length > 0 ) {

			$("#slider-range,#slider-range-2").slider({

				range: true,

				min: 300,

				max: 4000,

				values: [0, 5000],

				slide: function(event, ui) {

					var min = ui.values[0],

						max = ui.values[1];

					  $('#' + this.id).prev().val("$" + min + " - $" + max);

				}

			});

		}

	}

	

	/* BGEFFECT ============ */

	var handleBGElements = function(){

		

		if(screenWidth > 1023)

		{

			if(jQuery('.bgeffect').length)

			{

				var s = skrollr.init({

					edgeStrategy: 'set',

					easing: {

						WTF: Math.random,

						inverted: function(p) {

							return 1-p;

						}

					}

				});			

			}		

		}

	}

	

	var boxHover = function(){

	

		jQuery('.box-hover').on('mouseenter',function(){

			jQuery('.box-hover').removeClass('active');

			jQuery(this).addClass('active');

			

		})

	}

	

	var reposition = function (){

		'use strict';

		var modal = jQuery(this),

		dialog = modal.find('.modal-dialog');

		modal.css('display', 'block');

		

		/* Dividing by two centers the modal exactly, but dividing by three 

		 or four works better for larger screens.  */

		dialog.css("margin-top", Math.max(0, (jQuery(window).height() - dialog.height()) / 2));

	}

	

	var handleResize = function (){

		

		/* Reposition when the window is resized */

		jQuery(window).on('resize', function() {

			jQuery('.modal:visible').each(reposition);

			equalHeight('.equal-wraper .equal-col');

			footerAlign();

		});

	}

	

	var handlePlaceholderAnimation = function()

	{

		if(jQuery('.dezPlaceAni').length)

		{

		

			$('input, textarea').focus(function(){

			  $(this).parents('.form-group').addClass('focused');

			});

			

			$('input, textarea').blur(function(){

			  var inputValue = $(this).val();

			  if ( inputValue == "" ) {

				$(this).removeClass('filled');

				$(this).parents('.form-group').removeClass('focused');  

			  } else {

				$(this).addClass('filled');

			  }

			})

		}

	}

	

	

	/* Website Launch Date */ 

	var WebsiteLaunchDate = new Date();

	monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

	WebsiteLaunchDate.setMonth(WebsiteLaunchDate.getMonth() + 1);

	WebsiteLaunchDate =  WebsiteLaunchDate.getDate() + " " + monthNames[WebsiteLaunchDate.getMonth()] + " " + WebsiteLaunchDate.getFullYear(); 

	/* Website Launch Date END */ 

	

	

	/* Function ============ */

	return {

		init:function(){

			boxHover();

			wow_animation();

			priceslider();

			onePageLayout();

			dzTheme();

			handleResizeElement();

			homeSearch();

			MagnificPopup();

			handleAccordian();

			scrollTop();

			handlePlaceholder();

			handlePlaceholderAnimation();

			footerAlign();

			fileInput();

			headerFix();

			setDivHeight();

			handleVideo();

			handleFilterMasonary();

			handleCountDown(WebsiteLaunchDate);

			handleCustomScroll();

			handleSideBarMenu();

			cartButton();

			handleBannerResize();

			handleResize();

			jQuery('.modal').on('show.bs.modal', reposition);

			$('[data-toggle="tooltip"]').tooltip()

		},

		

		

		load:function(){

			handleBGElements();

			handleBootstrapSelect();

			handleBootstrapTouchSpin();

			equalHeight('.equal-wraper .equal-col');

			counter();

			handleMenuPosition();

			masonryBox();

		},

		

		resize:function(){

			screenWidth = $(window).width();

			dzTheme();

			handleResizeElement();

			handleSideBarMenu();

			handleMenuPosition();

			setDivHeight();

		}

	}

	

}();



/* Document.ready Start */	

jQuery(document).ready(function() {

	//! function for notify success alert...
function pNotifySuccessAlert(sNotifyText){
    new PNotify({
        'text': sNotifyText,
        'type': 'success',
        'animation': 'none',
        'delay': 8000,
        'buttons':{
        'sticker': false
    }
    });
}

//! function for notify danger alert...
function pNotifyDangerAlert(sNotifyText){
    new PNotify({
        'text': sNotifyText,
        'type': 'danger',
        'animation': 'none',
        'delay': 8000,
        'buttons':{
            'sticker': false
        }
    });
}

//! function for notify warning alert...
function pNotifyWaringAlert(sNotifyText){
    new PNotify({
        'text': sNotifyText,
        'type': 'warning',
        'animation': 'none',
        'delay': 8000,
        'buttons':{
            'sticker': false
        }
    });
}
  

	JobBoard.init();

	

	jQuery('.navicon').on('click',function(){

		$(this).toggleClass('open');

	});



	$('a[data-toggle="tab"]').click(function(){

		// todo remove snippet on bootstrap v4

		$('a[data-toggle="tab"]').click(function() {

		  $($(this).attr('href')).show().addClass('show active').siblings().hide();

		})

	 });



	$('.job_favorite').click(function(){
        
        user_id = $('#auth').val();

        if(user_id == ''){
            window.location.href = '/signup';
            return false;
        }
        job_id = $(this).attr('data-item');

        icon = $(this).find('svg').attr('data-icon');
        sStatus = '';
        
        if(icon == 'ant-design:heart-outlined'){
            $(this).find('svg').remove();
            $(this).html('<i class="iconify fillheart" data-icon="mdi:heart"></i>');
            sStatus = 'add';
        }else{
            $(this).find('svg').remove();
            $(this).html('<i class="iconify emptyheart" data-icon="ant-design:heart-outlined"></i>');
            sStatus = 'delete';
        }
        
        $.ajax({
            url: App_URL+"/favouritejobs",
            method: "POST",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                job_id: job_id,
                sStatus: sStatus
            },
            success: function(response) {
                // url = $(location).attr('href');
                // url = url.split('/').pop();
                // if (url === 'fav-properties'){
                //     location.reload();
                // } 
            }
        });
    });

	$('.applyforjob').click(function(){

        user_id = $('#auth').val();

        if(user_id == ''){
            window.location.href = '/signup';
        }
        job_id = $(this).attr('data-item');

        $.ajax({
            url: App_URL+"/applyForJob/" + job_id,
            method: "GET",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            success: function (response) {
            	console.log(response);
                if (response.success) {
                	pNotifySuccessAlert("Applied for Job Successfully.");
                }

                if (response.error) {
                	// pNotifyDangerAlert("Already Applied for Job.");
                	// pNotifyWaringAlert("Enter Coupon Code.");
                }

                if (response.danger) {
                	pNotifyWaringAlert("Already Applied for Job.");
                	// pNotifyWaringAlert("Enter Coupon Code.");
                }

                // if (response.success) {
                // 	pNotifySuccessAlert("Applied for Job Successfully.");
                // } else {
                // 	pNotifyWaringAlert("Enter Coupon Code.");
                	
                // }
            },
        });
        
    });

	$('#rzp-btn').click(function(){
        alert('eeee');
    });

    $('.apply_coupon').click(function(){
        
        var plan_id = $(this).attr('id');
        var coupon_code = $('#coupon_code_'+plan_id).val();
        
        if(coupon_code != ''){
        	console.log(coupon_code);
        	console.log(plan_id);
            $.ajax({
                url: App_URL+'/checkCouponcode',
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                async: false,
                datatype: 'JSON',
                data: {
	                plan_id: plan_id,
	                coupon_code: coupon_code
	            },
                success: function(response) {
                    if (response.message) {
                    	window.location.href = '/plan/'+plan_id;
                    	// console.log(response.message);
                    	$('#PayButton_'+plan_id).attr('data-url', response.message);
                        $('#coupon_code_'+plan_id).attr('data-url', response.message);
                        $('#PayButton_'+plan_id).find("a").prop('id','rzp-btn').attr('href', response.message);
                    }else{
                    	pNotifyDangerAlert("Invalid Coupon Code.");
                        $('#coupon_code_'+plan_id).val('');
                    }
                }
            });    
        }else{
        	pNotifyWaringAlert("Enter Coupon Code.");
        }
    });

    $("#industry_type").change(function () {
        // var industryType = $(this).val();
        var industryType = $(this).find("option:selected").attr("data-id");

        var html = '';
        if (industryType != "") {
        	$("#p-functional_area").empty();
            $.ajax({
                url: App_URL+"/getFunctionalArea/" + industryType,
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                	console.log(response);
                    if (response.error) {
                    	console.log('eee');
                        html +=
                            '<option value="">Please choose an option</option>';
                        $("#p-functional_area").append(html);
                    } else {
                    	console.log(response.length);
                        html +=
                            '<option value="">Please choose an option</option>';
                        for (let i = 0; i < response.length; i++) {
                            html +=
                                '<option value="' +
                                response[i].job_fun_area_name +
                                '">' +
                                response[i].job_fun_area_name +
                                "</option>";
                            console.log(html);
                        }
                        $("#p-functional_area").append(html);
                        $('#p-functional_area').selectpicker('refresh');
                    }
                },
            });
        }
    });

	$("#applicantStatus").change(function () {
        // var industryType = $(this).val();
        var job_id = $('#job_id').val();
        var user_id = $('#user_id').val();
        var applicantjobstatus = $(this).val();
        
        $.ajax({
	        url: App_URL+"/updateApplicantJobStatus",
	        method: "POST",
	        headers: {
	            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
	                "content"
	            ),
	        },
	        data: {
                job_id: job_id,
                user_id: user_id,
                applicantjobstatus: applicantjobstatus
            },
	        success: function (response) {
	        	console.log(response);
	            pNotifySuccessAlert("Status Updated Successfully.");
	        },
	    });
    });
	
	$("#state").change(function () {
        // var industryType = $(this).val();
        var state_id = $(this).find("option:selected").attr("data-id");
        
        var html = '';
        if (state_id != "") {
        	$("#city").empty();
            $.ajax({
                url: App_URL+"/getAllCities/" + state_id,
                method: "GET",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (response) {
                	console.log(response);
                    if (response.error) {
                    	console.log('eee');
                        html +=
                            '<option value="">Please choose an option</option>';
                        $("#city").append(html);
                    } else {
                    	console.log(response);
                        html +=
                            '<option value="">Please choose an option</option>';
                        for (let i = 0; i < response.length; i++) {1
                            html +=
                                '<option value="' +
                                response[i].city +
                                '">' +
                                response[i].city +
                                "</option>";
                            console.log(html);
                        }
                        $("#city").append(html);
                        $('#city').selectpicker('refresh');
                    }
                },
            });
        }
    });
	
	
   	var education_fields = 1; //initlal text box count
	var education_max_fields = 10;  
	
	$("#idAddNewEducation").click(function(e){ //on add input button click
       e.preventDefault();
       	var idRemoveBtn = $('.classQualification:last').attr('id');
       	var iCount = idRemoveBtn.split("_")[1];
       	var oldCount = iCount;
        iCount++;
        
        iEducations = iCount;
        year = $('#passout_yr_1').val();
        $('span.error_msg').remove();
        var clonedTr = $('.classEducationBlock div:nth(0)').clone();
        
        for (var iii = 1; iii <= iEducations; iii++) {
        
          	if(($('#qualification_'+iii).val() == "") || ($('#passout_yr_'+iii).val() == "") ||($('#university_'+iii).val() == "") || ($('#marks_'+iii).val() == "")){
	            if($('#qualification_'+iii).val() == ""){
	            	id = '#qualification_'+iii;
	            	val = "Enter Qualification";
	            }else if($('#passout_yr_'+iii).val() == ""){
	            	id = '#passout_yr_'+iii;
	            	val = "Enter Passout Year";
	            }else if($('#university_'+iii).val() == ""){
	            	id = '#university_'+iii;
	            	val = "Enter University";
	            }else if($('#marks_'+iii).val() == ""){
	            	id = '#marks_'+iii;
	            	val = "Enter Marks";
	            }

	            sError =
                '<span class="error_msg" style="color:#fb0303">'+ val +'</span>';
            	$(id).after(sError);
	            
	            return false;
          	}
        }

        $(clonedTr).find('[name="qualification[]"]').prop('id','qualification_'+iEducations).val('');
        $(clonedTr).find('[name="passout_yr[]"]').prop('id','passout_yr_'+iEducations).val('');
        $(clonedTr).find('[name="university[]"]').prop('id','university_'+iEducations).val('');
        $(clonedTr).find('[name="marks[]"]').prop('id','marks_'+iEducations).val('');

       	$(clonedTr).find("em").prop('id','idRemoveBtnOtherPrice_'+iEducations);
        //! for show remove button
        $(clonedTr).find("em").prop('id','idRemoveBtnOtherPrice_'+iEducations).css('display','block');
     	
        // $(clonedTr).find("span").prop('id','idRemoveBtnOtherPrice_'+iEducations).css('width','12.562px');


        //! For remove add another button
        $(clonedTr).find("em").prop('id','idRemoveBtnOtherPrice_'+iEducations).next().remove();

        $(clonedTr).find('[name="passout_yr[]"]').prop('id','passout_yr_'+iEducations).selectpicker('refresh');
		$(clonedTr).find('[name="passout_yr[]"]').prop('id','passout_yr_'+oldCount).find('.bootstrap-select:odd').remove();
       
       	$(clonedTr).find('[name="passout_yr[]"]').prop('id','passout_yr_'+iEducations).next().next().remove();
       	
        $('.classEducationBlock').append(clonedTr);
        
        iEducations++;

     
   });	

	$(document).on('click', '.classRemoveBtn', function(event) {
        event.preventDefault();

        if(confirm("Are you sure want to delete this price?")){
            $(this).parent().remove();
            
            
        }
    });

    $('#profile_image').change(function(){
    	
        if (this.files && this.files[0]) {
            
            var reader = new FileReader();

            reader.onload = function (e) {
        
                $('#profileImg').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
        
        var profileImage = $('#profileImg').attr('src');
        
        var data = new FormData($('#imageForm')[0]);
        
        $.ajax({
            url: App_URL+"/uploadProfileImage",
            method: "POST",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            async: false,
            datatype: 'JSON',
            data: data,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.redirect) {
                    // location.reload();
                    // window.location.href = response.redirect;
                }
            }
        });
    });

});

/* Document.ready END */



/* Window Load START */

jQuery(window).on("load", function (e) {

	JobBoard.load();

	 setTimeout(function(){

		jQuery('#loading-area').remove();

	}, 0); 

});

/*  Window Load END */

/* Window Resize START */

jQuery(window).on('resize',function () {

	'use strict'; 

	JobBoard.resize();

});


/*  Window Resize END */



