<?php 
class m_api extends CI_Model {
    
    function insert_Temp_Alergen($data){
        $this->db->insert('trdwms_temp_alergen', $data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        return FALSE;
    }

    function insert_RH_Alergen($data){
        $this->db->insert('trdwms_rh_alergen', $data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        return FALSE;
    }

    
    function insert_Temp_Weighing_Alergen($data){
        $this->db->insert('trdwms_temp_new_alergen', $data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        return FALSE;
    }

    function insert_RH_Weighing_Alergen($data){
        $this->db->insert('trdwms_rh_new_alergen', $data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        return FALSE;
    }

    
     function insert_Temp_Non_Alergen($data){
        $this->db->insert('trdwms_temp_non_alergen', $data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        return FALSE;
    }

    function insert_RH_Non_Alergen($data){
        $this->db->insert('trdwms_rh_non_alergen', $data);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        return FALSE;
    }
}

?>