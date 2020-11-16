<?php

class Upload extends CI_Controller {

    public function index() {

        $data = array();
        $data['title'] = "Upload";
        $data['categoryList'] = $this->QueryModel->getCatListActive();
        $data['subcategory'] = $this->QueryModel->getSubCatActive();
        $data['package'] = $this->QueryModel->getPackageList();
        #$data['news'] = $this->QueryModel->getNewsDisplaySub($sub_cat_id);
        #$data['sub_cat_name'] = $this->QueryModel->getSubCategoryName($sub_cat_id);
        $data['about'] = $this->QueryModel->getAboutUs();
        $data['mainContent'] = $this->load->view('fronted/page/upload', $data, true);
        #$data['slider'] = $this->load->view('fronted/page/home_slider', $data, true);
        $data['right_sidebar'] = $this->load->view('fronted/page/sidebar_one', $data, true);
        $data['header'] = $this->load->view('fronted/common/header', $data, true);
        $data['footer'] = $this->load->view('fronted/common/footer', $data, true);
        $this->load->view('fronted/index', $data);
    }

    public function SendRequest() {
        $data['name'] = $this->input->post('name');
        $data['phone'] = $this->input->post('phone');
        $data['bkas_rocket'] = $this->input->post('bkas_rocket');
        $data['url'] = $this->input->post('url');
        $data['status'] = '0';
        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        $data['date_time'] = $dt->format('F j, Y, g:i a');
        $this->db->insert('tbl_request', $data);
        $sdata = array();
        $sdata['msg'] = 'Successfully Send Your Request.Thanks ';
        $this->session->set_userdata($sdata);
        redirect("upload");
    }

    public function updateRequestStatus() {
        $request_id = $_POST['request_id'];
        $this->db->query("UPDATE tbl_request SET status='1' WHERE request_id=$request_id");

    }

}
