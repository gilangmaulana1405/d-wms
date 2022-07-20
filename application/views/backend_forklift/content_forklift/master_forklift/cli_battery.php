

<div class="wrapper wrapper-content animated fadeInRight">
     <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h3 class="text-success">TABEL CLEANING BATTERY</h3>
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
                    <div class="table-responsive">
                    <table id="myTable" class="table table-striped table-bordered table-hover dataTables-example" style="width:100%">
                        <thead>
                        <tr>
                            <th style="width: 3%;" id="number">#</th>
                            <th>AREA</th>
                            <th>NAME UNIT</th>
                            <th>ITEM PART</th>
                            <th>SERIAL NUMBER</th>
                            <th>PIC FORKLIFT</th>
                            <th>TAHUN PEMBUATAN</th>
                            <th>JENIS CLEANING</th>
                            <th>DETAIL</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                            <tbody style="width:100%" id="show_data_cli_battery">
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
            <input type="text" class="form-control"  id="txtSerialnumber" name="txtSerialnumber">
        </div>
        <div class="form-group">
            <label for="Area">AREA</label>
            <input type="text" class="form-control" id="txtArea" name="txtArea" readonly>
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
            <label for="PIC Forklift">PIC FORKLIFT</label>
            <input type="text" class="form-control" id="txtPicforklift" name="txtPicforklift" readonly>
        </div>
        <div class="form-group">
            <label for="Tahun pembuatan">Tahun Pembuatan</label>
            <input type="numeric" class="form-control" id="intTahunpembuatan" name="intTahunpembuatan" readonly>
        </div>
        <div class="form-group">
            <label for="Cleaning battery">Jenis Task</label>
            <input type="numeric" class="form-control" id="txtjeniscleaning" name="txtjeniscleaning" value="Cleaning Battery" readonly>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn_create_battery">Create Data</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Start Checklist -->
<div class="modal fade bd-example-modal-lg" id="modalStartChecklist" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="startChecklist-body">
                <!-- <input type="text" id="txtSerialnumber" name="txtSerialnumber">
                <input type="text" id="txtJenisForklift" name="txtJenisForklift">
                <input type="text" id="txtActivityCode_detail" name="txtActivityCode_detail">
                <input type="text" id="txtUnit" name="txtUnit">
                <input type="text" id="txtItempart" name="txtItempart">
                <input type="text" id="txtStandard" name="txtStandard">
                <input type="text" id="intTimemin" name="intTimemin">
                <input type="text" id="txtTools" name="txtTools"> -->
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