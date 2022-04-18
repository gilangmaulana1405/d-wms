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
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,200i,300,400,400i,500,500i,600,600i,700,700i,900,900i" rel="stylesheet" type="text/css">
</head>
<body class="gray-bg">
      <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>

            <div>
                <h1 class="logo-name">DWMS</h1>
            </div>
                <h2 class="font-bold">Welcome to DWMS</h2>
               <p> Digital Warehouse Managemnt System</p>
               <p>
                   
               </p>
               <h2>Silahkan Login</h2>               
                
<!--                    
<?php 
if($this->session->flashdata('message')){
echo '<div class="alert alert-danger">'.$this->session->flashdata('message').'</div>'; // Tampilkan pesannya
}
?>
-->           
                    <form class="m-t" method="post" role="form" action="<?php echo base_url('auth/loginfrontend'); ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" name="txtUsername" placeholder="Username" required="" autofocus>
                            
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="txtPassword" placeholder="Password" required="">
                                               
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b ">Sign in</button>
                        <a href="#"><small>Forgot password?</small></a>
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
                        <center><small>In God We Trust </small></center>
                    </p>
                
            
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
                    
