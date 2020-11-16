<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class QueryModel extends CI_Model {
    public function insertLogodata($logdata) {
        $this->db->insert('tbl_logdata', $logdata);
    }
    public function updatesetting($data) {
        $img= $_FILES["image"]["name"];///$data['image'];
        if(!empty($img)){
                $target_dir = "resource/fronted/assets/images/";
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                // Image 1
                $target_file = $target_dir . basename($_FILES["image"]["name"]);
                $uploadOk = 1;
               if(!empty($target_file)){
                     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                }
                $check = getimagesize($_FILES["image"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
                        $data['image'] = "resource/fronted/assets/images/" . basename($_FILES["image"]["name"]);
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
        } 
        // Footer top image
         $footer_top_image= $_FILES["footer_top_image"]["name"];
         if(!empty($footer_top_image)){
            $target_file = $target_dir . basename($_FILES["footer_top_image"]["name"]);
            $uploadOk = 1;
           if(!empty($target_file)){
                 $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            }
            $check = getimagesize($_FILES["footer_top_image"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["footer_top_image"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["footer_top_image"]["name"]) . " has been uploaded.";
                    $data['footer_top_image'] = "resource/fronted/assets/images/" . basename($_FILES["footer_top_image"]["name"]);
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
         }
        // Why Choose Us
         $why_choose_img= $_FILES["why_choose_img"]["name"];
      if(!empty($why_choose_img)){
                $target_file = $target_dir . basename($_FILES["why_choose_img"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $check = getimagesize($_FILES["why_choose_img"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                } else {
                    if (move_uploaded_file($_FILES["why_choose_img"]["tmp_name"], $target_file)) {
                        echo "The file " . basename($_FILES["why_choose_img"]["name"]) . " has been uploaded.";
                        $data['why_choose_img'] = "resource/fronted/assets/images/" . basename($_FILES["why_choose_img"]["name"]);
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
                // Are You Ready To Move Background Img
                $target_file = $target_dir . basename($_FILES["readytobgimg"]["name"]);
                $uploadOk = 1;
                if(!empty($target_file)){
                     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                }
                $check = getimagesize($_FILES["readytobgimg"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                } else {
                    if (move_uploaded_file($_FILES["readytobgimg"]["tmp_name"], $target_file)) {
                        echo "The file " . basename($_FILES["readytobgimg"]["name"]) . " has been uploaded.";
                        $data['readytobgimg'] = "resource/fronted/assets/images/" . basename($_FILES["readytobgimg"]["name"]);
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            } 
        //Banner image
         $bn_image= $_FILES["bn_image"]["name"];
      if(!empty($bn_image)){
            $target_file = $target_dir . basename($_FILES["bn_image"]["name"]);
            $uploadOk = 1;
            if(!empty($target_file)){
                 $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            }
            $check = getimagesize($_FILES["bn_image"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["bn_image"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["bn_image"]["name"]) . " has been uploaded.";
                    $data['bn_image'] = "resource/fronted/assets/images/" . basename($_FILES["bn_image"]["name"]);
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
      } 
        //echo '<pre>';
        //print_r($data);
        $this->db->where('setting_id', 1);
        $this->db->update('tbl_global_setting', $data);
        $msg = "Successfully Update.";
        return $msg;
    }
    public function addEditPost($data) {
        $result = array();
        $target_dir = "resource/fronted/assets/images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
                $data['image'] = "resource/fronted/assets/images/" . basename($_FILES["image"]["name"]);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        if (empty($data['post_id'])) {
            $this->db->insert('tbl_post', $data);
            $result['msg'] = "Successfully Save.";
        } else {
            $this->db->where('post_id', $data['post_id']);
            $this->db->update('tbl_post', $data);
            $result['msg'] = "Successfully Update.";
        }
    }
    
       public function addRateEdit($data = array()) {
         $result = array();
        if (empty($data['rate_id'])) {
            $name= $data['name'];
            $id= $this->db->query("SELECT * FROM tbl_rate WHERE name='$name'")->row();
            if(!empty($id->rate_id)){
             $result['exits'] = "exits";   
            }else{
            $this->db->insert('tbl_rate', $data);
            $result['save'] = "save";
            }
        } else {
            $this->db->where('rate_id', $data['rate_id']);
            $this->db->update('tbl_rate', $data);
           $result['update'] = "update";
        }
        return $result;
    }
    
    public function addeditcustomerPayment($data = array()){
        
            $result = array();
        if (empty($data['customer_payment_id'])) {
            $this->db->insert('tbl_customer_payment', $data);
            $result['save'] = "save";
             
        } else {
            $this->db->where('customer_payment_id', $data['customer_payment_id']);
            $this->db->update('tbl_customer_payment', $data);
           $result['update'] = "update";
        }
        return $result;
        
        
    }
    
     public function addCategoryEdit($data = array()) {
         $result = array();
        if (empty($data['category_id'])) {
            $name= $data['category_name'];
            $id= $this->db->query("SELECT * FROM tbl_category WHERE category_name='$name'")->row();
            if(!empty($id->category_id)){
             $result['exits'] = "exits";   
            }else{
            $this->db->insert('tbl_category', $data);
            $result['save'] = "save";
            }
        } else {
            $this->db->where('category_id', $data['category_id']);
            $this->db->update('tbl_category', $data);
           $result['update'] = "update";
        }
        return $result;
    }
     public function addHubEdit($data = array()) {
        $result = array();
        if (empty($data['hubs_id'])) {
            $name= $data['hubsname'];
            $id= $this->db->query("SELECT * FROM tbl_hubs WHERE hubsname='$name'")->row();
            if(!empty($id->hubs_id)){
           $result['exits'] = "exits";    
            }else{
            $this->db->insert('tbl_hubs', $data);
             $result['save'] = "save";
            }
        } else {
            $this->db->where('hubs_id', $data['hubs_id']);
            $this->db->update('tbl_hubs', $data);
            $result['update'] = "update";
        }
         return $result;
    }
        public function getshippingcalId($data = array()){
        $id=$data['id'];
        if($id==1){
            $result = $this->db->query("SELECT air_per_killo,standardfee FROM tbl_global_setting WHERE air_freight='$id'")->row();
        }else{
           $result = $this->db->query("SELECT cbm_charge FROM tbl_global_setting WHERE sea_freight='$id'")->row();
        }
        return $result;
    }
    public function checkingMaxIdBookingId(){
         $id=$this->db->query("SELECT MAX(cus_id) as  booking_id FROM tbl_customer_data")->row();
         return $id;
    }
    public function saveBookingDataInfo($data= array()){
        // add history
        $cus_id = $this->db->query("SELECT MAX(cus_id) as  cus_id FROM tbl_customer_data")->row();
        $history=array();
        $history['qty'] = $data['qty'];
        $history['weight'] = $data['weight'];
        $history['length'] = $data['length'];
        $history['height'] = $data['height'];
        $history['width'] = $data['width'];
        $history['service']= $data['services'];
        $history['uniqId'] = $data['uniqId'];
        $history['entry_date'] = date("Y-m-d");
        $history['cus_id'] = $cus_id->cus_id;
        $this->db->insert('tbl_customer_history', $history);
    }
     public function addCategoryEditExpense($data = array()) {
        $result = array();
        if (empty($data['category_id'])) {
            $name= $data['category_name'];
            $id= $this->db->query("SELECT * FROM tbl_expense_category WHERE category_name='$name'")->row();
            if(!empty($id->category_id)){
            $result['exits'] = "exits";   
            }else{
            $this->db->insert('tbl_expense_category', $data);
             $result['save'] = "save";
            }
        } else {
            $this->db->where('category_id', $data['category_id']);
            $this->db->update('tbl_expense_category', $data);
            $result['update'] = "update";
        }
          return $result;
    }
    
     public function addeditpaymentsave($data = array()) {
        $result = array();
        if (empty($data['customer_payment_id'])) {
            $this->db->insert('tbl_customer_payment', $data);
             $result['save'] = "save";
         
        } else {
            $this->db->where('customer_payment_id', $data['customer_payment_id']);
            $this->db->update('tbl_customer_payment', $data);
            $result['update'] = "update";
        }
         return $result;
    }
    
    
      public function addeditpaymentdue($data = array()) {
        $result = array();
        if (empty($data['customer_due_id'])) {
            $this->db->insert('tbl_customer_due', $data);
             $result['save'] = "save";
         
        } else {
            $this->db->where('customer_due_id', $data['customer_due_id']);
            $this->db->update('tbl_customer_due', $data);
            $result['update'] = "update";
        }
         return $result;
    }
    
    public function addEditDesignation($data = array()) {
        $result = array();
        if (empty($data['designation_id'])) {
            $name= $data['designation_name'];
            $id= $this->db->query("SELECT * FROM tbl_designation WHERE designation_name='$name'")->row();
            if(!empty($id->designation_id)){
             $result['exits'] = "exits";    
            }else{
            $this->db->insert('tbl_designation', $data);
             $result['save'] = "save";
            }
        } else {
            $this->db->where('designation_id', $data['designation_id']);
            $this->db->update('tbl_designation', $data);
            $result['update'] = "update";
        }
         return $result;
    }
    public function addEditSavePickup($data) {
        $result = array();
        if (empty($data['pickupId'])) {
            $data['pickup_date'] = date("Y-m-d", strtotime($data['pickup_date']));
            $this->db->insert('tbl_pickup', $data);
            $result['save'] = "save";
        } else {
            $data['pickup_date'] = date("Y-m-d", strtotime($data['pickup_date']));
            $this->db->where('pickupId', $data['pickupId']);
            $this->db->update('tbl_pickup', $data);
            $result['update'] = "update";
        }
        return $result;
    }
     public function addEditEmployee($data = array()) {
        $target_dir = "resource/fronted/assets/images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
                $data['image'] = "resource/fronted/assets/images/" . basename($_FILES["image"]["name"]);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $result = array();
        if (!empty($data['employeeid'])) {
            $jdate= $data['joindate'];
            $data['joindate'] = date("Y-m-d",strtotime($jdate));
            $this->db->where('employeeid', $data['employeeid']);
            $this->db->update('tbl_employee', $data);
            $result['msg'] = "Successfully Update.";
            } else {
            $jdate= $data['joindate'];
            $data['joindate'] = date("Y-m-d",strtotime($jdate));
            $name= $data['mobile_number'];
            $id= $this->db->query("SELECT * FROM tbl_employee WHERE mobile_number='$name'")->row();
            if(!empty($id->dpt_id)){
            $result['msg'] = "Sorry already exits.";
            }else{
            $this->db->insert('tbl_employee', $data);
            $result['msg'] = "Successfully Save.";
         }
         $this->session->set_userdata($result);
        }
     }
       public function addEditmkt($data = array()) {
        $result = array();
        if (empty($data['marketingId'])) {
            $number= $data['company_mobile'];
            $id= $this->db->query("SELECT * FROM tbl_marketing WHERE company_mobile='$number'")->row();
            if(!empty($id->marketingId)){
            $result['exits'] = "exits";    
            }else{
            $data['user_id']= $this->session->userdata('user_id');
            $this->db->insert('tbl_marketing', $data);
            $result['save'] = "save";
            }
        } else {
            $this->db->where('marketingId', $data['marketingId']);
            $this->db->update('tbl_marketing', $data);
            $result['update'] = "update";
        }
         $this->session->set_userdata($result);
         return $result;
    }
     public function addEditDepatment($data = array()) {
        $result = array();
        if (empty($data['dpt_id'])) {
            $name= $data['dpt_name'];
            $id= $this->db->query("SELECT * FROM tbl_deparmtnet WHERE dpt_name='$name'")->row();
            if(!empty($id->dpt_id)){
            $result['exits'] = "exits";    
            }else{
            $this->db->insert('tbl_deparmtnet', $data);
            $result['save'] = "save";
            }
        } else {
            $this->db->where('dpt_id', $data['dpt_id']);
            $this->db->update('tbl_deparmtnet', $data);
            $result['update'] = "update";
        }
         $this->session->set_userdata($result);
         return $result;
    }
    public function addeditmenu($data = array()) {
        $menu_name = $data['name'];
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $menu_name);
        $data['slug'] = $slug;
        $result = array();
        if (empty($data['menu_id'])) {
            $id= $this->db->query("SELECT * FROM tbl_menu WHERE name='$menu_name'")->row();
            if(!empty($id->menu_id)){
            $result['exits'] = "exits";       
            }else{
            $this->db->insert('tbl_menu', $data);
              $result['save'] = "save";
            }
        } else {
            $this->db->where('menu_id', $data['menu_id']);
            $this->db->update('tbl_menu', $data);
             $result['update'] = "update";
        }
        return $result;
    }
	 public function getHub($hubs_id) {
        $result = $this->db->query("SELECT * FROM tbl_hubs WHERE hubs_id='$hubs_id'")->row();
        return $result;
    }
	public function getHubInfo($data = array()) {
        $sql = "SELECT * FROM tbl_hubs WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND hubsname  LIKE '%" . $data['name'] . "%'";
        }
        if (isset($data['status'])) {
            $sql .= " AND status = '" . (int) $data['status'] . "'";
        } else {
            $sql .= " AND status = '1'";
        }
        $sql .= " ORDER BY hubs_id asc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function addDeliveryTypeEdit($data = array()) {
        $result = array();
        if (empty($data['deliverytype_id'])) {
            $this->db->insert('tbl_deliverytype', $data);
            $result['msg'] = "Successfully Save.";
        } else {
            $this->db->where('deliverytype_id', $data['deliverytype_id']);
            $this->db->update('tbl_deliverytype', $data);
            $result['msg'] = "Successfully Update.";
        }
    }
    public function getMarchentStatusPayment($userId, $paid_type) {
        $sql = $this->db->query("SELECT * FROM tbl_booking WHERE paid_type='$paid_type' AND user_id='$userId' ")->result();
        return $sql;
    }
    public function getDvCount($userid) {
        $sql = $this->db->query("SELECT booking_id FROM tbl_booking_assignto  WHERE user_id='$userid'")->result();
        return $sql;
    }
    public function makeDeliveryReport($userid) {
        $sql = $this->db->query("SELECT tbl_customer_data .* FROM tbl_booking_assignto
            LEFT JOIN tbl_customer_data ON (tbl_customer_data.bookingId=tbl_booking_assignto.booking_id)
            WHERE 1 AND tbl_booking_assignto.user_id='$userid' AND tbl_customer_data.status='Delivered' ")->result();
        return $sql;
    }
    public function getMarchentsAdmin($userId) {
        $result = $this->db->query("SELECT * FROM `tbl_booking` WHERE user_id='$userId' AND paid_type='Unpaid' AND delete_status='0' ORDER by booking_id DESC")->result();
        return $result;
    }
    public function addAssigntoHubs($data = array()) {
        $booking_id = $data['bookingId'];
        $this->removeduplicateIdforHubs($booking_id);
        $hubs_id = $this->input->post('hubs_id');
        $assign_date = date("Y-m-d");
        if (!empty($booking_id > 0)) {
            $temp = count($booking_id);
            $result = array();
            for ($i = 0; $i < $temp; $i++) {
                $data2[] = array(
                    'booking_id' => $booking_id[$i],
                    'hubs_id' => $hubs_id,
                    'assign_date' => $assign_date,
                );
            }
              $this->db->insert_batch('tbl_assign_hubs', $data2);
            return $result;
        }
    }
    public function addAssignto($data = array()) {
        $booking_id = $data['bookingId'];
        $user_id = $data['user_id'];
        $this->removeduplicateId($booking_id);
       // $user_id = $this->input->post('user_id');
        $assign_date = date("Y-m-d");
        $status = 1;
        if (!empty($booking_id > 0)) {
            $temp = count($booking_id);
            $result = array();
            for ($i = 0; $i < $temp; $i++) {
                $data2[] = array(
                    'booking_id' => $booking_id[$i],
                    'user_id' => $user_id,
                    'assign_date' => $assign_date,
                    'status' => $status
                );
                $this->db->insert_batch('tbl_booking_assignto', $data2);
            }
            return $result;
        }
    }
    public function removeduplicateId($bid) {
        foreach ($bid as $bkid) {
            $bookdata = $this->db->query("SELECT booking_id,assignto_id,user_id FROM `tbl_booking_assignto` WHERE `booking_id`='$bkid' ")->row();
            if (!empty($bookdata->booking_id)) {
                $this->db->query("DELETE FROM tbl_booking_assignto WHERE booking_id='$bookdata->booking_id'");
            }
        }
    }
    public function removeduplicateIdforHubs($bid){
            foreach ($bid as $bkid) {
                    $bookdata = $this->db->query("SELECT booking_id,booking_id  FROM `tbl_assign_hubs` WHERE `booking_id`='$bkid' ")->row();
                    if (!empty($bookdata->booking_id)) {
                        $this->db->query("DELETE FROM tbl_assign_hubs WHERE booking_id='$bookdata->booking_id'");
                    }
            }
    }
    public function bookingUpdateDevMan($data = array()){
        $booking_id = $data['booking_id'];
        $delivery_sts = $data['status'];
        $reason = $data['reason'];
        $update = $this->db->query("UPDATE tbl_customer_data SET tbl_customer_data.status = '$delivery_sts',tbl_customer_data.remarks = '$reason' WHERE tbl_customer_data.bookingId='$booking_id'");
        return $update;
    }
    public function updateStatusAssign($data = array()) {
        $uid = $this->session->userdata('delid');
        $deliveryManName = $this->db->query("SELECT full_name FROM tbl_user WHERE user_id='$uid'")->row();
        $bookingid = $data['booking_id'];
        foreach ($bookingid as $bid) {
            $this->db->query("UPDATE tbl_booking_assignto SET status = '1' WHERE tbl_booking_assignto.user_id='$uid'");
            $this->db->query("UPDATE tbl_booking SET tbl_booking.status = 'In transit' WHERE tbl_booking.booking_id='$bid'");
            $this->db->query("UPDATE tbl_booking SET tbl_booking.deliveryman = '$deliveryManName->full_name' WHERE tbl_booking.booking_id='$bid'");
        }
    }
    public function deliveryStsdata($data = array()) {
        $sql = "SELECT *  FROM tbl_booking  WHERE 1";
        if (isset($data['user_id'])) {
            $sql .= " AND tbl_booking.deliveryman_id = '" . (int) $data['user_id'] . "'";
        }
        if (!empty($data['date'])) {
            $sql .= " AND tbl_booking.date = '" . date("Y-m-d", strtotime($data['date'])) . "'";
        }
        $sql .= " AND tbl_booking.delivery_man_send_sts ='1'";
        $sql .= " ORDER BY tbl_booking.booking_id desc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function updatebookinSts($data = array()) {
        $status = $data['status'];
        $booking_id = $data['booking_id'];
        $update_cod = $data['update_cod'];
        $user_id = $this->session->userdata('user_id');
        if (!empty($data['booking_id'])) {
            $sql = "UPDATE tbl_booking SET deliveryman_id=$user_id,`delivery_man_send_sts`='1', `send_delivery_status`='$status', `update_cod`='$update_cod' WHERE booking_id=$booking_id ";
            $this->db->query($sql);
        }
    }
    public function updateSts($data = array()) {
        if (!empty($data['bookingId'])) {
            foreach ($data['bookingId'] as $booking_id) {
                $sts = $data['status'];
                $sql = "UPDATE tbl_booking SET `status`='$sts' WHERE `booking_id`=$booking_id ";
                $this->db->query($sql);
            }
        }
    }
    public function updatePaidOption($data = array()) {
        if (!empty($data['bookingId'])) {
            foreach ($data['bookingId'] as $booking_id) {
                $sql = "UPDATE tbl_booking SET paid_type='Paid' WHERE booking_id=$booking_id ";
                $this->db->query($sql);
            }
        }
    }
    //for multiple booking status update
    public function updateStatusMultiple($data = array()) {
        if (!empty($data['bookingId'])) {
            foreach ($data['bookingId'] as $booking_id) {
                $resultStsu = $this->db->query("SELECT status,update_cod FROM tbl_status_booking_history WHERE 1 AND booking_id='$booking_id' AND sts='0'")->row();
                $status = $resultStsu->status;
                $updateCode = $resultStsu->update_cod;
                $sql = "UPDATE tbl_booking SET status='$status',update_cod='$updateCode' WHERE booking_id=$booking_id ";
                $this->db->query($sql);
                $result = "UPDATE tbl_status_booking_history SET sts='1' WHERE booking_id=$booking_id ";
                $this->db->query($result);
            }
        }
    }

    public function updatePickupInfo($data = array()){
        if (!empty($data['pickupId'])) {
            $this->db->where('pickupId', $data['pickupId']);
            $this->db->update('tbl_pickup', $data);
            $result['bookEntry'] = "Successfully Update.";
            return $result;
        }
    }


    public function updatebookinginfo($data = array()){
        if (!empty($data['cus_id'])) {
            $this->db->where('cus_id', $data['cus_id']);
            $this->db->update('tbl_customer_data', $data);
            $result['bookEntry'] = "Successfully Update.";
            return $result;
        }
    }
    //booking addedit bb
    public function addEditSave($data = array()) {
        $result = array();
        $entry_by = $this->session->userdata('user_id');
        $role_id = $this->session->userdata('role_id');
        if (empty($data['booking_id'])) {
            $data['user_id'] = $this->input->post('user_id');
          //  $data['status'] = "Waiting for Pickup";
            $data['entry_by'] = $entry_by;
            $data['date'] = date("Y-m-d");

            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            $data['entrydatetime'] = $dt->format('F j, Y, g:i a');
            $bookingId = $this->checkingMaxIdBooking();
            if (!empty($bookingId->booking_id) > 0):
                $data['bookingId'] = 'ABL'. sprintf("%06d", $bookingId->booking_id + 1) . '-' . date("y");
            else:
                $data['bookingId'] = 'ABL'. sprintf("%06d", '000001') . '-' . date("y");
            endif;
            $this->db->insert('tbl_booking',$data);
         
            $maxId= $this->db->query("SELECT MAX(bookingId) as bookingId FROM tbl_booking")->row();
            $result['lastBookingId'] = $maxId->bookingId;
            $result['save'] = "save";

            $logdata = array();
            $logdata['user_id'] = $entry_by;
            $logdata['role_id'] = $role_id;
            $logdata['action'] = "Insert Booking";
            $logdata['details'] = "Insert Booking entry by [$entry_by] ";
            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            $logdata['date_time'] = $dt->format('F j, Y, g:i a');
            $logdata['date'] = date("Y-m-d");
            $logdata['ip'] = getHostByName(getHostName());
            $this->db->insert('tbl_logdata', $logdata);
        } else {
          
            $this->db->where('booking_id', $data['booking_id']);
            $this->db->update('tbl_booking', $data);
            $result['update'] = "update";

            $logdata = array();
            $logdata['user_id'] = $entry_by;
            $logdata['role_id'] = $role_id;
            $logdata['action'] = "Update Booking";
            $logdata['details'] = "Update Booking entry by [$entry_by] ";
            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            $logdata['date_time'] = $dt->format('F j, Y, g:i a');
            $logdata['date'] = date("Y-m-d");
            $logdata['ip'] = getHostByName(getHostName());
            $this->db->insert('tbl_logdata', $logdata);
        }
        return $result;
    }
    public function sendStatusUpdate($data = array()) {
        $status = $data['status'];
        $bookingid = $data['booking_id'];
        $assignby = $this->db->query("SELECT user_id FROM tbl_booking_assignto WHERE booking_id='$bookingid'")->row();
        $bid = $this->db->query("SELECT booking_id FROM tbl_status_booking_history WHERE booking_id='$bookingid'")->row();
        if (!empty($bid->booking_id)) {
            $this->db->query("DELETE FROM tbl_status_booking_history WHERE booking_id='$bookingid'");
            $userId = $this->session->userdata('user_id');
            $hubs = $this->db->query("SELECT hubs_id FROM tbl_user WHERE user_id='$userId'")->row();
            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            $find = $this->db->query("SELECT * FROM tbl_booking WHERE booking_id='$bookingid'")->row();
            if ($status !== 'Deliveried') {
                $data['update_cod'] = $data['update_cod'];
            } else {
                $data['update_cod'] = $find->update_cod;
            }
            $data['hubs_id'] = $hubs->hubs_id;
            $data['entry_by'] = $userId;
            $data['user_id'] = $assignby->user_id;
            $data['sendingdatetime'] = $dt->format('F j, Y, g:i a');
            $this->db->insert('tbl_status_booking_history', $data);
            $result = array();
            $result['msg'] = "Send Successfully Supper Admin";
            echo json_encode($result);
        } else {
            $userId = $this->session->userdata('user_id');
            $hubs = $this->db->query("SELECT hubs_id FROM tbl_user WHERE user_id='$userId'")->row();
            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            $find = $this->db->query("SELECT * FROM tbl_booking WHERE booking_id='$bookingid'")->row();
            if ($status !== 'Deliveried') {
                $data['update_cod'] = $data['update_cod'];
            } else {
                $data['update_cod'] = $find->update_cod;
            }
            $data['hubs_id'] = $hubs->hubs_id;
            $data['entry_by'] = $userId;
            $data['user_id'] = $assignby->user_id;
            $data['sendingdatetime'] = $dt->format('F j, Y, g:i a');
            $this->db->insert('tbl_status_booking_history', $data);
            $result = array();
            $result['msg'] = "Send Successfully Supper Admin";
            echo json_encode($result);
        }
    }
    public function getcodsumvalue($data = array()) {
        $user_id = $data['user_id'];
        $sql = $this->db->query("SELECT sum(update_cod)  as codamount FROM `tbl_status_booking_history` WHERE 1 AND user_id='$user_id' AND sts='0'")->row();
        $result = array();
        $result['amt'] = $sql->codamount;
        echo json_encode($result);
    }
    public function getcodsumvals($userid) {
        $sql = $this->db->query("SELECT sum(update_cod)  as codamount FROM `tbl_status_booking_history` WHERE 1 AND user_id='$userid' AND sts='0'")->row();
        return $sql;
    }
    public function BookingUpdate($data = array()) {
        // $booking_id=$data['booking_id'];
        $role_id = $this->session->userdata('role_id');
        if ($role_id == 5) {
            if (!empty($data['booking_id'])) {
                $bid = $data['booking_id'];
                $reciver_name = $data['reciver_name'];
                $reciver_packege_des = $data['reciver_packege_des'];
                $reciver_phone = $data['reciver_phone'];
                $reciver_address = $data['reciver_address'];
                $reciver_instruction = $data['reciver_instruction'];
                $update_cod = $data['update_cod'];
                $category_id = $data['category_id'];
                $date = $data['date'];
                $thirdpartyTransportType = $data['thirdpartyTransportType'];
                $third_party_charge = $data['third_party_charge'];
                $reason = $data['reason'];
                $dates = $data['date'];
                $user_id = $data['user_id'];
                $marchent_order_id = $data['mar_order_id'];
                $reason = $data['reason'];
                $hubs_id = $data['hubs_id'];
                $status = $data['status'];
                $data = array();
                $data['entry_by'] = $this->session->userdata('user_id');
                $data['date'] = date("Y-m-d", strtotime($dates));
                $data['booking_id'] = $bid;
                $data['reciver_phone'] = $reciver_phone;
                $data['reciver_name'] = $reciver_name;
                $data['reciver_packege_des'] = $reciver_packege_des;
                $data['reciver_address'] = $reciver_address;
                $data['reciver_instruction'] = $reciver_instruction;
                $data['update_cod'] = $update_cod;
                $data['category_id'] = $category_id;
                $data['thirdpartyTransportType'] = $thirdpartyTransportType;
                $data['third_party_charge'] = $third_party_charge;
                $data['reason'] = $reason;
                $data['user_id'] = $user_id;
                $data['marchent_order_id'] = $marchent_order_id;
                $data['hubs_id'] = $hubs_id;
                $data['status'] = $status;
                $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                $data['sendingdatetime'] = $dt->format('F j, Y, g:i a');
                $this->db->insert('tbl_admin_booking_details', $data);
                $result['bookEntry'] = "Successfully Insert.";
            }
        } else {
            if (!empty($data['booking_id'])) {
                $data['booking_date_update'] = date("Y-m-d");
                $this->db->where('booking_id', $data['booking_id']);
                $this->db->update('tbl_booking', $data);
            }
        }
        redirect("booking/booking/getbookingList");
    }
    public function getBookingId($booking_id) {
        $bookingid = $this->db->query("SELECT * FROM tbl_booking WHERE booking_id='$booking_id'")->row();
        return $bookingid;
    }
    public function updateBooking($data = array()) {
        if (!empty($data['booking_id'])) {
            $this->db->where('booking_id', $data['booking_id']);
            $this->db->update('tbl_booking', $data);
            $result['bookEntry'] = "Successfully Update.";
            return $result;
        }
    }
    public function updateUser($data = array()) {
        if (!empty($data['user_id'])) {
            $result = array();
            if ($_FILES['image']['size'] <= 99999999) {
                $result = $this->do_upload('image');
                if ($result['upload_data']) {
                    $data['image'] = 'resource/clientimages/' . $result['upload_data']['file_name'];
                }
            }
            $terms_payments = $data['treams_payments'];
            if ($terms_payments == 1) {
                $data['mobile_banking'] = "";
                $data['mobileBanking'] = "";
            } elseif ($terms_payments == 2) {
                $data['bank_name'] = "";
                $data['bank_number'] = "";
                $data['bank_branch'] = "";
            } elseif ($terms_payments == 3) {
                $data['bank_name'] = "";
                $data['bank_number'] = "";
                $data['bank_branch'] = "";
                $data['mobile_banking'] = "";
                $data['mobileBanking'] = "";
            }
            $pass = $data['password'];
            if (!empty($pass)) {
                $data['password'] = md5($data['password']);
            }
            $this->db->where('user_id', $data['user_id']);
            $this->db->update('tbl_user', $data);
            $result['user'] = "Successfully Update.";
            return $result;
        }
    }
    public function addEditSaveDvManAssign($data = array()) {
        //dv_assign_id
        $result = array();
        if (empty($data['dv_assign_id'])) {
            $data['entry_date'] = date("Y-m-d");
            $this->db->insert('tbl_dv_man_assing_hubs', $data);
            $result['action'] = "Successfully Save.";
        } else {
            $this->db->where('dv_assign_id', $data['dv_assign_id']);
            $this->db->update('tbl_dv_man_assing_hubs', $data);
            $result['action'] = "Successfully Update.";
        }
    }
    public function addEditSaveExpense($data) {
        $result = array();
        if (empty($data['expense_id'])) {
            $data['entry_date'] = date("Y-m-d");
            $data['date'] = date("Y-m-d", strtotime($data['date']));
            $this->db->insert('tbl_expense', $data);
            $result['msg'] = "Successfully Save.";
            echo json_encode($result);
        } else {
            $data['date'] = date("Y-m-d", strtotime($data['date']));
            $this->db->where('expense_id', $data['expense_id']);
            $this->db->update('tbl_expense', $data);
            $result['msg'] = "Successfully Update.";
            echo json_encode($result);
        }
    }
    public function addEditSaveUser($data = array()) {
        $result = array();
      
        $entry_by = $this->session->userdata('user_id');
        $role_id = $this->session->userdata('role_id');
        if (empty($data['booking_id'])) {
            $data['user_id'] = $this->input->post('user_id');
          //  $data['status'] = "Waiting for Pickup";
            $data['entry_by'] = $entry_by;
            $data['date'] = date("Y-m-d");

            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            $data['entrydatetime'] = $dt->format('F j, Y, g:i a');
            $bookingId = $this->checkingMaxIdBooking();
            if (!empty($bookingId->booking_id) > 0):
                $data['bookingId'] = 'ABL'. sprintf("%06d", $bookingId->booking_id + 1) . '-' . date("y");
            else:
                $data['bookingId'] = 'ABL'. sprintf("%06d", '000001') . '-' . date("y");
            endif;
            $this->db->insert('tbl_booking',$data);
         
            $maxId= $this->db->query("SELECT MAX(bookingId) as bookingId FROM tbl_booking")->row();
            $result['lastBookingId'] = $maxId->bookingId;
            $result['save'] = "save";

            $logdata = array();
            $logdata['user_id'] = $entry_by;
            $logdata['role_id'] = $role_id;
            $logdata['action'] = "Insert Booking";
            $logdata['details'] = "Insert Booking entry by [$entry_by] ";
            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            $logdata['date_time'] = $dt->format('F j, Y, g:i a');
            $logdata['date'] = date("Y-m-d");
            $logdata['ip'] = getHostByName(getHostName());
            $this->db->insert('tbl_logdata', $logdata);
        } else {
          
            $this->db->where('booking_id', $data['booking_id']);
            $this->db->update('tbl_booking', $data);
            $result['update'] = "update";

            $logdata = array();
            $logdata['user_id'] = $entry_by;
            $logdata['role_id'] = $role_id;
            $logdata['action'] = "Update Booking";
            $logdata['details'] = "Update Booking entry by [$entry_by] ";
            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            $logdata['date_time'] = $dt->format('F j, Y, g:i a');
            $logdata['date'] = date("Y-m-d");
            $logdata['ip'] = getHostByName(getHostName());
            $this->db->insert('tbl_logdata', $logdata);
        }
        
        return redirect("/marchent");
      
      
      
      
      
      
      
    }
    public function checkingMaxIdBooking() {
        $row = $this->db->query("SELECT MAX(booking_id) as  booking_id FROM tbl_booking ")->row();
        return $row;
    }
    public function expenseAddSubCategoryEdit($data = array()) {
        $result = array();
        if (empty($data['sub_cat_id'])) {
            $this->db->insert('tbl_expense_sucategory', $data);
            $result['msg'] = "Successfully Save.";
        } else {
            $this->db->where('sub_cat_id', $data['sub_cat_id']);
            $this->db->update('tbl_expense_sucategory', $data);
            $result['msg'] = "Successfully Update.";
        }
    }
    public function addSubCategoryEdit($data = array()) {
        $result = array();
        if (empty($data['sub_cat_id'])) {
            $this->db->insert('tbl_sucategory', $data);
            $result['msg'] = "Successfully Save.";
        } else {
            $this->db->where('sub_cat_id', $data['sub_cat_id']);
            $this->db->update('tbl_sucategory', $data);
            $result['msg'] = "Successfully Update.";
        }
    }
    public function createSession() {
        $sql = $this->db->query("SELECT user_id,full_name,role_id,email,mobile_number,user_name FROM tbl_user ORDER by user_id DESC LIMIT 1")->row();
        $sdata['user_id'] = $sql->user_id;
        $sdata['full_name'] = $sql->full_name;
        $sdata['role_id'] = $sql->role_id;
        $sdata['email'] = $sql->email;
        $sdata['mobile_number'] = $sql->mobile_number;
        $sdata['user_name'] = $sql->user_name;
        $this->session->set_userdata($sdata);
        return $sql;
    }
    public function insertRegistrationData($data) {
        $data['status'] = '1';
        $data['role_id'] = '2';
        $data['date'] = date("Y-m-d");
        $data['frm_country_id'] = $data['frm_country_id'];
        $data['frm_sate_id'] = $data['frm_sate_id'];
        $data['password'] = md5($data['password']);
        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        $data['date_time'] = $dt->format('F j, Y, g:i a');
        $this->db->insert('tbl_user', $data);
        $this->createSession();
    }
    public function addSubInSubCategoryEdit($data = array()) {
        $result = array();
        if ($_FILES['image']['size'] <= 99999999) {
            $result = $this->do_upload('image');
            if ($result['upload_data']) {
                $data['image'] = 'resource/fronted/images/' . $result['upload_data']['file_name'];
            }
        }
        if (empty($data['sub_in_sub_id'])) {
            $this->db->insert('tbl_sub_in_sub_cat_name', $data);
            $result['msg'] = "Successfully Save.";
        } else {
            $this->db->where('sub_in_sub_id', $data['sub_in_sub_id']);
            $this->db->update('tbl_sub_in_sub_cat_name', $data);
            $result['msg'] = "Successfully Update.";
        }
    }
    public function addEditGallery($data = array()) {
        $result = array();
        if ($_FILES['image']['size'] <= 99999999) {
            $result = $this->do_upload('image');
            if ($result['upload_data']) {
                $data['image'] = 'resource/fronted/images/' . $result['upload_data']['file_name'];
            }
        }
        if (empty($data['gallery_id'])) {
            $this->db->insert('tbl_gallery', $data);
            $result['msg'] = "Successfully Save.";
        } else {
            $this->db->where('gallery_id', $data['gallery_id']);
            $this->db->update('tbl_gallery', $data);
            $result['msg'] = "Successfully Update.";
        }
    }
    public function addEditInsertSlider($data = array()) {
        $target_dir = "resource/fronted/assets/images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
                $data['image'] = "resource/fronted/assets/images/" . basename($_FILES["image"]["name"]);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        if (empty($data['slider_id'])) {
            $this->db->insert('tbl_slider', $data);
            $result['msg'] = "Successfully Save.";
        } else {
            $this->db->where('slider_id', $data['slider_id']);
            $this->db->update('tbl_slider', $data);
            $result['msg'] = "Successfully Update.";
        }
    }
    public function addEditMedia($data = array()) {
        $result = array();
        if ($_FILES['image']['size'] <= 99999999) {
            $result = $this->do_upload('image');
            if ($result['upload_data']) {
                $data['image'] = 'resource/fronted/assets/assets/images/' . $result['upload_data']['file_name'];
            }
        }
        if (empty($data['media_id'])) {
            $this->db->insert('tbl_media', $data);
            $result['msg'] = "Successfully Save.";
        } else {
            $this->db->where('media_id', $data['slider_id']);
            $this->db->update('tbl_media', $data);
            $result['msg'] = "Successfully Update.";
        }
    }
    public function addEditLeadUpz($data = array()) {
        if (empty($data['upozilla_id'])) {
            $this->db->insert('tbl_upozilla', $data);
            $result['msg'] = "Successfully Save.";
        } else {
            $this->db->where('upozilla_id', $data['upozilla_id']);
            $this->db->update('tbl_upozilla', $data);
            $result['msg'] = "Successfully Update.";
        }
    }
    public function addEditDivision($data = array()) {
        if (empty($data['division_id'])) {
            $this->db->insert('tbl_division', $data);
            $result['msg'] = "Successfully Save.";
        } else {
            $this->db->where('division_id', $data['division_id']);
            $this->db->update('tbl_division', $data);
            $result['msg'] = "Successfully Update.";
        }
    }
    public function addEditDistrict($data = array()) {
        if (empty($data['district_id'])) {
            $this->db->insert('tbl_district', $data);
            $result['msg'] = "Successfully Save.";
        } else {
            $this->db->where('district_id', $data['district_id']);
            $this->db->update('tbl_district', $data);
            $result['msg'] = "Successfully Update.";
        }
    }


    public function addeditPickupSchedule($data=array()){
        if (empty($data['pickupId'])) {
            $this->db->insert('tbl_pickup', $data);
            $sdata=array();
            $sdata['pickup_msg'] = "Successfully Send Your Pickup Request. Thanks";
            $this->session->set_userdata($sdata);
        } else {
            $this->db->where('pickupId', $data['pickupId']);
            $this->db->update('tbl_pickup', $data);
            $sdata=array();
            $sdata['pickup_msg'] = "Successfully Update Your Pickup Request. Thanks";
            $this->session->set_userdata($sdata);
        }
    }



    public function addEditUser($data) {
        
         if(!empty($_FILES['image']))
  {
    $path = "resource/clientimages/";
    $path = $path . basename( $_FILES['image']['name']);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
      $data['image'] = "resource/clientimages/". basename( $_FILES['image']['name']) ;
    } 
  }
 
        if (empty($data['user_id'])) {
            $data['password'] = md5($data['password']);
            $this->db->insert('tbl_user', $data);
            $result['msg'] = "Successfully Save.";
        } else {
            $this->db->where('user_id', $data['user_id']);
            $this->db->update('tbl_user', $data);
            $result['msg'] = "Successfully Update.";
        }
    }
    public function addEditUserPass($data = array()) {
        if (!empty($data['user_id'])) {
            $pass = md5($this->input->post('password'));
            $blankPass = "d41d8cd98f00b204e9800998ecf8427e";
            if ($pass !== $blankPass):
                $data['password'] = md5($this->input->post('password'));
                $this->db->where('user_id', $data['user_id']);
                $this->db->update('tbl_user', $data);
            else:
                echo "Blank Password Not Allowed";
                exit;
            endif;
        }
    }
    public function getUserInfo() {
        $user_id = $this->session->userdata('user_id');
        $row = $this->db->query("SELECT * FROM tbl_user WHERE user_id='$user_id'")->row();
        return $row;
    }
    public function getemployee() {
        $sql = $this->db->query("SELECT * FROM tbl_employee WHERE status='1'")->result();
        return $sql;
    }
    public function getPostrow($post_id) {
        $row = $this->db->query("SELECT * FROM tbl_post LEFT JOIN tbl_fronted_category ON (tbl_fronted_category.category_id=tbl_post.category_id)WHERE post_id='$post_id'")->row();
        return $row;
    }
    public function getSubInSubName($sub_cat_id) {
        $row = $this->db->query("SELECT * FROM tbl_sucategory WHERE sub_cat_id='$sub_cat_id'")->row();
        return $row;
    }
    public function getUserEdit($user_id) {
        $result = $this->db->query("SELECT * FROM tbl_user WHERE user_id='$user_id'")->row();
        return $result;
    }
    public function getMerchents() {
        $result = $this->db->query("SELECT * FROM tbl_user WHERE role_id='2'")->result();
        return $result;
    }
    public function getDivsionEdit($division_id) {
        $result = $this->db->query("SELECT * FROM tbl_division WHERE division_id='$division_id'")->row();
        return $result;
    }
    public function getCustomerRow($customer_id) {
        $result = $this->db->query("SELECT * FROM tbl_customer WHERE customer_id='$customer_id'")->row();
        return $result;
    }
    public function getDistrictedit($district_id) {
        $result = $this->db->query("SELECT * FROM tbl_district WHERE district_id='$district_id'")->row();
        return $result;
    }
    public function getRateEditRow($rate_id) {
        $result = $this->db->query("SELECT * FROM tbl_rate WHERE rate_id='$rate_id'")->row();
        return $result;
    }
    public function getCategoryRowEdit($category_id) {
        $result = $this->db->query("SELECT * FROM tbl_category WHERE category_id='$category_id'")->row();
        return $result;
    }
     public function getdemployeerow($employeeid) {
        $result = $this->db->query("SELECT * FROM tbl_employee WHERE employeeid='$employeeid'")->row();
        return $result;
    }
     public function getdepatmentrow($dpt_id) {
        $result = $this->db->query("SELECT * FROM tbl_deparmtnet WHERE dpt_id='$dpt_id'")->row();
        return $result;
    }
    public function getmktrow($marketingId) {
        $result = $this->db->query("SELECT * FROM tbl_marketing WHERE marketingId='$marketingId'")->row();
        return $result;
    }
    public function getMenuRowEdit($menu_id) {
        $result = $this->db->query("SELECT * FROM tbl_menu WHERE menu_id='$menu_id'")->row();
        return $result;
    }
    public function getDeliveryTypeRowEdit($deliverytype_id) {
        $result = $this->db->query("SELECT * FROM tbl_deliverytype WHERE deliverytype_id='$deliverytype_id'")->row();
        return $result;
    }
    public function getSubCategoryRowEdit($sub_cat_id) {
        $result = $this->db->query("SELECT * FROM tbl_sucategory WHERE sub_cat_id='$sub_cat_id'")->row();
        return $result;
    }
    public function getSubSubCategoryRowEdit($sub_in_sub_id) {
        $result = $this->db->query("SELECT * FROM tbl_sub_in_sub_cat_name WHERE sub_in_sub_id='$sub_in_sub_id'")->row();
        return $result;
    }
    public function getdesignation($designation_id) {
        $result = $this->db->query("SELECT * FROM tbl_designation WHERE designation_id='$designation_id'")->row();
        return $result;
    }
    public function getTotaluser() {
        $result = $this->db->query("SELECT count(user_id) as userid FROM `tbl_user`")->row();
        return $result;
    }
     public function gettotalEmp() {
        $result = $this->db->query("SELECT count(employeeid) as employeeid FROM `tbl_employee` ")->row();
        return $result;
    }
    public function getTotalMerchants(){
         $result = $this->db->query("SELECT count(user_id) as userid FROM `tbl_user`")->row();
        return $result;
    }
    public function getCategory() {
        $result = $this->db->query("SELECT count(category_id) as category_id FROM `tbl_category`")->row();
        return $result;
    }
    public function getGallery() {
        $result = $this->db->query("SELECT count(gallery_id) as gallery_id FROM `tbl_gallery`")->row();
        return $result;
    }
    public function gettodaybooking() {
        $date = date("Y-m-d");
        $result = $this->db->query("SELECT count(booking_id) as booking_id FROM `tbl_booking` WHERE date='$date' AND delete_status='0'")->row();
        return $result;
    }
    public function gettodayexpense() {
        $date = date("Y-m-d");
        $result = $this->db->query("SELECT sum(amount) as amount FROM `tbl_expense` WHERE date='$date'")->row();
        return $result;
    }
    public function getallbooking() {
        $date = date("Y-m-d");
        $result = $this->db->query("SELECT count(cus_id) as booking_all FROM `tbl_customer_data` WHERE 1 AND entry_date='$date' ")->row();
        return $result;
    }
    public function getResponseData() {
        $result = $this->db->query("SELECT * FROM `tbl_request`")->result();
        return $result;
    }
    public function getSubCategoryName($sub_cat_id) {
        $result = $this->db->query("SELECT * FROM tbl_sucategory WHERE sub_cat_id='$sub_cat_id' AND status='1'")->row();
        return $result;
    }
    public function getMediaFileLink() {
        $result = $this->db->query("SELECT * FROM tbl_media ORDER BY media_id DESC")->result();
        return $result;
    }
    public function getGalleryId($gallery_id) {
        $result = $this->db->query("SELECT * FROM tbl_gallery WHERE gallery_id='$gallery_id' AND status='1'")->row();
        return $result;
    }
    public function getSubCategory() {
        $result = $this->db->query("SELECT count(sub_cat_id) as sub_cat_id FROM `tbl_sucategory`")->row();
        return $result;
    }
    public function getmenu() {
        $result = $this->db->query("SELECT * FROM `tbl_menu` WHERE status='1' ORDER BY sort ASC")->result();
        return $result;
    }
      public function getFrontedcategory() {
        $result = $this->db->query("SELECT * FROM `tbl_fronted_category` WHERE status='1' ORDER BY category_id ASC")->result();
        return $result;
    }
    public function getUserRoleName() {
        $roleId = $this->session->userdata('role_id');
        $result = $this->db->query("SELECT * FROM tbl_user_role WHERE role_id='$roleId'")->row();
        return $result;
    }
    public function getsliderRow($slider_id) {
        $result = $this->db->query("SELECT * FROM tbl_slider WHERE slider_id='$slider_id'")->row();
        return $result;
    }
    public function getUserlog() {
        $loglist = $this->db->query("SELECT tbl_user.full_name,tbl_logdata.action,tbl_logdata.details,tbl_logdata.date_time,tbl_logdata.ip FROM tbl_logdata LEFT JOIN tbl_user ON tbl_user.user_id=tbl_logdata.user_id")->result();
        return $loglist;
    }
    public function getSubscriblelist() {
        $result = $this->db->query("SELECT * FROM `tbl_subscribe`")->result();
        return $result;
    }
    public function getdistrictList() {
        $result = $this->db->query("SELECT * FROM `tbl_district`")->result();
        return $result;
    }
    public function getPackageList() {
        $result = $this->db->query("SELECT * FROM `tbl_sucategory` WHERE `category_id`='2'")->result();
        return $result;
    }
    public function getSubInSubList($sub_cat_id) {
        $result = $this->db->query("SELECT * FROM `tbl_sub_in_sub_cat_name` WHERE `sub_cat_id`='$sub_cat_id' AND status='1'")->result();
        return $result;
    }
    public function getActiveSliderList() {
        $result = $this->db->query("SELECT * FROM `tbl_slider` WHERE `status`='1'")->result();
        return $result;
    }
    public function getSubCatActive() {
        $result = $this->db->query("SELECT tbl_sucategory.sub_cat_id,tbl_sucategory.image,tbl_sucategory.sub_cat_name,tbl_sucategory.category_id FROM tbl_sucategory WHERE status=1")->result();
        return $result;
    }
    public function getsliderList($data = array()) {
        $sql = "SELECT * FROM tbl_slider WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND title  LIKE '%" . $data['name'] . "%'";
        }
        if (isset($data['status'])) {
            $sql .= " AND status = '" . (int) $data['status'] . "'";
        } else {
            $sql .= " AND status = '1'";
        }
        $sql .= " ORDER BY slider_id desc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getUserRoleList($data = array()) {
        $sql = "SELECT * FROM tbl_user_role WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND role_name  LIKE '%" . $data['name'] . "%'";
        }
        if (isset($data['status'])) {
            $sql .= " AND status = '" . (int) $data['status'] . "'";
        } else {
            $sql .= " AND status = '1'";
        }
        $sql .= " ORDER BY role_id desc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getDeliveryManList($data = array()) {
        $sql = "SELECT * FROM tbl_dv_man_assing_hubs 
        LEFT JOIN tbl_hubs ON (tbl_hubs.hubs_id=tbl_dv_man_assing_hubs.hubs_id)
        LEFT JOIN tbl_user ON (tbl_user.user_id=tbl_dv_man_assing_hubs.user_id)
         WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND tbl_user.full_name  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR tbl_user.mobile_number  LIKE '%" . $data['name'] . "%'";
        }
        if (!empty($data['hubs_id'])) {
            $sql .= " AND tbl_hubs.hubs_id  LIKE '%" . $data['hubs_id'] . "%'";
        }
        if (isset($data['status'])) {
            $sql .= " AND tbl_user.status = '" . (int) $data['status'] . "'";
        } else {
            $sql .= " AND tbl_user.status = '1'";
        }
        // echo $sql;exit;
        $sql .= " ORDER BY tbl_user.user_id desc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getexpenseCategory($field) {
        $result = $this->db->query("SELECT category_id,category_name FROM tbl_expense_category WHERE 1 AND category_name LIKE  '%$field%'")->result();
        return $result;
    }
    public function getUserMerchentList($field) {
        $result = $this->db->query("SELECT user_id,company FROM tbl_user WHERE 1 AND company LIKE  '%$field%'")->result();
        return $result;
    }
    public function getsSubsList($data = array()) {
        $sql = "SELECT * FROM tbl_subscribe WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND email  LIKE '%" . $data['name'] . "%'";
        }
        $sql .= " ORDER BY subs_id desc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function gettdaybooking() {
        $tday = date("Y-m-d");
        $sql = ("SELECT  tbl_booking.bookingId,tbl_booking.paid_type,tbl_booking.reciver_address,tbl_booking.status,tbl_user.full_name,tbl_booking.date,tbl_booking.booking_id,tbl_booking.reciver_name,tbl_booking.reciver_phone,tbl_booking.update_cod FROM tbl_booking LEFT JOIN tbl_user ON (tbl_user.user_id=tbl_booking.user_id) WHERE tbl_booking.date='$tday' AND delete_status='0' ");
        return $this->db->query($sql)->result();
    }
    // This function need for Delivery man panel....
    public function deliveryData() {
        $userId = $this->session->userdata('user_id');
        $sql = " SELECT tbl_customer_data.* FROM tbl_booking_assignto "
                . "LEFT JOIN tbl_customer_data ON (tbl_customer_data.bookingId=tbl_booking_assignto.booking_id) "
                . "LEFT JOIN `tbl_user` ON (tbl_user.user_id = tbl_booking_assignto.user_id )"
                . "WHERE tbl_booking_assignto.user_id='$userId' AND tbl_customer_data.status='Intransit' GROUP BY tbl_customer_data.bookingId";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function deliveryMenHubWise() {
        $userId = $this->session->userdata('user_id');
        $role_id = $this->session->userdata('role_id');
        if ($role_id == 1) {
            $sql = " SELECT tbl_user.user_id,tbl_user.full_name,tbl_user.mobile_number FROM tbl_user WHERE tbl_user.status='1' AND role_id='3'";
            $result = $this->db->query($sql)->result();
            return $result;
        } else {
            $hubs = $this->db->query("SELECT hubs_id FROM tbl_user WHERE user_id='$userId'")->row();
            $sql = " SELECT tbl_user.user_id,tbl_user.full_name,tbl_user.mobile_number FROM tbl_dv_man_assing_hubs "
                    . "LEFT JOIN `tbl_user` ON (tbl_user.user_id = tbl_dv_man_assing_hubs.user_id)"
                    . "WHERE tbl_dv_man_assing_hubs.hubs_id='$hubs->hubs_id' AND tbl_dv_man_assing_hubs.status='1' AND    tbl_user.status='1'";
            $result = $this->db->query($sql)->result();
            return $result;
        }
        // echo $userId;exit;
    }
    public function deliverymanlist() {
        $sql = " SELECT tbl_user.user_id,tbl_user.full_name,tbl_user.mobile_number FROM tbl_user WHERE role_id='3'";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getmessage() {
        $sql = " SELECT * FROM tbl_contact ORDER BY contact_id DESC";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getglobalsetting() {
        $sql = " SELECT * FROM tbl_global_setting WHERE setting_id='1'";
        $result = $this->db->query($sql)->row();
        return $result;
    }
    public function getstatus() {
        $sql = " SELECT * FROM tbl_deli_status WHERE sts='1'";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function deliveryDvData() {
        $userId = $this->session->userdata('user_id');
        $sql = " SELECT tbl_booking.user_id,tbl_booking.reason,tbl_booking.bookingId,tbl_booking.paid_type,tbl_booking.reciver_address,
        tbl_booking.status,tbl_user.company, tbl_booking.date,tbl_booking.booking_id,tbl_booking.reciver_name,
        tbl_booking.reciver_phone, tbl_booking.update_cod FROM tbl_booking_assignto "
                . "LEFT JOIN tbl_booking ON (tbl_booking.booking_id=tbl_booking_assignto.booking_id) "
                . "LEFT JOIN `tbl_user` ON (tbl_user.user_id = tbl_booking_assignto.user_id )"
                . "WHERE tbl_booking_assignto.user_id='$userId' AND tbl_booking.delivery_man_send_sts='1' GROUP BY tbl_booking.booking_id";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getRecivAddress($data = array()) {
        $sql = "SELECT tbl_booking.reciver_address FROM tbl_booking WHERE 1";
        if (!empty($data['booking_id'])) {
            $sql .= " AND tbl_booking.booking_id = '" . $data['booking_id'] . "'";
        }
        $result = $this->db->query($sql)->row();
        return $result;
    }
    //DV Data
    public function getBookingDvMan($data = array()) {
        $userId = $data['user_id'];
        $sql = " SELECT tbl_booking.booking_id,tbl_booking.user_id,tbl_booking.reason,tbl_booking.bookingId,tbl_booking.paid_type,tbl_booking.reciver_address,
        tbl_booking.status,tbl_user.company, tbl_booking.date,tbl_booking.booking_id,tbl_booking.reciver_name,
        tbl_booking.reciver_phone, tbl_booking.update_cod FROM tbl_booking_assignto "
                . "LEFT JOIN tbl_booking ON (tbl_booking.booking_id=tbl_booking_assignto.booking_id) "
                . "LEFT JOIN `tbl_user` ON (tbl_user.user_id = tbl_booking.user_id )"
                . "WHERE tbl_booking_assignto.user_id='$userId' AND tbl_booking.status='In transit' AND tbl_booking_assignto.sts='0' GROUP BY tbl_booking.booking_id ";
        //echo $sql;exit;
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function checkUpdateStatus($userid) {
        $sql = " SELECT tbl_booking.booking_cod,tbl_status_booking_history.status,tbl_status_booking_history.reason,tbl_user.full_name,tbl_user.user_id,tbl_user.company,tbl_booking.booking_id,tbl_booking.update_cod,tbl_booking.date,tbl_booking.reciver_name,tbl_booking.reciver_phone,tbl_booking.reciver_address FROM tbl_status_booking_history "
                . "LEFT JOIN tbl_booking ON (tbl_booking.booking_id=tbl_status_booking_history.booking_id)"
                . "LEFT JOIN tbl_user ON (tbl_user.user_id=tbl_booking.user_id)"
                . " WHERE tbl_status_booking_history.user_id='$userid'
         AND tbl_status_booking_history.sts='0' ";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    //LEFT JOIN `tbl_expense_sucategory` ON (tbl_expense_sucategory.sub_cat_id = tbl_expense.sub_cat_id )
    public function getexpenseInfo($data = array()) {
        $currentdate = date("Y-m-d");
        $sql = "SELECT *,tbl_expense.date,tbl_expense_category.category_name FROM `tbl_expense`
        LEFT JOIN `tbl_expense_category` ON (tbl_expense_category.category_id = tbl_expense.category_id )
        LEFT JOIN `tbl_hubs` ON (tbl_hubs.hubs_id = tbl_expense.hubs_id )
        LEFT JOIN `tbl_employee` ON (tbl_employee.employeeid = tbl_expense.employeeid )
        LEFT JOIN `tbl_user` ON (tbl_user.user_id = tbl_expense.user_id )
        WHERE 1";
        if (!empty($data['from_date'] || $data['to_date'])) {
            $fdate = date("Y-m-d", strtotime($data['from_date']));
            $tdate = date("Y-m-d", strtotime($data['to_date']));
            $sql .= " AND tbl_expense.date BETWEEN '$fdate' AND '$tdate' ";
        } else {
            $sql .= " AND tbl_expense.entry_date='$currentdate'";
        }
        if (!empty($data['category_id'])) {
            $sql .= " AND tbl_expense_category.category_id = '" . $data['category_id'] . "'";
        }
        if (!empty($data['hubs_id'])) {
            $sql .= " AND tbl_hubs.hubs_id = '" . $data['hubs_id'] . "'";
        }
        // if (!empty($data['sub_cat_id'])) {
        //     $sql .= " AND tbl_expense_sucategory.sub_cat_id = '" . $data['sub_cat_id'] . "'";
        // }
        $sql .= " ORDER BY tbl_expense.expense_id desc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getexpenseData($expense_id) {
        $result = $this->db->query("SELECT * FROM `tbl_expense` WHERE expense_id='$expense_id' ")->row();
        return $result;
    }
    public function getbookingInformations($data = array()) {
        $sql = "SELECT tbl_customer_data.cus_id,tbl_customer_data.bookingId,tbl_customer_data.fcountryName,tbl_customer_data.tcountryName,
        tbl_customer_data.fstate,tbl_customer_data.tsate,tbl_customer_data.email,tbl_customer_data.services,tbl_customer_data.noofparcels,
        tbl_customer_data.recv_full_address,tbl_customer_data.rec_email,tbl_customer_data.rec_mobile,tbl_customer_data.status,tbl_customer_data.result
        FROM `tbl_customer_data`
        WHERE 1";
        $bookingid = $data['name'];
        if (!empty($data['name'])) {
            $sql .= " AND tbl_customer_data.bookingId= '$bookingid' ";
        }
        if ($data['status']) {
            $sql .= " AND tbl_customer_data.status = '" . 'Intransit' . "'";
        }
        $sql .= " ORDER BY tbl_customer_data.bookingId desc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getBookingCheck($data = array()) {
        $bookingid = $data['bookingid'];
        $checkId = $this->db->query("SELECT * FROM tbl_customer_data WHERE tbl_customer_data.bookingId='$bookingid'")->row();
        return $checkId;
    }
    public function getPickuplist($data = array()) {
         $sql = "SELECT tbl_user.company,tbl_hubs.hubsname,tbl_user.mobile_number,tbl_pickup.couting,tbl_pickup.pickup_date,tbl_pickup.pickupId,tbl_pickup.pickuman_name FROM tbl_pickup
         LEFT JOIN `tbl_user` ON (tbl_user.user_id = tbl_pickup.user_id )
          LEFT JOIN `tbl_hubs` ON (tbl_hubs.hubs_id = tbl_pickup.hubs_id )
        WHERE 1";
        if (!empty($data['user_id'])) {
            $sql .= " AND tbl_user.user_id = '" . $data['user_id'] . "'";
        }
         if (!empty($data['hubs_id'])) {
            $sql .= " AND tbl_pickup.hubs_id = '" . $data['hubs_id'] . "'";
        } else {
            $sql .= "";
        }
        if (!empty($data['b_date'])) {
            $sql .= " AND tbl_pickup.pickup_date = '" . date("Y-m-d", strtotime($data['pickup_date'])) . "'";
        }
        $sql .= " ORDER BY tbl_pickup.pickupId asc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
     public function customerhistory($cus_id){
        $sql = "SELECT * from tbl_customer_history WHERE 1 AND tbl_customer_history.cus_id=$cus_id";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function perceldata($data = array()){
        $cus_id=$data['cus_id'];
        $sql = "SELECT * from tbl_customer_history WHERE 1 AND tbl_customer_history.cus_id=$cus_id";
        $result = $this->db->query($sql)->result();
        return $result;
    }
/*
$sql = "SELECT pickup_date,receiverContact,receiverEmail,receiverName,pickupId, senderName, senderEmail, 
                   pickupCoun.name AS pickuCountryName, pickupstate.name AS pickupState, 
                recvstate.name AS reciverState, recvCounty.name AS receiverCountry 
                FROM `tbl_pickup` LEFT JOIN countries AS pickupCoun ON ( pickupCoun.id = tbl_pickup.pckupCountryId ) 
                LEFT JOIN countries AS recvCounty ON ( recvCounty.id = tbl_pickup.receiverCountryId ) 
                LEFT JOIN states AS pickupstate ON ( pickupstate.id = tbl_pickup.pickupStateId ) 
                LEFT JOIN states AS recvstate ON ( recvstate.id = tbl_pickup.receiverStateId ) 
                WHERE 1 AND tbl_pickup.pickup_date BETWEEN '$fdate' AND '$tdate' ";


*/

    public function getPickupSchedule($data = array()){
        $from_date=$data['f_date']; 
        $to_date=$data['t_date'];
        $fdate = date("Y-m-d", strtotime($from_date));
        $tdate = date("Y-m-d", strtotime($to_date));
        $sql = "SELECT receiverName,pickup_date,receiverContact,receiverEmail,receiverName,pickupId,senderName,senderEmail,frmLocation,toLocation,cost
                FROM `tbl_pickup` WHERE 1 AND tbl_pickup.pickup_date BETWEEN '$fdate' AND '$tdate' ";
        if (!empty($data['name'])) {
            $sql .= " AND tbl_pickup.senderName  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR tbl_pickup.senderEmail  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR tbl_pickup.senderPhone  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR tbl_pickup.receiverEmail  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR tbl_pickup.receiverContact  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR tbl_pickup.receiverName  LIKE '%" . $data['name'] . "%'";
        }
        $sql .= " ORDER BY tbl_pickup.pickupId desc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
 
    public function getsbookingdata($data = array()){
        $from_date=$data['f_date'];
        $to_date=$data['t_date'];
        $fdate = date("Y-m-d", strtotime($from_date));
        $tdate = date("Y-m-d", strtotime($to_date));
        $sql = "SELECT onlinePayment,bookingId,recv_full_address,noofparcels,cus_id,fcountryName,fstate,status,tcountryName,tsate,email,entry_date FROM `tbl_customer_data` WHERE 1 AND tbl_customer_data.entry_date BETWEEN '$fdate' AND '$tdate'";
        if (!empty($data['name'])) {
            $sql .= " AND tbl_customer_data.email  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR tbl_customer_data.fcountryName  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR tbl_customer_data.fstate  LIKE '%" . $data['name'] . "%'";
        }
        $sql .= " ORDER BY tbl_customer_data.cus_id desc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    
    public function getcustomerlist($data = array()) {
        // $role_id= $this->session->userdata('role_id');
         $from = date("Y-m-d", strtotime($data['f_date']));  
         $to = date("Y-m-d", strtotime($data['t_date']));  
         $todaydate = date("Y-m-d");

        $sql = "SELECT * From tbl_customer_due
               LEFT JOIN tbl_user ON ( tbl_user.user_id = tbl_customer_due.user_id )
               
        WHERE 1";
      
        if (!empty($data['user_id'])) {
            $sql .= " AND tbl_customer_due.user_id = '" . $data['user_id'] . "'";
        }
      
      
        if (!empty($data['f_date'] && $data['t_date'])) {
            $sql .= " AND tbl_customer_due.entry_date BETWEEN '$from' AND '$to'";
        }else{
            $sql .= " AND tbl_customer_due.entry_date = '$todaydate'";
        }
        
       
        $sql .= " ORDER BY tbl_customer_due.customer_due_id desc";
         
        $result = $this->db->query($sql)->result();

        return $result;
    }
    
    
    public function getcustomerpaymentlist($data = array()) {
        // $role_id= $this->session->userdata('role_id');
         $from = date("Y-m-d", strtotime($data['f_date']));  
         $to = date("Y-m-d", strtotime($data['t_date']));  
         $todaydate = date("Y-m-d");

        $sql = "SELECT * From tbl_customer_payment
               LEFT JOIN tbl_user ON ( tbl_user.user_id = tbl_customer_payment.user_id )
               LEFT JOIN tbl_deli_status ON ( tbl_deli_status.status_id = tbl_customer_payment.status_id )
        WHERE 1";
      
        if (!empty($data['user_id'])) {
            $sql .= " AND tbl_customer_payment.user_id = '" . $data['user_id'] . "'";
        }
      
      
        if (!empty($data['f_date'] && $data['t_date'])) {
            $sql .= " AND tbl_customer_payment.entry_date BETWEEN '$from' AND '$to'";
        }else{
            $sql .= " AND tbl_customer_payment.entry_date = '$todaydate'";
        }
        
        if ($data['status'] == 1) {
            $sql .= " AND tbl_customer_payment.status_id = '1'";
        } else {
            $sql .= " AND tbl_customer_payment.status_id = '" . $data['status'] . "'";
        }
      
        $sql .= " ORDER BY tbl_customer_payment.customer_payment_id desc";
         
        $result = $this->db->query($sql)->result();

        return $result;
    }
    
    
    public function getBookingInfo($data = array()) {
         $role_id= $this->session->userdata('role_id');
         $from = date("Y-m-d", strtotime($data['f_date']));  
         $to = date("Y-m-d", strtotime($data['t_date']));  
         $todaydate = date("Y-m-d");

        $sql = "SELECT tbl_booking.toLocation,tbl_booking.frmLocation,tbl_booking.status_id,tbl_booking.rate_type,tbl_user.company,tbl_deli_status.display,tbl_rate.name,tbl_booking.date,
                tbl_booking.recv_name,tbl_booking.bookingId,tbl_booking.recv_phone,tbl_booking.rate_type,tbl_booking.booking_id FROM `tbl_booking` 
               LEFT JOIN tbl_user ON ( tbl_user.user_id = tbl_booking.user_id )
               LEFT JOIN tbl_rate ON ( tbl_rate.rate_id = tbl_booking.rate_id )
               LEFT JOIN tbl_deli_status ON ( tbl_deli_status.status_id = tbl_booking.status_id )
        WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND tbl_booking.recv_name  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR tbl_booking.bookingId  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR tbl_booking.recv_phone  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR tbl_booking.recv_email  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR tbl_booking.wayBillNo  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR tbl_booking.rate_id  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR tbl_booking.date  LIKE '%" . date("Y-m-d", strtotime($data['name'])) . "%'";
        }
        if (!empty($data['user_id'])) {
            $sql .= " AND tbl_booking.user_id = '" . $data['user_id'] . "'";
        }
        

        if (!empty($data['f_date'] && $data['t_date'])) {
            $sql .= " AND tbl_booking.date BETWEEN '$from' AND '$to'";
        }else{
            $sql .= " AND tbl_booking.date = '$todaydate'";
        }
        
        if ($data['status'] == 1) {
            $sql .= " AND tbl_booking.status_id = '1'";
        } else {
            $sql .= " AND tbl_booking.status_id = '" . $data['status'] . "'";
        }
      
        $sql .= " AND tbl_booking.delete_status = '" . '0' . "'";
        $sql .= " ORDER BY tbl_booking.booking_id desc";
         
        $result = $this->db->query($sql)->result();

        return $result;
    }
    public function totalPaid() {
        $result = $this->db->query("SELECT count(paid_type) as paid FROM `tbl_booking` WHERE paid_type='Paid' ")->row();
        return $result;
    }
    public function totalUnpaid() {
        $result = $this->db->query("SELECT count(paid_type) as unpaid FROM `tbl_booking` WHERE paid_type='Unpaid' ")->row();
        return $result;
    }
    public function checkingDraftBooking($userId) {
        return $this->db->query("SELECT user_id FROM tbl_payments WHERE user_id='$userId' AND rec_payment_status='Draft'")->row();
    }
    public function getdvmanName($userid) {
        return $this->db->query("SELECT company,full_name,mobile_number FROM tbl_user WHERE user_id='$userid'")->row();
    }
    public function totalWatingPick() {
        $result = $this->db->query("SELECT count(status) as watingpick FROM `tbl_booking` WHERE status='Waiting for Pickup' AND delete_status='0' ")->row();
        return $result;
    }
    public function deliveryMen() {
        $role_id= $this->session->userdata('role_id');
        $user_id= $this->session->userdata('user_id');
        if($role_id==1){
        $result = $this->db->query("SELECT user_id,full_name,hubsname FROM `tbl_user`
                                    LEFT JOIN tbl_hubs ON (tbl_hubs.hubs_id=tbl_user.hubs_id)
                                   WHERE tbl_user.status='1' AND role_id='3' OR role_id='5' ")->result();
        return $result;    
        }else{
        $userrow= $this->db->query("SELECT tbl_user.user_id,tbl_user.hubs_id
                                   FROM tbl_user WHERE user_id='$user_id' AND status='1'")->row();
        $result = $this->db->query("SELECT tbl_user.full_name,tbl_hubs.hubsname FROM tbl_dv_man_assing_hubs
                                      LEFT JOIN tbl_user ON (tbl_user.user_id=tbl_dv_man_assing_hubs.user_id) 
                                      LEFT JOIN tbl_hubs ON (tbl_hubs.hubs_id=tbl_dv_man_assing_hubs.hubs_id) 
                            WHERE tbl_dv_man_assing_hubs.hubs_id='$userrow->hubs_id'")->result();
        return $result;   
        }
    }
    public function deliveryStatus() {
        $result = $this->db->query("SELECT *  FROM `tbl_deli_status` WHERE sts='1' ")->result();
        return $result;
    }
    public function SearchByAssignData($deliveryId) {
        $result = $this->db->query("SELECT * FROM `tbl_booking_assignto` WHERE user_id='$deliveryId' AND status='0'")->result();
        return $result;
    }
    public function SearchByBookingData() {
        $result = $this->db->query("SELECT * FROM `tbl_booking_update` WHERE sts='0'")->result();
        return $result;
    }
    public function totalbookings() {
        $result = $this->db->query("SELECT count(booking_id) as booking_id FROM `tbl_booking` ")->row();
        return $result;
    }
      public function pickuprow($pickupId) {
        $result = $this->db->query("SELECT * FROM `tbl_pickup` WHERE pickupId='$pickupId' ")->row();
        return $result;
    }
    public function getPickupRow($pickupId) {
        $result = $this->db->query("SELECT * FROM tbl_pickup WHERE pickupId='$pickupId'")->row();
        return $result;
    }
    public function getbookingRowEdit($cus_id) {
        $result = $this->db->query("SELECT tbl_booking.totalAmt,tbl_booking.show_cost,tbl_rate.toLocation,tbl_rate.frmLocation,tbl_booking.booking_id,
                                   tbl_booking.bookingId,tbl_booking.rate_type,tbl_booking.recv_phone,tbl_booking.recv_name,tbl_booking.recv_email,tbl_booking.recv_address FROM tbl_booking
                                   LEFT JOIN tbl_rate ON tbl_rate.rate_id=tbl_booking.rate_id
                                   WHERE tbl_booking.booking_id='$cus_id'")->row();
        return $result;
    }
    
     public function findbookingId($booking_id) {
        $result = $this->db->query("SELECT * FROM tbl_booking WHERE booking_id='$booking_id'")->row();
        return $result;
    }
    
    
    
     public function findCustomerDue($customer_due_id) {
        $result = $this->db->query("SELECT * FROM tbl_customer_due WHERE customer_due_id='$customer_due_id'")->row();
        return $result;
    }
    public function findCustomerPayment($customer_payment_id) {
        $result = $this->db->query("SELECT * FROM tbl_customer_payment WHERE customer_payment_id='$customer_payment_id'")->row();
        return $result;
    }
    
    public function getPaymentReceipt($cus_id) {
        $result = $this->db->query("SELECT * FROM tbl_customer_data
            LEFT JOIN payments ON (payments.cus_id=tbl_customer_data.cus_id)
         WHERE tbl_customer_data.cus_id='$cus_id'")->row();
        return $result;
    }
    public function checkingBookingList($userId) {
        $result = $this->db->query("SELECT * FROM `tbl_payments` LEFT JOIN tbl_booking ON (tbl_booking.bookingId=tbl_payments.bookingId) WHERE tbl_payments.rec_payment_status='Draft' AND tbl_payments.user_id='$userId'")->result();
        return $result;
    }
    public function getDataTypeListInfo($data = array()) {
        $sql = "SELECT tbl_deliverytype.status,tbl_deliverytype.deliverytype_id,tbl_deliverytype.price,tbl_category.category_name FROM tbl_deliverytype LEFT JOIN tbl_category ON (tbl_category.category_id=tbl_deliverytype.category_id) WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " OR tbl_category.category_name  LIKE '%" . trim($data['name']) . "%'";
        }
        if (isset($data['status'])) {
            $sql .= " AND tbl_deliverytype.status = '" . (int) $data['status'] . "'";
        }
        $sql .= " ORDER BY deliverytype_id ASC";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    
    public function getRateJson($data = array()){
         $sql = "SELECT * FROM tbl_rate WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND name  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR frmLocation  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR toLocation  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR zone  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR rate_type  LIKE '%" . $data['name'] . "%'";
        }
        
         if (isset($data['rate_type'])) {
            $sql .= " AND tbl_rate.rate_type = '" . $data['rate_type'] . "'";
        }
        
        $sql .= " ORDER BY rate_id desc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function expensegetCatListInfo($data = array()) {
        $sql = "SELECT * FROM tbl_expense_category WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND category_name  LIKE '%" . $data['name'] . "%'";
        }
        if (isset($data['status'])) {
            $sql .= " AND status = '" . (int) $data['status'] . "'";
        } else {
            $sql .= " AND status = '1'";
        }
        $sql .= " ORDER BY category_id asc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getMenuListInfo($data = array()) {
        $sql = "SELECT * FROM tbl_menu WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND name  LIKE '%" . $data['name'] . "%'";
        }
        if (isset($data['status'])) {
            $sql .= " AND status = '" . (int) $data['status'] . "'";
        } else {
            $sql .= " AND status = '1'";
        }
        $sql .= " ORDER BY sort asc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getEmployeeList($data = array()) {
        $sql = "SELECT * FROM tbl_employee WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND mobile_number  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR employeename  LIKE '%" . $data['name'] . "%'";
        }
        if (isset($data['status'])) {
            $sql .= " AND status = '" . (int) $data['status'] . "'";
        } else {
            $sql .= " AND status = '1'";
        }
        $sql .= " ORDER BY employeeid asc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getdesignationlist($data = array()) {
        $sql = "SELECT * FROM tbl_designation WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND designation_name  LIKE '%" . $data['name'] . "%'";
        }
        if (isset($data['status'])) {
            $sql .= " AND status = '" . (int) $data['status'] . "'";
        } else {
            $sql .= " AND status = '1'";
        }
        $sql .= " ORDER BY designation_id asc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
      public function getmktlist($data = array()) {
       $roleid= $this->session->userdata('role_id');
       if($roleid==1) {
        $sql = "SELECT * FROM tbl_marketing WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND comany_name  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR company_mobile  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR company_address  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR company_email  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR company_web  LIKE '%" . $data['name'] . "%'";
        }
        $sql .= " ORDER BY marketingId asc";
        $result = $this->db->query($sql)->result();
        return $result;
       }else{
            $userid= $this->session->userdata('user_id');
            $sql = "SELECT * FROM tbl_marketing WHERE 1 AND user_id='$userid'";
            if (!empty($data['name'])) {
                $sql .= " AND comany_name  LIKE '%" . $data['name'] . "%'";
                $sql .= " OR company_mobile  LIKE '%" . $data['name'] . "%'";
                $sql .= " OR company_address  LIKE '%" . $data['name'] . "%'";
                $sql .= " OR company_email  LIKE '%" . $data['name'] . "%'";
                $sql .= " OR company_web  LIKE '%" . $data['name'] . "%'";
            }
            $sql .= " ORDER BY marketingId asc";
            $result = $this->db->query($sql)->result();
            return $result;
       }
    }
     public function getDepatmentlist($data = array()) {
        $sql = "SELECT * FROM tbl_deparmtnet WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND dpt_name  LIKE '%" . $data['name'] . "%'";
        }
        if (isset($data['status'])) {
            $sql .= " AND status = '" . (int) $data['status'] . "'";
        } else {
            $sql .= " AND status = '1'";
        }
        $sql .= " ORDER BY dpt_id asc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getCatListInfo($data = array()) {
        $sql = "SELECT * FROM tbl_category WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND category_name  LIKE '%" . $data['name'] . "%'";
        }
        if (isset($data['status'])) {
            $sql .= " AND status = '" . (int) $data['status'] . "'";
        } else {
            $sql .= " AND status = '1'";
        }
        $sql .= " ORDER BY category_id asc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function expenseGetSubCatList($data = array()) {
        $sql = "SELECT tbl_expense_category.category_name,tbl_expense_sucategory.sub_cat_name,tbl_expense_sucategory.sub_cat_id,tbl_expense_sucategory.status FROM tbl_expense_sucategory LEFT JOIN tbl_expense_category ON (tbl_expense_category.category_id=tbl_expense_sucategory.category_id) WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND tbl_expense_sucategory.sub_cat_name  LIKE '%" . $data['name'] . "%'";
        }
        if (isset($data['status'])) {
            $sql .= " AND tbl_expense_sucategory.status = '" . (int) $data['status'] . "'";
        } else {
            $sql .= " AND tbl_expense_sucategory.status = '1'";
        }
        $sql .= " ORDER BY tbl_expense_sucategory.sub_cat_id desc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getSubCatList($data = array()) {
        $sql = "SELECT tbl_category.category_name,tbl_sucategory.sub_cat_name,tbl_sucategory.sub_cat_id,tbl_sucategory.status FROM tbl_sucategory LEFT JOIN tbl_category ON (tbl_category.category_id=tbl_sucategory.category_id) WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND tbl_sucategory.sub_cat_name  LIKE '%" . $data['name'] . "%'";
        }
        if (isset($data['status'])) {
            $sql .= " AND tbl_sucategory.status = '" . (int) $data['status'] . "'";
        } else {
            $sql .= " AND tbl_sucategory.status = '1'";
        }
        $sql .= " ORDER BY tbl_sucategory.sub_cat_id desc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getUserList($data = array()) {
        $sql = "SELECT tbl_user_role.`role_name`,tbl_user.`company`,tbl_user.`dvcharge`,tbl_user.`status`,tbl_user.`commission`,tbl_user.`user_id`,tbl_user.`full_name`,tbl_user.`role_id`,tbl_user.`mobile_number`,tbl_user.`address`,tbl_user.`email`,tbl_user.`company`,tbl_user.`user_name`  FROM tbl_user
        INNER JOIN tbl_user_role ON (tbl_user_role.role_id=tbl_user.role_id)
        WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND tbl_user.full_name  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR tbl_user.mobile_number  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR tbl_user.email  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR tbl_user.company  LIKE '%" . $data['name'] . "%'";
        }
        if (isset($data['status'])) {
            $sql .= " AND tbl_user.status = '" . (int) $data['status'] . "'";
        } else {
            $sql .= " AND tbl_user.status = '1'";
        }
        $sql .= " ORDER BY tbl_user.user_id desc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getsdisDivupzlist($data = array()) {
        $sql = "SELECT * FROM tbl_upozilla
        INNER JOIN tbl_division ON (tbl_division.division_id=tbl_upozilla.division_id)
        INNER JOIN tbl_district ON (tbl_district.district_id=tbl_upozilla.district_id)
        WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND tbl_upozilla.upozilla_name  LIKE '%" . $data['name'] . "%'";
        }
        $sql .= " ORDER BY tbl_upozilla.upozilla_id desc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getSubInSubCatList($data = array()) {
        $sql = "SELECT tbl_sucategory.sub_cat_id,tbl_category.category_name,tbl_sucategory.sub_cat_name,tbl_sub_in_sub_cat_name.sub_in_sub_id,tbl_sub_in_sub_cat_name.sub_in_sub_cat_name,tbl_sub_in_sub_cat_name.status,tbl_sub_in_sub_cat_name.image,tbl_sub_in_sub_cat_name.sub_in_sub_id FROM tbl_sub_in_sub_cat_name INNER JOIN tbl_category ON (tbl_category.category_id=tbl_sub_in_sub_cat_name.category_id)
        INNER JOIN tbl_sucategory ON (tbl_sucategory.sub_cat_id=tbl_sub_in_sub_cat_name.sub_cat_id) WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND tbl_sub_in_sub_cat_name.sub_in_sub_cat_name  LIKE '%" . $data['name'] . "%'";
        }
        if (isset($data['status'])) {
            $sql .= " AND tbl_sub_in_sub_cat_name.status = '" . (int) $data['status'] . "'";
        } else {
            $sql .= " AND tbl_sub_in_sub_cat_name.status = '1'";
        }
        $sql .= " ORDER BY tbl_sub_in_sub_cat_name.sub_in_sub_id desc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getDivisionList($data = array()) {
        $sql = "SELECT * FROM `tbl_division` WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND division_name  LIKE '%" . $data['name'] . "%'";
        }
        $sql .= " ORDER BY division_id desc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getPostListr($data = array()) {
        $sql = "SELECT tbl_post.status,tbl_menu.name,tbl_menu.menu_id,tbl_fronted_category.category_name,tbl_post.category_id,tbl_post.post_id,tbl_post.post_title FROM `tbl_post`
        LEFT JOIN tbl_menu ON (tbl_menu.menu_id=tbl_post.menu_id)
        LEFT JOIN tbl_fronted_category ON (tbl_fronted_category.category_id=tbl_post.category_id)
        WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND post_title  LIKE '%" . $data['name'] . "%'";
        }
        $sql .= " ORDER BY post_id desc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getgalleryList($data = array()) {
        $sql = "SELECT tbl_gallery.*,tbl_sucategory.sub_cat_id,tbl_sucategory.sub_cat_name FROM `tbl_gallery`
        LEFT JOIN tbl_sucategory ON (tbl_sucategory.sub_cat_id=tbl_gallery.sub_cat_id) WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND tbl_gallery.photo_name  LIKE '%" . $data['name'] . "%'";
        }
        if (isset($data['status'])) {
            $sql .= " AND tbl_gallery.status = '" . (int) $data['status'] . "'";
        } else {
            $sql .= " AND tbl_gallery.status = '1'";
        }
        $sql .= " ORDER BY tbl_gallery.gallery_id desc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getdisDivlist($data = array()) {
        $sql = "SELECT * FROM tbl_district INNER JOIN tbl_division ON tbl_district.division_id=tbl_division.division_id WHERE 1";
        if (!empty($data['name'])) {
            $sql .= " AND tbl_district.district_name  LIKE '%" . $data['name'] . "%'";
            $sql .= " OR tbl_district.division_id  LIKE '%" . $data['name'] . "%'";
        }
        $sql .= " ORDER BY tbl_district.district_id desc";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getSubCatInfo() {
        $result = $this->db->query("SELECT * FROM `tbl_sucategory` WHERE `category_id`=2")->result();
        return $result;
    }
    public function getCatLists() {
        $result = $this->db->query("SELECT * FROM `tbl_category`")->result();
        return $result;
    }
    public function getfrontedcatlist() {
         $result = $this->db->query("SELECT * FROM `tbl_fronted_category`")->result();
        return $result;
    }
     public function getbookingCatList() {
        $result = $this->db->query("SELECT * FROM `tbl_category` WHERE status='1'")->result();
        return $result;
    }
    public function getCatList() {
        $result = $this->db->query("SELECT * FROM `tbl_category` WHERE  NOT `category_id`=10 AND NOT `category_id`=12 ORDER BY category_id ASC ")->result();
        return $result;
    }
    public function getHbuList() {
        $result = $this->db->query("SELECT * FROM `tbl_hubs` WHERE status='1' ORDER BY hubs_id ASC ")->result();
        return $result;
    }
     public function pickupmanlists() {
        $result = $this->db->query("SELECT * FROM `tbl_user` WHERE role_id='7' ")->result();
        return $result;
    }
    public function getdvmanList() {
        $result = $this->db->query("SELECT * FROM `tbl_user` WHERE role_id='3' AND status='1' ORDER BY user_id DESC")->result();
        return $result;
    }
    public function getHubmangerList() {
        $result = $this->db->query("SELECT * FROM `tbl_user` WHERE role_id='5' AND status='1' ORDER BY user_id DESC")->result();
        return $result;
    }
    public function mktlists() {
        $result = $this->db->query("SELECT * FROM `tbl_user` WHERE role_id='8' AND status='1' ORDER BY user_id DESC")->result();
        return $result;
    }
    public function pickuplists(){
        $result = $this->db->query("SELECT * FROM `tbl_user` WHERE role_id='7' AND status='1' ORDER BY user_id DESC")->result();
        return $result;
    }
    public function getadminlist(){
          $result = $this->db->query("SELECT * FROM `tbl_user` WHERE role_id='1' AND status='1' ORDER BY user_id DESC")->result();
        return $result;
    }
    public function getDeliveryTypeList() {
        $result = $this->db->query("SELECT * FROM tbl_deliverytype")->result();
        return $result;
    }
    public function getMarchentTracReport($userId) {
        $result = $this->db->query("SELECT * FROM `tbl_booking` WHERE status IN ('Deliveried','Returend') AND user_id='$userId' AND rec_payment_status='merchant payment not paid' AND paid_type='Unpaid' ORDER by booking_id DESC")->result();
        return $result;
    }
    public function getMarchentPaymentsdata($userId) {
        $result = $this->db->query("SELECT * FROM `tbl_payments` WHERE user_id='$userId'")->result();
        return $result;
    }
    public function getMarchentTrackingReport() {
        
        $userId = $this->session->userdata('user_id');
        $result = $this->db->query("SELECT * FROM `tbl_booking`
                                    LEFT JOIN tbl_deli_status ON tbl_deli_status.status_id=tbl_booking.status_id
                                    LEFT JOIN tbl_user ON tbl_user.user_id=tbl_booking.user_id
                                    LEFT JOIN tbl_rate ON tbl_rate.rate_id=tbl_booking.rate_id
                                    WHERE tbl_booking.user_id='$userId' ORDER by booking_id DESC")->result();
        return $result;
    }
    public function getMerchent($userid) {
        //$userId = $this->session->userdata('user_id');
        $result = $this->db->query("SELECT * FROM `tbl_booking` WHERE user_id='$userid' AND paid_type='Unpaid' AND delete_status='0' ORDER by booking_id DESC")->result();
        return $result;
    }
    public function getMerchentDetails($user_id) {
        //$userId = $this->session->userdata('user_id');
        $result = $this->db->query("SELECT * FROM `tbl_booking` WHERE user_id='$user_id' AND paid_type='Unpaid' AND delete_status='0' ORDER by booking_id DESC")->result();
        return $result;
    }
    public function getMarchentTrackingReportAdmin($userId, $from_date, $to_date, $paid_type) {
        $fdate = date("Y-m-d", strtotime($from_date));
        $tdate = date("Y-m-d", strtotime($to_date));
        $result = $this->db->query("SELECT * FROM `tbl_booking` WHERE user_id='$userId' "
                        . "AND paid_type='$paid_type' AND delete_status='0' AND tbl_booking.date BETWEEN '$fdate' AND '$tdate' "
                        . "ORDER by booking_id DESC")->result();
        return $result;
    }
    public function getDeliveryReport($from_date, $to_date) {
        $fdate = date("Y-m-d", strtotime($from_date));
        $tdate = date("Y-m-d", strtotime($to_date));
        $sql = "SELECT tbl_user.commission,tbl_user.user_id,tbl_user.company,tbl_user.mobile_number,tbl_booking.third_party_charge,tbl_booking.category_id,tbl_booking.paid_type,tbl_booking.update_cod,tbl_booking.status,tbl_booking.delivery_type,tbl_booking.date,tbl_booking.booking_id,tbl_booking.booking_id FROM `tbl_booking` LEFT JOIN tbl_user ON (tbl_user.user_id=tbl_booking.user_id) WHERE delete_status='0' AND tbl_booking.date BETWEEN '$fdate' AND '$tdate' ORDER by tbl_booking.booking_id ASC";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    public function getEarningReport($data = array()) {
//
        $from = $data['from_date'];
        $to = $data['to_date'];
        $sql =  "SELECT tbl_deli_status.display,tbl_rate.name,tbl_user.company,tbl_booking.recv_name,tbl_booking.recv_phone,tbl_booking.recv_email,tbl_booking.rate_type,tbl_booking.bookingId,tbl_rate.rate_id,tbl_rate.frmLocation,tbl_rate.toLocation,
        tbl_booking.custom_cost,tbl_booking.actual_cost,tbl_booking.totalAmt,tbl_booking.date FROM tbl_booking
        LEFT JOIN `tbl_rate` ON (tbl_rate.rate_id = tbl_booking.rate_id )
        LEFT JOIN `tbl_user` ON (tbl_user.user_id = tbl_booking.user_id )
        LEFT JOIN `tbl_deli_status` ON (tbl_deli_status.status_id = tbl_booking.status_id )
         WHERE 1 ";
        if (!empty($data['user_id'])) {
            $sql .= " AND tbl_booking.user_id = '" . $data['user_id'] . "'";
        }
        if (!empty($data['from_date'] && $data['to_date'])) {
            $sql .= " AND tbl_booking.date BETWEEN '$from' AND '$to'";
        }
        $sql .= "AND delete_status='0' ORDER by tbl_booking.booking_id ASC";
        
        
        $result = $this->db->query($sql)->result();
        
        
        
        return $result;
    }
    public function getMarchentReport() {
        $result = $this->db->query("SELECT * FROM `tbl_booking` WHERE paid_type='Unpaid' AND delete_status='0' ORDER by booking_id DESC")->result();
        return $result;
    }
    //date range
    public function getMarchentTrackingReports($from, $to) {
        $userId = $this->session->userdata('user_id');
        $result = $this->db->query("SELECT * FROM `tbl_booking` WHERE user_id='$userId' "
                        . "AND paid_type='Unpaid' "
                        . "AND delete_status='0' AND tbl_booking.date BETWEEN '$from' AND '$to' ORDER by booking_id ASC")->result();
        return $result;
    }
    public function getRecivAmount() {
        $userId = $this->session->userdata('user_id');
        $result = $this->db->query("SELECT totalAmt as amount FROM `tbl_booking`  WHERE status_id IN ('1') AND user_id='$userId' AND paid_type='Unpaid' ")->result();
        return $result;
    }
    public function getTotalBooking() {
        $userId = $this->session->userdata('user_id');
        $result = $this->db->query("SELECT booking_id FROM `tbl_booking`  WHERE user_id='$userId' AND delete_status='0' ")->result();
        return $result;
    }
    public function getDeliverybyTotal($userid) {
        //$userId = $this->session->userdata('user_id');
        $result = $this->db->query("SELECT booking_id FROM `tbl_booking` WHERE user_id='$userid' AND `status`='Deliveried' AND delete_status='0' ")->result();
        return $result;
    }
    public function getTotalDelivery() {
        $userId = $this->session->userdata('user_id');
        $result = $this->db->query("SELECT booking_id FROM `tbl_booking` WHERE user_id='$userId' AND delete_status='0' ")->result();
        return $result;
    }
    public function getTotalDeliverylist() {
        $userId = $this->session->userdata('user_id');
        $result = $this->db->query("SELECT reciver_name,reciver_address,reciver_phone,delivery_type,date,bookingId,paid_type,reason,update_cod,status FROM `tbl_booking` WHERE user_id='$userId' AND delete_status='0' ")->result();
        return $result;
    }
    public function getTotalUnpaid() {
        $userId = $this->session->userdata('user_id');
        $result = $this->db->query("SELECT booking_id FROM `tbl_booking` WHERE user_id='$userId' AND `paid_type`='Unpaid'")->result();
        return $result;
    }
    public function getTotalPendingbyTotal($userid) {
        $result = $this->db->query("SELECT count(booking_id) as bookingid FROM `tbl_booking` WHERE status IN ('Waiting for Pickup','Picked','In transit','Delay') AND user_id='$userid' AND `paid_type`='Unpaid' AND delete_status='0'")->row();
        return $result;
    }
    public function getTotalPending() {
        $userId = $this->session->userdata('user_id');
        $result = $this->db->query("SELECT count(booking_id) as bookingid FROM `tbl_booking` WHERE status_id IN ('1') AND user_id='$userId' AND `paid_type`='Unpaid' AND delete_status='0'")->row();
        return $result;
    }
    public function getTotalPendingList() {
        $userId = $this->session->userdata('user_id');
        $result = $this->db->query("SELECT reciver_name,reciver_address,reciver_phone,delivery_type,date,bookingId,paid_type,reason,update_cod,status FROM `tbl_booking` WHERE status IN ('Waiting for Pickup','Picked','In transit','Delay') AND user_id='$userId' AND `paid_type`='Unpaid' AND delete_status='0'")->result();
        return $result;
    }
    public function getTotalCodeList() {
        $userId = $this->session->userdata('user_id');
        $result = $this->db->query("SELECT * FROM `tbl_booking` WHERE user_id='$userId' AND paid_type='Unpaid' AND delete_status='0' ORDER by booking_id DESC")->result();
        return $result;
    }
    public function getTotalcodAmut() {
        $userId = $this->session->userdata('user_id');
        $result = $this->db->query("SELECT sum(totalAmt) as codamount FROM `tbl_booking` WHERE user_id='$userId' AND `paid_type`='Unpaid' AND delete_status='0'")->row();
        return $result;
    }
    public function getMarchentList() {
        $result = $this->db->query("SELECT user_id,full_name,company,mobile_number,commission FROM `tbl_user` WHERE `status`=1 AND role_id='2' ORDER BY company ASC")->result();
        return $result;
    }

    public function statuslist() {
        $result = $this->db->query("SELECT  * FROM `tbl_deli_status` WHERE `sts`=1  ORDER BY sts ASC")->result();
        return $result;
    }
      
    public function deliveryManAssignto() {
        $tday = date("Y-m-d");
        $result = $this->db->query("SELECT count(booking_id) as assignto FROM `tbl_booking_assignto` WHERE `assign_date`='$tday'")->row();
        return $result;
    }
    public function getMarchent() {
        $result = $this->db->query("SELECT count(user_id) as user_id FROM `tbl_user` WHERE `status`=1 AND NOT `user_id`=26")->row();
        return $result;
    }
    public function getCatListActive() {
        $result = $this->db->query("SELECT * FROM `tbl_category` WHERE `status`=1 AND NOT `category_id`=10 AND NOT `category_id`=12 AND NOT `category_id`=13 AND NOT `category_id`=14 AND NOT `category_id`=9")->result();
        return $result;
    }
    public function getdisDivupzlist() {
        $result = $this->db->query("SELECT * FROM tbl_upozilla
    INNER JOIN tbl_division ON tbl_division.division_id=tbl_upozilla.division_id
    INNER JOIN tbl_district ON tbl_district.district_id=tbl_upozilla.district_id")->result();
        return $result;
    }
    public function getupzList() {
        $result = $this->db->query("SELECT * FROM `tbl_upozilla`")->result();
        return $result;
    }
    public function checkingUserAuth($userName, $pass) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('tbl_user.user_name', $userName);
        $this->db->where('tbl_user.password', md5($pass));
        $this->db->where('tbl_user.status', "1");
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    //put your code here
    public function do_upload($image_file) {
        $config['upload_path'] = '/resource/clientimages/';
        $config['allowed_types'] = 'gif|jpg|png';
        //$config['file_name'] =  microtime();
        $new_name = microtime() . $_FILES["image"]['name'];
        $config['file_name'] = md5($new_name);
        $config['encrypt_name'] = true;
        $config['max_size'] = '1000000';
        $config['max_width'] = '1024000';
        $config['max_height'] = '768000';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        //$this->upload->resize();
        if (!$this->upload->do_upload($image_file)) {
            //  if ( ! $this->upload->resize())
            $error = array('error' => $this->upload->display_errors(), 'upload_data' => '');
            return $error;
        } else {
            $data = array('upload_data' => $this->upload->data(), 'error' => '');
            return $data;
        }
    }
}