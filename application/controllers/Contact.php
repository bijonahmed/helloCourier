<?php

class Contact extends CI_Controller {

    public function index() {
        $data = array();
        $data['title'] = "Contact";
        $data['name'] = "Contact";
        $data['menu'] = $this->db->query("SELECT * FROM tbl_menu WHERE status=1 ORDER BY sort ASC")->result();
        $data['setting'] = $this->db->query("SELECT * FROM tbl_global_setting")->row();
        $data['setting'] = $this->db->query("SELECT * FROM tbl_global_setting")->row();
        $data['mainContent'] = $this->load->view('fronted/page/contact', $data, true);
        $data['header'] = $this->load->view('fronted/common/header', $data, true);
        $data['footer'] = $this->load->view('fronted/common/footer', $data, true);
        $this->load->view('fronted/index', $data);
    }
    
     
    public function send_request() {
        $data['email'] =  $_POST['email'];
        $data['packages'] =  $_POST['packages'];
        $data['type'] = "Request";
        $data['date'] = date("Y-m-d");
        $this->db->insert('tbl_subscribe', $data);
        $sdata['request_msg'] = 'Successfully Send your  request.';
        $this->session->set_userdata($sdata);
        redirect("/");
    }

    public function send_subs_email() {
        $data['email'] =  $_POST['email'];
        $data['type'] = "Subscribe";
        $data['packages'] =  "-";
        $data['date'] = date("Y-m-d");
        $this->db->insert('tbl_subscribe', $data);
        $sdata['send_msg'] = 'Successfully Send your email.';
        $this->session->set_userdata($sdata);
        redirect("/");
    }

    public function send_email() {

        $fullname = $_POST['fullname'];
        $email_address = $_POST['email_address'];
        $phonenumber = $_POST['phonenumber'];
        $message = $_POST['message'];
        $to = $email_address;

        $data = array();
        $data['fullname'] = $fullname;
        $data['email_address'] = $email_address;
        $data['phonenumber'] = $phonenumber;
        $data['message'] = $message;
        $data['frm_email'] = $to;
        $data['sending_date'] = date("Y-m-d");
        $this->db->insert('tbl_contact', $data);
        $sdata['send_msg'] = 'Message Sent';
        $this->session->set_userdata($sdata);
        $subject = "Contact Us Message";
        $txt = $message;
        $headers = "From: $email_address";
        mail($to, $subject, $txt, $headers);
        redirect("contact");
    }

}
