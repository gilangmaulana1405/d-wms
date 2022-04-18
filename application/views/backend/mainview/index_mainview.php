<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">
    <meta name="author" content="">

	<title>DWMS Mainview</title>

	<?php $this->load->view("backend/tamplate/head_all.php");?>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img/logodwms.png'); ?>">
    

	<style>

        .hex1 {
            margin: 50px 180px;
            background: #ED5565;
            height: 100px;
            width: 173.2px;
            position: relative;
            z-index: 1;
        }
        .hex1:after,
        .hex1:before {
            content: "";
            position: absolute;
            left: 0;
            z-index: -1;
            border-left: 86.6px solid transparent;
            border-right: 86.6px solid transparent;
        }
        .hex1:after {
            bottom: -100px;
            border-top: 50px solid #ED5565;
            border-bottom: 50px solid transparent;
        }
        .hex1:before {
            top: -100px;
            border-top: 50px solid transparent;
            border-bottom: 50px solid #ED5565;
        }
        .hex2 {
            margin: 50px 270px;
            background: #1c84c6;
            height: 100px;
            width: 173.2px;
            position: relative;
            z-index: 1;
        }
        .hex2:after,
        .hex2:before {
            content: "";
            position: absolute;
            left: 0;
            z-index: -1;
            border-left: 86.6px solid transparent;
            border-right: 86.6px solid transparent;
        }
        .hex2:after {
            bottom: -100px;
            border-top: 50px solid #1c84c6;
            border-bottom: 50px solid transparent;
        }
        .hex2:before {
            top: -100px;
            border-top: 50px solid transparent;
            border-bottom: 50px solid #1c84c6;
        }
        .hex3 {
            margin: 50px 180px;
            background: #4be650;
            height: 100px;
            width: 173.2px;
            position: relative;
            z-index: 1;
        }
        .hex3:after,
        .hex3:before {
            content: "";
            position: absolute;
            left: 0;
            z-index: -1;
            border-left: 86.6px solid transparent;
            border-right: 86.6px solid transparent;
        }
        .hex3:after {
            bottom: -100px;
            border-top: 50px solid #4be650;
            border-bottom: 50px solid transparent;
        }
        .hex3:before {
            top: -100px;
            border-top: 50px solid transparent;
            border-bottom: 50px solid #4be650;
        }
        .hex4 {
            margin: 50px 31px;
            background: #ffc107;
            height: 100px;
            width: 173.2px;
            position: relative;
            z-index: 1;
        }
        .hex4:after,
        .hex4:before {
            content: "";
            position: absolute;
            left: 0;
            z-index: -1;
            border-left: 86.6px solid transparent;
            border-right: 86.6px solid transparent;
        }
        .hex4:after {
            bottom: -100px;
            border-top: 50px solid #ffc107;
            border-bottom: 50px solid transparent;
        }
        .hex4:before {
            top: -100px;
            border-top: 50px solid transparent;
            border-bottom: 50px solid #ffc107;
        }
        .hex5 {
            margin: 50px 120px;
            background: #ED5565;
            height: 100px;
            width: 173.2px;
            position: relative;
            z-index: 1;
        }
        .hex5:after,
        .hex5:before {
            content: "";
            position: absolute;
            left: 0;
            z-index: -1;
            border-left: 86.6px solid transparent;
            border-right: 86.6px solid transparent;
        }
        .hex5:after {
            bottom: -100px;
            border-top: 50px solid #ED5565;
            border-bottom: 50px solid transparent;
        }
        .hex5:before {
            top: -100px;
            border-top: 50px solid transparent;
            border-bottom: 50px solid #ED5565;
        }
    </style>
</head>
<body id="page-top" class="landing-page no-skin-config">
	<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top navbar-expand-md" role="navigation">
            <div class="container">
                <a class="navbar-brand" href="index.html">D-WMS</a>
                <div class="navbar-header page-scroll">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse justify-content-end" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="nav-link page-scroll" href="#page-top">Home</a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="<?php echo base_url('page/home');?>">DWMS-RECEIVING</a></li> 
                            </ul>
                        </li>
                        <li><a class="nav-link page-scroll" href="#features">Features</a></li>
                        <li><a class="nav-link page-scroll" href="#team">Team</a></li>
                        <li><a class="nav-link page-scroll" href="#testimonials">Testimonials</a></li>
                        <li><a class="nav-link page-scroll" href="#pricing">Pricing</a></li>
                        <li><a class="nav-link page-scroll" href="#contact">Contact</a></li>
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
                        <h1>We craft<br/>
                            brands, web apps,<br/>
                            and user interfaces<br/>
                            we are IN+ studio</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing.</p>
                        <p>
                            <a class="btn btn-lg btn-primary" href="#" role="button">READ MORE</a>
                            <a class="caption-link" href="#" role="button">Inspinia Theme</a>
                        </p>
                    </div>
                    <div class="carousel-image wow zoomIn">
                        <img src="img/landing/laptop.png" alt="laptop"/>
                    </div>
                </div>
                <!-- Set background for slide in css -->
                <div class="header-back one"></div>

            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="carousel-caption blank">
                        <h1>We create meaningful <br/> interfaces that inspire.</h1>
                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
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
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row justify-content-end">
            	
            <?php $this->load->view("backend/tamplate/footer.php");?>
            <?php $this->load->view("backend/tamplate/right-sidebar.php");?>
            <?php $this->load->view("backend/tamplate/js.php");?>	
            </div>
        </div>
    
</body>
</html>