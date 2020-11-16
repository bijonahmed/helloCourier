<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->checkAuth();
    }

    public function getCategoryList() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Category List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/category/categorylist', $data, true);
        $this->common_templete($data);
    }
 public function ratelist() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Rate List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/category/ratelist', $data, true);
        $this->common_templete($data);
    }
    public function edit_deliverty_frm($deliverytype_id) {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Edit Category";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['categoryList'] = $this->QueryModel->getCatList();
        $data['row'] = $this->QueryModel->getDeliveryTypeRowEdit($deliverytype_id);
        $data['maincontent'] = $this->load->view('admin/page/deliverytype/deliverytype_frm', $data, true);
        $this->common_templete($data);
    }

    public function getJsonCategory() {
        $items = $this->QueryModel->getCatListInfo($this->input->get());
        echo json_encode($items);
    }
    
    public function getJsonRate(){
      $items = $this->QueryModel->getRateJson($this->input->get());
        echo json_encode($items);
     
     
    }

    public function getJsonSubCategory() {
        $items = $this->QueryModel->getSubCatList($this->input->get());
        echo json_encode($items);
    }

    public function getJsonSubInCategory() {
        $items = $this->QueryModel->getSubInSubCatList($this->input->get());
        echo json_encode($items);
    }

    public function delete_sub_cate($sub_cat_id) {
        $this->checkAuth();
        $this->db->query("DELETE FROM tbl_sucategory WHERE sub_cat_id='$sub_cat_id'");
        $sdata['msg'] = 'Successfully Delete';
        $this->session->set_userdata($sdata);
        redirect("category/category/getSubCategoryList");
    }

    public function getSubCategoryList() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Sub Category List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/category/subCategoryList', $data, true);
        $this->common_templete($data);
    }

    public function getSubInSubCategoryList() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Sub In Sub Category List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/category/subInSubCategoryList', $data, true);
        $this->common_templete($data);
    }

    public function create_category() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Create Category";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/category/category_frm', $data, true);
        $this->common_templete($data);
    }

    public function sub_create_category() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Create Sub Category";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['categoryList'] = $this->QueryModel->getCatList();
        $data['maincontent'] = $this->load->view('admin/page/category/sub_category_frm', $data, true);
        $this->common_templete($data);
    }

    public function sub_in_sub_create_category() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Create In Sub Category";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['categoryList'] = $this->QueryModel->getCatList();
        $data['maincontent'] = $this->load->view('admin/page/category/sub_in_sub_category_frm', $data, true);
        $this->common_templete($data);
    }

    public function edit_category_frm() {
        $category_id= $_GET['category_id'];
        $row=$this->QueryModel->getCategoryRowEdit($category_id);
        echo json_encode($row);
    }

      public function edit_rate_info() {
        $rate_id= $_GET['rate_id'];
        $row=$this->QueryModel->getRateEditRow($rate_id);
        echo json_encode($row);
    }
    
    
    public function edit_subcategory_frm($sub_cat_id) {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Edit Sub Category";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['categoryList'] = $this->QueryModel->getCatList();
        $data['subcategory_row'] = $this->QueryModel->getSubCategoryRowEdit($sub_cat_id);
        $data['maincontent'] = $this->load->view('admin/page/category/sub_category_frm', $data, true);
        $this->common_templete($data);
    }

    public function edit_subSubcategory_frm($sub_in_sub_id) {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Edit Sub In Sub Category";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['categoryList'] = $this->QueryModel->getCatList();
        $data['subcategoryList'] = $this->QueryModel->getSubCatList();
        $data['subcategory_row'] = $this->QueryModel->getSubSubCategoryRowEdit($sub_in_sub_id);
        $data['maincontent'] = $this->load->view('admin/page/category/edit_sub_in_sub_category_frm', $data, true);
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
