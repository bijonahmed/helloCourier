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
        $data['maincontent'] = $this->load->view('admin/page/expense/categorylist', $data, true);
        $this->common_templete($data);
    }

    public function expenseGetJsonCategory() {
        $items = $this->QueryModel->expensegetCatListInfo($this->input->get());
        echo json_encode($items);
    }

    public function getJsonSubCategory() {
        $items = $this->QueryModel->expenseGetSubCatList($this->input->get());
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
        redirect("expense/category/getSubCategoryList");
    }

    public function getSubCategoryList() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Sub Category List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/expense/subCategoryList', $data, true);
        $this->common_templete($data);
    }


    public function create_category() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Create Category";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/expense/category_frm', $data, true);
        $this->common_templete($data);
    }

    public function sub_create_category() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Create Sub Category";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['categoryList'] = $this->QueryModel->expensegetCatListInfo();
        $data['maincontent'] = $this->load->view('admin/page/expense/sub_category_frm', $data, true);
        $this->common_templete($data);
    }


    public function edit_category_frm() {
        $this->checkAuth();
        $category_id= $_GET['category_id'];
        $row = $this->QueryModel->getCategoryRowEdit($category_id);
        echo json_encode($row);
    }

    public function edit_subcategory_frm($sub_cat_id) {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Edit Sub Category";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['categoryList'] = $this->QueryModel->expensegetCatListInfo();
        $data['subcategory_row'] = $this->QueryModel->getSubCategoryRowEdit($sub_cat_id);
        $data['maincontent'] = $this->load->view('admin/page/expense/sub_category_frm', $data, true);
        $this->common_templete($data);
    }

       public function checkCategory() {
        $this->checkAuth();
        $field=$_GET['category_id'];
        $items = $this->QueryModel->getexpenseCategory($field);
        echo json_encode($items);
        
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