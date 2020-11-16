<?php

class Terms extends CI_Controller {

    public function index() {
        $data = array();
        $data['title'] = "Our Team";
        $data['setting'] = $this->db->query("SELECT * FROM tbl_global_setting")->row();
        $data['data'] = $this->db->query("SELECT * FROM tbl_post WHERE post_id='35' AND status=1")->result();
        $data['menu'] = $this->db->query("SELECT * FROM tbl_menu WHERE status=1 ORDER BY sort ASC")->result();
        $data['mainContent'] = $this->load->view('fronted/page/terms', $data, true);
        $data['header'] = $this->load->view('fronted/common/header', $data, true);
        $data['footer'] = $this->load->view('fronted/common/footer', $data, true);
        $this->load->view('fronted/index', $data);
    }

}
