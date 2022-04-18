<?php 
class Transit_model extends CI_Model
{
    public $_table = "dwms_area_transit";

    public $no_id;
    public $no_palet;
    public $item_code;
    public $description;
    public $satuan;
    public $qty;
    public $jenis;
    public $lot_number;
    public $exp_date;
    public $supplier_lot_number;
    public $create_at;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["no_id" => $id])->row();
    }

}
?>