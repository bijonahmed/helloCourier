<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Status_update extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->checkAuth();
    }

    public function statuslist() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Status Update List";
        $dvstatus = $this->QueryModel->deliveryStatus();
        array_shift($dvstatus); 
        $data['delivery_status']=$dvstatus;
        $data['maincontent'] = $this->load->view('admin/page/statusupdate/statusupdate', $data, true);
        $this->common_templete($data);
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
