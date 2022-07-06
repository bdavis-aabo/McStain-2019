// // function to make all carousel-items the same min-height as tallest element.
// function carouselNormalization(){
//   var items = $('#amenitiesSlider .carousel-item'),
//     heights = [],
//     tallest;
//
//   var itemImages = $('#amenitiesSlider .carousel-item > img'),
//     imageHeights = [],
//     imageTallest;
//
//   if(items.length) {
//     function normalizeHeights(){
//       items.each(function(){
//         heights.push($(this).height());
//       });
//       tallest = Math.max.apply(null, heights);
//       items.each(function(){
//         $(this).css('min-height', tallest + 'px');
//       });
//     }
//     function setNavigationTop(){
//       itemImages.each(function(){
//         imageHeights.push($(this).height());
//       });
//       imageTallest = Math.max.apply(null, imageHeights);
//       $('#amenitiesSlider .carousel-indicators').css('top', (imageTallest + 30) + 'px');
//     }
//     normalizeHeights();
//     setNavigationTop();
//
//     $(window).on('resize orientationchange', function(){
//       tallest = 0, heights.length = 0;
//       items.each(function(){
//         $(this).css('min-height', '0');
//       });
//
//       imageTallest = 0, imageHeights.length = 0;
//       itemImages.each(function(){
//         $('#amenitiesSlider .carousel-indicators').css('top', '0');
//       });
//       normalizeHeights();
//       setNavigationTop();
//     });
//   }
// }
//
// $(document).ready(function(){
//   // show/hide floorplan thumbnails
//   $('.view-btn').click(function(){
//     var target = $(this).attr('data-target');
//     $(target).toggleClass('hidden');
//   });
//
//   // Smooth Scroll
//   // Select all links with hashes
//   $('a[href*="#"]')
//     // Remove links that don't actually link to anything
//     .not('a.nav-link')
//     .not('[href="#"]')
//     .not('[href="#0"]')
//     .click(function(event) {
//     // On-page links
//     if (
//       location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname
//     ) {
//       // Figure out element to scroll to
//       var target = $(this.hash);
//       target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
//       // Does a scroll target exist?
//       if (target.length) {
//         // Only prevent default if animation is actually gonna happen
//         event.preventDefault();
//         $('html, body').animate({
//           scrollTop: target.offset().top - 85
//         }, 1500, function() {
//           // Callback after animation
//           // Must change focus!
//           var $target = $(target);
//           $target.focus();
//           if ($target.is(":focus")) { // Checking if the target was focused
//             return false;
//           } else {
//             $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
//             $target.focus(); // Set focus again
//           }
//         });
//       }
//     }
//   });
//   carouselNormalization();
// });
