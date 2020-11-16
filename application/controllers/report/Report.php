<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->checkAuth();
    }
    public function index()
    {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Report";
        $data['userId'] = $this->session->userdata('userId');
        $data['from_date'] = $this->session->userdata('from_date');
        $data['to_date'] = $this->session->userdata('to_date');
        $data['paid_type'] = $this->session->userdata('paid_type');
        $userId = $data['userId'];
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $paid_type = $data['paid_type'];
        $data['user_id'] ="";
        $data['name'] = $this->db->query("SELECT company FROM tbl_user WHERE user_id='$userId'")->row();
        $data['marchent'] = $this->QueryModel->getMarchentList();
        $data['trkRpt'] = $this->QueryModel->getMarchentTrackingReportAdmin($userId, $from_date, $to_date, $paid_type);
        $data['maincontent'] = $this->load->view('admin/page/report/report', $data, true);
        $this->common_templete($data);
    }
    
    
    public function my_earning_report(){
        
        $this->checkAuth();
        $data = array();
        $userId = $this->input->post('user_id');
        $data['title'] = "Report";
        $data['title'] = "Earning Report";
        $data['from_date'] = date("Y-m-d",strtotime($this->input->post('from_date')));
        $data['to_date'] = date("Y-m-d",strtotime($this->input->post('to_date')));
        $data['user_id'] = $this->input->post('user_id');// Merchent Id
        $data['marchent'] = $this->QueryModel->getMarchentList();
        $data['earningRpt'] = $this->QueryModel->getEarningReport($data);
        $data['name'] = $this->db->query("SELECT company FROM tbl_user WHERE user_id='$userId'")->row();
        $data['maincontent'] = $this->load->view('admin/page/report/report', $data, true);
        $this->common_templete($data);
        
        
    }

    public function earning_report(){
        $this->checkAuth();
        $data = array();
        $data['title'] = "Earning Report";
        $data['from_date'] = date("Y-m-d");
        $data['to_date'] =date("Y-m-d");
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $data['condition']=0;
        $data['user_id'] = "";
        $data['delivery_id'] = "";
        $data['marchent'] = $this->QueryModel->getMarchentList();
        $data['delivery_men'] = $this->QueryModel->deliveryMen();
        $data['delivery_status'] = $this->QueryModel->deliveryStatus();
        $data['deliveryType'] = $this->QueryModel->getDeliveryTypeList();
        $data['categoryList'] = $this->QueryModel->getCatList();
        $data['earningRpt'] = $this->QueryModel->getDeliveryReport($from_date, $to_date);
        $data['maincontent'] = $this->load->view('admin/page/report/earning_report', $data, true);
        $this->common_templete($data);
    }

    public function setdeliveryReport(){
        $data=array();
        $data['title'] = "Earning Report";
        $data['from_date'] = date("Y-m-d",strtotime($this->input->post('from_date')));
        $data['to_date'] = date("Y-m-d",strtotime($this->input->post('to_date')));
        $data['user_id'] = $this->input->post('user_id');// Merchent Id
        $data['delivery_id'] = $this->input->post('delivery_man_id');
        $data['condition']=1;
        $data['marchent'] = $this->QueryModel->getMarchentList();
        $data['delivery_men'] = $this->QueryModel->deliveryMen();
        $data['delivery_status'] = $this->QueryModel->deliveryStatus();
        $data['earningRpt'] = $this->QueryModel->getEarningReport($data);
        $data['deliveryType'] = $this->QueryModel->getDeliveryTypeList();
        $data['categoryList'] = $this->QueryModel->getCatList();
        $data['maincontent'] = $this->load->view('admin/page/report/earning_report', $data, true);
        $this->common_templete($data);
       
    }


    public function setReportData()
    {
        $sdata = array();
        $sdata['userId'] = $this->input->get('user_id');
        $sdata['from_date'] = $this->input->get('from_date');
        $sdata['to_date'] = $this->input->get('to_date');
        $sdata['paid_type'] = $this->input->get('paid_type');
        $this->session->set_userdata($sdata);
    }
    public function customer_balance()
    {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Customer Balance";
        $data['userId'] = $this->session->userdata('userId');
        $data['from_date'] = $this->session->userdata('from_date');
        $data['to_date'] = $this->session->userdata('to_date');
        $data['paid_type'] = $this->session->userdata('paid_type');
        $userId = $data['userId'];
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $paid_type = $data['paid_type'];
        $data['name'] = $this->db->query("SELECT company FROM tbl_user WHERE user_id='$userId'")->row();
        $data['marchent'] = $this->QueryModel->getMarchentList();
        $data['trkRpt'] = $this->QueryModel->getMarchentReport();
        $data['deliveryType'] = $this->QueryModel->getDeliveryTypeList();
        $data['categoryList'] = $this->QueryModel->getCatList();
        $data['maincontent'] = $this->load->view('admin/page/report/customer_balance', $data, true);
        $this->common_templete($data);
    }

    public function log_report(){
        $data=array();
        $data['title'] = "Log Report";
        $data['maincontent'] = $this->load->view('admin/page/report/logreport', $data, true);
        $this->common_templete($data);

    }

    public function getLogReport(){
        $sql=$this->db->query("SELECT tbl_user.full_name,tbl_user_role.role_name,tbl_logdata.action,tbl_logdata.details,
                              tbl_logdata.logId,tbl_logdata.date_time FROM `tbl_logdata` LEFT JOIN tbl_user ON (tbl_user.user_id=tbl_logdata.user_id)
                              LEFT JOIN tbl_user_role ON (tbl_user_role.role_id=tbl_logdata.role_id) ORDER BY tbl_logdata.logId DESC")->result();
        echo json_encode($sql);


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