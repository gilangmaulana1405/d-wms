<?php 
    date_default_timezone_set('Asia/Jakarta');
    $dateNow = date("Y-m-d H:i:s");
 ?>
<div id="toast-container" class="toast-top-right" aria-live="polite" role="alert">
    
</div>

<div class="row">
<div class="col-md-4">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Profile Detail</h5>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="widget-head-color-box navy-bg p-lg text-center">
                        <div class="m-b-md">
                        <h2 class="font-bold no-margins">
                            <?php echo strtoupper($this->session->userdata('fullname')) ?>
                        </h2>
                            <medium><?php echo $this->session->userdata('user_name') ?></medium>
                        </div>
                    
                        <img src="<?php echo base_url();?>assets/img/profile/<?php echo $this->session->userdata('gambar'); ?>" style="width: 100px; height: 100px;" class="rounded-circle circle-border m-b-md" alt="profile">
                        <div>
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Ganti password ?</a><br><br>
                            <div>
                                <span>Warehouse Dept</span> |
                                <span><?php echo $this->session->userdata('txtJobtitle') ?></span> |
                                <span>PT Kalbe Morinaga Indonesia</span>
                            </div>
                            <div id="modal-form" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog animated bounceInRight">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row" style="color: black; text-align: left;">
                                                <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Ganti Password ?</h3>
                                                    <p style="font-size: 10px;">Ketentuan password : <br>1. Menggunaka huruf kecil dan kapital <br>
                                                    2. Menggunakan number <br> <br>Contoh : KMI4.0morinaga</p>
                                                    <div class="form-group" id="pass-error"><label id="label-error">Password baru :</label> 
                                                        <input type="password" name="password" required="required" placeholder=" Enter New password" 
                                                        id="password" class="form-control">
                                                    </div><br>
                                                    <button id="btn" onclick="update()" class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><strong>Update</strong></button>
                                                </div>
                                                <div class="col-sm-6" align="center"><h4><?php echo $this->session->userdata('fullname'); ?></h4>
                                                    <p><?php echo $this->session->userdata('txtJobtitle'); ?></p>
                                                    <img src="<?php echo base_url('assets/img/profile/'); ?><?php echo $this->session->userdata('gambar'); ?>" style="width: 100px; height: 100px; border-color: #00cc99;" class="rounded-circle circle-border m-b-md" alt="profile">
                                                    <p>Expire Date Password :</p>
                                                    <h4>
                                                    <?php 
                                                        $datePassword = date('d/m/Y', strtotime($this->session->userdata['expired_date']));
                                                        echo $datePassword;
                                                     ?>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="widget-text-box">
                        <h4 class="media-heading"><?php echo $this->session->userdata('user_name') ?></h4>
                        <p><?php echo $this->session->userdata('fullname') ?></p>
                        <div class="text-right">
                            <a href=""  class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>
                            <a href="" class="btn btn-xs btn-primary"><i class="fa fa-heart"></i> Love</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if($this->session->userdata('role') == '1'){ ?>
<div class="col-lg-8">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Privillege Users</h5>
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
             <ul class="todo-list m-t">
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Profile</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>                                    
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Forklift Dashboard</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu CLI Forklift</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu CLI Battery</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Repairs</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Parts</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Purchase</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Tracebillity</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Servis Report</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Berita Acara</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Integrasi App</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php }else if ($this->session->userdata('role') == '7') { ?>
<div class="col-md-8">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Privillege Users</h5>
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
             <ul class="todo-list m-t">
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Profile</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>                                    
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Forklift Dashboard</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu CLI Forklift</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu CLI Battery</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Repairs</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Parts</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Purchase</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Tracebillity</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Servis Report</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Berita Acara</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks"/>
                    <span class="m-l-xs">Akses Menu Integrasi App</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Forbidden Acces</small>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php }else if ($this->session->userdata('role') == '10') { ?>
<div class="col-md-8">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Privillege Users</h5>
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
             <ul class="todo-list m-t">
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Profile</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>                                    
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Forklift Dashboard</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu CLI Forklift</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu CLI Battery</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Repairs</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Parts</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Purchase</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Tracebillity</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Servis Report</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Berita Acara</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks"/>
                    <span class="m-l-xs">Akses Menu Integrasi App</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Forbidden Acces</small>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php }else if ($this->session->userdata('role') == '2') { ?>
<div class="col-md-8">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Privillege Users</h5>
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
             <ul class="todo-list m-t">
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Profile</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>                                    
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Forklift Dashboard</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu CLI Forklift</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu CLI Battery</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Repairs</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Parts</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Purchase</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Tracebillity</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Servis Report</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Berita Acara</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks"/>
                    <span class="m-l-xs">Akses Menu Integrasi App</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Forbidden Acces</small>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php }else if ($this->session->userdata('role') == '8') { ?>
<div class="col-md-8">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Privillege Users</h5>
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
             <ul class="todo-list m-t">
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Profile</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>                                    
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Forklift Dashboard</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu CLI Forklift</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu CLI Battery</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Repairs</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Parts</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Purchase</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Tracebillity</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Servis Report</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Berita Acara</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks"/>
                    <span class="m-l-xs">Akses Menu Integrasi App</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Forbidden Acces</small>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php }else if ($this->session->userdata('role') == '11') { ?>
<div class="col-md-8">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Privillege Users</h5>
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
             <ul class="todo-list m-t">
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Profile</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>                                    
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Forklift Dashboard</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu CLI Forklift</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu CLI Battery</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Repairs</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Parts</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Purchase</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Tracebillity</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Servis Report</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Berita Acara</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks"/>
                    <span class="m-l-xs">Akses Menu Integrasi App</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Forbidden Acces</small>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php }else if ($this->session->userdata('role') == '4') { ?>
<div class="col-md-8">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Privillege Users</h5>
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
             <ul class="todo-list m-t">
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Profile</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>                                    
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Forklift Dashboard</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu CLI Forklift</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu CLI Battery</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Repairs</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Parts</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks"/>
                    <span class="m-l-xs">Akses Menu Data Purchase</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Forbidden Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks"/>
                    <span class="m-l-xs">Akses Menu Tracebillity</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Forbidden Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Servis Report</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Berita Acara</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" />
                    <span class="m-l-xs">Akses Menu Integrasi App</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Forbidden Acces</small>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php }else if ($this->session->userdata('role') == '13') { ?>
<div class="col-md-8">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Privillege Users</h5>
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
             <ul class="todo-list m-t">
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Profile</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>                                    
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Forklift Dashboard</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu CLI Forklift</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu CLI Battery</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Repairs</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Parts</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks"/>
                    <span class="m-l-xs">Akses Menu Data Purchase</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Forbidden Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks"/>
                    <span class="m-l-xs">Akses Menu Tracebillity</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Forbidden Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Servis Report</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Berita Acara</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" />
                    <span class="m-l-xs">Akses Menu Integrasi App</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Forbidden Acces</small>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php }else{ ?>
<div class="col-md-8">
    <div class="ibox ">
        <div class="ibox-title">
            <h5>Privillege Users</h5>
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
             <ul class="todo-list m-t">
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Profile</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>                                    
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Forklift Dashboard</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu CLI Forklift</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu CLI Battery</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Repairs</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Data Parts</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks"/>
                    <span class="m-l-xs">Akses Menu Data Purchase</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Forbidden Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks"/>
                    <span class="m-l-xs">Akses Menu Tracebillity</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Forbidden Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Servis Report</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" checked/>
                    <span class="m-l-xs">Akses Menu Berita Acara</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Full Acces</small>
                </li>
                <li>
                    <input type="checkbox" value="" name="" class="i-checks" />
                    <span class="m-l-xs">Akses Menu Integrasi App</span>
                    <small class="label label-primary"><i class="fa fa-flash"></i> Forbidden Acces</small>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php } ?>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox chat-view">
            <div class="ibox-title">
                <small class="float-right text-muted"><?=date('d.m.Y')?></small>
                <h5>Chat Message List</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-9 ">
                        <div class="chat-discussion">

                            <div class="content">
                                <p id="list_chat"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="chat-users">


                            <div class="users-list">
                                <div class="chat-user">
                                    
                                        <span class="float-right label label-primary">Online</span>
                                    
                                        <img class="chat-avatar" src="<?php echo base_url();?>assets/img/landing/mwo1.jpg" alt="" >
                                        <div class="chat-user-name">
                                            <a href="#">Mukti Wibowo</a>
                                        </div>

                                        <span class="float-right label label-primary">Online</span>
                                    
                                        <img class="chat-avatar" src="<?php echo base_url();?>assets/img/landing/mpg.jpg" alt="" >
                                        <div class="chat-user-name">
                                            <a href="#">Marleny Patandung</a>
                                        </div>

                                        <span class="float-right label label-primary">Online</span>
                                    
                                        <img class="chat-avatar" src="<?php echo base_url();?>assets/img/landing/ihn.jpg" alt="" >
                                        <div class="chat-user-name">
                                            <a href="#">Iwan Hermawan</a>
                                        </div>
                                    
                                        <span class="float-right label label-primary">Online</span>
                                    
                                        <img class="chat-avatar" src="<?php echo base_url();?>assets/img/landing/dio1.jpg" alt="" >
                                        <div class="chat-user-name">
                                            <a href="#">Dwi Isdaryanto</a>
                                        </div>

                                        <span class="float-right label label-primary">Online</span>
                                    
                                        <img class="chat-avatar" src="<?php echo base_url();?>assets/img/landing/dwn.jpg" alt="" >
                                        <div class="chat-user-name">
                                            <a href="#">Diawan</a>
                                        </div>

                                        <span class="float-right label label-primary">Online</span>
                                    
                                        <img class="chat-avatar" src="<?php echo base_url();?>assets/img/landing/ylo.jpg" alt="" >
                                        <div class="chat-user-name">
                                            <a href="#">Yulianto</a>
                                        </div>
                                    
                                        <span class="float-right label label-primary">Online</span>
                                    
                                        <img class="chat-avatar" src="<?php echo base_url();?>assets/img/landing/mrn1.jpg" alt="" >
                                        <div class="chat-user-name">
                                            <a href="#">Muhamad Ridwan</a>
                                        </div>

                                        <span class="float-right label label-primary">Online</span>
                                    
                                        <img class="chat-avatar" src="<?php echo base_url();?>assets/img/landing/emf.jpg" alt="" >
                                        <div class="chat-user-name">
                                            <a href="#">Eris Mochamad Firdaus</a>
                                        </div>
                                        <span class="float-right label label-primary">Online</span>
                                    
                                        <img class="chat-avatar" src="<?php echo base_url();?>assets/img/landing/sma.jpg" alt="" >
                                        <div class="chat-user-name">
                                            <a href="#">Sumarna</a>
                                        </div>

                                        <span class="float-right label label-primary">Online</span>
                                    
                                        <img class="chat-avatar" src="<?php echo base_url();?>assets/img/landing/aln.jpg" alt="" >
                                        <div class="chat-user-name">
                                            <a href="#">Ali Nurdin</a>
                                        </div>

                                        <span class="float-right label label-primary">Online</span>
                                    
                                        <img class="chat-avatar" src="<?php echo base_url();?>assets/img/landing/shi.jpg" alt="" >
                                        <div class="chat-user-name">
                                            <a href="#">Suheri</a>
                                        </div>

                                        <span class="float-right label label-primary">Online</span>
                                    
                                        <img class="chat-avatar" src="<?php echo base_url();?>assets/img/landing/aln.jpg" alt="" >
                                        <div class="chat-user-name">
                                            <a href="#">Bayu Septo Prasetyo</a>
                                        </div>

                                        <span class="float-right label label-primary">Online</span>
                                    
                                        <img class="chat-avatar" src="<?php echo base_url();?>assets/img/landing/alr.jpg" alt="" >
                                        <div class="chat-user-name">
                                            <a href="#">Ali Rohman</a>
                                        </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="chat-form">
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Message" id="input_chat"></textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-sm btn-primary m-t-n-xs" id="send-chat"><strong>Send message</strong></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mainly scripts -->
    <script src="<?php echo base_url('assets/'); ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/popper.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/bootstrap.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url('assets/'); ?>js/inspinia.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/plugins/pace/pace.min.js"></script>

<script>
     $('#pass-error').on("keyup", function(event){  
        event.preventDefault(); 
            var password = $('#password').val(); 
            var validasi_2 = "";
            var validasi_3 = "";
            var validasi_4 = "";
            // cek password containe atleast 1 uppercase,lowercase,angka, dan huruf
            var password_array = $('#password').val().split("");

            function inArray(needle,haystack)
            {
                var count=haystack.length;
                for(var i=0;i<count;i++)
                {
                    if(haystack[i]===needle){return true;}
                }
                return false;
            }

            for (let i = 0; i < password_array.length; i++) {
                if (password_array[i] == password_array[i].toUpperCase() && isNaN(password_array[i] * 1)  ){
                    validasi_2= "1";
                }
                else if (password_array[i] == password_array[i].toLowerCase()&& isNaN(password_array[i] * 1) ){
                    validasi_3= "1";
                }
                else if (!isNaN(password_array[i] * 1) ){
                    validasi_4= "1";
                }
            }

            if(validasi_2 == "1"  && validasi_3 == "1"  && validasi_4 == "1" ){
                var password = $('#password').val(); 
                $('#password').val(password);

                var pass_error = document.getElementById('pass-error');
                var btn = document.getElementById('btn');
                pass_error.setAttribute('class', 'form-group');
                btn.removeAttribute('disabled');
            }else{
                var pass_error = document.getElementById('pass-error');
                var btn = document.getElementById('btn');
                pass_error.setAttribute('class', 'form-group has-error');
                btn.setAttribute('disabled', 'disabled');
            }
    }); 
    </script>

    <script>
        function update(){
            var intUserID = "<?php echo $this->session->userdata('user_id'); ?>";
            var password = $('#password').val();
            var dateNow = "<?php echo $dateNow; ?>";

            $.ajax({
                type : "POST",
                url : "<?php echo base_url('Auth/update_password') ?>",
                data : {intUserID : intUserID, password : password, dateNow : dateNow},
                success : function(data){
                    if(data == 'true'){
                        swal({
                          title: "SUCCESS",
                          text: "PASSWORD HAS BEEN UPDATED!",
                          icon: "success",
                          button: false,
                          timer: 2500,
                        }).then(function(){
                            window.location.href = "<?=site_url('Page/profile_packaging/')?>";
                        });
                    }else{
                        swal("PERINGATAN!","PROSES UPDATE GAGAL !!!","warning");
                    }
                }
            })
        }
    </script>

