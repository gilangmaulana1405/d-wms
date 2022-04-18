<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rack extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        $this->load->model('Rack_model');
        //cek session dan level user
        if($this->admin->is_role() != "admin"){
            redirect("login/");
        }
        
    }

    public function index()
    {
        $data['rack_kategori1']  = $this->Rack_model->load_data1();
        $data['rack_kategori2']  = $this->Rack_model->load_data2();
        $data['rack_kategori3']  = $this->Rack_model->load_data3();
        $this->load->view('admin/rack', $data);       

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }





}