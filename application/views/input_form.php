<div class="row">
        <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title" style="background: #ffffff;">
                        <h5 style="color:black;">FORM HEADER UNLOADING SHEET</h5>
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
                            <form method="POST" action="header_unloading/save_header" >
                                <h5>INPUT DETAIL TRANSPORTER</h5>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Nama Supplier</label>
                                    <div class="col-sm-10"><input style="text-align: left;" name="nama_supplier" type="text" class="form-control" autocomplete="off"></div>
                                </div>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Nama Supir</label>
                                    <div class="col-sm-10"><input style="text-align: left;" name="nama_supir" type="text" class="form-control" autocomplete="off"></div>
                                </div>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">No Kendaraan</label>
                                    <div class="col-sm-10"><input style="text-align: left;" name="no_kendaraan" type="text" class="form-control" autocomplete="off"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <h5>INPUT JAM & TANGGAL</h5>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-2"><input style="text-align: left;" name="tgl" type="text" class="form-control data_3" autocomplete="off"></div>
                                </div>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Jam Mulai</label>
                                    <div class="col-sm-2"><input style="text-align: left;" name="jam_mulai" type="text" class="form-control clockpicker" data-autoclose="true" autocomplete="off"></div>
                                </div>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Jam Selesai</label>
                                    <div class="col-sm-2"><input style="text-align: left;" name="jam_selesai" type="text" class="form-control clockpicker" data-autoclose="true" autocomplete="off"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <h5>INPUT PERSONAL IN CHARGE</h5>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Nama Checker</label>
                                    <div class="col-sm-10"><input style="text-align: left;" name="checker" type="text" class="form-control" autocomplete="off"></div>
                                </div>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Nama Driver</label>
                                    <div class="col-sm-10"><input style="text-align: left;" name="driver" type="text" class="form-control" autocomplete="off"></div>
                                </div>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Nama QA Incoming</label>
                                    <div class="col-sm-10"><input style="text-align: left;" name="qa_incoming" type="text" class="form-control" autocomplete="off"></div>
                                </div>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Nama Helper 1</label>
                                    <div class="col-sm-10"><input style="text-align: left;" name="helper_1" type="text" class="form-control" autocomplete="off"></div>
                                </div> 
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Nama Helper 2</label>
                                    <div class="col-sm-10"><input style="text-align: left;" name="helper_2" type="text" class="form-control" autocomplete="off"></div>
                                </div>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Nama Helper 3</label>
                                    <div class="col-sm-10"><input style="text-align: left;" name="helper_3" type="text" class="form-control" autocomplete="off"></div>
                                </div>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Nama Helper 4</label>
                                    <div class="col-sm-10"><input style="text-align: left;" name="helper_4" type="text" class="form-control" autocomplete="off"></div>
                                </div>
                                <div class="form-group  row"><label class="col-sm-2 col-form-label">Nama Helper 5</label>
                                    <div class="col-sm-10"><input style="text-align: left;" name="helper_5" type="text" class="form-control" autocomplete="off"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group row">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                        <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                    </div>
                                </div>
                            </form>
                    </div> 
                </div>  
        </div>
</div>