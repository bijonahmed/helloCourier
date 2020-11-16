<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Post extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->checkAuth();
    }

    public function edit_posting_frm($post_id) {
        $this->checkAuth();
        $data = array();
        $data['title'] = "Edit Post";
        $user_id = $this->session->userdata('user_id');
        $data['menu'] = $this->QueryModel->getmenu();
        $data['user_row'] = $this->QueryModel->getUserEdit($user_id);
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['category'] = $this->QueryModel->getfrontedcatlist();
        $data['post_row'] = $this->QueryModel->getPostrow($post_id);
        $data['subcategory'] = $this->QueryModel->getSubCatActive();
        $data['maincontent'] = $this->load->view('admin/page/post/add_post', $data, true);
        $this->common_templete($data);
    }

    public function add_post() {
        $this->checkAuth();
        $user_id = $this->session->userdata('user_id');
        $data = array();
        $data['title'] = "Add Post";
        $data['user_row'] = $this->QueryModel->getUserEdit($user_id);
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['category'] = $this->QueryModel->getFrontedcategory();
        $data['menu'] = $this->QueryModel->getmenu();
        $data['maincontent'] = $this->load->view('admin/page/post/add_post', $data, true);
        $this->common_templete($data);
    }

    public function post_list() {
        $this->checkAuth();
        $user_id = $this->session->userdata('user_id');
        $data = array();
        $data['title'] = "Post List";
        $data['user_row'] = $this->QueryModel->getUserEdit($user_id);
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/post/post_list', $data, true);
        $this->common_templete($data);
    }

    public function getJsonPost() {
        $items = $this->QueryModel->getPostListr($this->input->get());
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
