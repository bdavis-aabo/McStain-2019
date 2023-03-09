$(window).on('load', function(){
	// Flip Card Functions
  var flipFrontH = $('.flipper > .card-front').height();

  $('.flipper').height(flipFrontH);
  $('.flipper .card-back').height(flipFrontH).width(flipFrontH);

  $(window).resize(function(){
    var flipFrontH = $('.flipper > .card-front').height();
    $('.flipper').height(flipFrontH);
    $('.flipper .card-back').height(flipFrontH).width(flipFrontH);
  });

  $('.flip-container').click(function(){
    $('.flip-container.hover').not(this).removeClass('hover');
    $(this).toggleClass('hover');
  });
});

$(document).ready(function(){
  // show/hide floorplan thumbnails
  $('.view-btn').click(function(){
    var target = $(this).attr('data-target');
    $(target).toggleClass('hidden');
  });

  // Smooth Scroll
  // Select all links with hashes
  $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('a.nav-link')
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top - 85
        }, 1500, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          }
        });
      }
    }
  });

	//Bewell height adjust script
	const moreButton = $('.more-btn');
	const bewellSlideContainer = $('.bewell-popup-slider');

	moreButton.click(function(){
		const height = bewellSlideContainer.prop('scrollHeight');
		bewellSlideContainer.toggleClass('is-visible');
		moreButton.text(moreButton.text() === 'Learn More' ? 'Close' : 'Learn More');
	});

	const popupButton = $('.popup-btn');
	const bewellPopup = $('.bewell-popup');
	const closePopup  = $('.bewell-popup > .popup-container .close-btn');

	popupButton.click(function(){
		bewellPopup.addClass('is-visible');
	});

	closePopup.click(function(){
		bewellPopup.removeClass('is-visible');
	});






//   carouselNormalization();
});
