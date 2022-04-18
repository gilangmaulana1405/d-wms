<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roleacces_model extends CI_Model{

  public function view ()
  {
    $this->db->select('*');
    $this->db->from('mdwms_role');
    $this->db->order_by('txtRole_Acces', 'ASC');
    return $this->db->get()->result();
  }

  public function view_suppliername ()
  {
    $this->db->select('*');
    $this->db->from('mdwms_suppliername');
    $this->db->where('bitActive',1);
    $result = $this->db->get();
    return $result->result();
  }

  public function view_karyawan ()
  {
    $this->db->select('*');
    $this->db->from('mdwms_karyawan');
    $this->db->where('bitActiveKaryawan',1);
    $this->db->order_by('txtNamakaryawan', 'ASC');
    $result = $this->db->get();
    return $result->result();
  }

  public function view_karyawan_rm ()
  {
    $this->db->select('*');
    $this->db->from('mdwms_karyawan');
    $this->db->where('bitActiveKaryawan',1);
    $this->db->where('txtSubdept', 'RM');
    $result = $this->db->get();
    return $result->result();
  }

  public function view_karyawan_pm ()
  {
    $this->db->select('*');
    $this->db->from('mdwms_karyawan');
    $this->db->where('bitActiveKaryawan',1);
    $this->db->where('txtSubdept', 'PM');
    $result = $this->db->get();
    return $result->result();
  }

  public function view_karyawan_qc ()
  {
    $this->db->select('*');
    $this->db->from('mdwms_karyawan');
    $this->db->where('bitActiveKaryawan',1);
    $this->db->where('txtSubdept', 'QA');
    $result = $this->db->get();
    return $result->result();
  }

  public function view_allergen ()
  {
    $this->db->select('*');
    $this->db->from('mdwms_allergen');
    $this->db->order_by('txtItemdesc', 'ASC');
    return $this->db->get()->result();
  }

  public function view_subdept ()
  {
    $this->db->select('*');
    $this->db->from('mdwms_subdept');
    $this->db->order_by('txtSubdept', 'ASC');
    return $this->db->get()->result();
  }

  public function view_jobtitle ()
  {
    $this->db->select('*');
    $this->db->from('mdwms_jobtitle');
    $this->db->order_by('txtJobtitle', 'ASC');
    return $this->db->get()->result();
  }

  public function view_qtyperbag ()
  {
    return $this->db->get('mdwms_qtyperbag')->result();
  }

  public function view_employee ()
  {
    $this->db->select('*');
    $this->db->from('mdwms_karyawan');
    $this->db->join('mdwms_subdept', 'mdwms_karyawan.intSubdept = mdwms_subdept.intSubdeptID');
    $this->db->join('mdwms_jobtitle', 'mdwms_karyawan.intJobtitle = mdwms_jobtitle.intJobtitleID');
    $this->db->order_by('txtNamakaryawan', 'ASC');
    return $this->db->get()->result();
  }

  public function view_team ()
  {
    $this->db->select('*');
    $this->db->from('mdwms_team');
    $this->db->order_by('txtNamateam', 'ASC');
    return $this->db->get()->result();
  }

  public function view_team_aktif ()
  {
    $this->db->select('*');
    $this->db->from('mdwms_team');
    $this->db->where('bitActiveTeam', 1);
    return $this->db->get();
  }

  public function view_itemcode ()
  {
    $this->db->select('*');
    $this->db->from('mdwms_pm_material');
    $this->db->where_not_in('txtItemcode_pm', null);
    $this->db->order_by('txtItemcode_pm', 'ASC');
    return $this->db->get()->result();
  }

  // cek apakah itemcode sudah digunakan atau belum
  public function cekTxtItemcode($intMaterialID, $txtItemcode_pm){
    $this->db->select('*');
    $this->db->from('mdwms_pm_material');
    $this->db->where('txtItemcode_pm', $txtItemcode_pm);
    $this->db->where_not_in('intMaterialID', $intMaterialID);
    return $this->db->count_all_results();
  }

  // insert material PM
  public function insert_material($txtItemcode_pm, $txtDescription_pm, $intQtyperpallet_pm, $txtUom_pm, $txtLotnumber_pm, $txtSupplier_name){
    $insertArray = array(
      "txtItemcode_pm" => "$txtItemcode_pm",
      "txtDescription_pm" => "$txtDescription_pm",
      "intQtyperpallet_pm" => "$intQtyperpallet_pm",
      "txtUom_pm" => "$txtUom_pm",
      "txtLotnumber_pm" => "$txtLotnumber_pm",
      "txtSupplier_name" => "$txtSupplier_name",
      "txtInsertedBy" => $this->session->userdata('fullname'),
      "dtmInserted" => date('Y-m-d H:i:s'),
      "bitActive_pm" => 1,
    );

    $this->db->insert('mdwms_pm_material', $insertArray);
    if($this->db->affected_rows() == 0){
      return 'false';
    }else{
      return 'true';
    }
  }

  // get data material 
  public function get_material($intMaterialID){
    $this->db->select('*');
    $this->db->from('mdwms_pm_material');
    $this->db->where('intMaterialID', $intMaterialID);

    return $this->db->get();
  }

  // update material
  public function update_material($txtItemcode_pm, $txtDescription_pm, $intQtyperpallet_pm, $txtUom_pm, $txtLotnumber_pm, $txtSupplier_name, $intMaterialID, $bitActive_pm){
    $updateArray = array(
      "txtItemcode_pm" => "$txtItemcode_pm",
      "txtDescription_pm" => "$txtDescription_pm",
      "intQtyperpallet_pm" => "$intQtyperpallet_pm",
      "txtUom_pm" => "$txtUom_pm",
      "txtLotnumber_pm" => "$txtLotnumber_pm",
      "txtSupplier_name" => "$txtSupplier_name",
      "bitActive_pm" => "$bitActive_pm",
      "txtUpdatedBy" => $this->session->userdata('fullname'),
      "dtmUpdated" => date('Y-m-d H:i:s'),
    );

    $this->db->where('intMaterialID', $intMaterialID);
    $this->db->update('mdwms_pm_material', $updateArray);
    if($this->db->affected_rows() == 0){
      return 'false';
    }else{
      return 'true';
    }
  }

  public function view_rfid ()
  {
    $this->db->select('*');
    $this->db->from('mdwms_boxid');
    $this->db->where('bitActive', 1);
    return $this->db->get();
  }

  // cek Nomor Box apakah sudah digunakan atau belum
  public function cekTxtNobox($txtNobox, $intBoxID)
  {
    $this->db->select('*');
    $this->db->from('mdwms_boxid');
    $this->db->where('bitActive', 1);
    $this->db->where('txtNobox', $txtNobox);
    $this->db->where_not_in('intBoxID', $intBoxID);
    return $this->db->count_all_results();
  }

  // cek RFID Tag apakah sudah digunakan atau belum
  public function cekTxtRfidbox($txtRfidbox, $intBoxID)
  {
    $this->db->select('*');
    $this->db->from('mdwms_boxid');
    $this->db->where('bitActive', 1);
    $this->db->where('txtRfidbox', $txtRfidbox);
    $this->db->where_not_in('intBoxID', $intBoxID);
    return $this->db->count_all_results();
  }

  // insert Box
  public function insertBox($txtNobox)
  {
    $insertArray = array(
      "txtNobox" => "$txtNobox",
      "txtInsertedBy" => $this->session->userdata('fullname'),
      "dtmInsertedDate" => date("Y-m-d H:i:s"),
      "bitActive" => 1
    );

    $this->db->insert('mdwms_boxid', $insertArray);
    if($this->db->affected_rows() == 0){
      return 'false';
    }else{
      return 'true';
    }
  }

  // get data Boc RFID
  public function get_box($intBoxID){
    $this->db->select('*');
    $this->db->from('mdwms_boxid');
    $this->db->where('intBoxID', $intBoxID);

    return $this->db->get();
  }

  // insert rfid tag
  public function insert_rfid_tag($intBoxID, $txtRfidbox){
    $updateArray = array(
      "txtRfidbox" => "$txtRfidbox",
      "dtmUpdatedDate" => date("Y-m-d H:i:s"),
      "txtUpdatedBy" => $this->session->userdata('fullname'),
    );

    $this->db->where('intBoxID', $intBoxID);
    $this->db->update('mdwms_boxid', $updateArray);
    if($this->db->affected_rows() == 0){
      return 'false';
    }else{
      return 'true';
    }
  }

  // update data BOX 
  public function update_box_rfid($intBoxID, $txtNobox, $bitActive){
    $updateArray = array(
      "txtNobox" => "$txtNobox",
      "bitActive" => "$bitActive",
      "txtUpdatedBy" => $this->session->userdata('fullname'),
      "dtmUpdatedDate" => date("Y-m-d H:i:s"),
    );

    $this->db->where('intBoxID', $intBoxID);
    $this->db->update('mdwms_boxid', $updateArray);
    if($this->db->affected_rows() == 0){
      return 'false';
    }else{
      return 'true';
    }
  }

  // Data all forklift
  public function view_forklift(){
    $this->db->select('*');
    $this->db->from('mdwms_forklift');
    $this->db->where('bitActive_forklift', 1);
    $this->db->order_by('txtIdentifikasi', 'ASC');
    $this->db->order_by('txtVersionwh', 'ASC');
    return $this->db->get();
  }

  // insert forklift
  public function insert_forklift($txtArea, $txtIdentifikasi, $txtVersioneng, $txtVersionwh, $txtMerk, $txtModel, $txtSerialnumber, $intTahunpembuatan, $intBattery, $intBasiccapacity, $dtmDeliverydate, $txtPicforklift, $txtGambar_forklift){
    $insertArray = array(
      "txtArea" => "$txtArea",
      "txtIdentifikasi" => "$txtIdentifikasi",
      "txtVersionwh" => "$txtVersionwh",
      "txtVersioneng" => "$txtVersioneng",
      "txtMerk" => "$txtMerk",
      "txtModel" => "$txtModel",
      "txtSerialnumber" => "$txtSerialnumber",
      "intTahunpembuatan" => "$intTahunpembuatan",
      "intBattery" => "$intBattery",
      "intBasiccapacity" => "$intBasiccapacity",
      "dtmDeliverydate" => "$dtmDeliverydate",
      "txtPicforklift" => "$txtPicforklift",
      "txtGambar_forklift" => "$txtGambar_forklift",
      "bitIdle" => 1, 
      "bitActive_forklift" => 1,
      "txtInsertedBy_forklift" => $this->session->userdata('fullname'),
      "dtmInsertedDate_forklift" => date('Y-m-d H:i:s'),
    );

    $this->db->insert('mdwms_forklift', $insertArray);
    if($this->db->affected_rows() == 0){
      return "false";
    }else{
      return "true";
    }
  }

  // UPDATE FORKLIFT 
  public function update_forklift($txtArea, $txtIdentifikasi, $txtVersioneng, $txtVersionwh, $txtMerk, $txtModel, $txtSerialnumber, $intTahunpembuatan, $intBattery, $intBasiccapacity, $dtmDeliverydate, $txtPicforklift, $txtGambar_forklift, $intForkliftwhID, $bitActive_forklift){
    $updateArray = array(
      "txtArea" => "$txtArea",
      "txtIdentifikasi" => "$txtIdentifikasi",
      "txtVersionwh" => "$txtVersionwh",
      "txtVersioneng" => "$txtVersioneng",
      "txtMerk" => "$txtMerk",
      "txtModel" => "$txtModel",
      "txtSerialnumber" => "$txtSerialnumber",
      "intTahunpembuatan" => "$intTahunpembuatan",
      "intBattery" => "$intBattery",
      "intBasiccapacity" => "$intBasiccapacity",
      "dtmDeliverydate" => "$dtmDeliverydate",
      "txtPicforklift" => "$txtPicforklift",
      "txtGambar_forklift" => "$txtGambar_forklift",
      "bitActive_forklift" => "$bitActive_forklift",
      "txtUpdatedBy_forklift" => $this->session->userdata('fullname'),
      "dtmUpdatedDate_forklift" => date('Y-m-d H:i:s'),
    );

    $this->db->where('intForkliftwhID', $intForkliftwhID);
    $this->db->update('mdwms_forklift', $updateArray);
    if($this->db->affected_rows() == 0){
      return "false";
    }else{
      return "true";
    }
  }

  // get data forklift
  public function get_forklift(){
    $intForkliftwhID = $this->input->get('dt');
    $this->db->select('*');
    $this->db->from('mdwms_forklift');
    $this->db->where('intForkliftwhID', $intForkliftwhID);
    $this->db->where('bitActive_forklift', 1);

    return $this->db->get();
  }

  // Data all item forklift
  public function view_item_forklift(){
    $this->db->select('*');
    $this->db->from('mdwms_itemforklift');
    $this->db->where('bitActive_item', 1);

    return $this->db->get();
  }

  // INSERT ITEM FORLIFT
  public function insert_item_forklift($txtItempart, $txtStandard, $intTimemin, $txtTools, $txtUnit, $bitCleaning, $bitInspection, $bitLubrication, $bitPm, $bitReach, $bitCb){
    $insertArray = array(
      "txtItempart" => "$txtItempart",
      "txtStandard" => "$txtStandard",
      "intTimemin" => "$intTimemin",
      "txtTools" => "$txtTools",
      "txtUnit" => "$txtUnit",
      "bitCleaning" => "$bitCleaning",
      "bitInspection" => "$bitInspection",
      "bitLubrication" => "$bitLubrication",
      "bitPm" => "$bitPm",
      "bitCb" => "$bitCb",
      "bitReach" => "$bitReach",
      "bitActive_item" => 1,
      "txtInsertedBy_item" => $this->session->userdata('fullname'),
      "dtmInsertedDate_item" => date('Y-m-d H:i:s'),
    );

    $this->db->insert('mdwms_itemforklift', $insertArray);
    if($this->db->affected_rows() == 0){
      return "false";
    }else{
      return "true";
    }
  }

  // GET DATA ITEM FORKLIFT
  public function get_item_forklift($intItemforkliftID){
    $this->db->select('*');
    $this->db->from('mdwms_itemforklift');
    $this->db->where('intItemforkliftID', $intItemforkliftID);

    return $this->db->get();
  }

  // UPDATE ITEM FORKLIFT
  public function update_item_forklift($txtItempart, $txtStandard, $intTimemin, $txtTools, $txtUnit, $intItemforkliftID, $bitActive_item, $bitCleaning, $bitInspection, $bitLubrication, $bitPm, $bitCb, $bitReach){
    $updateArray = array(
      "txtItempart" => "$txtItempart",
      "txtStandard" => "$txtStandard",
      "intTimemin" => "$intTimemin",
      "txtTools" => "$txtTools",
      "txtUnit" => "$txtUnit",
      "bitCleaning" => "$bitCleaning",
      "bitInspection" => "$bitInspection",
      "bitLubrication" => "$bitLubrication",
      "bitPm" => "$bitPm",
      "bitCb" => "$bitCb",
      "bitReach" => "$bitReach",
      "bitActive_item" => "$bitActive_item",
      "txtUpdatedBy_item" => $this->session->userdata('fullname'),
      "dtmUpdatedDate_item" => date('Y-m-d H:i:s'),
    );

    $this->db->where('intItemforkliftID', $intItemforkliftID);
    $this->db->update('mdwms_itemforklift', $updateArray);
    if($this->db->affected_rows() == 0){
      return "false";
    }else{
      return "true";
    }
  }

  // UPDATE SCAN BARCODE / QR
  public function update_barcode($intItemforkliftID, $txtBarcodeitem){
    $updateArray = array(
      "txtBarcodeitem" => "$txtBarcodeitem"
    );

    $this->db->where('intItemforkliftID', $intItemforkliftID);
    $this->db->update('mdwms_itemforklift', $updateArray);
    if($this->db->affected_rows() == 0){
      return "false";
    }else{
      return "true";
    }
  }

  public function get_role_by_id($RoleID)
  {
    $hsl=$this->db->query("SELECT * FROM mdwms_role WHERE intRoleID='$RoleID'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'intRoleID'     => $data->intRoleID,
                    'intRole'       => $data->intRole,
                    'txtRole_Acces' => $data->txtRole_Acces,
                    'bitActive'     => $data->bitActive,
                    'txtInsertedBy'     => $this->session->userdata('fullname'),
                    'dtmInsertedDate'   => $data->dtmInsertedDate,
                    );
            }
        }
        return $hasil;
  }

  public function get_allergen_by_id($AllergenID)
  {
    $hsl=$this->db->query("SELECT * FROM mdwms_allergen WHERE intAllergenID='$AllergenID'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'intAllergenID'     => $data->intAllergenID,
                    'txtItemcode'       => $data->txtItemcode,
                    'txtItemdesc'       => $data->txtItemdesc,
                    'bitAllergen'       => $data->bitAllergen,
                    'txtContain'        => $data->txtContain,
                    'bitActive'         => $data->bitActive,
                    'txtInsertedBy'     => $this->session->userdata('fullname'),
                    'dtmInserted'       => $data->dtmInserted,
                    );
            }
        }
        return $hasil;
  }

  public function get_subdept_by_id($SubdeptID)
  {
    $hsl=$this->db->query("SELECT * FROM mdwms_subdept WHERE intSubdeptID='$SubdeptID'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'intSubdeptID'      => $data->intSubdeptID,
                    'txtSubdept'        => $data->txtSubdept,
                    'bitActive'         => $data->bitActive,
                    'txtInsertedBy'     => $this->session->userdata('fullname'),
                    'dtmInsertedDate'   => $data->dtmInsertedDate,
                    );
            }
        return $hasil;
        }
  }

  public function get_jobtitle_by_id($JobtitleID)
  {
    $hsl=$this->db->query("SELECT * FROM mdwms_jobtitle WHERE intJobtitleID='$JobtitleID'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'intJobtitleID'     => $data->intJobtitleID,
                    'txtJobtitle'       => $data->txtJobtitle,
                    'bitActive'         => $data->bitActiveJob,
                    'txtInsertedBy'     => $this->session->userdata('fullname'),
                    'dtmInsertedDate'   => $data->dtmInsertedDate,
                    );
            }
        return $hasil;
        }
  }

  public function get_qtyperbag_by_id($qtyperbagID)
  {
    $hsl=$this->db->query("SELECT * FROM mdwms_qtyperbag WHERE intQtyperbagID='$qtyperbagID'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'intQtyperbagID'    => $data->intQtyperbagID,
                    'txtItemcode'       => $data->txtItemcode,
                    'txtItemdesc'       => $data->txtItemdesc,
                    'intQty'            => $data->intQty,
                    'txtUom'            => $data->txtUom,
                    'bitActive'         => $data->bitActive,
                    'txtInsertedBy'     => $this->session->userdata('fullname'),
                    'dtmInserted'       => $data->dtmInserted,
                    );
            }
        }
        return $hasil;
  }

  public function get_employee_by_id($KaryawanID)
  {
    $hsl=$this->db->query("SELECT * FROM mdwms_karyawan WHERE intKaryawanID='$KaryawanID'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'intKaryawanID'     => $data->intKaryawanID,
                    'txtSubdept'        => $data->txtSubdept,
                    'txtJobtitle'       => $data->txtJobtitle,
                    'txtNik'            => $data->txtNik,
                    'txtNamakaryawan'   => $data->txtNamakaryawan,
                    'txtEmailkaryawan'  => $data->txtEmailkaryawan,
                    'txtPhonekaryawan'  => $data->txtPhonekaryawan,
                    'bitActive'         => $data->bitActive,
                    'txtInsertedBy'     => $this->session->userdata('fullname'),
                    'dtmInsertedDate'   => $data->dtmInsertedDate,
                    );
            }
        }
        return $hasil;
  }

  public function hapus_role($id)
  {
    $this->db->where('intRoleID', $id);
    $this->db->delete('mdwms_role'); // Untuk mengeksekusi perintah delete data
  }

  public function hapus_allergen($id)
  {
    $this->db->where('intAllergenID', $id);
    $this->db->delete('mdwms_allergen'); // Untuk mengeksekusi perintah delete data
  }

  public function hapus_subdept($id)
  {
    $this->db->where('intSubdeptID', $id);
    $this->db->delete('mdwms_subdept'); // Untuk mengeksekusi perintah delete data
  }

  public function hapus_jobtitle($id)
  {
    $this->db->where('intJobtitleID', $id);
    $this->db->delete('mdwms_jobtitle'); // Untuk mengeksekusi perintah delete data
  }

  public function hapus_qtyperbag($id)
  {
    $this->db->where('intQtyperbagID', $id);
    $this->db->delete('mdwms_qtyperbag'); // Untuk mengeksekusi perintah delete data
  }

  public function hapus_employee($id)
  {
    $this->db->where('intKaryawanID', $id);
    $this->db->delete('mdwms_karyawan'); // Untuk mengeksekusi perintah delete data
  }

  //////////////////////////////////////////Fungsi kedua/////////////////////////////////////////////
  // Fungsi untuk validasi form tambah dan ubah
  public function validation($mode){
    $this->load->library('form_validation'); // Load library form_validation untuk proses validasinya
    // Tambahkan if apakah $mode save atau update
    // Karena ketika update, role tidak harus divalidasi
    // Jadi role di validasi hanya ketika menambah data role saja
    if($mode == "save")
      $this->form_validation->set_rules('input_role', 'Role', 'required|numeric|max_length[1]');
      $this->form_validation->set_rules('input_acces', 'Role Acces', 'required|max_length[50]');
      $this->form_validation->set_rules('input_active', 'Role Active', 'required');
    if($this->form_validation->run()) // Jika validasi benar
      return true; // Maka kembalikan hasilnya dengan TRUE
    else // Jika ada data yang tidak sesuai validasi
      return false; // Maka kembalikan hasilnya dengan FALSE
  }

  // Fungsi untuk melakukan simpan data ke tabel mdwmsrole
  public function save(){
    $data = array(
      "intRole" => $this->input->post('input_role'),
      "txtRole_Acces" => $this->input->post('input_acces'),
      "bitActive" => $this->input->post('input_active'),
    );
    $this->db->insert('mdwms_role', $data); // Untuk mengeksekusi perintah insert data
  }

   // Fungsi untuk melakukan ubah data role berdasarkan ID
  public function edit($id)
  {
    $data = array(
      "intRole" => $this->input->post('input_role'),
      "txtRole_Acces" => $this->input->post('input_acces'),
      "bitActive" => $this->input->post('input_active'),
    );
    $this->db->where('intRoleID', $id);
    $this->db->update('mdwms_role', $data); // Untuk mengeksekusi perintah update data
  }

  // Fungsi untuk melakukan menghapus data role berdasarkan ID role
  public function delete($id)
  {
    $this->db->where('intRoleID', $id);
    $this->db->delete('mdwms_role'); // Untuk mengeksekusi perintah delete data
  }

  // initRole Terbaru untuk insert
  public function intRoleMax(){
    $this->db->select_max('intRole');
    $this->db->from('mdwms_role');
    return $this->db->get();
  }

  // get data role access dari intRoleID
  public function get_role_access($intRoleID){
    $this->db->select('*');
    $this->db->from('mdwms_role');
    $this->db->where('intRoleID', $intRoleID);

    return $this->db->get();
  }

  // INSERT DATA ROLE ACCESS
  public function insert_role_acces($txtRole_Acces, $dtmInsertedDate, $txtInsertedBy, $intRole){
    $insertArray = array(
      "intRoleID" => "",
      "intRole" => "$intRole",
      "txtRole_Acces" => "$txtRole_Acces",
      "dtmInsertedDate" => "$dtmInsertedDate",
      "txtInsertedBy" => "$txtInsertedBy",
      "bitActive" => "ACTIVE",
    );

    $this->db->insert('mdwms_role', $insertArray);
    if ($this->db->affected_rows() == 0) {
          return FALSE;
      }else{
          return TRUE;
      }    
  }

  // UPDATE DATA ROLE ACCESS
  public function update_role_access($intRole, $intRoleID, $txtRole_Acces, $bitActive, $dtmUpdatedDate, $txtUpdatedBy){
    $updateArray = array(
      "intRole" => "$intRole",
      "txtRole_Acces" => "$txtRole_Acces",
      "bitActive" => "$bitActive",
      "dtmUpdatedDate" => "$dtmUpdatedDate",
      "txtUpdatedBy" => "$txtUpdatedBy",
    );

    $this->db->where('intRoleID', $intRoleID);
    $this->db->update('mdwms_role', $updateArray);
    if ($this->db->affected_rows() == 0) {
          return FALSE;
      }else{
          return TRUE;
      }    
  }

  // INSERT DATA SUBDEPARTMENT
  public function insert_subdept($txtSubdept, $dtmInsertedDate, $txtInsertedBy){
    $insertArray = array(
      "txtSubdept" => "$txtSubdept",
      "dtmInsertedDate" => "$dtmInsertedDate",
      "txtInsertedBy" => "$txtInsertedBy",
    );

    $this->db->insert('mdwms_subdept', $insertArray);
    if ($this->db->affected_rows() == 0) {
          return FALSE;
      }else{
          return TRUE;
      } 
  }

  // get data subdepartment dari intSubdeptID
  public function get_subdept($intSubdeptID){
    $this->db->select('*');
    $this->db->from('mdwms_subdept');
    $this->db->where('intSubdeptID', $intSubdeptID);

    return $this->db->get();
  }

  // UPDATE DATA ROLE ACCESS
  public function update_subdept($intSubdeptID, $txtSubdept, $bitActive, $dtmUpdatedDate, $txtUpdatedBy){
    $updateArray = array(
      "txtSubdept" => "$txtSubdept",
      "bitActive" => "$bitActive",
      "dtmUpdatedDate" => "$dtmUpdatedDate",
      "txtUpdatedBy" => "$txtUpdatedBy",
    );

    $this->db->where('intSubdeptID', $intSubdeptID);
    $this->db->update('mdwms_subdept', $updateArray);
    if ($this->db->affected_rows() == 0) {
          return FALSE;
      }else{
          return TRUE;
      }    
  }

  // INSERT DATA JOB TITLE
  public function insert_job_title($txtJobtitle, $dtmInsertedDate, $txtInsertedBy){
    $insertArray = array(
      "txtJobtitle" => "$txtJobtitle",
      "dtmInsertedDate" => "$dtmInsertedDate",
      "txtInsertedBy" => "$txtInsertedBy",
      "bitActiveJob" => "1",
    );

    $this->db->insert('mdwms_jobtitle', $insertArray);
    if ($this->db->affected_rows() == 0) {
          return FALSE;
      }else{
          return TRUE;
      } 
  }

  // get data job title dari intJobtitleID
  public function get_job_title($intJobtitleID){
    $this->db->select('*');
    $this->db->from('mdwms_jobtitle');
    $this->db->where('intJobtitleID', $intJobtitleID);

    return $this->db->get();
  }

  // UPDATE DATA JOB TITLE
  public function update_job_title($intJobtitleID, $txtJobtitle, $bitActive, $dtmUpdatedDate, $txtUpdatedBy){
    $updateArray = array(
      "txtJobtitle" => "$txtJobtitle",
      "bitActiveJob" => "$bitActive",
      "dtmUpdatedDate" => "$dtmUpdatedDate",
      "txtUpdatedBy" => "$txtUpdatedBy",
    );

    $this->db->where('intJobtitleID', $intJobtitleID);
    $this->db->update('mdwms_jobtitle', $updateArray);
    if ($this->db->affected_rows() == 0) {
          return FALSE;
      }else{
          return TRUE;
      }    
  }

  // INSERT ALLERGEN
  public function insert_allergen($txtItemdesc, $txtItemcode, $dtmInsertedDate, $txtInsertedBy, $bitGlutein, $bitEgg, $bitFish, $bitPeanut, $bitSoya, $bitTre, $bitSulfur, $bitMilk, $bitAllergen){
    $insertArray = array(
      "txtItemcode" => "$txtItemcode",
      "txtItemdesc" => "$txtItemdesc",
      "bitGlutein" => "$bitGlutein",
      "bitEgg" => "$bitEgg",
      "bitFish" => "$bitFish",
      "bitMilk" => "$bitMilk",
      "bitSoya" => "$bitSoya",
      "bitTre" => "$bitTre",
      "bitSulfur" => "$bitSulfur",
      "bitPeanut" => "$bitPeanut",
      "dtmInserted" => "$dtmInsertedDate",
      "txtInsertedBy" => "$txtInsertedBy",
      "bitAllergen" => "$bitAllergen",
      "bitActive" => "1",
    );

    $this->db->insert('mdwms_allergen', $insertArray);
    if ($this->db->affected_rows() == 0) {
          return FALSE;
      }else{
          return TRUE;
      }    
  }

  // get data allergen dari intAllergenID
  public function get_allergen($intAllergenID){
    $this->db->select('*');
    $this->db->from('mdwms_allergen');
    $this->db->where('intAllergenID', $intAllergenID);

    return $this->db->get();
  }

  // UPDATE DATA ALLERGEN
  public function update_allergen($intAllergenID, $txtItemcode, $txtItemdesc, $bitAllergen, $bitActive, $dtmUpdatedDate, $txtUpdatedBy, $bitGlutein, $bitEgg, $bitFish, $bitPeanut, $bitSoya, $bitTre, $bitSulfur, $bitMilk){
    $updateArray = array(
      "txtItemcode" => "$txtItemcode",
      "txtItemdesc" => "$txtItemdesc",
      "bitGlutein" => "$bitGlutein",
      "bitEgg" => "$bitEgg",
      "bitFish" => "$bitFish",
      "bitMilk" => "$bitMilk",
      "bitSoya" => "$bitSoya",
      "bitTre" => "$bitTre",
      "bitSulfur" => "$bitSulfur",
      "bitPeanut" => "$bitPeanut",
      "bitAllergen" => "$bitAllergen",
      "bitActive" => "$bitActive",
      "dtmUpdated" => "$dtmUpdatedDate",
      "txtUpdatedBy" => "$txtUpdatedBy",
    );

    $this->db->where('intAllergenID', $intAllergenID);
    $this->db->update('mdwms_allergen', $updateArray);
    if ($this->db->affected_rows() == 0) {
          return FALSE;
      }else{
          return TRUE;
      }    
  }

  // INSERT DATA EMPLOYEE
  public function insert_employee($txtNamakaryawan, $txtNik, $txtEmailkaryawan, $dtmInsertedDate, $txtInsertedBy, $txtPhonekaryawan, $intSubdept, $intJobtitle, $txtSubdept, $txtJobtitle){
    $insertArray = array(
      "intSubdept" => "$intSubdept",
      "intJobtitle" => "$intJobtitle",
      "txtNik" => "$txtNik",
      "txtEmailkaryawan" => "$txtEmailkaryawan",
      "txtPhonekaryawan" => "$txtPhonekaryawan",
      "txtNamakaryawan" => "$txtNamakaryawan",
      "dtmInsertedDate" => "$dtmInsertedDate",
      "txtInsertedBy" => "$txtInsertedBy",
      "txtSubdept" => "$txtSubdept",
      "txtJobtitle" => "$txtJobtitle",
      "bitActiveKaryawan" => "1"
    );

    $this->db->insert('mdwms_karyawan', $insertArray);
    if ($this->db->affected_rows() == 0) {
          return FALSE;
      }else{
          return TRUE;
      }   
  }

  // get data employee dari intKaryawanID
  public function get_employee($intKaryawanID){
    $this->db->select('*');
    $this->db->from('mdwms_karyawan');
    $this->db->join('mdwms_subdept', 'mdwms_karyawan.intSubdept = mdwms_subdept.intSubdeptID');
    $this->db->join('mdwms_jobtitle', 'mdwms_karyawan.intJobtitle = mdwms_jobtitle.intJobtitleID');
    $this->db->where('intKaryawanID', $intKaryawanID);

    return $this->db->get();
  }

  // UPDATE DATA EMPLOYEE
  public function update_employee($intKaryawanID, $txtNik, $txtNamakaryawan, $txtEmailkaryawan, $intSubdept, $bitActive, $dtmUpdatedDate, $txtUpdatedBy, $txtPhonekaryawan, $intJobtitle, $txtSubdept, $txtJobtitle){
    $updateArray = array(
      "intSubdept" => "$intSubdept",
      "intJobtitle" => "$intJobtitle",
      "txtNik" => "$txtNik",
      "txtNamakaryawan" => "$txtNamakaryawan",
      "txtSubdept" => "$txtSubdept",
      "txtJobtitle" => "$txtJobtitle",
      "txtEmailkaryawan" => "$txtEmailkaryawan",
      "txtPhonekaryawan" => "$txtPhonekaryawan",
      "bitActiveKaryawan" => "$bitActive",
      "dtmUpdatedDate" => "$dtmUpdatedDate",
      "txtUpdatedBy" => "$txtUpdatedBy",
    );

    $this->db->where('intKaryawanID', $intKaryawanID);
    $this->db->update('mdwms_karyawan', $updateArray);
    if ($this->db->affected_rows() == 0) {
          return FALSE;
      }else{
          return TRUE;
      }   
  }

  // INSERT DATA USER
  public function insert_user($txtNamauser, $txtUsername, $txtEmail, $dtmInsertedDate, $txtInsertedBy, $intSubdept, $intJobtitle, $txtPassword, $txtGambar, $intRole, $dateNow){
    $insertArray = array(
      "intRoleID" => "$intRole",
      "intSubdept" => "$intSubdept",
      "intJobtitle" => "$intJobtitle",
      "txtUsername" => "$txtUsername",
      "txtPassword" => "$txtPassword",
      "txtNamauser" => "$txtNamauser",
      "txtEmail" => "$txtEmail",
      "txtGambar" => "$txtGambar",
      "txtInsertedBy" => "$txtInsertedBy",
      "dtmInsertedDate" => "$dtmInsertedDate",
      "bitActive" => "1",
      "dtmExpiredDate" => "$dateNow",
    );

    $this->db->insert('mdwms_user', $insertArray);
    if ($this->db->affected_rows() == 0) {
          return FALSE;
      }else{
          return TRUE;
      } 
  }

  // get data user dari intUserID
  public function get_user($intUserID){
    $this->db->select('mdwms_user.bitActive, mdwms_user.txtUsername, mdwms_user.txtGambar, mdwms_user.txtNamauser, mdwms_user.txtEmail, mdwms_user.intUserID, mdwms_subdept.txtSubdept, mdwms_jobtitle.txtJobtitle, mdwms_role.txtRole_Acces, mdwms_user.intRoleID, mdwms_role.txtRole_Acces, mdwms_user.intSubdept, mdwms_user.intJobtitle, mdwms_subdept.txtSubdept, mdwms_jobtitle.txtJobtitle, mdwms_user.txtPassword, mdwms_user.dtmExpiredDate');
    $this->db->from('mdwms_user');
    $this->db->join('mdwms_subdept', 'mdwms_user.intSubdept = mdwms_subdept.intSubdeptID');
    $this->db->join('mdwms_jobtitle', 'mdwms_user.intJobtitle = mdwms_jobtitle.intJobtitleID');
    $this->db->join('mdwms_role', 'mdwms_user.intRoleID = mdwms_role.intRole');
    $this->db->where('intUserID', $intUserID);

    return $this->db->get();
  }

  // UPDATE DATA USER
  public function update_user($intUserID, $txtUsername, $txtNamauser, $txtEmail, $intSubdept, $bitActive, $dtmUpdatedDate, $txtUpdatedBy, $txtPassword, $intJobtitle, $intRoleID, $txtGambar, $dateNow){
    $updateArray = array(
      "intRoleID" => "$intRoleID",
      "intSubdept" => "$intSubdept",
      "intJobtitle" => "$intJobtitle",
      "txtUsername" => "$txtUsername",
      "txtPassword" => "$txtPassword",
      "txtNamauser" => "$txtNamauser",
      "txtEmail" => "$txtEmail",
      "txtGambar" => "$txtGambar",
      "bitActive" => "$bitActive",
      "txtUpdatedBy" => "$txtUpdatedBy",
      "dtmUpdatedDate" => "$dtmUpdatedDate",
      "dtmExpiredDate" => "$dateNow",
    );

    $this->db->where('intUserID', $intUserID);
    $this->db->update('mdwms_user', $updateArray);
    if ($this->db->affected_rows() == 0) {
          return FALSE;
      }else{
          return TRUE;
      } 
  }

  // INSERT TEAM
  public function insert_team($txtNamateam, $txtEmailteam, $dtmInsertedDate, $txtInsertedBy, $txtJobteam, $txtDivisiteam, $txtGambarteam, $txtHPteam){
    $insertArray = array(
      "txtNamateam" => "$txtNamateam",
      "txtJobteam" => "$txtJobteam",
      "txtDivisiteam" => "$txtDivisiteam",
      "txtHPteam" => "$txtHPteam",
      "txtEmailteam" => "$txtEmailteam",
      "dtmInsertedDate" => "$dtmInsertedDate",
      "txtInsertedBy" => "$txtInsertedBy",
      "txtGambarteam" => "$txtGambarteam",
    );

    $this->db->insert('mdwms_team', $insertArray);
    if($this->db->affected_rows() == 0){
      return FALSE;
    }else{
      return TRUE;
    }
  }

  // GET data team dari intTeamID
  public function get_team($intTeamID){
    $this->db->select('*');
    $this->db->from('mdwms_team');
    $this->db->where('intTeamID', $intTeamID);

    return $this->db->get();
  }

  // UPDATE TEAM
  public function update_team($intTeamID, $txtNamateam, $txtJobteam, $txtEmailteam, $txtHPteam, $bitActiveTeam, $dtmUpdatedDate, $txtUpdatedBy, $txtDivisiteam, $txtGambarteam){
    $updateArray = array(
      "txtNamateam" => "$txtNamateam",
      "txtJobteam" => "$txtJobteam",
      "txtDivisiteam" => "$txtDivisiteam",
      "txtEmailteam" => "$txtEmailteam",
      "txtHPteam" => "$txtHPteam",
      "bitActiveTeam" => "$bitActiveTeam",
      "dtmUpdatedDate" => "$dtmUpdatedDate",
      "txtUpdatedBy" => "$txtUpdatedBy",
      "txtGambarteam" => "$txtGambarteam",
    );

    $this->db->where('intTeamID', $intTeamID);
    $this->db->update('mdwms_team', $updateArray);
    if($this->db->affected_rows() == 0){
      return FALSE;
    }else{
      return TRUE;
    }
  }

}