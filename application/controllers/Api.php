<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_api');
    }
    
    // Powder Tank Area
    public function Temp_Alergen(){
        if(isset($_POST['intTemp'])){
            $intTemp = $_POST['intTemp'];
            $timestamp = time();

            $data = array('intTemp' => $intTemp, 'timestamp' => $timestamp);

            if($this->m_api->insert_Temp_Alergen($data)){
                $out = array('status'=>'success', 'ket'=>'berhasil simpan temp');
                echo json_encode($out);
            }else{
                $out = array('status'=>'error', 'ket'=>'gagal simpan temp');
                echo json_encode($out);
            }
        }else{
            $out = array('status'=>'error', 'ket'=>'salah parameter');
            echo json_encode($out);
        }
    }
    public function RH_Alergen(){
        if(isset($_POST['intRh'])){
            $intRh = $_POST['intRh'];
            $timestamp = time();

            $data = array('intRh' => $intRh, 'timestamp' => $timestamp);

            if($this->m_api->insert_RH_Alergen($data)){
                $out = array('status'=>'success', 'ket'=>'berhasil simpan rh');
                echo json_encode($out);
            }else{
                $out = array('status'=>'error', 'ket'=>'gagal simpan rh');
                echo json_encode($out);
            }
        }else{
            $out = array('status'=>'error', 'ket'=>'salah parameter');
            echo json_encode($out);
        }
    }

        // Powder Filling A Area
        public function Temp_Weighing_Alergen(){
            if(isset($_POST['intTemp'])){
                $intTemp = $_POST['intTemp'];
                $timestamp = time();
    
                $data = array('intTemp' => $intTemp, 'timestamp' => $timestamp);
    
                if($this->m_api->insert_Temp_Weighing_Alergen($data)){
                    $out = array('status'=>'success', 'ket'=>'berhasil simpan temp');
                    echo json_encode($out);
                }else{
                    $out = array('status'=>'error', 'ket'=>'gagal simpan temp');
                    echo json_encode($out);
                }
            }else{
                $out = array('status'=>'error', 'ket'=>'salah parameter');
                echo json_encode($out);
            }
        }
        public function RH_Weighing_Alergen(){
            if(isset($_POST['intRh'])){
                $intRh = $_POST['intRh'];
                $timestamp = time();
    
                $data = array('intRh' => $intRh, 'timestamp' => $timestamp);
    
                if($this->m_api->insert_RH_Weighing_Alergen($data)){
                    $out = array('status'=>'success', 'ket'=>'berhasil simpan rh');
                    echo json_encode($out);
                }else{
                    $out = array('status'=>'error', 'ket'=>'gagal simpan rh');
                    echo json_encode($out);
                }
            }else{
                $out = array('status'=>'error', 'ket'=>'salah parameter');
                echo json_encode($out);
            }
        }

         // Powder Filling B Area
         public function Temp_Non_Alergen(){
            if(isset($_POST['intTemp'])){
                $intTemp = $_POST['intTemp'];
                $timestamp = time();
    
                $data = array('intTemp' => $intTemp, 'timestamp' => $timestamp);
    
                if($this->m_api->insert_Temp_Non_Alergen($data)){
                    $out = array('status'=>'success', 'ket'=>'berhasil simpan temp');
                    echo json_encode($out);
                }else{
                    $out = array('status'=>'error', 'ket'=>'gagal simpan temp');
                    echo json_encode($out);
                }
            }else{
                $out = array('status'=>'error', 'ket'=>'salah parameter');
                echo json_encode($out);
            }
        }
        public function RH_Non_Alergen(){
            if(isset($_POST['intRh'])){
                $intRh = $_POST['intRh'];
                $timestamp = time();
    
                $data = array('intRh' => $intRh, 'timestamp' => $timestamp);
    
                if($this->m_api->insert_RH_Non_Alergen($data)){
                    $out = array('status'=>'success', 'ket'=>'berhasil simpan rh');
                    echo json_encode($out);
                }else{
                    $out = array('status'=>'error', 'ket'=>'gagal simpan rh');
                    echo json_encode($out);
                }
            }else{
                $out = array('status'=>'error', 'ket'=>'salah parameter');
                echo json_encode($out);
            }
        }
}