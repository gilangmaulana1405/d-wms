<?php 
class m_api extends CI_Model {
    //Powder Tank Area
    function insert_Temp_Alergen($data){
        $this->db->insert('op_temp_Alergen', $data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        return FALSE;
    }

    function insert_RH_Alergen($data){
        $this->db->insert('op_rh_Alergen', $data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        return FALSE;
    }

    //Filling Line A Area
    function insert_Temp_Weighing_Alergen($data){
        $this->db->insert('op_temp_Weighing_Alergen', $data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        return FALSE;
    }

    function insert_RH_Weighing_Alergen($data){
        $this->db->insert('op_rh_Weighing_Alergen', $data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        return FALSE;
    }

     //Filling Line B Area
     function insert_Temp_Non_Alergen($data){
        $this->db->insert('op_temp_Non_Alergen', $data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        return FALSE;
    }

    function insert_RH_Non_Alergen($data){
        $this->db->insert('op_rh_Non_Alergen', $data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        return FALSE;
    }
}

?>