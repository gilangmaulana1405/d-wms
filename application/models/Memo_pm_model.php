<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Memo_pm_model extends CI_Model
{
	
	public function view()
	{
		$this->db->select('*');
        $this->db->from('mdwms_memo_pm');
        $this->db->where('bitActive',1);
        //$this->db->where('dtmInserted',date('Y-m-d'));
        //$this->db->where('dtmEta',$tgl);
        $this->db->where('DATE(dtmInserted)',date('Y-m-d'));
        //$this->db->order_by('dtmInserted','DESC');
        $result = $this->db->get();
        return $result->result();
	}

	public function getmemo()
    {
        $this->db->select('*');
        $this->db->from('mdwms_memo_pm');
        $this->db->where('bitActive',1);
        //$this->db->order_by('dtmInserted','DESC');
        $this->db->where('DATE(dtmInserted)',date('Y-m-d'));
        $result = $this->db->get();
        return $result->result();
    }

	public function data_memoopen()
	{
		$this->db->select('*');
        $this->db->from('mdwms_memo_pm');
        $this->db->where('bitOpen',1);
        //$this->db->where('dtmInserted',date('Y-m-d'));
        $result = $this->db->get();
        return $result->result();
	}

	public function data_memoclose()
	{
		$this->db->select('*');
        $this->db->from('mdwms_memo_pm');
        $this->db->where('bitClose',1);
        //$this->db->where('dtmInserted',date('Y-m-d'));
        $result = $this->db->get();
        return $result->result();
	}

	public function total_memokedatangan()
	{
		$this->db->select('*');
		$this->db->from('mdwms_memo_pm');
		$this->db->where('bitActive', 1);

		return $this->db->count_all_results();
		// $this->db->select('SUM(bitActive) as totalmemo');
		// $this->db->group_by('bitActive');
		// $this->db->order_by('totalmemo','desc');
		// $result = $this->db->get('mdwms_memo_pm');
  //       return $result->row();
	}

	public function total_logbookqc()
	{
		$this->db->select('*');
		$this->db->from('mdwms_logbookqc_pm');
		$this->db->where('bitActive', 1);

		return $this->db->count_all_results();
	}

	public function open_memokedatangan()
	{
		$this->db->select('*');
		$this->db->from('mdwms_memo_pm');
		$this->db->where('bitActive', 1);
		$this->db->where('bitOpen', 1);

		return $this->db->count_all_results();
	}

	public function open_logbookqc()
	{
		$this->db->select('*');
		$this->db->from('mdwms_logbookqc_pm');
		$this->db->where('bitActive', 1);
		$this->db->where('bitOpen', 1);

		return $this->db->count_all_results();
	}

	public function progress_logbookqc()
	{
		$this->db->select('*');
		$this->db->from('mdwms_logbookqc_pm');
		$this->db->where('bitActive', 1);
		$this->db->where('bitProgress', 1);

		return $this->db->count_all_results();
	}

	public function hold_logbookqc()
	{
		$this->db->select('*');
		$this->db->from('mdwms_logbookqc_pm');
		$this->db->where('bitActive', 1);
		$this->db->where('bitHold', 1);

		return $this->db->count_all_results();
	}

	public function close_logbookqc()
	{
		$this->db->select('SUM(bitClose) as closelogbookqc');
		$this->db->group_by('bitClose');
		$this->db->order_by('closelogbookqc','desc');
		$result = $this->db->get('mdwms_logbookqc');
        return $result->row();
	}

	public function close_memokedatangan()
	{
		$this->db->select('*');
		$this->db->from('mdwms_memo_pm');
		$this->db->where('bitActive', 1);
		$this->db->where('bitClose', 1);

		return $this->db->count_all_results();
	}

	public function getAllDataUnloading()
	{
		return $this->db->get('trdwms_unloadingdetail_pm')->result();
	}

	public function upload_file($filename)
	{
		$this->load->library('upload'); // Load librari upload
    
	    $config['upload_path'] = './excel/';
	    $config['allowed_types'] = 'xlsx';
	    $config['max_size']  = '2048';
	    $config['overwrite'] = true;
	    $config['file_name'] = $filename;
	  
	    $this->upload->initialize($config); // Load konfigurasi uploadnya
	    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
	      // Jika berhasil :
	      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
	      return $return;
	    }else{
	      // Jika gagal :
	      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
	      return $return;
	  	}
	}

	public function upload_file_unloading($filename)
	{
		$this->load->library('upload'); // Load librari upload
    
	    $config['upload_path'] = './excel/';
	    $config['allowed_types'] = 'xlsx';
	    $config['max_size']  = '2048';
	    $config['overwrite'] = true;
	    $config['file_name'] = $filename;
	  
	    $this->upload->initialize($config); // Load konfigurasi uploadnya
	    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
	      // Jika berhasil :
	      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
	      return $return;
	    }else{
	      // Jika gagal :
	      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
	      return $return;
	  	}
	}

	public function insert_multiple($data)
	{
		$this->db->insert_batch('mdwms_memo_pm', $data);
	}

	public function insert_unloading($data)
	{
		$this->db->insert_batch('trdwms_unloadingdetail', $data);
	}

	public function insert_coa($data)
	{
		$this->db->insert_batch('mdwms_logbookqc', $data);
	}

	public function kode_qan()
	{
		  $this->db->select('RIGHT(mdwms_logbookqc.txtLotNumber,7) as txtLotNumber', FALSE);
		  $this->db->order_by('txtLotNumber','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('mdwms_logbookqc');  //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
			   //cek kode jika telah tersedia    
			   $data = $query->row();      
			   $kode = intval($data->txtLotNumber) + 1; 
		  }
		  else{      
			   $kode = 1;  //cek jika kode belum terdapat pada table
		  }
			  $tgl=date('dmY'); 
			  $batas = str_pad($kode, 0, "0", STR_PAD_LEFT);    
			  $kodetampil = "RM"."-"."0000".$batas;  //format kode
			  return $kodetampil;  
	}

	public function insert_tag()
	{
		  $this->db->select('RIGHT(mdwms_logbookqc.intTag,4) as intTag', FALSE);
		  $this->db->order_by('intTag','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('mdwms_logbookqc');  //cek dulu apakah ada sudah ada kode di tabel.    
		  if($query->num_rows() <> 0){      
			   //cek kode jika telah tersedia    
			   $data = $query->row();      
			   $kode = intval($data->intTag) + 1; 
		  }
		  else{      
			   $kode = 1;  //cek jika kode belum terdapat pada table
		  }
			  $tgl=date('dmY'); 
			  $batas = str_pad($kode, 0, "0", STR_PAD_LEFT);    
			  $kodetampil = "0".$batas;  //format kode
			  return $kodetampil;  
	}
}
?>