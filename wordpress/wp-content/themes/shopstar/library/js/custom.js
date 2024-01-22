/**
 * Shopstar Theme Custom Functionality
 *
 */
( function( $ ) {
	
	var sliderTransitionSpeed = parseInt( variables.sliderTransitionSpeed );
    
	$( document ).ready( function() {
		shopstar_image_has_loaded();
		
	    $('.hiddenUntilLoadedImageContainer img, img.hideUntilLoaded').one("load", function() {
	    }).each(function() {
	    	if (this.complete) {
	    		$(this).trigger( 'load' );
	    	}
	    });
	    
    	// Stop the WooCommerce product review form submitting when fields are empty
    	$('#commentform').removeAttr('novalidate');
	    
	    // Themify Product Filter
    	$( document ).on( 'wpf_ajax_success', function() {
    		shopstar_image_has_loaded();
    	} );
	    
    	// Jetpack infinite scroll
    	$( document.body ).on( 'post-load', function () {
    		shopstar_image_has_loaded();
    	} );
    	
        // Add button to sub-menu item to show nested pages / Only used on mobile
        $( '.main-navigation li.page_item_has_children, .main-navigation li.menu-item-has-children' ).prepend( '<span class="submenu-toggle"><i class="otb-fa otb-fa-angle-right"></i></span>' );
        
        // Add a hover class to navigation menu items when focused
        $( '.main-navigation a' ).on( 'focus blur', function() {
        	$( this ).parents( 'li' ).toggleClass( 'hover' );
        });
        
        // Mobile nav sub-menu toggle button
        $( '.main-navigation a[href="#"], .submenu-toggle' ).bind( 'click', function(e) {
        	e.preventDefault();
            $(this).parent().toggleClass( 'open-page-item' );
            $(this).parent().find('.otb-fa:first').toggleClass('otb-fa-angle-right').toggleClass('otb-fa-angle-down');
        });
        
        var focused_mobile_menu_item;
        
        // Remove all hover classes from menu items when anything  on the page is clicked
        $( document ).on( 'click', function(e) {
        	if ( e.target != focused_mobile_menu_item ) {
        		$( 'body.mobile-device .main-navigation li.menu-item-has-children' ).removeClass('hover');
        	}
        	
        	focused_mobile_menu_item = null;
        });

        // 
        $( 'body.mobile-device .main-navigation li.menu-item-has-children > a' ).on( 'click', function(e) {
        	e.preventDefault();
        	menu_item = $(this).parent();

        	// If a menu item with a submenu is clicked that doesn't have a # for a URL show the submenu
        	if ( menu_item.find('a').attr('href') != '#' && !menu_item.hasClass('hover') ) {
        		focused_mobile_menu_item = e.target;        		
        		menu_item.addClass('hover');
        		
        	// If the submenu is already displaying then go to it's URL
        	} else if ( menu_item.hasClass('hover') ) {
        		window.location.href = menu_item.find('a').attr('href');
        	}
        });        
        
        shopstar_set_slider_height();
        
        // Mobile menu toggle button
        $( '.main-navigation .menu-toggle' ).on( 'click', function(e) {
            $( 'body' ).toggleClass( 'show-main-menu' );
            
	    	if ( $( 'body' ).hasClass( 'show-main-menu' ) ) {
	        	$( this ).attr( 'aria-expanded', 'true' );
	    	} else {
	    		$( this ).attr( 'aria-expanded', 'false' );
	    	}
        });
        
        $( '.main-navigation .close-button' ).on( 'click', function(e) {
            $( '.main-navigation .menu-toggle' ).click();
        });
    	
        // Search Show / Hide
    	var searchHeight = $(".search-slidedown").height();
    	
        $(".search-button").on( 'click', function(e) {
        	e.preventDefault();
        	
        	if ( !$(".search-slidedown").hasClass('open') ) {
	        	$(".search-slidedown").addClass('open');
	        	$(".search-slidedown").animate( { opacity: 1 }, 150 );
	            $(".search-slidedown .search-field").focus();
        	} else {
	        	$(".search-slidedown").removeClass('open');
	        	$(".search-slidedown").animate( { opacity: 0 }, 150 );
        	}
        });
        
        // Don't search if no keywords have been entered
        $(".search-submit").on( 'click', function(e) {
        	if ( $(this).parents(".search-form").find(".search-field").val() == "") e.preventDefault();
        });
    	
    	var element;
    	
    	if ( $('.slider-container').length > 0) {
    		element = $('.slider-container');
    	} else {
    		element = $('.site-content');
    	}
    	
    });
    
    function shopstar_set_search_block_position() {
    	if ( $('.search-button').length > 0 ) {
    		$('.search-slidedown .search-block').css('left', $('.search-button').position().left - ( $('.search-slidedown .search-block').width() - $('.search-button').width() ) );
    	}
    }
    
    $(window).resize(function () {
    	shopstar_set_search_block_position();
    });
    
    $(window).on('load', function() {
    	shopstar_init_home_slider();
    	shopstar_set_search_block_position();
    });

    $(window).scroll(function() {
    	if ( $(".search-slidedown").hasClass('open') ) {
    	}
    });
    
    if ( $(".header-image img").length > 0 ) {
	    var img = $('<img/>');
	    img.attr("src", $(".header-image img").attr("src") ); 
		
	    img.on('load', function() {
	    	$('.header-image').removeClass('loading');
	    	$('.header-image').css('height', 'auto');
		});
    }       
    
    function shopstar_set_slider_height() {
        // Set the height of the slider to the height of the first slide's image
    	var firstSlide  = $(".slider-container.default .slider .slide:eq(0)");
    	var headerImage = $(".header-image img");
    	if ( firstSlide.length > 0 ) {
    		var firstSlideImage = firstSlide.find('img').first();
    		
    		if ( firstSlideImage.length > 0) {
    			
    			if ( firstSlideImage.attr('height') > 0 ) {
    				
    				// The height needs to be dynamically calculated with responsive in mind ie. the height of the image will obviously grow
    				var firstSlideImageWidth  = firstSlideImage.attr('width');
    				var firstSlideImageHeight = firstSlideImage.attr('height');
    				var sliderWidth = $('.slider-container').width();
    				var widthPercentage;
    				var widthRatio;
    				
    				widthRatio = sliderWidth / firstSlideImageWidth;
    				
    				$('.slider-container.loading').css('height', Math.round( widthRatio * firstSlideImageHeight ) );
    			}
    		}
    	} else if ( headerImage.length > 0 ) {
    		
    		if ( headerImage.attr('height') > 0 ) {

				// The height needs to be dynamically calculated with responsive in mind ie. the height of the image will obviously grow
				var headerImageWidth  = headerImage.attr('width');
				var headerImageHeight = headerImage.attr('height');
				var headerImageContainerWidth = $('.header-image').width();
				var widthPercentage;
				var widthRatio;
				
				widthRatio = headerImageContainerWidth / headerImageWidth;
				
				$('.header-image.loading').css('height', Math.round( widthRatio * headerImageHeight ) );
    		}
    	}
    }
    
    function shopstar_image_has_loaded() {
    	var container;

    	$('.hiddenUntilLoadedImageContainer img').on('load', function(){
	    	container = $(this).parents('.hiddenUntilLoadedImageContainer');
	    	container.removeClass('loading');
	    	
	    	(function(container){
	    	    setTimeout(function() {
	    	    	//container.addClass('transition');
	    	    }, 50);
	    	})(container);
	    });
    	
	    $('img.hideUntilLoaded').on('load', function(){
	    	container = $(this).parents('.featured-image-container');
	    	
	    	if ( ( container.hasClass('round') || container.hasClass('square') || container.hasClass('tall') || container.hasClass('medium') || container.hasClass('short') ) ) {
	    		container.css('background-image', 'url("' + $(this).attr('src') + '")' );
		    	
	    		if ( !container.hasClass('disable-style-for-mobile') ) {
	    			$(this).remove();
	    		}
	    	}
	    	
	    	container.removeClass('loading');
	    	
	    	(function(container){ 
	    	    setTimeout(function() { 
	    	    	//container.addClass('transition');
	    	    }, 50);
	    	})(container);	    	
	    });
	}    
    
    function shopstar_init_home_slider() {
    	if ( $('.slider').length ) {
    		
	        $(".slider").carouFredSel({
	            responsive: true,
	            circular: true,
	            infinite: false,
	            width: 1200,
	            height: 'variable',
	            items: {
	                visible: 1,
	                width: 1200,
	                height: 'variable'
	            },
	            onCreate: function(items) {
	            	$('.slider-container.default').css('height', 'auto');
	            	$('.slider-container.default').removeClass('loading');
	            },
	            scroll: {
	                fx: 'uncover-fade',
	                duration: sliderTransitionSpeed
	            },
	            auto: false,
	            pagination: '.slider-container.default .pagination',
	            prev: '.slider-container.default .prev',
	            next: '.slider-container.default .next',
		        swipe: {
		        	onTouch: true
		        }
	        });
	        
    	}
    }
    
} )( jQuery );