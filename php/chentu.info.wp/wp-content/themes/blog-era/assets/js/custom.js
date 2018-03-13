$=jQuery;

$( document ).ready(function() {
    jQuery('.main-navigation').meanmenu({
        meanMenuContainer: '.main-menu',
        meanScreenWidth:"767"
    });

    $('#header-slider').owlCarousel({
      loop:true,
      margin:0,
      nav:true,
      dots:false,
		/*autoplay:true,
    	autoplayTimeout:2000,
    	autoplayHoverPause:true,*/
    	responsive:{
    		0:{
    			items:1
    		},
    		600:{
    			items:1
    		},
    		1000:{
    			items:1
    		}
    	}
    })

    jQuery('.content-area, .widget-area').theiaStickySidebar({
        // Settings
        additionalMarginTop: 30
    });

    /************************* slide out search *******************************/
    var sliBtn = '.search-btn',
    sliCont = '.search-slide',
    sliTxt = '.search-slide input[type=text]',
    sliDis = '.search-close',
    sliSpd = 300;

    $(sliBtn).click(function(){
        $(sliCont).animate(
            {'width':'15.5625em'}, sliSpd
            );
        $(sliTxt).focus();
    });
    $(sliDis).click(function(){
        $(sliCont).animate(
            {'width':0}, sliSpd
            );
    });

    /* back-to-top button*/

    $('.back-to-top').hide();
    $('.back-to-top').on("click",function(e) {
      e.preventDefault();
      $('html, body').animate({ scrollTop: 0 }, 'slow');
  });


    $(window).scroll(function(){
        var scrollheight =400;
        if( $(window).scrollTop() > scrollheight ) {
            $('.back-to-top').fadeIn();
        }
        else {
            $('.back-to-top').fadeOut();
        }
    });
});


