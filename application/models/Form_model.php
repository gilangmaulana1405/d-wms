<?php
class Form_model extends CI_Model
{
	function load_data()
	{
		$this->db->order_by('intLotID', 'DESC');
		$query = $this->db->get('mdwms_lotperbag');
		return $query->result_array();
	}

	function insert($data)
	{
		$this->db->insert('mdwms_lotperbag', $data);
	}

	function update($data, $id)
	{
		$this->db->where('intLotID', $id);
		$this->db->update('mdwms_lotperbag', $data);
	}

	function delete($id)
	{
		$this->db->where('intLotID', $id);
		$this->db->delete('mdwms_lotperbag');
	}

	function header_unloading()
	{
		$this->db->select('*');
		$this->db->from('dwms_header_unloading');
		$this->db->order_by('no_id');
		$query = $this->db->get();
		//var_dump($query);die();
		return $query;
	}
	
}
?>