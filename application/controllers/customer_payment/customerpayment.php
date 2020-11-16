<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Customerpayment extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->checkAuth();
    }

    public function getpaymentlist() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Payment List";
        $data['marchent'] = $this->QueryModel->getMarchentList();
        $data['rate'] = $this->QueryModel->getRateJson();
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['status'] = $this->QueryModel->statuslist();
        $data['maincontent'] = $this->load->view('admin/page/payment/paymentlist', $data, true);
        //$data['maincontent'] = $this->load->view('admin/page/booking/bookinglist', $data, true);
        $this->common_templete($data);
    }

 public function geteditcustomerData() {
        $customer_payment_id = $this->input->get('customer_payment_id');
        $items = $this->QueryModel->findCustomerPayment($customer_payment_id);
        echo json_encode($items);
    }
    
    public function getcustomerpayment() {
        $items = $this->QueryModel->getcustomerpaymentlist($this->input->get());
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