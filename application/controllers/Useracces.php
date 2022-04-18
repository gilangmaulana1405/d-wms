<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Useracces extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Useracces_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
	    redirect('page/home'); // Redirect ke page mainview
	    // function render_login tersebut dari file core/MY_Controller.php
	    $this->render_useracces('useracces');

	}

	public function data_user()
	{
		$data=$this->Useracces_model->data_list();
        echo json_encode($data);
	}

	public function get_user()
	{
		$intUserID=$this->input->post('intUserID');
        $data=$this->Useracces_model->get_user_by_id($intUserID);
        echo json_encode($data);	
	}

	function simpan_user2()
	{
		$this->form_validation->set_rules('intRoleID', 'Role', 'required');
		$this->form_validation->set_rules('txtUsername', 'Username', 'required|min_length[5]');
		$this->form_validation->set_rules('txtPassword', 'Password', 'required|min_length[3]');
		$this->form_validation->set_rules('txtCpassword', 'Confirm Password', 'required');
		$this->form_validation->set_rules('txtNamauser', 'Full Name', 'required');
		$this->form_validation->set_rules('txtEmail', 'Email', 'required');
		$this->form_validation->set_rules('bitActive', 'Aktif', 'required');

		$this->form_validation->set_message('required', 'harus ada datanya');
		$this->form_validation->set_message('min_length', 'Datanya Kurang');
		$this->form_validation->set_message('matches', 'Password Berbeda');
		if($this->form_validation->run() == FALSE){		
			echo "gagal";
			echo validation_errors(); 
//        	echo "<script> alert('Terjadi Kesalahan Pada Aplikasi !!'); </script>";
//            echo "<script>window.location='".site_url('Page/useracces')."'; </script>";
		}else{
		$data = array('intRoleID' 		=> $this->input->post('intRoleID'),
					  'txtUsername'		=> $this->input->post('txtUsername'),
					  'txtPassword'		=> md5($this->input->post('txtPassword')),
					  'txtNamauser'		=> $this->input->post('txtNamauser'),
					  'txtEmail'		=> $this->input->post('txtEmail'),
					  'bitActive'		=> $this->input->post('bitActive'),
					  'txtInsertedBy'	=> $this->session->userdata('fullname'),
					  'dtmInsertedDate'	=> date('Y-m-d h:i:sa') 
					 );
//			exit(var_dump($data));
	      $simpan=$this->db->insert('mdwms_user',$data);
	      echo json_encode($simpan);
		/*
			$simpan = $this->db->insert('mdwms_user',$data);
			if ($simpan) {
	        	echo "<script> alert('Proses Penyimpanan Berhasil !!'); </script>";
	            echo "<script>window.location='".site_url('Page/useracces')."'; </script>";
			}else{
	        	echo "<script> alert('Terjadi Kesalahan Pada Proses Penyimpanan !!'); </script>";
	            echo "<script>window.location='".site_url('Page/useracces')."'; </script>";
			}
		*/
		}
	}

	function update_user2()
	{
		$this->form_validation->set_rules('intRoleID', 'Role', 'required');
		$this->form_validation->set_rules('txtUsername', 'Username', 'required|min_length[5]');
		$this->form_validation->set_rules('txtPassword', 'Password', 'required|min_length[3]');
		$this->form_validation->set_rules('txtCpassword', 'Confirm Password', 'required');
		$this->form_validation->set_rules('txtNamauser', 'Full Name', 'required');
		$this->form_validation->set_rules('txtEmail', 'Email', 'required');
		$this->form_validation->set_rules('bitActive', 'Aktif', 'required');

		$this->form_validation->set_message('required', 'harus ada datanya');
		$this->form_validation->set_message('min_length', 'Datanya Kurang');
		$this->form_validation->set_message('matches', 'Password Berbeda');

		if($this->form_validation->run() == FALSE){		
			echo "gagal";
			echo validation_errors(); 
//        	echo "<script> alert('Terjadi Kesalahan Pada Aplikasi !!'); </script>";
//          echo "<script>window.location='".site_url('Page/useracces')."'; </script>";
//          die();
		}else{
		$data = array('intUserID' 		=> $this->input->post('id_edit'),
					  'intRoleID' 		=> $this->input->post('intRoleID'),
					  'txtUsername'		=> $this->input->post('txtUsername'),
					  'txtPassword'		=> md5($this->input->post('txtPassword')),
					  'txtNamauser'		=> $this->input->post('txtNamauser'),
					  'txtEmail'		=> $this->input->post('txtEmail'),
					  'bitActive'		=> $this->input->post('bitActive'),
					  'txtUpdatedBy'	=> $this->session->userdata('user_name'),
					  'dtmUpdatedDate'	=> date('Y-m-d h:i:sa')
					 );
//exit(var_dump($_POST));
					$this->db->where('intUserID',$data['intUserID']);
			$ubah = $this->db->update('mdwms_user',$data);
		    echo json_encode($ubah);
/*
			if ($ubah) {
	        	echo "<script> alert('Proses Penyimpanan Berhasil !!'); </script>";
	            echo "<script>window.location='".site_url('Page/useracces')."'; </script>";
			}else{
	        	echo "<script> alert('Terjadi Kesalahan Pada Proses Penyimpanan !!'); </script>";
	            echo "<script>window.location='".site_url('Page/useracces')."'; </script>";
			}
*/
		}
	}

	public function delete_user()
	{
		$userID=$this->input->post('userID');
        $data=$this->Useracces_model->hapus_user($userID);
        echo json_encode($data);
	}


	///////////////////Versi Lama////////////////////

	public function simpan_user()
	{
/*
		$this->form_validation->set_rules('role','Role','required|numeric|max_lenght[1]');
		$this->form_validation->set_rules('username','Username','required|max_lenght[50]');
		$this->form_validation->set_rules('password','Password','trim|required|matches[cpassword]');
		$this->form_validation->set_rules('cpassword','Confirm Password','trim|required');
		$this->form_validation->set_rules('namauser','Full Name','required|min_lenght[4]|max_lenght[50]');
		$this->form_validation->set_rules('bitactive', 'Aktif', 'required');
*/
		$this->form_validation->set_rules('role', 'Role', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required');
		$this->form_validation->set_rules('namauser', 'Full Name', 'required');
		$this->form_validation->set_rules('bitactive', 'Aktif', 'required');
        if ($this->form_validation->run() == TRUE) {
			$role=$this->input->post('role');
	        $username=$this->input->post('username');
	        $password=password_hash($this->input->post('password'),PASSWORD_DEFAULT);
	        $namauser=$this->input->post('namauser');
	        $email=$this->input->post('email');
	        $bitactive=$this->input->post('bitactive');
	        $insertedby=$this->session->userdata('user_name');
	        $inserteddate=date("Y-m-d h:i:sa");
	        $data=$this->Useracces_model->simpan_user($role,$username,$password,$namauser,$email,$bitactive,$insertedby,$inserteddate);
//	        exit(var_dump($data));
	        echo json_encode($data);
	    } else {
	    	echo "gagal";
	    	redirect('page/useracces');
	    }
	}

	public function update_user()
	{
		$this->form_validation->set_rules('role','Role','required|numeric|max_lenght[1]');
		$this->form_validation->set_rules('username','Username','required|max_lenght[50]');
		$this->form_validation->set_rules('password','Password','trim|required|matches[cpassword]');
		$this->form_validation->set_rules('namauser','Namauser','required|min_lenght[4]|max_lenght[50]');
		$this->form_validation->set_rules('bitactive', 'User Active', 'required');
		if ($this->form_validation->run() == TRUE) {

			$role=$this->input->post('role');
	        $username=$this->input->post('username');
	        $password=$this->input->post('password');
	        $namauser=$this->input->post('namauser');
	        $email=$this->input->post('email');
	        $bitactive=$this->input->post('bitactive');
	        $updatedby=$this->session->userdata('user_name');
	        $updateddate=date("Y-m-d h:i:sa");
	        $data=$this->Useracces_model->update_user($role,$username,$password,$namauser,$email,$bitactive,$updatedby,$updateddate);
	        echo json_encode($data);
	    } else {
	    	redirect('page/useracces');
	    }    
	}

	public function hapus_user()
	{
		$role=$this->input->post('role');
        $data=$this->Useracces_model->hapus_user($role);
        echo json_encode($data);
	}
}
?>