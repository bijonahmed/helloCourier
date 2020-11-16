<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->checkAuth();
    }

    //public $id;

    public function getJsonRole() {
        $this->checkAuth();
        $items = $this->QueryModel->getUserRoleList($this->input->get());
        echo json_encode($items);
    }

    public function getDvManlist(){

        $this->checkAuth();
        $items = $this->QueryModel->getDeliveryManList($this->input->get());
        echo json_encode($items);
    }
    
    public function checkingUserId() {
        $this->checkAuth();
        $field=$_GET['user_id'];
        $items = $this->QueryModel->getUserMerchentList($field);
        echo json_encode($items);
        
    }

    public function finddvmanIds(){
        $this->checkAuth();
        $id = $this->input->post('dv_assign_id');
        $response = $this->db->query("SELECT * FROM tbl_dv_man_assing_hubs WHERE dv_assign_id='$id'")->row();
        echo json_encode($response);

    }

    public function getJsonUser() {
        $items = $this->QueryModel->getUserList($this->input->get());
        echo json_encode($items);
    }

    public function index() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "User Role List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/user/rolelist', $data, true);
        $this->common_templete($data);
    }

    public function getUserList() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "User List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['userrole'] = $this->QueryModel->getUserRoleList();
        $data['dvman'] = $this->QueryModel->getdvmanList();
        $data['hubmanager'] = $this->QueryModel->getHubmangerList();
        $data['mkt'] = $this->QueryModel->mktlists();
        $data['pickup'] = $this->QueryModel->pickuplists();
        $data['admin'] = $this->QueryModel->getadminlist();
        $data['maincontent'] = $this->load->view('admin/page/user/userlist', $data, true);
        $this->common_templete($data);
    }
    
    public function getdvManAssigntoHubList(){
        
        $this->checkAuth();
        $data = array();
        $data['title'] = "Dv Man Assign to Hub";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['hublist'] = $this->QueryModel->getHbuList();
        $data['dvman'] = $this->QueryModel->getdvmanList();
        $data['maincontent'] = $this->load->view('admin/page/user/dvmanassignlist', $data, true);
        $this->common_templete($data);
        
    }

    public function create_user() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "User Create";
        $data['uselist'] = $this->QueryModel->getUserList();
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['userrole'] = $this->QueryModel->getUserRoleList();
        $data['divisionList'] = $this->QueryModel->getDivisionList();
        $data['hublist'] = $this->QueryModel->getHbuList();
        $data['paytype'] = $this->QueryModel->getDataTypeListInfo($this->input->get());
        $data['country'] = $this->db->query("SELECT * FROM countries ")->result();
        $data['maincontent'] = $this->load->view('admin/page/user/createUser', $data, true);
        $this->common_templete($data);
    }

    public function edit_user_frm($user_id) {
        
        $this->checkAuth();
        $data = array();
        $data['title'] = "Edit UserId: [$user_id]";
        $data['paytype'] = $this->QueryModel->getDataTypeListInfo($this->input->get());
        $data['hublist'] = $this->QueryModel->getHbuList();
        $data['user_row'] = $this->QueryModel->getUserEdit($user_id);
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['userrole'] = $this->QueryModel->getUserRoleList();
        $data['country'] = $this->db->query("SELECT * FROM countries ")->result();
        $countryId = $data['user_row']->country_id;
        $data['allState'] = $this->db->query("SELECT * FROM states WHERE country_id='$countryId' ")->result();
        $data['maincontent'] = $this->load->view('admin/page/user/editUser', $data, true);
        $this->common_templete($data);
    }

    public function getLogList() {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Log List";
        $data['log_list'] = $this->QueryModel->getUserlog();
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['userrole'] = $this->QueryModel->getUserRoleList();
        $data['maincontent'] = $this->load->view('admin/page/log/log', $data, true);
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