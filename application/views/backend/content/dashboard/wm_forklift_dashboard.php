<?php 
    date_default_timezone_set('Asia/Jakarta');
    $dateNow = date('Y-m-d H:i:s');
 ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DWMS | ATK Online</title>

    <link href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/'); ?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/'); ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/'); ?>css/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img/logodwms.png'); ?>">

    <link href="<?php echo base_url('assets/'); ?>css/plugins/summernote/summernote-bs4.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/'); ?>css/plugins/datapicker/datepicker3.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

    <div id="page-wrapper" class="gray-bg" style="width: 100%;">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header wrapper">
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group" style="margin-top: 15px; font-size: 20px; width: 300px;">
                    <span class="m-r-sm text-muted welcome-message">Welcome to <strong>DWMS System</strong></span>
                </div>
            </form>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <p style="font-size: 20px; margin-top: 15px; margin-right: 10px;">(Forklift WH)</p>
            </li>
            <li>
                <a href="<?php echo base_url('Page/web_manager'); ?>">
                    <i class="fa fa-sign-out"></i> Back
                </a>
            </li>
        </ul>
        </nav>
        </div><br>
        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li><a class="nav-link active" data-toggle="tab" href="#tab-4"> FOKLIFT WH</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-2"> ADD FORKLIFT WH</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-4" class="tab-pane active">
                                <div class="panel body"><br>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example">
                                            <thead style="text-align: center;">
                                              <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Deskripsi Foklift</th>
                                                <th>AREA</th>
                                                <th>PIC</th>
                                                <th>Status <br> Forklift</th>
                                                <th>Action</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach($forklift -> result_array() as $dt){
                                             ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><img src="<?php echo base_url() ?>/assets/img/forklift/<?php echo $dt['txtGambar_forklift']; ?>" style="width: 300px; height: 300px; margin-right: auto; margin-left: auto; display: block;"></td>
                                                    <td>
                                                        <h3 class="text-navy"><?php echo $dt['txtIdentifikasi']; ?></h3>
                                                        <h4 class="text-danger">Versi WH : <?php echo $dt['txtVersionwh']; ?></h4>
                                                        <h4 class="text-danger">Versi ENG : <?php echo $dt['txtVersioneng']; ?></h4>
                                                        <small>Merk :  <?php echo $dt['txtMerk']; ?> <br> Model : <?php echo $dt['txtModel']; ?> <br> SN : <?php echo $dt['txtSerialnumber']; ?> <br> Tahun Pembuatan : <?php echo $dt['intTahunpembuatan']; ?> <br> Battery : <?php echo $dt['intBattery']; ?> Volt <br> Basic Capacity : <?php echo $dt['intBasiccapacity']; ?> ton <br> Delivery Date : <?php echo date('d-m-Y', strtotime($dt['dtmDeliverydate'])); ?> <br> Tanggal Update : <?php if($dt['dtmUpdatedDate_forklift'] == '0000-00-00 00:00:00'){echo date('d-m-Y H:i:s', strtotime($dt['dtmInsertedDate_forklift']));}else{echo date('d-m-Y H:i:s', strtotime($dt['dtmUpdatedDate_forklift']));} ?></small>
                                                    </td>
                                                    <td style="text-align: center;"><?php echo $dt['txtArea']; ?></td>
                                                    <td style="text-align: center;"><?php echo $dt['txtPicforklift']; ?></td>
                                                    <td style="text-align: center;">
                                                        <?php if($dt['bitIdle'] == 1){ ?>
                                                            <span class="label label-primary">Ready</span>
                                                        <?php }else if($dt['bitUsed'] == 1){ ?>
                                                            <span class="label label-info">Sedang <br> Digunakan</span>
                                                        <?php }else if($dt['bitRepair'] == 1){ ?>
                                                            <span class="label label-warning">Sedang <br> Perbaikan</span>
                                                        <?php }else if($dt['bitUsed'] == 1){ ?>
                                                            <span class="label label-danger">Breakdown</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td style="text-align: center;"><button class="btn btn-info" title="Edit" target="modal-edit" onclick="detail(<?php echo $dt['intForkliftwhID']; ?>)"><i class="fa fa-edit"></i></button></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    <form method="POST" action="<?php echo base_url('web_manager/insert_forklift'); ?>" enctype="multipart/form-data">
                                    <fieldset>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">IDENTIFIKASI :</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="txtIdentifikasi">
                                                    <option value="COUNTER BALANCE">COUNTER BALANCE</option>
                                                    <option value="GASOLINE">GASOLINE</option>
                                                    <option value="PALET MOVER">PALET MOVER</option>
                                                    <option value="PALET MOVER DOUBLE">PALET MOVER DOUBLE</option>
                                                    <option value="REACH TRUCK">REACH TRUCK</option>
                                                    <option value="STACKER">STACKER</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">VERSI WH :</label>
                                            <div class="col-sm-10"><input type="text" name="txtVersionwh" id="txtUomatk" class="form-control" placeholder="Inputkan Versi WH" required></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">VERSI ENG :</label>
                                            <div class="col-sm-10"><input type="text" name="txtVersioneng" class="form-control" placeholder="Inputkan Versi ENG " required></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">MERK :</label>
                                            <div class="col-sm-10"><input type="text" name="txtMerk" class="form-control" placeholder="Inputkan Merk" required></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">MODEL :</label>
                                            <div class="col-sm-10"><input type="text" name="txtModel" class="form-control" placeholder="Inputkan Model" required></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">AREA :</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="txtArea">
                                                    <option value="DISPENSING">DISPENSING</option>
                                                    <option value="FG">FG</option>
                                                    <option value="PM">PM</option>
                                                    <option value="RM">RM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">SERIAL NUMBER :</label>
                                            <div class="col-sm-10"><input type="text" name="txtSerialnumber" class="form-control" placeholder="Inputkan Serial Number" required></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">TAHUN PEMBUATAN :</label>
                                            <div class="col-sm-10"><input type="number" name="intTahunpembuatan" class="form-control" placeholder="Inputkan Tahun Pembuatan" required></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">BATTERY :</label>
                                            <div class="col-sm-10"><input type="text" name="intBattery" class="form-control" placeholder="Inputkan Battery" required></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">BASIC CAPACITY :</label>
                                            <div class="col-sm-10"><input type="text" name="intBasiccapacity" class="form-control" placeholder="Inputkan Basic Capacity" required></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">DELIVERY DATE :</label>
                                            <div class="col-sm-10"><input type="date" name="dtmDeliverydate" class="form-control" placeholder="Inputkan Delivery Date" required></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">PIC FORKLIFT :</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="txtPicforklift">
                                                    <?php foreach($employee as $data){ ?>
                                                        <option value="<?php echo $data->txtNamakaryawan; ?>"><?php echo $data->txtNamakaryawan; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">Upload Gambar:</label>
                                            <div class="col-sm-10"><input type="file" name="txtGambar_forklift" class="form-control" placeholder="Upload Gambar Forklift (format : JPG, JPEG, IMG, IMAGE, PNG)" accept="image/x-png,image/img,image/jpeg,image/jpg,image/img" required></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12"><br><br>
                                                <button class="btn btn-primary" style="float: right;">ADD</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <input type="hidden" name="feedBack" value="Page/wm_forklift_dashboard">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal inmodal fade" id="modal" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form method="POST" action="<?php echo base_url('web_manager/update_forklift') ?>" enctype="multipart/form-data">
                <div class="modal-content animated fadeIn">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">
                            <span id="modal-title">DATA FORKLIFT</span>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-sm-6 col-form-label">IDENTIFIKASI : </label>
                                        <select class="form-control" name="txtIdentifikasi">
                                            <option id="txtIdentifikasi" class="txtIdentifikasi"></option>
                                            <option value="COUNTER BALANCE">COUNTER BALANCE</option>
                                            <option value="GASOLINE">GASOLINE</option>
                                            <option value="PALET MOVER">PALET MOVER</option>
                                            <option value="PALET MOVER DOUBLE">PALET MOVER DOUBLE</option>
                                            <option value="REACH TRUCK">REACH TRUCK</option>
                                            <option value="STACKER">STACKER</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-sm-6 col-form-label">MERK : </label>
                                        <input type="text" name="txtMerk" class="form-control" id="txtMerk">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-sm-6 col-form-label">VERSI WH : </label>
                                        <input type="text" name="txtVersionwh" class="form-control" id="txtVersionwh">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-sm-6 col-form-label">VERSI ENG : </label>
                                        <input type="text" name="txtVersioneng" class="form-control" id="txtVersioneng">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-sm-6 col-form-label">MODEL : </label>
                                        <input type="text" name="txtModel" class="form-control" id="txtModel">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-sm-6 col-form-label">SERIAL NUMBER : </label>
                                        <input type="text" name="txtSerialnumber" class="form-control" id="txtSerialnumber">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-sm-6 col-form-label">PIC : </label>
                                        <select class="form-control" name="txtPicforklift">
                                            <option id="txtPicforklift" class="txtPicforklift"></option>
                                            <?php foreach($employee as $dt){ ?>
                                                <option value="<?php echo $dt->txtNamakaryawan; ?>"><?php echo $dt->txtNamakaryawan; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-sm-6 col-form-label">AREA : </label>
                                        <select class="form-control" name="txtArea">
                                            <option id="txtArea" class="txtArea"></option>
                                            <option value="DISPENSING">DISPENSING</option>
                                            <option value="FG">FG</option>
                                            <option value="PM">PM</option>
                                            <option value="RM">RM</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-sm-6 col-form-label">TAHUN PEMBUATAN : </label>
                                        <input type="number" name="intTahunpembuatan" class="form-control" id="intTahunpembuatan">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-sm-6 col-form-label">BATTERY : </label>
                                        <input type="text" name="intBattery" class="form-control" id="intBattery">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-sm-6 col-form-label">BASIC CAPACITY : </label>
                                        <input type="text" name="intBasiccapacity" class="form-control" id="intBasiccapacity">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-sm-6 col-form-label">DELIVERY DATE : </label>
                                        <input type="text" name="dtmDeliverydate" class="form-control" id="dtmDeliverydate">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-sm-6 col-form-label">AKTIVASI : </label>
                                        <select class="form-control" name="bitActive_forklift">
                                            <option id="bitActive_forklift" class="bitActive_forklift"></option>
                                            <option value="1">AKTIVASI</option>
                                            <option value="0">NON AKTIVASI</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-sm-6 col-form-label">GAMBAR FORKLIFT : </label>
                                        <input type="file" id="txtGambar_forklift" name="txtGambar_forklift" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <p>
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </p>
                        <input type="hidden" name="txtGambar_forklift2" id="txtGambar_forklift2">
                        <input type="hidden" name="intForkliftwhID" id="intForkliftwhID">
                        <input type="hidden" name="feedBack" value="Page/wm_forklift_dashboard">
                    </div>
                </div>
                </form>
            </div>
        </div>
        
        <div class="footer">
            <div class="float-right">
                <strong>PT. KALBE MORINAGA INDONESIA</strong> 
            </div>
            <div>
                <strong>D-WMS Platform</strong>  &copy; 2019 - <?php echo date('Y'); ?>
            </div>
        </div>
    </div>

    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url('assets/'); ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/popper.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/bootstrap.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url('assets/'); ?>js/inspinia.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/plugins/pace/pace.min.js"></script>

    <!-- <script src="<?php echo base_url();?>assets/js/jQuery-2.1.4.min.js"></script> -->
    <script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>

    <!-- SUMMERNOTE -->
    <script src="<?php echo base_url();?>assets/js/plugins/summernote/summernote-bs4.js"></script>

    <!-- Data picker -->
    <script src="<?php echo base_url();?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- DATA TABLE -->
    <script src="<?php echo base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 50,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]
            });
        });
    </script>

    <script>
        $(document).ready(function(){

            $('.summernote').summernote();

            $('.input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

        });
    </script>

    <script>
        <?php 
            $flashdata = $this->session->flashdata('message');
            if($flashdata == 'true'){
         ?>
            swal({
              title: "SUCCESS",
              text: "FORKLIFT HAS BEEN INSERTED!",
              icon: "success",
              button: false,
              timer: 2500,
            })
        <?php }else if($flashdata == 'false2'){ ?>
            swal("PERINGATAN!","FILE YANG DIUPLOAD BUKAN GAMBAR","warning");
        <?php }else if($flashdata == 'true3'){ ?>
            swal({
              title: "SUCCESS",
              text: "FORKLIFT HAS BEEN UPDATED!",
              icon: "success",
              button: false,
              timer: 2500,
            })
        <?php }else if($flashdata == 'false'){ ?>            
            swal("PERINGATAN!","PROSES INSERT GAGAL !!!","warning");
        <?php }else if($flashdata == 'false3'){ ?>            
            swal("PERINGATAN!","PROSES UPDATE GAGAL !!!","warning");
        <?php } ?>
    </script>

    <script>
        function detail(intForkliftwhID){
            $.ajax({
                type : "POST",
                url : "<?php echo base_url('web_manager/get_forklift'); ?>",
                data : {intForkliftwhID : intForkliftwhID},
                success : function(data){
                    dt = JSON.parse(data);
                    $('#intForkliftwhID').val(dt.intForkliftwhID);
                    $('#txtIdentifikasi').val(dt.txtIdentifikasi);
                    $('.txtIdentifikasi').html(dt.txtIdentifikasi);
                    $('#txtArea').val(dt.txtArea);
                    $('.txtArea').html(dt.txtArea);
                    $('#txtPicforklift').val(dt.txtPicforklift);
                    $('.txtPicforklift').html(dt.txtPicforklift);
                    $('#txtMerk').val(dt.txtMerk);
                    $('#txtModel').val(dt.txtModel);
                    $('#txtVersionwh').val(dt.txtVersionwh);
                    $('#txtVersioneng').val(dt.txtVersioneng);
                    $('#txtSerialnumber').val(dt.txtSerialnumber);
                    $('#intTahunpembuatan').val(dt.intTahunpembuatan);
                    $('#intBattery').val(dt.intBattery);
                    $('#intBasiccapacity').val(dt.intBasiccapacity);
                    $('#dtmDeliverydate').val(dt.dtmDeliverydate);
                    $('#txtGambar_forklift').html(dt.txtGambar_forklift);
                    $('#txtGambar_forklift2').val(dt.txtGambar_forklift);
                    $('#bitActive_forklift').val(dt.bitActive_forklift);
                    var bitActive_forklift = dt.bitActive_forklift;
                    if(bitActive_forklift == 1){
                        $('.bitActive_forklift').html('AKTIVASI');
                    }else{
                        $('.bitActive_forklift').html('NON AKTIVASI');
                    }
                    $('#modal').modal('show');
                }
            })
        }
    </script>

    
</body>

</html>
