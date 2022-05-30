<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller
{
	public function mainview()
	{
		$this->render_mainview('mainview');
	}

	public function home()
	{
		if ($this->session->userdata('role') == '1') {
			$this->render_main_dashboard('main_dashboard');
		} else if ($this->session->userdata('role') == '2') {
			$this->render_main_dashboard('main_dashboard');
		} else if ($this->session->userdata('role') == '7') {
			$this->render_main_dashboard('main_dashboard');
		} else if ($this->session->userdata('role') == '8') {
			$this->render_main_dashboard('main_dashboard');
		} else if ($this->session->userdata('role') == '10') {
			$this->render_main_dashboard('main_dashboard');
		} else if ($this->session->userdata('role') == '11') {
			$this->render_main_dashboard('main_dashboard');
		} else if ($this->session->userdata('role') == '9') {
			$this->render_profile_minor('profile_minor');
		} else if ($this->session->userdata('role') == '5') {
			$this->render_main_dashboard('main_dashboard');
		} else if ($this->session->userdata('role') == '12') {
			$this->render_main_dashboard('main_dashboard');
		} else {
			$this->render_profile('profile');
		}
	}


	//////////////////////////////////////////////DWMS FORKLIFT/////////////////////////////////////////////////////////////

	// HOME
	public function profile_forklift()
	{
		if ($this->session->userdata('role') == '1') {
			$this->render_profile_forklift('profile_forklift');
		} else if ($this->session->userdata('role') == '2') {
			$this->render_profile_forklift('profile_forklift');
		} else {
			show_404();
		}
	}

	// DASHBOARD FORKLIFT & DETAIL
	public function dashboard_forklift()
	{
		if ($this->session->userdata('role') == '1') {
			$this->render_dashboard_forklift('dashboard_forklift');
		} else if ($this->session->userdata('role') == '2') {
			$this->render_dashboard_forklift('dashboard_forklift');
		} else {
			show_404();
		}
	}

	public function dashboard_forklift_detail()
	{
		if ($this->session->userdata('role') == '1') {
			$this->render_dashboard_forklift_detail('dashboard_forklift_detail');
		} else if ($this->session->userdata('role') == '2') {
			$this->render_dashboard_forklift_detail('dashboard_forklift_detail');
		} else {
			show_404();
		}
	}

	// CLI FORKLIFT
	public function cli_forklift()
	{
		if ($this->session->userdata('role') == '1') {
			$this->render_cli_forklift('cli_forklift');
		} else if ($this->session->userdata('role') == '2') {
			$this->render_cli_forklift('cli_forklift');
		} else {
			show_404();
		}
	}

	public function edit_cli_forklift()
	{
		if ($this->session->userdata('role') == '1') {
			$this->render_edit_cli_forklift('cli_forklift');
		} else if ($this->session->userdata('role') == '2') {
			$this->render_edit_cli_forklift('cli_forklift');
		} else {
			show_404();
		}
	}

	//////////////////////////////////// WEB MANAGER ///////////////////////////////////

	
	// WEB MANAGER
	public function web_manager()
	{
		if ($this->session->userdata('role') == '1') {
			$this->render_web_manager('web_manager');
		} else if ($this->session->userdata('role') == '5') {
			$this->render_web_manager('web_manager');
		} else if ($this->session->userdata('role') == '12') {
			$this->render_web_manager('web_manager');
		} else {
			show_404();
		}	
	}

	// MANAGEMENT USER
	public function wm_user_dashboard()
	{
		if ($this->session->userdata('role') == '1') {
			$this->render_wm_user_dashboard('wm_user_dashboard');
		} else {
			show_404();
		}	
	}

	// DWMS FORKLIFT WH
	public function wm_forklift_dashboard()
	{
		if ($this->session->userdata('role') == '1') {
			$this->render_wm_forklift_dashboard('wm_forklift_dashboard');
		} else {
			show_404();
		}	
	}

	// DWMS ITEM FORKLIFT 
	public function wm_item_forklift_dashboard()
	{
		if ($this->session->userdata('role') == '1') {
			$this->render_wm_item_forklift_dashboard('wm_item_forklift_dashboard');
		} else {
			show_404();
		}	
	}


}