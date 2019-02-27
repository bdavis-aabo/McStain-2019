$(document).ready(function(){
  //fix header to top on scroll
  $(window).scroll(function(){
    if($(this).scrollTop() > 100){
      $('.navbar').addClass('stuck');
    } else {
      $('.navbar').removeClass('stuck');
    }
  });

  $('.navbar-toggler').click(function(){
    $(this).toggleClass('open');
  });
});
