<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>DWMS - Main Dashboard</title>
	<meta http-equiv="refresh" content="60">

	<?php $this->load->view("backend/tamplate/head_all.php");?>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img/logodwms.png'); ?>">
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
<body id="page-top" class="landing-page no-skin-config">
<div class="navbar-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top navbar-expand-md" role="navigation">
        <div class="container">
            <a class="navbar-brand"><img src="<?=base_url()?>assets/img/kalbe.png" class="rounded" alt="image" height="70" width="150"></a>
            <div class="navbar-header page-scroll">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="nav-link page-scroll" href="#page-top">Home</a></li>
                    <li><a class="nav-link page-scroll" href="#features">Features</a></li>
                    <li><a class="nav-link page-scroll" href="#dashboard">Dashboard</a></li>
                    <li><a class="nav-link page-scroll" href="#team">Team</a></li>
                    <li><a class="nav-link page-scroll" href="<?php echo base_url('Page/web_manager') ?>">Web Manager</a></li>
                    <li><a class="nav-link page-scroll" href="<?php echo base_url ('auth/logout'); ?>">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div id="inSlider" class="carousel slide" data-ride="carousel" >
    <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class="active"></li>
        <li data-target="#inSlider" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div class="container">
                <div class="carousel-caption">
                    <h1>WELCOME TO<br/>
                        DWMS PLATFORM<br/>
                        you can control and<br/>
                        monitoring Warehouse from here.</h1>
                    <p>PT. Kalbe Morinaga Indonesia</p>
                    <p>
                        <a class="btn btn-lg btn-primary" href="#" role="button">READ MORE</a>
                        <a class="caption-link" href="#" role="button">Go To Features</a>
                    </p>
                </div>
                <div class="carousel-image wow zoomIn">
                    
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>

        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="carousel-caption blank">
                    <h1>DWMS PLATFORM <br/> A Journey to be Smart Warehouse.</h1>
                    <p>PT. Kalbe Morinaga Indonesia</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back two"></div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#inSlider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#inSlider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- first Section -->
<section id="features" class="container services">
    <div class="row">
        <div class="col-sm-3">
            <h2>DWMS Receiving Major</h2>
            <p>An Integration system that combine of digitalize receiving RM PM processes with Oracle system then utilize productivity of receiving.</p>
            <p><a class="navy-link" href="<?php echo base_url('page/profile');?>" role="button">Go to Application &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>DWMS Inventory</h2>
            <p>An Integration system that contains of locator information from all warehouse. So that operators or staff can monitor and know the Warehouse utilization.</p>
            <p><a class="navy-link" href="<?php echo base_url('page/profile_storage');?>" role="button">Go to Application &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>DWMS Preparation Major</h2>
            <p>An integration system that combine of digitalize preparation major, minor and packaging material processes with Oracle system then utilize productivity of preparation.</p>
            <p><a class="navy-link" href="#" role="button">Go to Application &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>DWMS Forklift</h2>
            <p>An Integration system that stores information data such as spesifications, repair maintenance reports forklift and filling CLI online.</p>
            <p><a class="navy-link" href="<?php echo base_url('page/profile_forklift');?>" role="button">Go to Application &raquo;</a></p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <h2>DWMS Preparation Minor</h2>
            <p>An Integration system that combine of Online Weighing processes with DWMS Platform then utilize productivity of Weighing.</p>
            <p><a class="navy-link" href="<?php echo base_url('page/profile_minor');?>" role="button">Go to Application &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>DWMS Receiving Packaging</h2>
            <p>An Integration system that combine of digitalize receiving RM PM processes with Oracle system then utilize productivity of receiving.</p>
            <p><a class="navy-link" href="<?php echo base_url('page/profile_packaging');?>" role="button">Go to Application &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>DWMS ATK Online</h2>
            <p>Provide equipment for the needs of Work Stationery for the Warehouse department. You can view available stock and place an order for Work Stationery here. </p>
            <p><a class="navy-link" href="<?php echo base_url('page/atk_dashboard');?>" role="button">Go to Application &raquo;</a></p>
        </div>
        <div class="col-sm-3">
            <h2>DWMS Suhu & RH Online</h2>
            <p>Collects temperature & RH data in the Warehouse department and displays it in a live graphic form. </p>
            <p><a class="navy-link" href="<?php echo base_url('page/srh_dashboard');?>" role="button">Go to Application &raquo;</a></p>
        </div>
    </div>
</section>
<!-- second Section -->
<section id="dashboard" class="container features">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1>Dashboard of Information<br/> <span class="navy"> DWMS Platform</span> </h1>
            <p>For The Period <?php echo date('Y'); ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="wrapper wrapper-content">
                    <div class="row justify-content-md-center">
                        <div class="col-lg-12">
                            <div class="slick_demo_2">
                                <a href="<?php echo base_url('Page/dashboard_receiving_rm'); ?>">
                                    <img src="<?php echo base_url('assets/'); ?>img/receiving_rm.png" style="width: 280px; height: 230px; margin-right: auto; margin-left: auto; display: block;">
                                    <h2 style="text-align: center; color: #495057;">Dashboard <br>Receiving RM</h2>
                                </a>

                                <a href="<?php echo base_url('Page/dashboard_receiving_pm'); ?>">
                                    <img src="<?php echo base_url('assets/'); ?>img/receiving_pm.png" style="width: 280px; height: 230px; margin-right: auto; margin-left: auto; display: block;">
                                    <h2 style="text-align: center; color: #495057;">Dashboard <br>Receiving PM</h2>
                                </a>
                                <a href="#">
                                    <img src="<?php echo base_url('assets/'); ?>img/inventory_rm.png" style="width: 280px; height: 230px; margin-right: auto; margin-left: auto; display: block;">
                                    <h2 style="text-align: center; color: #495057;">Dashboard <br>Inventory RM</h2>
                                </a>
                                <a href="#">
                                    <img src="<?php echo base_url('assets/'); ?>img/inventory_pm.png" style="width: 280px; height: 230px; margin-right: auto; margin-left: auto; display: block;">
                                    <h2 style="text-align: center; color: #495057;">Dashboard <br>Inventory PM</h2>
                                </a>
                                <a href="#">
                                    <img src="<?php echo base_url('assets/'); ?>img/preparation_major.png" style="width: 280px; height: 230px; margin-right: auto; margin-left: auto; display: block;">
                                    <h2 style="text-align: center; color: #495057;">Dashboard <br>Preparation Major</h2>
                                </a>
                                <a href="#">
                                    <img src="<?php echo base_url('assets/'); ?>img/preparation_minor.png" style="width: 280px; height: 230px; margin-right: auto; margin-left: auto; display: block;">
                                    <h2 style="text-align: center; color: #495057;">Dashboard <br>Preparation Minor</h2>
                                </a>
                                <a href="#">
                                    <img src="<?php echo base_url('assets/'); ?>img/utility_wh.png" style="width: 280px; height: 230px; margin-right: auto; margin-left: auto; display: block;">
                                    <h2 style="text-align: center; color: #495057;">Dashboard <br>Utility</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1><span class="navy">Graph of total RM material receipts</span> </h1>
            <p>For The Period <?php echo date('Y'); ?></p>
        </div>
    </div>
    <div class="row">
	    <div class="col-lg-12">
	        <div class="ibox">
                <div id="barChart" style="height: 400px;"></div>
	        </div>
	    </div>
	</div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1><span class="navy">Graph of total PM material receipts</span> </h1>
            <p>For The Period 2021</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div id="barChart2" style="height: 400px;"></div>
            </div>
        </div>
    </div><br><br>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox btn-group">
                <div id="pieChart" style="height: 300px;"></div>
                <div id="pieChart2" style="height: 300px;"></div>
            </div>
                <div id="pieChart3" style="height: 300px;"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="navy-line"></div>
            <h1><span class="navy">WH Utilization</span> </h1>
            <p>For The Period 2021</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-title">
                    <span class="label label-success float-right">Today</span>
                    <h5>Area RM 1</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">121</h1>
                    <div class="stat-percent font-bold text-success">64% <i class="fa fa-bolt"></i></div>
                    <small>Total Locator Kosong</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-title">
                    <span class="label label-success float-right">Today</span>
                    <h5>Area RM 2</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">146</h1>
                    <div class="stat-percent font-bold text-success">68% <i class="fa fa-bolt"></i></div>
                    <small>Total Locator Kosong</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-title">
                    <span class="label label-success float-right">Today</span>
                    <h5>Area PM</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">269</h1>
                    <div class="stat-percent font-bold text-success">77% <i class="fa fa-bolt"></i></div>
                    <small>Total Locator Kosong</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-title">
                    <span class="label label-success float-right">Today</span>
                    <h5>Area FG</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">1045</h1>
                    <div class="stat-percent font-bold text-success">78% <i class="fa fa-bolt"></i></div>
                    <small>Total Locator Kosong</small>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Utilisasi RM 1(%)</h5>
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
                        <canvas id="doughnutChart" width="200" height="200" style="margin: 18px auto 0"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Utilisasi RM 2 (%)</h5>
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
                    <canvas id="doughnutChart2" width="200" height="200" style="margin: 18px auto 0"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Utilisasi PM (%)</h5>
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
                    <canvas id="doughnutChart3" width="200" height="200" style="margin: 18px auto 0"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Utilisasi FG (%)</h5>
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
                    <canvas id="doughnutChart4" width="200" height="200" style="margin: 18px auto 0"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 text-center wow fadeInLeft">
            <div>
                <i class="fa fa-mobile features-icon"></i>
                <h2>Full responsive</h2>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
            </div>
            <div class="m-t-lg">
                <i class="fa fa-bar-chart features-icon"></i>
                <h2>6 Charts Library</h2>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
            </div>
        </div>
        <div class="col-md-6 text-center  wow zoomIn">
            <img src="<?php echo base_url('assets/img/LOGO_DWMS.png') ?>" alt="dashboard" class="img-fluid">
        </div>
        <div class="col-md-3 text-center wow fadeInRight">
            <div>
                <i class="fa fa-envelope features-icon"></i>
                <h2>Mail pages</h2>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
            </div>
            <div class="m-t-lg">
                <i class="fa fa-google features-icon"></i>
                <h2>AngularJS version</h2>
                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.</p>
            </div>
        </div>
    </div>
</section>
<!-- Third Section -->
<section id="team" class="gray-section team">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>DWMS Team</h1>
                <p>PT. Kalbe Morinaga Indonesia</p>
            </div>
        </div>
        <div class="row">
            <?php foreach($team -> result_array() as $dt){ ?>
            <div class="col-sm-4 wow fadeInLeft" style="margin-right: auto; margin-left: auto; display: block; margin-bottom: 15px;">
                <div class="team-member">
                    <img src="<?php echo base_url('assets/img/profile/') ?><?php echo $dt['txtGambarteam']; ?>" class="img-fluid rounded-circle img-small" alt="">
                    <?php 
                        $n = $dt['txtNamateam'];
                        $o = explode(' ', $n)[0];
                        $p = explode($o, $n)[1];
                     ?>
                    <h4><span class="navy"><?php echo $o; ?></span> <?php echo $p; ?></h4>
                    <p><b><?php echo $dt['txtDivisiteam']; ?></b> - <?php echo $dt['txtJobteam']; ?><br>
                    <?php echo $dt['txtEmailteam']; ?> <br> <?php echo $dt['txtHPteam']; ?></p>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center m-t-lg m-b-lg">
                <p>D-WMS Platform | Since 2019 - <?php echo date('Y'); ?> <br>
                PT. Kalbe Morinaga Indonesia</p>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view("backend/tamplate/js.php");?>
<style>
        .slick_demo_2 .ibox-content {
            margin: 0 10px;
        }
    </style>

    <script>
        $(document).ready(function(){


            $('.slick_demo_1').slick({
                dots: true
            });

            $('.slick_demo_2').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

            $('.slick_demo_3').slick({
                infinite: true,
                speed: 500,
                fade: true,
                cssEase: 'linear',
                adaptiveHeight: true
            });
        });

    </script>
<script type="text/javascript">
Highcharts.chart('barChart', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
            <?php 
                $tahun = date('Y');
                $bulan = $this->db->query("SELECT distinct MONTH(dtmTgl_bpb) AS bln FROM mdwms_receiving WHERE bitActive = '1' AND YEAR(dtmTgl_bpb) = '$tahun' ");
                foreach($bulan ->result_array() as $b){
                    if($b['bln'] == "01"){
                        $bulan = "Jan";
                    }else if($b['bln'] == "02"){
                        $bulan = "Feb";
                    }else if($b['bln'] == "03"){
                        $bulan = "Mar";
                    }else if($b['bln'] == "04"){
                        $bulan = "Apr";
                    }else if($b['bln'] == "05"){
                        $bulan = "Mei";
                    }else if($b['bln'] == "06"){
                        $bulan = "Jun";
                    }else if($b['bln'] == "07"){
                        $bulan = "Jul";
                    }else if($b['bln'] == "08"){
                        $bulan = "Aug";
                    }else if($b['bln'] == "09"){
                        $bulan = "Sep";
                    }else if($b['bln'] == "10"){
                        $bulan = "Oct";
                    }else if($b['bln'] == "11"){
                        $bulan = "Nov";
                    }else if($b['bln'] == "12"){
                        $bulan = "Dec";
                    }
                    echo "'".$bulan."'".",";
                }
             ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Material (Kg)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} Kg</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.1,
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}'
            }
        }
    },
    series: [{
        name: 'Total Qty',
        data: [
          <?php 
            $tahun = date('Y');
            $bulan = $this->db->query("SELECT distinct MONTH(dtmTgl_bpb) AS bln FROM mdwms_receiving WHERE bitActive = '1' AND YEAR(dtmTgl_bpb) = '$tahun' ");
            foreach($bulan -> result_array() as $b){
                $bulan = $b['bln'];

                $data = $this -> db -> query("SELECT SUM(intQty) AS jmlh FROM mdwms_receiving WHERE MONTH(dtmTgl_bpb) = '$bulan' AND YEAR(dtmTgl_bpb) = '$tahun' AND bitActive = '1' ");
                foreach($data -> result_array() as $dt){
                  echo $dt['jmlh'].",";
                }
            }
          ?>
          ],
        color : '#28a745'
    }, {
        name: 'Qty Closed',
        data: [
          <?php 
            $tahun = date('Y');
            $bulan = $this->db->query("SELECT distinct MONTH(dtmTgl_bpb) AS bln FROM mdwms_receiving WHERE bitActive = '1' AND YEAR(dtmTgl_bpb) = '$tahun' ");
            foreach($bulan -> result_array() as $b){
                $bulan = $b['bln'];

                $data = $this -> db -> query("SELECT SUM(intQty) AS jmlh FROM mdwms_receiving WHERE MONTH(dtmTgl_bpb) = '$bulan' AND YEAR(dtmTgl_bpb) = '$tahun' AND bitActive = '1' AND bitClose ='1' ");
                foreach($data -> result_array() as $dt){
                  echo $dt['jmlh'].",";
                }
            }
          ?>
          ],
        color : '#007bff'
    }]
});
</script>

<script type="text/javascript">
Highcharts.chart('barChart2', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
            <?php 
                $tahun = date('Y');
                $bulan = $this->db->query("SELECT distinct MONTH(dtmTgl_bpb) AS bln FROM mdwms_receiving_pm WHERE bitActive = '1' AND YEAR(dtmTgl_bpb) = '$tahun' ");
                foreach($bulan ->result_array() as $b){
                    if($b['bln'] == "01"){
                        $bulan = "Jan";
                    }else if($b['bln'] == "02"){
                        $bulan = "Feb";
                    }else if($b['bln'] == "03"){
                        $bulan = "Mar";
                    }else if($b['bln'] == "04"){
                        $bulan = "Apr";
                    }else if($b['bln'] == "05"){
                        $bulan = "Mei";
                    }else if($b['bln'] == "06"){
                        $bulan = "Jun";
                    }else if($b['bln'] == "07"){
                        $bulan = "Jul";
                    }else if($b['bln'] == "08"){
                        $bulan = "Aug";
                    }else if($b['bln'] == "09"){
                        $bulan = "Sep";
                    }else if($b['bln'] == "10"){
                        $bulan = "Oct";
                    }else if($b['bln'] == "11"){
                        $bulan = "Nov";
                    }else if($b['bln'] == "12"){
                        $bulan = "Dec";
                    }
                    echo "'".$bulan."'".",";
                }
             ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Material (Kg)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.0f} Kg</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.1,
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}'
            }
        }
    },
    series: [{
        name: 'Total Qty',
        data: [
          <?php 
            $tahun = date('Y');
            $bulan = $this->db->query("SELECT distinct MONTH(dtmTgl_bpb) AS bln FROM mdwms_receiving_pm WHERE bitActive = '1' AND YEAR(dtmTgl_bpb) = '$tahun' ");
            foreach($bulan -> result_array() as $b){
                $bulan = $b['bln'];

                $data = $this -> db -> query("SELECT SUM(intQty) AS jmlh FROM mdwms_receiving_pm WHERE MONTH(dtmTgl_bpb) = '$bulan' AND YEAR(dtmTgl_bpb) = '$tahun' AND bitActive = '1' ");
                foreach($data -> result_array() as $dt){
                  echo $dt['jmlh'].",";
                }
            }
          ?>
          ],
        color : '#28a745'
    }, {
        name: 'Qty Closed',
        data: [
          <?php 
            $tahun = date('Y');
            $bulan = $this->db->query("SELECT distinct MONTH(dtmTgl_bpb) AS bln FROM mdwms_receiving_pm WHERE bitActive = '1' AND YEAR(dtmTgl_bpb) = '$tahun' ");
            foreach($bulan -> result_array() as $b){
                $bulan = $b['bln'];

                $data = $this -> db -> query("SELECT SUM(intQty) AS jmlh FROM mdwms_receiving_pm WHERE MONTH(dtmTgl_bpb) = '$bulan' AND YEAR(dtmTgl_bpb) = '$tahun' AND bitActive = '1' AND bitClose ='1' ");
                foreach($data -> result_array() as $dt){
                  echo $dt['jmlh'].",";
                }
            }
          ?>
          ],
        color : '#007bff'
    }]
});
</script>

<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '#navbar',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>
<script>
        $(document).ready(function() {
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data2 = [
                [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
                [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
                [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
                [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
                [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
                [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
                [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
                [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
            ];

            var data3 = [
                [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
                [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
                [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
                [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
                [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
                [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
                [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
                [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
            ];

            var data4 = [
                [gd(2012, 1, 1), 4120], [gd(2012, 2, 1), 4050], [gd(2012, 3, 1), 4051], [gd(2012, 4, 1), 4002], [gd(2012, 5, 1), 4002],
                [gd(2012, 6, 1), 4103], [gd(2012, 7, 1), 4164], [gd(2012, 8, 1), 4185]
            ];

            var data5 = [
                [gd(2012, 1, 1), 3889], [gd(2012, 2, 1), 3889], [gd(2012, 3, 1), 3889], [gd(2012, 4, 1), 3889], [gd(2012, 5, 1), 3889],
                [gd(2012, 6, 1), 3889], [gd(2012, 7, 1), 3889], [gd(2012, 8, 1), 3889],
            ];


            var dataset = [
                {
                    label: "Productivity",
                    data: data4,
                    color: "#1ab394",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth:0
                    }

                }, {
                    label: "Target",
                    data: data5,
                    yaxis: 2,
                    color: "#1C84C6",
                    lines: {
                        lineWidth:1,
                            show: true,
                            fill: false,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.4
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [1, "month"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#d5d5d5"
                },
                yaxes: [{
                    position: "left",
                    max: 5000,
                    color: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    clolor: "#d5d5d5",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }
                ],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0
                }
            };

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null, previousLabel = null;

            $.plot($("#flot-dashboard-chart"), dataset, options);

            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
</script>
<script>
        $(document).ready(function(){
            var doughnutData = {
                labels: ["Used","Not Used" ],
                datasets: [{
                    data: [64,36],
                    backgroundColor: ["#a3e1d4","#dedede"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: true
                }
            };


            var ctx4 = document.getElementById("doughnutChart").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

            var doughnutData = {
                labels: ["Used","Not Used"],
                datasets: [{
                    data: [68,32],
                    backgroundColor: ["#a3e1d4","#dedede"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: true
                }
            };


            var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

            var doughnutData = {
                labels: ["Used","Not Used"],
                datasets: [{
                    data: [77,23],
                    backgroundColor: ["#a3e1d4","#dedede"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: true
                }
            };


            var ctx4 = document.getElementById("doughnutChart3").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

            var doughnutData = {
                labels: ["Used","Not Used"],
                datasets: [{
                    data: [78,22],
                    backgroundColor: ["#a3e1d4","#dedede"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: true
                }
            };


            var ctx4 = document.getElementById("doughnutChart4").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

            $("#todo, #inprogress, #completed").sortable({
                connectWith: ".connectList",
                update: function( event, ui ) {

                    var todo = $( "#todo" ).sortable( "toArray" );
                    var inprogress = $( "#inprogress" ).sortable( "toArray" );
                    var completed = $( "#completed" ).sortable( "toArray" );
                    $('.output').html("ToDo: " + window.JSON.stringify(todo) + "<br/>" + "In Progress: " + window.JSON.stringify(inprogress) + "<br/>" + "Completed: " + window.JSON.stringify(completed));
                }
            }).disableSelection();

        });
</script>
<script type="text/javascript">
// Create the chart
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent market share'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: "Browsers",
            colorByPoint: true,
            data: [
                {
                    name: "Jan",
                    y: 4120.9,
                    drilldown: null
                },
                {
                    name: "Feb",
                    y: 4050.8,
                    drilldown: null
                },
                {
                    name: "Mar",
                    y: 4051.7,
                    drilldown: null
                },
                {
                    name: "Apr",
                    y: 4002.7,
                    drilldown: null
                },
                {
                    name: "Mei",
                    y: 4002.8,
                    drilldown: null
                },
                {
                    name: "Jun",
                    y: 4103.6,
                    drilldown: null
                },
                {
                    name: "Jul",
                    y: 4164.0,
                    drilldown: null
                },
                {
                    name: "Aug",
                    y: 4161.9,
                    drilldown: null
                },
                {
                    name: "Sep",
                    y: 4195.0,
                    drilldown: null
                }
            ]
        }
    ]
});
</script>
<script type="text/javascript">
    Highcharts.chart('pieChart', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Graph of Accuracy Delivery RM'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Open',
                color : '#f5aa42',
                sliced: true,
                selected: true,
                y: 
                <?php 
                    $tahun = date('Y');
                    $bulan = date('m');
                    $hari = date('d');
                    $query = $this->db->query("SELECT count(intMemoID) AS jmlh FROM mdwms_memo WHERE bitActive = '1' AND YEAR(dtmInserted) = '$tahun' AND MONTH(dtmInserted) = '$bulan' AND DAY(dtmInserted) = '$hari' AND bitOpen = '1' ")->row_array();
                    $total = $query['jmlh'];
                    echo ($total);
                ?>
            }, {
                name: 'Closed',
                color : '#007bff',
                y: 
                <?php 
                    $tahun = date('Y');
                    $bulan = date('m');
                    $hari = date('d');
                    $query = $this->db->query("SELECT count(intMemoID) AS jmlh FROM mdwms_memo WHERE bitActive = '1' AND YEAR(dtmInserted) = '$tahun' AND MONTH(dtmInserted) = '$bulan' AND DAY(dtmInserted) = '$hari' AND bitClose = '1' ")->row_array();
                    $total = $query['jmlh'];
                    echo ($total);
                ?>
            }]
        }]
    });
</script>
<script type="text/javascript">
    Highcharts.chart('pieChart2', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Graph of Accuracy Quality RM'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Open',
                color : '#f5aa42',
                sliced: true,
                selected: true,
                y: 
                <?php 
                    $tahun = date('Y');
                    $bulan = date('m');
                    $hari = date('d');
                    $query = $this->db->query("SELECT count(intLogbookID) AS jmlh FROM mdwms_logbookqc WHERE bitActive = '1' AND YEAR(dtmInserted) = '$tahun' AND MONTH(dtmInserted) = '$bulan' AND DAY(dtmInserted) = '$hari' AND bitOpen = '1' ")->row_array();
                    $total = $query['jmlh'];
                    echo ($total);
                ?>
            }, {
                name: 'Progress',
                color : '#28a745',
                y: 
                <?php 
                    $tahun = date('Y');
                    $bulan = date('m');
                    $hari = date('d');
                    $query = $this->db->query("SELECT count(intLogbookID) AS jmlh FROM mdwms_logbookqc WHERE bitActive = '1' AND YEAR(dtmInserted) = '$tahun' AND MONTH(dtmInserted) = '$bulan' AND DAY(dtmInserted) = '$hari' AND bitProgress = '1' ")->row_array();
                    $total = $query['jmlh'];
                    echo ($total);
                ?>
            }, {
                name: 'Hold',
                color : '#e02626',
                y: 
                <?php 
                    $tahun = date('Y');
                    $bulan = date('m');
                    $hari = date('d');
                    $query = $this->db->query("SELECT count(intLogbookID) AS jmlh FROM mdwms_logbookqc WHERE bitActive = '1' AND YEAR(dtmInserted) = '$tahun' AND MONTH(dtmInserted) = '$bulan' AND DAY(dtmInserted) = '$hari' AND bitHold = '1' ")->row_array();
                    $total = $query['jmlh'];
                    echo ($total);
                ?>
            }, {
                name: 'Closed',
                color : '#007bff',
                y: 
                <?php 
                    $tahun = date('Y');
                    $bulan = date('m');
                    $hari = date('d');
                    $query = $this->db->query("SELECT count(intLogbookID) AS jmlh FROM mdwms_logbookqc WHERE bitActive = '1' AND YEAR(dtmInserted) = '$tahun' AND MONTH(dtmInserted) = '$bulan' AND DAY(dtmInserted) = '$hari' AND bitClose = '1' ")->row_array();
                    $total = $query['jmlh'];
                    echo ($total);
                ?>
            }]
        }]
    });
</script>
<script type="text/javascript">
    Highcharts.chart('pieChart3', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Graph of Accuracy Receiving RM'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Open',
                color : '#f5aa42',
                sliced: true,
                selected: true,
                y: 
                <?php 
                    $tahun = date('Y');
                    $bulan = date('m');
                    $hari = date('d');
                    $query = $this->db->query("SELECT count(intReceivingID) AS jmlh FROM mdwms_receiving WHERE bitActive = '1' AND YEAR(dtmInserted) = '$tahun' AND MONTH(dtmInserted) = '$bulan' AND DAY(dtmInserted) = '$hari' AND bitOpen = '1' ")->row_array();
                    $total = $query['jmlh'];
                    echo ($total);
                ?>
            }, {
                name: 'Progress',
                color : '#28a745',
                y: 
                <?php 
                    $tahun = date('Y');
                    $bulan = date('m');
                    $hari = date('d');
                    $query = $this->db->query("SELECT count(intReceivingID) AS jmlh FROM mdwms_receiving WHERE bitActive = '1' AND YEAR(dtmInserted) = '$tahun' AND MONTH(dtmInserted) = '$bulan' AND DAY(dtmInserted) = '$hari' AND bitProgress = '1' ")->row_array();
                    $total = $query['jmlh'];
                    echo ($total);
                ?>
            }, {
                name: 'Hold',
                color : '#e02626',
                y: 
                <?php 
                    $tahun = date('Y');
                    $bulan = date('m');
                    $hari = date('d');
                    $query = $this->db->query("SELECT count(intReceivingID) AS jmlh FROM mdwms_receiving WHERE bitActive = '1' AND YEAR(dtmInserted) = '$tahun' AND MONTH(dtmInserted) = '$bulan' AND DAY(dtmInserted) = '$hari' AND bitHold = '1' ")->row_array();
                    $total = $query['jmlh'];
                    echo ($total);
                ?>
            }, {
                name: 'Closed',
                color : '#007bff',
                y: 
                <?php 
                    $tahun = date('Y');
                    $bulan = date('m');
                    $hari = date('d');
                    $query = $this->db->query("SELECT count(intReceivingID) AS jmlh FROM mdwms_receiving WHERE bitActive = '1' AND YEAR(dtmInserted) = '$tahun' AND MONTH(dtmInserted) = '$bulan' AND DAY(dtmInserted) = '$hari' AND bitClose = '1' ")->row_array();
                    $total = $query['jmlh'];
                    echo ($total);
                ?>
            }, {
                name: 'Reject',
                color : '#e0da26',
                y: 
                <?php 
                    $tahun = date('Y');
                    $bulan = date('m');
                    $hari = date('d');
                    $query = $this->db->query("SELECT count(intReceivingID) AS jmlh FROM mdwms_receiving WHERE bitActive = '1' AND YEAR(dtmInserted) = '$tahun' AND MONTH(dtmInserted) = '$bulan' AND DAY(dtmInserted) = '$hari' AND bitReject = '1' ")->row_array();
                    $total = $query['jmlh'];
                    echo ($total);
                ?>
            }]
        }]
    });
</script>
</body>
</html>