<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hub extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->checkAuth();
    }

    public function geHubList() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Hub List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/hub/hublist', $data, true);
        $this->common_templete($data);
    }

    public function getJsonHub() {
        $items = $this->QueryModel->getHubInfo($this->input->get());
        echo json_encode($items);
    }

    public function create_hub() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Create Hub";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/hub/hub_frm', $data, true);
        $this->common_templete($data);
    }

    public function edit_hub_frm() {
      $hubs_id= $_GET['hubs_id'];
      $row= $this->QueryModel->getHub($hubs_id);
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