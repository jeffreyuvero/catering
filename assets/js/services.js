$(document).ready(function(){
	$(".services_add").click(function(){
		window.location = site_url + '/services/add'; 
	});

	$(".btn-edit").on('click',function(){
		var id = $(this).attr('data-id');
		window.location = site_url + '/services/edit/' +id;
	});

	$(".btn-delete").on('click',function(){
		var id = $(this).attr('data-id');
		window.location = site_url + '/services/delete/' +id;
	});
});