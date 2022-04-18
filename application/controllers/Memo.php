<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memo extends MY_Controller
{
	private $filename = "import_data";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Memo_model');
	}

	public function index()
	{
		if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
	    redirect('page/home'); // Redirect ke page 
	    // function render_login tersebut dari file core/MY_Controller.php
	    $this->render_data_memo('data_memo');
	}

	public function form()
	{
		$data = array();
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
	      $upload = $this->Memo_model->upload_file($this->filename);
	      
	      if($upload['result'] == "success"){ // Jika proses upload sukses
	        // Load plugin PHPExcel nya
	        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	        
	        $excelreader = new PHPExcel_Reader_Excel2007();
	        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
	        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	        
	        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
	        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
	        $data['sheet'] = $sheet; 
	      }else{ // Jika proses upload gagal
	        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
	      }
	    }

    	$this->render_form('form', $data);
    	
	}

	public function form_coa()
	{
		$data = array();
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
	      $upload = $this->Memo_model->upload_file($this->filename);
	      
	      if($upload['result'] == "success"){ // Jika proses upload sukses
	        // Load plugin PHPExcel nya
	        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	        
	        $excelreader = new PHPExcel_Reader_Excel2007();
	        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
	        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	        
	        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
	        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
	        $data['sheet'] = $sheet; 
	      }else{ // Jika proses upload gagal
	        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
	      }
	    }

    	$this->render_form_coa('form_coa', $data);
    	
	}

	public function form_logbook()
	{
		$data = array();
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
	      $upload = $this->Memo_model->upload_file($this->filename);
	      
	      if($upload['result'] == "success"){ // Jika proses upload sukses
	        // Load plugin PHPExcel nya
	        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	        
	        $excelreader = new PHPExcel_Reader_Excel2007();
	        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
	        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	        
	        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
	        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
	        $data['sheet'] = $sheet; 
	      }else{ // Jika proses upload gagal
	        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
	      }
	    }

    	$this->render_form_logbook('form_logbook', $data);
    	
	}

	public function form_unloading()
	{
		$data = array();
		if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
	      $upload = $this->Memo_model->upload_file_unloading($this->filename);
	      
	      if($upload['result'] == "success"){ // Jika proses upload sukses
	        // Load plugin PHPExcel nya
	        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	        
	        $excelreader = new PHPExcel_Reader_Excel2007();
	        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
	        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	        
	        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
	        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
	        $data['sheet'] = $sheet; 
	      }else{ // Jika proses upload gagal
	        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
	      }
	    }

    	$this->render_form_unloading('form_unloading', $data);
    	
	}

	public function import()
	{
	    // Load plugin PHPExcel nya
	    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	    
	    $excelreader = new PHPExcel_Reader_Excel2007();
	    $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
	    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	    
	    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
	    $data = array();
	    
	    $numrow = 1;
	    foreach($sheet as $row){
	      // Cek $numrow apakah lebih dari 1
	      // Artinya karena baris pertama adalah nama-nama kolom
	      // Jadi dilewat saja, tidak usah diimport
	      if($numrow > 1){
	        // Kita push (add) array data ke variabel data
	        array_push($data, array(
	          'txtOts'				=>$row['A'], // Insert data nis dari kolom A di excel
	          'intSo'				=>$row['B'], // Insert data nama dari kolom B di excel
	          'txtSubinv'			=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
	          'txtItemcode'			=>$row['D'], // Insert data alamat dari kolom D di excel
	          'txtDesc'				=>$row['E'],
	          'intQty'				=>$row['F'],
	          'txtUom'				=>$row['G'],
	          'dtmEtd'				=>date('Y-m-d',strtotime($row['H'])),
	          'dtmEta'				=>date('Y-m-d',strtotime($row['I'])),
	          'intPO'				=>$row['J'],
	          'txtKet'				=>$row['K'],
	          'txtInsertedby'		=>$this->session->userdata("fullname"),
	          'dtmInserted'			=>date("Y-m-d h:i:sa"),
	          'bitOpen'				=>0,
	          'bitClose'			=>1,
	          'bitActive'			=>1,

	        ));
	      }
	      
	      $numrow++; // Tambah 1 setiap kali looping
	    }
//        exit(var_dump($data));
	    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
	    $this->Memo_model->insert_multiple($data);
	    
	    redirect("Memo"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}

	public function importcoa()
	{
	    // Load plugin PHPExcel nya
	    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	    
	    $excelreader = new PHPExcel_Reader_Excel2007();
	    $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
	    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	    //$kode = $this->Memo_model->kode_qan();

	    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
	    $data = array();
	    
	    $numrow = 1;
	    foreach($sheet as $row){
	      // Cek $numrow apakah lebih dari 1
	      // Artinya karena baris pertama adalah nama-nama kolom
	      // Jadi dilewat saja, tidak usah diimport
	      if($numrow > 1){
	        // Kita push (add) array data ke variabel data
	        array_push($data, array(
	          'txtKmicode'				=>"KRM2", // Insert data nis dari kolom A di excel
	          'txtItemshp'				=>$row['A'], // Insert data nama dari kolom B di excel
	          'txtItemcode'				=>"KRM2"."-".$row['A'], // Insert data jenis kelamin dari kolom C di excel
	          'txtItemdescription'		=>$row['B'], // Insert data alamat dari kolom D di excel
	          //'txtLotnumber'			=>$kode,
	          'dtmExpireddate'			=>date('Y-m-d',strtotime($row['D'])),
	          'txtSupplier_lotnumber'	=>$row['C']."-".$row['E'],
	          'txtLotshp'				=>$row['C'],
	          'txtLotsupplier'			=>$row['E'],
	          'txtIncominglot'			=>$row['F'],
	          'txtSampleno'				=>$row['G'],
	          'bitOpen'					=>1,
	          'bitProgress'				=>0,
	          'bitClose'				=>0,
	          'bitHold'					=>0,
	          'bitActive'				=>1,
	          'txtInsertedby'			=>$this->session->userdata("fullname"),
	          'dtmInserted'				=>date("Y-m-d h:i:sa"),

	        ));
	      }
	      
	      $numrow++; // Tambah 1 setiap kali looping
	    }
//        exit(var_dump($data));
	    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
	    $this->Memo_model->insert_coa($data);
	    
	    redirect("page/coa"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}

	public function importlogbook()
	{
	    // Load plugin PHPExcel nya
	    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	    
	    $excelreader = new PHPExcel_Reader_Excel2007();
	    $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
	    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	    //$kode = $this->Memo_model->kode_qan();

	    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
	    $data = array();
	    
	    $numrow = 1;
	    foreach($sheet as $row){
	      // Cek $numrow apakah lebih dari 1
	      // Artinya karena baris pertama adalah nama-nama kolom
	      // Jadi dilewat saja, tidak usah diimport
	      if($numrow > 1){
	        // Kita push (add) array data ke variabel data
	        array_push($data, array(
	          'intTag'					=>$row['A'],
	          'txtKmicode'				=>"KRM2", // Insert data nis dari kolom A di excel
	          'txtItemshp'				=>$row['B'], // Insert data nama dari kolom B di excel
	          'txtItemcode'				=>$row['B'], // Insert data jenis kelamin dari kolom C di excel
	          'txtItemdescription'		=>$row['C'], // Insert data alamat dari kolom D di excel
	          'txtLotnumber'			=>$row['E'],
	          'dtmExpireddate'			=>date('Y-m-d',strtotime($row['F'])),
	          'txtSupplier_lotnumber'	=>$row['D'],
	          'txtLotshp'				=>$row['D'],
	          'txtLotsupplier'			=>$row['D'],
	          'txtSampleno'				=>$row['G'],
	          'bitOpen'					=>0,
	          'bitProgress'				=>1,
	          'bitClose'				=>0,
	          'bitHold'					=>0,
	          'bitActive'				=>1,
	          'txtInsertedby'			=>$this->session->userdata("fullname"),
	          'dtmInserted'				=>date("Y-m-d h:i:sa"),

	        ));
	      }
	      
	      $numrow++; // Tambah 1 setiap kali looping
	    }
//        exit(var_dump($data));
	    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
	    $this->Memo_model->insert_coa($data);
	    
	    redirect("page/logbook_incoming"); // Redirect ke halaman awal 
	}

	public function import_unloading()
	{
	    // Load plugin PHPExcel nya
	    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	    
	    $excelreader = new PHPExcel_Reader_Excel2007();
	    $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
	    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	    
	    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
	    $data = array();
	    
	    $numrow = 1;
	    foreach($sheet as $row){
	      // Cek $numrow apakah lebih dari 1
	      // Artinya karena baris pertama adalah nama-nama kolom
	      // Jadi dilewat saja, tidak usah diimport
	      if($numrow > 1){
	        // Kita push (add) array data ke variabel data
	        array_push($data, array(
	          'txtActualBarcode'		   =>$row['A'], // Insert data nis dari kolom A di excel
	          'txtItemcode'				   =>$row['B'], // Insert data nama dari kolom B di excel
	          'txtDescription'			   =>$row['C'], // Insert data jenis kelamin dari kolom C di excel
	          'txtContain'				   =>$row['D'], // Insert data alamat dari kolom D di excel
	          'txtLotnumber'			   =>$row['E'],
	          'txtSupplier_lotnumber'	   =>$row['F'],
	          'dtmExpireddate'			   =>$row['G'],
	          'intPallet1'                 =>$row['H'],
              'intPallet2'                 =>$row['I'],
              'intPallet3'                 =>$row['J'],
              'intPallet4'                 =>$row['K'],
              'intPallet5'                 =>$row['L'],
              'intPallet6'                 =>$row['M'],
              'intPallet7'                 =>$row['N'],
              'intPallet8'                 =>$row['O'],
              'intPallet9'                 =>$row['P'],
              'intPallet10'                =>$row['Q'],
              'intPallet11'                =>$row['R'],
              'intPallet12'                =>$row['S'],
              'intPallet13'                =>$row['T'],
              'intPallet14'                =>$row['U'],
              'intPallet15'                =>$row['V'],
              'intPallet16'                =>$row['W'],
              'intPallet17'                =>$row['X'],
              'intPallet18'                =>$row['Y'],
              'intPallet19'                =>$row['Z'],
              'intPallet20'                =>$row['AA'],
              'intPallet21'                =>$row['AB'],
              'intPallet22'                =>$row['AC'],
              'intPallet23'                =>$row['AD'],
              'intPallet24'                =>$row['AE'],
              'intPallet25'                =>$row['AF'],
              'intPallet26'                =>$row['AG'],
              'intPallet27'                =>$row['AH'],
              'intPallet28'                =>$row['AI'],
              'intPallet29'                =>$row['AJ'],
              'intPallet30'                =>$row['AK'],
	          'intQtyactual'               =>$row['AL'],
              'txtUom'                     =>$row['AM'],
              'txtRemark'                  =>$row['AN'],
              'bitActive'                  =>$row['AO'],
              'bitHold'                    =>$row['AP'],
              'bitClose'                   =>$row['AQ'],
              'txtInsertedby'              =>$this->session->userdata("fullname"),
              'dtmInserted'                =>date("Y-m-d h:i:sa"),

	        ));
	      }
	      
	      $numrow++; // Tambah 1 setiap kali looping
	    }
//        exit(var_dump($data));
	    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
	    $this->Memo_model->insert_unloading($data);
	    
	    redirect("page/unloading_import"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	}

}
?>