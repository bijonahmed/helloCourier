<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Deliveryreport extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->checkAuth();
    }
    public function index()
    {
        $roleId=$this->session->userdata('role_id');
        $userid=$this->session->userdata('user_id');

        if($roleId==3){
        $this->checkAuth();
        $data = array();
        $data['title'] = "User ID: $userid Delivery Report";
        $data['userId'] =$userid;
        $data['delivery_status'] = $this->QueryModel->deliveryStatus();
        $data['categoryList'] = $this->QueryModel->getCatList();
        $data['deliveryType'] = $this->QueryModel->getDeliveryTypeList();
        $data['totalDv']= $this->QueryModel->getDvCount($userid);
        $data['name'] = $this->db->query("SELECT full_name FROM tbl_user WHERE user_id='$userid'")->row();
        $data['maincontent'] = $this->load->view('admin/page/report/dv/dv_report', $data, true);
        $this->common_templete($data);
    }
    }

    public function deliveryManReport(){

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $userid= $this->input->get('user_id');
        $rpt = $this->QueryModel->makeDeliveryReport($userid);
        echo json_encode($rpt);

        }
    }


    public function common_templete($data = array())
    {
        $this->checkAuth();
        $data['header'] = $this->load->view('admin/common/header', $data, true);
        $data['sidebar'] = $this->load->view('admin/common/sidebar', $data, true);
        $data['footer'] = $this->load->view('admin/common/footer', $data, true);
        $this->load->view('admin/dashboard/index', $data);
    }
    public function checkAuth()
    {
        if ($this->session->userdata('user_id') == null):
            redirect("login");
        endif;
    }
}