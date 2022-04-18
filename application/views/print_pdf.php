<?php 
// foreach ($mdwms_receiving as $row){ 
// $row = $this -> db -> query ("SELECT * FROM mdwms_receiving WHERE dtmSuratjalandate IN ('2020-01-02') AND bitProgress ='1' ") -> row_array();
?>
        

<script type="text/javascript">window.print();</script>
<?php echo "Tanggal : ".date('d-m-Y'); ?>
<table border = "1" cellpadding="8">
                        <thead>
                            <tr>
                                <th rowspan="4" colspan="2" class="text-center">
                                    <img src="<?=base_url()?>assets/img/kalbe.png">
                                </th>
                                <th rowspan="2" colspan="3" class="text-center">
                                    <h2>LABEL</h2>
                                </th>
                                <th colspan="2">
                                    <small>No Dok       : FR/WHS-RM/LRP/001</small>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <small>No Rev       : 01</small>
                                </th>
                            </tr>
                            <tr>
                                <th rowspan="2" colspan="3" class="text-center">
                                    <h2>RM PM</h2>
                                </th>
                                <th colspan="2">
                                    <small>Tgl Berlaku  : 16 JUNI 2014</small>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <small>Halaman      : 1 dari 1</small>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2">
                                   <h3>ITEM</h3> 
                                </td>
                                <td colspan="5" class="text-center">
                                    <h3><?php echo $row['txtDescription']; ?></h3>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                   <h3>TGL KEDATANGAN</h3> 
                                </td>
                                <td class="text-center">
                                    <h3><?=date('d-M-Y')?></h3>
                                </td>
                                <td colspan="2">
                                   <h3>LOT SUPPLIER</h3> 
                                </td>
                                <td class="text-center" colspan="2">
                                    <h2><?php echo $row['txtSupplier_lotnumber']; ?></h2>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                   <h3>KODE ITEM</h3> 
                                </td>
                                <td class="text-center">
                                    <h3><?php echo $row['txtItemcode']; ?></h3>
                                </td>
                                <td colspan="2">
                                   <h3>QAN</h3> 
                                </td>
                                <td class="text-center" colspan="2">
                                    <h2><?php echo $row['txtLotnumber']; ?></h2>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                   <h3>SUPPLIER</h3> 
                                </td>
                                <td class="text-center">
                                    <h3> <?php echo $row['txtSupplier']; ?></h3>
                                </td>
                                <td colspan="2">
                                   <h3>Expired Date</h3> 
                                </td>
                                <td class="text-center" colspan="2">
                                    <h3> <?php echo $row['dtmExpireddate']; ?></h3>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                   <h3>QUANTITY</h3> 
                                </td>
                                <td class="text-center" contenteditable="TRUE">
                                    <h2><?php echo $row['intQty']; ?> <?php echo $row['txtUom']; ?></h2>
                                </td>
                                <td colspan="2">
                                   <h3>PENERIMA</h3> 
                                </td>
                                <td class="text-center" colspan="2">
                                    <h3>RIDWAN</h3>
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="3" colspan="2" class="text-center" height="100">
                                    <h1>STATUS QC</h1>
                                </td>
                                <td rowspan="" colspan="" class="" height="">
                                   <div class="checkbox checkbox-success">
                                            <input id="checkbox4" type="checkbox" checked="">
                                            <label for="checkbox4"><p><span class="badge badge-primary">RELEASE</span></p>
                                            </label>
                                    </div> 
                                </td>
                                <td colspan="2">
                                    <input id="checkbox6" type="checkbox" checked="">
                                            <label for="checkbox6"><p><span class="badge badge-danger">REJECT</span></p>
                                            </label>
                                </td>
                                <td colspan="2"><H3><b>ALLERGEN</b></H3></td>
                            </tr>
                            <tr>
                                <td rowspan="" colspan="" class="" height="" style="">
                                   <div class="checkbox checkbox-warning">
                                            <input id="checkbox5" type="checkbox" checked="">
                                            <label for="checkbox5"><p><span class="badge badge-warning">HOLD</span></p>
                                            </label>
                                    </div> 
                                </td>
                                <td rowspan="" colspan="" class="" height="" >
                                   <div class="checkbox checkbox-info">
                                            <input id="checkbox7" type="checkbox" checked="">
                                            <label for="checkbox7"><p><span class="badge badge-info">MILK</span></p>
                                            </label>
                                    </div> 
                                </td>
                                <td rowspan="" colspan="" class="" height="" style="">
                                   <div class="checkbox checkbox-primary">
                                            <input id="checkbox8" type="checkbox" checked="">
                                            <label for="checkbox8"><p><span class="badge badge-success">FISH</span></p>
                                            </label>
                                    </div> 
                                </td>
                                <td rowspan="" colspan="" class="" height="">
                                    <div class="checkbox checkbox-default">
                                            <input id="checkbox9" type="checkbox" checked="">
                                            <label for="checkbox9"><p><span class="badge badge-plain">SOYA</span></p>
                                            </label>
                                    </div>
                                </td>
                                <td rowspan="" colspan="" class="" height="">
                                    <div class="checkbox checkbox-warning">
                                            <input id="checkbox10" type="checkbox" checked="">
                                            <label for="checkbox10"><p><span class="badge badge-warning">SULFUR</span></p>
                                            </label>
                                    </div>
                                </td>
                            </tr>
                            
                        </tbody>
</table>
                

