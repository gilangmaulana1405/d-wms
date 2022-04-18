<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="">
    <meta name="author" content="">

	<title>DWMS | FORKLIFT</title>
    

	<?php $this->load->view("backend_forklift/tamplate_forklift/head_all_forklift.php");?>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img/logodwms.png'); ?>">
    

</head>
<body class="">
	<div id="wrapper">
		<?php echo $left_sidebar; ?>

		<div id="page-wrapper" class="gray-bg" style="background: #e9ebee;">
        	<div class="row border-bottom">
        	<nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0;background: #1ab394;">
	        <div class="navbar-header">
	            <a class="navbar-minimalize minimalize-styl-2 btn btn-warning " href="#"><i class="fa fa-bars"></i> </a>
	            <form role="search" class="navbar-form-custom" action="search_results.html">
	                <div class="form-group">
	                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
	                </div>
	            </form>
	        </div>
	        	<ul class="nav navbar-top-links navbar-right">
	                <li>
	                    <?php 
                            $tanggal = mktime(date('m'), date("d"), date('Y'));
                            echo "<b style='color: #ffc107;'>Tanggal : </b> <b style='color: white;'> " . date("d-m-Y", $tanggal ) . "</b>";
                            date_default_timezone_set("Asia/Jakarta");
                            $jam = date ("H:i:s");
                            echo "<b style='color: #ffc107;'> | Pukul : </b> <b style='color: white;'> " . $jam . " " ." </b> ";
                            $a = date ("H");
                            if (($a>=6) && ($a<=11)) {
                                echo " <b style='color: white;'>, Selamat Pagi !! </b>";
                            }else if(($a>=11) && ($a<=15)){
                                echo " <b style='color: white;'>, Selamat  Pagi !! </b>";
                            }elseif(($a>15) && ($a<=18)){
                                echo " <b style='color: white;'>, Selamat Siang !! </b>";
                            }else{
                                echo ", <b style='color: white;'> Selamat Malam </b>";
                            }
                         ?>
	                </li>
	                <li>
	                    <a href="<?php echo base_url ('auth/logout'); ?>">
                            <i class="fa fa-sign-out" style="color: white;"></i><medium style="color: white;"> Log out</medium>
                        </a>
	                </li>
            	</ul>

        	</nav>
        	</div>
        	<div class="wrapper wrapper-content animated fadeInRight">
        		
        			<?php echo $contentnya; ?>
        		
        	</div>

        	<?php $this->load->view("backend_forklift/tamplate_forklift/footer_forklift.php");?>
        	<?php $this->load->view("backend_forklift/tamplate_forklift/right-sidebar_forklift.php");?>
        	<?php $this->load->view("backend_forklift/tamplate_forklift/js_forklift.php");?>
            <div class="small-chat-box fadeInRight animated">

                <div class="heading" draggable="true">
                    <small class="chat-date float-right">
                        <?=date('d.m.Y')?>
                    </small>
                    All chat
                </div>
                <div class="content">
                    <p id="list_chat"></p>
                </div>
                <div class="form-chat">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" id="input_chat">
                        <span class="input-group-btn"> 
                            <button class="btn btn-primary" type="button" id="send-chat">Send</button> 
                        </span>
                    </div>
                </div>
            </div>
            <div id="small-chat">
                <span class="badge badge-warning float-right"></span>
                    <a class="open-small-chat"><i class="fa fa-comments"></i></a>
            </div>
        </div>
    </div> 
<script src="<?php echo base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins/toastr/toastr.min.js"></script>
<script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/plugins/footable/footable.all.min.js"></script>          
<script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

</script>       

<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 100,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
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
            $('.dataTables1').DataTable({
                pageLength: 25,
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
    tampil_chat();
    $('.data_3').datepicker({
                format: 'yyyy/mm/dd',
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });
    $('.clockpicker').clockpicker();

        function tampil_chat() {
            $.ajax({
                type  : 'GET',
                url   : "<?php echo base_url('Auth/get_chat')?>",
                async : true,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var posisi='';
                    var balon = '';
                    var parseDate = '';
                    var sessi = '<?=$this->session->userdata('user_id')?>';
                    var i,j=1;
                    for(i=0; i<data.length; i++){
                        if (data[i].intUserID_pengirim==sessi) {
                            posisi = 'right';
                            balon ='';
                        }else{
                            posisi = 'left';
                            balon = 'active';
                        }
                        parseDate = Date.parse(data[i].dtmChatdate);
                        console.log(parseDate)
                        html += '<div class="'+posisi+'">'+
                                '<div class="author-name">'+
                                ''+data[i].txtNamauser+' <small class="chat-date">'+
                                ''+moment(parseDate).format("HH:mm")+''+
                                '</small>'+
                                '</div>'+
                                '<div class="chat-message '+balon+'">'+
                                ''+data[i].txtChat+''+
                                '</div>'+
                                '</div>';

                    }
                    $('#list_chat').html(html);
                }
 
            });
        }

</script>

<script>
    $(document).ready(function(){

    $('#send-chat').click(function(){ // Ketika tombol detail di klik
        var isi = $('#input_chat').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('Auth/simpan_chat')?>",
                dataType : "JSON",
                data : {isi:isi},
                success: function(data){
                    $('#input_chat').val("");
                    tampil_chat();
                }
            });
            return false;
        });

    });

</script>
<script>
        $(document).ready(function() {

            $('.footable').footable();

        });

</script>

</body>
</html>