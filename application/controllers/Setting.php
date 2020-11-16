<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->checkAuth();
    }

    public function mysetting() {
        $this->checkAuth();
        $data = array();
        $data['user_id'] = '';
        $data['title'] = "Global Setting";
        $data['data'] = $this->QueryModel->getglobalsetting();
        $data['maincontent'] = $this->load->view('admin/page/message/globalsetting', $data, true);
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
