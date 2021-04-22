<?php

class Admin_model extends Admin_core_model
{

  function __construct()
  {
    parent::__construct();

    $this->table = 'admin'; # Replace these properties on children
    $this->upload_dir = 'admin'; # Replace these properties on children
    $this->per_page = 15;
  }

  // public function add($data)
  // {
  // 	$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
  //   $this->db->insert($this->table, $data);
  //   return $this->db->insert_id();
  // }

}
