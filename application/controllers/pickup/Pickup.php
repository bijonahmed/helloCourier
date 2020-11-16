<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Pickup extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->checkAuth();
        $this->load->library('zend');
        $this->zend->load('Zend/Barcode');
        $this->load->library('Ciqrcode');
    }

    public function getpickupList() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Pickup List";
        $data['marchent'] = $this->QueryModel->getMarchentList();
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['country'] = $this->db->query("SELECT * FROM countries ")->result();
        $data['allState'] = $this->db->query("SELECT * FROM states")->result();
        $data['maincontent'] = $this->load->view('admin/page/booking/pickuplist', $data, true);
        $this->common_templete($data);
    }

    public function getjsondata() {
        $items = $this->QueryModel->getPickupSchedule($this->input->get());
        echo json_encode($items);
    }

 
    public function statusUpdatedata() {
        $items = $this->QueryModel->getbookingInformations($this->input->get());
        echo json_encode($items);
    }

    public function getbookId() {
        $chkBookingId = $this->QueryModel->getBookingCheck($this->input->get());
        echo json_encode($chkBookingId);
    }

    public function geteditBookingData() {
        $pickupId = $this->input->get('pickupId');
        $items = $this->QueryModel->getPickupRow($pickupId);
        echo json_encode($items);
    }

    public function getPickuprow() {
        $pickupId = $this->input->get('pickupId');
        $items = $this->QueryModel->pickuprow($pickupId);
        echo json_encode($items);
    }

    public function getBookingId() {
        $items = $this->QueryModel->getRecivAddress($this->input->get());
        echo json_encode($items);
    }

    public function entry_booking() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Create booking";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/booking/booking_frm', $data, true);
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