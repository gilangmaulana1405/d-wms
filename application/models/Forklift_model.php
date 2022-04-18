<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forklift_model extends CI_Model{

  // DATA TOTAL FORKLIFT WH
  public function totalForklift(){
    $this->db->select('*');
    $this->db->from('mdwms_forklift');
    $this->db->where('bitActive_forklift', 1);

    return $this->db->count_all_results();
  }

  // DATA FORKLIFT OK
  public function forkliftOK(){
    $this->db->select('*');
    $this->db->from('mdwms_forklift');
    $this->db->where('bitActive_forklift', 1);
    $this->db->where_in('bitIdle',1);
    $this->db->where_in('bitUsed',1);

    return $this->db->count_all_results();
  }

  // DATA FORKLIFT REAPIR
  public function forkliftRepair(){
    $this->db->select('*');
    $this->db->from('mdwms_forklift');
    $this->db->where('bitActive_forklift', 1);
    $this->db->where_in('bitRepair',1);

    return $this->db->count_all_results();
  }  

  // DATA FORKLIFT BREAKDOWN
  public function forkliftBreakdown(){
    $this->db->select('*');
    $this->db->from('mdwms_forklift');
    $this->db->where('bitActive_forklift', 1);
    $this->db->where_in('bitBreakdown',1);

    return $this->db->count_all_results();
  }  

}