<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bookingupdate extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->checkAuth();
    }

    public function index() {
        $this->checkAuth();
        $data = array();
        $data['user_id'] = '';
        $data['title'] = "Status Update List";
        $delivery_status = $this->QueryModel->deliveryStatus();
        array_shift($delivery_status);
        $data['delivery_status'] = $delivery_status;
        $data['status'] = $this->QueryModel->getstatus();
        $roleid = $this->session->userdata('role_id');
        $data['delivery_men'] = $this->QueryModel->deliveryMenHubWise();
        $data['list'] = $this->QueryModel->SearchByBookingData();
        $data['maincontent'] = $this->load->view('admin/page/bookingupdate/bookingupdatelist', $data, true);
        $this->common_templete($data);
    }

    public function checkstatusUpdate() {
        $userid = $_GET['user_id'];
        $data['title'] = "Booking Update List Admin ID [$userid]";
        $data['user_id'] = $_GET['user_id'];
        $data['hubs_id'] = $_GET['hubs_id'];
        $data['cod'] = $this->QueryModel->getcodsumvals($userid);
        $data['list'] = $this->QueryModel->getBookingDvMan($this->input->get());
        $data['checksts'] = $this->QueryModel->checkUpdateStatus($userid);
        $data['status'] = $this->QueryModel->getstatus();
        $data['name'] = $this->QueryModel->getdvmanName($userid);
        $data['hubrole'] = $this->QueryModel->getHbuList();
        $data['delivery_men'] = $this->QueryModel->deliverymanlist();
     
        $data['maincontent'] = $this->load->view('admin/page/bookingupdate/update_booking', $data, true);
        $this->common_templete($data);
    }

    public function checkbookingstatus() {

        $data = array();
        $data['title'] = "Booking Update List";
        $userid = $this->session->userdata('uid');
        $data['hubrole'] = $this->QueryModel->getHbuList();
        $data['user_id'] = '';
        $data['hubs_id'] = '';
        $data['checksts'] = $this->QueryModel->checkUpdateStatus($userid);
        $data['cod'] = '';
        $data['maincontent'] = $this->load->view('admin/page/bookingupdate/update_booking', $data, true);
        $this->common_templete($data);
    }

    public function getDvData() {
        $items = $this->QueryModel->getBookingDvMan($this->input->get());
        echo json_encode($items);
    }

    public function findbookingdv() {
        $userid = $_POST['user_id'];
        //echo $userid;
        $data['title'] = "Booking Update List Admin ID [$userid]";
        $data['user_id'] = $_POST['user_id'];
        $data['list'] = $this->QueryModel->getBookingDvMan($this->input->post());
        $data['checksts'] = $this->QueryModel->checkUpdateStatus($userid);
        $data['status'] = $this->QueryModel->getstatus();
        $data['name'] = $this->QueryModel->getdvmanName($userid);
        $data['delivery_men'] = $this->QueryModel->deliveryMenHubWise();
        $delivery_status = $this->QueryModel->deliveryStatus();
        array_shift($delivery_status);
        $data['delivery_status'] = $delivery_status;
        $sdata = array();
        $sdata['uid'] = $_POST['user_id'];
        $sdata['msg'] = "successfully upate booking status";
        $this->session->set_userdata($sdata);
        $data['maincontent'] = $this->load->view('admin/page/bookingupdate/bookingupdatelist', $data, true);
        $this->common_templete($data);
    }

    public function bookingstatusupdate() {
        $data = array();
        $userid = $this->session->userdata('uid');
        $data['checksts'] = $this->QueryModel->checkUpdateStatus($userid);
        $this->load->view('admin/page/bookingupdate/statusupdatebooking', $data);
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
