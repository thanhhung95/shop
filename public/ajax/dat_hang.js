$(document).ready(function(){
	$(document).on('change keyup','#odQty',function(){
		var qty = $(this).val();
		var rowId= $(this).data('id');
		$.ajax({
			type:'get',
			url:'update/'+rowId+'/'+qty,
			dataType:'html',
			success:function(data){
				$("#orderContent").html(data);
			}
		})
	});
	$(document).on('click','#dlProduct',function(e){
		e.preventDefault();
		var rowId = $(this).attr('href');
		$.ajax({
			type:'get',
			url:'removeProduct/'+rowId,
			dataType:'html',
			success:function(data){
				$('#orderContent').html(data);
			}
		});
	});
});