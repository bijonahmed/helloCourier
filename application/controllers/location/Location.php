<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Location extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->checkAuth();
    }

    public function edit_division_frm($division_id) {
		$this->checkAuth();
        $data = array();
        $data['title'] = "Edit Division";
        $data['division_row'] = $this->QueryModel->getDivsionEdit($division_id);
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['divisionList'] = $this->QueryModel->getDivisionList();
        $data['maincontent'] = $this->load->view('admin/page/location/editdivision', $data, true);
        $this->common_templete($data);
    }

    public function editdistrict_frm($district_id) {
		$this->checkAuth();
        $data = array();
        $data['title'] = "Edit District";
        $data['distric_row'] = $this->QueryModel->getDistrictedit($district_id);
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['divisionList'] = $this->QueryModel->getDivisionList();
        $data['maincontent'] = $this->load->view('admin/page/location/editdistrict', $data, true);
        $this->common_templete($data);
    }

    public function upz_list_frm($upozilla_id) {
		$this->checkAuth();
        $data = array();
        $data['title'] = "Edit Upz";
        $data['districtList'] = $this->QueryModel->getdistrictList();
        $data['upz_row'] = $this->QueryModel->getUpzedit($upozilla_id);
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['divisionList'] = $this->QueryModel->getDivisionList();
        $this->common_templete($data);
    }


    public function division_list() {
		$this->checkAuth();
        $data = array();
        $data['title'] = "Division List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/location/divisionList', $data, true);
        $this->common_templete($data);
    }
    public function getJsonDivision()
        {
           $items =  $this->QueryModel->getDivisionList($this->input->get());
           echo json_encode($items);
       }
       
        public function getJsonDistrict()
        {
           $items =  $this->QueryModel->getdisDivlist($this->input->get());
           echo json_encode($items);
       }
   
        
    public function district_list() {
		$this->checkAuth();
        $data = array();
        $data['title'] = "District List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/location/districtList', $data, true);
        $this->common_templete($data);
    }

    public function upz_list() {
		$this->checkAuth();
        $data = array();
        $data['title'] = "Upz List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/location/upzList', $data, true);
        $this->common_templete($data);
    }
      public function getJsonUpz()
    {
       $items =  $this->QueryModel->getsdisDivupzlist($this->input->get());
       echo json_encode($items);
    }
   

    public function create_division() {
		$this->checkAuth();
        $data = array();
        $data['title'] = "Create Division";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['districtList'] = $this->QueryModel->getdisDivupzlist();
        $data['maincontent'] = $this->load->view('admin/page/location/createdivsion', $data, true);
        $this->common_templete($data);
    }

    public function create_district() {
		$this->checkAuth();
        $data = array();
        $data['title'] = "Create District";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['districtList'] = $this->QueryModel->getdisDivupzlist();
        $data['divisionList'] = $this->QueryModel->getDivisionList();
        $data['maincontent'] = $this->load->view('admin/page/location/createdistrict', $data, true);
        $this->common_templete($data);
    }

    public function create_upz() {
		$this->checkAuth();
        $data = array();
        $data['title'] = "Create Upz";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['districtList'] = $this->QueryModel->getdisDivupzlist();
        $data['divisionList'] = $this->QueryModel->getDivisionList();
        $data['upzList'] = $this->QueryModel->getupzList();
        $data['maincontent'] = $this->load->view('admin/page/location/createupz', $data, true);
        $this->common_templete($data);
    }

    public function common_templete($data=array())
   {
	   $this->checkAuth();
       $data['header'] = $this->load->view('admin/common/header', $data, true);
       $data['sidebar'] = $this->load->view('admin/common/sidebar', $data, true);
       $data['footer'] = $this->load->view('admin/common/footer', $data, true);
       $this->load->view('admin/dashboard/index', $data);
       
   }
   
   public function checkAuth(){
		if ($this->session->userdata('user_id') == null):
            redirect("login");
        endif;
	}
}
