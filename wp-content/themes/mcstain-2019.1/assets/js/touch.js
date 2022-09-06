$(document).ready(function(){
	// Floorplan & Collection functions
	$('.collection-btn').click(function(){
		var target = $(this).attr('data-target');
		console.log('collection: ' + target);
		$(this).parent('.floorplan-collection-section').addClass('hidden');
		$(this).parent('.floorplan-collection-section').delay(3000).css('display','none');


		$(target).toggleClass('hidden');
	});

	$('.backCollections-btn').click(function(){
		var container = $(this).attr('data-target');
		$(container).toggleClass('hidden');
		$('.floorplan-collection-section').css('display','flex');
		$('.floorplan-collection-section').removeClass('hidden');

	});

	$('.floorplan').click(function(){
		var floorplan = $(this).attr('data-target');

		$(this).parent('.floorplan-container').toggleClass('hidden');
		$('.touchscreen-logo').toggleClass('hidden');
		$(floorplan).toggleClass('hidden');
	});

	$('.backFloorplan-btn').click(function(){
		var plans = $(this).attr('data-target');
		var parent = $(this).attr('data-parent');

		console.log('plans: ' + plans + '<br/>' + parent);


		$(parent).toggleClass('hidden');
		$(plans + ' .floorplan-container').toggleClass('hidden');
		$('.touchscreen-logo').toggleClass('hidden');
	});
});
