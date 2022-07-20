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
<script src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script> 
<script src="<?php echo base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/js/plugins/toastr/toastr.min.js"></script>
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
            pageLength: 10,
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

    
        // Form QR Scan CLI Forklift
        // $('#txtSerialnumber').keyup(function () {
              
        //     var txtSerialnumber = $('#txtSerialnumber').val();
            
        //     $.ajax({
        //         url: "<?php echo base_url('forklift/cli_forklift');?>",
        //         data: 'txtSerialnumber='+txtSerialnumber,
        //         type : 'post',
        //         dataType: 'json',
        //         success: function (data){

        //             console.log(data);
        //             var json = data,
        //             obj = JSON.parse(json);

        //             $('#txtArea').val(obj.txtArea);
        //             $('#txtVersionwh').val(obj.txtVersionwh);
        //             $('#txtVersioneng').val(obj.txtVersioneng);
        //             $('#txtSerialnumberScan').val(obj.txtSerialnumber);
        //             $('#txtPicforklift').val(obj.txtPicforklift);
        //             $('#intTahunpembuatan').val(obj.intTahunpembuatan);
        //         }
        //     });
        // })

        // Delete CLI Forklift
        // $('#show_data').on('click', '.item_delete', function() {
            
        //     var intForkliftwhID = $(this).attr('data');
        //     $('#modalDelete').modal('show');
        //     $('[name="intForkliftwhID"]').val(intForkliftwhID);
        // })

        // $('#btn_delete').on('click', function(e) {
        //     e.preventDefault();
        //     var intForkliftwhID = $('#intForkliftwhID').val();
        //     $.ajax({
        //         type: 'post',
        //         url: '<?php echo base_url('forklift/delete'); ?>',
        //         dataType: 'json',
        //         data: {
        //             'intForkliftwhID': intForkliftwhID
        //         },
        //         success: function (data){
        //             $('#modalDelete').modal('hide');
        //             show_item();
        //         }
        //     })
        // })

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
    show_approve_cliForklift()

    function show_approve_cliForklift()
    {
            $.ajax({
                    url: "<?php echo base_url('forklift/approve_cli_forklift')?>",
                    dataType: 'json',
                    success: function (data){
                        var html = '';
        
                        for(i=0; i<data.length; i++) {
                            var angka = i+1;
                            html+= '<tr>' +                                        
                                        '<td>'+angka+'</td>'+
                                        '<td>'+data[i].txtActivityCode_header+'</td>'+
                                        '<td>'+data[i].txtJenisForklift_header+'</td>'+
                                        // '<td>'+data[i].txtArea+'</td>'+
                                        // '<td>'+data[i].txtSerialnumber+'</td>'+
                                        // '<td>'+data[i].txtPicforklift+'</td>'+
                                        // '<td>'+data[i].txtVersioneng+'</td>'+
                                        '<td>'+data[i].txtjeniscleaning+'</td>'+
                                        '<td>' +
                                            '<button class="btn btn-success btn-sm item_approve" data-id="'+ data[i].intCliForkliftID+'"><i class="fa fa-check"></i>Approve</button>'+
                                            '<button class="btn btn-danger btn-sm item_reject mt-2" data-id="'+ data[i].intCliForkliftID+'"><i class="fa fa-times"></i> Reject</button>'+
                                        '</td>';
                                    '</tr>';
                        }

                        $('#show_data_approve_cliForklift').html(html);
                    }
                })
    }

    // get id approve
    $('#show_data_approve_cliForklift').on('click', '.item_approve', function(){
        var intCliForkliftID = $(this).attr('data-id');
        $('#modalApprove').modal('show');
        $('#intCliForkliftID').val(intCliForkliftID);
    })

    // action approve
    $('#btn_approve').on('click', function(){
        var intCliForkliftID = $('#intCliForkliftID').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('forklift/action_approve_cli_forklift'); ?>',
                dataType: 'json',
                data: {
                    'intCliForkliftID': intCliForkliftID
                },
                success: function (data){
                    swal({
                    title: "SUCCESS",
                    text: "FORKLIFT HAS BEEN APPROVED!",
                    icon: "success",
                    button: false,
                    timer: 2500,
                    })
                    $('#modalApprove').modal('hide');
                    show_approve_cliForklift();
                }
            })
    })

    // get id reject
    $('#show_data_approve_cliForklift').on('click', '.item_reject', function(){
        var intCliForkliftID = $(this).attr('data-id');
        $('#modalReject').modal('show');
        $('#intCliForkliftID').val(intCliForkliftID);
    })

    // action reject
    $('#btn_reject').on('click', function() {
        var intCliForkliftID = $('#intCliForkliftID').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('forklift/action_reject_cli_forklift'); ?>',
                dataType: 'json',
                data: {
                    'intCliForkliftID': intCliForkliftID
                },
                success: function (data){
                    swal({
                    title: "SUCCESS",
                    text: "FORKLIFT HAS BEEN REJECTED!",
                    icon: "success",
                    button: false,
                    timer: 2500,
                    })
                    $('#modalReject').modal('hide');
                    show_approve_cliForklift();
                }
            })
    })
</script>

<script>
    show_data_approve_cliBattery();

    function show_data_approve_cliBattery()
    {
        $.ajax({
                    url: "<?php echo base_url('forklift/approve_cli_battery')?>",
                    dataType: 'json',
                    success: function (data){
                        var html = '';
        
                        for(i=0; i<data.length; i++) {
                            var angka = i+1;
                            html+= '<tr>' +                                        
                                        '<td>'+angka+'</td>'+
                                        '<td>'+data[i].txtActivityCode_header+'</td>'+
                                        '<td>'+data[i].txtJenisForklift_header+'</td>'+
                                        // '<td>'+data[i].txtArea+'</td>'+
                                        // '<td>'+data[i].txtSerialnumber+'</td>'+
                                        // '<td>'+data[i].txtPicforklift+'</td>'+
                                        // '<td>'+data[i].txtVersioneng+'</td>'+
                                        '<td>'+data[i].txtjeniscleaning+'</td>'+
                                        '<td>' +
                                            '<button class="btn btn-success btn-sm item_approve" data-id="'+ data[i].intCliForkliftID+'"><i class="fa fa-check"></i>Approve</button>'+
                                            '<button class="btn btn-danger btn-sm item_reject mt-2" data-id="'+ data[i].intCliForkliftID+'"><i class="fa fa-times"></i> Reject</button>'+
                                        '</td>';
                                    '</tr>';
                        }

                        $('#show_data_approve_cliBattery').html(html);
                    }
        })
    }

    // approve
    $('#show_data_approve_cliBattery').on('click', '.item_approve', function(){
        var intCliForkliftID = $(this).attr('data-id');
        $('#modalApprove').modal('show');
        $('#intCliForkliftID').val(intCliForkliftID);
    })

    $('#btn_approve').on('click', function(){
        var intCliForkliftID = $('#intCliForkliftID').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('forklift/action_approve_cli_forklift'); ?>',
                dataType: 'json',
                data: {
                    'intCliForkliftID': intCliForkliftID
                },
                success: function (data){
                    swal({
                    title: "SUCCESS",
                    text: "FORKLIFT HAS BEEN APPROVED!",
                    icon: "success",
                    button: false,
                    timer: 2500,
                    })
                    $('#modalApprove').modal('hide');
                    show_data_approve_cliBattery();
                }
            })
    })

    // reject
    $('#show_data_approve_cliBattery').on('click', '.item_reject', function(){
        var intCliForkliftID = $(this).attr('data-id');
        $('#modalReject').modal('show');
        $('#intCliForkliftID').val(intCliForkliftID);
    })

    $('#btn_reject').on('click', function() {
        var intCliForkliftID = $('#intCliForkliftID').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('forklift/action_reject_cli_forklift'); ?>',
                dataType: 'json',
                data: {
                    'intCliForkliftID': intCliForkliftID
                },
                success: function (data){
                    swal({
                    title: "SUCCESS",
                    text: "FORKLIFT HAS BEEN REJECTED!",
                    icon: "success",
                    button: false,
                    timer: 2500,
                    })
                    $('#modalReject').modal('hide');
                    show_data_approve_cliBattery();
                }
            })
    })
</script>

<!-- CLI FORKLIFT -->
<script type="text/javascript">
    $(document).ready(function () {

        // tampil data tabel cli forklift
        show_cli();
        
        function show_cli()
        {
            $.ajax({
                    url: "<?php echo base_url('forklift/header_cli_forklift')?>",
                    dataType: 'json',
                    success: function (data){
                        var html = '';
        
                        for(i=0; i<data.length; i++) {
                            var angka = i+1;
                            html+= '<tr>' +                                        
                                        '<td>'+angka+'</td>'+
                                        '<td>'+data[i].txtArea+'</td>'+
                                        '<td>'+data[i].txtJenisForklift_header+'</td>'+
                                        '<td>'+data[i].txtVersioneng+'</td>'+
                                        '<td>'+data[i].txtSerialnumber+'</td>'+
                                        '<td>'+data[i].txtPicforklift+'</td>'+
                                        '<td>'+data[i].intTahunpembuatan+'</td>'+
                                        '<td>'+data[i].txtjeniscleaning+'</td>'+
                                        '<td>' +
                                            '<a href="" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a>' +
                                        '</td>' +
                                        '<td>' +
                                            '<button class="btn btn-primary btn-sm btn_startChecklist" data-serial="'+ data[i].txtSerialnumber +'" data-jenis="'+data[i].txtJenisForklift_header+'" data-activity="'+ data[i].txtActivityCode_header+'"><i class="fa fa-edit"></i> Start Checklist</button>'+

                                            '<button class="btn btn-danger btn-sm item_delete mt-2" data="'+ data[i].intCliForkliftID +'"><i class="fa fa-trash"></i> Delete</button>'
                                        '</td>';
                                    '</tr>';
                        }

                        $('#show_data').html(html);
                        
                    }
                })
        }
  
        // inputan terisi otomatis ketika scan serial number (create cli forklift)
        $('#txtSerialnumber').keyup(function () {
              
            var txtSerialnumber = $('#txtSerialnumber').val();
            
            $.ajax({
                url: "<?php echo base_url('forklift/cli_forklift');?>",
                data: 'txtSerialnumber='+txtSerialnumber,
                type : 'post',
                dayaType: 'json',
                success: function (data){

                    // console.log(data);
                    var json = data,
                    obj = JSON.parse(json);

                    $('#txtArea').val(obj.txtArea);
                    $('#txtVersionwh').val(obj.txtVersionwh);
                    $('#txtVersioneng').val(obj.txtVersioneng);
                    $('#txtSerialnumberScan').val(obj.txtSerialnumber);
                    $('#txtPicforklift').val(obj.txtPicforklift);
                    $('#intTahunpembuatan').val(obj.intTahunpembuatan);
                }
            });
        })

        // tambah data cli forklift
        $('#btn_create_forklift').on('click', function (e) {
            e.preventDefault();
            
            var txtSerialnumber = $('#txtSerialnumber').val();
            var txtArea = $('#txtArea').val();
            var txtVersionwh = $('#txtVersionwh').val();
            var txtVersioneng = $('#txtVersioneng').val();
            var txtPicforklift = $('#txtPicforklift').val();
            var intTahunpembuatan = $('#intTahunpembuatan').val();
            var txtjeniscleaning = $('[name="txtjeniscleaning"]').val();

            if(txtVersionwh == ''){
                 swal("UNDIFINED SERIAL NUMBER!","DATA TIDAK BOLEH KOSONG !!!","warning");
            }else{

                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('forklift/create'); ?>",
                    dataType: "json",
                    data: {txtSerialnumber : txtSerialnumber, txtArea:txtArea, txtVersionwh:txtVersionwh, txtVersioneng:txtVersioneng, txtPicforklift:txtPicforklift, intTahunpembuatan:intTahunpembuatan, txtjeniscleaning:txtjeniscleaning},
                    success: function (data){
                        swal({
                            title: "SUCCESS",
                            text: "CLI FORKLIFT HAS BEEN INSERTED!",
                            icon: "success",
                            button: false,
                            timer: 3000,
                        })
                        $('#modalAdd').modal('hide');
                        show_cli();
                        
                        // hilangkan inputan
                        $("[name='txtSerialnumber']").val('');
                        $("[name='txtArea']").val('');
                        $("[name='txtJenisForklift_header']").val('');
                        $("[name='txtVersioneng']").val('');
                        $("[name='txtPicforklift']").val('');
                        $("[name='intTahunpembuatan']").val('');
                    },
                });
            }
        })

        // get data item cli modal (tombol start checklist)
        $('#show_data').on('click', '.btn_startChecklist', function(){
            var txtSerialnumber = $(this).attr('data-serial');
            var txtJenisForklift_header = $(this).attr('data-jenis');
            var txtActivityCode_header = $(this).attr('data-activity');
            $.ajax({
                url: '<?php echo base_url('forklift/start_Checklist'); ?>',
                type: 'POST',
                dataType: 'JSON',
                data: {txtSerialnumber : txtSerialnumber, txtJenisForklift_header:txtJenisForklift_header},
                success: function (data){
                    console.log(data)
                    var html = '';
                    var lanjutan = '';
                    var i;
                    
                    $('#modalStartChecklist').modal('show');
                    html+='<table border="1" width=100%>';
                    html+='<tr>';
                    html+='<th rowspan=4 style="width:120px;"><img src="<?= base_url('assets/img/kalbe.png'); ?>" style="width:150px; height:100px; padding:2px"></th>';
                    html+='<th rowspan=2 style="width:500px;"><center> FORM </center></th>';
                    html+='<th style="width:10px" align="left">No.Dok :</th>';
                    html+='<th style="width:50px" align="left">FR/HRD-GA/BBP/006</th>';
                    html+='</tr>';
                    html+='<tr>';
                    html+='<th align="left">No.Rev : </th>';
                    html+='<th align="left">00</th>';
                    html+='</tr>';
                    html+='<tr>';
                    html+='<th style="padding-right: 5px; padding-left: 5px;" rowspan=2><center>CLEANING/LUBRIKASI/INSPECTION (CLI)</center></th>';
                    html+='<th align="left">Tgl Berlaku :</th>';
                    html+='<th align="left">22 Juni 2022</th>';
                    html+='<tr>';
                    html+='<th align="left">Halaman :</th>';
                    html+='<th align="left">1 dari 1</th>';
                    html+='</tr>';
                    html+='</table>';

                    html+='<table border="1" width=100%>';
                    html+='<tbody>';
                    html+='<tr>';
                    html+='<th>NO</th>';
                    html+='<th>UNIT</th>';
                    html+='<th>ITEM PART</th>';
                    html+='<th>STANDARD</th>';
                    html+='<th>TIME (MIN)</th>';
                    html+='<th>TOOLS</th>';
                    html+='<th>BIT CLEANING</th>';
                    html+='<th>BIT INSPECTION</th>';
                    html+='<th>BIT LUBRICATION</th>';
                    html+='<th>BARCODE ITEM</th>';
                    // html+='<th colspan="2" align="center">TANGGAL</>';
                    // html+='<th>KETERANGAN</th>';
                    html+='</tr>';
                    for (var i = 0; i < data.length; i++) {
                        var angka = i+1;
                        html+='<tr>';
                        html+='<td style="font-size:11px;">'+angka+'</td>'  
                        html+='<td style="font-size:11px;">'+data[i].txtUnit+'</td>'
                        html+='<td style="font-size:11px;">'+data[i].txtItempart+'</td>'
                        html+='<td style="font-size:11px;">'+data[i].txtStandard+'</td>'
                        html+='<td style="font-size:11px;">'+data[i].intTimemin+'</td>'
                        html+='<td style="font-size:11px;">'+data[i].txtTools+'</td>'
                        html+='<td style="font-size:11px;">'+data[i].bitCleaning+'</td>'
                        html+='<td style="font-size:11px;">'+data[i].bitInspection+'</td>'
                        html+='<td style="font-size:11px;">'+data[i].bitLubrication+'</td>'
                        html+='<td style="font-size:11px;">'+data[i].txtBarcodeitem+'</td>'
                        html+='</tr>';
                     }
                    html+='</tbody>';
                    html+='</table>';

                    html+='<br>';
                    html+='<br>';

                    html+='<div class="modal-footer">';
                    html+='<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                    html+='<button type="button" class="btn btn-primary" onclick=approve("'+txtActivityCode_header+'"); >Approved</button>';
                    html+='</div>';
                
                $('#startChecklist-body').html(html);

                }
            })
        });

        // update data detail item form cli (tombol scan) 0 to be 1
        $('#btn_create_itemcli').on('click', function() {
            
            var txtActivityCode_header = $('#txtActivityCode_header').val();
            var txtBarcodeitem_detail = $('#txtBarcodeitem_detail').val();

            if(txtBarcodeitem_detail == ''){
                swal("ERROR BARCODE ITEM!","DATA IS NULL !!!","warning");
            }else{
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('forklift/ScanItem'); ?>',
                    data: {txtBarcodeitem_detail:txtBarcodeitem_detail, txtActivityCode_header:txtActivityCode_header},
                    // dataType: "JSON",
                    success: function (data){
                        console.log(data);
                        if(data == 'true'){  
                            swal("SUCCESS!","ITEM CLI FORKLIFT HAS BEEN SCAN!","success");   
                        }else if(data == 'false'){
                            swal("PROCESS SCAN FAILED!","warning");
                        }else if(data == 'undifined'){
                            swal("ERROR BARCODE ITEM!","BARCODE UNDIFINED !!!","warning");
                        }else if(data == 'has scanned'){
                            swal("ERROR BARCODE ITEM!","BARCODE HAS SCANNED !!!","warning");
                        }
                    }
                });

                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('forklift/DetailCli'); ?>',
                    success: function (data){
                        console.log(data);
                    }
                });
            }
        });

        // ambil id ketika akan hapus data cli forklift
        $('#show_data').on('click', '.item_delete', function() {
            var intForkliftwhID = $(this).attr('data');
            $('#modalDelete').modal('show');
            $('[name="intForkliftwhID"]').val(intForkliftwhID);
        })
        
        // hapus data cli forklift
        $('#btn_delete').on('click', function(e) {
            e.preventDefault();
            var intForkliftwhID = $('#intForkliftwhID').val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('forklift/delete'); ?>',
                dataType: 'json',
                data: {
                    'intForkliftwhID': intForkliftwhID
                },
                success: function (data){
                    swal("SUCCESS!","CLI FORKLIFT HAS BEEN DELETED!","success");
                    $('#modalDelete').modal('hide');
                    show_cli();
                }
            })
        })

        // finish cli forklift
        $('#finish_cli_forklift').on('click', function(){
            var intCliForkliftID = $(this).attr('data-finish');
            $('#modalFinished').modal('show');
            $('#intCliForkliftID').val(intCliForkliftID);
        })

        $('#btn_finish_cli_forklift').on('click', function(){
            var intCliForkliftID = $('#intCliForkliftID').val();
            
            $.ajax({
                url: '<?php echo base_url('forklift/finishCliForklift'); ?>',
                type: 'post',
                dataType: 'json',
                data: {
                    'intCliForkliftID': intCliForkliftID
                },
                success: function (data){   

                    if(data == ''){

                    }

                    swal("SUCCESS!","CLEANING FORKLIFT HAS BEEN FINISHED!","success");
                    $('#modalFinished').modal('hide');
                    window.location.href="<?php echo site_url('page/cli_forklift'); ?>";
                }
            })
        })
        
        
    });
</script>

<script>
    function ScanItem()
    {
        var txtActivityCode_header = $('#txtActivityCode_header').val();
            var txtBarcodeitem_detail = $('#txtBarcodeitem_detail').val();

            if(txtBarcodeitem_detail == ''){
                swal("ERROR BARCODE ITEM!","DATA IS NULL !!!","warning");
            }else{
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('forklift/ScanItem'); ?>',
                    data: {txtBarcodeitem_detail:txtBarcodeitem_detail, txtActivityCode_header:txtActivityCode_header},
                    // dataType: "JSON",
                    success: function (data){
                        console.log(data);
                        if(data == 'true'){  
                            swal("SUCCESS!","ITEM CLI FORKLIFT HAS BEEN SCAN!","success");   
                        }else if(data == 'false'){
                            swal("ERROR BARCODE ITEM!","PROCCESS SCAN FAILED !!!","error");
                        }else if(data == 'undifined'){
                            swal("ERROR BARCODE ITEM!","BARCODE UNDIFINED !!!","warning");
                        }else if(data == 'has scanned'){
                            swal("ERROR BARCODE ITEM!","BARCODE HAS SCANNED !!!","info");
                        }

                        $('#txtBarcodeitem_detail').val('');
                    }
                });

                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('forklift/DetailCli'); ?>',
                    success: function (data){
                        console.log(data);
                    }
                });
            }
    }
</script>

<script>
    function scanManual(intDetailcliID, txtActivityCode_header, txtBarcodeitem_detail){
        var txtActivityCode_header = $('#txtActivityCode_header').val();
        var txtBarcodeitem_detail = $('#txtBarcodeitem_detail').val();
        
        if(txtBarcodeitem_detail == ''){
            alert('kosong')
        }else{
            $.ajax({
                url: "<?php echo base_url('forklift/ScanItemManual'); ?>",
                type:"post",
                data: {intDetailcliID:intDetailcliID, txtBarcodeitem_detail:txtBarcodeitem_detail},
                success: function(data){
                    console.log(data);
                }
            })
        }
    }
</script>

<!-- CLI BATTERY -->
<script type="text/javascript">
    $(document).ready(function () {
        show_cli_battery();

            function show_cli_battery()
            {
                $.ajax({
                        url: "<?php echo base_url('forklift/header_cli_battery')?>",
                        dataType: 'json',
                        success: function (data){
                            var html = '';
            
                            for(i=0; i<data.length; i++) {
                                var angka = i+1;
                                html+= '<tr>' +                                        
                                            '<td>'+angka+'</td>'+
                                            '<td>'+data[i].txtArea+'</td>'+
                                            '<td>'+data[i].txtJenisForklift_header+'</td>'+
                                            '<td>'+data[i].txtVersioneng+'</td>'+
                                            '<td>'+data[i].txtSerialnumber+'</td>'+
                                            '<td>'+data[i].txtPicforklift+'</td>'+
                                            '<td>'+data[i].intTahunpembuatan+'</td>'+
                                            '<td>'+data[i].txtjeniscleaning+'</td>'+
                                            '<td>' +
                                                '<a href="" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a>' +
                                            '</td>' +
                                            '<td>' +
                                                '<button class="btn btn-primary btn-sm btn_startChecklist" data-serial="'+ data[i].txtSerialnumber +'" data-jenis="'+data[i].txtJenisForklift_header+'" data-activity="'+ data[i].txtActivityCode_header+'"><i class="fa fa-edit"></i> Start Checklist</button>'+

                                                '<button class="btn btn-danger btn-sm item_delete mt-2" data="'+ data[i].intCliForkliftID +'"><i class="fa fa-trash"></i> Delete</button>'
                                            '</td>';
                                        '</tr>';
                            }

                            $('#show_data_cli_battery').html(html);
                            
                        }
                    })
            }

            $('#btn_create_battery').on('click', function (e) {
                e.preventDefault();
                
                var txtSerialnumber = $('#txtSerialnumber').val();
                var txtArea = $('#txtArea').val();
                var txtVersionwh = $('#txtVersionwh').val();
                var txtVersioneng = $('#txtVersioneng').val();
                var txtPicforklift = $('#txtPicforklift').val();
                var intTahunpembuatan = $('#intTahunpembuatan').val();
                var txtjeniscleaning = $('[name="txtjeniscleaning"]').val();

                if(txtVersionwh == ''){
                    swal("UNDIFINED SERIAL NUMBER!","DATA TIDAK BOLEH KOSONG !!!","warning");
                }else{

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('forklift/createCliBattery'); ?>",
                        dataType: "json",
                        data: {txtSerialnumber : txtSerialnumber, txtArea:txtArea, txtVersionwh:txtVersionwh, txtVersioneng:txtVersioneng, txtPicforklift:txtPicforklift, intTahunpembuatan:intTahunpembuatan, txtjeniscleaning:txtjeniscleaning},
                        success: function (data){
                            swal({
                                title: "SUCCESS",
                                text: "CLI FORKLIFT HAS BEEN INSERTED!",
                                icon: "success",
                                button: false,
                                timer: 3000,
                            })
                            $('#modalAdd').modal('hide');
                            show_cli_battery();
                            
                            // hilangkan inputan
                            $("[name='txtSerialnumber']").val('');
                            $("[name='txtArea']").val('');
                            $("[name='txtJenisForklift_header']").val('');
                            $("[name='txtVersioneng']").val('');
                            $("[name='txtPicforklift']").val('');
                            $("[name='intTahunpembuatan']").val('');
                        },
                    });
                }
            })

            $('#show_data_cli_battery').on('click', '.btn_startChecklist', function(){
                var txtSerialnumber = $(this).attr('data-serial');
                var txtJenisForklift_header = $(this).attr('data-jenis');
                var txtActivityCode_header = $(this).attr('data-activity');
                $.ajax({
                    url: '<?php echo base_url('forklift/start_Checklist'); ?>',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {txtSerialnumber : txtSerialnumber, txtJenisForklift_header:txtJenisForklift_header},
                    success: function (data){
                        console.log(data)
                        var html = '';
                        var lanjutan = '';
                        var i;
                        
                        $('#modalStartChecklist').modal('show');
                        html+='<table border="1" width=100%>';
                        html+='<tr>';
                        html+='<th rowspan=4 style="width:120px;"><img src="<?= base_url('assets/img/kalbe.png'); ?>" style="width:150px; height:100px; padding:2px"></th>';
                        html+='<th rowspan=2 style="width:500px;"><center> FORM </center></th>';
                        html+='<th style="width:10px" align="left">No.Dok :</th>';
                        html+='<th style="width:50px" align="left">FR/HRD-GA/BBP/006</th>';
                        html+='</tr>';
                        html+='<tr>';
                        html+='<th align="left">No.Rev : </th>';
                        html+='<th align="left">00</th>';
                        html+='</tr>';
                        html+='<tr>';
                        html+='<th style="padding-right: 5px; padding-left: 5px;" rowspan=2><center>CLEANING/LUBRIKASI/INSPECTION (CLI)</center></th>';
                        html+='<th align="left">Tgl Berlaku :</th>';
                        html+='<th align="left">22 Juni 2022</th>';
                        html+='<tr>';
                        html+='<th align="left">Halaman :</th>';
                        html+='<th align="left">1 dari 1</th>';
                        html+='</tr>';
                        html+='</table>';

                        html+='<table border="1" width=100%>';
                        html+='<tbody>';
                        html+='<tr>';
                        html+='<th>NO</th>';
                        html+='<th>UNIT</th>';
                        html+='<th>ITEM PART</th>';
                        html+='<th>STANDARD</th>';
                        html+='<th>TIME (MIN)</th>';
                        html+='<th>TOOLS</th>';
                        // html+='<th colspan="2" align="center">TANGGAL</>';
                        // html+='<th>KETERANGAN</th>';
                        html+='</tr>';
                        for (var i = 0; i < data.length; i++) {
                            var angka = i+1;
                            html+='<tr>';
                            html+='<td style="font-size:11px;">'+angka+'</td>'  
                            html+='<td style="font-size:11px;">'+data[i].txtUnit+'</td>'
                            html+='<td style="font-size:11px;">'+data[i].txtItempart+'</td>'
                            html+='<td style="font-size:11px;">'+data[i].txtStandard+'</td>'
                            html+='<td style="font-size:11px;">'+data[i].intTimemin+'</td>'
                            html+='<td style="font-size:11px;">'+data[i].txtTools+'</td>'
                            html+='</tr>';
                        }
                        html+='</tbody>';
                        html+='</table>';

                        html+='<br>';
                        html+='<br>';

                        html+='<div class="modal-footer">';
                        html+='<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
                        html+='<button type="button" class="btn btn-primary" onclick=approve("'+txtActivityCode_header+'"); >Approved</button>';
                        html+='</div>';
                    
                    $('#startChecklist-body').html(html);

                    }
                })
            });

            $('#show_data_cli_battery').on('click', '.item_delete', function() {
                var intForkliftwhID = $(this).attr('data');
                $('#modalDelete').modal('show');
                $('[name="intForkliftwhID"]').val(intForkliftwhID);
            })

            $('#btn_delete').on('click', function(e) {
                e.preventDefault();
                var intForkliftwhID = $('#intForkliftwhID').val();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('forklift/delete'); ?>',
                    dataType: 'json',
                    data: {
                        'intForkliftwhID': intForkliftwhID
                    },
                    success: function (data){
                        swal({
                        title: "SUCCESS",
                        text: "FORKLIFT HAS BEEN DELETED!",
                        icon: "success",
                        button: false,
                        timer: 2500,
                        })
                        $('#modalDelete').modal('hide');
                        show_cli_battery();
                    }
                })
            })
    })

</script>

<script>
    // Start Checklist CLI Forklift
    function approve(txtActivityCode_header){
        $.ajax({
            url : "<?php echo base_url('forklift/create_StartChecklist')?>",
            type: "post",
            // dataType: "json",
            data: {txtActivityCode_header : txtActivityCode_header},
            success: function(data){
                if(data == 'true'){
                    swal("SUCCESS!","DATA DETAIL CLI HAS BEEN INSERTED !!!","success");
                    window.location.href="<?php echo site_url('page/edit_cli_forklift'); ?>?e="+txtActivityCode_header;
                }else if(data == 'hasInserted'){
                    window.location.href="<?php echo site_url('page/edit_cli_forklift'); ?>?e="+txtActivityCode_header;
                }else{
                    swal("FAILED !!!","FAILED TO ADD DATA !!!","warning");
                }
            }
        })
    }
</script>

<script>
        $(document).ready(function() {

            $('.footable').footable();

        });

</script>

</body>
</html>