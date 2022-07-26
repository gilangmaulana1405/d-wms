<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">

            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="widget style1 lazur-bg">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa fa-check fa-5x"></i>
                                    </div>
                                    <div class="col-8 text-right">
                                        <span> Approve CLI </span>
                                        <h2 class="font-bold"><?= $countApprove; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="widget style1 red-bg">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa fa-times fa-5x"></i>
                                    </div>
                                    <div class="col-8 text-right">
                                        <span> Reject CLI </span>
                                        <h2 class="font-bold"><?= $countReject; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="widget style1 yellow-bg">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-8 text-right">
                                        <span> Data Open </span>
                                        <h2 class="font-bold"><?= $countOpen; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="widget style1 navy-bg">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa fa-edit fa-5x"></i>
                                    </div>
                                    <div class="col-8 text-right">
                                        <span> Data Close </span>
                                        <h2 class="font-bold"><?= $countClose; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3>Menu Approval </h3>

            <div class="row">
                <div class="col-6">
                    <div class="ibox">
                        <div class="ibox-content">
                            <table id="myTable" class="table table-striped table-bordered table-hover dataTables-example" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 3%;" id="number">#</th>
                                        <th>ACTIVITY CODE DETAIL</th>
                                        <th>JENIS FORKLIFT</th>
                                        <!-- <th>AREA</th> -->
                                        <!-- <th>SERIAL NUMBER</th> -->
                                        <!-- <th>PIC</th> -->
                                        <!-- <th>VERSION ENG</th> -->
                                        <th>JENIS CLEANING</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody style="width:100%" id="show_data_approve_cliForklift">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="ibox">
                        <div class="ibox-content">
                            <table id="myTable" class="table table-striped table-bordered table-hover dataTables-example" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 3%;" id="number">#</th>
                                        <th>ACTIVITY CODE DETAIL</th>
                                        <th>JENIS FORKLIFT</th>
                                        <!-- <th>AREA</th> -->
                                        <!-- <th>SERIAL NUMBER</th> -->
                                        <!-- <th>PIC</th> -->
                                        <!-- <th>VERSION ENG</th> -->
                                        <th>JENIS CLEANING</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody style="width:100%" id="show_data_approve_cliBattery">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped table-bordered table-hover dataTables-example" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 3%;" id="number">#</th>
                                            <th>ACTIVITY CODE DETAIL</th>
                                            <th>JENIS FORKLIFT</th>
                                            <th>AREA</th>
                                            <th>SERIAL NUMBER</th>
                                            <th>PIC</th>
                                            <th>VERSION ENG</th>
                                            <th>JENIS CLEANING</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody style="width:100%" id="show_data_approve_cliForklift">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>


<!-- Modal Approve -->
<form>
    <div class="modal fade" id="modalApprove" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Approval Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="intCliForkliftID" id="intCliForkliftID" class="form-control">
                    <h4>Are you sure want to approve this data?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="btn_approve">Approve</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Reject -->
<form>
    <div class="modal fade" id="modalReject" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reject Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="intCliForkliftID" id="intCliForkliftID" class="form-control">
                    <h4>Are you sure want to approve this data?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="btn_reject">Reject</button>
                </div>
            </div>
        </div>
    </div>
</form>