<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Useracces_model');
		$this->load->model('Admin');
	}

	public function index()
	{
	    // Redirect('http://10.175.11.70:81/d-wms/auth');
		$this->checktoken();
		$this->load->view('auth/login');
		//if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
	    //redirect('page/home'); // Redirect ke page mainview
	    // function render_login tersebut dari file core/MY_Controller.php
	    //$this->render_login('login'); // Load view login.php
	}

	public function message($title = NULL,$text = NULL,$type = NULL)
	{
		return $this->session->set_flashdata([
			'title'	=> $title,
			'text'	=> $text,
			'type'	=> $type
		]);
	}

	public function checktoken()
	{
		if ($this->session->userdata('backtoken')) {
			if ($this->Admin->checktoken($this->session->userdata('backtoken'))) {
				redirect('page/home');
			} else {
				$this->session->unset_userdata('backtoken');
				redirect('auth/logout');
			}
		}
	}

	public function login()
	{
		$data = $this->input->post();
		if ($this->input->post()) {
			$dataAdmin =$this->Admin->getAdminByUsername($data['txtUsername']);
			$d = date('Y-m-d');
			$date = new DateTime($d);
			$exp = new DateTime($dataAdmin->dtmExpiredDate);
			if ($dataAdmin) {
				if (md5($data['txtPassword']) == $dataAdmin->txtPassword) {
					if($dataAdmin->bitActive == 1){
						if($date <= $exp){
							$sess_ = array(
									'fullname'	=> $dataAdmin->txtNamauser,
									'gambar'	=> $dataAdmin->txtGambar,
									'expired_date'	=> $dataAdmin->dtmExpiredDate,
									'txtJobtitle'=> $dataAdmin->txtJobtitle,
									'user_name'	=> $dataAdmin->txtUsername,
									'role'		=> $dataAdmin->intRoleID,
									'user_id'	=> $dataAdmin->intUserID,
									'backtoken'	=> crypt($dataAdmin->txtNamauser,''),
								);
							$this->session->set_userdata( $sess_ );
							$this->Admin->registtoken($fortoken = ['access_token' => $sess_['backtoken']]);
							$this->message('Selamat Datang ','Semoga hari anda menyenangkan','succes');
			        		redirect('page/home');
						}else{
							echo "
				            <script src='". base_url('assets/')."js/jquery-3.1.1.min.js'></script>
				            <script src='". base_url('assets/')."js/popper.min.js'></script>
				            <script src='". base_url('assets/')."js/bootstrap.js'></script>
				            <script src='". base_url('assets/')."js/plugins/metisMenu/jquery.metisMenu.js'></script>
				            <script src='". base_url('assets/')."js/plugins/slimscroll/jquery.slimscroll.min.js'></script>

				            <script>
				              var a = prompt('Your password is expired, you have to enter your new password first !');

				              var password = a;
				              var validasi_2 = '';
				              var validasi_3 = '';
				              var validasi_4 = '';

				              var password_array = a.split('');

				              function inArray(needle,haystack)
				              {
				                  var count=haystack.length;
				                  for(var i=0;i<count;i++)
				                  {
				                      if(haystack[i]===needle){return true;}
				                  }
				                  return false;
				              }

				              for (let i = 0; i < password_array.length; i++) {
				                  if (password_array[i] == password_array[i].toUpperCase() && isNaN(password_array[i] * 1)  ){
				                      validasi_2= '1';
				                  }
				                  else if (password_array[i] == password_array[i].toLowerCase()&& isNaN(password_array[i] * 1) ){
				                      validasi_3= '1';
				                  }
				                  else if (!isNaN(password_array[i] * 1) ){
				                      validasi_4= '1';
				                  }
				              }

				              if(validasi_2 == '1'  && validasi_3 == '1'  && validasi_4 == '1' ){
				                var txtPassword = a;
				                var txtUsername = '".$data['txtUsername']."';
				                  $.ajax({
				                  type : 'post',
				                  url : '".base_url('Auth/changePassword')."',
				                  data : {txtPassword : txtPassword, txtUsername : txtUsername},
				                  success : function(data){     
				                      alert('Password berhasil dirubah, silagkan login kembali !');
				                        window.location.href = '".base_url('auth')."';      
				                    }
				                  })
				              }else{
				                  alert('Your new password has to use Uppercase, Lowercase and Number');
				                  window.location.href = '".base_url('auth')."';
				              }
				            </script>";die();
						}
					}else{
						$this->message('Ooppsss','Akun ini sudah tidak aktif','error');
					}
					//$secret = '6Ld1hMYZAAAAANN4BeUBQInxxVaI3noaKmcuX1sl';
					//$verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
    				//$response = json_decode($verify);
    				//if ($response->success){
					
	        		//} else {
	        			//$this->message('Ooppsss','Google reCAPTCHA verification failed. please try again','error');
	        		//}
				} else {
					$this->message('Ooppsss','Username dan Password tidak sesuai, silahkan coba lagi','error');
				}
			} else {
				$this->message('Ooppsss','Username tidak terdaftar, silahkan coba Username lain','error');
			}
		}
		redirect('Auth');
	}

	public function changePassword(){
	    $txtPassword = md5($this->input->post('txtPassword'));
	    $txtUsername = $this->input->post('txtUsername');
	    $date = date('Y-m-d');
	    $dateNow = date('Y-m-d', strtotime('+90 days', strtotime($date)));
	    $this->load->model('Admin');
	    $query = $this->Admin->changePassword($txtPassword, $txtUsername, $dateNow);

	    return $query;
	  }

	public function not_found()
	{
		echo "Page not found";
	}

	public function login1()
	{
		$txtusername = $this->input->post('txtUsername');
		$txtpassword = MD5($this->input->post('txtPassword'));

		$user = $this->Useracces_model->check_login('mdwms_user', array('txtUsername' => $txtusername), array('txtPassword' => $txtpassword)); // Panggil fungsi get yang ada di UseraccesModel.php

		if (empty($user)) {
			$this->session->set_flashdata('message', 'Username tidak ditemukan'); // Buat session flashdata# code...
			redirect('auth'); // Redirect ke halaman login

		}else{
			if($user == true){ // Jika password yang diinput sama dengan password yang didatabase
				foreach ($user as $apps) {

	        	$session = array(
		          'authenticated'	=>true, // Buat session authenticated dengan value true
		          'user_id' 		=> $apps->intUserID,
		          'role'    		=> $apps->intRoleID,
		          'user_name'		=> $apps->txtUsername,  // Buat session username
		          'nama'			=> $apps->txtNamauser, // Buat session nama
		          'role'			=> $apps->intRoleID // Buat session role
	        	);
	        	$this->session->set_userdata($session); // Buat session sesuai $session
	        	$this->message('Selamat Datang '.$apps->txtNamauser.'!','Semoga hari anda menyenangkan','succes');
	        	redirect('page/home'); // Redirect ke halaman mainview
	        	}
        	} else {
	        	$this->session->set_flashdata('message', 'Password salah'); // Buat session flashdata
	        	redirect('auth'); // Redirect ke halaman login
        	}
		}
	}

	public function logout()
	{
		$this->Admin->deletetoken($this->session->userdata('backtoken'));
		$this->session->unset_userdata('backtoken');
		$this->message('Logout berhasil!','Silahkan kembali untuk melanjutkan','success');
		redirect('Auth'); // Redirect ke halaman login
	}

    /////////////////////fungsi chat//////////////////////////
    public function simpan_chat(){
		date_default_timezone_get('Asia/Jakarta');
    	$data = array('intUserID_pengirim'	=> $this->session->userdata('user_id'),
    				  'txtChat'			 	=> $this->input->post('isi'),
    				  'dtmChatdate'			=> date('Y-m-d H:i:sa'),
    				 );
    	$chat=$this->db->insert('trmdwms_chat',$data);
        echo json_encode($chat);
    }

    public function get_chat(){
	    $data=$this->Admin->get_chat()->result_array();
	        echo json_encode($data);
    }

    /////////////////////Front End//////////////////////////
    public function frontend()
    {
    	if ($this->input->post()) {
			$data = $this->input->post();
			$operator =$this->Admin->getOperatorByNik($data['txtNik']);
			if ($operator) {
				if (md5($data['txtPasswordkaryawan']) == $operator->txtPasswordkaryawan) {
					$sess_ = array(
									'global_operator'	=> $operator,
									'user_name'			=> $operator->txtNamakaryawan,
									'subdept'			=> $operator->intSubdeptID,
									'jobtitle'			=> $operator->intJobtitleID,
									'frontend_token'	=> crypt($operator->txtPasswordkaryawan,''),
								);
					$this->session->set_userdata( $sess_ );
					//$this->Admin->registtoken($fortoken = ['access_token' => $sess_['backtoken']]);
					$this->message('Selamat Datang ','Semoga hari anda menyenangkan','succes');
	        		redirect('frontend/datatable_unloading');
				} else {
					$this->message('Ooppsss','Username dan Password tidak sesuai, silahkan coba lagi','error');
					redirect('frontend/datatable_unloading');
				}
			} else {
				$this->message('Ooppsss','Username tidak terdaftar, silahkan coba Username lain','error');
				redirect('Auth/frontend');
			}
		} else {
			if ($this->session->userdata('frontend_token') AND $this->session->userdata('global_operator')) {
				redirect('frontend');
			}
			$this->load->view('auth/loginfrontend');
		}
		
    }

    // UPDATE PASSWORD
    public function update_password(){
    	$intUserID = $this->input->post('intUserID');
    	$password = md5($this->input->post('password'));
		$dateNow = date('Y-m-d', strtotime('+90 days', strtotime($this->input->post('dateNow'))));
		$txtUpdatedBy = $this->session->userdata('fullname');
		$dtmUpdatedDate = $this->input->post('dateNow');

		$query = $this->Admin->update_password($intUserID, $password, $dateNow, $txtUpdatedBy, $dtmUpdatedDate);
		echo json_encode($query);
    }


}
?>