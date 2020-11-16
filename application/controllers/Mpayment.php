<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mpayment extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->checkAuth();
    }

    public function getMerchentPaymentList() {
        $userId = $this->session->userdata('u_id');
        $this->checkAuth();
        $data = array();
        $name = $this->db->query("SELECT company,full_name,mobile_number FROM tbl_user WHERE user_id='$userId'")->row();
        $data['title'] = "Payment List [$name->company]";
        $data['name'] = $name;
        $data['trkRpt'] = $this->QueryModel->getMarchentTracReport($userId);
        $data['marchent'] = $this->QueryModel->getMarchentList();
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['total_booking'] = $this->QueryModel->totalbookings();
        $data['total_paid'] = $this->QueryModel->totalPaid();
        $data['total_unpaid'] = $this->QueryModel->totalUnpaid();
        $data['total_watingpickup'] = $this->QueryModel->totalWatingPick();
        $data['draft'] = $this->QueryModel->checkingDraftBooking($userId);
        $data['draftlist'] = $this->QueryModel->checkingBookingList($userId);
        $data['deliveryType'] = $this->QueryModel->getDeliveryTypeList();
        $data['delivery_status'] = $this->QueryModel->deliveryStatus();
        $data['maincontent'] = $this->load->view('admin/page/merchent_payment/paymentlist', $data, true);
        $this->common_templete($data);
    }

    public function marchentpaymentconfirm(){

        $this->checkAuth();
        $data = array();
        $userId = $this->session->userdata('u_id');
        $paid_type = $this->session->userdata('paid_type');
        $name = $this->db->query("SELECT commission,company,full_name,mobile_number FROM tbl_user WHERE user_id='$userId'")->row();
        $data['title'] = "Payment History List [$name->company]";
        $data['name'] = $name;
        $data['user_id'] = $userId;
        $data['paid_type']=$paid_type;
        $data['trkRpt'] = $this->QueryModel->getMarchentStatusPayment($userId,$paid_type);

        $data['categoryList'] = $this->QueryModel->getCatList();
        $data['deliveryType'] = $this->QueryModel->getDeliveryTypeList();
        $data['delivery_status'] = $this->QueryModel->deliveryStatus();
        $this->load->view('admin/page/merchent_payment/confirmpayment', $data);
    }

    public function findMarchentStatus() {

        $this->checkAuth();
        $data = array();
        $userId = $this->session->userdata('u_id');
        $paid_type = $this->input->post('paid_type');
        $sdata=array();
        $sdata['paid_type']=$paid_type;
        $this->session->set_userdata($sdata);
        $name = $this->db->query("SELECT commission,company,full_name,mobile_number FROM tbl_user WHERE user_id='$userId'")->row();
        $data['title'] = "Payment History List [$name->company]";
        $data['name'] = $name;
        $data['user_id'] = $userId;
        $data['paid_type']=$paid_type;
        $data['trkRpt'] = $this->QueryModel->getMarchentStatusPayment($userId,$paid_type);
        $data['categoryList'] = $this->QueryModel->getCatList();
        $data['deliveryType'] = $this->QueryModel->getDeliveryTypeList();
        $data['delivery_status'] = $this->QueryModel->deliveryStatus();
        $data['maincontent'] = $this->load->view('admin/page/merchent_payment/paymenthistorylist', $data, true);
        $this->common_templete($data);
    }

    public function get_merchent_payment_history() {
        $this->checkAuth();
        $userId = $this->session->userdata('u_id');
        $row= $this->db->query("SELECT * FROM tbl_user WHERE user_id='$userId'")->row();
        $userName= $row->user_name; 
        $userPass= $row->password;
        
        $sdata=array();
        $sdata['uName']= $userName;
        $sdata['uPass']=  $userPass;
        $this->session->set_userdata($sdata);
        //$this->loginAccess();
        $name = $this->db->query("SELECT commission,company,full_name,mobile_number FROM tbl_user WHERE user_id='$userId'")->row();
        $data = array();
        $data['title'] = "Payment History List [$name->company]";
        $data['name'] = $name;
        $data['user_id'] = $userId;
        $data['paid_type']="Unpaid";
        $data['trkRpt'] = $this->QueryModel->getMarchentsAdmin($userId);
        $data['delivery_status'] = $this->QueryModel->deliveryStatus();
        $data['categoryList'] = $this->QueryModel->getCatList();
        $data['deliveryType'] = $this->QueryModel->getDeliveryTypeList();
        $data['loginAccess']= 
        $data['maincontent'] = $this->load->view('admin/page/merchent_payment/paymenthistorylist', $data, true);
        $this->common_templete($data);
             
    }
    
    public function loginAccess(){
        redirect("login/checkUserLoginAdmin");
        
    }
    
    

    public function DraftpaymentStore() {
        $this->checkAuth();
        if (isset($_POST['preview'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->QueryModel->addEditSavePaymentsDraft($this->input->post());
                redirect("mpayment/getMerchentPaymentList");
            }
        }
        redirect("mpayment/getMerchentPaymentList");
    }

    public function paymentStore() {
        $this->checkAuth();
        if (isset($_POST['preview'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->QueryModel->confirmPayments($this->input->post());
                //redirect("mpayment/getMerchentPaymentList");
            }
        }
        //redirect("mpayment/getMerchentPaymentList");
    }

    public function deleteDraftData($bookingId) {
        $this->checkAuth();
        $this->db->query("DELETE FROM tbl_payments WHERE bookingId='$bookingId'");
        redirect("mpayment/getMerchentPaymentList");
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