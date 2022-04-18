<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editable extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Form_model');
	}

	function index()
	{
		if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
	    redirect('page/home'); // Redirect ke page mainview
	    // function render_login tersebut dari file core/MY_Controller.php
	    $this->render_input_unloading('input_unloading');
	}

	function load_data()
	{
		$data = $this->Form_model->load_data();
		echo json_encode($data);
	}

	function insert()
	{
		$data = array(
			'txtItemcode'			=> $this->input->post('item_code'),
			'txtDescription'		=>	$this->input->post('description')
		);

		$this->Form_model->insert($data);
	}

	function update()
	{
		$data = array(
			$this->input->post('table_column')	=>	$this->input->post('value')
		);

		$this->Form_model->update($data, $this->input->post('id'));
	}

	function delete()
	{
		$this->Form_model->delete($this->input->post('id'));
	}
}
