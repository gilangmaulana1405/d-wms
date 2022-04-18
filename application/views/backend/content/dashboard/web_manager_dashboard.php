<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DWMS | Web Manager</title>

    <link href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/'); ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/'); ?>css/plugins/slick/slick.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/'); ?>css/plugins/slick/slick-theme.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/'); ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/'); ?>css/style.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img/logodwms.png'); ?>">

</head>

<body>

    <div id="wrapper">

    <div id="page-wrapper" class="gray-bg" style="width: 100%;">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header wrapper">
                <form role="search" class="navbar-form-custom" action="search_results.html">
                    <div class="form-group" style="margin-top: 15px; font-size: 20px; width: 300px;">
                        <span class="m-r-sm text-muted welcome-message">Welcome to <strong>Web Manager</strong></span>
                    </div>
                </form>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                </li>
                <li>
                    <a href="<?php echo base_url('Page/home'); ?>">
                        <i class="fa fa-sign-out"></i> Back
                    </a>
                </li>
            </ul>
            </nav>
        </div>

        <div class="wrapper wrapper-content">
            <div class="row justify-content-md-center">
                <div class="col-lg-10">
                    <h2 class="text-center m">
                        Other Fiturs In <strong> DWMS Platform - Web Management </strong><br>
                    </h4>
                    <h4 class="text-center m">Take your decision here to make a good management</h4>
                    <br><br><br>
                    <div class="slick_demo_2">
                        <a href="<?php echo base_url('Page/wm_user_dashboard'); ?>">
                            <img src="<?php echo base_url('assets/'); ?>img/wm-user.png" style="width: 280px; height: 280px; margin-right: auto; margin-left: auto; display: block;">
                            <h2 style="text-align: center; color: #495057">User Acces</h2>
                        </a>
                        <a href="<?php echo base_url('Page/wm_team_dashboard'); ?>">
                            <img src="<?php echo base_url('assets/'); ?>img/wm-team.png" style="width: 280px; height: 280px; margin-right: auto; margin-left: auto; display: block;">
                            <h2 style="text-align: center; color: #495057">DWMS Team</h2>
                        </a>
                        <a href="<?php echo base_url('Page/wm_forklift_dashboard'); ?>">
                            <img src="<?php echo base_url('assets/'); ?>img/wm-forklift.png" style="width: 280px; height: 280px; margin-right: auto; margin-left: auto; display: block;">
                            <h2 style="text-align: center; color: #495057">Forklift WH</h2>
                        </a>
                        <a href="<?php echo base_url('Page/wm_item_forklift_dashboard'); ?>">
                            <img src="<?php echo base_url('assets/'); ?>img/wm-item forklift.png" style="width: 280px; height: 280px; margin-right: auto; margin-left: auto; display: block;">
                            <h2 style="text-align: center; color: #495057">Item Forklift</h2>
                        </a>
                        <a href="<?php echo base_url('Page/wm_role_dashboard'); ?>">
                            <img src="<?php echo base_url('assets/'); ?>img/wm-role.png" style="width: 280px; height: 280px; margin-right: auto; margin-left: auto; display: block;">
                            <h2 style="text-align: center; color: #495057">Role Access</h2>
                        </a>
                        <a href="<?php echo base_url('Page/wm_subdep_dashboard'); ?>">
                            <img src="<?php echo base_url('assets/'); ?>img/wm-subdept.png" style="width: 280px; height: 280px; margin-right: auto; margin-left: auto; display: block;">
                            <h2 style="text-align: center; color: #495057">Department WH</h2>
                        </a>
                        <a href="<?php echo base_url('Page/wm_job_dashboard'); ?>">
                            <img src="<?php echo base_url('assets/'); ?>img/wm-job.png" style="width: 280px; height: 280px; margin-right: auto; margin-left: auto; display: block;">
                            <h2 style="text-align: center; color: #495057">Job Title</h2>
                        </a>
                        <a href="<?php echo base_url('Page/wm_allergen_dashboard'); ?>">
                            <img src="<?php echo base_url('assets/'); ?>img/wm-allergen.png" style="width: 280px; height: 280px; margin-right: auto; margin-left: auto; display: block;">
                            <h2 style="text-align: center; color: #495057">Allergen Management</h2>
                        </a>
                        <a href="<?php echo base_url('Page/wm_itemcode_material'); ?>">
                            <img src="<?php echo base_url('assets/'); ?>img/wm-item.png" style="width: 280px; height: 280px; margin-right: auto; margin-left: auto; display: block;">
                            <h2 style="text-align: center; color: #495057">Item Code Material PM</h2>
                        </a>
                        <a href="<?php echo base_url('Page/wm_box_rfid'); ?>">
                            <img src="<?php echo base_url('assets/'); ?>img/wm-rfid.png" style="width: 280px; height: 280px; margin-right: auto; margin-left: auto; display: block;">
                            <h2 style="text-align: center; color: #495057">Box RFID</h2>
                        </a>
                        <a href="<?php echo base_url('Page/wm_employee_dashboard'); ?>">
                            <img src="<?php echo base_url('assets/'); ?>img/wm-employee.png" style="width: 280px; height: 280px; margin-right: auto; margin-left: auto; display: block;">
                            <h2 style="text-align: center; color: #495057">Employee Name</h2>
                        </a>
                    </div>
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

    <!-- slick carousel-->
    <script src="<?php echo base_url('assets/'); ?>js/plugins/slick/slick.min.js"></script>

    <!-- Additional style only for demo purpose -->
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

</body>

</html>
