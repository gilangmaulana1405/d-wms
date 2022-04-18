<nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
	        <div class="navbar-header">
	            <div class="logo-element">
                        D-WMS
                </div>
	            <form role="search" class="navbar-form-custom" action="search_results.html">
	                <div class="form-group">
	                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
	                </div>
	            </form>
	        </div>
	        	<ul class="nav navbar-top-links navbar-right">
	                <li>
	                    <?php 
	                        $tanggal = mktime(date('m'), date("d"), date('Y'));
	                        echo "Tanggal : <b> " . date("d-m-Y", $tanggal ) . "</b>";
	                        date_default_timezone_set("Asia/Jakarta");
	                        $jam = date ("H:i:s");
	                        echo " | Pukul : <b> " . $jam . " " ." </b> ";
	                        $a = date ("H");
	                        if (($a>=6) && ($a<=11)) {
	                            echo " <b>, Selamat Pagi !! </b>";
	                        }else if(($a>=11) && ($a<=15)){
	                            echo " , Selamat  Pagi !! ";
	                        }elseif(($a>15) && ($a<=18)){
	                            echo ", Selamat Siang !!";
	                        }else{
	                            echo ", <b> Selamat Malam </b>";
	                        }
	                     ?>
	                </li>
	                <li>
	                    <a href="<?php echo base_url ('auth/logout'); ?>">
	                        <i class="fa fa-sign-out"></i> Log out
	                    </a>
	                </li>
            	</ul>
</nav>