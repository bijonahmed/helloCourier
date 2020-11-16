<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->checkAuth();
    }

    public function index() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Menu List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/menu_setting/menulist', $data, true);
        $this->common_templete($data);
    }

       public function getmenuJson() {
        $items = $this->QueryModel->getMenuListInfo($this->input->get());
        echo json_encode($items);
    }

    public function create_menu() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Create menu";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/menu_setting/menu_frm', $data, true);
        $this->common_templete($data);
    }

    public function edit_menu_frm() {
         $menu_id = $_GET['menu_id'];
         $row = $this->QueryModel->getMenuRowEdit($menu_id);
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
