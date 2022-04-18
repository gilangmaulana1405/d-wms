<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2><i class="fa fa-list fa-2x" style="color: #1ab394;"></i>  CLI Forklift</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('page/profile_minor');?>"><span class="fa fa-bank" style="color: navy;"></span> Home</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>CLI Forklift</strong>
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="widget style1 lazur-bg">
            <div class="row">
                <div class="col-4">
                    <i class="fa fa-list fa-5x"></i>
                </div>
                <div class="col-8 text-right">
                    <span> TOTAL FORKLIFT </span>
                    <h2 class="font-bold"><?php echo $totalForklift; ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 navy-bg">
            <div class="row">
                <div class="col-4">
                    <i class="fa fa-exclamation-triangle fa-5x"></i>
                </div>
                <div class="col-8 text-right">
                    <span> FORKLIFT OK </span>
                    <h2 class="font-bold">0</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 yellow-bg">
            <div class="row">
                <div class="col-4">
                    <i class="fa fa-check-square-o fa-5x"></i>
                </div>                       
                <div class="col-8 text-right">
                    <span> FORKLIFT REPAIR </span>                            
                    <h2 class="font-bold">0</h2>                       
                </div>
                
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 red-bg">
            <div class="row">
                <div class="col-4">
                    <i href="#" class="fa fa-pencil fa-5x"></i>
                </div>
                <div class="col-8 text-right" >
                    <span> FORKLIFT BREAKDOWN </span>
                    <h2 class="font-bold">0</h2>
                </div>
            </div>
        </div>
    </div>  
</div>
<div class="wrapper wrapper-content animated fadeInRight ecommerce">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox">
                <div class="ibox-title">
                        <h5>Data Material Minor (Approved)</h5>
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
					<div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama Forklift</th>
                                    <th class="text-center">Merk</th>
                                    <th class="text-center">Serial Number</th>
                                    <th class="text-center">PIC</th>
                                    <th class="text-center">Area</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($data_minorapproved2 as $row){ ?> 
                                <tr>
                                    <td>
                                        <?php echo $no++;?>
                                    </td>
                                    <td>
                                        <?php echo $row->txtBatchNo ?>
                                    </td>
                                    <!-- <td>
                                        <?php echo $row->txtItemCode ?>
                                    </td>
                                    <td>
                                        <?php echo $row->txtItemDescription  ?>
                                    </td>
                                    <td>
                                        <?php echo $row->fltActualWeight  ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row->txtUomIngredient  ?>
                                    </td> -->
                                    <td class="text-center">
                                        <?php echo $row->intCountNo  ?>
                                    </td>
                                    <td class="text-center">
                                            <?php
                                            if ($row->bitOpen == "1")
                                             {
                                                echo "<i class='fa fa-times text-danger' ></i>";
                                             } elseif ($row->bitProgress == "1") {
                                                echo "<i class='fa fa-arrow-right text-success' ></i>";
                                             } elseif ($row->bitClose == "1") {
                                                echo "<i class='fa fa-check text-navy' ></i>";
                                             } elseif ($row->bitHold == "1") {
                                                echo "<i class='fa fa-warning text-warning' ></i>";
                                             } elseif ($row->bitReject == "1") {
                                                echo "<i class='fa fa-trash text-danger' ></i>"; # code...
                                             } ?>
                                    </td>
                                    <td>
                                        <?php echo $row->txtInsertedBy  ?>
                                    </td>
                                    <td>
                                        <?php echo $row->dtmInserted  ?>
                                    </td>
                                    <td class="text-center">
                                        <?php 
                                        if ($row->bitOpen == "1") 
                                        { ?>
                                        <button class="btn btn-success btn-xl btn-detail" data-id="<?php echo $row->intChecklistID;?>" txtBatchNo="<?php echo $row->txtBatchNo;?>"> <i class="fa fa-shopping-cart"></i>  Start Batching</button>
                                        <?php
                                        } else { ?>
                                            -
                                        <?php }

                                    ?>
                                        <!-- <button class="btn btn-success btn-xs batch" data-id="<?php echo $row->intChecklistID;?>" txtItemCode="<?php echo $row->txtItemCode;?>"> <i class="fa fa-shopping-cart"></i> Start Batching</button> -->
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                
                            </tfoot>
                        </table>
                        <a href="<?php echo base_url('page/transaction_batching');?>"><button class="btn btn-primary"><i class="fa fa-arrow-right"></i> GO TO TRANSACTION</button></a>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-------------------------------------Versi Lama-------------------------------------------------------------->
<div class="modal inmodal fade" id="ModalTransactMinor" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Processing Ingredient</h3>
            </div>
            <form class="form-horizontal">
            <div class="modal-body">
                <div id="data-ingredient"></div>
                <div class="alert alert-warning"><p>Apakah Akan Melanjutkan Transaksi Ini ?</p></div>
            </div>
            <div class="modal-footer">
                <p id="btn-progress"></p>
            </div>
            </form>
        </div>
    </div>
</div>
<!------------------------------------Versi Baru-------------------------------------------------------------->
<div class="modal inmodal fade" id="modal-detail2" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">
                    <span id="modal-title">Detail Material</span>
                </h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <p id="hasil"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <a id="btn-lanjutan"></a>
                
                <!-- Fungsi Lama
                <a href="<?php echo base_url('page/transaction');?>"><button class="btn btn-info" type="button"><i class="fa fa-arrow-right"></i>Go To Transaction </button></a> 
            -->
            </div>
        </div>
    </div>
</div>