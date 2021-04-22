<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('cms/Order_model');
  }

  public function index()
  {
    $this->dashboard();
  }

  public function dashboard()
  {
    $res = $this->Order_model->all();

    $data['res'] = $res;
    $this->wrapper('cms/orders', $data);
  }

  public function add()
  {
  
    if($this->Order_model->add($this->input->post(null, true))){
     $this->session->set_flashdata('flash_msg', ['message' => 'Order Added Successfully', 'color' => 'green']);
   } else {
     $this->session->set_flashdata('flash_msg', ['message' => 'Error adding Order', 'color' => 'red']);
   }
   $this->admin_redirect('cms/orders');
  }

  public function update($id)
  {
    if($this->Order_model->update($id, $this->input->post(null, true))){
     $this->session->set_flashdata('flash_msg', ['message' => 'Order updated Successfully', 'color' => 'green']);
   } else {
     $this->session->set_flashdata('flash_msg', ['message' => 'Error updating Order.', 'color' => 'red']);
   }
   $this->admin_redirect('cms/orders');
  }

  public function delete()
  {
    if($this->Order_model->delete($this->input->post('id'))){
     $this->session->set_flashdata('flash_msg', ['message' => 'Order deleted successfully', 'color' => 'green']);
   } else {
     $this->session->set_flashdata('flash_msg', ['message' => 'Error deleting Order.', 'color' => 'red']);
   }
   $this->admin_redirect('cms/orders');
  }
  
}
