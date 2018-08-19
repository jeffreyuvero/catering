$(document).ready(function(){
	$('.btn-proceed').click(function(){
		var event = $('input[name=rdoEvents]:checked').attr('value');

		var addons = []; 
		$('input[type=checkbox]:checked').each(function(){
			addons.push($(this).attr('value'))
		});
		
		var date = $('#datepicker').val();

		if(!event){
			alert('Please select an Event you want');
		}else if(!date){
			alert('Please select an date');
		}else{
			$.ajax({
				url: site_url + '/transaction/event_submit',
				data: {
			  		event:event,
					addons:addons,
					date:date
				},
				dataType:'json',
				success:function(data) {
				   if(data.success)
				    {
				        alert('transaction success saved');
				        window.location = site_url + '/packages'; 
				    }
				},
				error:function(data){
				    alert('error');
				},
				method: 'POST',
			});
		}
	});

	$('.btn-proceed-package').click(function(){
		var selected_package = $('input[name=rdoPackage]:checked').attr('value');

		if(!selected_package){
			alert('select package before we proceed');
		}else {
			$.ajax({
				url: site_url + '/packages/add',
				data: {
					package: selected_package,
				},
				dataType: 'json',
				method: 'POST',
				success:function(data) {
				   if(data.success)
				    {
				        alert('transaction success saved');
				        window.location = site_url + '/order_summary'; 
				    }
				},error:function(data){
					alert('error');
				}
			});
		}
	});
});