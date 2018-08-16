$(window).resize(function(){
	var button_showku = $('.bt-showleft_menu');

	var link_hide = $('.top-left-panel a.hide_leftmenu, .lgo-web-inside-leftpanel a.hide_leftmenu');
	var link_show = $('.bt-showleft_menu a.show_leftmenu');

	var left_panel = $('.left-panel');
	var right_panel = $('.right-panel');

	var newWindowwidth = $(window).width();
	// alert("adsfsdfasdf");
	if ( newWindowwidth < 800 ){
		$(left_panel).animate({"margin-left": '-292'}, 35);
		$(right_panel).animate({"margin-left": '0'}, 45);
		$('#sub_menuCollection').animate({"left": '-310'}, 50);
		// return false;
	}

	if ( newWindowwidth > 800 ){
		// console.log(newWindowwidth);
		$(left_panel).css("margin-left", "0px");
		$(right_panel).css("margin-left", "292px");
	}

});

$(window).load(function(){

	var button_showku = $('.bt-showleft_menu');

	var link_hide = $('.top-left-panel a.hide_leftmenu, .lgo-web-inside-leftpanel a.hide_leftmenu');
	var link_show = $('.bt-showleft_menu a.show_leftmenu');

	var left_panel = $('.left-panel');
	var right_panel = $('.right-panel');

	var newWindowwidth = $(window).width();
	if ( newWindowwidth < 800 ){
		$(left_panel).animate({"margin-left": '-292'}, 35);
		$(right_panel).animate({"margin-left": '0'}, 45);
		$('#sub_menuCollection').animate({"left": '-310'}, 50);
	}


	// new edit
	$('.back-left-menu ul li a, .cont-footer-left-panel, .pcn-logo.logo2').addClass('hidden');
	$('.wraps_left_panel_menu .left-panel').css('width', '96px');
});

$(document).ready(function() { // makes sure the whole site is loaded
	var button_showku = $('.bt-showleft_menu');

	var link_hide = $('.top-left-panel a.hide_leftmenu, .lgo-web-inside-leftpanel a.hide_leftmenu');
	var link_show = $('.bt-showleft_menu a.show_leftmenu');

	var left_panel = $('.left-panel');
	var right_panel = $('.right-panel');
	 
	var newWindowwidth = $(window).width();
	if ( newWindowwidth > 800 ){
		$(link_hide).on('click', function(){

			$('.bt-showleft_menu').animate({"left": '0'}, 0);
			$('.bt-showleft_menu').removeClass('hide_left');
			
			$(left_panel).removeClass('active_left');
			$(right_panel).removeClass('active_right');
			return false;
		});

		$(link_show).on('click', function(){
			$('.bt-showleft_menu').animate({"left": '-90'}, 0);
			$('.bt-showleft_menu').addClass('hide_left');

			$(left_panel).addClass('active_left');
			$(right_panel).addClass('active_right');
		});
	}else{
		$(left_panel).on('click', function(){
			// alert('adfasdf');
			$(left_panel).animate({"margin-left": '-292'});
			$(right_panel).animate({"margin-left": '0'}, function() {
			    
			  });
			
			$('#sub_menuCollection').animate({"left": '-310'}, 50);
			$('.back-cream-inside').animate({"padding-left": '93'});
		});

		$(link_show).on('click', function(){
			$(left_panel).animate({"margin-left": '0'});
			$(right_panel).animate({"margin-left": '0'}, function() {
				 
			  });
			
			$('.back-cream-inside').animate({"padding-left": '0'});
		});
	}

	$('.back-left-menu ul li.sub_collection').on('mouseenter', function(){
	     $('#sub_menuCollection').animate({"left": '292'}, "fast");
	});

	$(".left-panel").on('mouseleave',function(){
		$('#sub_menuCollection').animate({"left": '-292'}, 1750);
	});
});

$(document).ready(function(){

	// new edit
	$('.back-left-menu ul li a, .cont-footer-left-panel, .pcn-logo.logo2').addClass('hidden');
	$('.wraps_left_panel_menu .left-panel').css('width', '96px');
	// left menu trigger button
	$('.trigger_btn').on('click', function(event) {

	  if ( $( this ).hasClass( "hide_leftmenu" ) ) {
	    
	    $('.wraps_left_panel_menu .left-panel').css('width', '287px');
	    setTimeout(function() 
	      {
	    	$('.back-left-menu ul li a, .cont-footer-left-panel').removeClass('hidden');
	      }, 250);
	    setTimeout(function() 
	      {
	    	$('.pcn-logo.logo2').fadeIn('slow').removeClass('hidden');
	      }, 320);
	    $(this).removeClass('hide_leftmenu').addClass('show_leftmenu');

	  } else {
	  	$('.back-left-menu ul li a, .cont-footer-left-panel, .pcn-logo.logo2').addClass('hidden');
	    $('.wraps_left_panel_menu .left-panel').css('width', '96px');

	  	$(this).removeClass('show_leftmenu').addClass('hide_leftmenu');

	  }

	  event.preventDefault();
	});

	// if ($('#back-to-top').length) {
		$('#back-to-top').hide();

	    var scrollTrigger = 100; // px
	    $(window).on('scroll', function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').show();
            } else {
                $('#back-to-top').hide();
            }
	    });

	    $('#back-to-top').on('click', function (e) {
	        e.preventDefault();
	        $('html,body').animate({
	            scrollTop: 0
	        }, 1200);
	    });
	// }
});