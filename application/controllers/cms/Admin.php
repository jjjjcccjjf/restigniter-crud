<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('cms/admin_model');
  }

  public function index()
  {
    $this->dashboard();
  }

  public function dashboard()
  {
    $res = $this->admin_model->all();

    $data['res'] = $res;
    $this->wrapper('cms/index', $data);
  }

  public function add()
  {
    if($this->admin_model->add($this->input->post(null, true))){
      $this->session->set_flashdata('flash_msg', ['message' => 'User added successfully', 'color' => 'green']);
    } else {
      $this->session->set_flashdata('flash_msg', ['message' => 'Error adding user. Email already exists.', 'color' => 'red']);
    }
    $this->admin_redirect('cms');
  }

}
