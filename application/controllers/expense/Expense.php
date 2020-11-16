<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Expense extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->checkAuth();
    }

    public function getExpense() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Expense List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['category'] = $this->QueryModel->expensegetCatListInfo();
        $data['subcat'] = $this->QueryModel->expenseGetSubCatList();
        $data['hublist'] = $this->QueryModel->getHbuList();
        $data['allemployee'] = $this->QueryModel->getemployee();
        $data['allmerchent'] = $this->QueryModel->getMerchents();
        $data['maincontent'] = $this->load->view('admin/page/expense/expense', $data, true);
        $this->common_templete($data);
    }
    
    public function getexpenseList() {
        $items = $this->QueryModel->getexpenseInfo($this->input->get());
        echo json_encode($items);
    }
    
   public function geteditexpenseData() {
        $expense_id = $this->input->get('expense_id');
        $items = $this->QueryModel->getexpenseData($expense_id);
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