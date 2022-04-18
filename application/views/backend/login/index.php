<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">
    <meta name="author" content="">

	<title>DWMS Login</title>

	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    
</head>
<body class="gray-bg">
    
	    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">DIGITAL WAREHOUSE MANAGEMENT SYSTEM</h2>
               
                <p>
                    
                </p>

                <p>
                    
                </p>

                <p>
                    
                </p>

                <p>
                   
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <h2>Silahkan Login</h2>
                    	<?php
                    	echo $contentnya;
            			?>
                    <p class="m-t">
                        <center><small>In God We Trust </small></center>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright PT. Kalbe Morinaga Indonesia
            </div>
            <div class="col-md-6 text-right">
               <small>© 2020</small>
            </div>
        </div>
    </div>
<script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.demo2').click(function(){
            swal({
                title: "Good job!",
                text: "You clicked the button!",
                type: "success"
            });
        });
    });
</script>
</body>
</html>
