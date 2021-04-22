$(document).ready(function() {
 //Updating
 $('.edit-row').on('click', function(){
  $('.modal').modal()
   $('#main-form')[0].reset() // reset the form
   const payload = $(this).data('payload')
   console.log(payload);

   $('input[name=order_type]').removeAttr('required')
   $('input[name=order_images]').removeAttr('required')
   $('input[name=order_cost]').removeAttr('required')
   $('input[name=order_status]').removeAttr('required')
   $('input[name=order_date]').removeAttr('required')
   $('input[name=delivery_date]').removeAttr('required')
   $('input[name=delivery_status]').removeAttr('required')

   $('input[name=order_type]').val(payload.order_type)
   $('input[name=order_images]').val(payload.order_images)
   $('input[name=order_cost]').val(payload.order_cost)
   $('input[name=order_status]').val(payload.order_status)
   $('input[name=order_date]').val(payload.order_date)
   $('input[name=delivery_date]').val(payload.delivery_date)
   $('input[name=delivery_status]').val(payload.delivery_status)
   // $('select[name=user_type] option').each(function() {
   //   $(this).removeAttr('selected')
   // });
   // $('select[name=user_type] option').filter(function () { return $(this).html() == payload.user_type; }).attr('selected', 'selected')

   $('#main-form').attr('action', base_url + 'cms/orders/update' + payload.order_id)
   $('.modal').modal()
 })

 // Adding
 $('.add-btn').on('click', function() {
  $('.modal').modal()
   $('#main-form')[0].reset() // reset the form

   $('input[name=order_type]').Attr('required')
   $('input[name=order_images]').Attr('required')
   $('input[name=order_cost]').Attr('required')
   $('input[name=order_status]').Attr('required')
   $('input[name=delivery_status]').Attr('required')

   $('#main-form').attr('action', base_url + 'cms/orders/add')
   
 })

 //Deleting
 $('.btn-delete').on('click', function(){

   let p = prompt("Are you sure you want to delete this? Type DELETE to continue", "");
   if (p === 'DELETE') {
     const id = $(this).data('id')
     console.log(id);

     invokeForm(base_url + 'cms/orders/delete', {id: id});
   }

 })

})