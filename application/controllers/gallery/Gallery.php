<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends CI_Controller {
     public function __construct() {
        
        parent::__construct();
       $this->checkAuth();
    }
      public function getJsonGallery()
        {
           $items =  $this->QueryModel->getgalleryList($this->input->get());
           echo json_encode($items);
        }
    

    public function index() {
		$this->checkAuth();
        $data = array();
        $data['title'] = "Gallery List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/gallery/gallery_list', $data, true);
        $this->common_templete($data);
    }

    public function add_gallery() {
		$this->checkAuth();
        $data = array();
        $data['title'] = "Add Gallery";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['subCatList'] = $this->QueryModel->getSubCatInfo();
        $data['subInSubcategoryList'] = $this->QueryModel->getSubInSubCatList();
        $data['maincontent'] = $this->load->view('admin/page/gallery/add_gallery', $data, true);
        $this->common_templete($data);
    }

    public function edit_gallery_frm($gallery_id) {
		$this->checkAuth();
        $data = array();
        $data['title'] = "Edit Gallery";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['subCatList'] = $this->QueryModel->getSubCatInfo();
        $data['galleryRow'] = $this->QueryModel->getGalleryId($gallery_id);
        $data['maincontent'] = $this->load->view('admin/page/gallery/add_gallery', $data, true);
        $this->common_templete($data);
    }

        public function edit_galleryfrm($gallery_id) {
		$this->checkAuth();
        $data = array();
        $data['title'] = "Edit Gallery";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['subCatList'] = $this->QueryModel->getSubCatInfo();
        $data['galleryRow'] = $this->QueryModel->getGalleryId($gallery_id);
        $data['subInSubcategoryList'] = $this->QueryModel->getSubInSubCatList();
        $data['maincontent'] = $this->load->view('admin/page/gallery/edit_gallery', $data, true);
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
