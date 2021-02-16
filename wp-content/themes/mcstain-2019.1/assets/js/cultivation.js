$(document).ready(function(){
  // show/hide floorplan thumbnails
  $('.view-btn').click(function(){
    var target = $(this).attr('data-target');
    $(target).toggleClass('hidden');
  });
});
