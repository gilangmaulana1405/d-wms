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
        $this->load->helper('tgl_indo');
        
        
        

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

    // DASHBOARD FORKLIFT
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
        $data['transaksi_forklift'] = $this->Forklift_model->get_transaksi_forklift();
        $data['left_sidebar'] = $this->load->view('backend_forklift/tamplate_forklift/left_sidebar_forklift', $data, TRUE);
        $data['contentnya'] = $this->load->view('backend_forklift/content_forklift/dashboard_forklift/dashboard_forklift_detail', $data, TRUE);
        $this->load->view('backend_forklift/tamplate_forklift/index_profil_forklift', $data);
    }

    // CLI FORKLIFT
    public function render_cli_forklift($content, $data = NULL)
    {
        $data['forklift'] = $this->Forklift_model->get_header_cli_forklift();
        $data['left_sidebar'] = $this->load->view('backend_forklift/tamplate_forklift/left_sidebar_forklift', $data, TRUE);
        $data['contentnya'] = $this->load->view('backend_forklift/content_forklift/master_forklift/cli_forklift', $data, TRUE);
        $this->load->view('backend_forklift/tamplate_forklift/index_profil_forklift', $data);
        
        // $data['data_minorapproved2'] = $this->Roleacces_model->get_forklift($intForkliftwhID);
        // $data['chat'] = $this->Admin->get_chat()->row_array();
        // $data['data_chat'] = $this->Admin->get_chat();
        // $data['totalForklift'] = $this->Forklift_model->totalForklift();
        // $data['forkliftOK'] = $this->Forklift_model->forkliftOK();
        // $data['forkliftRepair'] = $this->Forklift_model->forkliftRepair();
        // $data['forkliftBreakdown'] = $this->Forklift_model->forkliftBreakdown();
    }

    public function render_edit_cli_forklift($content, $data = NULL)
    {
        $data['forklift'] = $this->Forklift_model->get_header_cli_forklift();
        $data['left_sidebar'] = $this->load->view('backend_forklift/tamplate_forklift/left_sidebar_forklift', $data, TRUE);

        // get url serial number
        // $serial = $this->input->get('d');
        // $dt = $this->Forklift_model->get_edit_cli_forklift($serial)->row_array();
        // $data['dt'] = $dt;

        // get url activity code
        $activitycode = $this->input->get('e');
        $dt = $this->Forklift_model->get_result_activitycode($activitycode)->row_array();
        $data['dt'] = $dt;

        // tampilkan data detail di halaman edit cli dengan trigger activity code
        // $data['detail']= $this->Forklift_model->get_detail_activitycode($activitycode);

        $detail= $this->Forklift_model->get_detail_activitycode($activitycode);
        $data['detail']= $this->Forklift_model->get_detail_activitycode($activitycode);
        
        
        // $txtJenis = $detail['txtJenisForklift'];
        // if($txtJenis == 'CB'){
        //     $data['data'] = $this->Forklift_model->get_item_cli_forklift_cb();
        // }else if($txtJenis == 'PM'){
        //     $data['data'] = $this->Forklift_model->get_item_cli_forklift_pm();
        // }else if($txtJenis == 'REACH'){
        //     $data['data'] = $this->Forklift_model->get_item_cli_forklift_reach();
        // }

        // get ceklis item
        // $intDetailcliID = $this->input->get('f');
        // $idDetailCLI = $this->Forklift_model->get_id_detailcli($intDetailcliID)->row_array();
        // $data['idcli'] = $idDetailCLI;

        // $barcodeItem = $data['idcli'];
        // $data['barcodeItem'] = $barcodeItem;

        // $txtBarcodeitem = $data['barcodeItem'];
        // if($txtBarcodeitem == 'intBodydetail'){
        //     $data['itemForklift'] = $this->Forklift_model->get_item_forklift_body();
        // }
    
        $data['contentnya'] = $this->load->view('backend_forklift/content_forklift/master_forklift/edit_cli_forklift', $data, TRUE);
        $this->load->view('backend_forklift/tamplate_forklift/index_profil_forklift', $data);
    }


    // CLI BATTERY
    public function render_cli_battery($content, $data = NULL)
    {
        $data['forklift'] = $this->Forklift_model->get_header_cli_forklift();
        $data['left_sidebar'] = $this->load->view('backend_forklift/tamplate_forklift/left_sidebar_forklift', $data, TRUE);
        $data['contentnya'] = $this->load->view('backend_forklift/content_forklift/master_forklift/cli_battery', $data, TRUE);
        $this->load->view('backend_forklift/tamplate_forklift/index_profil_forklift', $data);
    }


    // APPROVE CLI FORKLIFT
    public function render_approve_cli_forklift($content, $data = NULL)
    {
        $data['approve_forklift'] = $this->Forklift_model->get_approve_cli_forklift();
        $data['countApprove'] = $this->Forklift_model->count_approve_cli('trdwms_headercli');
        $data['countReject'] = $this->Forklift_model->count_reject_cli('trdwms_headercli');
        $data['countOpen'] = $this->Forklift_model->count_open_cli('trdwms_headercli');
        $data['countClose'] = $this->Forklift_model->count_close_cli('trdwms_headercli');
        $data['left_sidebar'] = $this->load->view('backend_forklift/tamplate_forklift/left_sidebar_forklift', $data, TRUE);
        $data['contentnya'] = $this->load->view('backend_forklift/content_forklift/master_forklift/approve_cli_forklift', $data, TRUE);
        $this->load->view('backend_forklift/tamplate_forklift/index_profil_forklift', $data);
    }

}
?>