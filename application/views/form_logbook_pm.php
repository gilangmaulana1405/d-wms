<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2><i class="fa fa-download fa-2x" style="color: #1ab394;"></i>  Import Log Book</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url('page/logbook_incoming');?>"><span class="fa fa-address-book" style="color: navy;"></span> Log Book Incoming/ </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Import Logbook</strong>
                        </li>
                    </ol>
                </div>
</div>
<div class="row wrapper wrapper-content animated fadeInRight">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                    <h5>Form Import Logbook</h5>
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
                <form method="post" action="<?php echo base_url("memo/form_logbook"); ?>" enctype="multipart/form-data">
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
                      echo "<form method='post' action='".base_url("memo/importlogbook")."'>";
                      
                      // Buat sebuah div untuk alert validasi kosong
                      echo "<div style='color: red;' id='kosong'>
                      Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                      </div>";
                      
                      echo "<table border='1' cellpadding='8'>
                      <tr>
                        <th colspan='16'>Preview Data</th>
                      </tr>
                      <tr>
                          <th>No Tag</th>
                          <th>Item Code KMI</th>
                          <th>Item Description</th>
                          <th>Lot</th>
                          <th>No Qan</th>
                          <th>Expired Date</th>
                          <th>No Sample</th>
                          <th>No Mobil</th>
                          <th>Inserted by</th>
                          <th>Inserted date</th>
                      </tr>";
                      
                      $numrow = 1;
                      $kosong = 0;
                      
                      // Lakukan perulangan dari data yang ada di excel
                      // $sheet adalah variabel yang dikirim dari controller
                      foreach($sheet as $row){ 
                        // Ambil data pada excel sesuai Kolom
                        $intTag                = $row['A'];
                        $txtItemcode           = $row['B']; // Ambil data NIS
                        $txtItemdescription    = $row['C']; // Ambil data nama
                        $txtSupplier_lotnumber = $row['D']; // Ambil data jenis kelamin
                        $txtLotnumber          = $row['E']; // Ambil data alamat
                        $dtmExpireddate        = $row['F'];
                        $txtSampleno           = $row['G'];
                        $txtRemark             = $row['H'];
                        $txtInsertedby         = $this->session->userdata("fullname");
                        $dtmInserted           = date("Y-m-d h:i:sa");

                        // Cek jika semua data tidak diisi
                        if($intTag == "" && $txtItemcode == "" && $txtItemdescription == "" && $txtSupplier_lotnumber == "" && $txtLotnumber == "" && $dtmExpireddate == "" && $txtSampleno == "" && $txtRemark == "" && $txtInsertedby == "" && $dtmInserted == "")
                          continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
                        
                        // Cek $numrow apakah lebih dari 1
                        // Artinya karena baris pertama adalah nama-nama kolom
                        // Jadi dilewat saja, tidak usah diimport
                        if($numrow > 1){
                          // Validasi apakah semua data telah diisi
                          $intTag_td = ( ! empty($intTag))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                          $txtItemcode_td = ( ! empty($txtItemcode))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                          $txtItemdescription_td = ( ! empty($txtItemdescription))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                          $txtSupplier_lotnumber_td = ( ! empty($txtSupplier_lotnumber))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                          $txtLotnumber_td = ( ! empty($txtLotnumber))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                          $dtmExpireddate_td = ( ! empty($dtmExpireddate))? "" : " style='background: #E07171;'";
                          $txtSampleno_td = ( ! empty($txtSampleno))? "" : " style='background: #E07171;'";
                          $txtRemark_td = ( ! empty($txtRemark))? "" : " style='background: #E07171;'";
                          $txtInsertedby_td = ( ! empty($txtInsertedby))? "" : " style='background: #E07171;'";
                          $dtmInserted_td = ( ! empty($dtmInserted))? "" : " style='background: #E07171;'";
                          
                          // Jika salah satu data ada yang kosong
                          if($intTag == "" or $txtItemcode == "" or $txtItemdescription == "" or $txtSupplier_lotnumber == "" or $txtLotnumber == "" or $dtmExpireddate == "" or $txtSampleno == "" or $txtRemark == "" or $txtInsertedby == "" or $dtmInserted == ""){
                            $kosong++; // Tambah 1 variabel $kosong
                          }
                          
                          echo "<tr>";
                          echo "<td".$intTag_td.">".$intTag."</td>";
                          echo "<td".$txtItemcode_td.">".$txtItemcode."</td>";
                          echo "<td".$txtItemdescription_td.">".$txtItemdescription."</td>";
                          echo "<td".$txtSupplier_lotnumber_td.">".$txtSupplier_lotnumber."</td>";
                          echo "<td".$txtLotnumber_td.">".$txtLotnumber."</td>";
                          echo "<td".$dtmExpireddate_td.">".$dtmExpireddate."</td>";
                          echo "<td".$txtSampleno_td.">".$txtSampleno."</td>";
                          echo "<td".$txtRemark_td.">".$txtRemark."</td>";
                          echo "<td".$txtInsertedby_td.">".$txtInsertedby."</td>";
                          echo "<td".$dtmInserted_td.">".$dtmInserted."</td>";
                          echo "</tr>";
                        }
                        
                        $numrow++; // Tambah 1 setiap kali looping
                      }
                      
                      echo "</table>";
                    }
                    
                    // Cek apakah variabel kosong lebih dari 0
                    // Jika lebih dari 0, berarti ada data yang masih kosong
                    if($kosong == 0 && $kosong != 0){
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