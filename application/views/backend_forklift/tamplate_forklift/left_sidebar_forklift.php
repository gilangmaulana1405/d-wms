<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header" style="background: #343a40;">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="<?php echo base_url();?>assets/img/profile/<?php echo $this->session->userdata('gambar'); ?>" style="width: 70px; height: 70px;" />
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold" style="color: #ffc107;"><?php echo $this->session->userdata('fullname'); ?></span>
                        <span class="text-muted text-xs block"><?php echo $this->session->userdata("user_name");?> <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="<?php echo base_url('page/profile');?>">Profile</a></li>
                        <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                        <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?php echo base_url ('index.php/auth/logout'); ?>">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    <medium style="color: #ffc107;">D-WMS</medium>
                </div>
            </li>
            <li>
                <a href="<?php echo base_url('page/profile_forklift');?>"><i class="fa fa-user-circle"></i> <span class="nav-label" >My Profile</span> </a>
                <a href="<?php echo base_url('page/dashboard_forklift');?>"><i class="fa fa-tachometer"></i> <span class="nav-label">Forklift Dashboards</span> </a>
            </li>
            <li>
                <a href="#"><i class="fa fa-paint-brush"></i> <span class="nav-label">Cleaning Forklift</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                   <li><a href="<?php echo base_url('page/cli_forklift');?>">CLI Forklift</a></li> 
                   <li><a href="<?php echo base_url('page/cli_battery');?>">CLI Battery</a></li> 
                   
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label" >Repairs & Maintenance</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="<?php echo base_url('page/data_repair');?>">Data Repairs</a></li>
                    <li><a href="<?php echo base_url('page/data_part');?>">Data Parts</a></li>
                    <li><a href="<?php echo base_url('page/direct_purchase');?>">Direct Purchase</a></li>
                    <li><a href="<?php echo base_url('page/trace_data_purchase');?>">Trace Data Repairs</a></li>
                    <li><a href="<?php echo base_url('page/trace_data_parts');?>">Trace Data parts</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Report Forklift</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="<?php echo base_url('page/service_report');?>">Servis Report</a></li>
                    <li><a href="<?php echo base_url('page/berita_acara');?>">Berita Acara</a></li>
                    
                </ul>               
            </li> 
            <li>
                <a href="#"><i class="fa fa-chain" ></i> <span class="nav-label">Integrasi App</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="<?php echo base_url('page/smart_forklift');?>">Smart Forklift</a>
                    <li><a href="<?php echo base_url('page/anti_collision');?>">Anti Collision</a>
                </ul>
            </li>                    
        </ul>

    </div>
</nav>