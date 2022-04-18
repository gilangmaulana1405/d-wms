<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unloading_model extends CI_Model
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

    ////////////////////////////////////////////////FUNGSI SCAN SATU PER SATU///////////////////////////////////////
    public function get_lot()
	{
		$query = $this->db->get('mdwms_lotperbag');
        return $query;
	}

    function load_data1()
    {
        $this->db->order_by('bitActive', 'DESC');
        $query = $this->db->get('mdwms_lotperbag');
        return $query->result_array();
    }

	public function get_lot_by_pallet($intPalletID){
        $this->db->select('*');
        $this->db->from('mdwms_lotperbag');
        $this->db->join('trdwms_unloadingdetail', 'intLotID=intLotID');
        $this->db->join('mdwms_pallet', 'intPalletID=intPalletID');
        $this->db->where('intPalletID',$intPalletID);
        $query = $this->db->get();
        return $query;
    }

    public function get_pallet()
    {
        $this->db->select('mdwms_pallet.*,COUNT(mdwms_pallet.intPalletID) AS scan_item');
        $this->db->from('mdwms_pallet');
        $this->db->join('trdwms_unloadingdetail', 'mdwms_pallet.intPalletID=trdwms_unloadingdetail.intPalletID');
        $this->db->join('mdwms_lotperbag', 'trdwms_unloadingdetail.intLotID=mdwms_lotperbag.intLotID');
        $this->db->group_by('intPalletID');
        $query = $this->db->get();
        return $query;
    }

    public function get_pallet1()
    {
        $this->db->select('*');
        $this->db->from('mdwms_pallet');
        $this->db->join('mdwms_lotperbag', 'mdwms_pallet.intLotID=mdwms_lotperbag.intLotID');
        $query = $this->db->get();
        return $query;
    }

    public function create_pallet2($data)
    {

        date_default_timezone_set("Asia/Jakarta");
        $datax  = array(
            'intPalletno' => $data['intPalletno'],
            //'txtInsertedBy' => $data->txtInsertedBy,
            'dtmInserted' => date('Y-m-d H:i:s') 
        );
        $this->db->insert('mdwms_pallet', $datax);

        $intPalletID = $this->db->insert_id();

        for ($i=0; $i <$data['jumlah']; $i++) { 
            $result = array(
            'intPalletID' => $data['intPalletno'],
            'intLotID '   => $data['intLotID'],
            'intQty'      => $data['intQty'],  
            );
        $this->db->insert('trdwms_unloadingdetail', $result);
        }
    }

    public function create_pallet($mdwms_pallet,$mdwms_lotperbag)
    {
        $this->db->trans_start();
            //INSERT TO PALET
            date_default_timezone_set("Asia/Jakarta");
            $data  = array(
                'intPalletno' => $mdwms_pallet,
                //'txtInsertedBy' => $data->txtInsertedBy,
                'dtmInserted' => date('Y-m-d H:i:s') 
            );
            $this->db->insert('mdwms_pallet', $data);
            //GET ID PALLET
            $intPalletID = $this->db->insert_id();
            $result = array();
                foreach($mdwms_lotperbag AS $key => $val){
                     $result[] = array(
                      'intPalletID'   => $intPalletID,
                      'intLotID	'   => $_POST['intLotID'][$key]
                     );
                }      
            //MULTIPLE INSERT TO DETAIL TABLE
            $this->db->insert_batch('trdwms_unloadingdetail', $result);
        $this->db->trans_complete();
    }

    public function update_pallet($id,$mdwms_pallet,$mdwms_lotperbag)
    {
        $this->db->trans_start();
            //UPDATE TO PALLET
            $data  = array(
                'intPalletno' => $mdwms_pallet
            );
            $this->db->where('intPalletID',$id);
            $this->db->update('mdwms_pallet', $data);
             
            //DELETE DETAIL PALLET
            $this->db->delete('trdwms_unloadingdetail', array('intPalletID' => $id));
 
            $result = array();
                foreach($mdwms_lotperbag AS $key => $val){
                     $result[] = array(
                      'intPalletID'   => $id,
                      'intLotID'   => $_POST['lot_edit'][$key]
                     );
                }      
            //MULTIPLE INSERT TO DETAIL TABLE
            $this->db->insert_batch('trdwms_unloadingdetail', $result);
        $this->db->trans_complete();
    }

    public function delete_pallet($id){
        $this->db->trans_start();
            $this->db->delete('trdwms_unloadingdetail', array('intPalletID' => $id));
            $this->db->delete('mdwms_pallet', array('intPalletID' => $id));
        $this->db->trans_complete();
    }

    public function get_data($param)
    {
    	if($param['search'] != null && $param['search'] === 'true'){
            $wh = $param['search_field'];
            switch ($param['search_operator']) {
                case "bw": // begin with
                    $wh .= " LIKE '".$param['search_str']."%'";
                    break;
                case "ew": // end with
                    $wh .= " LIKE '%".$param['search_str']."'";
                    break;
                case "cn": // contain %param%
                    $wh .= " LIKE '%".$param['search_str']."%'";
                    break;
                case "eq": // equal =
                    if(is_numeric($param['search_str'])) {
                        $wh .= " = ".$param['search_str'];
                    } else {
                        $wh .= " = '".$param['search_str']."'";
                    }
                    break;
                case "ne": // not equal
                    if(is_numeric($param['search_str'])) {
                        $wh .= " <> ".$param['search_str'];
                    } else {
                        $wh .= " <> '".$param['search_str']."'";
                    }
                    break;
                case "lt":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " < ".$param['search_str'];
                    } else {
                        $wh .= " < '".$param['search_str']."'";
                    }
                    break;
                case "le":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " <= ".$param['search_str'];
                    } else {
                        $wh .= " <= '".$param['search_str']."'";
                    }
                    break;
                case "gt":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " > ".$param['search_str'];
                    } else {
                        $wh .= " > '".$param['search_str']."'";
                    }
                    break;
                case "ge":
                    if(is_numeric($param['search_str'])) {
                        $wh .= " >= ".$param['search_str'];
                    } else {
                        $wh .= " >= '".$param['search_str']."'";
                    }
                    break;
                default :
                    $wh = "";
            }
            $this->db->where($wh);
        }
        ($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
 
        ($param['sort_by'] != null) ? $this->db->order_by($param['sort_by'], $param['sort_direction']) :'';
 
        //returns the query string
        return $this->db->get($this->_table);
    }

    public function crud($table, $key, $id, $arr)
    {
    	$oper=$this->input->post('oper');
        $id_=$this->input->post($id);
        $count=count($arr);
        for($i=0;$i<$count;$i++){
	        $data[$arr[$i]]=$this->input->post($arr[$i]);
	 
	        switch ($oper) {
	        case 'add':
	        $this->db->insert($table,$data);
	        break;
	        case 'edit':
	        $this->db->where($key,$id_);
	        $this->db->update($table, $data);
	        break;
	        case 'del':
	        $this->db->where($key,$id_);
	        $this->db->delete($table);
	        break;
	        }
	    }
    }

    public function getAll()
    {
	    $this->db->select('*');
	    $this->db->from('trdwms_unloadingdetail');
	    $this->db->limit(5);
	    $this->db->order_by('intUnloadingDetailID','ASC');
	    $query = $this->db->get();
	     
	    return $query->result();
	 }
}
?>