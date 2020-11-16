<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Marchent extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->checkAuth();
    }

    public function index() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Welcome";
        $data['categoryList'] = $this->QueryModel->getCatListActive();
        $data['trkRpt'] = $this->QueryModel->getMarchentTrackingReport();
        $data['recamount'] = $this->QueryModel->getRecivAmount();
        $data['tbooking'] = $this->QueryModel->getTotalBooking();
        $data['tdelivery'] = $this->QueryModel->getTotalDelivery();
        $data['tpending'] = $this->QueryModel->getTotalPending();
        $data['tcodamt'] = $this->QueryModel->getTotalcodAmut();
        $data['status'] = $this->QueryModel->statuslist();
        $user_id = $this->session->userdata('user_id');
        $data['user_info'] = $this->db->query("SELECT * FROM tbl_user WHERE user_id='$user_id'")->row();
        $data['paymentamt'] = $this->db->query("SELECT SUM(amount) as amount FROM tbl_customer_payment WHERE user_id='$user_id'")->row();
      
        $data['mainContent'] = $this->load->view('marchent/page/mainContent', $data, true);
        $data['navbvar'] = $this->load->view('marchent/common/navbar', $data, true);
        //$data['sidebar'] = $this->load->view('marchent/common/sidebar', $data, true);
        $this->load->view('marchent/index', $data);
    }
    
    public function convertPdf($booking_id){
        $user_id= $this->session->userdata('user_id');
        $result = $this->db->query("SELECT * FROM tbl_user WHERE user_id='$user_id'")->row();
        $data['title'] = "Booking ID:  $booking_id";
        $data['booking_id'] = $booking_id;
        $data['mcompanyname']= $result->company;
        $data['mercheName']= $result->full_name;
        $data['mercheLogo']= $result->image;
        $data['mercheaddress']= $result->address;
        $data['mobile_number']= $result->mobile_number;
        $data['email']= $result->email;
        $data['booking'] = $this->QueryModel->getBookingId($booking_id);
        $mpdf =  new \Mpdf\Mpdf(['autoArabic' => true],['mode' => 'utf-8','format' => 'A4',
                                 'margin_left' => 0.5,
                                 'margin_right' => 0.5,
                                 'margin_top' => 0.5,
                                 'margin_bottom' => 0,
                                 'margin_header' => 0.5,
                                 'margin_footer' => 0.5
                                 ]);
      
        $html = $this->load->view('marchent/page/makepdf',$data,true);
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
        $mpdf->WriteHTML($html);
        $mpdf->Output(); // opens in browser
    }

    public function update_messages(){
        $this->checkAuth();
        $data = array();
        $data['title'] = "Successfully Update";
        $data['mainContent'] = $this->load->view('marchent/page/success', $data, true);
        $data['navbvar'] = $this->load->view('marchent/common/navbar', $data, true);
        $data['sidebar'] = $this->load->view('marchent/common/sidebar', $data, true);
        $this->load->view('marchent/index', $data);
    }

    public function getDeliveryDetails() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Delivery List";
        $data['data'] = $this->QueryModel->getTotalDeliverylist();
        $data['mainContent'] = $this->load->view('marchent/page/getdeliverylist', $data, true);
        $data['navbvar'] = $this->load->view('marchent/common/navbar', $data, true);
        $data['sidebar'] = $this->load->view('marchent/common/sidebar', $data, true);
        $this->load->view('marchent/index', $data);
    }

    public function paymentHistory() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Payment History";
        $data['trkRpt'] = $this->QueryModel->getMarchentTrackingReport();
        $data['data'] = $this->QueryModel->getTotalDeliverylist();
        $data['mainContent'] = $this->load->view('marchent/page/paymenthistory', $data, true);
        $data['navbvar'] = $this->load->view('marchent/common/navbar', $data, true);
        $data['sidebar'] = $this->load->view('marchent/common/sidebar', $data, true);
        $this->load->view('marchent/index', $data);
    }

    public function searchPaymenthistory() {

        $from = date("Y-m-d", strtotime($_POST['txtFromDate']));
        $to = date("Y-m-d", strtotime($_POST['txtToDate']));
        //echo "$from==$to";exit;

        $this->checkAuth();
        $data = array();
        $data['title'] = "Payment History";
        $data['from'] = $from;
        $data['to'] = $to;
        $data['trkRpt'] = $this->QueryModel->getMarchentTrackingReports($from, $to);
        $data['data'] = $this->QueryModel->getTotalDeliverylist();
        $data['mainContent'] = $this->load->view('marchent/page/paymenthistory', $data, true);
        $data['navbvar'] = $this->load->view('marchent/common/navbar', $data, true);
        $data['sidebar'] = $this->load->view('marchent/common/sidebar', $data, true);
        $this->load->view('marchent/index', $data);
    }

    public function getTotalPending() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Pending List";
        $data['data'] = $this->QueryModel->getTotalPendingList();
        $data['mainContent'] = $this->load->view('marchent/page/getdeliverylist', $data, true);
        $data['navbvar'] = $this->load->view('marchent/common/navbar', $data, true);
        $data['sidebar'] = $this->load->view('marchent/common/sidebar', $data, true);
        $this->load->view('marchent/index', $data);
    }

    public function getcodeAmount() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "COD";
        $data['data'] = $this->QueryModel->getTotalCodeList();
        $data['mainContent'] = $this->load->view('marchent/page/getcodeAmountList', $data, true);
        $data['navbvar'] = $this->load->view('marchent/common/navbar', $data, true);
        $data['sidebar'] = $this->load->view('marchent/common/sidebar', $data, true);
        $this->load->view('marchent/index', $data);
    }

    //getTotalUnpaidList

    public function updateMyBooking($booking_id) {
        $this->checkAuth();
        $data['title'] = "Update Booking Frm $booking_id";
        $data['booking_id'] = $booking_id;
        $data['booking'] = $this->QueryModel->getBookingId($booking_id);
        $data['mainContent'] = $this->load->view('marchent/page/updateBookingFrm', $data, true);
        $data['navbvar'] = $this->load->view('marchent/common/navbar', $data, true);
        $data['sidebar'] = $this->load->view('marchent/common/sidebar', $data, true);
        $this->load->view('marchent/index', $data);
    }

    public function update_bookingUser() {

        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->updateBooking($this->input->post());
            redirect("marchent");
        }
    }

    public function update_user() {

        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->updateUser($this->input->post());
            redirect("marchent/update_messages");
        }
    }

    public function updateProfile() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Update Profile";
        $data['user_row'] = $this->QueryModel->getUserInfo();
   
        $data['mainContent'] = $this->load->view('marchent/page/UpdateProfile', $data, true);
        $data['navbvar'] = $this->load->view('marchent/common/navbar', $data, true);
        $data['sidebar'] = $this->load->view('marchent/common/sidebar', $data, true);
        $this->load->view('marchent/index', $data);
    }

    public function checkAuth() {
        if ($this->session->userdata('user_id') == null):
            redirect("marchentLogin");
        endif;
    }

}
