<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class ExpenseModel extends CI_Model {

  

    public function addEditSave($data) {
        $result = array();
       
        if (empty($data['expense_id'])) {
            $this->db->insert('tbl_expense', $data);
            $result['msg'] = "Successfully Save.";
        } else {
            $this->db->where('expense_id', $data['expense_id']);
            $this->db->update('tbl_expense', $data);
            $result['msg'] = "Successfully Update.";
        }
    }
  

    public function addEditSavePaymentsDraft($data = array()) {
        $result = array();
        $u_id = $this->session->userdata('u_id');
        $bookingId = $data['bookingId'];
        $payment_date = date("Y-m-d");
        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        $paymentDateTime = $dt->format('F j, Y, g:i a');
        $paymentStatus = "Draft";
        if (!empty($bookingId > 0)) {
            $temp = count($bookingId);
            for ($i = 0; $i < $temp; $i++) {
                $data2[] = array(
                    'bookingId' => $bookingId[$i],
                    'user_id' => $u_id,
                    'payment_date' => $payment_date,
                    'paymentDateTime' => $paymentDateTime,
                    'rec_payment_status' => $paymentStatus,
                );
            }
            $this->db->insert_batch('tbl_payments', $data2);
            $sdata['payemnts'] = "Draft";
            $this->session->set_userdata($sdata);
            return $result;
        } else {
            $sdata['payemnts'] = "Please checkbox selected.";
            $this->session->set_userdata($sdata);
        }
    }

    public function confirmPayments($data = array()) {
        echo "working";
    }

    public function getMarchentStatusPayment($userId, $paid_type) {
        $sql = $this->db->query("SELECT * FROM tbl_booking WHERE paid_type='$paid_type' AND user_id='$userId' ")->result();
        return $sql;
    }

    public function getDvCount($userid) {
        // echo '<pre>';
        // print_r($userid);exit;
        $sql = $this->db->query("SELECT booking_id FROM tbl_booking_assignto  WHERE user_id='$userid'")->result();
        return $sql;
    }

    public function makeDeliveryReport($userid) {
        $sql = $this->db->query("SELECT tbl_booking_assignto.assign_date,tbl_booking_assignto.booking_id,tbl_booking_assignto.user_id,tbl_booking.paid_type,tbl_booking.status,tbl_booking.date,tbl_user.company ,tbl_booking.reciver_name,tbl_booking.collection_amount FROM tbl_booking_assignto
            LEFT JOIN tbl_booking ON (tbl_booking.booking_id=tbl_booking_assignto.booking_id)
            LEFT JOIN tbl_user ON (tbl_user.user_id=tbl_booking_assignto.user_id)
            WHERE 1 AND tbl_booking_assignto.user_id='$userid' ")->result();
        return $sql;
    }

    public function getMarchentsAdmin($userId) {
        $result = $this->db->query("SELECT * FROM `tbl_booking` WHERE user_id='$userId' AND paid_type='Unpaid' AND delete_status='0' ORDER by booking_id DESC")->result();
        //$result = $this->db->query("SELECT * FROM `tbl_booking` WHERE user_id='$userId' AND paid_type='Unpaid' AND delete_status='0' AND NOT `status` IN ('Waiting for Pickup','In transit')  ORDER by booking_id DESC")->result();
        return $result;
    }
    
   

    public function addEditSavebUpdate($data = array()) {
        if (empty($data['b_update_id'])) {
            $data['updatedate'] = date("Y-m-d");
            $data['sts'] = '0';
            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            $data['date_time'] = $dt->format('F j, Y, g:i a');
            $this->db->insert('tbl_booking_update', $data);
            $sdata = array();
            $sdata['dvsts'] = $data['status'];
            $this->session->set_userdata($sdata);
        } else {
            $bookingid = $data['booking_id'];
            echo '<pre>';
            print_r($bookingId);
            exit;
            foreach ($bookingid as $bid) {
                // $this->db->query("UPDATE tbl_booking_assignto SET status = '1' WHERE tbl_booking_assignto.user_id='$uid'");
                // $this->db->query("UPDATE tbl_booking SET tbl_booking.status = 'In transit' WHERE tbl_booking.booking_id='$bid'");
                //$this->db->query("UPDATE tbl_booking SET tbl_booking.deliveryman = '$deliveryManName->full_name' WHERE tbl_booking.booking_id='$bid'");
            }
        }
    }

    

}
