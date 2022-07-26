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


  // DASHBOARD FORKLIFT
  public function get_transaksi_forklift()
  {
    $this->db->select('*');
    $this->db->from('trdwms_headercli');
    $this->db->where('bitActive', 1);
    return $this->db->get();
  }
  
  // CLI FORKLIFT
  public function get_header_cli_forklift()
  {
    $this->db->select('*');
		$this->db->from('trdwms_headercli');
    $this->db->order_by('dtmInserted', 'DESC');
		// $this->db->join('mdwms_forklift', 'mdwms_forklift.intForkliftwhID = trdwms_headercli.intCliForkliftID');
    $this->db->where('bitActive', 1);
    // $this->db->where('bitOpen', 1);
    $this->db->where('txtjeniscleaning', 'Cleaning Unit');
    return $this->db->get();
  }

  public function create_cli_forklift($activitycode)
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
			'txtActivityCode_header' => $activitycode,
			'txtArea' => $txtArea,
			'txtJenisForklift_header' => $txtVersionwh,
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
  public function create_cli_battery($activitycode)
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
			'txtActivityCode_header' => $activitycode,
			'txtArea' => $txtArea,
			'txtJenisForklift_header' => $txtVersionwh,
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

  // START CHECKLIST CLI FORKLIFT (ITEM)
  public function get_edit_cli_forklift($serial)
  {
    $this->db->select('*');
    $this->db->from('trdwms_headercli');
    $this->db->where('txtSerialnumber', $serial);
    $this->db->where('bitActive', 1);

    return $this->db->get();
  }

  // GET DATA ACTIVITY CODE FOR EDIT VIEW
  public function get_item_cli_forklift_cb()
  {
    $this->db->select('*');
    $this->db->from('mdwms_itemforklift');
    $this->db->where('bitActive_item', 1);
    $this->db->where('bitCb', 1);

    return $this->db->get();
  }

  public function get_item_cli_forklift_pm()
  {
    $this->db->select('*');
    $this->db->from('mdwms_itemforklift');
    $this->db->where('bitActive_item', 1);
    $this->db->where('bitReach', 1);

    return $this->db->get();
  }

  public function get_item_cli_forklift_reach()
  {
    $this->db->select('*');
    $this->db->from('mdwms_itemforklift');
    $this->db->where('bitActive_item', 1);
    $this->db->where('bitReach', 1);

    return $this->db->get();
  }
  
  public function get_edit_cli_forklift_cb()
  {
    $this->db->select('*');
    $this->db->from('mdwms_itemforklift');
    
    $this->db->where('bitActive_item', 1);
    $this->db->where('bitCb', 1);

    return $this->db->get()->result();
  }
  public function get_edit_cli_forklift_pm()
  {
    $this->db->select('*');
    $this->db->from('mdwms_itemforklift');
    
    $this->db->where('bitActive_item', 1);
    $this->db->where('bitPm', 1);

    return $this->db->get()->result();
  }
  public function get_edit_cli_forklift_reach()
  {
    $this->db->select('*');
    $this->db->from('mdwms_itemforklift');
    
    $this->db->where('bitActive_item', 1);
    $this->db->where('bitReach', 1);

    return $this->db->get()->result();
  }

  public function get_jenisForklift($activity)
  {
    $this->db->select('*');
    $this->db->from('trdwms_headercli');
    $this->db->where('txtActivityCode_header', $activity);
    // $this->db->where('txtJenisForklift_header', $activity);
    $this->db->where('bitActive', 1);

    return $this->db->get();
  }

  public function get_result_barcode_item($activitycode)
  {
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtActivityCode', $activitycode);
    $this->db->where('intBodydetail', 1);
    $this->db->where('bitActivedetail', 1);

    return $this->db->get();
  }

  // GENERATE ACTIVITY CODE
  public function get_activitycode()
  {
    $this->db->select('RIGHT(trdwms_headercli.txtActivityCode_header, 3) as txtActivitycode', false);
    $this->db->order_by('txtActivitycode', 'DESC');
    $this->db->limit(1);

    $query = $this->db->get('trdwms_headercli');
    // cek dulu apakah ada kode didalam tabel
    
      if($query->num_rows() <> 0){
        $data = $query->row();
        $kode = intval($data->txtActivitycode) + 1;
      }else{
        $kode = 1;
      }

      $tanggal = date('dmY');
      $batas = str_pad($kode, 3, '0', STR_PAD_LEFT);
      $kodetampil = "FORKLIFT"."-".$tanggal.$batas;
      return $kodetampil;
  }

  public function get_result_activitycode($activitycode)
  {
    $this->db->select('*');
    $this->db->from('trdwms_headercli');
    $this->db->where('txtActivityCode_header', $activitycode);
    $this->db->where('bitActive', 1);

    return $this->db->get();
  }

  public function get_detail_activitycode($activitycode)
  {
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->join('trdwms_headercli', 'trdwms_detailcli.txtActivityCode_detail = trdwms_headercli.txtActivityCode_header');
    $this->db->where('txtActivityCode_detail', $activitycode);
    $this->db->where('bitActive_detail', 1);

    return $this->db->get();
  }
  
  public function get_serialnumber($txtSerialnumber)
  {
    $this->db->select('*');
    $this->db->from('mdwms_forklift');
    $this->db->where('txtSerialnumber', $txtSerialnumber);
    return $this->db->get();
  }

  public function get_detail_cli_forklift($activitycode)
  {
    $this->db->select('*');
    $this->db->from('mdwms_itemforklift');
    $this->db->where('txtActivityCode_detail', $activitycode);
    $this->db->where('bitActive_detail', 1);
  }

  // public function create_item_detail($activitycode)
  // {
  //   $txtBarcodeitem_detail = $this->input->post('txtBarcodeitem_detail');
  //   $data = [
  //     'txtBarcodeitem_detail' => $txtBarcodeitem_detail
  //   ];

  //   return $this->db->update('trdwms_detailcli', $data);
  // }

  public function m_updateScanManual($table, $intDetailcliID, $activitycode, $txtBarcodeitem, $item)
  {
    $data = array(
      'txtBarcodeitem_detail' => $txtBarcodeitem,
      'txtActivityCode_detail' => $activitycode,
      'intScanBarcode' => 1,
    );
    $this->db->where('intDetailcliID', $intDetailcliID);
    $this->db->where('txtItempart', $item);
    $this->db->update($table, $data);

    if($this->db->affected_rows() > 0){
      return true;
    }else{
      return false;
    }

    // return $this->db->where('intDetailcliID', $intDetailcliID)->update($table, $data);
  }

  // CEK APAKAH ACTIVITY CODE DETAIL SUDAH DI INSERT
  public function cek_insert_detail($activity)
  {
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtActivityCode_detail', $activity);
    $this->db->where('bitActive_detail', 1);

    return $this->db->count_all_results();
  }

  // CEK APAKAH ITEM BODY SUDAH DI SCAN 
  public function cek_item_body($txtActivityCode_header){
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtActivityCode_header',$txtActivityCode_header);
    $this->db->where('intBodydetail',1);
    $this->db->where('bitActivedetail',1);

    return $this->db->count_all_results();
  }
  public function cek_item_steer($txtActivityCode_header){
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtActivityCode_header',$txtActivityCode_header);
    $this->db->where('intSteerdetail',1);
    $this->db->where('bitActivedetail',1);

    return $this->db->count_all_results();
  }
  public function cek_item_klakson($txtActivityCode_header){
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtActivityCode_header',$txtActivityCode_header);
    $this->db->where('intKlaksondetail',1);
    $this->db->where('bitActivedetail',1);

    return $this->db->count_all_results();
  }
  public function cek_item_lampu($txtActivityCode_header){
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtActivityCode_header',$txtActivityCode_header);
    $this->db->where('intLampudetail',1);
    $this->db->where('bitActivedetail',1);

    return $this->db->count_all_results();
  }
  public function cek_item_rem($txtActivityCode_header){
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtActivityCode_header',$txtActivityCode_header);
    $this->db->where('intRemdetail',1);
    $this->db->where('bitActivedetail',1);

    return $this->db->count_all_results();
  }
  public function cek_item_roda($txtActivityCode_header){
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtActivityCode_header',$txtActivityCode_header);
    $this->db->where('intRodadetail',1);
    $this->db->where('bitActivedetail',1);

    return $this->db->count_all_results();
  }
  public function cek_item_dashboard($txtActivityCode_header){
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtActivityCode_header',$txtActivityCode_header);
    $this->db->where('intDashboarddetail',1);
    $this->db->where('bitActivedetail',1);

    return $this->db->count_all_results();
  }
  public function cek_item_hidrolik($txtActivityCode_header){
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtActivityCode_header',$txtActivityCode_header);
    $this->db->where('intHidrolikdetail',1);
    $this->db->where('bitActivedetail',1);

    return $this->db->count_all_results();
  }
  public function cek_item_sealLift($txtActivityCode_header){
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtActivityCode_header',$txtActivityCode_header);
    $this->db->where('intSealliftdetail',1);
    $this->db->where('bitActivedetail',1);

    return $this->db->count_all_results();
  }
  public function cek_item_rantai($txtActivityCode_header){
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtActivityCode_header',$txtActivityCode_header);
    $this->db->where('intRantaidetail',1);
    $this->db->where('bitActivedetail',1);

    return $this->db->count_all_results();
  }
  public function cek_item_mast($txtActivityCode_header){
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtActivityCode_header',$txtActivityCode_header);
    $this->db->where('intMastdetail',1);
    $this->db->where('bitActivedetail',1);

    return $this->db->count_all_results();
  }
  public function cek_item_oli($txtActivityCode_header){
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtActivityCode_header',$txtActivityCode_header);
    $this->db->where('intOlidetail',1);
    $this->db->where('bitActivedetail',1);

    return $this->db->count_all_results();
  }
  public function cek_item_emergencySwitch($txtActivityCode_header){
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtActivityCode_header',$txtActivityCode_header);
    $this->db->where('intEmergencyswitchdetail',1);
    $this->db->where('bitActivedetail',1);

    return $this->db->count_all_results();
  }
  public function cek_item_fork($txtActivityCode_header){
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtActivityCode_header',$txtActivityCode_header);
    $this->db->where('intForkdetail',1);
    $this->db->where('bitActivedetail',1);

    return $this->db->count_all_results();
  }
  public function cek_item_kamera($txtActivityCode_header){
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtActivityCode_header',$txtActivityCode_header);
    $this->db->where('intKameradetail',1);
    $this->db->where('bitActivedetail',1);

    return $this->db->count_all_results();
  }

  // CEK APAKAH ADA BARCODE YANG SESUAI DENGAN TXTBARCODE 
  public function scan_item_forklift($txtBarcodeitem){
    $this->db->select('*');
    $this->db->from('mdwms_itemforklift');
    $this->db->where('txtBarcodeitem',$txtBarcodeitem);
    $this->db->where('bitActive_item', 1);

    return $this->db->count_all_results();
  }

  // CEK APAKAH ITEM FORKLIFT SUDAH DI SCAN ATAU BELUM
  public function cek_scan($txtBarcodeitem, $activity){
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtBarcodeitem_detail',$txtBarcodeitem);
    $this->db->where('txtActivityCode_detail',$activity);
    $this->db->where('intScanBarcode', 1);
    $this->db->where('bitActive_detail', 1);

    return $this->db->count_all_results();
  }
  public function cek_scan2($txtBarcodeitem, $activity){
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtBarcodeitem_detail',$txtBarcodeitem);
    $this->db->where('txtActivityCode_detail',$activity);
    $this->db->where('intScanBarcode', 1);
    $this->db->where('bitActive_detail', 1);

    return $this->db->count_all_results();
  }

  public function cek_scan_manual($txtBarcodeitem, $intDetailcliID){
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtBarcodeitem_detail',$txtBarcodeitem);
    $this->db->where('intDetailcliID',$intDetailcliID);
    $this->db->where('bitActive_detail', 1);

    return $this->db->count_all_results();
  }

  // CARI ITEM BERDASARKAN BARCODE 
  public function item_barcode($txtBarcodeitem){
    $this->db->select('*');
    $this->db->from('mdwms_itemforklift');
    $this->db->where('txtBarcodeitem',$txtBarcodeitem);
    $this->db->where('bitActive_item', 1);

    return $this->db->get();
  }

  // UPDATE DATA YANG DI SCAN
  public function scan_item($activitycode, $txtBarcodeitem, $item){
    $array = array(
      "txtBarcodeitem_detail" => "$txtBarcodeitem",
      "intScanBarcode" => 1,
      "txtUpdatedBy_item" => $this->session->userdata('fullname'),
      "dtmUpdatedDate_item" => date("Y-m-d H:i:s"),
    );
    
    $this->db->where('txtActivityCode_detail', $activitycode);
    $this->db->where('txtItempart', $item);
    $this->db->update('trdwms_detailcli', $array);
    if($this->db->affected_rows() > 0){
      return 'true';
    }else{
      return 'false';
    }
  }

  public function scan_item_manual($txtActivityCode, $txtBarcodeitem, $item, $intDetailcliID){
    $array = array(
      "txtBarcodeitem_detail" => "$txtBarcodeitem",
      "intScanBarcode" => 1,
      "txtUpdatedBy_item" => $this->session->userdata('fullname'),
      "dtmUpdatedDate_item" => date("Y-m-d H:i:s"),
    );
    
    $this->db->where('txtItempart', $item);
    $this->db->where('intDetailcliID', $intDetailcliID);
    $this->db->update('trdwms_detailcli', $array);
    if($this->db->affected_rows() > 0){
      return 'true';
    }else{
      return 'false';
    }
  }

  public function m_update_startchecklist($txtBarcodeitem)
  {
    $data = [
      'txtBarcodeitem_detail' => $txtBarcodeitem,
    ];
  }


  // CLI BATTERY
  public function get_header_cli_battery()
  {
    $this->db->select('*');
		$this->db->from('trdwms_headercli');
    $this->db->order_by('dtmInserted', 'DESC');
    $this->db->where('bitActive', 1);
    $this->db->where('bitOpen', 1);
    $this->db->where('txtjeniscleaning', 'Cleaning Battery');
    return $this->db->get();
  }

  // FINISH CLI
  public function m_finish_cliforklift($table, $intCliForkliftID, $activitycode)
  {
    $data = array(
      'bitOpen' => 0,
      'bitClose' => 1,
    );

    $this->db->where('intCliForkliftID', $intCliForkliftID);
    $this->db->where('txtActivityCode_header', $activitycode);
    $this->db->update($table, $data);

    if($this->db->affected_rows() > 0){
      return true;
    }else{
      return false;
    }

    // return $this->db->where('intCliForkliftID', $intCliForkliftID)->update($table, $data);
  }

  public function m_cek_statusScanBarcode($activitycode, $barcodeitem)
  {
    $this->db->select('*');
    $this->db->from('trdwms_detailcli');
    $this->db->where('txtActivityCode_detail', $activitycode);
    $this->db->where('txtBarcodeitem_detail', $barcodeitem);
    $this->db->where('intScanBarcode', 1);

    return $this->db->count_all_results();

  }

  // APPROVE CLI FORKLIFT
  public function get_approve_cli_forklift()
  {
    $this->db->select('*');
		$this->db->from('trdwms_headercli');
    $this->db->order_by('dtmInserted', 'DESC');
    $this->db->where('bitActive', 1);
    // $this->db->where('bitOpen', 1);
    $this->db->where('txtjeniscleaning', 'Cleaning Unit');
    return $this->db->get();
  }

  public function get_approve_cli_battery()
  {
    $this->db->select('*');
		$this->db->from('trdwms_headercli');
    $this->db->order_by('dtmInserted', 'DESC');
    $this->db->where('bitActive', 1);
    // $this->db->where('bitOpen', 1);
    $this->db->where('txtjeniscleaning', 'Cleaning Battery');
    return $this->db->get();
  }

  public function m_action_approve_cli_forklift($table, $intCliForkliftID)
  {
    $data = array(
      'bitApproved' => 1,
      'bitActive' => 0
    );
    return $this->db->where('intCliForkliftID', $intCliForkliftID)->update($table, $data);
  }
  public function m_action_reject_cli_forklift($table, $intCliForkliftID)
  {
    $data = array(
      'bitReject' => 1,
      'bitActive' => 0
    );
    return $this->db->where('intCliForkliftID', $intCliForkliftID)->update($table, $data);
  }

  public function count_approve_cli()
  {
    $this->db->select('*');
    $this->db->from('trdwms_headercli');
    $this->db->where('bitApproved', 1);
    $this->db->where('bitClose', 1);

    return $this->db->count_all_results();
  }

  public function count_reject_cli()
  {
    $this->db->select('*');
    $this->db->from('trdwms_headercli');
    $this->db->where('bitReject', 1);
    $this->db->where('bitClose', 1);

    return $this->db->count_all_results();
  }
  public function count_open_cli()
  {
    $this->db->select('*');
    $this->db->from('trdwms_headercli');
    $this->db->where('bitOpen', 1);

    return $this->db->count_all_results();
  }
  public function count_close_cli()
  {
    $this->db->select('*');
    $this->db->from('trdwms_headercli');
    $this->db->where('bitClose', 1);

    return $this->db->count_all_results();
  }

}