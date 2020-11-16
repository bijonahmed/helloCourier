<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Customerdue extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->checkAuth();
    }

    public function getcustomerdue() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Customer Due List";
        $data['marchent'] = $this->QueryModel->getMarchentList();
        $data['rate'] = $this->QueryModel->getRateJson();
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['status'] = $this->QueryModel->statuslist();
        $data['maincontent'] = $this->load->view('admin/page/payment/duelist', $data, true);
        //$data['maincontent'] = $this->load->view('admin/page/booking/bookinglist', $data, true);
        $this->common_templete($data);
    }

 public function geteditcustomerdueData() {
        $customer_due_id = $this->input->get('customer_due_id');
        $items = $this->QueryModel->findCustomerDue($customer_due_id);
        echo json_encode($items);
    }
    
    public function getcustomerdues() {
        $items = $this->QueryModel->getcustomerlist($this->input->get());
        echo json_encode($items);
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