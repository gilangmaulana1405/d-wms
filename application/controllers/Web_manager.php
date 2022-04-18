<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_manager extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Roleacces_model');
        
	}

	// insert role
	public function insert_role_access(){
		$intRole = $this->input->post('intRole');
		$txtRole_Acces = $this->input->post('txtRole_Acces');
		$dtmInsertedDate = $this->input->post('dtmInsertedDate');
		$txtInsertedBy = $this->session->userdata('fullname');

		$query = $this->Roleacces_model->insert_role_acces($txtRole_Acces, $dtmInsertedDate, $txtInsertedBy, $intRole);
		echo json_encode($query);
	}

	// get data role access dari intRoleID
	public function get_role_access(){
		$intRoleID = $this->input->post('intRoleID');

		$query = $this->Roleacces_model->get_role_access($intRoleID)->row_array();
		echo json_encode($query);
	}

	// update data role
	public function update_role_access(){
		$intRoleID = $this->input->post('intRoleID');
		$intRole = $this->input->post('intRole');
		$txtRole_Acces = $this->input->post('txtRole_Acces');
		$bitActive = $this->input->post('bitActive');
		$dtmUpdatedDate = $this->input->post('dtmUpdatedDate');
		$txtUpdatedBy = $this->session->userdata('fullname');

		$query = $this->Roleacces_model->update_role_access($intRole, $intRoleID, $txtRole_Acces, $bitActive, $dtmUpdatedDate, $txtUpdatedBy);
		echo json_encode($query);
	}








	// insert subdept
	public function insert_subdept(){
		$txtSubdept = $this->input->post('txtSubdept');
		$dtmInsertedDate = $this->input->post('dtmInsertedDate');
		$txtInsertedBy = $this->session->userdata('fullname');

		$query = $this->Roleacces_model->insert_subdept($txtSubdept, $dtmInsertedDate, $txtInsertedBy);
		echo json_encode($query);
	}

	// get data subdept dari intSubdeptID
	public function get_subdept(){
		$intSubdeptID = $this->input->post('intSubdeptID');

		$query = $this->Roleacces_model->get_subdept($intSubdeptID)->row_array();
		echo json_encode($query);
	}

	// update data subdept
	public function update_subdept(){
		$intSubdeptID = $this->input->post('intSubdeptID');
		$txtSubdept = $this->input->post('txtSubdept');
		$bitActive = $this->input->post('bitActive');
		$dtmUpdatedDate = $this->input->post('dtmUpdatedDate');
		$txtUpdatedBy = $this->session->userdata('fullname');

		$query = $this->Roleacces_model->update_subdept($intSubdeptID, $txtSubdept, $bitActive, $dtmUpdatedDate, $txtUpdatedBy);
		echo json_encode($query);
	}







	// insert job title
	public function insert_job_title(){
		$txtJobtitle = $this->input->post('txtJobtitle');
		$dtmInsertedDate = $this->input->post('dtmInsertedDate');
		$txtInsertedBy = $this->session->userdata('fullname');

		$query = $this->Roleacces_model->insert_job_title($txtJobtitle, $dtmInsertedDate, $txtInsertedBy);
		echo json_encode($query);
	}

	// get data job title dari intJobtitleID
	public function get_job_title(){
		$intJobtitleID = $this->input->post('intJobtitleID');

		$query = $this->Roleacces_model->get_job_title($intJobtitleID)->row_array();
		echo json_encode($query);
	}

	// update data job title
	public function update_job_title(){
		$intJobtitleID = $this->input->post('intJobtitleID');
		$txtJobtitle = $this->input->post('txtJobtitle');
		$bitActive = $this->input->post('bitActive');
		$dtmUpdatedDate = $this->input->post('dtmUpdatedDate');
		$txtUpdatedBy = $this->session->userdata('fullname');

		$query = $this->Roleacces_model->update_job_title($intJobtitleID, $txtJobtitle, $bitActive, $dtmUpdatedDate, $txtUpdatedBy);
		echo json_encode($query);
	}









	// insert allergen
	public function insert_allergen(){
		$txtItemcode = $this->input->post('txtItemcode');
		$txtItemdesc = $this->input->post('txtItemdesc');
		$bitGlutein = $this->input->post('bitGlutein');
		$bitEgg = $this->input->post('bitEgg');
		$bitSulfur = $this->input->post('bitSulfur');
		$bitTre = $this->input->post('bitTre');
		$bitMilk = $this->input->post('bitMilk');
		$bitSoya = $this->input->post('bitSoya');
		$bitFish = $this->input->post('bitFish');
		$bitPeanut = $this->input->post('bitPeanut');
		$bitAllergen = $this->input->post('bitAllergen');
		$dtmInsertedDate = $this->input->post('dtmInsertedDate');
		$txtInsertedBy = $this->session->userdata('fullname');

		$query = $this->Roleacces_model->insert_allergen($txtItemdesc, $txtItemcode, $dtmInsertedDate, $txtInsertedBy, $bitGlutein, $bitEgg, $bitFish, $bitPeanut, $bitSoya, $bitTre, $bitSulfur, $bitMilk, $bitAllergen);
		echo json_encode($query);
	}

	// get data allergen dari intAllergenID
	public function get_allergen(){
		$intAllergenID = $this->input->post('intAllergenID');

		$query = $this->Roleacces_model->get_allergen($intAllergenID)->row_array();
		echo json_encode($query);
	}

	// update data allergen
	public function update_allergen(){
		$intAllergenID = $this->input->post('intAllergenID');
		$txtItemcode = $this->input->post('txtItemcode');
		$txtItemdesc = $this->input->post('txtItemdesc');
		$bitGlutein = $this->input->post('bitGlutein');
		$bitEgg = $this->input->post('bitEgg');
		$bitSulfur = $this->input->post('bitSulfur');
		$bitTre = $this->input->post('bitTre');
		$bitMilk = $this->input->post('bitMilk');
		$bitSoya = $this->input->post('bitSoya');
		$bitFish = $this->input->post('bitFish');
		$bitPeanut = $this->input->post('bitPeanut');
		$bitAllergen = $this->input->post('bitAllergen');
		$bitActive = $this->input->post('bitActive');
		$dtmUpdatedDate = $this->input->post('dtmUpdatedDate');
		$txtUpdatedBy = $this->session->userdata('fullname');

		$query = $this->Roleacces_model->update_allergen($intAllergenID, $txtItemcode, $txtItemdesc, $bitAllergen, $bitActive, $dtmUpdatedDate, $txtUpdatedBy, $bitGlutein, $bitEgg, $bitFish, $bitPeanut, $bitSoya, $bitTre, $bitSulfur, $bitMilk);
		echo json_encode($query);
	}








	// insert employee
	public function insert_employee(){
		$txtNik = $this->input->post('txtNik');
		$txtNamakaryawan = $this->input->post('txtNamakaryawan');
		$txtEmailkaryawan = $this->input->post('txtEmailkaryawan');
		$txtPhonekaryawan = $this->input->post('txtPhonekaryawan');
		$intSubdept = $this->input->post('intSubdept');
		$sub = $this->Roleacces_model->get_subdept_by_id($intSubdept);
		$txtSubdept = $sub['txtSubdept'];
		$intJobtitle = $this->input->post('intJobtitle');
		$job = $this->Roleacces_model->get_jobtitle_by_id($intJobtitle);
		$txtJobtitle = $job['txtJobtitle'];
		$dtmInsertedDate = $this->input->post('dtmInsertedDate');
		$txtInsertedBy = $this->session->userdata('fullname');

		$query = $this->Roleacces_model->insert_employee($txtNamakaryawan, $txtNik, $txtEmailkaryawan, $dtmInsertedDate, $txtInsertedBy, $txtPhonekaryawan, $intSubdept, $intJobtitle, $txtSubdept, $txtJobtitle);
		echo json_encode($query);
	}

	// get data employee dari intKaryawanID
	public function get_employee(){
		$intKaryawanID = $this->input->post('intKaryawanID');

		$query = $this->Roleacces_model->get_employee($intKaryawanID)->row_array();
		echo json_encode($query);
	}

	// update data employee
	public function update_employee(){
		$intKaryawanID = $this->input->post('intKaryawanID');
		$txtNik = $this->input->post('txtNik');
		$txtNamakaryawan = $this->input->post('txtNamakaryawan');
		$txtEmailkaryawan = $this->input->post('txtEmailkaryawan');
		$txtPhonekaryawan = $this->input->post('txtPhonekaryawan');
		$intSubdept = $this->input->post('intSubdept');
		$sub = $this->Roleacces_model->get_subdept_by_id($intSubdept);
		$txtSubdept = $sub['txtSubdept'];
		$intJobtitle = $this->input->post('intJobtitle');
		$job = $this->Roleacces_model->get_jobtitle_by_id($intJobtitle);
		$txtJobtitle = $job['txtJobtitle'];
		$bitActive = $this->input->post('bitActive');
		$dtmUpdatedDate = $this->input->post('dtmUpdatedDate');
		$txtUpdatedBy = $this->session->userdata('fullname');

		$query = $this->Roleacces_model->update_employee($intKaryawanID, $txtNik, $txtNamakaryawan, $txtEmailkaryawan, $intSubdept, $bitActive, $dtmUpdatedDate, $txtUpdatedBy, $txtPhonekaryawan, $intJobtitle, $txtSubdept, $txtJobtitle);
		echo json_encode($query);
	}







	// insert user
	public function insert_user(){
		$txtUsername = $this->input->post('txtUsername');
		$txtNamauser = $this->input->post('txtNamauser');
		$txtEmail = $this->input->post('txtEmail');
		$pass = $this->input->post('txtPassword');
		$txtPassword = $this->encryPassword($pass);
		$txtGambar = $this->uploadGambar();
		$intSubdept = $this->input->post('intSubdept');
		$intJobtitle = $this->input->post('intJobtitle');
		$intRole = $this->input->post('intRole');
		$dtmInsertedDate = $this->input->post('dtmInsertedDate');
		$txtInsertedBy = $this->session->userdata('fullname');
		$dateNow = date('Y-m-d', strtotime('+90 days', strtotime($this->input->post('dtmInsertedDate'))));

		$query = $this->Roleacces_model->insert_user($txtNamauser, $txtUsername, $txtEmail, $dtmInsertedDate, $txtInsertedBy, $txtPassword, $intSubdept, $intJobtitle, $txtPassword, $txtGambar, $intRole, $dateNow);
		if($query == 'true'){
			$this->session->set_flashdata('message', 'true');
			redirect($this->input->post('feedBack'));
		}else{
			$this->session->set_flashdata('message', 'false');
			redirect($this->input->post('feedBack'));
		}
	}

	// ENCRYPSI PASSWORD
	public function encryPassword($pass){
		$password = md5($pass);
		return $password;
	}

	// UPLOAD GAMBAR PROFILE
	public function uploadGambar(){
		$txtGambar2 = $this->input->post('txtGambar2');

		$namaFile = $_FILES ['txtGambar']['name'];
		$ukuranFile = $_FILES['txtGambar']['size'];
		$error = $_FILES['txtGambar']['error'];
		$tmpName =$_FILES['txtGambar']['tmp_name'];

		if($error == 4){
			return $txtGambar2;
		}

		// cek pastikan yg di upload adalah gambar
		  $ekstensiGambarValid = ['jpg','jpeg','png','img'];
		  $ekstensiGambar = explode('.', $namaFile);
		  $ekstensiGambar= strtolower(end($ekstensiGambar));

		  if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
		    $feedBack = $this->input->post('feedBack');
		    $this->session->set_flashdata('message', 'false2');
		    redirect($feedBack);
		  }

		$uniq = uniqid();
		$namaFileBaru = $uniq.'.'.$ekstensiGambar;


		$path = './assets/img/profile/'.$namaFileBaru;
		move_uploaded_file($tmpName, $path);

		return $namaFileBaru;
	}

	// get data user dari intUserID
	public function get_user(){
		$intUserID = $this->input->post('intUserID');

		$query = $this->Roleacces_model->get_user($intUserID)->row_array();
		echo json_encode($query);
	}

	// update data user
	public function update_user(){
		$intUserID = $this->input->post('intUserID');
		$txtUsername = $this->input->post('txtUsername');
		$txtNamauser = $this->input->post('txtNamauser');
		$txtEmail = $this->input->post('txtEmail');
		$pass = $this->input->post('txtPassword');
		if($pass == NULL){
			$txtPassword = $this->input->post('txtPassword2');
			$dateNow = $this->input->post('dtmExpiredDate');
		}else{
			$txtPassword = $this->encryPassword($pass);
			$dateNow = date('Y-m-d', strtotime('+90 days', strtotime($this->input->post('dtmUpdatedDate'))));
		}
		$intSubdept = $this->input->post('intSubdept');
		$intJobtitle = $this->input->post('intJobtitle');
		$intRoleID = $this->input->post('intRoleID');
		$bitActive = $this->input->post('bitActive');
		$dtmUpdatedDate = $this->input->post('dtmUpdatedDate');
		$txtUpdatedBy = $this->session->userdata('fullname');
		$txtGambar = $this->uploadGambar();

		
		$query = $this->Roleacces_model->update_user($intUserID, $txtUsername, $txtNamauser, $txtEmail, $intSubdept, $bitActive, $dtmUpdatedDate, $txtUpdatedBy, $txtPassword, $intJobtitle, $intRoleID, $txtGambar, $dateNow);
		if($query == 'true'){
			$this->session->set_flashdata('message', 'true3');
			redirect($this->input->post('feedBack'));
		}else{
			$this->session->set_flashdata('message', 'false3');
			redirect($this->input->post('feedBack'));
		}
	}







	// insert team
	public function insert_team(){
		$txtNamateam = $this->input->post('txtNamateam');
		$txtJobteam = $this->input->post('txtJobteam');
		$txtEmailteam = $this->input->post('txtEmailteam');
		$txtDivisiteam = $this->input->post('txtDivisiteam');
		$txtGambarteam = $this->uploadGambar();
		$txtHPteam = $this->input->post('txtHPteam');
		$dtmInsertedDate = $this->input->post('dtmInsertedDate');
		$txtInsertedBy = $this->session->userdata('fullname');

		$query = $this->Roleacces_model->insert_team($txtNamateam, $txtEmailteam, $dtmInsertedDate, $txtInsertedBy, $txtJobteam, $txtDivisiteam, $txtGambarteam, $txtHPteam);
		if($query == 'true'){
			$this->session->set_flashdata('message', 'true');
			redirect($this->input->post('feedBack'));
		}else{
			$this->session->set_flashdata('message', 'false');
			redirect($this->input->post('feedBack'));
		}
	}

	// get data team dari intTeamID
	public function get_team(){
		$intTeamID = $this->input->post('intTeamID');

		$query = $this->Roleacces_model->get_team($intTeamID)->row_array();
		echo json_encode($query);
	}

	// update data team
	public function update_team(){
		$intTeamID = $this->input->post('intTeamID');
		$txtNamateam = $this->input->post('txtNamateam');
		$txtJobteam = $this->input->post('txtJobteam');
		$txtEmailteam = $this->input->post('txtEmailteam');
		$txtHPteam = $this->input->post('txtHPteam');
		$txtDivisiteam = $this->input->post('txtDivisiteam');
		$bitActiveTeam = $this->input->post('bitActiveTeam');
		$dtmUpdatedDate = $this->input->post('dtmUpdatedDate');
		$txtUpdatedBy = $this->session->userdata('fullname');
		$txtGambarteam = $this->uploadGambar();
		
		$query = $this->Roleacces_model->update_team($intTeamID, $txtNamateam, $txtJobteam, $txtEmailteam, $txtHPteam, $bitActiveTeam, $dtmUpdatedDate, $txtUpdatedBy, $txtDivisiteam, $txtGambarteam);
		if($query == 'true'){
			$this->session->set_flashdata('message', 'true3');
			redirect($this->input->post('feedBack'));
		}else{
			$this->session->set_flashdata('message', 'false3');
			redirect($this->input->post('feedBack'));
		}
	}













	// insert box RFID
	public function insert_box_rfid(){
		$txtNobox = $this->input->post('txtNobox');
		$intBoxID = '';
		$dataBox = $this->Roleacces_model->cekTxtNobox($txtNobox, $intBoxID); // cek apakah nomor box sudah digunakan atau belum
		if($dataBox == 0){
			$insertBox = $this->Roleacces_model->insertBox($txtNobox);
			echo $insertBox;
		}else{
			echo 'false2';
		}
	}

	//  get data Box RFID
	public function get_box(){
		$intBoxID = $this->input->post('intBoxID');
		$getBox = $this->Roleacces_model->get_box($intBoxID)->row_array();
		echo json_encode($getBox);
	}

	// input RFID Tag
	public function insert_rfid_tag(){
		$txtRfidbox = $this->input->post('txtRfidbox');
		$intBoxID = $this->input->post('intBoxID');
		$dataBox = $this->Roleacces_model->cekTxtRfidbox($txtRfidbox, $intBoxID); // cek apakah RFID sudah digunakan atau belum
		if($dataBox == 0){
			$insert_rfid_tag = $this->Roleacces_model->insert_rfid_tag($intBoxID, $txtRfidbox);
			if($insert_rfid_tag == 'true'){
				$this->session->set_flashdata('message', 'true');
				redirect($this->input->post('feedBack'));
			}else{
				$this->session->set_flashdata('message', 'false');
				redirect($this->input->post('feedBack'));
			}
		}else{
			$this->session->set_flashdata('message', 'false2');
				redirect($this->input->post('feedBack'));
		}
	}

	// update data BOX
	public function update_box_rfid(){
		$intBoxID = $this->input->post('intBoxID');
		$txtNobox = $this->input->post('txtNobox');
		$bitActive = $this->input->post('bitActive');
		$dataBox = $this->Roleacces_model->cekTxtNobox($txtNobox, $intBoxID); // cek apakah nomor box sudah digunakan atau belum
		if($dataBox == 0){
			$update_box_rfid = $this->Roleacces_model->update_box_rfid($intBoxID, $txtNobox, $bitActive);
			echo $update_box_rfid;
		}else{
			echo 'false2';
		}
	}









	// insert material PM
	public function insert_material(){
		$txtItemcode_pm = $this->input->post('txtItemcode_pm');
		$txtDescription_pm = $this->input->post('txtDescription_pm');
		$intQtyperpallet_pm = $this->input->post('intQtyperpallet_pm');
		$txtUom_pm = $this->input->post('txtUom_pm');
		$txtLotnumber_pm = $this->input->post('txtLotnumber_pm');
		$txtSupplier_name = $this->input->post('txtSupplier_name');
		$intMaterialID = '';

		$dataItemcode = $this->Roleacces_model->cekTxtItemcode($intMaterialID, $txtItemcode_pm); //cek Item code apakah sudah digunakan
		if($dataItemcode == 0){
			$insert_material = $this->Roleacces_model->insert_material($txtItemcode_pm, $txtDescription_pm, $intQtyperpallet_pm, $txtUom_pm, $txtLotnumber_pm, $txtSupplier_name);
			echo $insert_material;
		}else{
			echo 'false2';
		}
	}

	// get data material
	public function get_material(){
		$intMaterialID = $this->input->post('intMaterialID');
		$get_material = $this->Roleacces_model->get_material($intMaterialID)->row_array();
		echo json_encode($get_material);
	}

	// update material
	public function update_material(){
		$intMaterialID = $this->input->post('intMaterialID');
		$txtItemcode_pm = $this->input->post('txtItemcode_pm');
		$txtDescription_pm = $this->input->post('txtDescription_pm');
		$intQtyperpallet_pm = $this->input->post('intQtyperpallet_pm');
		$txtUom_pm = $this->input->post('txtUom_pm');
		$txtLotnumber_pm = $this->input->post('txtLotnumber_pm');
		$txtSupplier_name = $this->input->post('txtSupplier_name');
		$bitActive_pm = $this->input->post('bitActive_pm');

		$dataItemcode = $this->Roleacces_model->cekTxtItemcode($intMaterialID, $txtItemcode_pm); //cek Item code apakah sudah digunakan
		if($dataItemcode == 0){
			$update_material = $this->Roleacces_model->update_material($txtItemcode_pm, $txtDescription_pm, $intQtyperpallet_pm, $txtUom_pm, $txtLotnumber_pm, $txtSupplier_name, $intMaterialID, $bitActive_pm);
			echo $update_material;
		}else{
			echo 'false2';
		}
	}

	// INSERT FORKLIFT
	public function insert_forklift(){
		$txtArea = $this->input->post('txtArea');
		$txtIdentifikasi = $this->input->post('txtIdentifikasi');
		$txtVersionwh = $this->input->post('txtVersionwh');
		$txtVersioneng = $this->input->post('txtVersioneng');
		$txtMerk = $this->input->post('txtMerk');
		$txtModel = $this->input->post('txtModel');
		$txtSerialnumber = $this->input->post('txtSerialnumber');
		$intTahunpembuatan = $this->input->post('intTahunpembuatan');
		$intBattery = $this->input->post('intBattery');
		$intBasiccapacity = $this->input->post('intBasiccapacity');
		$dtmDeliverydate = $this->input->post('dtmDeliverydate');
		$txtPicforklift = $this->input->post('txtPicforklift');
		$txtGambar_forklift = $this->_uploadGambarForklift();

		$query = $this->Roleacces_model->insert_forklift($txtArea, $txtIdentifikasi, $txtVersioneng, $txtVersionwh, $txtMerk, $txtModel, $txtSerialnumber, $intTahunpembuatan, $intBattery, $intBasiccapacity, $dtmDeliverydate, $txtPicforklift, $txtGambar_forklift);
		if($query == 'true'){
			$this->session->set_flashdata('message', 'true');
			redirect($this->input->post('feedBack'));
		}else{
			$this->session->set_flashdata('message', 'false');
			redirect($this->input->post('feedBack'));
		}

	}

	// UPLOAD GAMBAR FORKLIFT
	private function _uploadGambarForklift(){
		$txtGambar_forklift2 = $this->input->post('txtGambar_forklift2');

		$namaFile = $_FILES ['txtGambar_forklift']['name'];
		$ukuranFile = $_FILES['txtGambar_forklift']['size'];
		$error = $_FILES['txtGambar_forklift']['error'];
		$tmpName =$_FILES['txtGambar_forklift']['tmp_name'];

		if($error == 4){
			return $txtGambar_forklift2;
		}

		// cek pastikan yg di upload adalah gambar
		  $ekstensiGambarValid = ['jpg','jpeg','png','img'];
		  $ekstensiGambar = explode('.', $namaFile);
		  $ekstensiGambar= strtolower(end($ekstensiGambar));

		  if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
		    $feedBack = $this->input->post('feedBack');
		    $this->session->set_flashdata('message', 'false2');
		    redirect($feedBack);
		  }

		$uniq = uniqid();
		$namaFileBaru = $uniq.'.'.$ekstensiGambar;


		$path = './assets/img/forklift/'.$namaFileBaru;
		move_uploaded_file($tmpName, $path);

		return $namaFileBaru;
	}

	public function get_forklift(){
		$intForkliftwhID = $this->input->post('intForkliftwhID');

		$query = $this->Roleacces_model->get_forklift($intForkliftwhID)->row_array();
		echo json_encode($query);
	}

	public function update_forklift(){
		$intForkliftwhID = $this->input->post('intForkliftwhID');
		$txtArea = $this->input->post('txtArea');
		$txtIdentifikasi = $this->input->post('txtIdentifikasi');
		$txtVersionwh = $this->input->post('txtVersionwh');
		$txtVersioneng = $this->input->post('txtVersioneng');
		$txtMerk = $this->input->post('txtMerk');
		$txtModel = $this->input->post('txtModel');
		$txtSerialnumber = $this->input->post('txtSerialnumber');
		$intTahunpembuatan = $this->input->post('intTahunpembuatan');
		$intBattery = $this->input->post('intBattery');
		$intBasiccapacity = $this->input->post('intBasiccapacity');
		$dtmDeliverydate = $this->input->post('dtmDeliverydate');
		$txtPicforklift = $this->input->post('txtPicforklift');
		$bitActive_forklift = $this->input->post('bitActive_forklift');
		$txtGambar_forklift = $this->_uploadGambarForklift();

		$query = $this->Roleacces_model->update_forklift($txtArea, $txtIdentifikasi, $txtVersioneng, $txtVersionwh, $txtMerk, $txtModel, $txtSerialnumber, $intTahunpembuatan, $intBattery, $intBasiccapacity, $dtmDeliverydate, $txtPicforklift, $txtGambar_forklift, $intForkliftwhID, $bitActive_forklift);
		if($query == 'true'){
			$this->session->set_flashdata('message', 'true3');
			redirect($this->input->post('feedBack'));
		}else{
			$this->session->set_flashdata('message', 'false3');
			redirect($this->input->post('feedBack'));
		}
	}

	// INSERT ITEM FORKLIFT
	public function insert_item_forklift(){
		$txtItempart = $this->input->post('txtItempart');
		$txtStandard = $this->input->post('txtStandard');
		$intTimemin = $this->input->post('intTimemin');
		$txtTools = $this->input->post('txtTools');
		$txtUnit = $this->input->post('txtUnit');
		$bitPm = $this->input->post('bitPm');
		$bitCb = $this->input->post('bitCb');
		$bitReach = $this->input->post('bitReach');
		$txtSymbol = implode ($this->input->post('txtSymbol'),',');
		$symbol = explode(',', $txtSymbol);
		if(in_array($symbol, 'CLEANING')){
			$bitCleaning = 1;
		}else{
			$bitCleaning = 0;
		}
		if(in_array($symbol, 'INSPECTION')){
			$bitInspection = 1;
		}else{
			$bitInspection = 0;
		}
		if(in_array($symbol, 'LUBRICATION')){
			$bitLubrication = 1;
		}else{
			$bitLubrication = 0;
		}

		$query = $this->Roleacces_model->insert_item_forklift($txtItempart, $txtStandard, $intTimemin, $txtTools, $txtUnit, $bitCleaning, $bitInspection, $bitLubrication, $bitPm, $bitReach, $bitCb);
		if($query == 'true'){
			$this->session->set_flashdata('message', 'true');
			redirect($this->input->post('feedBack'));
		}else{
			$this->session->set_flashdata('message', 'false');
			redirect($this->input->post('feedBack'));
		}
	}

	// GET DATA ITEM FORKLIFT
	public function get_item_forklift(){
		$intItemforkliftID = $this->input->post('intItemforkliftID');

		$query = $this->Roleacces_model->get_item_forklift($intItemforkliftID)->row_array();
		echo json_encode($query);
	}

	// UPDATE DATA ITEM FORKLIFT
	public function update_item_forklift(){
		$intItemforkliftID = $this->input->post('intItemforkliftID');
		$txtItempart = $this->input->post('txtItempart');
		$txtStandard = $this->input->post('txtStandard');
		$intTimemin = $this->input->post('intTimemin');
		$txtTools = $this->input->post('txtTools');
		$txtUnit = $this->input->post('txtUnit');
		$bitCleaning = $this->input->post('bitCleaning');
		$bitInspection = $this->input->post('bitInspection');
		$bitLubrication = $this->input->post('bitLubrication');
		$bitCb = $this->input->post('bitCb');
		$bitPm = $this->input->post('bitPm');
		$bitReach = $this->input->post('bitReach');
		$bitActive_item = $this->input->post('bitActive_item');

		$query = $this->Roleacces_model->update_item_forklift($txtItempart, $txtStandard, $intTimemin, $txtTools, $txtUnit, $intItemforkliftID, $bitActive_item, $bitCleaning, $bitInspection, $bitLubrication, $bitPm, $bitCb, $bitReach);
		if($query == 'true'){
			$this->session->set_flashdata('message', 'true3');
			redirect($this->input->post('feedBack'));
		}else{
			$this->session->set_flashdata('message', 'false3');
			redirect($this->input->post('feedBack'));
		}
	}

	// UPDATE SCAN BARCODE / QR
	public function update_barcode(){
		$intItemforkliftID = $this->input->post('intItemforkliftID');
		$txtBarcodeitem = $this->input->post('txtBarcodeitem');

		$query = $this->Roleacces_model->update_barcode($intItemforkliftID, $txtBarcodeitem);
		if($query == 'true'){
			$this->session->set_flashdata('message', 'true2');
			redirect($this->input->post('feedBack'));
		}else{
			$this->session->set_flashdata('message', 'false2');
			redirect($this->input->post('feedBack'));
		}
	}
}
?>