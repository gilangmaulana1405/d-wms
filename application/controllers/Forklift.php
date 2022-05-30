<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forklift extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Forklift_model');
		$this->load->model('Roleacces_model');
	}

	public function cli_forklift()
	{
		$txtSerialnumber = $this->input->post('txtSerialnumber');
		$data = $this->Forklift_model->get_serialnumber($txtSerialnumber)->row();
		echo json_encode($data);
	}

	public function header_cli_forklift()
	{
		$data = $this->Forklift_model->get_header_cli_forklift('trdwms_headercli')->result();
		echo json_encode($data);
	}

	public function create()
	{ 
		$data = $this->Forklift_model->create_cli_forklift();

		echo json_encode($data);
	}


	// buat function delete tanpa hapus data
	public function delete()
	{
		$intForkliftwhID = $this->input->post('intForkliftwhID');
		$data = $this->Forklift_model->delete_cli_forklift('trdwms_headercli', $intForkliftwhID);
		
		echo json_encode($data);
	}
}
?>