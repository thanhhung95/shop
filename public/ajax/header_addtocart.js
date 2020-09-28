$(document).ready(function(){

  $(document).on('click','.add-to-cart',function(e){
    e.preventDefault();
    var id = $(this).attr('href');
    $.ajax({
      type:'get',
      url:'add-to-cart/'+id,
      dataType:'html',
      success:function(data){
        $('#hDropdown').html(data);
      }
    });
  });
  $(document).on('click','#pick',function(){
      $('#show').slideToggle();
    });
  $(document).on('click','#dlCart',function(e){
    e.preventDefault();
    var rowId =$(this).data('id');
    $.ajax({
      type:'get',
      url:'Delete/'+rowId,
      dataType:'html',
      success:function(data){
        $('#hDropdown').html(data);
      }
    })
  });     
});