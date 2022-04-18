    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" src="<?php echo base_url();?>assets/img/profile_small.jpg"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold"><?php echo $this->session->userdata("user_nama");?></span>
                            <span class="text-muted text-xs block"><?php echo $this->session->userdata("role");?> <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                            <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                            <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo base_url() ?>index.php/admin/dashboard/logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        D-WMS
                    </div>
                </li>
                <li class="active">
                    <a href="<?php echo base_url('admin/c_dashboard/cdashboard');?>"><i class="fa fa-th-large"></i> <span class="nav-label">Main Dashboards</span> </a>
                    <a href="<?php echo base_url('admin/c_dashboard_checker/cdashboard_checker');?>"><i class="fa fa-th-large"></i> <span class="nav-label">Checker Dashboards</span> </a>
                    <a href="<?php echo base_url('admin/c_dashboard_driver/cdashboard_driver');?>"><i class="fa fa-th-large"></i> <span class="nav-label">Driver Dashboards</span> </a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Receiving</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo base_url('admin/receiving');?>">Data Receiving RM</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Penerimaan</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo base_url('admin/header_unloading');?>">Form Unloading</a></li>
                        <li><a href="<?php echo base_url('admin/editable');?>">Unloading Sheet</a></li>
                        <li><a href="form_advanced.html">Label Kedatangan</a>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-table"></i> <span class="nav-label">Penempatan</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo base_url('admin/penempatan');?>">Form Penempatan</a></li>
                        <li><a href="<?php echo base_url('admin/rack');?>">Alamat Penempatan</a></li>
                    </ul>
               

                </li>
                <li>
                    <a href="#"><i class="fa fa-wrench"></i> <span class="nav-label">Setting</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo base_url('admin/c_roleacces/croleacces');?>">Role Acces</a></li>
                        <li><a href="#">User Acces</a></li>
                    </ul>
               

                </li>     
            </ul>

        </div>
    </nav>