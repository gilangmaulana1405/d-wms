<?php
class Penempatan_model extends CI_Model
{
	function load_data ()
	{
		$this->db->order_by('id_form');
		$query = $this->db->get('dwms_header_penempatan');
		return $query->result_array();
	}

	function save_header($data) {
		$this->db->insert('dwms_header_penempatan',$data);
	}

	function load_header()
	{
		$this->db->select('*');
		$this->db->from('dwms_header_penempatan');
		$this->db->order_by('id_form');
		$query = $this->db->get();
		//var_dump($query);die();
		return $query;
	}
}
?>