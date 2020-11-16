    <?php
    
    if (!defined('BASEPATH'))
        exit('No direct script access allowed');
    
    class Media_file extends CI_Controller {
    
        public function __construct() {
            parent::__construct();
           $this->checkAuth();
        }
    
        public function index() {
			$this->checkAuth();
            $data = array();
            $data['title'] = "Medai Files";
            $data['list'] = $this->QueryModel->getMediaFileLink();
            $data['divisionList'] = $this->QueryModel->getDivisionList();
            $data['maincontent'] = $this->load->view('admin/page/mediafile/index', $data, true);
            $this->common_templete($data);
        }
        
             public function common_templete($data=array())
        {
			$this->checkAuth();
            $data['header'] = $this->load->view('admin/common/header', $data, true);
            $data['sidebar'] = $this->load->view('admin/common/sidebar', $data, true);
            $data['footer'] = $this->load->view('admin/common/footer', $data, true);
            $this->load->view('admin/dashboard/index', $data);
            
        }
		
		public function checkAuth(){
		if ($this->session->userdata('user_id') == null):
            redirect("login");
        endif;
	}
    
    }
