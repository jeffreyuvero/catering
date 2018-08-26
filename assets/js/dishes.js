$(document).ready(function(){
	$(".dishes_add-dishes").click(function(){
		window.location = site_url + '/dishes/add'; 
	});

	$(".btn-edit-dishes").on('click',function(){
		var id = $(this).attr('data-id');
		window.location = site_url + '/dishes/edit/' +id;
	});

	$(".btn-delete-dishes").on('click',function(){
		var id = $(this).attr('data-id');
		window.location = site_url + '/dishes/delete/' +id;
	});
});