<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forklift extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Forklift_model');
        
	}

	

}
?>