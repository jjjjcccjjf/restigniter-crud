$(document).ready(function() {
  //Updating
  $('.edit-row').on('click', function(){
    $('.modal').modal()
    $('#main-form')[0].reset() // reset the form
    const payload = $(this).data('payload')

    $('input[name=name]').removeAttr('required')
    $('input[name=email]').removeAttr('required')
    $('input[name=position]').removeAttr('required')
    $('input[name=contact_num]').removeAttr('required')
    $('input[name=password]').removeAttr('required')
    $('input[id=confirm_password]').removeAttr('required')

    $('input[name=name]').val(payload.name)
    $('input[name=email]').val(payload.email)
    $('input[name=position]').val(payload.position)
    $('input[name=contact_num]').val(payload.contact_num)

    $('select[name=is_superadmin] option').each(function() {
      $(this).removeAttr('selected')
    });
    $('select[name=is_superadmin] option').filter(function () { return $(this).val() == payload.is_superadmin; }).attr('selected', 'selected')

    $('select[name=mall_id] option').each(function() {
      $(this).removeAttr('selected')
    });
    $('select[name=mall_id] option').filter(function () { return $(this).val() == payload.mall_id; }).attr('selected', 'selected')

    $('select[name=role] option').each(function() {
      $(this).removeAttr('selected')
    });
    $('select[name=role] option').filter(function () { return $(this).html() == payload.role; }).attr('selected', 'selected')

    $('#main-form').attr('action', base_url + 'cms/admin/update/' + payload.id)
    
  })

  // Adding
  $('.add-btn').on('click', function() {
    $('.modal').modal()
    $('#main-form')[0].reset() // reset the form

    $('input[name=name]').attr('required', 'required')
    $('input[name=email]').attr("required", 'required')
    $('input[name=role]').attr("required", 'required')
    $('input[name=password]').attr("required", 'required')
    $('input[id=confirm_password]').attr("required", 'required')

    $('#main-form').attr('action', base_url + 'cms/admin/add')

  })

  //Deleting
  $('.btn-delete').on('click', function(){

    let p = prompt("Are you sure you want to delete this? Type DELETE to continue", "");
    if (p === 'DELETE') {
      const id = $(this).data('id')

      invokeForm(base_url + 'cms/admin/delete', {id: id,  __x_uid: x_uid});
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
