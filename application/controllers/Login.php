<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function saveRegistration() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $mobilNumber = $_POST['mobile_number'];
            $result = $this->db->query("SELECT * FROM tbl_user WHERE mobile_number='$mobilNumber'")->row();
            if (!empty($result->mobile_number)) {
                $sdata['rmsg'] = 'you are already register.';
                $this->session->set_userdata($sdata);
                redirect("/registration");
            } else {
                $this->QueryModel->insertRegistrationData($this->input->post());
                  $sdata['rmsg'] = 'You are successfully register.';
                $this->session->set_userdata($sdata);
            }
            redirect("registration");
        }
    }

    public function checkUserLogin() {
        $userName = $this->input->post('userName', true);
        $pass = $this->input->post('password', true);
        $result = $this->QueryModel->checkingUserAuth($userName, $pass);

        if ($result):
            if ($result->role_id == 1 || $result->role_id == 3 || $result->role_id == 5 || $result->role_id == 7 || $result->role_id == 8) {
                $sdata['user_id'] = $result->user_id;
                $sdata['full_name'] = $result->full_name;
                $sdata['role_id'] = $result->role_id;
                $sdata['email'] = $result->email;
                $sdata['mobile_number'] = $result->mobile_number;
                $sdata['user_name'] = $result->user_name;
                $sdata['company'] = $result->company;
                $this->session->set_userdata($sdata);
                redirect("dashboard/dashboard");
            } else {
                $sdata['msg'] = 'Please Enter Your Valid User Id / Password';
                $this->session->set_userdata($sdata);
                $this->index();
            }
        else:
            $sdata = array();
            $sdata['msg'] = 'Please Enter Your Valid User Id / Password';
            $this->session->set_userdata($sdata);
            // logodata
            $logdata = array();
            $logdata['user_id'] = '';
            $logdata['role_id'] = '';
            $logdata['action'] = "Failed";
            $logdata['details'] = "Login Failed";
            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            $logdata['date_time'] = $dt->format('F j, Y, g:i a');
            $logdata['date'] = date("Y-m-d");
            $logdata['ip'] = getHostByName(getHostName());
            $this->QueryModel->insertLogodata($logdata);
            redirect('login');
        endif;
    }

    public function ckLogin() {
        $userName = $this->input->post('userName', true);
        $pass = $this->input->post('password', true);
        $result = $this->QueryModel->checkingUserAuth($userName, $pass);

        if ($result):
            if ($result->role_id == 1 || $result->role_id == 3 || $result->role_id == 5 || $result->role_id == 7 || $result->role_id == 8) {
                $sdata['user_id'] = $result->user_id;
                $sdata['full_name'] = $result->full_name;
                $sdata['role_id'] = $result->role_id;
                $sdata['email'] = $result->email;
                $sdata['mobile_number'] = $result->mobile_number;
                $sdata['user_name'] = $result->user_name;
                $sdata['company'] = $result->company;
                $this->session->set_userdata($sdata);
                redirect("dashboard/dashboard");
            } else {
                $sdata['msg'] = 'Please Enter Your Valid User Id / Password';
                $this->session->set_userdata($sdata);
                // $this->index();
                redirect("/");
            }
        else:
            $sdata = array();
            $sdata['msg'] = 'Please Enter Your Valid User Id / Password';
            $this->session->set_userdata($sdata);
            // logodata
            $logdata = array();
            $logdata['user_id'] = '';
            $logdata['role_id'] = '';
            $logdata['action'] = "Failed";
            $logdata['details'] = "Login Failed";
            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            $logdata['date_time'] = $dt->format('F j, Y, g:i a');
            $logdata['date'] = date("Y-m-d");
            $logdata['ip'] = getHostByName(getHostName());
            $this->QueryModel->insertLogodata($logdata);
            redirect('/');
        endif;
    }
 
  public function loginmarchent() {

        $userName = $this->input->post('userName', true);
        $pass = $this->input->post('password', true);
        $result = $this->QueryModel->checkingUserAuth($userName, $pass);

        if ($result):
            $sdata['user_id'] = $result->user_id;
            $sdata['full_name'] = $result->full_name;
            $sdata['role_id'] = $result->role_id;
            $sdata['email'] = $result->email;
            $sdata['mobile_number'] = $result->mobile_number;
            $sdata['user_name'] = $result->user_name;
            $sdata['company'] = $result->company;
            $this->session->set_userdata($sdata);
            redirect("marchent");
        else:
            $sdata = array();
            $sdata['login_error_msg'] = 'Please Enter Your Valid User Id / Password';
            $this->session->set_userdata($sdata);
            // logodata
            $logdata = array();
            $logdata['user_id'] = '';
            $logdata['role_id'] = '';
            $logdata['action'] = "Failed";
            $logdata['details'] = "Login Failed";
            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            $logdata['date_time'] = $dt->format('F j, Y, g:i a');
            $logdata['date'] = date("Y-m-d");
            $logdata['ip'] = getHostByName(getHostName());
            $this->QueryModel->insertLogodata($logdata);
            redirect('/marchentLogin');
        endif;
    }

    public function login_marchent() {

        $userName = $this->input->post('userName', true);
        $pass = $this->input->post('password', true);
        $result = $this->QueryModel->checkingUserAuth($userName, $pass);

        if ($result):
            $sdata['user_id'] = $result->user_id;
            $sdata['full_name'] = $result->full_name;
            $sdata['role_id'] = $result->role_id;
            $sdata['email'] = $result->email;
            $sdata['mobile_number'] = $result->mobile_number;
            $sdata['user_name'] = $result->user_name;
            $sdata['company'] = $result->company;
            $this->session->set_userdata($sdata);
            redirect("marchent");
        else:
            $sdata = array();
            $sdata['login_error_msg'] = 'Please Enter Your Valid User Id / Password';
            $this->session->set_userdata($sdata);
            // logodata
            $logdata = array();
            $logdata['user_id'] = '';
            $logdata['role_id'] = '';
            $logdata['action'] = "Failed";
            $logdata['details'] = "Login Failed";
            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            $logdata['date_time'] = $dt->format('F j, Y, g:i a');
            $logdata['date'] = date("Y-m-d");
            $logdata['ip'] = getHostByName(getHostName());
            $this->QueryModel->insertLogodata($logdata);
            redirect('/');
        endif;
    }

    public function find_booking_status() {
      
        $bookingid = $this->input->post('booking_id', true);
        
        $output = $this->db->query("SELECT tbl_booking.bookingId,tbl_deli_status.status,tbl_booking.booking_id,tbl_booking.rate_type,tbl_booking.recv_name,
                                    tbl_booking.recv_phone,tbl_booking.show_cost FROM tbl_booking 
                                    LEFT JOIN tbl_deli_status ON (tbl_deli_status.status_id=tbl_booking.status_id) 
                                    WHERE tbl_booking.bookingId='$bookingid'")->row();
        $outputtbl = '';
        $outputtbl .= "<table class='table-striped table-hover' style='width: 100%; color:black;'>
					<thead class='thead-primary'>
						<tr style='background-color: #2b082a;color: white; border-radius: 10 6px 0 0'>
							<td style='text-align: center;'>Booking ID</td>
							<td style='text-align: center;'>Rate Type</td>
							<td style='text-align: center;'>Receiver Name</td>
							<td style='text-align: center;'>Receiver Phone</td>
							<td style='text-align: center;'>Cost</td>
							<td style='text-align: center;'>Status</td>
						</tr>
					</thead>
					<tbody>
                    <tr>
            <td><center>$output->bookingId</center></td>
            <td><center>$output->rate_type</center></td>
            <td><center>$output->recv_name</center></td>
            <td><center>$output->recv_phone</center></td>
            <td><center>$output->show_cost</center></td>
            <td><center>$output->status</center></td>
            </tr>
					</tbody>
				</table>";
        echo json_encode($outputtbl);
    }

    public function checkUserLoginAdmin() {
        $userName = trim($this->session->userdata('uName'));
        $pass = trim($this->session->userdata('uPass'));
        $result = $this->db->query("SELECT * FROM tbl_user WHERE user_name='$userName' AND password='$pass' AND status='1'")->row(); //$this->QueryModel->checkingUserAuth($userName, $pass);
        if ($result):
            $sdata['user_id'] = $result->user_id;
            $sdata['full_name'] = $result->full_name;
            $sdata['role_id'] = $result->role_id;
            $sdata['email'] = $result->email;
            $sdata['mobile_number'] = $result->mobile_number;
            $sdata['user_name'] = $result->user_name;
            $sdata['company'] = $result->company;
            $this->session->set_userdata($sdata);
            redirect("marchent");
        else:
            $sdata = array();
            $sdata['login_error_msg'] = 'Please Enter Your Valid User Id / Password';
            $this->session->set_userdata($sdata);
            // logodata
            $logdata = array();
            $logdata['user_id'] = '';
            $logdata['role_id'] = '';
            $logdata['action'] = "Failed";
            $logdata['details'] = "Login Failed";
            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
            $logdata['date_time'] = $dt->format('F j, Y, g:i a');
            $logdata['date'] = date("Y-m-d");
            $logdata['ip'] = getHostByName(getHostName());
            $this->QueryModel->insertLogodata($logdata);
            redirect('/');
        endif;
    }

    public function index() {
        $data = array();
        $data['setting'] = $this->db->query("SELECT * FROM tbl_global_setting")->row();
        $this->load->view('login/login', $data);
    }

    public function logout() {
        // logodata
        $logdata = array();
        $logdata['user_id'] = $this->session->userdata('user_id');
        $logdata['role_id'] = $this->session->userdata('role_id');
        $logdata['action'] = "Logout";
        $logdata['details'] = "Logout Successfully";
        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        $logdata['date_time'] = $dt->format('F j, Y, g:i a');
        $logdata['date'] = date("Y-m-d");
        $logdata['ip'] = getHostByName(getHostName());
        $this->QueryModel->insertLogodata($logdata);
        $this->session->unset_userdata('user_id');
        $sdata['msg'] = 'You are successfully logout !';
        $this->session->set_userdata($sdata);
        redirect("/", 'refresh');
    }

    public function logout_marchent() {
        // logodata
        $logdata = array();
        $logdata['user_id'] = $this->session->userdata('user_id');
        $logdata['role_id'] = $this->session->userdata('role_id');
        $logdata['action'] = "Logout";
        $logdata['details'] = "Logout Successfully";
        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        $logdata['date_time'] = $dt->format('F j, Y, g:i a');
        $logdata['date'] = date("Y-m-d");
        $logdata['ip'] = getHostByName(getHostName());
        $this->QueryModel->insertLogodata($logdata);
        $this->session->unset_userdata('user_id');
        $sdata['msg'] = 'You are successfully logout !';
        $this->session->set_userdata($sdata);
        $this->session->sess_destroy();
        redirect("/", 'refresh');
    }

}