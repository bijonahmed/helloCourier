<?php

class Service extends CI_Controller {

    public function index() {
        $data = array();
        $data['title'] = "Services";
        $data['setting'] = $this->db->query("SELECT * FROM tbl_global_setting")->row();
        $data['ourServices'] = $this->db->query("SELECT * FROM tbl_post WHERE category_id='4' AND status=1")->result();
        $data['data'] = $this->db->query("SELECT * FROM tbl_post WHERE post_id='12' AND status=1")->result();
        $data['menu'] = $this->db->query("SELECT * FROM tbl_menu WHERE status=1 ORDER BY sort ASC")->result();
        $data['mainContent'] = $this->load->view('fronted/page/service', $data, true);
        $data['header'] = $this->load->view('fronted/common/header', $data, true);
        $data['footer'] = $this->load->view('fronted/common/footer', $data, true);
        $this->load->view('fronted/index', $data);
    }
    
    public function service_details($postid){
        
        $data = array();
        $data['title'] = "Services Details";
        $data['setting'] = $this->db->query("SELECT * FROM tbl_global_setting")->row();
        $data['ourServices'] = $this->db->query("SELECT * FROM tbl_post WHERE category_id='4' AND status=1")->result();
        $data['data'] = $this->db->query("SELECT * FROM tbl_post WHERE post_id='$postid' AND status=1")->result();
        $data['menu'] = $this->db->query("SELECT * FROM tbl_menu WHERE status=1 ORDER BY sort ASC")->result();
        $data['mainContent'] = $this->load->view('fronted/page/servicedetails', $data, true);
        $data['header'] = $this->load->view('fronted/common/header', $data, true);
        $data['footer'] = $this->load->view('fronted/common/footer', $data, true);
        $this->load->view('fronted/index', $data);
        
    }

}
