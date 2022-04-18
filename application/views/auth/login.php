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
    <link href="<?php echo base_url();?>assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img/logodwms.png'); ?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,200i,300,400,400i,500,500i,600,600i,700,700i,900,900i" rel="stylesheet" type="text/css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body class="wrapper" style="background-image: url('<?php echo base_url();?>assets/img/gallery/warehousing.JPG'); background-size: cover;">
      <div class="loginColumns animated fadeInDown"><br><br><br><br><br>
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold" style="color: #f8f9fa;">DIGITAL WAREHOUSE MANAGEMENT SYSTEM</h2>
               
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
                <div class="ibox-content" style="background-color: #e7eaece0;">
                    <h2>Silahkan Login</h2>
<!--                    
<?php 
if($this->session->flashdata('message')){
echo '<div class="alert alert-danger">'.$this->session->flashdata('message').'</div>'; // Tampilkan pesannya
}
?>
-->           
                    <form class="m-t" method="post" role="form" action="<?php echo base_url('auth/login'); ?>">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
                            </div>
                            <input type="text" class="form-control" name="txtUsername" placeholder="Username" required="" autofocus>
                            
                        </div>
                        <br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" name="txtPassword" placeholder="Password" required="">
                                               
                        </div>
                        <br>
                        <!--
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-3">
                                <div class="g-recaptcha" data-sitekey="6Ld1hMYZAAAAAD-lf9ZJfagccKgvd9rH2xA6aAj6"></div>
                            </div>
                        </div>
                    -->
                        <button type="submit" class="btn btn-primary block full-width m-b ">Log in</button>
                        <br>
                        <br>
                                            <!--
                                            <a href="#">
                                                <small>Forgot password?</small>
                                            </a>

                                            <p class="text-muted text-center">
                                                <small>Do not have an account?</small>
                                            </p>
                                            <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>-->
                    </form>
                    <p class="m-t">
                        <center><small>Welcome to DWMS Platform</small></center>
                        <center><small>Version 1.0.9.20</small></center>
                    </p>
                </div>
            </div>
        </div>
        <hr color="white" />
        <div class="row">
            <div class="col-md-6">
                <medium style="color: #f8f9fa;">Copyright PT. Kalbe Morinaga Indonesia</medium>
            </div>
            <div class="col-md-6 text-right">
               <small style="color: #f8f9fa;">© 2020</small>
            </div>
        </div>
    </div>
<script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
           var title = '<?= $this->session->flashdata("title") ?>';
           var text = '<?= $this->session->flashdata("text") ?>';
           var type = '<?= $this->session->flashdata("type") ?>';
           if (title) {
                swal({
                    title: title,
                    text: text,
                    type: type,
                    button: true,
                });
           };
       }); 
  </script>     
</body>
</html>
                    
