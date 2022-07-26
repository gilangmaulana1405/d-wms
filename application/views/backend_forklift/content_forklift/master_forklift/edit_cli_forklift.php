<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-12">
            <a href="<?= base_url('page/cli_forklift'); ?>" class="btn btn-warning mb-2 float-right">Back</a>
            <div class="ibox">
                <div class="ibox-content" border="1">
                    <table border="1" width=100%>
                        <tr>
                            <th rowspan=4 style="width:120px;"><img src="<?= base_url('assets/img/kalbe.png'); ?>" style="width:150px; height:100px; padding:2px"></th>
                            <th rowspan=2 style="width:500px;">
                                <center> FORM </center>
                            </th>
                            <th style="width:10px" align="left">No.Dok :</th>
                            <th style="width:50px" align="left">FR/HRD-GA/BBP/006</th>
                        </tr>

                        <tr>
                            <th align="left">No.Rev :</th>
                            <th align="left">00</th>
                        </tr>

                        <tr>
                            <th style="padding-right: 5px; padding-left: 5px;" rowspan=2>
                                <center>CLEANING/LUBRIKASI/INSPECTION (CLI)</center>
                            </th>
                            <th align="left">Tgl Berlaku :</th>
                            <th align="left">09 JANUARI 2015</th>
                        </tr>

                        <tr>
                            <th align="left">Halaman :</th>
                            <th align="left">1 dari 1</th>
                        </tr>
                    </table>

                    <table border="1" width=100%>
                        <tr>
                            <td>
                                <h5>Departemen / Area / CG* : <?= $dt['txtArea']; ?></h5>
                                <h5>Peralatan / Mesin / Kegiatan** : <?= $dt['txtVersioneng']; ?></h5>
                                <!-- <h5>Frekuensi*** :  <?= $dt['txtStandard']; ?></h5> -->
                                <h5>Tanggal Review**** : 09 Juni 2022</h5>
                                <h5>Review Ke***** : 1</h5>
                                <h5>Jumlah Halaman <sup>6*</sup> : 1</h5>
                            </td>
                        </tr>
                    </table>

                    <table border="1" width=100%>
                        <tr>
                            <td>
                                <h5>Weekly Cleaning</h5>
                                <div class="row justify-content-end">
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <input type="hidden" id="txtActivityCode_header" value="<?php echo $dt['txtActivityCode_header']; ?>">

                                            <!-- <input type="text" name="txtBarcodeitem_detail" id="txtBarcodeitem_detail" class="form-control" placeholder="Scan.."> -->
                                            <!-- <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit" id="btn_create_itemcli">Scan</button>
                                            </div> -->

                                            <input type="text" class="form-control" name="txtBarcodeitem_detail" id="txtBarcodeitem_detail" class="form-control" placeholder="Scan.." onchange="ScanItem()">

                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-3">
                                    <!-- when data success -->
                                    <?php if ($this->session->flashdata('success')) : ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>SUCCESS!</strong> <?= $this->session->flashdata('success'); ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    <?php elseif ($this->session->flashdata('failed')) : ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>ERROR!</strong> <?= $this->session->flashdata('failed'); ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    <?php elseif ($this->session->flashdata('has scanned')) : ?>
                                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                            <strong>ERROR!</strong> <?= $this->session->flashdata('has scanned'); ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    <?php elseif ($this->session->flashdata('undefined')) : ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong>ERROR!</strong> <?= $this->session->flashdata('undefined'); ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    <?php elseif ($this->session->flashdata('status failed')) : ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>ERROR!</strong> <?= $this->session->flashdata('status failed'); ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <table border="1" width="100%" id="show_data_cli">
                        <tr>
                            <th rowspan="2">NO</th>
                            <th rowspan="2">SYMBOL</th>
                            <th rowspan="2">UNIT</th>
                            <th rowspan="2">ITEM PART</th>
                            <th rowspan="2">STANDARD</th>
                            <th rowspan="2">TIME (MIN)</th>
                            <th rowspan="2">TOOLS</th>
                            <th colspan="2" align="center">Tanggal</th>
                            <th rowspan="2">KETERANGAN</th>
                            <th rowspan="2">ACTION</th>

                        <tr>
                            <td>v,+,x</td>
                            <td>PIC</td>
                        </tr>

                        <?php
                        $no = 1;
                        foreach ($detail->result_array() as $dt) :
                            $activitycode = $dt['txtActivityCode_detail'];
                            $barcodeitem = $dt['txtBarcodeitem_detail'];
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>
                                    <?php if ($dt['bitCleaning'] == 1 && $dt['bitInspection'] == 1 && $dt['bitLubrication'] == 1) { ?>
                                        <img src="<?php echo base_url('assets/img/cleaning.png'); ?>" style="width: 20px; height: 20px;"><br>
                                        <img src="<?php echo base_url('assets/img/inspection.png'); ?>" style="width: 20px; height: 20px;">
                                        <img src="<?php echo base_url('assets/img/lubrication.png'); ?>" style="width: 20px; height: 20px;">

                                    <?php } else if ($dt['bitCleaning'] == 1 && $dt['bitInspection'] == 1 && $dt['bitLubrication'] == 0) { ?>
                                        <img src="<?php echo base_url('assets/img/cleaning.png'); ?>" style="width: 20px; height: 20px;">
                                        <img src="<?php echo base_url('assets/img/inspection.png'); ?>" style="width: 20px; height: 20px;">

                                    <?php } else if ($dt['bitCleaning'] == 1 && $dt['bitInspection'] == 0 && $dt['bitLubrication'] == 1) { ?>
                                        <img src="<?php echo base_url('assets/img/cleaning.png'); ?>" style="width: 20px; height: 20px;">
                                        <img src="<?php echo base_url('assets/img/lubrication.png'); ?>" style="width: 20px; height: 20px;">

                                    <?php } else if ($dt['bitCleaning'] == 0 && $dt['bitInspection'] == 1 && $dt['bitLubrication'] == 1) { ?>
                                        <img src="<?php echo base_url('assets/img/inspection.png'); ?>" style="width: 20px; height: 20px;">
                                        <img src="<?php echo base_url('assets/img/lubrication.png'); ?>" style="width: 20px; height: 20px;">

                                    <?php } else if ($dt['bitCleaning'] == 1 && $dt['bitInspection'] == 0 && $dt['bitLubrication'] == 0) { ?>
                                        <img src="<?php echo base_url('assets/img/cleaning.png'); ?>" style="width: 20px; height: 20px;">

                                    <?php } else if ($dt['bitCleaning'] == 0 && $dt['bitInspection'] == 1 && $dt['bitLubrication'] == 0) { ?>
                                        <img src="<?php echo base_url('assets/img/inspection.png'); ?>" style="width: 20px; height: 20px;">

                                    <?php } else if ($dt['bitCleaning'] == 0 && $dt['bitInspection'] == 0 && $dt['bitLubrication'] == 1) { ?>
                                        <img src="<?php echo base_url('assets/img/lubrication.png'); ?>" style="width: 20px; height: 20px;">

                                    <?php } else if ($dt['bitCleaning'] == 0 && $dt['bitInspection'] == 0 && $dt['bitLubrication'] == 0) { ?>
                                        <p style="text-align: center;"> - </p>

                                    <?php } ?>
                                </td>
                                <td><?= $dt['txtUnit']; ?></td>
                                <td><input type="text" readonly class="form-control-plaintext" id="intBodydetail" value="<?= $dt['txtItempart']; ?> "></td>
                                <td><?= $dt['txtStandard']; ?></td>
                                <td><?= $dt['intTimemin']; ?></td>
                                <td><?= $dt['txtTools']; ?></td>
                                <td>
                                    <?php if ($dt['intScanBarcode'] == 0) {
                                        echo '';
                                    } else {
                                        echo '<span class="badge badge-success"><i class="fa fa-check"></i></span>';
                                    } ?>
                                </td>
                                <td><?= $dt['txtPicforklift']; ?></td>
                                <td>
                                    ...
                                </td>
                                <td>
                                    <form action="<?= base_url('forklift/UpdateScanItemManual'); ?>" method="POST">
                                        <input type="hidden" id="txtActivityCode_header" name="txtActivityCode_header" value="<?php echo $dt['txtActivityCode_header']; ?>">

                                        <input type="hidden" id="intDetailcliID" name="intDetailcliID" value="<?php echo $dt['intDetailcliID']; ?>">

                                        <div class="input-group mb-3">
                                            <input type="text" name="txtBarcodeitem_detail" id="txtBarcodeitem_detail" class="form-control" placeholder="Scan..">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">Scan</button>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- <a href="#" class="btn btn-success" onclick="scanManual('<?= $dt['intDetailcliID']; ?>', '<?= $dt['txtBarcodeitem_detail']; ?>')" >Scan Manual</a> -->

                                    <!-- <input type="text" name="txtBarcodeitem_detail" id="txtBarcodeitem_detail" class="form-control" placeholder="Scan..">

                                    <button class="btn btn-success" onclick="scanManual('<?= $dt['intDetailcliID']; ?>', '<?= $dt['txtBarcodeitem_detail']; ?>')" >Scan Manual</button> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tr>
                    </table>

                    <table border="1" width=100%>
                        <tr>
                            <td>
                                <div class="row mt-2">
                                    <div class="col-3">
                                        <h5>* : Diisi dengan (Department)/(Area)/(CG)</h5>
                                        <h5>** : Diisi dengan alat/mesin/kegiatan (nama alat)/(insepction/cleaning)</h5>
                                        <h5>*** : Diisi dengan frekuensi kegiatan (Daily/Weekly/Monthly)</h5>
                                        <h5>**** : Diisi dengan tanggal review jika isi dari form mengalami perubahan </h5>
                                        <h5>***** : Diisi dengan perubahan yang ke berapa kalinya</h5>
                                        <h5>6* : Jumlah halaman form jika form dibuat lebih dari 1 halaman</h5>
                                        <h5>Note : Form ini bisa digunakan untuk beberapa frekuensi dengan ketentuan tetap bisa teridentifikasi. Ex -> Frekuensi: Daily, Weekly, dan Monthly.</h5>
                                    </div>
                                    <div class="col-3">
                                        <h4>Ket :</h4>
                                        <b>(v)</b> = Dikerjakan oleh Opt, sudah selesai. <br>
                                        <b>(+)</b> = Dikerjakan oleh Eng, sudah selesai. <br>
                                        <b>(x)</b> = Belum dikerjakan (fuguai).
                                    </div>
                                    <div class="col-3">
                                        <img src="<?= base_url('assets/img/cleaning.png'); ?>" width="50px" alt=""> = Cleaning <br>
                                        <img src="<?= base_url('assets/img/inspection.png'); ?>" width="50px" class="mt-2" alt=""> = Inspection <br>
                                        <img src="<?= base_url('assets/img/lubrication.png'); ?>" width="50px" class="mt-2" alt=""> = Lubrication
                                    </div>
                                    <div class="col-3">
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="card h-200">
                                            <div class="card-header">
                                                <h5 class="card-title text-center">Verify By</h5>
                                            </div>
                                            <div class="card-body">

                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <p class="text-center">(LEADER)</p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <!-- <div class="d-flex justify-content-center mt-3">
                        <a href="#" data-toggle="modal" data-target="#modalFinished" class="btn btn-lg btn-success" id="finish_cli_forklift" data-finish="<?= $dt['intCliForkliftID']; ?>">Submit</a>
                    </div> -->


                    <form action="<?= base_url('forklift/finishCliForklift'); ?>" method="POST">
                        <input type="hidden" name="txtActivityCode_detail" value="<?= $activitycode; ?>">
                        <input type="hidden" name="txtBarcodeitem_detail" value="<?= $barcodeitem; ?>">
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-lg btn-success" type="submit">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="modalScanManual" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Scan Item Manual</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="txtActivityCode_header" value="<?php echo $dt['txtActivityCode_header']; ?>">
                    <input type="hidden" class="form-control" id="intDetailcliID" name="intDetailcliID">
                    <label for="Barcode Item">Barcode Item</label>
                    <input type="text" class="form-control" id="txtBarcodeitem_detail" name="txtBarcodeitem_detail">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="scanManual('<?= $dt['intDetailcliID']; ?>', '<?= $dt['txtBarcodeitem_detail']; ?>')">Scan</button>
            </div>
        </div>
    </div>
</div> -->


<!-- Modal Finished -->
<form>
    <div class="modal fade" id="modalFinished" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Finish Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="intCliForkliftID" id="intCliForkliftID" class="form-control">
                    <input type="hidden" name="txtActivityCode_header" id="txtActivityCode_header" class="form-control">
                    <h4>Have you cleaned all the items?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="btn_finish_cli_forklift">Finish</button>
                </div>
            </div>
        </div>
    </div>
</form>