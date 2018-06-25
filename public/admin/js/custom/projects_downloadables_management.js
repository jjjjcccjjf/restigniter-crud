$(document).ready(function() {

  // Adding
  $('.add-btn').on('click', function() {
    $('form')[0].reset() // reset the form

    $('input[type=file]').attr("required", 'required')
    $('input[type=text]').attr("required", 'required')

    let project_id = $('input[type=hidden]').val();

    $('form').attr('action', base_url + 'admin/projects_downloadables/add' + '?p=' + project_id)
    $('.modal').modal()
  })

  //Deleting
  $('.btn-delete').on('click', function(){
    if (confirm("Are you sure you want to delete this?")) {
      const id = $(this).data('id')
      const project_id = $('input[type=hidden]').val();
      invokeForm(base_url + 'admin/projects_downloadables/delete', {id: id, project_id: project_id});
    }
  })

})
