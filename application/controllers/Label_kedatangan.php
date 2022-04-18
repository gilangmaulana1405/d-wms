<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Label_kedatangan extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin');
	}

	public function index()
	{
		if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
	    redirect('page/home'); // Redirect ke page mainview
	    // function render_login tersebut dari file core/MY_Controller.php
	    $this->render_print_label('print_label');
	}

	public function logout()
	{
		$this->session->sess_destroy(); // Hapus semua session
    	redirect('auth'); // Redirect ke halaman login
	}

	public function cetak()
	{
        $intReceivingID = $this->input->get('row');
        $data['qty'] = $this->input->get('qty');
        $data['txtQc'] = $this->input->get('txtQc');
        $data["row"] = $this->Receiving_model->get_labels($intReceivingID)->row_array();
        $data['allergen'] = $this->Receiving_model->receiving_allergen($intReceivingID)->row_array();
	    $content = $this->load->view('backend/tamplate/print_pdf2',$data, TRUE);

        $nama_file = 'PRINT.pdf';
        require_once'./assets/html2pdf/html2pdf.class.php';
        try
        {
            $html2pdf = new HTML2PDF('P', 'A4 ', 'fr');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($nama_file);
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
  	}

    public function cetak_unloading()
    {
        $intUnloadingDetailID = $this->input->get('row');
        $data['qty'] = $this->input->get('qty');
        $data['txtQc'] = $this->input->get('txtQc');
        $data['txtStatus'] = $this->input->get('txtStatus');
        $data['dtmDate'] = $this->input->get('dtmDate');
        $data['txtPenerima'] = $this->input->get('txtPenerima');
        $data['input_Description'] = $this->input->get('input_Description');
        $data['input_Supplier_lotnumber'] = $this->input->get('input_Supplier_lotnumber');
        $data['input_Itemcode'] = $this->input->get('input_Itemcode');
        $data['input_Lotnumber'] = $this->input->get('input_Lotnumber');
        $data['txtSupplier'] = $this->input->get('txtSupplier');
        $data['input_Expireddate'] = $this->input->get('input_Expireddate');
        if(isset($_GET['bitMilk'])){
            $data['bitMilk'] = $this->input->get('bitMilk');
        }else{
            $data['bitMilk'] = 'off';
        }
        if(isset($_GET['bitFish'])){
            $data['bitFish'] = $this->input->get('bitFish');
        }else{
            $data['bitFish'] = 'off';
        }
        if(isset($_GET['bitSoya'])){
            $data['bitSoya'] = $this->input->get('bitSoya');
        }else{
            $data['bitSoya'] = 'off';
        }
        if(isset($_GET['bitSulfur'])){
            $data['bitSulfur'] = $this->input->get('bitSulfur');
        }else{
            $data['bitSulfur'] = 'off';
        }
        $content = $this->load->view('backend/tamplate/print_pdf',$data, TRUE);

        $nama_file = 'PRINT.pdf';
        require_once'./assets/html2pdf/html2pdf.class.php';
        try
        {
            $html2pdf = new HTML2PDF('P', 'A4 ', 'fr');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($nama_file);
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

    public function cetak_pm()
    {
        $intReceivingID = $this->input->get('row');
        $data['qty'] = $this->input->get('qty');
        $data['txtQc'] = $this->input->get('txtQc');
        $data['txtPenerima'] = $this->input->get('txtPenerima');
        $data['txtSupplier'] = $this->input->get('txtSupplier');
        $data["row"] = $this->Receiving_pm_model->get_labels($intReceivingID)->row_array();
        $content = $this->load->view('backend_packaging/tamplate_packaging/print_pdf2',$data, TRUE);

        $nama_file = 'PRINT.pdf';
        require_once'./assets/html2pdf/html2pdf.class.php';
        try
        {
            $html2pdf = new HTML2PDF('P', 'A4 ', 'fr');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($nama_file);
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

    public function cetak_kaleng_pm()
    {
        $intReceivingID = $this->input->get('row');
        $data['qty'] = $this->input->get('qty');
        $data['txtQc'] = $this->input->get('txtQc');
        $data['txtKaleng'] = $this->input->get('txtKaleng');
        $data['txtPenerima'] = $this->input->get('txtPenerima');
        $data['txtSupplier'] = $this->input->get('txtSupplier');
        $data["row"] = $this->Receiving_pm_model->get_labels($intReceivingID)->row_array();
        $content = $this->load->view('backend_packaging/tamplate_packaging/print_pdf3',$data, TRUE);

        $nama_file = 'PRINT.pdf';
        require_once'./assets/html2pdf/html2pdf.class.php';
        try
        {
            $html2pdf = new HTML2PDF('P', 'A4 ', 'fr');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($nama_file);
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }

    public function cetak_pm_unloading()
    {
        $intUnloadingDetailID = $this->input->get('row');
        $data['qty'] = $this->input->get('qty');
        $data['txtQc'] = $this->input->get('txtQc');
        $data['dtmDate'] = $this->input->get('dtmDate');
        $data['input_Description'] = $this->input->get('input_Description');
        $data['input_Supplier_lotnumber'] = $this->input->get('input_Supplier_lotnumber');
        $data['input_Itemcode'] = $this->input->get('input_Itemcode');
        $data['input_Lotnumber'] = $this->input->get('input_Lotnumber');
        $data['txtSupplier'] = $this->input->get('txtSupplier');
        $data['input_Expireddate'] = $this->input->get('input_Expireddate');
        $data['txtPenerima'] = $this->input->get('txtPenerima');
        $data["row"] = $this->Receiving_pm_model->get_labels_unloading($intUnloadingDetailID)->row_array();
        $content = $this->load->view('backend_packaging/tamplate_packaging/print_pdf',$data, TRUE);

        $nama_file = 'PRINT.pdf';
        require_once'./assets/html2pdf/html2pdf.class.php';
        try
        {
            $html2pdf = new HTML2PDF('P', 'A4 ', 'fr');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($nama_file);
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }
  	public function cetak_labelidentitas()
	{
        $txtBatchNo = $this->input->get('txtBatchNo');
		$data['txtBatchNo'] = $txtBatchNo;
        $data['txtPreparator'] = $this->input->get('txtPreparator');
        $data['txtProduk'] = $this->input->get('txtProduk');
        $data['getdata'] = $this->Preparation_minor_model->data_label($txtBatchNo);
        $getdataCount = $this->Preparation_minor_model->data_labelCount($txtBatchNo);
        $data['getdataCount'] = $getdataCount;
        $getdataCountBlend = $this->Preparation_minor_model->data_labelCountBlend($txtBatchNo);
        $data['getdataCountBlend'] = $getdataCountBlend / $getdataCount;
	    $content = $this->load->view('backend_minor/content_minor/master_minor/print_label',$data, TRUE);

        $nama_file = 'PRINT.pdf';
        require_once'./assets/html2pdf/html2pdf.class.php';
        try
        {
            $html2pdf = new HTML2PDF('L', 'A5', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            // $html2pdf->setTestTdInOnePage(true);
            // $html2pdf->pdf->SetProtection(array('print'), 'spipu');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output($nama_file);
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }

	    $array2 = array(
                    'txtBatchNo'          => $txtBatchNo, 
                    'intLabelingProses'   => 1,
                    
                );
            $this->Preparation_minor_model->update_dashboard($array2);

        $datax = array(
        			'txtBatchNo'        => $txtBatchNo,
        			'intCountNo'        => $intCountNo,
        			'bitProgress'		=> 0,
        			'bitClose'			=> 1,
        		);
        // $this->Preparation_minor_model->update_status($datax);
  	}

  	public function export($intReceivingID){
    // Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excel
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Label_kedatangan.xls");
    
    //$data['siswa'] = $this->SiswaModel->view();
    $data["row"] = $this->Receiving_model->get_labels($intReceivingID)->row_array();
    $this->load->view('print',$data);
  }

  // print pdf serah terima minor
  public function cetak_serahTerima()
  {	
    $txtBatchNo = $this->input->post('txtBatchNo');
    $data['get_totalBlend'] = $this->Preparation_minor_model->get_totalBlend($txtBatchNo);
  	// update serah terima weighing dashboard
    $update= $this->Preparation_minor_model->update_serahTerima($txtBatchNo);

    // cetak ke pdf
    // ob_start();
    $data['chat'] = $this->Admin->get_chat()->row_array();
    $data['data_chat'] = $this->Admin->get_chat();
    $data['txtBatchNo'] = $txtBatchNo;
    $data['get_totalBlend'] = $this->Preparation_minor_model->get_totalBlend($txtBatchNo);
    $data['get_serahTerima'] = $this->Preparation_minor_model->get_serahTerima($txtBatchNo);
    $content = $this->load->view('backend_minor/content_minor/master_minor/pdf_serahTerimaMinor2',$data, TRUE);

    $nama_file = $txtBatchNo.'.pdf';
    require_once'./assets/html2pdf/html2pdf.class.php';
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output($nama_file);
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
  }

  // PRINT SUHU & RH ONLINE
  public function cetak_form_cli(){
    $lokasi = $this->input->get('d');
    if($lokasi == 1){
        $data['title'] = 'CHECK LIST SUHU & RH DISPENSING 1';
        $content = $this->load->view('backend_temp/content/master_temp/pdf_form_clidis1',$data, TRUE);
    }else if($lokasi == 4){
        $data['title'] = 'CHECK LIST SUHU & RH DISPENSING 4';
        $content = $this->load->view('backend_temp/content/master_temp/pdf_form_clidis4',$data, TRUE);
    }else if($lokasi == 5){
        $data['title'] = 'CHECK LIST SUHU & RH DISPENSING 5';
        $content = $this->load->view('backend_temp/content/master_temp/pdf_form_clidis5',$data, TRUE);
    }

    $nama_file = $data['title'].'.pdf';
    require_once'./assets/html2pdf/html2pdf.class.php';
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output($nama_file);
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
  }
}