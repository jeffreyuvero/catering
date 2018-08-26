$(document).ready(function(){
	$(".events_add").click(function(){
		window.location = site_url + '/events/add'; 
	});

	$(".btn-edit").on('click',function(){
		var id = $(this).attr('data-id');
		window.location = site_url + '/events/edit/' +id;
	});

	$(".btn-delete").on('click',function(){
		var id = $(this).attr('data-id');
		window.location = site_url + '/events/delete/' +id;
	});
});