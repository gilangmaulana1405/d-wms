<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Useracces_model extends CI_Model
{	
	public function check_login($table, $field1, $field2)
	{
		//exit(var_dump($table, $field1, $field2));
		$this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
	}

	public function data_list()
	{
		$hasil=$this->db->query("SELECT * FROM mdwms_user");
        return $hasil->result();
	}

	public function simpan_user($role,$username,$password,$namauser,$email,$bitactive,$insertedby,$inserteddate)
	{
		$hasil=$this->db->query("INSERT INTO mdwms_user (intRoleID,txtUsername,txtPassword,txtNamauser,txtEmail,bitActive,txtInsertedBy,dtmInsertedDate)VALUES('$role','$username','$password','$namauser','$email','$bitactive','$insertedby','$inserteddate')");
        return $hasil;
	}

	public function get_user_by_id($UserID)
	{
		$hsl=$this->db->query("SELECT * FROM mdwms_user WHERE intUserID='$UserID'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                	'intUserID'			=> $data->intUserID,
                    'intRoleID' 		=> $data->intRoleID,
                    'txtUsername' 		=> $data->txtUsername,
                    'txtPassword' 		=> $data->txtPassword,
                    'txtNamauser' 		=> $data->txtNamauser,
                    'txtEmail' 			=> $data->txtEmail,
                    'bitActive'			=> $data->bitActive,
                    'txtInsertedBy' 	=> $data->txtInsertedBy,
                    'dtmInsertedDate' 	=> date('l,d-m-Y',strtotime($data->dtmInsertedDate)),
                    'txtUpdatedBy' 		=> $data->txtUpdatedBy,
                    'dtmUpdatedDate' 	=> date('l,d-m-Y',strtotime($data->dtmUpdatedDate)),
                    
                    );
            }
        }
        return $hasil;
	}

	public function get_user_by_role($role)
	{
		$hsl=$this->db->query("SELECT * FROM mdwms_user WHERE intRoleID='$role'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'intRoleID' 		=> $data->intRoleID,
                    'txtUsername' 		=> $data->txtUsername,
                    'txtPassword' 		=> $data->txtPassword,
                    'txtNamauser' 		=> $data->txtNamauser,
                    'txtEmail' 			=> $data->txtEmail,
                    'bitActive'			=> $data->bitActive,
                    'txtInsertedBy' 	=> $data->txtInsertedBy,
                    'dtmInsertedDate' 	=> date('l,d-m-Y',strtotime($data->dtmInsertedDate)),
                    'txtUpdatedBy' 		=> $data->txtUpdatedBy,
                    'dtmUpdatedDate' 	=> date('l,d-m-Y',strtotime($data->dtmUpdatedDate)),
                    
                    );
            }
        }
        return $hsl;
	}

	public function update_user($role,$username,$password,$namauser,$email,$bitactive,$updatedby,$updateddate)
	{
		$hasil=$this->db->query("UPDATE mdwms_user SET intRoleID='$role',txtUsername='$username',txtPassword='$password',txtNamauser='$namauser',txtEmail='$email',bitActive='$bitactive',txtUpdatedBy='$updatedby',dtmUpdatedDate='$updateddate'");
        return $hasil;
	}

	public function hapus_user($id)
	{
	    $this->db->where('intUserID', $id);
	    $this->db->delete('mdwms_user'); // Untuk mengeksekusi perintah delete data
	}

	public function view()
	{
		return $this->db->get('mdwms_user')->result(); 
	}
	
	public function validasi($mode)
	{
		$this->load->library('form_validation');
		if ($mode == "save") 
		{
			$this->form_validation->set_rules('input_role','Role','required|numeric|max_lenght[1]');
			$this->form_validation->set_rules('input_user','User','required|max_lenght[50]');
			$this->form_validation->set_rules('input_password','Password','trim|required|matches[cpassword]');
			$this->form_validation->set_rules('cpassword','Confirm Password','trim|required');
			$this->form_validation->set_rules('input_nama','Nama','required|min_lenght[4]|max_lenght[50]');
			$this->form_validation->set_rules('input_active', 'User Active', 'required');
			$this->form_validation->set_rules('input_inserted','Inserted By','required|max_lenght[50]');
		}
		if ($this->form_validation->run())	
			return true;
		else 
			return false;
	}

	public function save()
	{
		$data = array(
		"intRoleID"			=> $this->input->post('input_role'),
		"txtUsername"		=> $this->input->post('input_user'),
		"txtPassword"		=> password_hash($this->input->post('input_password'),PASSWORD_DEFAULT),
		"txtNamauser"		=> $this->input->post('input_nama'),
		"bitActive" 		=> $this->input->post('input_active'),
		"txtInsertedBy" 	=> $this->input->post('input_inserted'),
		"dtmInsertedDate" 	=> date('Y-m-d H:i:s'),
		);
		$this->db->insert('mdwms_user', $data);
	}

	public function edit($id)
	{
		$data = array(
		"intRoleID"			=> $this->input->post('input_role'),
		"txtUsername"		=> $this->input->post('input_user'),
		"txtPassword"		=> password_hash($this->input->post('input_password'),PASSWORD_DEFAULT),
		"txtNamauser"		=> $this->input->post('input_nama'),
		"bitActive" 		=> $this->input->post('input_active'),
		"txtUpdatedBy" 		=> $this->input->post('input_updated'),
		"dtmUpdatedDate" 	=> date('Y-m-d H:i:s'),
		);
		$this->db->where('intUserID', $id);
    	$this->db->update('mdwms_user', $data);
	}

	public function delete($id)
	{
		$this->db->where('intUserID', $id);
		$this->db->delete('mdwms_user', $data);
	}
	
}