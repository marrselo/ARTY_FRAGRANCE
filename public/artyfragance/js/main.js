$(function(){
	$(document).ready(function(){
	$body = $("body");

		if($body.hasClass('slide')){
			$('.overview').cycle({ 
				fx:     'fade', 
				speed:  'fast', 				
				timeout: 5000
			});		
		
		
			$('.slide_collection .photo, .cnt_slide_bio .photo, .lyt_mecenat_historique .cnt_slide .photo').cycle({ 
				fx:     'scrollLeft',
				speed:  'fast', 				
				timeout: 5000,
				pager: '#pager' 
			});
			
		}

		$(".row_slide ").hide();
		$(".row_slide:first").show();
		$(".row_inner .photo a").each(function(){
			$(this).click(function(e){
			e.preventDefault();
				$(".row_slide").hide();
				console.log(  $(this).parents(".row").find(".row_slide") )
				$(this).parents(".row").find(".row_slide").show();		
			});		
		});
	
		
		
		
		if($body.hasClass('fancyBox') ){
			$(".zoom").fancybox({
				'speedIn'		:	600, 
				'speedOut'		:	200, 
				'overlayShow'	:	true
			});	
		}
		
		
	
		$(".changeImg").click(function(e){
			e.preventDefault();
			var imgHref = $(this).attr("href");
			$(".imgPrincipal").attr("src", imgHref);
		});
	
	
		

		var Hboxslide = $(".box_slide");
		
		$(".slideC").click(function(e){
			e.preventDefault();
			if( $(this).hasClass("slideUp") ){
				$(".slideUp").addClass("slideDown").removeClass("slideUp");
				$(".box_slide").animate({bottom: '0' }, "fast", function() {  });			
			}else if(  $(this).hasClass("slideDown") ){				
				$(".slideDown").addClass("slideUp").removeClass("slideDown");
				$(".box_slide").animate({bottom: '-120px' }, "fast", function() {  });		
			}
		
		});
		
	});
	
});;
