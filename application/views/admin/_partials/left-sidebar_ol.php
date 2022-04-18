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
                    <a href="<?php echo base_url('index.php/admin/dashboard_ol');?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> </a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-paper-plane-o"></i> <span class="nav-label">Online Label</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo base_url('index.php/admin/label_identitas');?>">Label Identitas</a></li>
                    </ul>
                </li>
                
                 
            </ul>

        </div>
    </nav>