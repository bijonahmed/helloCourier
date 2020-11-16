<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
    /**
     * Application Developed by : Md. Gazi Giash Uddin Bijon Ahmed
     * Mobile No +8801915728982
     * Email: mdbijon@gmail.com
     *
     */
    function  __construct(){
        parent::__construct();
     
        // Load paypal library & product model
        $this->load->library('paypal_lib');
    }
    public function index() {
        $data = array();
        $data['title'] = "Welcome";
        $data['data'] = $this->db->query("SELECT * FROM tbl_post WHERE post_id='9' AND status=1")->result();
        $data['sliderdata'] = $this->db->query("SELECT * FROM tbl_slider WHERE status=1 ORDER BY sort ASC")->result();
        $data['menu'] = $this->db->query("SELECT * FROM tbl_menu WHERE status=1 ORDER BY sort ASC")->result();
        $data['post_title'] = $this->db->query("SELECT * FROM tbl_post WHERE menu_id='9' AND post_id='1' AND status=1 ORDER BY post_id ASC")->row();
        $data['post_sub_title'] = $this->db->query("SELECT * FROM tbl_post WHERE menu_id='9' AND post_id='9' AND status=1 ORDER BY post_id ASC")->row();
        $data['post'] = $this->db->query("SELECT * FROM tbl_post WHERE menu_id='9' AND status=1 AND post_id NOT IN (9) ORDER BY post_id ASC")->result();
        $data['ourServices'] = $this->db->query("SELECT * FROM tbl_post WHERE category_id='4' AND status=1")->result();
        $data['whyChooseus']= $this->db->query("SELECT * FROM tbl_post WHERE post_id='34' AND status=1")->row();
        $data['clientSaying']= $this->db->query("SELECT * FROM tbl_post WHERE category_id='3' AND status=1")->result();
        $data['workProcess']= $this->db->query("SELECT * FROM tbl_post WHERE category_id='2' AND status=1")->result();
        $data['blog']= $this->db->query("SELECT * FROM tbl_post WHERE category_id='1' AND status=1 order by post_id desc")->row();
        
        $data['setting'] = $this->db->query("SELECT * FROM tbl_global_setting")->row();
        
        $data['country'] = $this->db->query("SELECT * FROM `countries`")->result();
        
        $data['dcountry'] = $this->db->query("SELECT * FROM `countries`")->result();
        $data['mainContent'] = $this->load->view('fronted/page/mainContent', $data, true);
        $data['header'] = $this->load->view('fronted/common/header', $data, true);
        $data['slider'] = $this->load->view('fronted/page/slider', $data, true);
        $data['footer'] = $this->load->view('fronted/common/footer', $data, true);
        $this->load->view('fronted/index', $data);
    }
        public function shippingCal(){
         $items = $this->QueryModel->getshippingcalId($this->input->get());
         echo json_encode($items);
    }

    public function checkRateCostList(){
        $frmLocation = $this->input->get('frmLocation');
        $toLocation = $this->input->get('toLocation');
        $query = $this->db->query("SELECT * FROM `tbl_rate` WHERE `frmID` = '$frmLocation' and `toId` ='$toLocation'")->result();
        echo "<option value=''>" . 'Select ' . "</option>";
       foreach ($query as $value) {
           echo "<option value='$value->rate_id'>" . $value->name .  "</option>";
       }
   }
   public function checkRateCost(){
    $rate_id = $this->input->post('rate_id');
    $cost = $this->db->query("SELECT * FROM tbl_rate WHERE rate_id='$rate_id'")->row();
    echo json_encode($cost->cost);
    
}

public function getschedulePackType(){
    
    $data = trim($this->input->post('value'));
            if($data == "Domestic"){
                    $data = $this->db->query("SELECT * FROM `states` WHERE `country_id` = 160")->result();
            echo "<option value=''>" . 'Select' . "</option>";
            foreach ($data as $value) {
                echo "<option value='$value->name'>" . ucfirst($value->name) . "</option>";
            }
    }
    if($data == "International"){
                $data = $this->db->query("SELECT * FROM `countries`")->result();
    echo "<option value=''>" . 'Select' . "</option>";
    foreach ($data as $value) {
        echo "<option value='$value->name'>" . ucfirst($value->name) . "</option>";
    }
    }
}


public function getLocationValue(){
    
    $data = trim($this->input->post('value'));
            if($data == "Domestic"){
                    $data = $this->db->query("SELECT * FROM `states` WHERE `country_id` = 160")->result();
            echo "<option value=''>" . 'Select' . "</option>";
            foreach ($data as $value) {
                echo "<option value='$value->id'>" . ucfirst($value->name) . "</option>";
            }
    }
    if($data == "International"){
                $data = $this->db->query("SELECT * FROM `countries`")->result();
    echo "<option value=''>" . 'Select' . "</option>";
    foreach ($data as $value) {
        echo "<option value='$value->id'>" . ucfirst($value->name) . "</option>";
    }
    }
}
    

    public function savebookingdata(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->saveBookingDataInfo($this->input->post());
           echo json_encode("susscessfully insert history");
        }
    }

    public function getuser_name(){
        $user_name = $this->input->post('user_name');
        $response = $this->db->query("SELECT user_id FROM tbl_user WHERE user_name='$user_name'")->row();
        if ($response) {
            $data = "yes";
        } else {
            $data = "no";
        }
        echo json_encode($data);

    }
    public function getUserEmail() {
        $email = $this->input->post('email');
        $response = $this->db->query("SELECT user_id FROM tbl_user WHERE email='$email'")->row();
        if ($response) {
            $data = "yes";
        } else {
            $data = "no";
        }
        echo json_encode($data);
    }

    public function getUserMobile() {
        $mobile = $this->input->post('mobile');
        $response = $this->db->query("SELECT user_id FROM tbl_user WHERE mobile_number='$mobile'")->row();
        if ($response) {
            $data = "yes";
        } else {
            $data = "no";
        }
        echo json_encode($data);
    }
     public function getallStatefrm() {
        $country_id = $this->input->post('country_id');
       if($country_id=='230'){
             $allState = $this->db->query("SELECT * FROM `states` WHERE `country_id` = 230 ")->result();
        }else{
             $allState = $this->db->query("SELECT * FROM `states` WHERE `country_id` = $country_id ")->result();    
        }
        echo "<option value=''>" . 'Choose State' . "</option>";
        foreach ($allState as $value) {
            echo "<option value='$value->id'>" . ucfirst($value->name) . "</option>";
        }
    }
    public function tocuntryservice(){
        $to_country_id = $this->input->post('to_country_id');
         if($to_country_id !== 160){
             echo "<option value='' selected='selected'>Choose Service</option>
            <option value='Sea Frieght'>Sea Frieght</option>
            <option value='Air Frieght'>Air Frieght</option>
            ";
       } 
    }
    public function getServices(){
        $to_country_id = $this->input->post('to_country_id');
        $to_sate_id = $this->input->post('to_sate_id');
        if($to_country_id == 160 && $to_sate_id == 2671){
           $category = $this->db->query("SELECT * FROM `tbl_category` WHERE `status` = 1 AND category_id NOT IN(8) ")->result();
           echo "<option value=''>" . 'Choose Service' . "</option>";
           foreach ($category as $value) {
               echo "<option value='$value->category_id'>" . ucfirst($value->category_name) . "</option>";
           }
        }else{
          $category = $this->db->query("SELECT * FROM `tbl_category` WHERE 1 AND category_id NOT IN(5,6) AND status = 1")->result();
           echo "<option value=''>" . 'Choose Service' . "</option>";
           foreach ($category as $value) {
               echo "<option value='$value->category_id'>" . ucfirst($value->category_name) . "</option>";
           }
        }
    }
    public function saveQuniqueId(){
        $data=array();
        $data['uniqId']= uniqid();
        $data['enty_date']= date("Y-m-d");
        $this->db->insert('tbl_temp',$data);
        $uniqId = $this->db->insert_id();
        echo json_encode($uniqId);
    }
    public function checkingMaxIdBookingId(){
        $id=$this->db->query("SELECT MAX(cus_id) as  booking_id FROM tbl_customer_data")->row();
        return $id;
   }
   function buy(){  
        #$customer_email=$this->input->post('cus_email');
        $amount= $this->input->post('amount');
        // Set variables for paypal form
        $returnURL = base_url().'paypal/success';
        $cancelURL = base_url().'paypal/cancel';
        $notifyURL = base_url().'paypal/ipn';
        // Get product data from the database
        //$product = $this->db->query("SELECT * FROM tbl_customer_data where bookingId='$bookingId' ")->row();
        //$this->product->getRows($id);
        // Get current user ID from the session
        $userID = 1;// $_SESSION['userID'];
        // Add fields to paypal form
        $amtprice  = $amount;
       // echo $amtprice;exit;
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', 'Buy Service');
        $this->paypal_lib->add_field('custom', '1');
        $this->paypal_lib->add_field('item_number',  'service');
        $this->paypal_lib->add_field('amount',  $amount);
        //Send Admin Email:
            # $this->customerEmail($customer_email,$rec_email);
      //Customer Send Email
        # $this->adminMail($cus_id);
        // Render paypal form
        $this->paypal_lib->paypal_auto_form();
    }
   //Customer Send Email
    public function adminMail($cus_id){
        $company_email= $this->db->query("SELECT * FROM `tbl_global_setting`")->row()->company_email;
        $customer_data=$this->db->query("SELECT MAX(cus_id) as  cus_id,bookingId,email,fcountryName,fstate,tcountryName,tsate,entry_date FROM tbl_customer_data")->row();
        $customer_history=$this->db->query("SELECT * FROM tbl_customer_history WHERE cus_id='$cus_id'")->result();
        $output = '';
        $output .= "<table class='table-striped table-hover' style='width: 100%; color:black;'>
					<thead class='thead-primary'>
						<tr style='background-color: green;color: white; border-radius: 0 6px 0 0'>
							<td style='text-align: center;'>Booking ID</td>
							<td style='text-align: center;'>Email ID</td>
							<td style='text-align: center;'>From Country</td>
							<td style='text-align: center;'>From State</td>
							<td style='text-align: center;'>To Country</td>
							<td style='text-align: center;'>To State</td>
						</tr>
					</thead>
					<tbody>
                    <tr>
            <td><center>$customer_data->bookingId</center></td>
            <td><center>$customer_data->email</center></td>
            <td><center>$customer_data->fcountryName</center></td>
            <td><center>$customer_data->fstate</center></td>
            <td><center>$customer_data->tcountryName</center></td>
            <td><center>$customer_data->tsate</center></td>
            </tr>
					</tbody>
				</table>";
        $output .= "<table class='table-striped table-hover' style='width: 100%; color:black;'>
						<thead>
							<tr style='background-color: green;color: white; border-radius: 0 6px 0 0'>
								<th style='text-align: center;'>SL</th>
								<th style='text-align: center;'>Qty</th>
								<th style='text-align: center;'>Weight</th>
								<th style='text-align: center;'>Length</th>
								<th style='text-align: center;'>Height</th>
								<th style='text-align: center;'>Type</th>
							</tr>";
        $sl = 1;
          foreach ($customer_history as $row) {
            $output .= "
            <tr>
            <td><center>$sl</center></td>
            <td><center>$row->qty</center></td>
            <td><center>$row->weight</center></td>
            <td><center>$row->length</center></td>
            <td><center>$row->height</center></td>
            </tr>";
            $sl++;
          }
    $output .= "</tbody></table>";
        $to = "$company_email";
        $subject = "Arficargo Customer Booking";
        $message = "$output";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <sales@africargo.co.uk.com>' . "\r\n";
        mail($to,$subject,$message,$headers);
    }
   //admin send email
    public function customerEmail($customer_email,$rec_email){
        $result =$this->db->query("SELECT * FROM `tbl_global_setting`")->row();
        $message=$result->sendingmsg;
       // echo $email;
        $to = "$customer_email,$rec_email";
        $subject = "Arficargo";
        $message = "<div style='color:black; font-weight: bold; font-size: 18px;'></div>"
                    . "<div style='color:black; font-weight: bold; font-size: 17px;'>$message<br></div>";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <sales@africargo.co.uk.com>' . "\r\n";
        mail($to,$subject,$message,$headers);
    }
    public function InsertparticularData(){
    $data=array();
    $frm_country_id=$this->input->post('frm_country_id');
    $to_country_id=$this->input->post('to_country_id');
    $frm_sate_id= $this->input->post('frm_sate_id');
    $to_sate_id= $this->input->post('to_sate_id');
    $fcountryName = $this->db->query("SELECT * FROM countries where id='$frm_country_id'")->row();
    $tcountryNmae = $this->db->query("SELECT * FROM countries where id='$to_country_id'")->row();
    $fsNmae = $this->db->query("SELECT * FROM states where id='$frm_sate_id'")->row();
    $tsNmae = $this->db->query("SELECT * FROM states where id='$to_sate_id'")->row();
    $data['frm_country_id']=$this->input->post('frm_country_id');
    $data['frm_sate_id']=$this->input->post('frm_sate_id');
    $data['fcountryName']=$fcountryName->name;
    $data['tcountryName']=$tcountryNmae->name;
    $data['fstate']=$fsNmae->name;
    $data['tsate']=$tsNmae->name;
    $data['to_country_id']=$this->input->post('to_country_id');
    $data['to_sate_id']=$this->input->post('to_sate_id');
    $data['email']=$this->input->post('email');
    $data['services']=$this->input->post('services');
    $data['noofparcels']=$this->input->post('noofparcels');
    $data['entry_date']= date("Y-m-d");
    $bookingId = $this->checkingMaxIdBookingId();
    if (!empty($bookingId->booking_id) > 0):
        $data['bookingId'] = sprintf("%06d", $bookingId->booking_id + 1) . '-' . date("y");
    else:
        $data['bookingId'] = sprintf("%06d", '000001') . '-' . date("y");
    endif;
    $this->db->insert('tbl_customer_data',$data);
    }
    public function removeCustomerData(){
        $history_id = $this->input->get('history_id');
        $this->db->query("DELETE FROM tbl_customer_history WHERE history_id='$history_id'");
        echo json_encode("remove");
    }
   
    public function getallState() {
        $country_id = $this->input->post('country_id');
        $allState = $this->db->query("SELECT * FROM `states` WHERE `country_id` = $country_id ")->result();
        echo "<option value=''>" . 'Choose State' . "</option>";
        foreach ($allState as $value) {
            echo "<option value='$value->id'>" . ucfirst($value->name) . "</option>";
        }
    }
    public function SaveSubscribe() {
        $data = array();
        $data['email'] = $this->input->post('email');
        $data['date'] = date("Y-m-d");
        $this->db->insert('tbl_subscribe', $data);
        $result = "Success";
        echo json_encode($result);
    }
}