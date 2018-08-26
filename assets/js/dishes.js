$(document).ready(function(){
	$(".dishes_add").click(function(){
		window.location = site_url + '/dishes/add'; 
	});

	$(".btn-edit").on('click',function(){
		var id = $(this).attr('data-id');
		window.location = site_url + '/dishes/edit/' +id;
	});

	$(".btn-delete").on('click',function(){
		var id = $(this).attr('data-id');
		window.location = site_url + '/dishes/delete/' +id;
	});
});