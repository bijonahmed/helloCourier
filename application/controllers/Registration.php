<?php

class Registration extends CI_Controller {

    public function index() {
        $data = array();
        $data['title'] = "Registration";
        $data['menu'] = $this->db->query("SELECT * FROM tbl_menu WHERE status=1 ORDER BY sort ASC")->result();
        $data['setting'] = $this->db->query("SELECT * FROM tbl_global_setting")->row();
        $data['categoryList'] = $this->QueryModel->getCatList();
        $data['subcategory'] = $this->QueryModel->getSubCatActive();
        $data['package'] = $this->QueryModel->getPackageList();
        $data['country'] = $this->db->query("SELECT * FROM countries ")->result();
        $data['mainContent'] = $this->load->view('fronted/page/registration', $data, true);
        $data['header'] = $this->load->view('fronted/common/header', $data, true);
        $data['footer'] = $this->load->view('fronted/common/footer', $data, true);
        $this->load->view('fronted/index', $data);
    }

}
