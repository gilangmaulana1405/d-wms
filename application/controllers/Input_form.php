<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_form extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
	    redirect('page/home'); // Redirect ke page mainview
	    // function render_login tersebut dari file core/MY_Controller.php
	    $this->render_input_form('input_form');

	}

	public function logout()
	{
		$this->session->sess_destroy(); // Hapus semua session
    	redirect('auth'); // Redirect ke halaman login
	}
}