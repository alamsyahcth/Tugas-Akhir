<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan Retur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    
    <img src="<?php echo base_url('Assets/assets/images/toko/KopSurat.jpg') ?>" style="width:40%"><br>

    <h2 style="text-align:center;">Laporan Data Retur</h2>
    <h6 style="margin-bottom:2px; font-size:12pt">Periode Bulan :
        <?php 
            if ($bulan == '01') {
                echo 'JANUARI';
            } else if ($bulan == '02') {
                echo 'FEBRUARI';
            } else if ($bulan == '03') {
                echo 'MARET';
            } else if ($bulan == '04') {
                echo 'APRIL';
            } else if ($bulan == '05') {
                echo 'MEI';
            } else if ($bulan == '06') {
                echo 'JUNI';
            } else if ($bulan == '07') {
                echo 'JULI';
            } else if ($bulan == '08') {
                echo 'AGUSTUS';
            } else if ($bulan == '09') {
                echo 'SEPTEMBER';
            } else if ($bulan == '10') {
                echo 'OKTOBER';
            } else if ($bulan == '11') {
                echo 'NOVEMBER';
            } else if ($bulan == '12') {
                echo 'DESEMBER';
            }
        ?> <?php echo $tahun; ?>
    </h6>
    <p style="font-size:12pt;">Tanggal Cetak : <?php echo date("D, d M Y"); ?></p><br>
    <table style="border: 2px solid black; border-collapse: collapse; font-size:10pt;">
        <thead>
            <tr>
                <th style="text-align:center; border: 1px solid black;" rowspan="2">No</th>
                <th style="text-align:center; border: 1px solid black;" rowspan="2">ID Retur</th>
                <th style="text-align:center; border: 1px solid black;" rowspan="2">Tanggal</th>
                <th style="text-align:center; border: 1px solid black;" rowspan="2">Nama Customer</th>
                <th style="text-align:center; border: 1px solid black;" rowspan="2">Status</th>
                <th style="text-align:center; border: 1px solid black;" colspan="6">Detail Order</th>
                <th style="text-align:center; border: 1px solid black;" rowspan="2">Total</th>
            </tr>
            <tr>
                <th style="text-align:center; border: 1px solid black;">ID Product</th>
                <th style="text-align:center; border: 1px solid black;">Nama Product</th>
                <th style="text-align:center; border: 1px solid black;">Ukuran</th>
                <th style="text-align:center; border: 1px solid black;">QTY</th>
                <th style="text-align:center; border: 1px solid black;">Alasan</th>
                <th style="text-align:center; border: 1px solid black;">Sub Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
                foreach ($returMonth as $data) {
            ?>
            <tr>
                <td style="text-align:center; border: solid 1px black; width:2%"><?php echo $no++ ?></td>
                <td style="text-align:center; border: solid 1px black; width:8%"><?php echo $data->id_retur ?></td>
                <td style="text-align:center; border: solid 1px black; width:8%"><?php echo $data->tgl_retur ?></td>
                <td style="text-align:center; border: solid 1px black; width:15%"><?php echo $data->nm_customer ?></td>
                <td style="text-align:center; border: solid 1px black; width:8%">
                    <?php
                        if ($data->status_retur == '1') {
                            echo 'Proses Retur';
                        }

                        if ($data->status_retur == '2') {
                            echo 'Refund';
                        }
                    ?>
                </td>
                
                <td style="text-align:center; border: solid 1px black; width:8%">
                <?php
                    foreach($detReturMonth as $d) { 
                        if($d->id_retur == $data->id_retur) {
                ?>
                    <?php echo $d->id_product ?><br>
                <?php }} ?>
                </td>

                <td style="text-align:center; border: solid 1px black; width:12%">
                <?php
                    foreach($detReturMonth as $d) { 
                        if($d->id_retur == $data->id_retur) {
                ?>
                    <?php echo $d->nm_product ?><br>
                <?php }} ?>
                </td>

                <td style="text-align:center; border: solid 1px black; width:5%">
                <?php
                    foreach($detReturMonth as $d) { 
                        if($d->id_retur == $data->id_retur) {
                ?>
                    <?php echo $d->nm_size ?><br>
                <?php }} ?>
                </td>

                <td style="text-align:center; border: solid 1px black; width:5%">
                <?php
                    foreach($detReturMonth as $d) { 
                        if($d->id_retur == $data->id_retur) {
                ?>
                    <?php echo $d->qty_retur ?><br>
                <?php }} ?>
                </td>

                <td style="text-align:center; border: solid 1px black; width:8%">
                <?php
                    foreach($detReturMonth as $d) { 
                        if($d->id_retur == $data->id_retur) {
                ?>
                    <?php echo $d->alasan ?><br>
                <?php }} ?>
                </td>

                <td style="text-align:center; border: solid 1px black; width:8%">
                <?php
                    foreach($detReturMonth as $d) { 
                        if($d->id_retur == $data->id_retur) {
                ?>
                    Rp.<?php echo $d->subtotal_retur ?><br>
                <?php }} ?>
                </td>
                <td style="text-align:center; border: solid 1px black; width:10%">Rp.<?php echo $data->grandtotal_retur ?></td>
            </tr>
            <?php
                }
            ?>
            <tr>
                <td colspan="11"  style="text-align:center; border: solid 1px black; font-size:12pt; font-weight:bold;"> GRAND TOTAL</td>
                <?php foreach($GTMonth as $data) { ?>
                <td style="text-align:center; border: solid 1px black; font-size:12pt; font-weight:bold;">Rp.<?php echo $data->data_grandtotal ?></td>
                <?php } ?>
            </tr>
            
        </tbody>
    </table><br>

</body>
</html>