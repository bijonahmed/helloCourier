<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->checkAuth();
    }

    public function index() {
        $this->checkAuth();
        $user_id = $this->session->userdata('user_id');
        $data = array();
        $data['title'] = "Dashboard";
        $data['total_user'] = $this->QueryModel->getTotaluser();
        $data['tmerchant'] = $this->QueryModel->getTotalMerchants();
        $data['all_booking'] = $this->QueryModel->gettodaybooking();
        $data['display_deli_data'] = $this->QueryModel->deliveryData();
        $data['lastsevenday'] = $this->db->query("SELECT `entry_date` FROM `tbl_customer_data` WHERE 1 AND `entry_date` >= NOW() + INTERVAL -7 DAY GROUP BY entry_date ORDER BY entry_date DESC")->result();
        $data['lastsevendaymerchent'] = $this->db->query("SELECT tbl_booking.user_id,tbl_user.company,tbl_user.mobile_number,count(tbl_booking.user_id) as countbooking FROM `tbl_booking` LEFT JOIN tbl_user ON tbl_booking.user_id=tbl_user.user_id group BY tbl_booking.user_id ORDER BY countbooking desc")->result();
        $data['maincontent'] = $this->load->view('admin/page/home', $data, true);
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
