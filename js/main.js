(function($) {
// $() will work as an alias for jQuery() inside of this function

var ww = document.body.clientWidth;

$(window).load(function(){

  // Masonry.js
  var $container = $('#posts');

  $container.imagesLoaded(function(){
    $container.masonry({
      itemSelector: '.box',
      columnWidth: 300,
      isFitWidth: true
    });


  });



});




$(document).ready(function(){



	//Superfish
	$("ul.sf-menu").superfish({
		dropShadows:   false
	});

	/* prepend menu icon */
	jQuery('.top-menu-container nav').prepend('<div id="menu-icon"><i class="fa fa-bars fa-2x"></i></div>');

	/* toggle nav */
	$("#menu-icon").on("click", function(){
    jQuery(".sf-menu").toggle();
    jQuery(this).toggleClass("active");
	});

  $('.top-menu-container').on("click", function() {
    jQuery(this).toggleClass("active");
  });

// $(".social-theme-icon").on("click", function(){
	      // url= ($(this).attr('data-url'));
		   // window.open(url,'_blank');

  // return false;
	// });





/*PRETTYPHOTO STARTS*/
    $("a[class^='prettyPhoto']").prettyPhoto({
    	animationSpeed:'slow',
    	theme:'facebook',
    	hideflash: true,
    	wmode: 'opaque',
    	slideshow:2000}
    );
/*PRETTYPHOTO ENDS*/




$('.prev-post').hover(
  function () {
    $(this).find('.preview').fadeIn().animate({left:'0'});
    $(this).find('.arrow').animate({left:'-50px'});
  },
  function () {
    $(this).find('.preview').animate({left:'-160px'}).fadeOut();
    $(this).find('.arrow').animate({left:'0'});
  }
);

$('.next-post').hover(
  function () {
    $(this).find('.preview').fadeIn().animate({right:'0'});
    $(this).find('.arrow').animate({right:'-50px'});
  },
  function () {
    $(this).find('.preview').animate({right:'-200px'}).fadeOut();
    $(this).find('.arrow').animate({right:'0'});
  }
);




var $container = $('#posts');
$container.masonry(  );



}); //end document.ready





})(jQuery);
