jQuery( document ).ready(function($) {
    
    $('#nav-icon3').click(function(){
		$(this).toggleClass('toggled');
	});
    
    $("button.menu-toggle").click(function(){ 
        $("body").toggleClass("toggled");  
		$("#home-header-logo").toggleClass("toggled"); 
    });
    
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
        if (scroll >=70) {
            $("header#masthead").addClass("scroll-toggled"); 
            $("button.menu-toggle").addClass("scroll-toggled"); 
			$("#nav-right-wrap").addClass("scroll-toggled"); 
			$("#nav-tables-wrap").addClass("scroll-toggled");  
			$("#header-bg").addClass("scroll-toggled"); 
        } else {
            $("header#masthead").removeClass("scroll-toggled");  
            $("button.menu-toggle").removeClass("scroll-toggled");  
           	$("#nav-right-wrap").removeClass("scroll-toggled");   
           	$("#nav-tables-wrap").removeClass("scroll-toggled");     
			$("#header-bg").removeClass("scroll-toggled"); 
        }
    });  
    
    // 	Search
	$('#search-button, #search-close').click(function() {
		$('#header-search-wrap').fadeToggle('fast');
		$('body').toggleClass('toggled');
		$( "#header-search-wrap-inner > form > label > input" ).focus().val('');
	});
	$( ".search-no-results input.search-field" ).val('');
	
//  Store Items
	var homeProduct = $('#home-store > div.woocommerce.columns-3 > ul > li.product');
		$( homeProduct ).addClass( "wow fadeIn" );
		$( homeProduct ).attr( "data-wow-offset", "70" );
		$( homeProduct ).attr( "data-wow-delay", ".2s" );
		$( homeProduct ).attr( "data-wow-duration", ".3" );
		
		
// Masonry Grid on About Us
	$('.cast_member_pic_wrap').imagesLoaded( function() {
		console.log('all about images loaded');
		  if($('body').is('.page-template-page-about-template')){	
			var elem = document.querySelector('.grid');
			var msnry = new Masonry( elem, {
			  itemSelector: '.grid-item',
			  columnWidth: 300,
			  gutter: 10
			});
			var msnry = new Masonry( '.grid', {
				gutter: 10
			});
		  };	
 	});	
/*
  if($('body').is('.page-template-page-about-template')){	
	var elem = document.querySelector('.grid');
	var msnry = new Masonry( elem, {
	  itemSelector: '.grid-item',
	  columnWidth: 300,
	  gutter: 10
	});
	var msnry = new Masonry( '.grid', {
		gutter: 10
	});
  };
*/		
		
// 	Callout Below Quote animation
$(function(){
  if($('body').is('.home')){
	$(window).scroll(function(){
    function elementScrolled(elem)
    {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();
        var elemTop = $(elem).offset().top;
        return ((elemTop <= docViewBottom) && (elemTop >= docViewTop));
    }
     
    if(elementScrolled('#home-podcasts > div > h2')) {
        var els = $('.home blockquote'),
            i = 0,
            f = function () {
                $(els[i++]).addClass('animated');
                if(i < els.length) setTimeout(f, 400);
            };
        f();
	    }
	});
  }
});		
	
	
	console.log( "scripts loaded!" );
        
});