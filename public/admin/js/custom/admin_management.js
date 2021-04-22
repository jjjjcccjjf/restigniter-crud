$(document).ready(function() {
 //Updating
 $('.edit-row').on('click', function(){
  $('.modal').modal()
   $('#main-form')[0].reset() // reset the form
   const payload = $(this).data('payload')
   console.log(payload);

   $('input[name=name]').removeAttr('required')
   $('input[name=email]').removeAttr('required')
   $('input[name=contact_num]').removeAttr('required')
   $('input[name=password]').removeAttr('required')
   $('input[id=confirm_password]').removeAttr('required')

   $('input[name=name]').val(payload.name)
   $('input[name=email]').val(payload.email)
   $('input[name=contact_num]').val(payload.contact_num)

   // $('select[name=user_type] option').each(function() {
   //   $(this).removeAttr('selected')
   // });
   // $('select[name=user_type] option').filter(function () { return $(this).html() == payload.user_type; }).attr('selected', 'selected')

   $('#main-form').attr('action', base_url + 'cms/admin/update/' + payload.id)
   $('.modal').modal()
 })

 // Adding
 $('.add-btn').on('click', function() {
  $('.modal').modal()
   $('#main-form')[0].reset() // reset the form

   $('input[name=name]').attr('required', 'required')
   $('input[name=email]').attr("required", 'required')
   $('input[name=password]').attr("required", 'required')
   $('input[id=confirm_password]').attr("required", 'required')

   $('#main-form').attr('action', base_url + 'cms/admin/add')
   
 })

 //Deleting
 $('.btn-delete').on('click', function(){

   let p = prompt("Are you sure you want to delete this? Type DELETE to continue", "");
   if (p === 'DELETE') {
     const id = $(this).data('id')
     console.log(id);

     invokeForm(base_url + 'cms/admin/delete', {id: id});
   }

 })

 $('#main-form').on('submit', function (){

   let p = $('input[name=password]').val()
   let cp = $('input[id=confirm_password]').val()

   if (!(p === cp)) {
     alert('Passwords don\'t match')
     return false
   }

 })

})