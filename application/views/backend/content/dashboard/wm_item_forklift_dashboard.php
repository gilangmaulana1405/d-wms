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

    <link href="<?php echo base_url('assets/'); ?>css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">

    <style type="text/css">
      .highcharts-figure, .highcharts-data-table table {
          min-width: 100%; 
          max-width: 100%;
          margin: 1em auto;
          margin-top: 50px;
      }

      .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
      }
      .highcharts-data-table caption {
          padding: 1em 0;
          font-size: 1.2em;
          color: #555;
      }
      .highcharts-data-table th {
        font-weight: 600;
          padding: 0.5em;
      }
      .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
          padding: 0.5em;
      }
      .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
          background: #f8f8f8;
      }
      .highcharts-data-table tr:hover {
          background: #f1f7ff;
      }
      #barChart {
          height: 600px;
      }
      #container {
          height: 500px;
      }
    </style>
    <script src="<?php echo base_url('assets/highCharts/') ?>code/highcharts.js"></script>
    <script src="<?php echo base_url('assets/highCharts/') ?>code/modules/data.js"></script>
    <script src="<?php echo base_url('assets/highCharts/') ?>code/modules/drilldown.js"></script>
    <script src="<?php echo base_url('assets/highCharts/') ?>code/modules/exporting.js"></script>
    <script src="<?php echo base_url('assets/highCharts/') ?>code/modules/export-data.js"></script>
    <script src="<?php echo base_url('assets/highCharts/') ?>code/modules/accessibility.js"></script>

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
                <p style="font-size: 20px; margin-top: 15px; margin-right: 10px;">(Item Forklift)</p>
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
                            <li><a class="nav-link active" data-toggle="tab" href="#tab-4"> ITEM FOKLIFT</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-2"> ADD ITEM FORKLIFT</a></li>
                            <!-- <li><a class="nav-link" data-toggle="tab" href="#tab-1"> Grafik SO ATK</a></li> -->
                        </ul>
                        <div class="tab-content">
                            <div id="tab-4" class="tab-pane active">
                                <div class="panel body"><br>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example">
                                            <thead style="text-align: center;">
                                              <tr>
                                                <th>No</th>
                                                <th>ITEM PART</th>
                                                <th>STANDARD</th>
                                                <th>TIME(MIN)</th>
                                                <th>TOOLS</th>
                                                <th>UNIT</th>
                                                <th>Barcode / QR</th>
                                                <th>SYMBOL</th>
                                                <th>ACTION</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach($forklift -> result_array() as $dt){
                                             ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $dt['txtItempart']; ?>
                                                    <td><?php echo $dt['txtStandard'] ?></td>
                                                    <td style="text-align: center;"><?php echo $dt['intTimemin']; ?> menit</td>
                                                    <td style="text-align: center;"><?php echo $dt['txtTools']; ?></td>
                                                    <td style="text-align: center;"><?php echo $dt['txtUnit']; ?></td>
                                                    <td style="text-align: center;"><?php echo $dt['txtBarcodeitem']; ?></td>
                                                    <td style="text-align: center;">
                                                        <?php if($dt['bitCleaning'] == 1 && $dt['bitInspection'] == 1 && $dt['bitLubrication'] == 1){ ?>
                                                            <img src="<?php echo base_url('assets/img/cleaning.png'); ?>" style="width: 20px; height: 20px;"><br>
                                                            <img src="<?php echo base_url('assets/img/inspection.png'); ?>" style="width: 20px; height: 20px;">
                                                            <img src="<?php echo base_url('assets/img/lubrication.png'); ?>" style="width: 20px; height: 20px;">
                                                        <?php }else if($dt['bitCleaning'] == 1 && $dt['bitInspection'] == 1 && $dt['bitLubrication'] == 0){ ?>
                                                            <img src="<?php echo base_url('assets/img/cleaning.png'); ?>" style="width: 20px; height: 20px;">
                                                            <img src="<?php echo base_url('assets/img/inspection.png'); ?>" style="width: 20px; height: 20px;">
                                                        <?php }else if($dt['bitCleaning'] == 1 && $dt['bitInspection'] == 0 && $dt['bitLubrication'] == 1){ ?>
                                                            <img src="<?php echo base_url('assets/img/cleaning.png'); ?>" style="width: 20px; height: 20px;">
                                                            <img src="<?php echo base_url('assets/img/lubrication.png'); ?>" style="width: 20px; height: 20px;">
                                                        <?php }else if($dt['bitCleaning'] == 0 && $dt['bitInspection'] == 1 && $dt['bitLubrication'] == 1){ ?>
                                                            <img src="<?php echo base_url('assets/img/inspection.png'); ?>" style="width: 20px; height: 20px;">
                                                            <img src="<?php echo base_url('assets/img/lubrication.png'); ?>" style="width: 20px; height: 20px;">
                                                        <?php }else if($dt['bitCleaning'] == 1 && $dt['bitInspection'] == 0 && $dt['bitLubrication'] == 0){ ?>
                                                            <img src="<?php echo base_url('assets/img/cleaning.png'); ?>" style="width: 20px; height: 20px;">
                                                        <?php }else if($dt['bitCleaning'] == 0 && $dt['bitInspection'] == 1 && $dt['bitLubrication'] == 0){ ?>
                                                            <img src="<?php echo base_url('assets/img/inspection.png'); ?>" style="width: 20px; height: 20px;">
                                                        <?php }else if($dt['bitCleaning'] == 0 && $dt['bitInspection'] == 0 && $dt['bitLubrication'] == 1){ ?>
                                                            <img src="<?php echo base_url('assets/img/lubrication.png'); ?>" style="width: 20px; height: 20px;">
                                                        <?php }else if($dt['bitCleaning'] == 0 && $dt['bitInspection'] == 0 && $dt['bitLubrication'] == 0){ ?>
                                                            <p style="text-align: center;"> - </p>
                                                        <?php } ?>
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <button class="btn btn-info" title="Edit" target="modal-edit" onclick="detail(<?php echo $dt['intItemforkliftID']; ?>)"><i class="fa fa-edit"></i></button>
                                                        <button class="btn btn-primary" title="SCAN QR" target="modal-edit" onclick="scan(<?php echo $dt['intItemforkliftID']; ?>)"><i class="fa fa-barcode"></i></button>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <table style="width: 30%; float : right;">
                                        <tr>
                                            <td>
                                                <img src="<?php echo base_url('assets/img/cleaning.png'); ?>" style="width: 30px; height: 30px;"> : Cleaning
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url('assets/img/inspection.png'); ?>" style="width: 30px; height: 30px;"> : Inspection
                                            </td>
                                            <td>
                                                <img src="<?php echo base_url('assets/img/lubrication.png'); ?>" style="width: 30px; height: 30px;"> : Lubrication
                                            </td>
                                        </tr>
                                    </table>
                                    <br><br><br><br><br>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    <form method="POST" action="<?php echo base_url('web_manager/insert_item_forklift'); ?>" enctype="multipart/form-data">
                                    <fieldset>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">ITEM PART :</label>
                                            <div class="col-sm-10"><input type="text" name="txtItempart" class="form-control" placeholder="Inputkan Item Part" required></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">STANDARD :</label>
                                            <div class="col-sm-10"><input type="text" name="txtStandard" class="form-control" placeholder="Inputkan Standard" required></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">TIME (MIN) :</label>
                                            <div class="col-sm-10"><input type="number" name="intTimemin" class="form-control" placeholder="Inputkan Time Minimal " required></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">TOOLS :</label>
                                            <div class="col-sm-10"><input type="text" name="txtTools" class="form-control" placeholder="Inputkan Tools" required></div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">UNIT :</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="txtUnit" >
                                                    <option value="KONDISI FISIK FORKLIFT">KONDISI FISIK FORKLIFT</option>
                                                    <option value="HIDROLIK">HIDROLIK</option>
                                                    <option value="ROBOTICS">ROBOTICS</option>
                                                    <option value="MAGAZINE">MAGAZINE</option>
                                                    <option value="FENCE (PAGAR)">FENCE (PAGAR)</option>
                                                    <option value="LANTAI">LANTAI</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">SYMBOL :</label>
                                            <div class="col-sm-10">
                                                <select data-placeholder="Pilih Symbol ..." class="chosen-select" multiple tabindex="4" name="txtSymbol[]">
                                                    <option value="CLEANING">CLEANING</option>
                                                    <option value="INSPECTION">INSPECTION</option>
                                                    <option value="LUBRICATION">LUBRICATION</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">PM :</label>
                                            <div class="col-sm-2">
                                                <select class="form-control" name="bitPm">
                                                    <option value="1">AKTIF</option>
                                                    <option value="0">NON AKTIF</option>
                                                </select>
                                            </div>
                                            <label class="col-sm-2 col-form-label" style="text-align: right;">Reach :</label>
                                            <div class="col-sm-2">
                                                <select class="form-control" name="bitReach">
                                                    <option value="1">AKTIF</option>
                                                    <option value="0">NON AKTIF</option>
                                                </select>
                                            </div>
                                            <label class="col-sm-2 col-form-label" style="text-align: right;">CB :</label>
                                            <div class="col-sm-2">
                                                <select class="form-control" name="bitCb">
                                                    <option value="1">AKTIF</option>
                                                    <option value="0">NON AKTIF</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12"><br><br>
                                                <button class="btn btn-primary" style="float: right;">ADD</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <input type="hidden" name="feedBack" value="Page/wm_item_forklift_dashboard">
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
                <form method="POST" action="<?php echo base_url('web_manager/update_item_forklift') ?>" enctype="multipart/form-data">
                <div class="modal-content animated fadeIn">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">
                            <span id="modal-title">DATA ITEM FORKLIFT</span>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">ITEM PARTS : </label>
                                        <input type="text" name="txtItempart" class="form-control" id="txtItempart">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">STANDARD : </label>
                                        <input type="text" name="txtStandard" class="form-control" id="txtStandard">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">TIME (MIN) : </label>
                                        <input type="text" name="intTimemin" class="form-control" id="intTimemin">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">TOOLS : </label>
                                        <input type="text" name="txtTools" class="form-control" id="txtTools">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">UNIT : </label>
                                        <select class="form-control" name="txtUnit">
                                            <option class="txtUnit" id="txtUnit"></option>
                                            <option value="KONDISI FISIK FORKLIFT">KONDISI FISIK FORKLIFT</option>
                                            <option value="HIDROLIK">HIDROLIK</option>
                                            <option value="ROBOTICS">ROBOTICS</option>
                                            <option value="MAGAZINE">MAGAZINE</option>
                                            <option value="FENCE (PAGAR)">FENCE (PAGAR)</option>
                                            <option value="LANTAI">LANTAI</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">AKTIVASI : </label>
                                        <select class="form-control" name="bitActive_item">
                                            <option id="bitActive_item" class="bitActive_item"></option>
                                            <option value="1">AKTIVASI</option>
                                            <option value="0">NON AKTIVASI</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">CLEANING : </label>
                                        <select class="form-control" name="bitCleaning">
                                            <option id="bitCleaning_item" class="bitCleaning_item"></option>
                                            <option value="1">AKTIVASI</option>
                                            <option value="0">NON AKTIVASI</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">PM : </label>
                                        <select class="form-control" name="bitPm">
                                            <option id="bitPm_item" class="bitPm_item"></option>
                                            <option value="1">AKTIVASI</option>
                                            <option value="0">NON AKTIVASI</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">INSPECTION : </label>
                                        <select class="form-control" name="bitInspection">
                                            <option id="bitInspection_item" class="bitInspection_item"></option>
                                            <option value="1">AKTIVASI</option>
                                            <option value="0">NON AKTIVASI</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">CB : </label>
                                        <select class="form-control" name="bitCb">
                                            <option id="bitCb_item" class="bitCb_item"></option>
                                            <option value="1">AKTIVASI</option>
                                            <option value="0">NON AKTIVASI</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">LUBRICATION : </label>
                                        <select class="form-control" name="bitLubrication">
                                            <option id="bitLubrication_item" class="bitLubrication_item"></option>
                                            <option value="1">AKTIVASI</option>
                                            <option value="0">NON AKTIVASI</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">REACH : </label>
                                        <select class="form-control" name="bitReach">
                                            <option id="bitReach_item" class="bitReach_item"></option>
                                            <option value="1">AKTIVASI</option>
                                            <option value="0">NON AKTIVASI</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <p>
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </p>
                        <input type="hidden" name="intItemforkliftID" id="intItemforkliftID">
                        <input type="hidden" name="feedBack" value="Page/wm_item_forklift_dashboard">
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="modal inmodal fade" id="modalScan" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content animated bounceInRight">
                    <div class="modal-header">
                        <i class="fa fa-barcode modal-icon"></i>
                        <h4 class="modal-title">Input Scan</h4>
                        <small class="font-bold">Masukkan Kode Scan Barcode / QR</small>
                    </div>
                    <form method="POST" action="<?php echo base_url('Web_manager/update_barcode') ?>">
                    <div style="margin : 10px;">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-normal">Kode Barcode / QR :</label>
                                        <input type="text" name="txtBarcodeitem" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-primary" style="float: right;" >Scan</button>
                                        <input type="hidden" name="intItemforkliftID" id="intItemforkliftID2">
                                        <input type="hidden" name="feedBack" value="Page/wm_item_forklift_dashboard">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
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

    <!-- Chosen -->
    <script src="<?php echo base_url();?>assets/js/plugins/chosen/chosen.jquery.js"></script>

    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
        }); 

        $('.chosen-select').chosen({width: "100%"});

    </script>

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
        <?php }else if($flashdata == 'true2'){ ?>
            swal({
              title: "SUCCESS",
              text: "PROSES SCAN BERHASIL!",
              icon: "success",
              button: false,
              timer: 2500,
            })
        <?php }else if($flashdata == 'false2'){ ?>
            swal("PERINGATAN!","PROSES SCAN GAGAL","warning");
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
        function detail(intItemforkliftID){
            $.ajax({
                type : "POST",
                url : "<?php echo base_url('web_manager/get_item_forklift'); ?>",
                data : {intItemforkliftID : intItemforkliftID},
                success : function(data){
                    dt = JSON.parse(data);
                    $('#intItemforkliftID').val(dt.intItemforkliftID);
                    $('#txtItempart').val(dt.txtItempart);
                    $('#txtStandard').val(dt.txtStandard);
                    $('#intTimemin').val(dt.intTimemin);
                    $('#txtTools').val(dt.txtTools);
                    $('#txtUnit').val(dt.txtUnit);
                    $('.txtUnit').html(dt.txtUnit);
                    $('#bitActive_item').val(dt.bitActive_item);
                    var bitActive_item = dt.bitActive_item;
                    if(bitActive_item == 1){
                        $('.bitActive_item').html('AKTIVASI');
                    }else{
                        $('.bitActive_item').html('NON AKTIVASI');
                    }
                    $('#bitPm_item').val(dt.bitPm);
                    var bitPm_item = dt.bitPm;
                    if(bitPm_item == 1){
                        $('.bitPm_item').html('AKTIVASI');
                    }else{
                        $('.bitPm_item').html('NON AKTIVASI');
                    }
                    $('#bitCb_item').val(dt.bitCb);
                    var bitCb_item = dt.bitCb;
                    if(bitCb_item == 1){
                        $('.bitCb_item').html('AKTIVASI');
                    }else{
                        $('.bitCb_item').html('NON AKTIVASI');
                    }
                    $('#bitReach_item').val(dt.bitReach);
                    var bitReach_item = dt.bitReach;
                    if(bitReach_item == 1){
                        $('.bitReach_item').html('AKTIVASI');
                    }else{
                        $('.bitReach_item').html('NON AKTIVASI');
                    }
                    $('#bitCleaning_item').val(dt.bitCleaning);
                    var bitCleaning_item = dt.bitCleaning;
                    if(bitCleaning_item == 1){
                        $('.bitCleaning_item').html('AKTIVASI');
                    }else{
                        $('.bitCleaning_item').html('NON AKTIVASI');
                    }
                    $('#bitInspection_item').val(dt.bitInspection);
                    var bitInspection_item = dt.bitInspection;
                    if(bitInspection_item == 1){
                        $('.bitInspection_item').html('AKTIVASI');
                    }else{
                        $('.bitInspection_item').html('NON AKTIVASI');
                    }
                    $('#bitLubrication_item').val(dt.bitLubrication);
                    var bitLubrication_item = dt.bitLubrication;
                    if(bitLubrication_item == 1){
                        $('.bitLubrication_item').html('AKTIVASI');
                    }else{
                        $('.bitLubrication_item').html('NON AKTIVASI');
                    }
                    $('#modal').modal('show');
                }
            })
        }
    </script>

    <script>
        function scan(intItemforkliftID){
            $('#intItemforkliftID2').val(intItemforkliftID);
            $('#modalScan').modal('show');
        }
    </script>

    
</body>

</html>
