<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">
    <meta name="author" content="">

	<title><?= $title ?></title>

	<?php $this->load->view("frontend/tamplate/head_all.php");?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.1.3/mediaelementplayer.min.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        .myContainer {
            width:100%;
            margin-top: 80px;
            background-color: #F3EEEE;
            min-height: 400px;
            padding: 10px 50px;
        }
    </style>

</head>
<body class="x-dashboard">
	<div class="page-container">
		<div class="page-content" style="background: #F3EEEE;">
            <div class="page-content-wrap">
        	<div class="row border-bottom">
        	   <?php $this->load->view("frontend/tamplate/navbar"); ?>
        	</div>
        	<div class="wrapper wrapper-content animated fadeInRight">
        		<div class="myContainer">
        			<?php echo $contentnya; ?>
        		</div>
        	</div>

        	<?php $this->load->view("frontend/tamplate/footer.php");?>
        	<?php $this->load->view("frontend/tamplate/right-sidebar.php");?>
        	<?php $this->load->view("frontend/tamplate/js.php");?>
            </div>
        </div>
    </div> 
<script src="<?php echo base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>         
<script type="text/javascript">
    $ (function() {
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