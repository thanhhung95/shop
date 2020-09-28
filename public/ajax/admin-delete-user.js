$(document).ready(function(){
	$(document).on('click','.delete-user',function(e){
		e.preventDefault();
		var id = $(this).attr('href');
		$.ajax({
			type:'get',
			url:'delete_user/'+id,
			dataType:'html',
			success:function(data){
				$('#content-delete').html(data)
				console.log(data)
			}
		});
		// $('.remove').load('content');
	});
});


