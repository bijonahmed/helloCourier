<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Paypal extends CI_Controller{
     function  __construct(){
        parent::__construct();
        // Load paypal library & product model
        $this->load->library('paypal_lib');
        $this->load->model('product');
     }
    function success(){
        // Get the transaction data
        $paypalInfo = $this->input->post();
		$data= array();
		$data['payer_email'] = $paypalInfo['payer_email'];
		$data['payment_status'] = $paypalInfo['payment_status'];
		$data['txn_id'] = $paypalInfo['txn_id'];
		$data['payment_gross'] = $paypalInfo['payment_gross'];
        $data['verify_sign'] = $paypalInfo['verify_sign'];
        $data['cus_id'] = $this->session->userdata('cus_id');
        $custId= $data['cus_id'];
        $payer_email=$data['payer_email'];
        //$txnId = $paypalInfo['txn_id'];
        $this->db->insert('payments',$data);
        $this->db->query("UPDATE `tbl_customer_data` SET `onlinePayment` = 'yes' WHERE `tbl_customer_data`.`cus_id` = $custId ");
        // $service = $this->db->query("SELECT * FROM `payments` WHERE `txn_id` = '$txnId' ")->result();
        // foreach($service as $i){
        //     $texcode =$i->txn_id;
        //     if(empty($texcode)){
        //         $this->db->insert('payments',$data);
        //     }
        // }
        $userEmail= $this->db->query("SELECT email FROM tbl_customer_data WHERE cus_id='$custId'")->row();
        $row = $this->db->query("SELECT * FROM tbl_customer_data LEFT JOIN payments ON (payments.cus_id=tbl_customer_data.cus_id) WHERE tbl_customer_data.cus_id='$custId'")->row();
        $company= $this->QueryModel->getglobalsetting();
        $output = '';
        $output .= "<table width='100%' border='0' align='center'>
        <tr>
          <td colspan='5' valign='top'><div align='center'><small><img src=".base_url($company->image)." alt='company logo' style='height: 100px; width: 150px;' /><br />
      Email:  $company->company_email, Web:  $company->company_web<br />
      Tel:  $company->compnay_phone</small><h3>Payment Receipt</h3></div></td>
        </tr>
        <tr>
          <td width='18%' valign='top'>Booking ID </td>
          <td colspan='4' valign='top'>: $row->bookingId</td>
        </tr>
        <tr>
          <td valign='top'>From Country </td>
          <td width='40%' valign='top'>: $row->fcountryName</td>
          <td width='16%' valign='top'>Payment Amount </td>
          <td width='26%' valign='top'>: $row->payment_gross</td>
        </tr>
        <tr>
          <td valign='top'>To Country </td>
          <td valign='top'>: $row->tcountryName</td>
          <td valign='top'>Payment Status </td>
          <td valign='top'>: $row->payment_status</td>
        </tr>
        <tr>
          <td valign='top'>Paypal Email </td>
          <td valign='top'>: $row->payer_email</td>
          <td valign='top'>Transaction ID </td>
          <td valign='top'>: $row->txn_id</td>
        </tr>
      </table>";
      $to = "$userEmail->email";
      $subject = "Arficargo Payment Confirm";
      $message = "$output";
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= 'From: <sales@africargo.co.uk.com>' . "\r\n";
      mail($to,$subject,$message,$headers);
        $data['menu'] = $this->db->query("SELECT * FROM tbl_menu WHERE status=1 ORDER BY sort ASC")->result();
        $data['setting'] = $this->db->query("SELECT * FROM tbl_global_setting")->row();
		$data['mainContent'] = $this->load->view('paypal/success', $data, true);
        $data['header'] = $this->load->view('fronted/common/header', $data, true);
        $data['footer'] = $this->load->view('fronted/common/footer', $data, true);
        $this->load->view('fronted/index', $data);
    }
     function cancel(){
        // Load payment failed view
        $data['menu'] = $this->db->query("SELECT * FROM tbl_menu WHERE status=1 ORDER BY sort ASC")->result();
        $data['setting'] = $this->db->query("SELECT * FROM tbl_global_setting")->row();
		$data['mainContent'] = $this->load->view('paypal/cancel', $data, true);
        $data['header'] = $this->load->view('fronted/common/header', $data, true);
        $data['footer'] = $this->load->view('fronted/common/footer', $data, true);
        $this->load->view('fronted/index', $data);
     }
     function ipn(){
        // Paypal posts the transaction data
        $paypalInfo = $this->input->post();
        if(!empty($paypalInfo)){
            // Validate and get the ipn response
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);
            // Check whether the transaction is valid
            if($ipnCheck){
                // Insert the transaction data in the database
           $data['payer_email'] = $paypalInfo['payer_email'];
		   $data['payment_status'] = $paypalInfo['payment_status'];
		   $data['txn_id'] = $paypalInfo['txn_id'];
		   $data['payment_gross'] = $paypalInfo['payment_gross'];
		   $data['verify_sign'] = $paypalInfo['verify_sign'];
		   $this->db->insert('payments',$data);
          // $this->product->insertTransaction($data);
            }
        }
    }
}