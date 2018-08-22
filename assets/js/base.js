$(document).ready(function(){
	$('.btn-proceed').click(function(){
		var event = $('input[name=rdoEvents]:checked').attr('value');

		var addons = []; 
		$('input[type=checkbox]:checked').each(function(){
			addons.push($(this).attr('value'))
		});
		

		if(!event){
			alert('Please select an Event you want');
		}else{
			$.ajax({
				url: site_url + '/transaction/event_submit',
				data: {
			  		event:event,
					addons:addons,
					// date:date
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


	$('.btn-catering').click(function(){
		$.ajax({
			url: site_url + '/transaction/event_submit',
			data: {
		  // 		event:event,
				// addons:addons,
				// date:date
			},
			dataType:'json',
			success:function(data) {
			   if(data.success)
			    {
			        // alert('transaction success saved');
			        window.location = site_url + '/packages'; 
			    }
			},
			error:function(data){
			    alert('error');
			},
			method: 'POST',
		});
	});

	$('.btn-proceed-package').click(function(){
		var selected_package = $('input[name=rdoPackage]:checked').attr('value');

		var date = $('#datepicker').val();

		if(!selected_package){
			alert('select package before we proceed');
		}else if(!date){
			alert('Please select an date');
		}else {
			$.ajax({
				url: site_url + '/packages/add',
				data: {
					package: selected_package,
					date:date
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

	$('.btn-proceed-order').click(function(){
		window.location = site_url + '/billing_statement';
	});


	$('.btn-proceed-bill_statement').click(function(){
		$.ajax({
			url: site_url + '/billing_statement/add_record',
			data: {
			},
			dataType: 'json',
			method: 'POST',
			success:function(data) {
			   if(data.success)
			    {
			        alert('transaction success saved');
			        // window.location = site_url ; 
			    }
			},error:function(data){
				alert('error');
			}
		});
	});

	

	
});