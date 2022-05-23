<?php 
    date_default_timezone_set('Asia/Jakarta');
    $dateNow = date("Y-m-d H:i:s");
 ?>
<div id="toast-container" class="toast-top-right" aria-live="polite" role="alert">
    
</div>

<!-- content -->
 <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Forklift Dashboards</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">My Profile</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Forklift Dashboard</strong>
                </li>
            </ol>
    </div>
    <div class="col-lg-2">

    </div>
 </div>

 <!-- cards -->
<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <?php foreach($forklift -> result_array() as $dt): ?>
                <div class="col-md-4 mb-3">
                    <div class="card" style="width: 18rem;">
                        <img src="<?php echo base_url() ?>/assets/img/forklift/<?php echo $dt['txtGambar_forklift']; ?>" style="width: 250px; height: 250px" class="card-img-top" alt="...">
                        <div class="product-desc">
                        
                        <?php if($dt['bitUsed'] == 1){ ?>
                            <div class="d-flex justify-content-end">
                                <div class="d-flex flex-row bd-highlight">
                                    <span class="label label-primary">OK</span>
                                </div>
                            </div> 
                        <?php } elseif($dt['bitRepair'] == 1){ ?>
                               <div class="d-flex justify-content-end">
                                <div class="d-flex flex-row bd-highlight">
                                    <span class="label label-warning">Repair</span>
                                </div>
                            </div>
                        <?php } elseif($dt['bitBreakdown'] == 1){ ?>
                               <div class="d-flex justify-content-end">
                                <div class="d-flex flex-row bd-highlight">
                                    <span class="label label-danger">Breakdown</span>
                                </div>
                            </div>
                        <?php } elseif($dt['bitIdle'] == 1){?>
                             <div class="d-flex justify-content-end">
                                  <div class="d-flex flex-row bd-highlight">
                                        <span class="label label-success">Idle</span>
                                  </div>
                             </div>
                        <?php }else{ ?>
                        <?php } ?>
                                    <small class="text-muted"><?=  $dt['txtMerk']; ?></small>
                                    <a href="#" class="product-name"> <?= $dt['txtVersioneng']; ?></a>

                                    <div class="small m-t-xs">
                                       Merupakan forklift jenis <?= $dt['txtIdentifikasi']; ?> Digunakan pada area <?= $dt['txtArea']; ?> sejak <?= $dt['dtmDeliverydate']; ?>
                                    </div>
                                    <div class="m-t text-righ">

                                        <a href=" <?= site_url('page/dashboard_forklift_detail/dashboard_forklift_detail?dt=') . $dt['intForkliftwhID']; ?>" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                    </div>
                        </div>
                    </div>
                </div>                
                <?php endforeach; ?>
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

<script>
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

