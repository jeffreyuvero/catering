$(document).ready(function(){
	$('.btn-proceed').click(function(){
		var event = $('input[name=rdoEvents]:checked').attr('value');

		var addons = []; 
		$('input[type=checkbox]:checked').each(function(){
			addons.push($(this).attr('name'))
		});
		
		var date = $('#pd3 > input').val();
		// $.ajax({
		// 	url: site_url + '/transaction/event_submit',
		// 	type: 'POST',
		// 	data: {
		// 		event:event,
		// 		addons:addons,
		// 		date:date
		// 	},
		// 	dataType:'JSON',
		// 	success:function(result){
		// 		alert(result);
		// 	},error:function(result){
		// 		alert('errror');
		// 	}
		// });


		$.ajax({
		url: site_url + '/transaction/event_submit',
		data: {
	  		event:event,
			addons:addons,
			date:date
		},
		dataType:'json',
		success:function(data) {
		   if(data)
		    {
		        alert(data.add);
		    }
		},
		error:function(data){
		    alert('error');
		},
		method: 'POST',
		});
	});
});