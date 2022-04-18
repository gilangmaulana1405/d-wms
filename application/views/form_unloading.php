<div class="row wrapper wrapper-content animated fadeInRight">
	<div class="col-lg-12">
		<div class="ibox">
			<div class="ibox-title">
                    <h5>Form Import</h5>
                     <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#" class="dropdown-item">Config option 1</a>
                                </li>
                                <li><a href="#" class="dropdown-item">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                    </div>
            </div>
            <div class="ibox-content">
                <a href="<?php echo base_url("excel/format.xlsx"); ?>">Download Format</a>
                <hr>
                <br>
<!--                <form method="post" action="<?php echo base_url("page/form"); ?>" enctype="multipart/form-data"> -->
                <form method="post" action="<?php echo base_url("memo/form_unloading"); ?>" enctype="multipart/form-data">
                    <input type="file" name="file" class="pull-left">
                    <input type="submit" name="preview" value="Preview">
                </form>
                <?php
                  if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
                    if(isset($upload_error)){ // Jika proses upload gagal
                      echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
                      die; // stop skrip
                    }else{

                      // Buat sebuah tag form untuk proses import data ke database
                      echo "<form method='post' action='".base_url("memo/import_unloading")."'>";
                      
                      // Buat sebuah div untuk alert validasi kosong
                      echo "<div style='color: red;' id='kosong'>
                      Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                      </div>";
                      echo "<div class='table-responsive'>";
                      echo "<table border='1' cellpadding='8'>
                      <tr>
                        <th colspan='45'>Preview Data</th>
                      </tr>
                      <tr>
                          <th rowspan='2'>No Barcode</th>
                          <th rowspan='2'>Item Code</th>
                          <th rowspan='2'>Item Desc</th>
                          <th rowspan='2'>Contain<br>Allergen</th>
                          <th rowspan='2'>QAN</th>
                          <th rowspan='2'>LOT</th>
                          <th rowspan='2'>ED</th>
                          <th style='text-align: center;' colspan='30'>Pallet</th>
                          <th rowspan='2'>Qty</th>
                          <th rowspan='2'>Uom</th>
                          <th rowspan='2'>Remark</th>
                          <th rowspan='2'>Aktif</th>
                          <th rowspan='2'>Hold</th>
                          <th rowspan='2'>Close</th>
                          <th rowspan='2'>Inserted by</th>
                          <th rowspan='2'>Inserted date</th>
                      </tr>
                      <tr>
                          <th style='text-align: center'>1</th>
                          <th style='text-align: center'>2</th>
                          <th style='text-align: center'>3</th>
                          <th style='text-align: center'>4</th>
                          <th style='text-align: center'>5</th>
                          <th style='text-align: center'>6</th>
                          <th style='text-align: center'>7</th>
                          <th style='text-align: center'>8</th>
                          <th style='text-align: center'>9</th>
                          <th style='text-align: center'>10</th>
                          <th style='text-align: center'>11</th>
                          <th style='text-align: center'>12</th>
                          <th style='text-align: center'>13</th>
                          <th style='text-align: center'>14</th>
                          <th style='text-align: center'>15</th>
                          <th style='text-align: center'>16</th>
                          <th style='text-align: center'>17</th>
                          <th style='text-align: center'>18</th>
                          <th style='text-align: center'>19</th>
                          <th style='text-align: center'>20</th>
                          <th style='text-align: center'>21</th>
                          <th style='text-align: center'>22</th>
                          <th style='text-align: center'>23</th>
                          <th style='text-align: center'>24</th>
                          <th style='text-align: center'>25</th>
                          <th style='text-align: center'>26</th>
                          <th style='text-align: center'>27</th>
                          <th style='text-align: center'>28</th>
                          <th style='text-align: center'>29</th>
                          <th style='text-align: center'>30</th>  
                      </tr>";
                      
                      $numrow = 1;
                      $kosong = 0;
                      
                      // Lakukan perulangan dari data yang ada di excel
                      // $sheet adalah variabel yang dikirim dari controller
                      foreach($sheet as $row){ 
                        // Ambil data pada excel sesuai Kolom
                        $txtActualBarcode           = $row['A']; 
                        $txtItemcode                = $row['B']; 
                        $txtDescription             = $row['C']; 
                        $txtContain                 = $row['D']; 
                        $txtLotnumber               = $row['E'];
                        $txtSupplier_lotnumber      = $row['F'];
                        $dtmExpireddate             = $row['G'];
                        $intPallet1                 = $row['H'];
                        $intPallet2                 = $row['I'];
                        $intPallet3                 = $row['J'];
                        $intPallet4                 = $row['K'];
                        $intPallet5                 = $row['L'];
                        $intPallet6                 = $row['M'];
                        $intPallet7                 = $row['N'];
                        $intPallet8                 = $row['O'];
                        $intPallet9                 = $row['P'];
                        $intPallet10                = $row['Q'];
                        $intPallet11                = $row['R'];
                        $intPallet12                = $row['S'];
                        $intPallet13                = $row['T'];
                        $intPallet14                = $row['U'];
                        $intPallet15                = $row['V'];
                        $intPallet16                = $row['W'];
                        $intPallet17                = $row['X'];
                        $intPallet18                = $row['Y'];
                        $intPallet19                = $row['Z'];
                        $intPallet20                = $row['AA'];
                        $intPallet21                = $row['AB'];
                        $intPallet22                = $row['AC'];
                        $intPallet23                = $row['AD'];
                        $intPallet24                = $row['AE'];
                        $intPallet25                = $row['AF'];
                        $intPallet26                = $row['AG'];
                        $intPallet27                = $row['AH'];
                        $intPallet28                = $row['AI'];
                        $intPallet29                = $row['AJ'];
                        $intPallet30                = $row['AK'];
                        $intQtyactual               = $row['AL'];
                        $txtUom                     = $row['AM'];
                        $txtRemark                  = $row['AN'];
                        $bitActive                  = $row['AO'];
                        $bitHold                    = $row['AP'];
                        $bitClose                   = $row['AQ'];
                        $txtInsertedby              = $this->session->userdata("fullname");
                        $dtmInserted                = date("Y-m-d h:i:sa");

                        // Cek jika semua data tidak diisi
                        if($txtActualBarcode == "" && $txtItemcode == "" && $txtDescription == "" && $txtContain == "" && $txtLotnumber == "" && $txtSupplier_lotnumber == "" && $dtmExpireddate == "" && $intPallet1 == "" && $intPallet2 == "" && $intPallet3 == "" && $intPallet4 == "" && $intPallet5 == "" && $intPallet6 == "" && $intPallet7 == "" && $intPallet8 == "" && $intPallet9 == "" && $intPallet10 == "" && $intPallet11 == "" && $intPallet12 == "" && $intPallet13 == "" && $intPallet14 == "" && $intPallet15 == "" && $intPallet16 == "" && $intPallet17 == "" && $intPallet18 == "" && $intPallet19 == "" && $intPallet20 == "" && $intPallet21 == "" && $intPallet22 == "" && $intPallet23 == "" && $intPallet24 == "" && $intPallet25 == "" && $intPallet26 == "" && $intPallet27 == "" && $intPallet28 == "" && $intPallet29 == "" && $intPallet30 == "" && $intQtyactual == "" && $txtUom == "" && $txtRemark == "" && $bitActive == "" && $bitHold == "" && $bitClose == "" && $txtInsertedby == "" && $dtmInserted == "")
                          continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
                        
                        // Cek $numrow apakah lebih dari 1
                        // Artinya karena baris pertama adalah nama-nama kolom
                        // Jadi dilewat saja, tidak usah diimport
                        if($numrow > 1){
                          // Validasi apakah semua data telah diisi
                          $txtActualBarcode_td      = ( ! empty($txtActualBarcode))? "" : " style='background: #E07171;'"; // 
                          $txtItemcode_td           = ( ! empty($txtItemcode))? "" : " style='background: #E07171;'"; 
                          $txtDescription_td        = ( ! empty($txtDescription))? "" : " style='background: #E07171;'"; // 
                          $txtContain_td            = ( ! empty($txtContain))? "" : " style='background: #E07171;'"; // 
                          $txtLotnumber_td          = ( ! empty($txtLotnumber))? "" : " style='background: #E07171;'";
                          $txtSupplier_lotnumber_td = ( ! empty($txtSupplier_lotnumber))? "" : " style='background: #E07171;'";
                          $dtmExpireddate_td        = ( ! empty($dtmExpireddate))? "" : " style='background: #E07171;'";
                          $intPallet1_td            = ( ! empty($intPallet1))? "" : " style='background: #E07171;'";
                          $intPallet2_td            = ( ! empty($intPallet2))? "" : " style='background: #E07171;'";
                          $intPallet3_td            = ( ! empty($intPallet3))? "" : " style='background: #E07171;'";
                          $intPallet4_td            = ( ! empty($intPallet4))? "" : " style='background: #E07171;'";
                          $intPallet5_td            = ( ! empty($intPallet5))? "" : " style='background: #E07171;'";
                          $intPallet6_td            = ( ! empty($intPallet6))? "" : " style='background: #E07171;'";
                          $intPallet7_td            = ( ! empty($intPallet7))? "" : " style='background: #E07171;'";
                          $intPallet8_td            = ( ! empty($intPallet8))? "" : " style='background: #E07171;'";
                          $intPallet9_td            = ( ! empty($intPallet9))? "" : " style='background: #E07171;'";
                          $intPallet10_td            = ( ! empty($intPallet10))? "" : " style='background: #E07171;'";
                          $intPallet11_td            = ( ! empty($intPallet11))? "" : " style='background: #E07171;'";
                          $intPallet12_td            = ( ! empty($intPallet12))? "" : " style='background: #E07171;'";
                          $intPallet13_td            = ( ! empty($intPallet13))? "" : " style='background: #E07171;'";
                          $intPallet14_td            = ( ! empty($intPallet14))? "" : " style='background: #E07171;'";
                          $intPallet15_td            = ( ! empty($intPallet15))? "" : " style='background: #E07171;'";
                          $intPallet16_td            = ( ! empty($intPallet16))? "" : " style='background: #E07171;'";
                          $intPallet17_td            = ( ! empty($intPallet17))? "" : " style='background: #E07171;'";
                          $intPallet18_td            = ( ! empty($intPallet18))? "" : " style='background: #E07171;'";
                          $intPallet19_td            = ( ! empty($intPallet19))? "" : " style='background: #E07171;'";
                          $intPallet20_td            = ( ! empty($intPallet20))? "" : " style='background: #E07171;'";
                          $intPallet21_td            = ( ! empty($intPallet21))? "" : " style='background: #E07171;'";
                          $intPallet22_td            = ( ! empty($intPallet22))? "" : " style='background: #E07171;'";
                          $intPallet23_td            = ( ! empty($intPallet23))? "" : " style='background: #E07171;'";
                          $intPallet24_td            = ( ! empty($intPallet24))? "" : " style='background: #E07171;'";
                          $intPallet25_td            = ( ! empty($intPallet25))? "" : " style='background: #E07171;'";
                          $intPallet26_td            = ( ! empty($intPallet26))? "" : " style='background: #E07171;'";
                          $intPallet27_td            = ( ! empty($intPallet27))? "" : " style='background: #E07171;'";
                          $intPallet28_td            = ( ! empty($intPallet28))? "" : " style='background: #E07171;'";
                          $intPallet29_td            = ( ! empty($intPallet29))? "" : " style='background: #E07171;'";
                          $intPallet30_td            = ( ! empty($intPallet30))? "" : " style='background: #E07171;'";
                          $intQtyactual_td           = ( ! empty($intQtyactual))? "" : " style='background: #E07171;'";
                          $txtUom_td                 = ( ! empty($txtUom))? "" : " style='background: #E07171;'";
                          $txtRemark_td              = ( ! empty($txtRemark))? "" : " style='background: #E07171;'";
                          $bitActive_td              = ( ! empty($bitActive))? "" : " style='background: #E07171;'";
                          $bitHold_td                = ( ! empty($bitHold))? "" : " style='background: #E07171;'";
                          $bitClose_td               = ( ! empty($bitClose))? "" : " style='background: #E07171;'";
                          $txtInsertedby_td          = ( ! empty($txtInsertedby))? "" : " style='background: #E07171;'";
                          $dtmInserted_td            = ( ! empty($dtmInserted))? "" : " style='background: #E07171;'";
                          
                          // Jika salah satu data ada yang kosong or
                          if($txtActualBarcode == "" or $txtItemcode == "" or $txtDescription == "" or $txtContain == "" or $txtLotnumber == "" or $txtSupplier_lotnumber == "" or $dtmExpireddate == "" or $intPallet1 == "" or $intPallet2 == "" or $intPallet3 == "" or $intPallet4 == "" or $intPallet5 == "" or $intPallet6 == "" or $intPallet7 == "" or $intPallet8 == "" or $intPallet9 == "" or $intPallet10 == "" or $intPallet11 == "" or $intPallet12 == "" or $intPallet13 == "" or $intPallet14 == "" or $intPallet15 == "" or $intPallet16 == "" or $intPallet17 == "" or $intPallet18 == "" or $intPallet19 == "" or $intPallet20 == "" or $intPallet21 == "" or $intPallet22 == "" or $intPallet23 == "" or $intPallet24 == "" or $intPallet25 == "" or $intPallet26 == "" or $intPallet27 == "" or $intPallet28 == "" or $intPallet29 == "" or $intPallet30 == "" or $intQtyactual == "" or $txtUom == "" or $txtRemark == "" or $bitActive == "" or $bitHold == "" or $bitClose == "" or $txtInsertedby == "" or $dtmInserted == ""){
                            $kosong++; // Tambah 1 variabel $kosong
                          }
                          
                          echo "<tr>";
                          echo "<td".$txtActualBarcode_td.">".$txtActualBarcode."</td>";
                          echo "<td".$txtItemcode_td.">".$txtItemcode."</td>";
                          echo "<td".$txtDescription_td.">".$txtDescription."</td>";
                          echo "<td".$txtContain_td.">".$txtContain."</td>";
                          echo "<td".$txtLotnumber_td.">".$txtLotnumber."</td>";
                          echo "<td".$txtSupplier_lotnumber_td.">".$txtSupplier_lotnumber."</td>";
                          echo "<td".$dtmExpireddate_td.">".$dtmExpireddate."</td>";
                          echo "<td".$intPallet1_td.">".$intPallet1."</td>";
                          echo "<td".$intPallet2_td.">".$intPallet2."</td>";
                          echo "<td".$intPallet3_td.">".$intPallet3."</td>";
                          echo "<td".$intPallet4_td.">".$intPallet4."</td>";
                          echo "<td".$intPallet5_td.">".$intPallet5."</td>";
                          echo "<td".$intPallet6_td.">".$intPallet6."</td>";
                          echo "<td".$intPallet7_td.">".$intPallet7."</td>";
                          echo "<td".$intPallet8_td.">".$intPallet8."</td>";
                          echo "<td".$intPallet9_td.">".$intPallet9."</td>";
                          echo "<td".$intPallet10_td.">".$intPallet10."</td>";
                          echo "<td".$intPallet11_td.">".$intPallet11."</td>";
                          echo "<td".$intPallet12_td.">".$intPallet12."</td>";
                          echo "<td".$intPallet13_td.">".$intPallet13."</td>";
                          echo "<td".$intPallet14_td.">".$intPallet14."</td>";
                          echo "<td".$intPallet15_td.">".$intPallet15."</td>";
                          echo "<td".$intPallet16_td.">".$intPallet16."</td>";
                          echo "<td".$intPallet17_td.">".$intPallet17."</td>";
                          echo "<td".$intPallet18_td.">".$intPallet18."</td>";
                          echo "<td".$intPallet19_td.">".$intPallet19."</td>";
                          echo "<td".$intPallet20_td.">".$intPallet20."</td>";
                          echo "<td".$intPallet21_td.">".$intPallet21."</td>";
                          echo "<td".$intPallet22_td.">".$intPallet22."</td>";
                          echo "<td".$intPallet23_td.">".$intPallet23."</td>";
                          echo "<td".$intPallet24_td.">".$intPallet24."</td>";
                          echo "<td".$intPallet25_td.">".$intPallet25."</td>";
                          echo "<td".$intPallet26_td.">".$intPallet26."</td>";
                          echo "<td".$intPallet27_td.">".$intPallet27."</td>";
                          echo "<td".$intPallet28_td.">".$intPallet28."</td>";
                          echo "<td".$intPallet29_td.">".$intPallet29."</td>";
                          echo "<td".$intPallet30_td.">".$intPallet30."</td>";
                          echo "<td".$intQtyactual_td.">".$intQtyactual."</td>";
                          echo "<td".$txtUom_td.">".$txtUom."</td>";
                          echo "<td".$txtRemark_td.">".$txtRemark."</td>";
                          echo "<td".$bitActive_td.">".$bitActive."</td>";
                          echo "<td".$bitHold_td.">".$bitHold."</td>";
                          echo "<td".$bitClose_td.">".$bitClose."</td>";
                          echo "<td".$txtInsertedby_td.">".$txtInsertedby."</td>";
                          echo "<td".$dtmInserted_td.">".$dtmInserted."</td>";
                          echo "</tr>";
                        }
                        
                        $numrow++; // Tambah 1 setiap kali looping
                      }
                      
                      echo "</table>";
                      echo "</div>";
                    }
                    
                    // Cek apakah variabel kosong lebih dari 0
                    // Jika lebih dari 0, berarti ada data yang masih kosong
                    if($kosong == 0 && $kosong =! 0){
                    ?>  
                      <script>
                      $(document).ready(function(){
                        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                        $("#jumlah_kosong").html('<?php echo $kosong; ?>');
                        
                        $("#kosong").show(); // Munculkan alert validasi kosong
                      });
                      </script>
                    <?php
                    }else{ // Jika semua data sudah diisi
                      echo "<hr>";
                      
                      // Buat sebuah tombol untuk mengimport data ke database
                      echo "<button type='submit' name='import'>Import</button>";
                      echo "<a href='".base_url("Memo")."'>Cancel</a>";
                    }
                    
                    echo "</form>";
                  }
                  ?>
            </div>
        </div>
    </div>
</div>