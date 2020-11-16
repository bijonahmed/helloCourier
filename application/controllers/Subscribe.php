<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subscribe extends CI_Controller {

    public function index() {

        $data = array();
        $data['title'] = "Subscribe List";
        $data['role_name'] = $this->QueryModel->getUserRoleName();
        $data['maincontent'] = $this->load->view('admin/page/subscribe/subscribe', $data, true);
        $data['header'] = $this->load->view('admin/common/header', $data, true);
        $data['sidebar'] = $this->load->view('admin/common/sidebar', $data, true);
        $data['footer'] = $this->load->view('admin/common/footer', $data, true);
        $this->load->view('admin/dashboard/index', $data);
    }
    
    public function getJsonSubscribe()
      {
         $items =  $this->QueryModel->getsSubsList($this->input->get());
         echo json_encode($items);
      }
}