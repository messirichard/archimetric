$(function(){

	// bx slider
	$('.slider-bx-1').bxSlider({
	    slideWidth: 344,
	    minSlides: 3,
	    maxSlides: 15,
	    moveSlides: 1,
	    slideMargin: 14,
	    pager: false,
	  });

	$('.act-colpse-hd').live('click', function(){
		var dt_cl = $(this).attr('data-id');

			$('#'+dt_cl).hide('slow');
		$(this).addClass('show');
		$(this).find('.icon-collapse-area').removeClass('icon-collapse-area').addClass('icon-collapse-area-plus');

		return false;
	})

	$('.act-colpse-hd.show').live('click', function(){
		var dt_cl = $(this).attr('data-id');

		$('#'+dt_cl).show('slow');

		$(this).find('.icon-collapse-area-plus').removeClass('icon-collapse-area-plus').addClass('icon-collapse-area');

		$(this).removeClass('show');
		return false;
	})

	$('.foc-comment').focus(function() {
        $(this).css("height", "110px");
        $(".bt-cncel-dt-comment").show();
    });

	$(".hd-fet-comm-sr").live('click', function(){
		$(".foc-comment").css("height", "37px");
		$(".bt-cncel-dt-comment").hide();
		return false;
	})


	// scroll down home
	$("#t_scoll_home").live('click', function(){
		var id = $(this).attr("data-id");
		//alert(id);
		$.scrollTo('#'+id , 1500);
	});


	// Suggestion ajax search data
	function lookup(inputString){
		if(inputString.length == 0){
			$('#suggestions').hide(); // Hide the suggestions box
		} else {
			$.post(urlSearching, {queryString: ""+inputString+""}, function(data) { // Do an AJAX call
				$('#suggestions').show(); // Show the suggestions box
				$('#suggestions').html(data); // Fill the suggestions box
			});
		}
	}


	// slider list data
	$( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 10,
      values: [ 6, 9 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] );
      }
    });

    $( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ) +
      " - " + $( "#slider-range" ).slider( "values", 1 ) );

});