<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unloading extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Unloading_model');
		//$this->output->enable_profiler(TRUE);
	}

    function load_data()
    {
        $data = $this->Unloading_model->load_data();
        echo json_encode($data);
    }

    function insert()
    {
        $data = array(
            'txtItemcode'           => $this->input->post('item_code'),
            'txtDescription'        =>  $this->input->post('description')
        );

        $this->Unloading_model->insert($data);
    }

    function update()
    {
        $data = array(
            $this->input->post('table_column')  =>  $this->input->post('value')
        );

        $this->Unloading_model->update($data, $this->input->post('id'));
    }

    function delete()
    {
        $this->Unloading_model->delete($this->input->post('id'));
    }

    //////////////////////////////////////////////////FUNSI SCAN SATU PER SATU//////////////////////////////////////
	public function create(){
        $mdwms_pallet = $this->input->post('intPalletno',TRUE);
        $mdwms_lotperbag = $this->input->post('intLotID',TRUE);
        
        $data = array(
            'intPalletno'   => $this->input->post('intPalletno'),
            'intLotID'      =>  $this->input->post('intLotID',TRUE),
            'intQty'      =>  $this->input->post('intQty'),
            'jumlah'      =>  $this->input->post('jumlah'),
        );

        // $this->Unloading_model->create_pallet2($mdwms_pallet,$mdwms_lotperbag);
        $this->Unloading_model->create_pallet2($data);
        redirect('page/transaction');
        // redirect('mdwms_pallet');
    }

    function load_data()
    {
        $data = $this->Form_model->load_data();
        echo json_encode($data);
    }

    public function get_lot_by_pallet(){
        $intPalletID=$this->input->post('intPalletID');
        $data=$this->Unloading_model->get_lot_by_pallet($intPalletID)->result();
        foreach ($data as $result) {
            $value[] = (float) $result->intLotID;
        }
        echo json_encode($value);
    }

    public function update()
    {
        $id = $this->input->post('edit_id',TRUE);
        $mdwms_pallet = $this->input->post('pallet_edit',TRUE);
        $mdwms_lotperbag = $this->input->post('lot_edit',TRUE);
        $this->Unloading_model->update_pallet($id,$mdwms_pallet,$mdwms_lotperbag);
        redirect('mdwms_pallet');
    }

    public function delete()
    {
        $id = $this->input->post('delete_id',TRUE);
        $this->Unloading_model->delete_pallet($id);
        redirect('mdwms_pallet');
    }

    public function get_json_data()
    {
    	$page = $_REQUEST['page']; // get the requested page
        $limit = $_REQUEST['rows']; // get how many rows we want to have into the grid
        $sidx = $_REQUEST['sidx']; // get index row - i.e. user click to sort
        $sord = $_REQUEST['sord']; // get the direction if(!$sidx) $sidx =1;
 
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => $sord,
                "limit" => null,
                "search" => $_REQUEST['_search'],
                "search_field" => isset($_REQUEST['searchField'])?$_REQUEST['searchField']:null,
                "search_operator" => isset($_REQUEST['searchOper'])?$_REQUEST['searchOper']:null,
                "search_str" => isset($_REQUEST['searchString'])?$_REQUEST['searchString']:null
        );
 
        $row = $this->Unloading_model->get_data($req_param)->result_array();
        $count = count($row);
        if( $count >0 ) {
            $total_pages = ceil($count/$limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages)
            $page=$total_pages;
        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
 
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
 
        $result = $this->jqgrid->get_data($req_param)->result_array();
        // sekarang format data dari dB sehingga sesuai yang diinginkan oleh jqGrid dalam hal ini aku pakai JSON format
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
                for($i=0; $i<count($result); $i++){
 
            $responce->rows[$i]['intUnloadingDetailID ']=$result[$i]['intUnloadingDetailID'];
            // data berikut harus sesuai dengan kolom-kolom yang ingin ditampilkan di view (js)
            $responce->rows[$i]['cell']=array(
                    $result[$i][intUnloadingDetailID],
                                            $result[$i]['intPalletID'],
                                            $result[$i]['intLotID'],
                                            $result[$i]['intAllergenID'],
                                            $result[$i]['intReceivingID'],
                                            $result[$i]['txtLotsupplier'],
                                            $result[$i]['dtmED'],
                                            $result[$i]['bitActive']
                                            );
 
        }
 
        echo json_encode($responce);
    }

    public function crud()
    {
    	$this->jqgrid->crud('trdwms_unloadingdetail7', 'intUnloadingDetailID ', 'id', array('intUnloadingDetailID', 'intPalletID', 'intLotID','intAllergenID','intReceivingID','txtLotsupplier','dtmED','bitActive'));
    }

    public function loadDataGrid()
    {
    	$page = isset($_POST['page'])?$_POST['page']:1; // get the requested page
        $limit = isset($_POST['rows'])?$_POST['rows']:10; // get how many rows we want to have into the grid
        $sidx = isset($_POST['sidx'])?$_POST['sidx']:'name'; // get index row - i.e. user click to sort
        $sord = isset($_POST['sord'])?$_POST['sord']:''; // get the direction
 		
 		// print_r($page);
        if(!$sidx) $sidx =1;
        $query = $this->Unloading_model->getAll();
 
        $count = count($query);
 
        if( $count > 0 ) {
            $total_pages = ceil($count/$limit);    //calculating total number of pages
        } else {
            $total_pages = 0;
        }
 
        if ($page > $total_pages) $page=$total_pages;
 
        $start = $limit*$page - $limit; // do not put $limit*($page - 1)
        $start = ($start<0)?0:$start;  // make sure that $start is not a negative value

        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
        $i=0;
        foreach($query as $row) {
            $responce->rows[$i]['id']=$row->intUnloadingDetailID;
            $responce->rows[$i]['cell']=array($i+1,$row->intPalletID,$row->intLotID,$row->intAllergenID,$row->intReceivingID,$row->txtLotsupplier,$row->dtmED);
            $i++;
        }
        echo json_encode($responce);
    }
}
?>