<?php 
    date_default_timezone_set('Asia/Jakarta');
    $dateNow = date("Y-m-d H:i:s");
 ?>
<div id="toast-container" class="toast-top-right" aria-live="polite" role="alert">
    
</div>

<!-- content -->
 <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Forklift Dashboards Detail</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">My Profile</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Forklift Dashboards</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Forklift Dashboards Detail</strong>
                </li>
            </ol>
    </div>
    <div class="col-lg-2">
        
        </div>
    </div>
    
    <!-- card detail -->
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                    <?php foreach($forklift -> result_array() as $dt): ?>
                    <div class="card mb-3" style="max-width: 1200px; height:400px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                            <img src="<?php echo base_url() ?>/assets/img/forklift/<?php echo $dt['txtGambar_forklift']; ?>" class="img-fluid rounded-start" alt="...">
                            
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                 <h2 class="font-bold m-b-xs">
                                        <?= $dt['txtVersioneng']; ?>
                                </h2>
                                <small><?php echo $dt['txtVersionwh']; ?></small>
                                    <hr>
                                    <dl class="row m-t-md medium">
                                        <dt class="col-md-4 text-right">Area : </dt>
                                        <dd class="col-md-8"><?= $dt['txtArea']; ?></dd>
                                        <dt class="col-md-4 text-right">Identifikasi :</dt>
                                        <dd class="col-md-8"><?= $dt['txtIdentifikasi']; ?></dd>
                                        <dt class="col-md-4 text-right">Merk :</dt>
                                        <dd class="col-md-8"><?= $dt['txtMerk']; ?></dd>
                                        <dt class="col-md-4 text-right">Model :</dt>
                                        <dd class="col-md-8"><?= $dt['txtModel']; ?></dd>
                                        <dt class="col-md-4 text-right">Serial Number :</dt>
                                        <dd class="col-md-8"><?= $dt['txtSerialnumber']; ?></dd>
                                        <dt class="col-md-4 text-right">Tahun Pembuatan :</dt>
                                        <dd class="col-md-8"><?= $dt['intTahunpembuatan']; ?></dd>
                                        <dt class="col-md-4 text-right">Battery :</dt>
                                        <dd class="col-md-8"><?= $dt['intBattery']; ?></dd>
                                    </dl>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Transaksi Forklift</h5>
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
                                 <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                    <tr>
                                        <th>Area</th>
                                        <th>Version WH</th>
                                        <th>Version ENG</th>
                                        <th>Serial Number</th>
                                        <th>PIC Forklift</th>
                                        <th>Jenis Cleaning</th>
                                        <th>Tahun Pembuatan</th>
                                        <th>Keterangan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($transaksi_forklift -> result_array() as $transaksi_forklift): ?>
                                        <tr class="gradeX">
                                            <td><?= $transaksi_forklift['txtArea']; ?></td>
                                            <td><?= $transaksi_forklift['txtJenisForklift_header']; ?></td>
                                            <td><?= $transaksi_forklift['txtVersioneng']; ?></td>
                                            <td><?= $transaksi_forklift['txtSerialnumber']; ?></td>
                                            <td><?= $transaksi_forklift['txtPicforklift']; ?></td>
                                            <td><?= $transaksi_forklift['txtjeniscleaning']; ?></td>
                                            <td><?= $transaksi_forklift['intTahunpembuatan']; ?></td>
                                            <td><?= $transaksi_forklift['txtketerangan']; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- end cards -->  




<!-- Mainly scripts -->
    <script src="<?php echo base_url('assets/'); ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/popper.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/bootstrap.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url('assets/'); ?>js/inspinia.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/plugins/pace/pace.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/plugins/slick/slick.min.js"></script>
    


<script>

$('.product-images').slick({
            dots: true
        });

     $('#pass-error').on("keyup", function(event){  
        event.preventDefault(); 
            var password = $('#password').val(); 
            var validasi_2 = "";
            var validasi_3 = "";
            var validasi_4 = "";
            // cek password containe atleast 1 uppercase,lowercase,angka, dan huruf
            var password_array = $('#password').val().split("");

            function inArray(needle,haystack)
            {
                var count=haystack.length;
                for(var i=0;i<count;i++)
                {
                    if(haystack[i]===needle){return true;}
                }
                return false;
            }

            for (let i = 0; i < password_array.length; i++) {
                if (password_array[i] == password_array[i].toUpperCase() && isNaN(password_array[i] * 1)  ){
                    validasi_2= "1";
                }
                else if (password_array[i] == password_array[i].toLowerCase()&& isNaN(password_array[i] * 1) ){
                    validasi_3= "1";
                }
                else if (!isNaN(password_array[i] * 1) ){
                    validasi_4= "1";
                }
            }

            if(validasi_2 == "1"  && validasi_3 == "1"  && validasi_4 == "1" ){
                var password = $('#password').val(); 
                $('#password').val(password);

                var pass_error = document.getElementById('pass-error');
                var btn = document.getElementById('btn');
                pass_error.setAttribute('class', 'form-group');
                btn.removeAttribute('disabled');
            }else{
                var pass_error = document.getElementById('pass-error');
                var btn = document.getElementById('btn');
                pass_error.setAttribute('class', 'form-group has-error');
                btn.setAttribute('disabled', 'disabled');
            }
    }); 
    </script>

    <script>
        function update(){
            var intUserID = "<?php echo $this->session->userdata('user_id'); ?>";
            var password = $('#password').val();
            var dateNow = "<?php echo $dateNow; ?>";

            $.ajax({
                type : "POST",
                url : "<?php echo base_url('Auth/update_password') ?>",
                data : {intUserID : intUserID, password : password, dateNow : dateNow},
                success : function(data){
                    if(data == 'true'){
                        swal({
                          title: "SUCCESS",
                          text: "PASSWORD HAS BEEN UPDATED!",
                          icon: "success",
                          button: false,
                          timer: 2500,
                        }).then(function(){
                            window.location.href = "<?=site_url('Page/profile_packaging/')?>";
                        });
                    }else{
                        swal("PERINGATAN!","PROSES UPDATE GAGAL !!!","warning");
                    }
                }
            })
        }
    </script>

