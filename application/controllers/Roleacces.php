<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roleacces extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Roleacces_model');
    $this->load->library('form_validation');
	}

	public function index()
	{
		if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
	    redirect('page/home'); // Redirect ke page mainview
	    // function render_login tersebut dari file core/MY_Controller.php
	    $this->render_roleacces('roleacces');

	}

  public function data_role()
  {
    $data=$this->Roleacces_model->view();
        echo json_encode($data);
  }

  public function data_employee()
  {
    $data=$this->Roleacces_model->view_employee();
        echo json_encode($data);
  }

  public function data_allergen()
  {
    $data=$this->Roleacces_model->view_allergen();
        echo json_encode($data);
  }

  public function data_subdept()
  {
    $data=$this->Roleacces_model->view_subdept();
        echo json_encode($data);
  }

  public function data_jobtitle()
  {
    $data=$this->Roleacces_model->view_jobtitle();
        echo json_encode($data);
  }

  public function data_qtyperbag()
  {
    $data=$this->Roleacces_model->view_qtyperbag();
        echo json_encode($data);
  }

  public function get_role()
  {
    $intRoleID=$this->input->post('intRoleID');
        $data=$this->Roleacces_model->get_role_by_id($intRoleID);
        echo json_encode($data);  
  }

  public function get_allergen()
  {
    $intAllergenID=$this->input->post('intAllergenID');
        $data=$this->Roleacces_model->get_allergen_by_id($intAllergenID);
        echo json_encode($data);  
  }

  public function get_subdept()
  {
    $intSubdeptID=$this->input->post('intSubdeptID');
        $data=$this->Roleacces_model->get_allergen_by_id($intSubdeptID);
        echo json_encode($data);  
  }

  public function get_jobtitle()
  {
    $intJobtitleID=$this->input->post('intJobtitleID');
        $data=$this->Roleacces_model->get_jobtitle_by_id($intJobtitleID);
        echo json_encode($data);  
  }

  public function get_qtyperbag()
  {
    $intQtyperbagID=$this->input->post('intQtyperbagID');
        $data=$this->Roleacces_model->get_qtyperbag_by_id($intQtyperbagID);
        echo json_encode($data);  
  }

  public function get_employee()
  {
    $intKaryawanID=$this->input->post('intKaryawanID');
        $data=$this->Roleacces_model->get_employee_by_id($intKaryawanID);
        echo json_encode($data);  
  }

	public function logout()
	{
		$this->session->sess_destroy(); // Hapus semua session
    	redirect('auth'); // Redirect ke halaman login
	}

  public function simpan_role()
  {
    $this->form_validation->set_rules('input_role', 'Role', 'Required|max_length[1]');
    $this->form_validation->set_rules('input_acces', 'Role Acces', 'Required|max_length[50]');
    $this->form_validation->set_rules('input_active', 'Role Active', 'Required');
    if ($this->form_validation->run()==FALSE) {
      echo "salah";
    }else{
      $data = array('intRole'         => $this->input->post('role'),
                    'txtRole_acces'   => $this->input->post('role_acces'),
                    'bitActive'       => $this->input->post('active'),
                    'txtInsertedBy'   => $this->session->userdata('fullname'),
                    'dtmInsertedDate' => date('Y-m-d h:i:sa'),
                   );
      $simpan=$this->db->insert('mdwms_role',$data);
      echo json_encode($simpan);
//      exit(var_dump($data));
    }
  }

  public function simpan_allergen()
  {
    $this->form_validation->set_rules('input_itemcode', 'itemcode', 'Required|max_length[50]');
    $this->form_validation->set_rules('input_description', 'description', 'Required|max_length[50]');
    $this->form_validation->set_rules('input_allergen', 'allergen', 'Required');
    $this->form_validation->set_rules('input_contain', 'contain', 'Required');
    $this->form_validation->set_rules('input_active', 'active', 'Required');
    if ($this->form_validation->run()==FALSE) {
      echo "salah";
    }else{
      $data = array('txtItemcode'       => $this->input->post('itemcode'),
                    'txtItemdesc'       => $this->input->post('description'),
                    'bitAllergen'       => $this->input->post('allergen'),
                    'txtContain'        => $this->input->post('contain'),
                    'bitActive'         => $this->input->post('active'),
                    'txtInsertedBy'     => $this->session->userdata('fullname'),
                   );
      $simpan=$this->db->insert('mdwms_allergen',$data);
      echo json_encode($simpan);
//      exit(var_dump($data));
    }
  }

  public function simpan_subdept()
  {
    $this->form_validation->set_rules('input_subdept', 'subdept', 'Required|max_length[50]');
    $this->form_validation->set_rules('input_active', 'active', 'Required');
    if ($this->form_validation->run()==FALSE) {
      echo "salah";
    }else{
      $data = array('txtSubdept'       => $this->input->post('subdept'),
                    'bitActive'         => $this->input->post('active'),
                    'txtInsertedBy'     => $this->session->userdata('fullname'),
                   );
      $simpan=$this->db->insert('mdwms_subdept',$data);
      echo json_encode($simpan);
//      exit(var_dump($data));
    }
  }

  public function simpan_jobtitle()
  {
    $this->form_validation->set_rules('input_jobtitle', 'jobtitle', 'Required|max_length[50]');
    $this->form_validation->set_rules('input_active', 'active', 'Required');
    if ($this->form_validation->run()==FALSE) {
      echo "salah";
    }else{
      $data = array('txtJobtitle'       => $this->input->post('jobtitle'),
                    'bitActive'         => $this->input->post('active'),
                    'txtInsertedBy'     => $this->session->userdata('fullname'),
                   );
      $simpan=$this->db->insert('mdwms_jobtitle',$data);
      echo json_encode($simpan);
//      exit(var_dump($data));
    }
  }

  public function simpan_qtyperbag()
  {
    $this->form_validation->set_rules('input_itemcode', 'itemcode', 'Required|max_length[50]');
    $this->form_validation->set_rules('input_description', 'description', 'Required|max_length[50]');
    $this->form_validation->set_rules('input_qty', 'qty', 'Required|min_length[1]');
    $this->form_validation->set_rules('input_uom', 'uom', 'Required');
    $this->form_validation->set_rules('input_active', 'active', 'Required');
    if ($this->form_validation->run()==FALSE) {
      echo "salah";
    }else{
      $data = array('txtItemcode'       => $this->input->post('itemcode'),
                    'txtItemdesc'       => $this->input->post('description'),
                    'intQty'            => $this->input->post('qty'),
                    'txtUom'            => $this->input->post('uom'),  
                    'bitActive'         => $this->input->post('active'),
                    'txtInsertedBy'     => $this->session->userdata('fullname'),
                   );
      $simpan=$this->db->insert('mdwms_qtyperbag',$data);
      echo json_encode($simpan);
//      exit(var_dump($data));
    }
  }

  public function simpan_employee()
  {
    $this->form_validation->set_rules('input_subdept', 'subdept', 'Required');
    $this->form_validation->set_rules('input_jobtitle', 'jobtitle', 'Required');
    $this->form_validation->set_rules('input_nik', 'nik', 'Required');
    $this->form_validation->set_rules('input_namakaryawan', 'namakaryawan', 'Required');
    $this->form_validation->set_rules('input_emailkaryawan', 'emailkaryawan', 'Required');
    $this->form_validation->set_rules('input_phonekaryawan', 'phonekaryawan', 'Required');
    $this->form_validation->set_rules('input_active', 'active', 'Required');
    if ($this->form_validation->run()==FALSE) {
      echo "salah";
    }else{
      $data = array('txtSubdept'        => $this->input->post('subdept'),
                    'txtJobtitle'       => $this->input->post('jobtitle'),
                    'txtNik'            => $this->input->post('nik'),
                    'txtNamakaryawan'   => $this->input->post('namakaryawan'), 
                    'txtEmailkaryawan'   => $this->input->post('emailkaryawan'),
                    'txtPhonekaryawan'   => $this->input->post('phonekaryawan'),    
                    'bitActive'         => $this->input->post('active'),
                    'txtInsertedBy'     => $this->session->userdata('fullname'),
                   );
      $simpan=$this->db->insert('mdwms_karyawan',$data);
      echo json_encode($simpan);
//      exit(var_dump($data));
    }
  }

  public function update_role()
  {
    $this->form_validation->set_rules('input_role', 'Role', 'Required|max_length[1]');
    $this->form_validation->set_rules('input_acces', 'Role Acces', 'Required|max_length[50]');
    $this->form_validation->set_rules('input_active', 'Role Active', 'Required');
    if ($this->form_validation->run()==FALSE) {
      echo "salah";
    }else{
      $data = array('intRole'         => $this->input->post('role'),
                    'txtRole_acces'   => $this->input->post('role_acces'),
                    'bitActive'       => $this->input->post('active'),
                    'txtUpdatedBy'   => $this->session->userdata('fullname'),
                    'dtmUpdatedDate' => date('Y-m-d h:i:sa'),
                   );
      $this->db->where('intRoleID',$this->input->post('id_role'));
      $update=$this->db->update('mdwms_role',$data);
      echo json_encode($update);
//      exit(var_dump($data));
    }
  }

  public function update_allergen()
  {
    $this->form_validation->set_rules('input_itemcode', 'itemcode', 'Required|max_length[50]');
    $this->form_validation->set_rules('input_description', 'description', 'Required|max_length[50]');
    $this->form_validation->set_rules('input_allergen', 'allergen', 'Required');
    $this->form_validation->set_rules('input_contain', 'contain', 'Required');
    $this->form_validation->set_rules('input_active', 'active', 'Required');
    if ($this->form_validation->run()==FALSE) {
      echo "salah";
    }else{
      $data = array('txtItemcode'       => $this->input->post('itemcode'),
                    'txtItemdesc'       => $this->input->post('description'),
                    'bitAllergen'       => $this->input->post('allergen'),
                    'txtContain'        => $this->input->post('contain'),
                    'bitActive'         => $this->input->post('active'),
                    'txtUpdatedBy'      => $this->session->userdata('fullname'),
                    'dtmUpdated'        => date('Y-m-d h:i:sa'),
                   );
      $this->db->where('intAllergenID',$this->input->post('intAllergenID'));
      $update=$this->db->update('mdwms_allergen',$data);
      echo json_encode($update);
//     exit(var_dump($data));
    }
  }

  public function update_subdept()
  {
    $this->form_validation->set_rules('input_subdept', 'subdept', 'Required');
    $this->form_validation->set_rules('input_active', 'active', 'Required');
    if ($this->form_validation->run()==FALSE) {
      echo "salah";
    }else{
      $data = array('txtSubdept'     => $this->input->post('subdept'),
                    'bitActive'      => $this->input->post('active'),
                    'txtUpdatedBy'   => $this->session->userdata('fullname'),
                    'dtmUpdatedDate' => date('Y-m-d h:i:sa'),
                   );
      $this->db->where('intSubdeptID',$this->input->post('intSubdeptID'));
      $update=$this->db->update('mdwms_subdept',$data);
      echo json_encode($update);
//      exit(var_dump($data));
    }
  }

  public function update_jobtitle()
  {
    $this->form_validation->set_rules('input_jobtitle', 'jobtitle', 'Required');
    $this->form_validation->set_rules('input_active', 'active', 'Required');
    if ($this->form_validation->run()==FALSE) {
      echo "salah";
    }else{
      $data = array('txtJobtitle'     => $this->input->post('jobtitle'),
                    'bitActive'      => $this->input->post('active'),
                    'txtUpdatedBy'   => $this->session->userdata('fullname'),
                    'dtmUpdatedDate' => date('Y-m-d h:i:sa'),
                   );
      $this->db->where('intJobtitleID',$this->input->post('intJobtitleID'));
      //$data = $this->Roleacces_model->Update();
      $update=$this->db->update('mdwms_jobtitle',$data);
      echo json_encode($update);
//      exit(var_dump($data));
    }
  }

  public function update_qtyperbag()
  {
    $this->form_validation->set_rules('input_itemcode', 'itemcode', 'Required|max_length[50]');
    $this->form_validation->set_rules('input_description', 'description', 'Required|max_length[50]');
    $this->form_validation->set_rules('input_qty', 'qty', 'Required|min_length[1]');
    $this->form_validation->set_rules('input_uom', 'uom', 'Required');
    $this->form_validation->set_rules('input_active', 'active', 'Required');
    if ($this->form_validation->run()==FALSE) {
      echo "salah";
    }else{
      $data = array('txtItemcode'       => $this->input->post('itemcode'),
                    'txtItemdesc'       => $this->input->post('description'),
                    'intQty'            => $this->input->post('qty'),
                    'txtUom'            => $this->input->post('uom'),  
                    'bitActive'         => $this->input->post('active'),
                    'txtUpdatedBy'      => $this->session->userdata('fullname'),
                    'dtmUpdated'        => date('Y-m-d h:i:sa'),
                   );
      $this->db->where('intQtyperbagID',$this->input->post('intQtyperbagID'));
      $update=$this->db->update('mdwms_qtyperbag',$data);
      echo json_encode($update);
//      exit(var_dump($data));
    }
  }

  public function update_employee()
  {
    $this->form_validation->set_rules('input_subdept', 'subdept', 'Required');
    $this->form_validation->set_rules('input_jobtitle', 'jobtitle', 'Required');
    $this->form_validation->set_rules('input_nik', 'nik', 'Required');
    $this->form_validation->set_rules('input_namakaryawan', 'namakaryawan', 'Required');
    $this->form_validation->set_rules('input_emailkaryawan', 'emailkaryawan', 'Required');
    $this->form_validation->set_rules('input_phonekaryawan', 'phonekaryawan', 'Required');
    $this->form_validation->set_rules('input_active', 'active', 'Required');
    if ($this->form_validation->run()==FALSE) {
      echo "salah";
    }else{
      $data = array('txtSubdept'        => $this->input->post('subdept'),
                    'txtJobtitle'       => $this->input->post('jobtitle'),
                    'txtNik'            => $this->input->post('nik'),
                    'txtNamakaryawan'   => $this->input->post('namakaryawan'), 
                    'txtEmailkaryawan'   => $this->input->post('emailkaryawan'),
                    'txtPhonekaryawan'   => $this->input->post('phonekaryawan'),    
                    'bitActive'         => $this->input->post('active'),
                    'txtUpdatedBy'     => $this->session->userdata('fullname'),
                    'dtmUpdatedDate'        => date('Y-m-d h:i:sa'),
                   );
      $this->db->where('intKaryawanID',$this->input->post('intKaryawanID'));
      $update=$this->db->update('mdwms_karyawan',$data);
      echo json_encode($update);
//      exit(var_dump($data));
    }
  }

  public function delete_role()
  {
    $role=$this->input->post('role');
        $data=$this->Roleacces_model->hapus_role($role);
        echo json_encode($data);
  }

  public function delete_allergen()
  {
    $id=$this->input->post('intAllergenID');
        $data=$this->Roleacces_model->hapus_allergen($id);
        echo json_encode($data);
  }

  public function delete_subdept()
  {
    $id=$this->input->post('intSubdeptID');
        $data=$this->Roleacces_model->hapus_subdept($id);
        echo json_encode($data);
  }

  public function delete_jobtitle()
  {
    $id=$this->input->post('intJobtitleID');
        $data=$this->Roleacces_model->hapus_jobtitle($id);
        echo json_encode($data);
  }

  public function delete_qtyperbag()
  {
    $id=$this->input->post('intQtyperbagID');
        $data=$this->Roleacces_model->hapus_qtyperbag($id);
        echo json_encode($data);
  }

  public function delete_employee()
  {
    $id=$this->input->post('intKaryawanID');
        $data=$this->Roleacces_model->hapus_employee($id);
        echo json_encode($data);
  }

///////////////////////////////////////Fungsi Lama////////////////////////////////////////////////
	public function simpan(){
      if($this->Roleacces_model->validation("save")){ // Jika validasi sukses atau hasil validasi adalah true
        $this->Roleacces_model->save(); // Panggil fungsi save() yang ada di Roleacces_model.php
        // Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
        $html = $this->load->view($content, $data, array('model'=>$this->Roleacces_model->view()), true);
        $callback = array(
          'status'=>'sukses',
          'pesan'=>'Data berhasil disimpan',
          'html'=>$html
        );
      }else{
        $callback = array(
          'status'=>'gagal',
          'pesan'=>validation_errors()
        );
      }
      echo json_encode($callback);
    }
    public function ubah($id){
      if($this->Roleacces_model->validation("update")){ // Jika validasi sukses atau hasil validasi adalah true
        $this->Roleacces_model->edit($id); // Panggil fungsi edit() yang ada di Roleacces_model.php
        // Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
        $html = $this->load->view($content, $data, array('model'=>$this->Roleacces_model->view()), true);
        $callback = array(
          'status'=>'sukses',
          'pesan'=>'Data berhasil diubah',
          'html'=>$html
        );
      }else{
        $callback = array(
          'status'=>'gagal',
          'pesan'=>validation_errors()
        );
      }
      echo json_encode($callback);
    }
    public function hapus($id)
    {
      $this->Roleacces_model->delete($id); // Panggil fungsi delete() yang ada di Roleacces_model.php
      // Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
      $html = $this->load->view($content, $data, array('model'=>$this->Roleacces_model->view()), true);
      $callback = array(
        'status'=>'sukses',
        'pesan'=>'Data berhasil dihapus',
        'html'=>$html
      );
      echo json_encode($callback);
    }
}