<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    private $filename = "import_data";

    public function __construct()
    {
	    parent::__construct();
	    // $this->authenticated(); // Panggil fungsi authenticated
        // $this->oracle = $this->load->database('oracle',TRUE);
        // $this->weighing = $this->load->database('weighing',TRUE);
        $this->load->model('Admin');
        $this->load->model('Roleacces_model');
        $this->load->model('Forklift_model');
        
        
        

        if (!$this->session->userdata('backtoken')) {
            redirect('auth');
        } else {
            if (!$this->Admin->checktoken($this->session->userdata('backtoken'))) {
                redirect('auth/logout');
            }
        }
  	}

    public function authenticated()
    { // Fungsi ini berguna untuk mengecek apakah user sudah login atau belum
        // Pertama kita cek dulu apakah controller saat ini yang sedang diakses user adalah controller Auth apa bukan
        // Karena fungsi cek login hanya kita berlakukan untuk controller selain controller Auth
        if($this->uri->segment(1) != 'auth' && $this->uri->segment(1) != '')
        {
            // Cek apakah terdapat session dengan nama authenticated
            if( ! $this->session->userdata('authenticated')) // Jika tidak ada / artinya belum login
                redirect('auth'); // Redirect ke halaman login
        }
    }

    public function render_login($content, $data = NULL)
    {
        /*
        * $data['contentnya']
        * variabel diatas ^ nantinya akan dikirim ke file views/template/login/index.php
        * */
        $data['contentnya'] = $this->load->view('auth/login', $data, TRUE);
        $this->load->view('backend/login/index', $data);
    }

    public function render_mainview($content, $data = NULL)
    {
        $data['chat'] = $this->Admin->get_chat()->row_array();
        $data['data_chat'] = $this->Admin->get_chat();
        $this->load->view('backend/mainview/index_mainview', $data);
    }

    public function render_main_dashboard($content, $data = NULL)
    {
        $data['team'] = $this->Roleacces_model->view_team_aktif();
        $data['chat'] = $this->Admin->get_chat()->row_array();
        $data['data_chat'] = $this->Admin->get_chat();
        $this->load->view('backend/mainview/index_maindashboard', $data);
    }
    

    // WEB MANAGER untuk management Admin
    public function render_web_manager($content, $data = NULL)
    {
        $this->load->view('backend/content/dashboard/web_manager_dashboard', $data);
    }

    // FORKLIFT WH
    public function render_wm_forklift_dashboard($content, $data = NULL)
    {
        $data['forklift'] = $this->Roleacces_model->view_forklift();
        $data['employee'] = $this->Roleacces_model->view_employee();
        $this->load->view('backend/content/dashboard/wm_forklift_dashboard', $data);
    }

    // ITEM FORKLIFT WH
    public function render_wm_item_forklift_dashboard($content, $data = NULL)
    {
        $data['forklift'] = $this->Roleacces_model->view_item_forklift();
        $data['employee'] = $this->Roleacces_model->view_employee();
        $this->load->view('backend/content/dashboard/wm_item_forklift_dashboard', $data);
    }


    /**--------------------------------------------------DWMS FORKLIFT--------------------------------------------------**/

    public function render_profile_forklift($content, $data = NULL)
    {
        $data['chat'] = $this->Admin->get_chat()->row_array();
        $data['data_chat'] = $this->Admin->get_chat();
        $data['left_sidebar'] = $this->load->view('backend_forklift/tamplate_forklift/left_sidebar_forklift', $data, TRUE);
        $data['contentnya'] = $this->load->view('backend_forklift/content_forklift/master_forklift/profile_forklift', $data, TRUE);
        $this->load->view('backend_forklift/tamplate_forklift/index_profil_forklift', $data);
    }

    // dashboard forklift
    public function render_dashboard_forklift($content, $data = NULL)
    {
        $data['forklift'] = $this->Roleacces_model->view_forklift();
        $data['left_sidebar'] = $this->load->view('backend_forklift/tamplate_forklift/left_sidebar_forklift', $data, TRUE);
        $data['contentnya'] = $this->load->view('backend_forklift/content_forklift/dashboard_forklift/dashboard_forklift', $data, TRUE);
        $this->load->view('backend_forklift/tamplate_forklift/index_profil_forklift', $data);
    }
    public function render_dashboard_forklift_detail($intForkliftwhID)
    {
        $data['forklift'] = $this->Roleacces_model->get_forklift($intForkliftwhID);
        $data['left_sidebar'] = $this->load->view('backend_forklift/tamplate_forklift/left_sidebar_forklift', $data, TRUE);
        $data['contentnya'] = $this->load->view('backend_forklift/content_forklift/dashboard_forklift/dashboard_forklift_detail', $data, TRUE);
        $this->load->view('backend_forklift/tamplate_forklift/index_profil_forklift', $data);
    }

    // CLI FORKLIFT
    public function render_cli_forklift($content, $data = NULL)
    {
        $data['chat'] = $this->Admin->get_chat()->row_array();
        $data['data_chat'] = $this->Admin->get_chat();
        $data['totalForklift'] = $this->Forklift_model->totalForklift();
        $data['forkliftOK'] = $this->Forklift_model->forkliftOK();
        $data['forkliftRepair'] = $this->Forklift_model->forkliftRepair();
        $data['forkliftBreakdown'] = $this->Forklift_model->forkliftBreakdown();
        $data['left_sidebar'] = $this->load->view('backend_forklift/tamplate_forklift/left_sidebar_forklift', $data, TRUE);
        $data['contentnya'] = $this->load->view('backend_forklift/content_forklift/master_forklift/cli_forklift', $data, TRUE);
        $this->load->view('backend_forklift/tamplate_forklift/index_profil_forklift', $data);
    }

}
?>