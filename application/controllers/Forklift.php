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

	// CLI FORKLIFT
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
		$activitycode = $this->Forklift_model->get_activitycode();
		$data = $this->Forklift_model->create_cli_forklift($activitycode);
		echo json_encode($activitycode);
	}

	public function createCliBattery()
	{ 
		$activitycode = $this->Forklift_model->get_activitycode();
		$data = $this->Forklift_model->create_cli_battery($activitycode);
		echo json_encode($activitycode);
	}

	public function delete()
	{
		$intForkliftwhID = $this->input->post('intForkliftwhID');
		$data = $this->Forklift_model->delete_cli_forklift('trdwms_headercli', $intForkliftwhID);
		echo json_encode($data);
	}

	public function DetailCli()
	{
		$data = $this->Forklift_model->get_detail_cli_forklift('mdwms_itemforklift');
		echo json_encode($data);
	}

	public function ScanItem()
	{
		$txtBarcodeitem = $this->input->post('txtBarcodeitem_detail');
		$activitycode = $this->input->post('txtActivityCode_header');

		// CEK APAKAH BARCODE YG DI SCAN ADA DI MASTER ITEM ATAU TIDAK
		$cek_barcode = $this->Forklift_model->scan_item_forklift($txtBarcodeitem);
		if($cek_barcode > 0){
			// CEK APAKAH BARCODE SUDAH DI SCAN ATAU BELUM
			$cek_scan = $this->Forklift_model->cek_scan($txtBarcodeitem);
			if($cek_scan == 0){
				// CARI ITEM YANG AKAN DI SCAN 
				$dt_item = $this->Forklift_model->item_barcode($txtBarcodeitem)->row_array();
				$item = $dt_item['txtItempart'];
				
				// UPDATE ITEM DETAIL YANG DI SCAN 
				$data = $this->Forklift_model->scan_item($activitycode, $txtBarcodeitem, $item);
				if($data == 'true'){
					echo 'true';
				}else{
					echo 'false';
				}								
			}
			else{
				echo 'has scanned';
			}

		}else{
			echo 'undifined';
		}
	}

	public function UpdateScanItemManual()
	{
		$intDetailcliID = $this->input->post('intDetailcliID');
		$activitycode = $this->input->post('txtActivityCode_header');
		$txtBarcodeitem = $this->input->post('txtBarcodeitem_detail');

		// CEK APAKAH BARCODE YG DI SCAN ADA DI MASTER ITEM ATAU TIDAK
		$cek_barcode = $this->Forklift_model->scan_item_forklift($txtBarcodeitem);
		if($cek_barcode > 0){
			// CEK APAKAH BARCODE SUDAH DI SCAN ATAU BELUM
			$cek_scan = $this->Forklift_model->cek_scan($txtBarcodeitem);
			if($cek_scan == 0){
				// CARI ITEM YANG AKAN DI SCAN 
				$dt_item = $this->Forklift_model->item_barcode($txtBarcodeitem)->row_array();
				$item = $dt_item['txtItempart'];
	
				// UPDATE ITEM DETAIL YANG DI SCAN 
				$data = $this->Forklift_model->m_updateScanManual('trdwms_detailcli', $intDetailcliID, $activitycode, $txtBarcodeitem, $item);

				if($data == true){
					// success
					$this->session->set_flashdata('success', 'DATA ITEM CLI FORKLIFT HAS BEEN SCANNED');				
					$this->session->flashdata('success');
					redirect('page/edit_cli_forklift?e='. $activitycode);
				}else{
					// failed
					$this->session->set_flashdata('failed', 'DATA ITEM CLI FORKLIFT FAILED TO ADD');
					$this->session->flashdata('failed');
					redirect('page/edit_cli_forklift?e='. $activitycode);
				}

			}else{
				// has scanned
				$this->session->set_flashdata('has scanned', 'DATA ITEM CLI FORKLIFT HAS SCANNED');
				$this->session->flashdata('has scanned');
				redirect('page/edit_cli_forklift?e='. $activitycode);
			}

		}else{
			// undefined
			$this->session->set_flashdata('undefined', 'DATA ITEM CLI FORKLIFT UNDEFINED');
			$this->session->flashdata('undefined');
			redirect('page/edit_cli_forklift?e='. $activitycode);
		}
	}

	public function start_Checklist()
	{
		if($this->input->post('txtJenisForklift_header') == 'CB'){
			$data = $this->Forklift_model->get_edit_cli_forklift_cb($this->input->post('txtSerialnumber'));
			echo json_encode($data);
		}else if($this->input->post('txtJenisForklift_header') == 'PM'){
			$data = $this->Forklift_model->get_edit_cli_forklift_pm($this->input->post('txtSerialnumber'));
			echo json_encode($data);
		}else if($this->input->post('txtJenisForklift_header') == 'REACH'){
			$data = $this->Forklift_model->get_edit_cli_forklift_reach($this->input->post('txtSerialnumber'));
			echo json_encode($data);
		}
	}

	public function create_startChecklist()
	{
		$activity = $this->input->post('txtActivityCode_header');
		// cek apakah txtActivityCode_header sudah terinsert di tabel detail atau belum 
		$cek = $this->Forklift_model->cek_insert_detail($activity);
		if($cek > 0){
			echo ('hasInserted');
		}else{
			$data = $this->Forklift_model->get_jenisForklift($activity)->row_array();
			if($data['txtJenisForklift_header'] == 'CB'){
				$dt = $this->Forklift_model->get_edit_cli_forklift_cb();
				foreach($dt as $value){
					$array[] = array(
						'txtActivityCode_detail' => $this->input->post('txtActivityCode_header'),
						'txtJenisForklift' => $data['txtJenisForklift_header'],
						'txtUnit' => $value->txtUnit,
						'txtItempart' => $value->txtItempart,
						'txtStandard' => $value->txtStandard,
						'intTimemin' => $value->intTimemin,
						'txtTools' => $value->txtTools,
						'bitActive_detail' => 1,
						'bitOpen' => 1,
						'bitCleaning' => $value->bitCleaning,
						'bitInspection' => $value->bitInspection,
						'bitLubrication' => $value->bitLubrication,
						'txtBarcodeitem_detail' => $value->txtBarcodeitem,
						'txtInsertedBy_item' => $this->session->userdata('fullname'),
						'dtmInsertedDate_item' => date('Y-m-d H:i:s')
					);
				}

				$approve = $this->db->insert_batch('trdwms_detailcli', $array);
				if($approve > 0){
					echo ('true');
				}else{
					echo ('false');
				}
			}elseif($data['txtJenisForklift_header'] == 'PM'){
				$dt = $this->Forklift_model->get_edit_cli_forklift_pm();
				foreach($dt as $value){
					$array[] = array(
						'txtActivityCode_detail' => $this->input->post('txtActivityCode_header'),
						'txtJenisForklift' => $data['txtJenisForklift_header'],
						'txtUnit' => $value->txtUnit,
						'txtItempart' => $value->txtItempart,
						'txtStandard' => $value->txtStandard,
						'intTimemin' => $value->intTimemin,
						'txtTools' => $value->txtTools,
						'bitActive_detail' => 1,
						'bitOpen' => 1,
						'bitCleaning' => $value->bitCleaning,
						'bitInspection' => $value->bitInspection,
						'bitLubrication' => $value->bitLubrication,
						'txtBarcodeitem_detail' => $value->txtBarcodeitem,
						'txtInsertedBy_item' => $this->session->userdata('fullname'),
						'dtmInsertedDate_item' => date('Y-m-d H:i:s')
					);
				}

				$approve = $this->db->insert_batch('trdwms_detailcli', $array);
				if($this->db->affected_rows() > 0){
					echo ('true');
				}else{
					echo ('false');
				}
			}elseif($data['txtJenisForklift_header'] == 'REACH'){
				$dt = $this->Forklift_model->get_edit_cli_forklift_reach();
				foreach($dt as $value){
					$array[] = array(
						'txtActivityCode_detail' => $this->input->post('txtActivityCode_header'),
						'txtJenisForklift' => $data['txtJenisForklift_header'],
						'txtUnit' => $value->txtUnit,
						'txtItempart' => $value->txtItempart,
						'txtStandard' => $value->txtStandard,
						'intTimemin' => $value->intTimemin,
						'txtTools' => $value->txtTools,
						'bitActive_detail' => 1,
						'bitOpen' => 1,
						'bitCleaning' => $value->bitCleaning,
						'bitInspection' => $value->bitInspection,
						'bitLubrication' => $value->bitLubrication,
						'txtBarcodeitem_detail' => $value->txtBarcodeitem,
						'txtInsertedBy_item' => $this->session->userdata('fullname'),
						'dtmInsertedDate_item' => date('Y-m-d H:i:s')
					);
				}

				$approve = $this->db->insert_batch('trdwms_detailcli', $array);
				if($this->db->affected_rows() > 0){
					echo ('true');
				}else{
					echo ('false');
				}
			}	
		}
	}

	// public function updateStartChecklist()
	// {
	// 	$txtBarcodeitem = $this->input->post('txtBarcodeitem_detail');
	// 	$data = $this->Forklift_model->m_update_startchecklist('trdwms_detailcli', $txtBarcodeitem);
	// 	echo json_encode($data);
	// }

	// public function scanManual()
	// {
	// 	$intDetailcliID = $this->input->post('intDetailcliID');
	// 	$data = $this->Forklift_model->m_scanManual('trdwms_detailcli', $intDetailcliID);
	// 	echo json_encode($data);
	// }

	public function finishCliForklift()
	{
		$intCliForkliftID = $this->input->post('intCliForkliftID');
		$data = $this->Forklift_model->m_finish_cliforklift('trdwms_headercli', $intCliForkliftID);
		echo json_encode($data);
	}


	// CLI BATTERY 
	public function header_cli_battery()
	{
		$data = $this->Forklift_model->get_header_cli_battery('trdwms_headercli')->result();
		echo json_encode($data);
	}


	// APPROVE CLI FORKLIFT
	public function approve_cli_forklift()
	{
		$data = $this->Forklift_model->get_approve_cli_forklift('trdwms_headercli')->result();
		echo json_encode($data);
	}

	public function approve_cli_battery()
	{
		$data = $this->Forklift_model->get_approve_cli_battery('trdwms_headercli')->result();
		echo json_encode($data);
	}

	public function action_approve_cli_forklift()
	{
		$intCliForkliftID = $this->input->post('intCliForkliftID');
		$data = $this->Forklift_model->m_action_approve_cli_forklift('trdwms_headercli', $intCliForkliftID);
		echo json_encode($data);
	}
	public function action_reject_cli_forklift()
	{
		$intCliForkliftID = $this->input->post('intCliForkliftID');
		$data = $this->Forklift_model->m_action_reject_cli_forklift('trdwms_headercli', $intCliForkliftID);
		echo json_encode($data);
	}

	
	
}
?>