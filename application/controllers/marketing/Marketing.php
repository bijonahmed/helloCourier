<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Marketing extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->checkAuth();
    }

    public function getmarketinglist() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Marketing List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/mkt/mktlist', $data, true);
        $this->common_templete($data);
    }
    
     
    public function getJsonmkt() {
        $items = $this->QueryModel->getmktlist($this->input->get());
        echo json_encode($items);
    }
  

    public function edit_mkt_response(){
      $marketingId= $_GET['marketingId'];
      $row =$this->QueryModel->getmktrow($marketingId);
      echo json_encode($row);
    }
    
   
    
    public function common_templete($data = array()) {
      $this->checkAuth();
      $data['header'] = $this->load->view('admin/common/header', $data, true);
      $data['sidebar'] = $this->load->view('admin/common/sidebar', $data, true);
      $data['footer'] = $this->load->view('admin/common/footer', $data, true);
      $this->load->view('admin/dashboard/index', $data);
    }

    public function checkAuth() {
        if ($this->session->userdata('user_id') == null):
            redirect("login");
        endif;
    }

}