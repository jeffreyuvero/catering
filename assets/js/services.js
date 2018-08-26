$(document).ready(function(){
	$(".services_add-services").click(function(){
		window.location = site_url + '/services/add'; 
	});

	$(".btn-edit-services").on('click',function(){
		var id = $(this).attr('data-id');
		window.location = site_url + '/services/edit/' +id;
	});

	$(".btn-delete-services").on('click',function(){
		var id = $(this).attr('data-id');
		window.location = site_url + '/services/delete/' +id;
	});
});