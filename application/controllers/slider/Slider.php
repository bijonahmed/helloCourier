<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slider extends CI_Controller {

    public function __construct() {

        parent::__construct();
        if ($this->session->userdata('user_id') == null):
            redirect("login");
        endif;
    }

    public function getJsonSlider() {
        $items = $this->QueryModel->getsliderList($this->input->get());
        echo json_encode($items);
    }

    public function index() {
        $data = array();
        $data['title'] = "Slider List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/slider/slider', $data, true);
        $this->common_templete($data);
    }

    public function add_slider() {

        $data = array();
        $data['title'] = "Add Slider";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        //$data['categoryList'] = $this->QueryModel->getCatList();
        $data['maincontent'] = $this->load->view('admin/page/slider/addslider', $data, true);
        $this->common_templete($data);
    }

    public function edit_slider_frm($slider_id) {

        $data = array();
        $data['title'] = "Edit Slider";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['slider_row'] = $this->QueryModel->getsliderRow($slider_id);
        // echo '<pre>';
        // print_r($data['slider_row']);exit;
        $data['maincontent'] = $this->load->view('admin/page/slider/addslider', $data, true);
        $this->common_templete($data);
    }

    public function common_templete($data = array()) {
        $data['header'] = $this->load->view('admin/common/header', $data, true);
        $data['sidebar'] = $this->load->view('admin/common/sidebar', $data, true);
        $data['footer'] = $this->load->view('admin/common/footer', $data, true);
        $this->load->view('admin/dashboard/index', $data);
    }

}
