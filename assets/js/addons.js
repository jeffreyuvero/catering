$(document).ready(function(){
	$(".addons_add").click(function(){
		window.location = site_url + '/addons/add'; 
	});

	$(".btn-edit").on('click',function(){
		var id = $(this).attr('data-id');
		window.location = site_url + '/addons/edit/' +id;
	});

	$(".btn-delete").on('click',function(){
		var id = $(this).attr('data-id');
		window.location = site_url + '/addons/delete/' +id;
	});
});