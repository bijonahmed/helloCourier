<?php

class Faq extends CI_Controller {

    public function index() {

        $data = array();
        $data['title'] = "Faq";
        $data['name'] = "Faq";
        $data['faq'] = $this->db->query("SELECT * FROM tbl_post WHERE category_id='8' AND status=1")->result();
        $data['menu'] = $this->db->query("SELECT * FROM tbl_menu WHERE status=1 ORDER BY sort ASC")->result();
        $data['setting'] = $this->db->query("SELECT * FROM tbl_global_setting")->row();
        $data['mainContent'] = $this->load->view('fronted/page/faq', $data, true);
        $data['header'] = $this->load->view('fronted/common/header', $data, true);
        $data['footer'] = $this->load->view('fronted/common/footer', $data, true);
        $this->load->view('fronted/index', $data);
    }

    public function sendemail() {

        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $msg = $this->input->post('msg');
        $messages = "Name: $name, Phone: $phone Messaes: $msg";
        // the message

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $to = "mmdmamun@gmail.com,mdbijon@gmail.com";
            $msg = $messages;
            $subject = "hellocourierbd Contact us";
            // send email
            mail($to, $subject, $msg);
            $sdata['msg'] = 'Thanks we are contact soonly...';
            $this->session->set_userdata($sdata);
        } else {

            echo "Invalid email format";
        }



        redirect("home");
    }

}
