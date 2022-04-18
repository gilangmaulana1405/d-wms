<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model admin
        $this->load->model('admin');
    }

    public function index()
    {

            if($this->admin->is_logged_in())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                redirect("admin/c_main_view/cmain_view");

            }else{

                //jika session belum terdaftar

                //set form validation
                $this->form_validation->set_rules('txtUsername', 'Username', 'required');
                $this->form_validation->set_rules('txtPassword', 'Password', 'required');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $txtusername = $this->input->post("txtUsername", TRUE);
                $txtpassword = MD5($this->input->post('txtPassword', TRUE));

                //checking data via model
                $checking = $this->admin->check_login('mdwms_user', array('txtUsername' => $txtusername), array('txtPassword' => $txtpassword));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'user_id'   => $apps->intUserID,
                            'role'      => $apps->intRoleID,
                            'user_name' => $apps->txtusername,
                            'user_pass' => $apps->txtpassword,
                            'user_nama' => $apps->txtNamauser,
                            'aktif'     => $apps->bitActive,
                            
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        //redirect berdasarkan level user
                        if($this->session->userdata("role") == "1") {
                            redirect(base_url().'index.php/admin/c_main_view/cmain_view');
                        }else if ($this->session->userdata("role") == "2") {
                            redirect(base_url().'index.php/superuser/c_main_view/cmain_view');
                        }else if ($this->session->userdata("role") == "3") {
                            redirect(base_url().'index.php/checker/c_dashboard_checker/cdashboard_checker');
                        }else if ($this->session->userdata("role") == "4") { 
                            redirect('visitor/main_view/');
                        }

                    }
                }else{

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                    $this->load->view('login', $data);
                }

            }else{

                $this->load->view('login');
            }

        }

    }
}