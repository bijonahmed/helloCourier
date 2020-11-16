<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Merchant extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->checkAuth();
      
    }


    public function getJsonUser() {
        $items = $this->QueryModel->getUserList($this->input->get());
        echo json_encode($items);
    }

    public function get_merchant_list() {
       $this->checkAuth();
        $data = array();
        $data['title'] = "User List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['userrole'] = $this->QueryModel->getUserRoleList();
        $data['maincontent'] = $this->load->view('admin/page/merchant/merchantlist', $data, true);
        $this->common_templete($data);
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
