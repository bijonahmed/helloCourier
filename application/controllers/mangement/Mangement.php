<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Mangement extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->checkAuth();
        $this->load->model('ExpenseModel');
    }
    public function getUserId() {
        $this->checkAuth();
        $userId = $this->input->post('userId');
        $sdata = array();
        $sdata['u_id'] = $userId;
        $this->session->set_userdata($sdata);
        $outPut = $this->db->query("SELECT SUM(collection_amount) as codAmount FROM tbl_booking WHERE user_id='$userId'")->row();
        echo trim($outPut->codAmount);
    }
    public function getdistrictList() {
      $this->checkAuth();
        $divisionId = $this->input->get('divisionId');
        $alldistrict = $this->db->query("SELECT * FROM tbl_district WHERE division_id='$divisionId'")->result();
        echo "<option value=''>" . 'Select district' . "</option>";
        foreach ($alldistrict as $value) {
            echo "<option value='$value->district_id'>" . ucfirst($value->district_name) . "</option>";
        }
    }
    
    public function checkRateType(){
        
        $data=array();
        $data['rate_type'] = $this->input->post('value');
        $query = $this->QueryModel->getRateJson($data);
        echo "<option value=''>" . 'Select ' . "</option>";
        foreach ($query as $value) {
            echo "<option value='$value->rate_id'>" . $value->rate_id.'. '.$value->name .  "</option>";
        }
       
    }
    
    public function checkRateCostList(){
         $frmLocation = $this->input->get('frmLocation');
         $toLocation = $this->input->get('toLocation');
         $query = $this->db->query("SELECT * FROM `tbl_rate` WHERE `frmID` = '$frmLocation' and `toId` ='$toLocation'")->result();
         echo "<option value=''>" . 'Select ' . "</option>";
        foreach ($query as $value) {
            echo "<option value='$value->rate_id'>" .$value->name .  "</option>";
        }
    }
    
    public function getToLocationEdit(){
        $this->checkAuth();
        $rate_type = trim($this->input->post('rate_type'));
        $toLocation = trim($this->input->post('toLocation'));
                if($rate_type == "Domestic"){
                 $data = $this->db->query("SELECT * FROM `states`")->result();
                    echo "<option value=''>" . 'Select' . "</option>";
                foreach ($data as $value) {
                if($toLocation==$value->name){
                    echo "<option value='$value->name' selected>" . ucfirst($value->name) . "</option>";
                }else{
                    echo "<option value='$value->name'>" . ucfirst($value->name) . "</option>";
                }
        }
        }
        if($rate_type == "International"){
        $data = $this->db->query("SELECT * FROM `countries`")->result();
        echo "<option value=''>" . 'Select' . "</option>";
        foreach ($data as $value) {
                if($toLocation==$value->name){
                    echo "<option value='$value->name' selected>" . ucfirst($value->name) . "</option>";
                }else{
                    echo "<option value='$value->name'>" . ucfirst($value->name) . "</option>";
                }
        }
        }
    }
    public function getFrmLocationEdit(){
        $this->checkAuth();
        $rate_type = trim($this->input->post('rate_type'));
        $frmLocation = trim($this->input->post('frmLocation'));
                if($rate_type == "Domestic"){
                 $data = $this->db->query("SELECT * FROM `states`")->result();
                    echo "<option value=''>" . 'Select' . "</option>";
                foreach ($data as $value) {
                if($frmLocation==$value->name){
                    echo "<option value='$value->name' selected>" . ucfirst($value->name) . "</option>";
                }else{
                    echo "<option value='$value->name'>" . ucfirst($value->name) . "</option>";
                }
        }
        }
        if($rate_type == "International"){
        $data = $this->db->query("SELECT * FROM `countries`")->result();
        echo "<option value=''>" . 'Select' . "</option>";
        foreach ($data as $value) {
                if($frmLocation==$value->name){
                    echo "<option value='$value->name' selected>" . ucfirst($value->name) . "</option>";
                }else{
                    echo "<option value='$value->name'>" . ucfirst($value->name) . "</option>";
                }
        }
        }
    }
    
    
    
    // edit form booking
        public function bookingToLocationEdit(){
        $this->checkAuth();
        $rate_type = trim($this->input->post('rate_type'));
        $toLocation = trim($this->input->post('toLocation'));
                if($rate_type == "Domestic"){
                 $data = $this->db->query("SELECT * FROM `states` WHERE `id` = $toLocation")->result();
                    echo "<option value=''>" . 'Select' . "</option>";
                foreach ($data as $value) {
                if($toLocation==$value->id){
                    echo "<option value='$value->name' selected>" . ucfirst($value->name) . "</option>";
                }else{
                    echo "<option value='$value->name'>" . ucfirst($value->name) . "</option>";
                }
        }
        }
        if($rate_type == "International"){
        $data = $this->db->query("SELECT * FROM `countries` `id` = $toLocation")->result();
        echo "<option value=''>" . 'Select' . "</option>";
        foreach ($data as $value) {
                if($toLocation==$value->id){
                    echo "<option value='$value->name' selected>" . ucfirst($value->name) . "</option>";
                }else{
                    echo "<option value='$value->name'>" . ucfirst($value->name) . "</option>";
                }
        }
        }
    }
    public function bookingFrmLocationEdit(){
        $this->checkAuth();
        $rate_type = trim($this->input->post('rate_type'));
        $frmLocation = trim($this->input->post('frmLocation'));
                if($rate_type == "Domestic"){
                 $data = $this->db->query("SELECT * FROM `states` WHERE `id` = $frmLocation")->result();
                    echo "<option value=''>" . 'Select' . "</option>";
                foreach ($data as $value) {
                if($frmLocation==$value->id){
                    echo "<option value='$value->name' selected>" . ucfirst($value->name) . "</option>";
                }else{
                    echo "<option value='$value->name'>" . ucfirst($value->name) . "</option>";
                }
        }
     
        
        }
        if($rate_type == "International"){
        $data = $this->db->query("SELECT * FROM `countries` WHERE `id` = $frmLocation' ")->result();
        echo "<option value=''>" . 'Select' . "</option>";
        foreach ($data as $value) {
                if($frmLocation==$value->id){
                    echo "<option value='$value->name' selected>" . ucfirst($value->name) . "</option>";
                }else{
                    echo "<option value='$value->name'>" . ucfirst($value->name) . "</option>";
                }
        }
        }
    }
    //end
    
    public function searchRateId(){
        
        $this->checkAuth();
        $rate_id = trim($this->input->post('rate_id'));
            $data = $this->db->query("SELECT * FROM `tbl_rate` WHERE `rate_id` = '$rate_id' ")->result();
            echo "<option value=''>" . 'Select' . "</option>";
        foreach ($data as $value) {
                if($rate_id==$value->rate_id){
                    echo "<option value='$value->name' selected>" . ucfirst($value->name) . "</option>";
                }else{
                    echo "<option value='$value->name'>" . ucfirst($value->name) . "</option>";
                }
        }
        
    }
    
    public function getLocationValue(){
        $this->checkAuth();
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
    
    public function getDomesticValue(){
        $this->checkAuth();
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
    public function insertHub() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           $data= $this->QueryModel->addHubEdit($this->input->post());
            echo json_encode($data);
        }
    }
    
    public function checkRateCost(){
        $rate_id = $this->input->post('rate_id');
        $cost = $this->db->query("SELECT * FROM tbl_rate WHERE rate_id='$rate_id'")->row();
        echo json_encode($cost->cost);
        
    }
    
    public function getSubcategoryExpense() {
        $this->checkAuth();
        $category_id = $this->input->post('category_id');
        echo $category_id;
        $alldatat = $this->db->query("SELECT * FROM tbl_expense_sucategory WHERE category_id='$category_id'")->result();
        echo "<option value=''>" . 'Select SubCategory' . "</option>";
        foreach ($alldatat as $value) {
            echo "<option value='$value->sub_cat_id'>" . ucfirst($value->sub_cat_name) . "</option>";
        }
    }
    public function getdvman() {
        $this->checkAuth();
        $hubs_id = $this->input->post('hubs_id');
        if (!empty($hubs_id)) {
            $data = $this->db->query("SELECT * FROM tbl_dv_man_assing_hubs LEFT JOIN "
                            . "tbl_user ON (tbl_user.user_id=tbl_dv_man_assing_hubs.user_id) "
                            . "WHERE tbl_dv_man_assing_hubs.hubs_id='$hubs_id'")->result();
        } else {
            $data = $this->db->query("SELECT * FROM tbl_dv_man_assing_hubs LEFT JOIN "
                            . "tbl_user ON (tbl_user.user_id=tbl_dv_man_assing_hubs.user_id)")->result();
        }
        echo "<option value=''>" . 'Select Delivery Man' . "</option>";
        foreach ($data as $value) {
            echo "<option value='$value->user_id'>" . ucfirst($value->full_name) . '  [' . $value->mobile_number . ']' . "</option>";
        }
    }
    public function getSubInSubList() {
        $this->checkAuth();
        $sub_cat_id = $this->input->post('2d');
        $all = $this->db->query("SELECT * FROM tbl_sub_in_sub_cat_name WHERE sub_cat_id='$sub_cat_id'")->result();
        echo "<option value=''>" . 'Select' . "</option>";
        foreach ($all as $value) {
            echo "<option value='$value->sub_in_sub_id'>" . ucfirst($value->sub_in_sub_cat_name) . "</option>";
        }
    }
    public function getCategoryList() {
        $this->checkAuth();
        $category_id = $this->input->post('category_id');
        $catList = $this->db->query("SELECT * FROM tbl_sucategory WHERE category_id='$category_id'")->result();
        echo "<option value=''>" . 'Select Sub Category' . "</option>";
        foreach ($catList as $value):
            echo "<option value='$value->sub_cat_id'>" . ucfirst($value->sub_cat_name) . "</option>";
        endforeach;
    }
    public function getPaymentTypeList() {
        $this->checkAuth();
        $category_id = $this->input->post('category_id');
        $list = $this->db->query("SELECT * FROM tbl_deliverytype WHERE category_id='$category_id'")->result();
//        echo "<option value='' selected='selected'>" . 'Select Delivery Type' . "</option>";
        foreach ($list as $value):
            echo "<option value='$value->deliverytype_id'>" . $value->price . "</option>";
        endforeach;
    }
    public function getSubCategory() {
        $this->checkAuth();
        $category_id = $this->input->post('category_id');
        $allSubcategory = $this->db->query("SELECT * FROM tbl_sucategory WHERE category_id='$category_id'")->result();
        echo "<option value=''>" . 'Select Sub Category' . "</option>";
        foreach ($allSubcategory as $value):
            echo "<option value='$value->sub_cat_id'>" . ucfirst($value->sub_cat_name) . "</option>";
        endforeach;
    }
    public function getupzList() {
        $this->checkAuth();
        $districtId = $this->input->post('districtId');
        $allupz = $this->db->query("SELECT * FROM tbl_upozilla WHERE district_id='$districtId'")->result();
        echo "<option value=''>" . 'Select upz/area' . "</option>";
        foreach ($allupz as $value):
            echo "<option value='$value->upozilla_id'>" . ucfirst($value->upozilla_name) . "</option>";
        endforeach;
    }
    public function getUserName() {
        $this->checkAuth();
        $userName = $this->input->post('userName');
        $response = $this->db->query("SELECT user_id FROM tbl_user WHERE user_name='$userName'")->row();
        if ($response):
            $data = "yes";
        else:
            $data = "no";
        endif;
        echo json_encode($data);
    }
    public function getMenuName() {
        $this->checkAuth();
        $menu_name = $this->input->post('menu_name');
        $response = $this->db->query("SELECT menu_name FROM tbl_menu WHERE menu_name='$menu_name'")->row();
        if ($response):
            $data = "yes";
        else:
            $data = "no";
        endif;
        echo json_encode($data);
    }
    public function getUserMobileCustomer() {
        $this->checkAuth();
        $mobile = $this->input->post('mobile');
        $response = $this->db->query("SELECT customer_id FROM tbl_customer WHERE customer_mobile='$mobile'")->row();
        if ($response):
            $data = "yes";
        else:
            $data = "no";
        endif;
        echo json_encode($data);
    }
    public function getDeliveryChnarge() {
        $this->checkAuth();
        $user_id = $this->input->post('user_id');
        $response = $this->db->query("SELECT dvcharge FROM tbl_user WHERE user_id='$user_id'")->row();
        echo json_encode($response);
    }
    public function checkBookingStatus() {
        $this->checkAuth();
        $booking_id = $this->input->post('booking_id');
        if (!empty($booking_id)) {
            $response = $this->db->query("SELECT status,booking_id FROM tbl_booking WHERE booking_id='$booking_id'")->row();
            echo json_encode($response);
        }
    }
    public function checkMobileNumber() {
        $this->checkAuth();
        $number = $this->input->post('mobileNumber');
        $response = $this->db->query("SELECT reciver_name,reciver_address,reciver_phone FROM tbl_booking WHERE reciver_phone='$number' ORDER BY booking_id DESC")->row();
        echo json_encode($response);
    }
    public function getUserMobile() {
        $this->checkAuth();
        $mobile = $this->input->post('mobile');
        $response = $this->db->query("SELECT user_id FROM tbl_user WHERE mobile_number='$mobile'")->row();
        if ($response):
            $data = "yes";
        else:
            $data = "no";
        endif;
        echo json_encode($data);
    }
    public function getUserEmail() {
        $this->checkAuth();
        $useremail = $this->input->post('email');
        $response = $this->db->query("SELECT user_id FROM tbl_user WHERE email='$useremail'")->row();
        if ($response):
            $data = "yes";
        else:
            $data = "no";
        endif;
        echo json_encode($data);
    }
    public function saveDistrict() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addEditDistrict($this->input->post());
            redirect("location/location/create_district");
        }
    }
    public function updateLeadPost() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addEditLeadNews($this->input->post());
            redirect("post/post/post_list");
        }
    }
    public function updatesetting() {
         $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->updatesetting($this->input->post());
            redirect("setting/mysetting");
        }
    }
    public function inserttobookingupdate() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addEditSavebUpdate($this->input->post());
            redirect("booking_update/bookingupdate");
        }
    }
    public function save_booking() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addEditSave($this->input->post());
           
        }
    }
    public function updateBookingStatus() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->updateStatusBooking($this->input->post());
            redirect("sendeliverysts/deliverysts/senddeliverystsList");
        }
    }
    public function updateAssignStatus() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->updateStatusAssign($this->input->post());
            redirect("assignto/assignto/geAssigntoList");
        }
    }
    public function insertAssignto() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = $this->QueryModel->addAssignto($this->input->post());
            echo json_encode($result);
        }
    }
        public function insertAssigntoHubs() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = $this->QueryModel->addAssigntoHubs($this->input->post());
            echo json_encode($result);
        }
    }
    public function save_bookingUser() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addEditSaveUser($this->input->post());
            redirect("marchent");
        }
    }
    public function saveDvmanAssignToHubs() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $hubs_id = $_POST['hubs_id'];
            $user_id = $_POST['user_id'];
            $sql = $this->db->query("SELECT * FROM tbl_dv_man_assing_hubs WHERE hubs_id='$hubs_id' AND user_id='$user_id'")->row();
            if (!empty($sql->dv_assign_id)) {
                $json = "Sorry already exits UserId";
                echo json_encode($json);
            } else {
                $this->QueryModel->addEditSaveDvManAssign($this->input->post());
                $json = "successfully save";
                echo json_encode($json);
            }
        }
    }
    public function save_expense() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addEditSaveExpense($this->input->post());
        }
    }
     public function save_pickup() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data= $this->QueryModel->addEditSavePickup($this->input->post());
            echo json_encode($data);
        }
    }
    public function save_booking_admin() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data= $this->QueryModel->addEditSave($this->input->post());
            echo json_encode($data);
        }
    }
    public function update_multiple_paid() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->updatePaidOption($this->input->post());
            $json = "successfully save";
            echo json_encode($json);
        }
    }
    public function update_status() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->updateSts($this->input->post());
            $json = "successfully save";
            echo json_encode($json);
        }
    }
    public function update_multiple_status() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $hubs_id = $this->input->post('hubs_id'); 
            $user_id = $this->input->post('user_id'); 
            $this->QueryModel->updateStatusMultiple($this->input->post());
            $sdata = array();
            $sdata['updatemsg'] = "Successfully upate booking status";
            $this->session->set_userdata($sdata);
            redirect("booking_update/bookingupdate/checkstatusUpdate?hubs_id=$hubs_id&user_id=$user_id");
        }
    }
    public function paymentStore() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addEditSavePayments($this->input->post());
            redirect("mpayment/getMerchentPaymentList");
        }
    }
    public function insertPost() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addEditPost($this->input->post());
            redirect("post/post/post_list");
        }
    }
    public function insertPackageGalleryPackages() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addEditGallery($this->input->post());
            redirect("package/package/add_package");
        }
    }
    public function insertPackageGallery() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addEditGallery($this->input->post());
            redirect("gallery/gallery/");
        }
    }
    public function insertMediaFile() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addEditMedia($this->input->post());
            redirect("media/media_file");
        }
    }
    public function updateBooking() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $row=$this->QueryModel->updatebookinginfo($this->input->post());
            echo json_encode($row);
        }
    }
    public function updatePickup() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $row=$this->QueryModel->updatePickupInfo($this->input->post());
            echo json_encode($row);
        }
    }
    public function send_status_update() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->sendStatusUpdate($this->input->post());
        }
    }
    public function sumcollectionAmount() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->getcodsumvalue($this->input->post());
        }
    }
    public function updateBookings() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->BookingUpdate($this->input->post());
        }
    }
    public function updatebookingstus() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->updatebookinSts($this->input->post());
            redirect("dashboard/dashboard");
        }
    }
    public function deliveryManStatusUpdate() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->bookingUpdateDevMan($this->input->post());
            redirect("dashboard/dashboard");
        }
    }
    public function insertSlider() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addEditInsertSlider($this->input->post());
            redirect("slider/slider");
        }
    }
      public function insertmenu() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $row = $this->QueryModel->addeditmenu($this->input->post());
            echo json_encode($row);
        }
    }
    public function insertRate() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           $row= $this->QueryModel->addRateEdit($this->input->post());
           echo json_encode($row);
        }
    }
    public function insertCategory() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           $row= $this->QueryModel->addCategoryEdit($this->input->post());
           echo json_encode($row);
        }
    }
    public function insertmkt() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data=$this->QueryModel->addEditmkt($this->input->post());
            echo json_encode($data);
        }
    }
     public function insertDepartment() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data=$this->QueryModel->addEditDepatment($this->input->post());
            echo json_encode($data);
        }
    }
     public function insertEmployee() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addEditEmployee($this->input->post());
            redirect("employee/employee/getemployeelist");
        }
    }
    public function insertDesignation() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           $data= $this->QueryModel->addEditDesignation($this->input->post());
              echo json_encode($data);
        }
    }
    
    public function save_payment(){
         $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           $data= $this->QueryModel->addeditcustomerPayment($this->input->post());
              echo json_encode($data);
        }
    }
    
     public function save_due(){
         $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           $data= $this->QueryModel->addeditpaymentdue($this->input->post());
              echo json_encode($data);
        }
    }
    
    
    
    public function expenseInsertCategory() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data= $this->QueryModel->addCategoryEditExpense($this->input->post());
            echo json_encode($data);
        }
    }
    public function insertDeliveryType() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addDeliveryTypeEdit($this->input->post());
            redirect("deliverytype/deliverytype/getDeliveryList");
        }
    }
    public function insertSubCategory() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addSubCategoryEdit($this->input->post());
            redirect("category/category/getSubCategoryList");
        }
    }
    public function ExpenseinsertSubCategory() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->expenseAddSubCategoryEdit($this->input->post());
            redirect("expense/category/sub_create_category");
        }
    }
    public function insertSubInSubCategory() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addSubInSubCategoryEdit($this->input->post());
            redirect("category/category/getSubInSubCategoryList");
        }
    }
    public function insertPackage() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addEditPakcages($this->input->post());
            redirect("package/package/");
        }
    }
    public function saveUpz() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addEditLeadUpz($this->input->post());
            redirect("location/location/create_upz");
        }
    }
    public function saveDivision() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addEditDivision($this->input->post());
            redirect("location/location/create_division");
        }
    }
    public function savePickupSchedule(){
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addeditPickupSchedule($this->input->post());
            redirect("/schedulepickup");
        }
    }
    public function saveUserRecord() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addEditUser($this->input->post());
            $role_id = $this->session->userdata('role_id');
            if($role_id==1){
            redirect("user/user/getUserList");    
            }else{
                redirect("dashboard/dashboard");
            }
        }
    }
    public function updateUserPass() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->QueryModel->addEditUserPass($this->input->post());
            redirect("dashboard/dashboard");
        }
    }
    public function checkAuth() {
        if ($this->session->userdata('user_id') == null):
            redirect("login");
        endif;
    }
}
