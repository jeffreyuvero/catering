$(document).ready(function(){
	$(".addons_add-package").click(function(){
		window.location = site_url + '/package_list/add'; 
	});

	$(".btn-edit-package").on('click',function(){
		var id = $(this).attr('data-id');
		window.location = site_url + '/package_list/edit/' +id;
	});

	$(".btn-delete-package").on('click',function(){
		var id = $(this).attr('data-id');
		window.location = site_url + '/package_list/delete/' +id;
	});
	$(".btn-inclusion-package").on('click',function(){
		var id = $(this).attr('data-id');
		window.location = site_url + '/package_list/package_inclusion/' +id;
	});

	$(".btn-clear-package").on('click',function(){
		$('input[type=checkbox]:checked').removeProp('checked');

	});

	$(".btn-save-package").on('click',function(){

		var package_id = $(this).attr('id');

		var items = [];
		$('input[type=checkbox]:checked').each(function(){
			items.push({
				items_item:$(this).attr('value'),
				items_type:$(this).attr('data-id'),
			});
		});

		$.ajax({
				url: site_url + '/package_list/replace_items',
				data: {
			  		items:items,
					package_id:package_id,
				},
				dataType:'json',
				success:function(data) {
				   if(data.success)
				    {
				        alert('Package success saved');
				        window.location = site_url + '/package_list'; 
				    }
				},
				error:function(data){
				    alert('error');
				},
				method: 'POST',
			});
	});
});