$(document).ready(function(){
	$(".addons_add-addons").click(function(){
		window.location = site_url + '/addons/add'; 
	});

	$(".btn-edit-addons").on('click',function(){
		var id = $(this).attr('data-id');
		window.location = site_url + '/addons/edit/' +id;
	});

	$(".btn-delete-addons").on('click',function(){
		var id = $(this).attr('data-id');
		window.location = site_url + '/addons/delete/' +id;
	});
});