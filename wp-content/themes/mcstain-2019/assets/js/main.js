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
    } else if($(this).hasClass('amenities-btn')){
      $('.base-form').delay(500).show();
    }
  });

  function displayCultivation(){
    $('.cultivation-lightbox').addClass('box-open');
    $('body,html').css('overflow','hidden');
  }
  function closeCultivation(){
    $('.cultivation-lightbox').removeClass('box-open');
    $('.email-content').hide();
    $('body,html').css('overflow','auto');
  }
  $('.cult-trigger').click(function(){
    displayCultivation();
    if($(this).hasClass('model-btn')){
      $('.model-form').delay(500).show();
    } else if($(this).hasClass('design-btn')){
      $('.design-form').delay(500).show();
    }
  });

  $('.floorplan-trigger').click(function(){
    displayCultivation();
    $('.floorplan-form').delay(500).show();
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
      closeCultivation();
    }
  });

  $(document).keyup(function(e){
    if(e.keyCode === 27){
      if($('.floorplan-mask').hasClass('open')){
        closeModel();
      } else {
        closeLightbox();
        closeMember();
        closeManifesto();
        closeCultivation();
      }
    }
  });
  // end Email Lightbox Functions

  // Team Member Functions
  function displayMember(){
    $('.members-lightbox').addClass('open');
    $('body,html').css('overflow','hidden');
  }
  function closeMember(){
    $('.members-lightbox').removeClass('open');
    $('.body,html').css('overflow','auto');
    $('.teambio-lightbox').removeClass('show-bio');
  }
  $('.team-lightbox-trigger').click(function(){
    var team = $(this).attr('data-target');
    displayMember();
    $(team).addClass('show-bio');
  });
  $('.teambio-lightbox .close-btn').click(function(){
    closeMember();
    $(this).parent('.teambio-lightbox').removeClass('show-bio');
  });

  // Manifesto Lightboxes
  function displayManifesto(){
    $('.manifesto-lightbox').addClass('open');
    $('.body,html').css('overflow','hidden');
  }
  function closeManifesto(){
    $('.manifesto-lightbox').removeClass('open');
    $('.body,html').css('overflow','auto');
    $('.manifesto-box').removeClass('show-man');
  }
  $('.manifesto-trigger').click(function(){
    var man = $(this).attr('data-target');
    displayManifesto();
    $('#'+man).addClass('show-man');
  });
  $('.close-btn').click(function(){
    closeManifesto();
    $('.body,html').css('overflow','auto');
  });

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

  // $('.comm-model').click(function(){
  //   var model = $(this).attr('data-target');
  //   displayModel();
  //   $('#' + model).show();
  // });
  //
  // $('.comm-model.no-button').click(function(){
  //   var model = $(this).attr('data-target');
  //   $('.floorplan-lightbox .gold-btn').hide();
  //   displayModel();
  //   $('#' + model).show();
  // });

  $('.lightbox-close').click(function(){

    if($(this).attr('data-model') !== ''){
      var model = $(this).attr('data-model');
      $('.base-form #model-interested').val(model);
    }
    closeModel();
    displayCultivation();
    $('.model-form').delay(500).show();

  });
  // end Modal Lightbox Functions

  // Email Interest fields
  $('input.interest-check').change(function(){
    $('.hidden-container').toggleClass('show');
    $('.hidden-fields').toggleClass('visible');
  });

  $('.project-select').change(function(){
    var project = $(this).val();
    $('input#ProjectID').val(project);
  });

  $('#manifesto-mobile-slider').carousel({
    interval: 9500,
    pause:    'hover',
  });

  var navbarH = $('.navbar').height();
  $('.blank-section').css('margin-top', (navbarH + 50) + 'px');

  $(window).resize(function(){
    var navbarH = $('.navbar').height();
    $('.blank-section').css('margin-top', (navbarH + 50) + 'px');
  });

  // Open lightbox form from url
  var urlSearch = window.location.search;
  if(urlSearch === '?contact'){
    displayLightbox();
    $('.base-form').delay(500).show();
  }

  //QMI FUNCTIONS
  $('.qmi-trigger').click(function(){
    var comm = $(this).attr('data-comm');
    //var model = $(this).attr('data-model');
    $('input[name="ProjectID"]').val(comm);
  });

  $('.card-toggle').click(function(){
    $(this).toggleClass('open');
    $('.card-toggle').not(this).removeClass('open');
  });

});
