<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Deliverysts extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->checkAuth();
    }

    public function senddeliverystsList() {
        $this->checkAuth();
        $deliveryId = $this->session->userdata('delid');
        $data = array();
        $data['title'] = "Delivery Status List";
        $data['marchent'] = $this->QueryModel->getMarchentList();
        $data['delivery_men'] = $this->QueryModel->deliveryMen();
        $data['delivery_status'] = $this->QueryModel->deliveryStatus();
        $data['delivery_status'] = $this->QueryModel->deliveryStatus();
        //$data['deliveryman_id'] = $this->session->userdata('delid');
        $data['maincontent'] = $this->load->view('admin/page/sendeliverysts/deliverystslist', $data, true);
        $this->common_templete($data);
    }
 
 
    public function jsonDeliverymanData() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $items = $this->QueryModel->getBookingInfo($this->input->get());
        echo json_encode($items);
        }
    
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
