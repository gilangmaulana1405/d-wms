<?php
class Rack_model extends CI_Model
{
	function load_data1()
	{
		$this->db->where('rack_lantai',1);
		$this->db->order_by('rack_kategori','ASC');
		$query = $this->db->get('dwms_rack_rm');
		return $query->result_array();
	}

	function load_data2()
	{
		$this->db->where('rack_lantai',2);
		$this->db->order_by('rack_kategori','ASC');
		$query = $this->db->get('dwms_rack_rm');
		return $query->result_array();
	}

	function load_data3()
	{
		$this->db->where('rack_lantai',3);
		$this->db->order_by('rack_kategori','ASC');
		$query = $this->db->get('dwms_rack_rm');
		return $query->result_array();
	}

	function insert($data)
	{
		$this->db->insert('dwms_rack_rm', $data);
	}

	function update($data, $id)
	{
		$this->db->where('rack_id', $id);
		$this->db->update('dwms_rack_rm', $data);
	}

	function delete($id)
	{
		$this->db->where('rack_id', $id);
		$this->db->delete('dwms_rack_rm');
	}


}
?>