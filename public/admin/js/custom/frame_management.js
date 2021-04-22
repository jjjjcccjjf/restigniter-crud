$(document).ready(function() {
 //Updating
 $('.edit-row').on('click', function(){
  $('.modal').modal()
   $('#main-form')[0].reset() // reset the form
   const payload = $(this).data('payload')
   console.log(payload);

   $('input[name=frame_type]').removeAttr('required')
   $('input[name=frame_image]').removeAttr('required')

   $('input[name=frame_type]').val(payload.frame_type)
   $('#preview').attr('src', payload.frame_image)

   // $('select[name=user_type] option').each(function() {
   //   $(this).removeAttr('selected')
   // });
   // $('select[name=user_type] option').filter(function () { return $(this).html() == payload.user_type; }).attr('selected', 'selected')

   $('#main-form').attr('action', base_url + 'cms/frames/update/' + payload.frame_id)
   $('.modal').modal()
 })

 // Adding
 $('.add-btn').on('click', function() {
  $('.modal').modal()
   $('#main-form')[0].reset() // reset the form

   $('input[name=frame_type]').attr('required', 'required')
   $('input[name=frame_image]').attr("required", 'required')

   $('#main-form').attr('action', base_url + 'cms/frames/add')
   
 })

 //Deleting
 $('.btn-delete').on('click', function(){

   let p = prompt("Are you sure you want to delete this? Type DELETE to continue", "");
   if (p === 'DELETE') {
     const id = $(this).data('id')
     console.log(id);

     invokeForm(base_url + 'cms/frames/delete', {id: id});
   }

 })

})