<?php

class MarchentLogin extends CI_Controller {

    public function index() {

        $data = array();
        $data['title'] = "Marchent Login";
        $data['setting'] = $this->db->query("SELECT * FROM tbl_global_setting")->row();
        $data['menu'] = $this->db->query("SELECT * FROM tbl_menu WHERE status=1 ORDER BY sort ASC")->result();
        $data['mainContent'] = $this->load->view('fronted/page/merchentLogin', $data, true);
        $data['header'] = $this->load->view('fronted/common/header', $data, true);
        $data['footer'] = $this->load->view('fronted/common/footer', $data, true);
        $this->load->view('fronted/index', $data);
    }

}
