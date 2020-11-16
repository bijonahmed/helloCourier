<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->checkAuth();
    }

    public function getdepatmentlist() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Department List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/employee/depatmentlist', $data, true);
        $this->common_templete($data);
    }
    
       public function getdesignationlist() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Designation List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/employee/designationlist', $data, true);
        $this->common_templete($data);
    }
    
    public function getemployeelist(){
        $this->checkAuth();
        $data = array();
        $data['title'] = "Employee List";
                $data['department'] = $this->QueryModel->getDepatmentlist($this->input->get());
        $data['designation'] = $this->QueryModel->getdesignationlist($this->input->get());
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/employee/employeelist', $data, true);
        $this->common_templete($data);
    }
     
    public function getJsondpt() {
        $items = $this->QueryModel->getDepatmentlist($this->input->get());
        echo json_encode($items);
    }
    
    public function getJsondesignation(){
        $items = $this->QueryModel->getdesignationlist($this->input->get());
        echo json_encode($items);
    }
    
    public function getjsonEmployee(){
        $items = $this->QueryModel->getEmployeeList($this->input->get());
        echo json_encode($items);
    }
  public function create_designation() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Create Designation";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/employee/designation_frm', $data, true);
        $this->common_templete($data);
    }

    public function create_depatment() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Create Department";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/employee/depatment_frm', $data, true);
        $this->common_templete($data);
    }
    
    public function create_employee() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Create Employee";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['department'] = $this->QueryModel->getDepatmentlist($this->input->get());
        $data['designation'] = $this->QueryModel->getdesignationlist($this->input->get());
        $data['maincontent'] = $this->load->view('admin/page/employee/employee_frm', $data, true);
        $this->common_templete($data);
    }

    public function edit_dpt_response(){
      $dpt_id= $_GET['dpt_id'];
      $row =$this->QueryModel->getdepatmentrow($dpt_id);
      echo json_encode($row);
    }
    
    public function findEmployeeFrm(){
      $employeeid= $_GET['employeeid'];
      $row =$this->QueryModel->getdemployeerow($employeeid);
      echo json_encode($row);
    }
    
    public function edit_designation_response() {
      $designation_id= $_GET['designation_id'];
      $row =$this->QueryModel->getdesignation($designation_id);
      echo json_encode($row);
    }
    public function checkMobile() {
        $mobile = $this->input->get('mobile_number');
        $response = $this->db->query("SELECT mobile_number FROM tbl_employee WHERE mobile_number='$mobile'")->row();
        if ($response) {
            $data = "yes";
        } else {
            $data = "no";
        }
        echo json_encode($data);
    }
    
  public function checkEmail() {
       $email = $this->input->get('email');
       $response = $this->db->query("SELECT email FROM tbl_employee WHERE email='$email'")->row();
       if ($response) {
           $data = "yes";
       } else {
           $data = "no";
       }
       echo json_encode($data);
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