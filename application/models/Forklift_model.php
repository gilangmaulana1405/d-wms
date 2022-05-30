<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forklift_model extends CI_Model{

  // DATA TOTAL FORKLIFT WH
  public function totalForklift(){
    $this->db->select('*');
    $this->db->from('mdwms_forklift');
    $this->db->where('bitActive_forklift', 1);

    return $this->db->count_all_results();
  }

  // DATA FORKLIFT OK
  public function forkliftOK(){
    $this->db->select('*');
    $this->db->from('mdwms_forklift');
    $this->db->where('bitActive_forklift', 1);
    $this->db->where_in('bitIdle',1);
    $this->db->where_in('bitUsed',1);

    return $this->db->count_all_results();
  }

  // DATA FORKLIFT REAPIR
  public function forkliftRepair(){
    $this->db->select('*');
    $this->db->from('mdwms_forklift');
    $this->db->where('bitActive_forklift', 1);
    $this->db->where_in('bitRepair',1);

    return $this->db->count_all_results();
  }  

  // DATA FORKLIFT BREAKDOWN
  public function forkliftBreakdown(){
    $this->db->select('*');
    $this->db->from('mdwms_forklift');
    $this->db->where('bitActive_forklift', 1);
    $this->db->where_in('bitBreakdown',1);

    return $this->db->count_all_results();
  }
  
  // DATA CLI FORKLIFT
  public function get_cli_forklift()
  {
    $this->db->select('*');
		$this->db->from('trdwms_headercli');
		$this->db->join('mdwms_forklift', 'mdwms_forklift.intForkliftwhID = trdwms_headercli.intCliForkliftID');
    $this->db->where('bitactive', 1);
    return $this->db->get();
  }
  public function get_header_cli_forklift()
  {
    $this->db->select('*');
		$this->db->from('trdwms_headercli');
		// $this->db->join('mdwms_forklift', 'mdwms_forklift.intForkliftwhID = trdwms_headercli.intCliForkliftID');
    $this->db->where('bitActive', 1);
    $this->db->where('bitOpen', 1);
    return $this->db->get();
  }

  public function get_transaksi_forklift()
  {
    $this->db->select('*');
    $this->db->from('trdwms_headercli');
    $this->db->where('bitActive', 1);
    return $this->db->get();
  }
  
  public function get_serialnumber($txtSerialnumber)
  {
    $this->db->select('*');
    $this->db->from('mdwms_forklift');
    $this->db->where('txtSerialnumber', $txtSerialnumber);
    return $this->db->get();
  }

  public function create_cli_forklift()
  {

    $txtSerialnumber = $this->input->post('txtSerialnumber');
    $txtArea = $this->input->post('txtArea');
    $txtVersionwh = $this->input->post('txtVersionwh');
    $txtVersioneng = $this->input->post('txtVersioneng');
    $txtPicforklift = $this->input->post('txtPicforklift');
    $intTahunpembuatan = $this->input->post('intTahunpembuatan');
    $txtjeniscleaning = $this->input->post('txtjeniscleaning');

    $data = [
			'txtSerialnumber' => $txtSerialnumber,
			'txtArea' => $txtArea,
			'txtVersionwh' => $txtVersionwh,
			'txtVersioneng' => $txtVersioneng,
			'txtPicforklift' => $txtPicforklift,
			'intTahunpembuatan' => $intTahunpembuatan,
			'txtjeniscleaning' => $txtjeniscleaning,
      'bitOpen' => 1,
      'bitActive' => 1,
      'bitProgress' => 0,
      'bitHold' => 0,
      'bitClose' => 0,
      'txtInsertedBy' => $this->session->userdata('fullname'),
      'dtmInserted' => date('Y-m-d H:i:s')
		];

    return $this->db->insert('trdwms_headercli', $data);
  }

  public function delete_cli_forklift($table, $intForkliftwhID)
  {
    $data = array(
      'bitActive' => 0,
    );
    return $this->db->where('intCliForkliftID', $intForkliftwhID)->update($table, $data);
  }
  

}