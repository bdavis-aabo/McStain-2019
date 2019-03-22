$(document).ready(function(){
  //fix header to top on scroll
  $(window).scroll(function(){
    if($(this).scrollTop() > 30){
      $('.navbar').addClass('stuck');
    } else {
      $('.navbar').removeClass('stuck');
    }
  });

  $('.navbar-toggler').click(function(){
    $(this).toggleClass('open');
  });

  // Email Lightbox Functions
  function displayLightbox(){
    $('.email-lightbox').addClass('box-open');
    $('body,html').css('overflow','hidden');
  }

  function closeLightbox(){
    $('.email-lightbox').removeClass('box-open');
    $('.email-content').hide();
    $('body,html').css('overflow','auto');
  }

  $('.email-content').hide();
  $('.lightbox-trigger').click(function(){
    displayLightbox();
    if($(this).hasClass('base-contact')){
      $('.base-form').delay(500).show();
    } else if($(this).hasClass('model-btn')){
      $('.model-form').delay(500).show();
    } else if($(this).hasClass('design-btn')){
      $('.design-form').delay(500).show();
    } else if($(this).hasClass('amenities-btn')){
      $('.base-form').delay(500).show();
    }
  });
  $('.realtorinfo-btn a').click(function(){
    displayLightbox();
    $('.realtor-form').delay(500).show();
  });

  $('.close-btn').click(function(){
    if($('.floorplan-mask').hasClass('open')){
      closeModel();
    } else {
      closeLightbox();
    }
  });

  $(document).keyup(function(e){
    if(e.keyCode === 27){
      if($('.floorplan-mask').hasClass('open')){
        closeModel();
      } else {
        closeLightbox();
      }
    }
  });
  // end Email Lightbox Functions

  // Modal Lightbox Functions
  function displayModel(){
    $('.floorplan-mask').addClass('open');
    $('body,html').css('overflow','hidden');
  }

  function closeModel(){
    $('.floorplan-mask').removeClass('open');
    $('.floorplan-lightbox').hide();
    $('body,html').css('overflow','auto');
    $('.floorplan-lightbox .gold-btn').show();
  }

  $('.comm-model').click(function(){
    var model = $(this).attr('data-target');
    displayModel();
    $('#' + model).show();
  });

  $('.comm-model.no-button').click(function(){
    var model = $(this).attr('data-target');
    $('.floorplan-lightbox .gold-btn').hide();
    displayModel();
    $('#' + model).show();
  });

  $('.lightbox-close').click(function(){

    if($(this).attr('data-model') !== ''){
      var model = $(this).attr('data-model');
      $('.base-form #model-interested').val(model);
    }
    closeModel();
    displayLightbox();
    $('.model-form').delay(500).show();

  });
  // end Modal Lightbox Functions

  // Email Interest fields
  $('input.interest-check').change(function(){
    $('.hidden-container').toggleClass('show');
    $('.hidden-fields').toggleClass('visible');
  });

  // Open lightbox form from url
  var urlSearch = window.location.search;
  if(urlSearch === '?contact'){
    displayLightbox();
    $('.base-form').delay(500).show();
  }

});
