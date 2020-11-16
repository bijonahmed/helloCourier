<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Booking extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->checkAuth();
        $this->load->library('zend');
        $this->zend->load('Zend/Barcode');
        
        $this->load->library('Ciqrcode');
        // $this->ciqrcode->library('Ciqrcode/qrencode');
        
    }

    public function getbookingList() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Booking List";
        $data['marchent'] = $this->QueryModel->getMarchentList();
        $data['rate'] = $this->QueryModel->getRateJson();
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['status'] = $this->QueryModel->statuslist();
        $data['maincontent'] = $this->load->view('admin/page/booking/bookinglistnew', $data, true);
        //$data['maincontent'] = $this->load->view('admin/page/booking/bookinglist', $data, true);
        $this->common_templete($data);
    }

    public function deleteBooking($booking_id) {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Delete booking";
        $data['booking_id'] = strip_tags($booking_id);
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/booking/deleteMsgBooking', $data, true);
        $this->common_templete($data);
    }

    public function deleteBookings() {
        $this->checkAuth();
        // 0= Not delete, 1= delete
        $booking_id = $this->input->post('booking_id');
        $this->db->query("UPDATE tbl_booking SET delete_status=1 WHERE booking_id=$booking_id ");
        redirect("booking/booking/getbookingList");
    }

    public function getjsondata() {
        $items = $this->QueryModel->getBookingInfo($this->input->get());
        echo json_encode($items);
    }
    
    public function getPercelData(){
        $items = $this->QueryModel->perceldata($this->input->get());
                 
        $output = '';
        $sl = 1;
          foreach ($items as $row) {
            $output .= "
            <tr>
            <td><center>$sl</center></td>
            <td><center>$row->qty</center></td>
            <td><center>$row->weight</center></td>
            <td><center>$row->length</center></td>
            <td><center>$row->height</center></td>
            <td><center>$row->type</center></td>
            </tr>";
            $sl++;
          }

        $data = array(
                'table_data' => $output,
            );
            echo json_encode($data);
        
    }

    public function getPaymentReceipt($cus_id){

        $data = array();
        $data['title'] = "Payment Receipt";
        $data['row'] = $this->QueryModel->getPaymentReceipt($cus_id);
        $data['company'] = $this->QueryModel->getglobalsetting();
        $data['maincontent'] = $this->load->view('admin/page/booking/PaymentReceipt', $data, true);
        //$data['maincontent'] = $this->load->view('admin/page/booking/bookinglist', $data, true);
        $this->common_templete($data);


    }
    
    public function printBookingData($cus_id){
        
   
        $this->checkAuth();

        $data = array();
        $data['title'] = "Print";
        $data['row'] = $this->QueryModel->getbookingRowEdit($cus_id);
        $data['history']  = $this->QueryModel->customerhistory($cus_id);
        $data['company'] = $this->QueryModel->getglobalsetting();
        $data['maincontent'] = $this->load->view('admin/page/booking/printBarcode', $data, true);
        //$data['maincontent'] = $this->load->view('admin/page/booking/bookinglist', $data, true);
        $this->common_templete($data);
        
    }

    public function set_barcode($bookingid){
		return Zend_Barcode::render('code128', 'image', array('text'=>$bookingid), array());
    }
    public function set_qrcode($bookingid){
        
        QRcode::png(
        $bookingid,
        $outfile = false,
        $level = QR_ECLEVEL_H,
        $size = 4,
        $margin = 2
       );
        
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
        $booking_id = $this->input->get('booking_id');
        $items = $this->QueryModel->findbookingId($booking_id);
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

    public function create_booking() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Create booking";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/booking/booking_frm', $data, true);
        $this->common_templete($data);
    }

    public function entry_booking() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Create booking";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/booking/booking_frm', $data, true);
        $this->common_templete($data);
    }

    public function getpickuplist() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Pickup List";
        $data['marchent'] = $this->QueryModel->getMarchentList();
        //$data['role_name'] = $this->QueryModel->getUserRoleName();
        //$data['total_booking'] = $this->QueryModel->totalbookings();
        //$data['total_paid'] = $this->QueryModel->totalPaid();
        //$data['total_unpaid'] = $this->QueryModel->totalUnpaid();
        //$data['total_watingpickup'] = $this->QueryModel->totalWatingPick();
        $data['delivery_men'] = $this->QueryModel->deliveryMen();
        //echo '<pre>';
        //print_r($data['delivery_men']);exit;
        $data['delivery_status'] = $this->QueryModel->deliveryStatus();
        $data['picklist'] = $this->QueryModel->pickupmanlists();
        $data['hublist'] = $this->QueryModel->getHbuList();

        //  $data['deliveryType'] = $this->QueryModel->getDeliveryTypeList();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['maincontent'] = $this->load->view('admin/page/booking/pickuplist', $data, true);
        $this->common_templete($data);
    }

    public function edit_booking_frm($booking_id) {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Edit -$booking_id";
        $data['marchent'] = $this->QueryModel->getMarchentList();
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['booking_row'] = $this->QueryModel->getbookingRowEdit($booking_id);
        $data['delivery_men'] = $this->QueryModel->deliveryMen();
        $data['delivery_status'] = $this->QueryModel->deliveryStatus();
        $data['categoryList'] = $this->QueryModel->getCatList();
        $data['deliveryType'] = $this->QueryModel->getDeliveryTypeList();
        $data['role_id'] = $this->session->userdata('role_id');
        $data['hublist'] = $this->QueryModel->getHbuList();
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