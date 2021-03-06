<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Assignto extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->checkAuth();
    }

    public function geAssigntoList() {
        $this->checkAuth();
        $deliveryId = $this->session->userdata('delid');
        $data = array();
        $data['title'] = "Assign To List";
        $data['marchent'] = $this->QueryModel->getMarchentList();
        //$data['delivery_men'] = $this->QueryModel->deliveryMen();
        $data['delivery_men'] = $this->QueryModel->deliveryMenHubWise();
        $data['list'] = $this->QueryModel->SearchByAssignData($deliveryId);
        $data['maincontent'] = $this->load->view('admin/page/assignto/assigntolist', $data, true);
        $this->common_templete($data);
    }
    
    public function geAssigntohubList(){
        $this->checkAuth();
        $deliveryId = $this->session->userdata('delid');
        $data = array();
        $data['title'] = "Assign To Hub List";
        $data['marchent'] = $this->QueryModel->getMarchentList();
        $data['delivery_men'] = $this->QueryModel->getHbuList();
        $data['list'] = $this->QueryModel->SearchByAssignData($deliveryId);
        $data['maincontent'] = $this->load->view('admin/page/assignto/assigntohublist', $data, true);
        $this->common_templete($data);
        
        
    }



    public function deleteAssigntoData($booking_id) {
        $this->db->query("DELETE FROM tbl_booking_assignto WHERE booking_id = '$booking_id'");
        redirect("assignto/assignto/geAssigntoList");
    }

    public function checkingBookingId() {
        $bid=$_GET['booking_id'];
        $result= $this->db->query("SELECT booking_id FROM tbl_booking WHERE 1 AND booking_id LIKE  '%$bid%'")->result();
        echo json_encode($result);
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
