<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Deliverytype extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->checkAuth();
    }

    public function getDeliveryList() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Delivery Type List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/deliverytype/deliverytypelist', $data, true);
        $this->common_templete($data);
    }

    public function getJsonDataType() {
        $items = $this->QueryModel->getDataTypeListInfo($this->input->get());
        echo json_encode($items);
    }

    public function create_delivery_type() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Create Delivery Type ";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['categoryList'] = $this->QueryModel->getCatList();
        $data['maincontent'] = $this->load->view('admin/page/deliverytype/deliverytype_frm', $data, true);
        $this->common_templete($data);
    }

    public function edit_deliverty_frm($deliverytype_id) {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Edit Category";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['categoryList'] = $this->QueryModel->getCatList();
        $data['row'] = $this->QueryModel->getDeliveryTypeRowEdit($deliverytype_id);
        $data['maincontent'] = $this->load->view('admin/page/deliverytype/deliverytype_frm', $data, true);
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
