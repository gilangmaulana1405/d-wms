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


	// buat function delete tanpa hapus data
	public function delete()
	{
		$intForkliftwhID = $this->input->post('intForkliftwhID');
		$data = $this->Forklift_model->delete_cli_forklift('trdwms_headercli', $intForkliftwhID);
		
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success!</strong> Data has been deleted. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		
		echo json_encode($data);
	}
}
?>