

<div class="wrapper wrapper-content animated fadeInRight">
     <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h3 class="text-success">TABEL CLEANING FORKLIFT</h3>
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
                    <a href="#" data-toggle="modal" data-target="#modalAdd" class="btn btn-success">Create Task</a>
                </div>
                
            </div>
            <div class="ibox">
                <div class="ibox-content">

                <!-- alert notification -->
                <?= $this->session->flashdata('message'); ?>
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th style="width: 3%;">#</th>
                                        <th>AREA</th>
                                        <th>NAME UNIT</th>
                                        <th>ITEM PART</th>
                                        <th>SERIAL NUMBER</th>
                                        <th>PIC FORKLIFT</th>
                                        <th>TAHUN PEMBUATAN</th>
                                        <th>DETAIL</th>
                                        <th>ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody style="width:100%" id="show_data">
                                    <?php 
                                    $no = 1;
                                    foreach($forklift -> result_array() as $dt) :
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $dt['txtArea']; ?></td>
                                            <td><?= $dt['txtVersionwh']; ?></td>
                                            <td><?= $dt['txtVersioneng']; ?></td>
                                            <td><?= $dt['txtSerialnumber']; ?></td>
                                            <td><?= $dt['txtPicforklift']; ?></td>
                                            <td><?= $dt['intTahunpembuatan']; ?></td>
                                            <td>
                                                <a href="" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a>
                                            </td>
                                            <td>
                                                <a href="#" class="btn  btn-primary btn-sm"><i class="fa fa-edit"></i> Update</a>
                                                <button class="btn btn-danger btn-sm item_delete" data="<?= $dt['intForkliftwhID']; ?>"><i class="fa fa-trash"></i> Delete</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                    </table>
                                </div>
                </div>
            </div>
        </div>
     </div>
</div>


<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Scan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="QR Code">QR Code</label>
            <input type="numeric" class="form-control"  id="txtSerialnumber" name="txtserialnumber">
        </div>
        <div class="form-group">
            <label for="Area">AREA</label>
            <input type="text" class="form-control" id="txtArea" name="txtarea" readonly>
        </div>
        <div class="form-group">
            <label for="Name Unit">Version WH</label>
            <input type="text" class="form-control" id="txtVersionwh" name="txtVersionwh" readonly>
        </div>
        <div class="form-group">
            <label for="Item Part">Version ENG</label>
            <input type="text" class="form-control" id="txtVersioneng" name="txtVersioneng" readonly>
        </div>
        <div class="form-group">
            <label for="Serial Number">SERIAL NUMBER</label>
            <input type="numeric" class="form-control" id="txtSerialnumberScan" name="txtSerialnumber" readonly>
        </div>
        <div class="form-group">
            <label for="PIC Forklift">PIC FORKLIFT</label>
            <input type="text" class="form-control" id="txtPicforklift" name="txtPicforklift" readonly>
        </div>
        <div class="form-group">
            <label for="keterangan">TAHUN</label>
            <input type="text" class="form-control" id="intTahunpembuatan" name="intTahunpembuatan" readonly>
        </div>
        <div class="form-group">
            <label for="Jenis Task">JENIS TASK</label>
            <select class="form-control" id="txtjenistask" name="txtjenistask">
                <option value="1">Cleaning Unit</option>
                <option value="2">Cleaning Battery</option>
            </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete -->
<form>
<div class="modal fade" id="modalDelete" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="intForkliftwhID" id="intForkliftwhID" class="form-control" >
       <h4>Are you sure want to delete this data?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="btn_delete" >Delete</button>
      </div>
    </div>
  </div>
</div>
</form>

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