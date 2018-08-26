$(document).ready(function(){
	$(".events_add-events").click(function(){
		window.location = site_url + '/events/add'; 
	});

	$(".btn-edit-events").on('click',function(){
		var id = $(this).attr('data-id');
		window.location = site_url + '/events/edit/' +id;
	});

	$(".btn-delete-events").on('click',function(){
		var id = $(this).attr('data-id');
		window.location = site_url + '/events/delete/' +id;
	});
});