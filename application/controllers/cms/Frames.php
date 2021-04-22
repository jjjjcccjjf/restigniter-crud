<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frames extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('cms/Frame_model');
  }

  public function index()
  {
    $this->dashboard();
  }

  public function dashboard()
  {
    $res = $this->Frame_model->all();

    $data['res'] = $res;
    $this->wrapper('cms/frames', $data);
  }

  public function add()
  {
  
    if($this->Frame_model->add(array_merge($this->input->post(null, true),$this->Frame_model->upload('frame_image')))){
     $this->session->set_flashdata('flash_msg', ['message' => 'New Frame added successfully', 'color' => 'green']);
   } else {
     $this->session->set_flashdata('flash_msg', ['message' => 'Error Saving Frame', 'color' => 'red']);
   }
   $this->admin_redirect('cms/frames');
  }

  public function update($id)
  {
    if($this->Frame_model->update($id, array_merge($this->input->post(null, true),$this->Frame_model->upload('frame_image')))){
     $this->session->set_flashdata('flash_msg', ['message' => 'Frame updated successfully', 'color' => 'green']);
   } else {
     $this->session->set_flashdata('flash_msg', ['message' => 'Error updating Frame.', 'color' => 'red']);
   }
   $this->admin_redirect('cms/frames');
  }

  public function delete()
  {
    if($this->Frame_model->delete($this->input->post('id'))){
     $this->session->set_flashdata('flash_msg', ['message' => 'Frame deleted successfully', 'color' => 'green']);
   } else {
     $this->session->set_flashdata('flash_msg', ['message' => 'Error deleting Frame.', 'color' => 'red']);
   }
   $this->admin_redirect('cms/frames');
  }
  
}
