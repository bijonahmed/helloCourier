<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
       $this->checkAuth();
    }

    public function index() {
		$this->checkAuth();
        $user_id=$this->session->userdata('user_id');
        $data = array();
		    $data['title']="Profile";
        $data['user_row'] = $this->QueryModel->getUserEdit($user_id);
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['total_user'] = $this->QueryModel->getTotaluser();
        $data['userrole'] = $this->QueryModel->getUserRoleList();
        $data['maincontent'] = $this->load->view('admin/page/user/prifile', $data, true);
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
