<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    function content($slug) {
        $data['title'] = "$slug";
        $data['menu'] = $this->db->query("SELECT * FROM tbl_menu WHERE status=1 ORDER BY sort ASC")->result();
        $findslug = $this->db->query("SELECT * FROM tbl_menu WHERE status=1 AND slug='$slug'")->row();
        if ($findslug->menu_id == '1') {
            redirect("/payment"); // Payment
        } elseif ($findslug->menu_id == '2') {
            redirect("/MarchentLogin"); // Marchent Login
        } elseif ($findslug->menu_id == '3') {
            redirect("/registration"); // Marchent Registration
        } elseif ($findslug->menu_id == '4') {
            redirect("/schedulepickup"); // schedulepickup
        } elseif ($findslug->menu_id == '5') {
            redirect("/rate"); // rate
        } elseif ($findslug->menu_id == '6') {
            redirect("/contact"); // About
        } elseif ($findslug->menu_id == '7') {
            redirect("/about"); 
       
        } else {
            $data['name']= $findslug->name;
            $data['header'] = $this->load->view('fronted/common/header', $data, true);
            $data['footer'] = $this->load->view('fronted/common/footer', $data, true);
            $data['data'] = $this->db->query("SELECT * FROM tbl_post WHERE category_id='10' AND status=1")->result();
            $data['setting'] = $this->db->query("SELECT * FROM tbl_global_setting")->row();
            $data['mainContent'] = $this->load->view('fronted/page/commonpage', $data, true);
        }
 $data['setting'] = $this->db->query("SELECT * FROM tbl_global_setting")->row();
        $data['header'] = $this->load->view('fronted/common/header', $data, true);
        $data['footer'] = $this->load->view('fronted/common/footer', $data, true);
        $this->load->view('fronted/index', $data);
    }

}