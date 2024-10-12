/**
 * Theme functions file
 *
 * Contains handlers for navigation, accessibility, header sizing
 * footer widgets and Featured Content slider
 *
 */
( function( $ ) {
	"use strict";
// Enable menu toggle for small screens.
	$(document).ready(function() {
		_polariva_count_view_product();
		$('.newsletterpopup .close-popup').on( "click", function(){
			_polariva_HideNLPopup();
			$.cookie("bemins_lpopup", 1, { expires : 24 * 60 * 60 * 1000 });
		});
		$('.newsletterpopup_overlay').on( "click", function(){
			_polariva_HideNLPopup();
			$.cookie("bemins_lpopup", 1, { expires : 24 * 60 * 60 * 1000 });
		});			
	});
	/* Show/hide NewsLetter Popup */
	$( window ).load(function() {
		_polariva_campbar();
		_polariva_ShowNLPopup();
	});
	/* Function Show NewsLetter Popup */
	function _polariva_ShowNLPopup() {
		if($('.newsletterpopup').length){
			var cookieValue = $.cookie("bemins_lpopup");
			if(cookieValue == 1) {
				$('#newsletterpopup').removeClass('show');
			}else{
				$('#newsletterpopup').addClass('show');
				setTimeout(function(){
					$('#newsletterpopup').addClass('transition');
				}, 300);
			}				
		}
	}
	/* Function Hide NewsLetter Popup when click on button Close */
	function _polariva_HideNLPopup(){
		$('#newsletterpopup').removeClass('transition');
		setTimeout(function(){
			$('#newsletterpopup').removeClass('show');
		}, 300);
	}
	/* Function Count View Product */
	function _polariva_count_view_product() {
		if( $(".product-count-view").length > 0 ){
			var id_product = $(".product-count-view").data("id_product");
			var min = $(".product-count-view").data("min") ? $(".product-count-view").data("min") : 30;
			var max = $(".product-count-view").data("max") ? $(".product-count-view").data("max") : 40;
			var timeout = $(".product-count-view").data("timeout") ? $(".product-count-view").data("timeout") : 10000;
			var cookieValue = $.cookie("product_"+id_product);
			if(cookieValue) {
				$("span",".product-count-view").html(cookieValue);
			}else{
				var rand = Math.round(Math.random() * (max - min)) + min;
				$("span",".product-count-view").html(rand);
				$.cookie("product_"+id_product, rand, { expires : 24 * 60 * 60 * 1000 });
			}
			setTimeout(function random() {
				var auto = Math.round(Math.random() * (max - min)) + min;
				$("span",".product-count-view").html(auto);
				setTimeout(random, timeout);
			}, timeout);
		}
	}
	function _polariva_campbar(){
		$(".close-campbar").on( "click", function() {
			$('.header-campbar').slideUp();
			$.cookie("bemins_campbar", 1, { expires : 24 * 60 * 60 * 1000 });
		});
		var cookieValue = $.cookie("bemins_campbar");
		if(cookieValue == 1) {
			$('.header-campbar').hide();
		}else{
			$('.header-campbar').removeClass('hidden');
		}
	}	
} )( jQuery );