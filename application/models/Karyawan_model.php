<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_model extends CI_Model {

	var $table = 'mdwms_karyawan';
	var $column_order = array('	intSubdeptID','intJobtitleID','txtNik','txtNamakaryawan','txtEmailkaryawan',null); //set column field database for datatable orderable
	var $column_search = array('intSubdeptID','intJobtitleID','txtNik'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('intKaryawanID' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('mdwms_karyawan','mdwms_subdept.intSubdeptID = mdwms_karyawan.intSubdeptID');
		// $this->db->join('mdwms_karyawan' 'mdwms_jobtitle.intJobtitleID = mdwms_karyawan.intJobtitleID');
		$query = $this->db->get();
		return $query;
		/**
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
		**/
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

	public function select_all_user(){
		$this->db->select('mdwms_user.bitActive, mdwms_user.txtNamauser, mdwms_user.txtGambar, mdwms_user.txtNamauser, mdwms_user.txtEmail, mdwms_user.intUserID, mdwms_subdept.txtSubdept, mdwms_jobtitle.txtJobtitle, mdwms_role.txtRole_Acces');
		$this->db->from('mdwms_user');
		$this->db->join('mdwms_role', 'mdwms_user.intRoleID = mdwms_role.intRole');
		$this->db->join('mdwms_subdept', 'mdwms_user.intSubdept = mdwms_subdept.intSubdeptID');
		$this->db->join('mdwms_jobtitle', 'mdwms_user.intJobtitle = mdwms_jobtitle.intJobtitleID');
		$this->db->order_by('txtNamauser', 'ASC');

		return $this->db->get();
	}


}

?>