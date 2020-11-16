<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Merchanbill extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->checkAuth();
    }

    public function index() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Merchant Bill";
        $data['user_id'] = "";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['category'] = $this->QueryModel->expensegetCatListInfo();
        $data['subcat'] = $this->QueryModel->expenseGetSubCatList();
        $data['hublist'] = $this->QueryModel->getHbuList();
        $data['maincontent'] = $this->load->view('admin/page/merchent_payment/merchentbillist', $data, true);
        $this->common_templete($data);
    }

    public function getuserId() {
        
        $userid = $_POST['userid'];
        $sdata = array();
        $sdata['userid'] = $userid;
        $this->session->set_userdata($sdata);
        $this->checkAuth();
        
        $data = array();
        $data['title'] = "Merchent Report";
        $data['user_id'] = $userid;
        $data['recamount'] = $this->QueryModel->getRecivAmount();
     
        $data['tdelivery'] = $this->QueryModel->getDeliverybyTotal($userid);
        $data['tpending'] = $this->QueryModel->getTotalPendingbyTotal($userid);
        $data['tcodamt'] = $this->QueryModel->getTotalcodAmut();
        $data['user_info'] = $this->db->query("SELECT * FROM tbl_user WHERE user_id='$userid'")->row();
        $data['trkRpt'] = $this->QueryModel->getMerchent($userid);
        $data['hublist'] = $this->QueryModel->getHbuList();
        $data['maincontent'] = $this->load->view('admin/page/merchent_payment/merchentbillist', $data, true);
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
