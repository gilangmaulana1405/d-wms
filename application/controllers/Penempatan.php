<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penempatan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        $this->load->model("transit_model");
        $this->load->model('Penempatan_model');
        $this->load->model('Rack_model');
        //cek session dan level user
        if($this->admin->is_role() != "admin"){
            redirect("login/");
        }
    }

    public function index()
    {

        $data["dwms_area_transit"] = $this->transit_model->getAll();
        $this->load->view("admin/form_penempatan", $data);      
        
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function load_data()
    {
        $data['header2'] = $this->Penempatan_model->load_header();
        $data['material'] = $this->transit_model->getAll();
        $head = $this->load->view("admin/form_header_penempatan",$data);
    }

    public function load_rack()
    {
        $data['rack_kategori1']  = $this->Rack_model->load_data1();
        $data['rack_kategori2']  = $this->Rack_model->load_data2();
        $data['rack_kategori3']  = $this->Rack_model->load_data3();
        $map = $this->load->view("admin/form_rack",$data);
    }
}
