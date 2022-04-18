<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model
{
    public function getAdminByUsername($txtUsername)
    {
        $this->db->select('*');
        $this->db->from('mdwms_user');
        $this->db->join('mdwms_jobtitle', 'mdwms_user.intJobtitle = mdwms_jobtitle.intJobtitleID');
        $this->db->where('txtUsername',$txtUsername);
        $this->db->where('mdwms_user.bitActive', 1);
        return $this->db->get()->row_object();
    }

    public function checktoken($access_token)
    {
        $this->db->where('access_token',$access_token);
        return $this->db->get('mdwms_token')->row_object();
    }

    public function registtoken($data)
    {
        return $this->db->insert('mdwms_token',$data);
    }

    public function deletetoken($access_token)
    {
        $this->db->where('access_token',$access_token);
        return $this->db->delete('mdwms_token');
    }
    //fungsi cek session logged in
    function is_logged_in()
    {
        return $this->session->userdata('user_id');
    }

    //fungsi cek level
    function is_role()
    {
        return $this->session->userdata('role');
    }

    function get_chat(){
        $this->db->select('*');
        $this->db->from('trmdwms_chat');
        $this->db->join('mdwms_user','trmdwms_chat.intUserID_pengirim=mdwms_user.intUserID');
        return $this->db->get();
    }
    //fungsi check login
    function check_login($table, $field1, $field2)
    {
//    exit(var_dump($table,$field1,$field2));
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

    public function getOperatorByNik($txtNik)
    {
        $this->db->where('txtNik',$txtNik);
        $this->db->where('bitActive', 1);
        return $this->db->get('mdwms_karyawan')->row_object();
    }

    public function update_password($intUserID, $password, $dateNow, $txtUpdatedBy, $dtmUpdatedDate){
        $updateArray = array(
            "dtmExpiredDate" => "$dateNow",
            "txtPassword" => "$password",
            "txtUpdatedBy" => "$txtUpdatedBy",
            "dtmUpdatedDate" => "$dtmUpdatedDate"
        );

        $this->db->where('intUserID', $intUserID);
        $this->db->update('mdwms_user', $updateArray);
        if($this->db->affected_rows() == 0){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function changePassword($txtPassword, $txtUsername, $dateNow){
        $updateArray = array(
            "txtPassword" => "$txtPassword",
            "dtmExpiredDate" => "$dateNow",
        );

        $this->db->where('txtUsername', $txtUsername);
        $this->db->update('mdwms_user', $updateArray);
        if($this->db->affected_rows() == 0){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function getUser($txtUsername){
        $this->db->select('*');
        $this->db->from('mdwms_user');
        $this->db->wehere('txtUsername', $txtUsername);

        return $this->db->get();
    }
}